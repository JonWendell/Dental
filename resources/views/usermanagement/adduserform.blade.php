<!-- resources/views/usermanagement/adduserform.blade.php -->

@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        /* Your existing styles remain unchanged */

        /* Add any additional styles here */
    </style>
</head>

<body>

    <div class="h4 pd-20">Add User</div>

    @if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Your add user form goes here -->
    <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data" class="form-container">
        @csrf

        <!-- Your form fields go here -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="middleName">Middle Name:</label>
            <input type="text" name="middleName" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <!-- Add more gender options if needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="client">Client</option>
                <option value="cashier">Cashier</option>
            </select>
        </div>

        <div class="form-group">
            <label for="branch_id">Branch:</label>
            <select name="branch_id" class="form-control" required>
                @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

     

        <!-- Add more fields if needed -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add User</button>
            <a href="{{ route('userTable') }}" class="btn btn-secondary">Go Back to User Table</a>
        </div>
    </form>

</body>

</html>

@endsection
