<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/home.css">
</head>

<body>
    <div id="app">
        <home></home>

    </div>


    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>