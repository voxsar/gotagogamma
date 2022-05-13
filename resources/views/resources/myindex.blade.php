@extends("layouts.index")
@section("page")
<table class="table table-hover table-bordered text-white">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Resource Name</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($resources as $resource)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td scope="col">{{$resource->name}}</td>
                <td scope="col">{{$resource->pivot->amount}}</td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
@endsection
