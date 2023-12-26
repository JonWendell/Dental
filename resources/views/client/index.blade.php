<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
</head>

<body>
    <div>
        <h1>Make an Appointment</h1>
        <form action="{{ route('appointments.store') }}" method="post">
            @csrf
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>

            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" required>

            <label for="appointment_time">Appointment Time:</label>
            <input type="time" name="appointment_time" required>

            <button type="submit">Make Appointment</button>
        </form>

        <form method="GET" action="{{ route('manual.logout') }}">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>

</html>
