@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Resources Overview</h3>
            <p class=" text-justify">In the {{ config('app.name', 'Laravel') }} you can see a number of building sites called slots. Each can only be occupied by one building at a time. Normally you can use any building site for any building. In the real world it was arranged based on accessibility</p>

            <p>Resources are the basis of your {{ config('app.name', 'Laravel') }}; you need them for simply everything. In {{ config('app.name', 'Laravel') }} there is food, donations, positive points, negative points and loyalty.</p>

            <p>You can see your resource fields at the village overview. {{ config('app.name', 'Laravel') }} has 40. The first village always at galle face but other lands around your village may have other distributions.</p>

            <p>The resources have different uses which are of a political, economic nature.</p>
        </div>
        <div class="col-md-7 text-end">
            <img class="img-fluid" src={{asset('images/misc/protests.jpg')}} >
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-bordered">
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
        </div>
    </div>
</div>
@endsection
