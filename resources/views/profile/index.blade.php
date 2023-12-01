@extends('profile.main')
@section('container')
    <h1>{{ $content }}</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $address }}</p>
    <p>{{ $phone }}</p>
    <img src="img/{{ $image }}" width="200" alt="{{ $name }}" class="img-thumbnail rounded-circle">
@endsection
