@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>This is your dashboard content.</p>
@endsection
