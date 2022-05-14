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
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($resources as $resource)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td scope="col">{{$resource->name}}</td>
                            <td scope="col">{{$resource->description}}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
