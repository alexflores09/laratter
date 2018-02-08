@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>
    <a href="/{{$user->username}}/follows" class="btn btn-link">
        Seguidos <span class="badge badge-pill badge-primary">{{$user->follows->count()}}</span>
    </a>
    <a href="/{{$user->username}}/followers" class="btn btn-link">
        Seguidores <span class="badge badge-pill badge-primary">{{$user->followers->count()}}</span>
    </a>
    @if(Auth::check())
        @if(Auth::user()->isFollowing($user))
            <form action="/{{$user->username}}/unfollow" method="post">
                {{csrf_field()}}
                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <button class="btn btn-danger">Dejar de seguir</button>
            </form>
        @else
            <form action="/{{$user->username}}/follow" method="post">
                {{csrf_field()}}
                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <button class="btn btn-primary">Seguir</button>
            </form>
        @endif
    @endif
    <div class="row">
        @forelse($user->messages AS $message)
            @include('messages.message')
        @empty
            <p>No hay mensajes destacados</p>
        @endforelse
    </div>
@endsection