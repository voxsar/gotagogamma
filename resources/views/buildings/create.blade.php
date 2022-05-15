@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Add New Building</h3>
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
            <div class="table-responsive">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" scope="col">#</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Name</th>
                            @forelse ($resources as $resource)
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" scope="col">{{$resource->name}}</th>
                            @empty

                            @endforelse
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" scope="col">Build Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buildings as $building)
                            <tr>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" scope="col">{{$building->id}}</td>
                                <td scope="col" class="text-center"><img width="20px" src="{{asset($building->image_url)}}"></td>
                                <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                                @forelse ($building->costs as $cost)
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" >{{(($cost->pivot->cost * 2) * $building->multiplier) / 100}}</td>
                                @empty

                                @endforelse
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" scope="col">
                                    <i class="bi bi-alarm"></i> {{Carbon\Carbon::parse($building->base)->format('H:i:s')}}
                                </td>
                                <td scope="col">
                                    <a class="btn btn-primary btn-sm w-100" href="{{route("buildings.make", ["buildinguser" => $slot, "building" => $building])}}">Create</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
