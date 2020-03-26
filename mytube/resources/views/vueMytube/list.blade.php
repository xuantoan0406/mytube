<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>

    @if(Auth::check())
    <div id="app">
        <api-calling></api-calling>
    </div>
    @else
    <a class="nav-link" href="{{ route('logins') }}">{{ __('Login') }}</a>
    @endif

    <script src="{{asset('/js/app.js')}}">

    </script>
</body>

</html>