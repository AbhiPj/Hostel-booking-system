@extends('layouts.admin.admin')

@section('content')
<div class="admin-container">
    <h2>Messages</h2>
    <hr>
@foreach($messages as $message)
    <a href="/admin/messages/{{$message->from}}" class="message-user">
        @foreach($user as $u)
            @if($u->id == $message->from)
                {{$u->name}}
            @endif
        @endforeach
    </a>
@endforeach
</div>

    <style>
        .message-user{
         display: flex;
            height: 7vh;
            width: 100%;
            background-color: #c2e8fd;
            /*border: 1px solid grey;*/
            /*align-items: center;*/
            border-radius: 4px;
            text-decoration: none;
            color: black;
            margin-bottom: 3px;
        }

        .message-user:hover{
            background-color: #fff2eb;
            color: black;
        }
    </style>

@endsection
