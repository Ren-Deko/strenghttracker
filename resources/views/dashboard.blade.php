@extends('layouts.app')

@section('styles')
<style>
    .dashboard {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f8f9fa;
    }
    .dashboard h1 {
        margin-bottom: 20px;
    }
    .dashboard .btn {
        width: 200px;
        margin: 10px;
    }
</style>
@endsection

@section('content')
<div class="dashboard">
    <h1>Welcome to Your Dashboard, {{ Auth::user()->name }}!</h1>
    <a href="{{ route('workouts.index') }}" class="btn btn-primary">Workouts</a>
    <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Exercises</a>
    <a href="{{ route('logout') }}"
       class="btn btn-danger"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection

