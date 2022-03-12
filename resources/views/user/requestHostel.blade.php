@extends('layouts.user.user')

@section('content')
<div class="request-hostel-container">
{{--    <form action="/user/requestHostel/submit" method="POST" enctype="multipart/form-data" style="width: 65%; margin: auto;margin-top: 100px">--}}
{{--        <div class="add-room-container">--}}
{{--            @csrf--}}
{{--            <input class="room-input" style="width: 88%" placeholder="Hostel Name" type="text" name="hostelName"><br>--}}
{{--            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Hostel Description" type="text" name="hostelDescription"></textarea><br>--}}
{{--            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Features" type="text" name="features"></textarea><br>--}}
{{--            <input class="room-input" placeholder="Location" type="text" name="location"><br>--}}
{{--            <input class="room-input" placeholder="District" type="text" name="district"><br>--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">--}}
{{--        </div>--}}
{{--    </form>--}}

    <form action="/user/requestHostel/submit" method="POST" enctype="multipart/form-data" style="width: 60%;">
        <div class="add-room-container">
            @csrf
            <input style="width: 88%" class="room-input" placeholder="Name" type="text" name="hostelName"><br>
            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Hostel Description" type="text" name="hostelDescription"></textarea><br>
            <textarea class="room-input" style="width: 88%; height: 10vh" placeholder="Features" type="text" name="features"></textarea><br>

            <input class="room-input" placeholder="Latitude" id="latitude" type="text" name="latitude"><br>
            <input class="room-input" id="longitude" placeholder="Longitude" type="text" name="longitude"><br>
            <input class="room-input" placeholder="Location" type="text" name="location"><br>
            <input class="room-input" placeholder="District" type="text" name="district">
        </div>

        <div>
            <label for="room_image">Hostel Image:</label><br>
            <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
            <div id="images2"></div>
            <label for="room_image">Additional images:</label><br>

            <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
            <div id="images"></div>
            <input class="submit-button" style="height: 30px; padding:0" type="submit" value="Submit">
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


    <style>
        .request-hostel-container{
            display: flex;
            background-color: white;
            border-radius: 10px;
            min-height: 90vh;
            height: auto;
            width: 90%;
            margin:auto;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            margin-top: 10px;
            padding: 20px;
        }
        #map{
            width: 100%;
            /*height: 100%;*/
            height: 100%;
            border-radius: 10px;
        }
    </style>
@endsection
