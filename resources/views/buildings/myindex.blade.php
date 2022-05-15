@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Buildings Overview</h3>
            <p class=" text-justify">In the {{ config('app.name', 'Laravel') }} you can see a number of building sites called slots. Each can only be occupied by one building at a time. Normally you can use any building site for any building. In the real world it was arranged based on accessibility</p>

            <p>Furthermore every building can only be built once however there are many similar buildings. There are exceptions where you can build as many as you like per village after you build at least one of them to the maximum level.</p>

            <p>The buildings have different uses which are of a political, economic or even militaristic nature. In addition you have to fulfil certain prerequisites for each building before you can build them. What those prerequisites are can be seen at eacg building page.</p>

            <p>Click on the buildings to find out how long they take to build at each level upgrade, and how many resources it consumes, also how many resources it produces</p>
        </div>
        <div class="col-md-7 text-end">
            <img class="img-fluid" src={{asset('images/misc/create.jpg')}} >
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
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
                                <td scope="col" class="text-center"><img width="20px" src="{{asset($slot->building->image_url)}}"></td>
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
                                    <td scope="col" class="text-center"><img width="20px" src="{{asset('images/icons/placeholder.png')}}"></td>
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
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script >
        $(document).ready(function(){
            setTimeout(countdownloop2, 1100);
        })

        function countdownloop2() {
            $(".countdown").each(function (ele) {
                var count = $(this).data("count")
                var now = Date.now()
                var diff = count - now
                if(diff >= 0){
                    var sec = new Date(diff)
                    $(this).html("Building in progress "+sec.getUTCHours()+":"+sec.getUTCMinutes()+":"+sec.getUTCSeconds()+" remaining")
                }else{
                    $(this).html("Build Completed")
                    $(".btn-upgrade").removeClass("disabled")
                    $(".btn-build").removeClass("disabled")
                    window.location.reload()
                }
            })
            setTimeout(countdownloop2, 1100);
        }
    </script>
@endpush
