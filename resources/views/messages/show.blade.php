@extends('layouts.app')

@section('content')
    <h1 class="h3">Mesanje id: {{$message->id}}</h1>
    @include('messages.message')
@endsection