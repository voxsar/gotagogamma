@extends("layouts.index")
@section("page")
<table class="table table-hover table-bordered text-white">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Building Name</th>
            @forelse ($resources as $resource)
                <th scope="col">{{$resource->name}}</th>
            @empty

            @endforelse
            <th scope="col">Build Time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($buildings as $building)
            <tr>
                <td scope="col">{{$building->id}}</td>
                <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                @forelse ($building->costs as $cost)
                    <td>{{(($cost->pivot->cost * 1) * $building->multiplier) / 100}}</td>
                @empty

                @endforelse
                <td scope="col">
                    <i class="bi bi-alarm"></i> {{Carbon\Carbon::parse($building->base * 1)->format('H:i:s')}}
                </td>
                <td scope="col">
                    <a class="btn btn-primary btn-sm w-100" href="{{route("buildings.upgrade", $building)}}">Upgrade</a>
                </td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
@endsection
