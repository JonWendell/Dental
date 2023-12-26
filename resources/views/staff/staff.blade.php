<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <!-- Add any additional head elements such as stylesheets or scripts here -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Staff Dashboard</div>

                    <div class="card-body">
                        <p>Welcome, {{ auth()->user()->name }}!</p>
                        <!-- Add more content as needed -->

                        <h2>Pending Appointments</h2>
                        <ul>
                            @foreach($pendingAppointments as $appointment)
                                <li>
                                    {{ $appointment->first_name }} {{ $appointment->last_name }} -
                                    {{ $appointment->appointment_date }} {{ $appointment->appointment_time }}
                                    <form method="POST" action="{{ route('complete.appointment', $appointment) }}">
                                        @csrf
                                        <button type="submit">Complete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <form method="GET" action="{{ route('manual.logout') }}">
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add any additional scripts or footer content here -->
</body>

</html>
