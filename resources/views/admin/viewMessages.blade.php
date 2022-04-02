@extends('layouts.admin.admin')

@section('content')
<div class="admin-container">
    <div style="display:flex;flex-direction: column; justify-content: space-between; height: 70vh">
        <div>
            @foreach($messages as $message)
                <div class="message-item">
                    @foreach($user as $u)
                        @if($u->id ==  $message->from)
                            {{$u->name}}:
                            {{$message->message}}
                        @endif
                    @endforeach
                <br>
                </div>
            @endforeach
        </div>
        <form id="messages" action="/admin/messages/{{$id}}" method="POST" enctype="multipart/form-data">
            <div style="display: flex;flex-wrap: wrap">
                @csrf
                <input class="room-input" type="text" name="newMessage" style="width: 80%" placeholder="Enter your message"><br>
                <input class="room-input" style="width: 20%" type="submit" value="Send"><br><br>
            </div>
        </form>
    </div>
</div>
@endsection
