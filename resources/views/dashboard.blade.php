@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
</div>
@endsection
