@extends('layouts.admin.admin')

@section('content')
<div>
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
            height: 10vh;
            width: 100%;
            background-color: #4a5568;
            align-items: center;
            text-decoration: none;
            color: black;
        }

        .message-user:hover{
            background-color: black;
            color: white;
        }
    </style>

@endsection
