<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="mainContent">
        <div class="contentHolder">
            <div class="sidenav">
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#clients">Clients</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="formContainer">
                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name:</label><br>
                    <input type="text" name="name"><br>
                    <label for="about">About:</label><br>
                    <input type="text" name="about"><br>
                    <label for="about">Price:</label><br>
                    <input type="text" name="price"><br>
                    <label for="roomType">Room Type:</label><br>
                    <input type="text" name="roomType" ><br><br>
                    <label for="room_image">Room Image:</label><br>
                    <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
                    <div id="images2"></div>
                    <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
                    <input type="submit" value="Submit"><br><br>
                    <div id="images"></div>

                </form>
            </div>


        </div>
        <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Room Name</th>
            <th>Room Type</th>
            <th>Price</th>
            <th>Primary Image</th>
            <th>Additional Images</th>
            <th>Action</th>

        </tr>



        @foreach($rooms as $rooms)

            <tr>
                <td>{{$rooms['id']}}</td>
                <td>{{$rooms['roomName']}}</td>
                <td>{{$rooms['roomType']}}</td>
                <td>{{$rooms['price']}}</td>

                <td>
                    <img class="myImg" onclick="image(event)"  id="myImg" src="{{ asset('images/' . $rooms['primaryImg']) }}" />
                </td>
                <td>
                    @foreach (explode(',', $rooms['additionalImages']) as $image)
                        <img class="myImg" onclick="image(event)" src="{{ asset('images/'.$image)}}">
                    @endforeach
                </td>

                {{--                   <td>--}}
                {{--                       <a href="{{route('rooms.edit', $rooms->id)}}" class="button">Edit</a>--}}
                {{--                       <form action="{{route('rooms.destroy', $rooms->id)}}" method="POST">--}}
                {{--                           @csrf--}}
                {{--                           @method('delete')--}}
                {{--                           <button type="submit" class="button">Delete</button>--}}
                {{--                       </form>--}}
                {{--                   </td>--}}
                <td>
                    <a href="{{route('rooms.edit', $rooms->id)}}" class="button">Edit</a>
                    <form action="{{route('rooms.destroy', $rooms->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>


<style>
    .button{
        text-decoration: none;
        color: #111;
        border: 2px solid;
        padding: 8px;
        border-radius: 5px;
    }
    .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        height: 100px;
        width: 100px;
    }
    .myImg:hover {
         opacity: 0.7;
     }
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    .imgStyle{
        width: 30%;
    }
    .mainContent{
        /*background-color: #6a1a21;*/
        min-height: 100vh;
        height: auto;
        display: flex;
    }

    .sidenav {
        height: 100vh;
        width: 280px;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        /*position: fixed;*/
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        background-color: white;
        padding-bottom: 30px;
        margin: auto;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }

    body{
        margin: 0;
        padding: 0;
    }
.formContainer{
    width: 100%;
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
    /*flex-direction: column;*/
}

.contentHolder{
    display: flex;
    min-width: 100%;

}
#images{
    width: 50%;
    position: relative;
    /*margin: auto;*/
    display: flex;
    justify-content: space-evenly;
    /*gap: 20px;*/
    flex-wrap: wrap;
    overflow: scroll;
    height: 200px;
    /*background-color: white;*/
}
    figure{
        width: 35%;
    }
    img{
        width: 100%;
    }
</style>

<script>
    let fileInput = document.getElementById("roomImg");
    let fileInput2 = document.getElementById("primaryImg");

    let imageContainer = document.getElementById("images");
    let imageContainer2 = document.getElementById("images2");


    function preview(){
        imageContainer.innerHTML = "";

        for(i of fileInput.files){
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                figure.insertBefore(img,figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    function preview2(){
        imageContainer2.innerHTML = "";

        for(i of fileInput2.files){
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload=()=>{
                let img = document.createElement("img");
                img.setAttribute("src",reader.result);
                figure.insertBefore(img,figCap);
            }
            imageContainer2.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    // var img = $(".myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    function image(event)  {
        modal.style.display = "block";
        modalImg.src = event.target.src;
        captionText.innerHTML = event.target.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
</html>
