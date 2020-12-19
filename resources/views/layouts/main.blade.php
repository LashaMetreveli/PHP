<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>@yield('title')</title>

    @include('layouts.partials.style')
</head>

<body>

    <header>
        @include('layouts.partials.menu')
    </header>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                @yield('content')

            </div>
        </div>

    </main>

    @include('layouts.partials.scripts')
</body>

</html>
