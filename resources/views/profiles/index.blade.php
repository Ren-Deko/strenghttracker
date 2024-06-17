@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profiles</h1>
    <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add New Profile</a>
    <div class="mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</message>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->first_name }} {{ $profile->last_name }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>
                        <a href="{{ route('profiles.show', $profile) }}" class="btn btn-info">View</a>
                        <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('profiles.destroy', $profile) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

