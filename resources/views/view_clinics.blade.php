<!-- resources/views/view_clinics.blade.php -->

@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clinics</title>
</head>
<body>
    <div class="card-box mb-30">
        <div class="table-responsive">
            <h2 class="h4 pd-20">View Clinics</h2>

            <!-- Button to go back to /create-clinic -->
            <a href="{{ route('clinic.create.form') }}" class="btn btn-primary mb-3">Add New Clinic</a>

            @if(isset($clinics) && count($clinics) > 0)
                <table class="table nowrap">
                    <thead>
                        <tr>     
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Action</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinics as $clinic)
                            <tr>
                                <td class="table-plus">{{ $clinic->name }}</td>
                                <td>{{ $clinic->location }}</td>
                                <td>{{ $clinic->contact }}</td>
                                <td>{{ $clinic->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <form style="display: inline-block;" action="{{ route('clinic.edit.form', ['id' => $clinic->id]) }}" method="get">
                                                <button class="dropdown-item" type="submit"><i class="dw dw-edit2"></i> Edit</button>
                                            </form>
                                            <form style="display: inline-block;" action="{{ route('clinic.archive', ['id' => $clinic->id]) }}" method="post">
                                                @csrf
                                                @method('delete') <!-- Use DELETE method for delete operation -->
                                                <button class="dropdown-item" type="submit"><i class="dw dw-delete-3"></i> Archive</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No clinics found.</p>
            @endif
        </div>
    </div>
</body>

</html>
@endsection
