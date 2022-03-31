@extends('layouts.user.user')

@section('content')
    @foreach($messages as $message)
        <a href="/user/messages/{{$message->from}}" class="message-user">
            @foreach($user as $u)
                @if($u->id == $message->from)
                    {{$u->name}}
                @endif
            @endforeach
        </a>
    @endforeach
@endsection
