<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Family Dashboard</title>
    <link rel="icon" href="{{ asset('assets/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
