@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(isset($user))
<!-- Your edit form goes here -->
<form action="{{ route('updateUser', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')

    <!-- Your form fields go here, pre-filled with user data -->
    <h2>Edit User</h2>

    <label for="username">Username:</label>
    <input type="text" name="username" value="{{ $user->username }}" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required><br>

    <label for="password">Password (Leave blank to keep current):</label>
    <input type="password" name="password"><br>

    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" value="{{ $user->firstName }}" required><br>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" value="{{ $user->lastName }}" required><br>

    <label for="middleName">Middle Name:</label>
    <input type="text" name="middleName" value="{{ $user->middleName }}"><br>

    <label for="address">Address:</label>
    <input type="text" name="address" value="{{ $user->address }}"><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="" disabled>Select Gender</option>
        <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
        <!-- Add more gender options if needed -->
    </select><br>

    <label for="age">Age:</label>
    <input type="number" name="age" value="{{ $user->age }}"><br>

    <label for="role">Role:</label>
    <input type="text" name="role" value="{{ $user->role }}" required><br>

    <input type="submit" value="Update User">
</form>
@else
<p>No user data found.</p>
@endif

@endsection
