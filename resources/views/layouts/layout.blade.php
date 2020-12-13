<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">
        <style>
            .app-container {
                max-width: 600px;
                margin: auto;
            }
        </style>
        <style>
            @yield('style')
        </style>
        
        @include('partials.header')
    </head>
    <body>
        <div class="app-container">
            @yield('page-content')
        </div>
        
        <script src="/js/jquery.min.js" crossorigin="anonymous"></script>
        <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        @yield('script')
    </body>
</html>