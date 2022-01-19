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
                    <input type="text" name="name" name="name"><br>
                    <label for="roomType">Room Type:</label><br>
                    <input type="text" name="roomType" name="roomType" ><br><br>
                    <label for="room_image">Room Image:</label><br>
                    <input type="file" id="primaryImg" name="primaryImg" onchange="preview2()"><br><br>
                    <div id="images2"></div>
                    <input type="file" id="roomImg" multiple onchange="preview()"><br><br>
                    <input type="submit" value="Submit"><br><br>
                    <div id="images"></div>

                </form>
            </div>


        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Room Name</th>
                <th>Room Type</th>
                <th>Primary Image</th>
            </tr>

           @foreach($rooms as $rooms)
               <tr>
                   <td>{{$rooms['id']}}</td>
                   <td>{{$rooms['roomName']}}</td>
                   <td>{{$rooms['roomType']}}</td>
                   <td>   <img class="imgStyle" src="{{ asset('images/' . $rooms['primaryImg']) }}" />
                   </td>


               </tr>
            @endforeach
        </table>
        </div>
    </div>
</body>


<style>
    .imgStyle{
        width: 30%;
    }
    .mainContent{
        background-color: #6a1a21;
        min-height: 100vh;
        height: auto;
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
margin-bottom: 10px;
    /*flex-direction: column;*/
}
form{
    margin-left: 500px;
    margin-top: 250px;

}
.contentHolder{
    display: flex;

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
</script>
</html>
