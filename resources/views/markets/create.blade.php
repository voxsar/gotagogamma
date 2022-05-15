@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>{{ config('app.name', 'Laravel') }}: Marketplace</h3>
            <p>You can sell food and donated excess to other individuals who also running their own {{ config('app.name', 'Laravel') }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="{{route("market.store")}}" method="post">
                @csrf()
                @forelse ($resources as $resource)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Selling {{$resource->name}}</label>
                                <input name="name{{$resource->id}}" type="number" class="form-control sell_{{$resource->id}}" value="0" placeholder="{{$resource->name}} Amount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Current {{$resource->name}}</label>
                                <input disabled class="form-control current_{{$resource->id}}" value="{{$resource->pivot->amount}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Balance {{$resource->name}}</label>
                                <input disabled class="form-control balance_{{$resource->id}}" value="{{$resource->pivot->amount}}">
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
                <button class="btn btn-primary w-100" type="submit">List in Marketplace</button>
            </form>
        </div>
        <div class="col-md-7">
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script>
        $(document).ready(function () {
            @forelse ($resources as $resource)
                $(".sell_{{$resource->id}}").keyup(function () {
                    var sell{{$resource->id}} = $(".sell_{{$resource->id}}").val()
                    var current{{$resource->id}} = $(".current_{{$resource->id}}").val()
                    var balance{{$resource->id}} = current{{$resource->id}} - sell{{$resource->id}}
                    if(balance{{$resource->id}} < 100){
                        toastr["warning"]("You don't have enough {{$resource->name}} left, please enter a lower amount")
                        if(current{{$resource->id}} < 100){
                            $(".sell_{{$resource->id}}").val(0)
                        }else{
                            $(".sell_{{$resource->id}}").val(100)
                        }
                    }else{
                        $(".balance_{{$resource->id}}").val(balance{{$resource->id}})
                    }
                })
            @empty

            @endforelse
        })
    </script>
@endpush
