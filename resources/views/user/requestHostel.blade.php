@extends('layouts.user.user')

@section('content')
<div class="request-hostel-container">
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <form class="row g-3" action="/user/requestHostel/submit" id="requestHostel" method="POST" enctype="multipart/form-data" style="width: 60%;">
        <div class="add-room-container">
            @csrf
            <div class="col-12">
            <input class="form-control" class="room-input" id="hostelName" placeholder="Name" type="text" name="hostelName" required><br>
            </div>

            <div class="col-12">
                <textarea class="form-control" placeholder="Hostel Description" type="text" name="hostelDescription" required></textarea><br>
            </div>

            <div class="col-12">
                <textarea  class="form-control" placeholder="Features" type="text" name="features" required></textarea><br>
            </div>

            <div   class="col-md-6">
                <input class="form-control" placeholder="Latitude" id="latitude" type="text" name="latitude" readonly ><br>
            </div>

            <div   class="col-md-6">
                <input class="form-control" id="longitude" placeholder="Longitude" type="text" name="longitude" readonly ><br>
            </div>

            <div class="col-md-6">
                <input class="form-control" placeholder="Location" type="text" name="location" required><br>
            </div>

            <div class="col-md-6">
                <input class="form-control" placeholder="District" type="text" name="district" required>
            </div>
        </div>

        <div>
            <div class="col-12">
                <label style="color:black;" for="room_image">Hostel Image:</label><br>
                <input class="form-control" type="file" id="primaryImg" name="primaryImg" onchange="preview2()" required><br><br>
            </div>

            <div class="col-12">
                <label style="color:black;" for="room_image">Additional images:</label><br>
                <input class="form-control" type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
            </div>
            {{--            <div id="images2"></div>--}}
{{--            <div id="images"></div>--}}
            <input class="btn btn-primary"  type="submit" value="Submit">
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
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: white;
            border-radius: 10px;
            min-height: 70vh;
            height: auto;
            width: 75%;
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

        #requestHostel label{
            color: red;
        }
    </style>

<script>

    $(document).ready(function() {
        $("#requestHostel").validate({
            rules: {
                latitude: "required",
                longitude: "required",
            },
            messages: {
                latitude: "Select value from the map",
                longitude: "Select value from the map",
            }
        });
    });
</script>
@endsection
