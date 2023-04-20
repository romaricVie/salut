 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
     
        <title>{{page_title($title ?? '')}}</title>
        <link rel="icon" type="image/jpg" href="{{asset('/images/logo.jpg')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('/assets/boots/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/admin.css')}}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    @livewireStyles
</head>
