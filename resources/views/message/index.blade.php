@extends('layouts.master')
@section('content')
<h3>Messages</h3>
@foreach ($messages as $message)
<div style="display: block; padding: 10px; background: rgba(0,0,0,0.3)">
    <h4>{{$message->title}}</h4>
</div>
@endforeach
@endsection
