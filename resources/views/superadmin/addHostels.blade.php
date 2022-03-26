@extends('layouts.superadmin.superadmin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="admin-container" style="display: flex; justify-content: center;flex-wrap: wrap;justify-content: space-between">

        <form class="row g-3" action="{{ route('hostels.store') }}" method="POST" enctype="multipart/form-data" style="width: 50%;">
            <div class="add-room-container">
                @csrf
                <div class="col-md-6">
                <input class="form-control" placeholder="Name" type="text" name="hostelName"><br>
                </div>
                <div class="col-md-6">

                <input class="form-control" placeholder="UserId" type="text" name="userId"><br>
                </div>
                <div class="col-md-6">

                <input class="form-control" id="latitude" type="text" name="latitude"><br>
                </div>

                <div class="col-md-6">
                <input class="form-control" id="longitude" type="text" name="longitude"><br>
                </div>

                <div class="col-md-6">
                <textarea class="form-control" style="width: 88%; height: 10vh" placeholder="About" type="text" name="about"></textarea><br>
                </div>

                <div class="col-md-6">
                <textarea class="form-control" style="width: 88%; height: 10vh" placeholder="Features" type="text" name="Features"></textarea><br>
                </div>

                <div class="col-md-6">
                <input class="form-control" placeholder="Location" type="text" name="location"><br>
                </div>

                <div class="col-md-6">
                <input class="form-control" placeholder="District" type="text" name="district">
                </div>
            </div>

            <div>
                <div class="col-md-6">
                <label for="room_image">Room Image:</label><br>
                <input class="form-control" type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
                </div>

                <div class="col-md-6">
{{--                <div id="images2"></div>--}}
                <input class="form-control" type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
                </div>
{{--                <div id="images"></div>--}}
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
        <div class="admin-map">
            <script src="{{ asset('js/script.js') }}"></script>

            <div id="map"></div>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLHJrMCWUn3MaoEKRnW0Y0rD22yU6Rp7I&callback=initMap&libraries=&v=weekly&channel=2"
                async
            ></script>
        </div>


    </div>

    <style>
        #map{
            width: 100%;
            /*height: 100%;*/
            height: 100%;
            border-radius: 10px;
        }
    </style>

    <script>
        function initMap() {
            // The location of Uluru
            const kathmandu = { lat: 27.717245, lng: 85.323959 };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: kathmandu,
            });

            var marker = new google.maps.Marker({
                position: kathmandu,
                title: "map",
            });


            map.addListener("click", (e) => {
                marker.setMap(null);

                marker = new google.maps.Marker({
                    position: e.latLng,
                    title: "map",
                });

                marker.setMap(map);
                var lat = e.latLng.toJSON().lat;
                var lng = e.latLng.toJSON().lng;

                $('#latitude').val(lat),
                    $('#longitude').val(lng),


                    console.log("lat:", lat)
                console.log("lng:", lng);
            });
        }
    </script>

@endsection
