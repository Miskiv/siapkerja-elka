<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.components.styles')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        @yield('content')

    </div>

    @include('layouts.components.scripts')

</body>

</html>