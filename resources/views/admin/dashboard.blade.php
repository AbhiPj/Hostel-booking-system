{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div class="mainContent">--}}
{{--        <div class="contentHolder">--}}
{{--            <div class="sidenav">--}}
{{--                <a href="#about">About</a>--}}
{{--                <a href="#services">Services</a>--}}
{{--                <a href="#clients">Clients</a>--}}
{{--                <a href="#contact">Contact</a>--}}
{{--            </div>--}}

@extends('layouts.admin')

@section('content')
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

@endsection
