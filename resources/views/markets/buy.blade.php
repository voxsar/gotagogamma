@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>{{ config('app.name', 'Laravel') }}: Marketplace</h3>
            <p>Offer an amount equal what is being sold to complete the buy</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form action="{{route("market.update", $market)}}" method="post">
                @csrf()
                @method("PATCH")
                @forelse ($market->resources as $resource)
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label class="form-label">Selling {{$resource->name}}</label>
                                <input name="name{{$resource->id}}" type="number" class="form-control sell sell_{{$resource->id}}" value="0" placeholder="{{$resource->name}} Amount">
                            </div>
                        </div>
                        @forelse ($resources as $resou)
                            @if($resource->id == $resou->id)
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Current {{$resou->name}}</label>
                                        <input disabled class="form-control current_{{$resou->id}}" value="{{$resou->pivot->amount}}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Balance {{$resou->name}}</label>
                                        <input disabled class="form-control balance_{{$resou->id}}" value="{{$resou->pivot->amount}}">
                                    </div>
                                </div>
                            @endif
                        @empty

                        @endforelse
                        <div class="col-md">
                            <div class="mb-3">
                                <label class="form-label">Seller's Offer for {{$resource->name}}</label>
                                <input disabled class="form-control offer offer_{{$resource->id}}" value="{{$resource->pivot->amount}}">
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label class="form-label">Total Offer</label>
                            <input disabled class="form-control total_offer" value="0">
                        </div>
                    </div>
                    <div class="col-md">
                    </div>
                    <div class="col-md">
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label class="form-label">Total Exchange</label>
                            <input disabled class="form-control total_exchange" value="{{$market->resources->sum("pivot.amount")}}">
                        </div>
                    </div>
                </div>
                <button class="btn complete_sale btn-primary w-100" disabled type="submit">Complete Sale</button>
            </form>
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
                    var total = 0
                    $(".sell").each(function () {
                        total += parseInt($(this).val())
                    })
                    $(".total_offer").val(total)

                    var total_exchange = parseInt($(".total_exchange").val())
                    if(total == total_exchange){
                        toastr["success"]("The total exchange amount is the same")
                        $(".complete_sale").removeAttr("disabled")
                    }else{
                        toastr["warning"]("The total exchange amount needs to be the same")
                        $(".complete_sale").attr("disabled", "disabled")
                    }
                })
            @empty

            @endforelse
        })
    </script>
@endpush
