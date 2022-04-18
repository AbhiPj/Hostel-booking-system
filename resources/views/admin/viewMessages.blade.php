@extends('layouts.admin.admin')

@section('content')
<div class="admin-container" >
    <div style="display:flex;flex-direction: column; justify-content: space-between; height: 80vh; overflow: hidden">
        <div style="overflow-y: scroll; height: 70vh">
            @foreach($messages as $message)
                <div>
                    @foreach($user as $u)
                        @if($u->id ==  $message->from )

                        <div style="width: 100%; display: flex; justify-content: flex-end">
                            @if($message->to == $id)
                                <div class="message-user" style="justify-content: flex-end">
                                    <p>
                                        {{$message->message}} :
                                        {{$u->name}}

                                    </p>
                                </div>
                            @endif
                        </div>

                        <div style="width: 100%">
                            @if($message->to != $id)
                                <div class="message-user" >
                                    <p>
                                        {{$u->name}} :
                                        {{$message->message}}
                                    </p>
                                </div>
                            @endif
                        </div>



                        @endif
                    @endforeach
                <br>
                </div>
            @endforeach
        </div>
        <form id="messages" action="/admin/messages/{{$id}}" method="POST" enctype="multipart/form-data">
            <div style="display: flex;flex-wrap: wrap">
                @csrf
                <input class="room-input" type="text" name="newMessage" style="width: 80%" placeholder="Enter your message" required><br>
                <input class="room-input" style="width: 20%" type="submit" value="Send"><br><br>
            </div>
        </form>
    </div>
</div>

    <style>
        .message-user{
            width: 60%;
            height: 40px;
            background-color: rgba(221, 238, 245, 0.7);
            border-radius: 0 10px 10px 15px;
            display: flex;
            justify-content: flex-start;
            /*align-items: center;*/
            padding: 10px;

        }
    </style>
@endsection
