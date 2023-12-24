<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Customer Page</title>

    <!-- Add your additional head elements here, such as stylesheets or scripts -->
</head>

<body>
    <div class="container">
        <h1>Welcome to the Customer Page</h1>

        <!-- Add your content here -->

        <p>This is a sample view for the ClientController.</p>

        <!-- Example of looping through data if passed from the controller -->
        {{-- @foreach($data as $item)
            <p>{{ $item }}</p>
        @endforeach --}}

        <!-- Logout Button -->
        <form method="GET" action="{{ route('manual.logout') }}">
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- Add your additional scripts or footer content here -->

</body>

</html>
