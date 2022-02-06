<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Books</title>

    <style>
        body{
            padding: 0;
            margin: 0;
        }

        /* .container{
            width: 100%;
            height: 100vh;
            background-color: black;
        } */

        .left-panel{
            height: 100vh;
            width: 20%;
            background-color: blanchedalmond;
            overflow: auto;
        }

        .sidenav {
            height: 100vh;
            width: 280px;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }
    </style>
</head>
<body>
<div>
    <div class="sidenav">
        <a href="{{route('image.upload')}}">Add Books</a>
        <a href="{{route('rooms.create')}}">View Books</a>
        <a href="#clients">Clients</a>
        <a href="#contact">Contact</a>
    </div>

    <form action="{{ route('rooms.update',$room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label><br>
        <input value="{{$room->roomName}}" type="text" name="name"><br>
        <label for="roomType">Room Type:</label><br>
        <input value="{{$room->roomType}}" type="text" name="roomType"><br><br>
        <label for="name">About:</label><br>
        <textarea type="text" name="about">{{$room->about}} </textarea><br>
        <label for="roomType">Price:</label><br>
        <input value="{{$room->price}}" type="text" name="price"><br><br>
        <label for="room_image">Primary Image:</label><br>
        <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
        <div id="images2"></div>
        <label for="room_image">Additional Image:</label><br>
        <input type="file" id="roomImg" name="roomImg[]" multiple onchange="preview()"><br><br>
        <div id="images"></div>
        <input type="submit" value="Submit"><br><br>
        <a href="/image-upload">Cancel</a>

    </form>
</div>

<script>
    let primaryFileImput = document.getElementById("primaryImg");
    let multipleFileInput = document.getElementById("bookImgs");
    let imagesContainer = document.getElementById("images");
    let imageContainer = document.getElementById("image");

    function previewImages(){
        imagesContainer.innerHTML = "";

        for(i of multipleFileInput.files){
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
            imagesContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    function previewImage(){
        imageContainer.innerHTML = "";

        for(i of primaryFileImput.files){
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
</script>
</body>
</html>
