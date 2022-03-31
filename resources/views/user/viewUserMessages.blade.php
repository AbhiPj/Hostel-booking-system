@extends('layouts.user.user')

@section('content')
    <div>
        @foreach($messages as $message)
            @foreach($user as $u)
                @if($u->id ==  $message->from)
                    {{$u->name}}:
                    {{$message->message}}
                @endif
            @endforeach
            <br>
        @endforeach
        <form id="messages" action="/user/messages/{{$id}}" method="POST" enctype="multipart/form-data">
            <div style="display: flex;flex-wrap: wrap">
                @csrf
                <input class="room-input" type="text" name="newMessage"><br>
                <input class="room-input" style="width: 20%" type="submit" value="Submit"><br><br>
            </div>

        </form>


    </div>
@endsection
