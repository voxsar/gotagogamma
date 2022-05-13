@extends("layouts.index")
@section("page")
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Building Name</th>
            @forelse ($resources as $resource)
                <th scope="col">{{$resource->name}}</th>
            @empty

            @endforelse
        </tr>
    </thead>
    <tbody>
        @forelse ($buildings as $building)
            <tr>
                <td scope="col">{{$building->id}}</td>
                <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                @forelse ($building->costs as $cost)
                    <td>{{$cost->pivot->cost}}</td>
                @empty

                @endforelse
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
@endsection
