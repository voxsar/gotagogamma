<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route("buildings.mymap")}}">GotaGoGamma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                @forelse (auth()->user()->resources as $resource)
                    <a href="{{route("resources.myindex")}}" class="btn btn-primary position-relative ms-4 ps-2 btn-sm">
                        {{$resource->name}}
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$resource->pivot->amount}}
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

  </script>
@endpush
