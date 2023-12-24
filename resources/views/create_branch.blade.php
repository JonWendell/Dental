<!-- resources/views/create_branch.blade.php -->

@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

<!DOCTYPE html>
<html lang="en">

<!-- ... (your existing code) ... -->

<body>
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Create Branch</h2>
        <div class="table-responsive">
            <div class="card-body">
                <form action="{{ route('branch.create') }}" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name Of Branch</label>
                            <input type="text" class="form-control" name="name" placeholder="Branch Name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Branch Location" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-primary btn-block" value="Create Branch">
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Button to view branches -->
                <div class="text-left">
                    <div class="form-group col-md-6">
                        <a href="{{ route('branch.view') }}" class="btn btn-primary btn-block">View Branches</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@endsection
