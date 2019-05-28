<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <meta name="mobile-web-app-capable" content="yes">
	<meta property="og:type" content="website">
	<meta property="og:description" content="promogoose WebSite">
	<meta property="og:url" content="https://promogoose.magavel.net/" />
	<meta property="og:site_name" content="promogoose" />
	<meta property="og:title" content="promogoose">
	<meta property="og:locale" content="fr_FR" />
	<meta property="og:image" content="{{ asset('img/logo_promogoose.png') }}" />
	<meta name="description" content="promogoose WebSite">
</head>
<body>
    <div id="app">
        @include('layouts.header')
        <main>
            @yield ('content')
        </main>
        @include ('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- A voir pour l'enlever -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--  -->
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/map.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/toggle.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcQgY8UAAAAAGPX_XNYMe8CaqdF49yH2fuJOmC0"></script>
    


    @yield('body_end')

</body>
</html>
