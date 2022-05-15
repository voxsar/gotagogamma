@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="mt-5"></div>
            <p contenteditable="">{!!$building->description!!}</p>
            <div class="mt-5"></div>
            <h4>Building Requirements</h4>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Requirements</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($building->requirements as $requirement)
                        <tr>
                            <td scope="col">{{$loop->iteration}}</td>
                            <td>{{$requirement->name}}</td>
                            <td>{{$requirement->pivot->level}}</td>
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
            <div class="mt-5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Production based on level</h4>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Level</th>
                        @forelse ($resources as $resource)
                            <th scope="col">{{$resource->name}}</th>
                        @empty

                        @endforelse
                    </tr>
                </thead>
                <tbody>
                    @for ($c = 1; $c < 20; $c++)
                        <tr>
                            <td scope="col">{{$c}}</td>
                            @forelse ($building->productions as $cost)
                                <td>{{(($cost->pivot->produce * $c) * $building->multiplier) / 100}}</td>
                            @empty

                            @endforelse
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Build Times & Resource Costs based on Level</h4>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Level</th>
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
        </div>
    </div>
</div>
@endsection()
