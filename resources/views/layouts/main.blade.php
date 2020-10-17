<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        a {
            text-decoration: none;
            color: white;
            }   

            h1{
                color: white;
            }

        .light{
            background-color: rgb(117, 119, 126);
        }
        .dark{
            background-color: rgb(41, 64, 85);
            color: white;
        }
    </style>
   <title>@yield('title')</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class={{ $theme }}>

    @include('components.header')
    @yield('content')

</body>

</html>