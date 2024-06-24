@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Max Weights Lifted</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Exercise</th>
                    <th>Max Weight</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maxWeights as $maxWeight)
                    <tr>
                        <td>{{ $maxWeight->exercise->name }}</td>
                        <td>{{ $maxWeight->weight }} kg</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
