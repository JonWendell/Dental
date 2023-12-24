<!-- resources/views/edit_branch.blade.php -->

@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Branch</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 2%;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
        }

        h2 {
            background-color: #d2ebebe5;
            color: #fff;
            font-size: 1.25rem;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            text-decoration-color: #fff;
        }

        .card-body {
            padding: 1.25rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-primary {
            color: #000000;
            background-color: #89b6e6;
            border-color: #89b6e6;
            width: 200px;
            align-content: center;
            text-align: center;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #6397ce;
            border-color: #89b0da;
        }
    </style>
</head>
<body>

    <div class="card-box mb-30">
        <div class="table-responsive">
            <h2 class="h4 pd-20">Edit Branch</h2>
            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <!-- Check for error message -->
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if(isset($branch))
                    <!-- Your edit form goes here -->
                    <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="post">
                        @csrf
                        @method('put')

                        <!-- Your form fields go here, pre-filled with branch data -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $branch->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" name="location" value="{{ $branch->location }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact Number:</label>
                            <input type="text" class="form-control" name="contact" value="{{ $branch->contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" required>
                                <option value="Active" {{ $branch->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $branch->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Branch</button>
                    </form>
                @else
                    <p>No branch data found.</p>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
@endsection
