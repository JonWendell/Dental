<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Appointments</title>
    <!-- Add any additional head elements such as stylesheets or scripts here -->
</head>

<body>
    <div class="container">
        <h2>Completed Appointments</h2>
        <ul>
            @foreach($completedAppointments as $appointment)
                <li>
                    {{ $appointment->first_name }} {{ $appointment->last_name }} -
                    {{ $appointment->appointment_date }} {{ $appointment->appointment_time }}
                    (Age: {{ $appointment->user->age }}, Gender: {{ $appointment->user->gender }},
                    Clinic: {{ $appointment->user->clinic->name }}, Address: {{ $appointment->user->clinic->location }})
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Add any additional scripts or footer content here -->
</body>

</html>
