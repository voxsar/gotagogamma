@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Resource Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($resources as $resource)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td scope="col">{{$resource->name}}</td>
                            <td scope="col">{{$resource->pivot->amount}}</td>
                            <td scope="col">{{round($resource->pivot->amount + ((($resource->pivot->amount / 60) / 60 / 60) * now('UTC')->format('s')))}}</td>
                            <td scope="col">{{round($resource->pivot->amount + ((($resource->pivot->amount / 60) / 60) * 59))}}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
