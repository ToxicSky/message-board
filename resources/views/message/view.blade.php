@extends('layouts.master')
@section('content')
<div>
    @if (count($errors) === 0)
    <h4>{{ $message->title }}</h4>
    <p>{{ $message->body }}</p>
    @else
    @foreach ($errors as $error)
    <p>{{ $error }}</p>
    @endforeach
    @endif
</div>
@endsection
