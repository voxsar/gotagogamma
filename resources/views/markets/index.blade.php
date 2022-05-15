@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>My Listings</h3>
            <a class="btn btn-primary mb-2" href="{{route("market.create")}}">Sell Resources</a>
            <a class="btn btn-warning mb-2" href="{{route("market.create")}}">Past Sales</a>
        </div>
        <div class="col-md-8">
            <h3>Marketplace Listings</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                @forelse ($mylistings as $item)
                    <div href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$item->seller->name}}</h5>
                            <small>{{$item->created_at->diffForHumans()}}</small>
                        </div>
                        <div class="d-flex w-100 justify-content-left mt-4">
                            <a href="#" class="btn btn-primary btn-sm position-relative">
                                View Listing
                            </a>
                        </div>
                        <small class="pt-3">This sale will expire in {{$item->expiry_date->diffForHumans()}}</small>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
        <div class="col-md-8">
            <div class="list-group">
                @forelse ($marketplace as $item)
                    <div class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$item->seller->name}}</h5>
                            <small>{{$item->created_at->diffForHumans()}}</small>
                        </div>
                        <div class="d-flex w-100 justify-content-left mt-4">
                            @forelse ($item->resources as $resource)
                                <button type="button" class="btn btn-primary btn-sm position-relative mx-3 px-3">
                                    {{$resource->name}}
                                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                                        {{$resource->pivot->amount}}
                                    </span>
                                </button>
                            @empty

                            @endforelse
                            <a href="{{route("market.buy", $item)}}" class="btn btn-danger btn-sm px-3">Buy</a>
                        </div>
                        <small class="pt-3">This sale will expire in {{$item->expiry_date->diffForHumans()}}</small>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
