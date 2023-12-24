<!-- resources/views/usermanagement/userdetails.blade.php -->

@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        /* Your existing styles remain unchanged */

        /* Add any additional styles here */
    </style>
</head>

<body>

    <div class="h4 pd-20">User Details</div>

    <div class="details-container">
        @if(isset($user))
        <div class="details-section">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>

            <!-- Add more user details if needed -->
            <p><strong>First Name:</strong> {{ $user->firstName }}</p>
            <p><strong>Last Name:</strong> {{ $user->lastName }}</p>
            <p><strong>Middle Name:</strong> {{ $user->middleName }}</p>
        </div>

        <div class="details-section">
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Age:</strong> {{ $user->age }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>

            <!-- Display the associated branch -->
            <p><strong>Branch:</strong> {{ $user->branch->name }}</p>
        </div>

        <div>
            <a href="{{ route('userTable') }}" class="btn btn-secondary">Go Back to User Table</a>
        </div>
        @else
        <p>No user data found.</p>
        @endif
    </div>

</body>

</html>

@endsection
