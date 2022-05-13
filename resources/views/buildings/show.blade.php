@extends("layouts.index")
@section("page")
    <div class="row">
        <div class="col">
            <div class="mt-5"></div>
            <p>{{$building->description}}</p>
            <div class="mt-5"></div>
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
                    <tr>
                        <td scope="col">{{$building->id}}</td>
                        <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                        @forelse ($building->costs as $cost)
                            <td>{{$cost->pivot->cost}}</td>
                        @empty

                        @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <div class="mt-5"></div>
            <img class="img-fluid" src="{{asset('images/buildings/1.jpg')}}">
        </div>
    </div>
@endsection()
