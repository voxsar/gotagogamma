@extends("layouts.index")
@section("page")
    <div class="row">
        <div class="col-md-8">
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
                        <th scope="col">Build Time</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($c = 1; $c < 20; $c++)
                        <tr>
                            <td scope="col">{{$c}}</td>
                            <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                            @forelse ($building->costs as $cost)
                                <td>{{(($cost->pivot->cost * $c) * $building->multiplier) / 100}}</td>
                            @empty

                            @endforelse
                            <td scope="col">
                                <i class="bi bi-alarm"></i> {{Carbon\Carbon::parse($building->base * $c)->format('H:i:s')}}
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            <div class="mt-5"></div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Requirements</th>
                        <th scope="col">Level</th>
                        <th scope="col">Minimum Buildings</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($building->requirements as $requirement)
                        <tr>
                            <td scope="col">{{$loop->iteration}}</td>
                            <td>{{$requirement->name}}</td>
                            <td>{{$requirement->pivot->level}}</td>
                            <td>{{$requirement->pivot->min}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center;">
                                No Building Requirements
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="mt-5"></div>
            <img class="img-fluid" src="{{asset('images/buildings/1.jpg')}}">
        </div>
    </div>
@endsection()
