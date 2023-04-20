<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{page_title($title ?? '')}}</title>
        <link rel="icon" type="image/svg" href="{{asset('/images/logo-img.svg')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{asset('/assets/css/main.css')}}" rel="stylesheet" type="text/css">
         <style>
           [x-cloak] { display: none; }
        </style>

        <!-- Scripts -->
       <!--<link rel="stylesheet" type="text/css" href="{{asset('/assets/boots/css/bootstrap.min.css')}}">
       <script src="{{asset('/assets/boots/js/bootstrap.min.js')}}"></script>-->
       
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="{{asset('/assets/jquery/jquery-3.5.1.min.js')}}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    </head>
    <body>
         @if(session('success'))
                <script type="text/javascript">
                    swal("Félicitations!","{!! session('success') !!}","success",{
                        button:"OK"
                    })
            </script>
        @endif
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
      @include('partials/_footer')    
    </body>
</html>
