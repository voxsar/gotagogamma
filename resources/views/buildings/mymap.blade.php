@extends("layouts.index")
@section("page")
<div class="container-fluid g-0">
    <div class="row g-0 flex-fill d-flex justify-content-start">
        <div class="col vh-100 p-0 m-0">
            <div id="map"></div>
        </div>
    </div>
</div>
@endsection
@push("css")
    <style>
        #map{
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }
    </style>
@endpush
@push("scripts")
    <!--
    The `defer` attribute causes the callback to execute after the full HTML
    document has been parsed. For non-blocking uses, avoiding race conditions,
    and consistent behavior across browsers, consider loading using Promises
    with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApEch4OET6BpxySS7L4j93P7LkMfH2du8&callback=initMap&v=weekly"
    defer
    ></script>
    <script>
        // Initialize and add the map
        var count = 1
        function initMap() {
            // The location of Gota Go Gama
            const gotagogama = { lat: 6.928602114622784, lng: 79.84347418891818 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 19,
                center: gotagogama,
            });


            /*map.addListener("click", (mapsMouseEvent) => {
                $("#boy").text('"lat" => '+mapsMouseEvent.latLng.lat()+', "lng" => '+mapsMouseEvent.latLng.lng()+",")
                marker = new google.maps.Marker({
                    position: mapsMouseEvent.latLng,
                    map: map,
                    title: 'Building ',
                    icon: image,
                });
            });*/

            @forelse ($slots as $slot)
                const marker{{$slot->id}} = new google.maps.Marker({
                    position: {lat: {{$slot->lat}}, lng: {{$slot->lng}}},
                    map: map,
                    @if($slot->building == null)
                        title: 'Building {{$slot->id}}',
                    @else
                        title: '{{$slot->building->name}}',
                    @endif
                    icon: '{{$slot->image}}',
                });

                marker{{$slot->id}}.addListener("click", () => {
                    @if($slot->building != null)
                        @if($slot->is_building == 0)
                            @if(auth()->user()->is_upgrading == 1)
                                toastr["error"]('Cannot build while another build is ongoing')
                            @else
                                window.location.href = '{{route("buildings.myshow", ["buildinguser" => $slot, "building" => $slot->building])}}';
                            @endif
                        @else
                            @if(auth()->user()->is_upgrading == 1)
                                toastr["error"]('Cannot build while another build is ongoing')
                            @else
                                window.location.href = '{{route("buildings.myshow", ["buildinguser" => $slot, "building" => $slot->building])}}';
                            @endif
                        @endif
                    @else
                        @if(auth()->user()->is_upgrading == 1)
                            toastr["error"]('Cannot build while another build is ongoing')
                        @else
                            window.location.href = '{{route("buildings.create", $slot->id)}}';
                        @endif
                    @endif
                });
                @if(auth()->user()->is_upgrading == 1 && $slot->is_building == 1)
                    marker{{$slot->id}}.setAnimation(google.maps.Animation.BOUNCE);
                @endif
            @empty

            @endforelse
        }

        window.initMap = initMap;
    </script>
@endpush
