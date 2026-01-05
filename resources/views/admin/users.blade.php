@extends('layouts.app')

@section('title','Registered Users')

@section('content')

<div class="container my-4">
    <h3>Registered Users</h3>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
