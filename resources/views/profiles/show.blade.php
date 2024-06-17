@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile: {{ $profile->first_name }} {{ $profile->last_name }}</h1>
    <div>
        <strong>Email:</strong> {{ $profile->email }}
    </div>
    <div>
        <strong>Phone:</strong> {{ $profile->phone_number }}
    </div>
</div>
@endsection
