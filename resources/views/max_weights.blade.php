@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Max Weights</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Exercise</th>
                    <th>Max Weight (kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maxWeights as $exercise => $weight)
                    <tr>
                        <td>{{ $exercise }}</td>
                        <td>{{ $weight }} kg</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
