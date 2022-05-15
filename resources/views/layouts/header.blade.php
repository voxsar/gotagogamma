<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("buildings.mymap")}}">GotaGoGamma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route("buildings.mymap")}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Buildings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route("buildings.mymap")}}">Map</a></li>
                        <li><a class="dropdown-item" href="{{route("buildings.myindex")}}">My Buidlings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route("buildings.index")}}">Buldings</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Resources
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route("resources.myindex")}}">My Resources</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route("resources.index")}}">Resources</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(auth()->user()->upgrade_completetime != null)
                    <a href="#" class="headcount btn btn-primary position-relative ms-5 me-2 ps-2 btn-sm">
                        <span class="counter"></span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            Building
                        </span>
                    </a>
                @endif
                @forelse (auth()->user()->resources as $resource)
                    <a href="{{route("resources.myindex")}}" class="btn btn-primary position-relative ms-4 ps-2 btn-sm">
                        {{$resource->name}}
                        <span class="position-absolute resource_cal_{{$resource->id}} top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{round($resource->pivot->amount + ((($resource->pivot->amount / 60) / 60) * now('UTC')->format('s')))}}
                        </span>
                    </a>
                @empty

                @endforelse
            </ul>
        </div>
    </div>
</nav>
@push("scripts")
    <script>
        $(document).ready(function(){
            setTimeout(countdownloop, 1100);
            setTimeout(produceloop, 1000);
        })

        function countdownloop() {
            @if(auth()->user()->upgrade_completetime != null)
                $(".headcount").each(function (ele) {
                    var count = {{auth()->user()->upgrade_completetime->valueOf()}}
                    var now = Date.now()
                    var diff = count - now
                    if(diff >= 0){
                        var sec = new Date(diff)
                        console.log(sec)
                        $(this).find("span.counter").html(sec.getUTCHours()+":"+sec.getUTCMinutes()+":"+sec.getUTCSeconds()+" remaining")
                    }else{
                        $(this).remove()
                    }
                })
            @endif
            setTimeout(countdownloop, 1100);
        }

        @forelse (auth()->user()->resources as $resource)
            var amount{{$resource->id}} = {{$resource->pivot->amount}};
        @empty

        @endforelse

        function produceloop() {
            @forelse (auth()->user()->buildings as $building)
                @forelse ($building->productions as $production)
                    @forelse (auth()->user()->resources as $resource)
                        @if($production->id == $resource->id)
                            var add{{$resource->id}} = {{(($production->pivot->produce * $building->pivot->level) * $building->multiplier)}} / 60 / 60
                            var resource_date{{$resource->id}} = new Date()
                            var secD{{$resource->id}} = resource_date{{$resource->id}}.getUTCSeconds()
                            var perSec{{$resource->id}} = (add{{$resource->id}}/60) * secD{{$resource->id}}
                            console.log(perSec{{$resource->id}})
                            amount{{$resource->id}} += perSec{{$resource->id}};
                            $(".resource_cal_{{$resource->id}}").html(Math.round(amount{{$resource->id}}))
                        @endif
                    @empty

                    @endforelse
                @empty

                @endforelse
            @empty

            @endforelse
            setTimeout(produceloop, 1000);
        }
    </script>
@endpush
