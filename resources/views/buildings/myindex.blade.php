@extends("layouts.index")
@section("page")
<table class="table table-hover table-bordered text-white">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Building Name</th>
            <th scope="col">Level</th>
            @forelse ($resources as $resource)
                <th scope="col">{{$resource->name}}</th>
            @empty

            @endforelse
            <th scope="col">Build Time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($slots as $slot)
            <tr>
                <td scope="col">{{$slot->id}}</td>
                @if($slot->building != null)
                    @if($slot->is_building == 0)
                    <td scope="col">{{$slot->building->name}}</td>
                    <td scope="col">{{$slot->level}}</td>
                        @forelse ($slot->building->costs as $cost)
                            <td>{{(($cost->pivot->cost * ($slot->level + 1)) * $slot->building->multiplier) / 100}}</td>
                        @empty

                        @endforelse
                        <td scope="col">
                            <i class="bi bi-alarm"></i> {{Carbon\Carbon::parse($slot->building->base * ($slot->level + 1))->format('H:i:s')}}
                        </td>
                        <td scope="col">
                            @if(auth()->user()->is_upgrading == 1)
                                <a class="btn btn-primary btn-sm w-100 btn-upgrade disabled" href="{{route("buildings.upgrade", ["buildinguser" => $slot, "building" => $slot->building])}}">Upgrade</a>
                            @else
                                <a class="btn btn-primary btn-sm w-100 btn-upgrade" href="{{route("buildings.upgrade", ["buildinguser" => $slot, "building" => $slot->building])}}">Upgrade</a>
                            @endif
                        </td>
                    @elseif($slot->is_building == 1)
                        <td scope="col">Building</td>
                        <td scope="col">{{$slot->level}} <small>(Upgrading to {{$slot->level + 1}})</small></td>
                        <td scope="col" colspan="6" class="countdown" data-count="{{auth()->user()->upgrade_completetime->valueOf()}}">Building in progress</td>
                        <td scope="col">
                            <a class="btn btn-primary btn-sm w-100" href="">Cancel</a>
                        </td>
                    @endif
                @else
                    @if($slot->is_building == 0)
                        <td scope="col">Empty Slot</td>
                        <td scope="col">0</td>
                        <td scope="col" colspan="6">N/A</td>
                        <td scope="col">
                            @if(auth()->user()->is_upgrading == 1)
                                <a class="btn btn-primary btn-sm w-100 btn-build disabled" href="{{route("buildings.create", $slot->id)}}">Build</a>
                            @else
                                <a class="btn btn-primary btn-sm w-100 btn-build" href="{{route("buildings.create", $slot->id)}}">Build</a>
                            @endif
                        </td>
                    @elseif($slot->is_building == 1)
                        <td scope="col">Building</td>
                        <td scope="col">{{$slot->level}} <small>(Upgrading to {{$slot->level + 1}})</small></td>
                        <td scope="col" colspan="6"class="countdown" data-count="{{auth()->user()->upgrade_completetime->valueOf()}}">Building in progress</td>
                        <td scope="col">
                            <a class="btn btn-primary btn-sm w-100" href="">Cancel</a>
                        </td>
                    @endif
                @endif
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
@endsection
@push("scripts")
    <script >
        $(document).ready(function(){
            setTimeout(countdownloop, 1100);
        })

        function countdownloop() {
            $(".countdown").each(function (ele) {
                var count = $(this).data("count")
                var now = Date.now()
                var diff = count - now
                if(diff >= 0){
                    var sec = new Date(diff)
                    $(this).html("Building in progress "+sec.getSeconds()+" remaining")
                }else{
                    $(this).html("Build Completed")
                    $(".btn-upgrade").removeClass("disabled")
                    $(".btn-build").removeClass("disabled")
                    window.location.reload()
                }
            })
            setTimeout(countdownloop, 1100);
        }
    </script>
@endpush
