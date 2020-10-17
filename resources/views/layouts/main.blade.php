<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>@yield('title')</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="color: {{ $color }}">

    @include('components.menu')
    @yield('content')

</body>

</html>