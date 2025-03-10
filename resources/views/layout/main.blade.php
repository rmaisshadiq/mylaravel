<!doctype html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <style>
        main>.container {
            padding: 60px 15px 0;
        }
    </style>
    
    {{--<link href="/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href='/css/bootstrap.min.css'>
</head>

<body class="d-flex flex-column h-100">
    @include('layouts/header')
    <main class="flex-shrink-0">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('layouts/footer')
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>