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
                        @forelse ($resources as $resource)
                            <th scope="col">{{$resource->name}}</th>
                        @empty

                        @endforelse
                        <th scope="col">Build Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buildings as $building)
                        <tr>
                            <td scope="col">{{$building->id}}</td>
                            <td scope="col" class="text-center"><img width="20px" src="{{asset($building->image_url)}}"></td>
                            <td scope="col"><a href="{{route("buildings.show", $building)}}">{{$building->name}}</a></td>
                            @forelse ($building->costs as $cost)
                                <td>{{(($cost->pivot->cost * 1) * $building->multiplier) / 100}}</td>
                            @empty

                            @endforelse
                            <td scope="col">
                                <i class="bi bi-alarm"></i> {{Carbon\Carbon::parse($building->base * $speed)->format('H:i:s')}}
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push("css")
    <style>
        .dtr-bs-modal{
            width: 100vw;
        }
        .btn-primary{
            background-color: var(--bs-primary) !important;
        }
    </style>
@endpush
@push("scripts")
    <script>
        $(document).ready( function () {
            $('.table-hover').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal( {
                            header: function ( row ) {
                                var data = row.data();
                                return 'Details for '+data[0]+' '+data[1];
                            }
                        } ),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                            tableClass: 'table'
                        } )
                    }
                },
                searching: false,
                paging: false,
            });
        } );
    </script>
@endpush
