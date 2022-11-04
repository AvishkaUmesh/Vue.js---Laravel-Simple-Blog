{{-- <!DOCTYPE html> --}}
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reader | Blog</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


    {{-- <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/slick/slick.css') }}"> --}}
    <!-- Main Stylesheet -->
    {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" media="screen"> --}}
    @vite('public/plugins/bootstrap/bootstrap.min.css')
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
    @vite('public/plugins/themify-icons/themify-icons.css')
    @vite('public/plugins/slick/slick.css')
</head>

<body>

    @vite('resources/css/app.css')
    </head>

    <body>
        <div id="app"></div>

        {{-- <!-- JS Plugins -->
        <script src="{{ asset('public/plugins/jQuery/jquery.min.js') }}"></script>

        <script src="{{ asset('public/plugins/bootstrap/bootstrap.min.js') }}"></script>

        <script src="{{ asset('public/plugins/slick/slick.min.js') }}"></script>

        <script src="{{ asset('public/plugins/instafeed/instafeed.min.js') }}"></script>


        <!-- Main Script -->
        <script src="{{ asset('public/js/script.js') }}"></script> --}}

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        {{-- @vite('public/plugins/jQuery/jquery.min.js') --}}
        @vite('public/plugins/bootstrap/bootstrap.min.js')
        @vite('public/plugins/slick/slick.min.js')
        {{-- @vite('public/plugins/instafeed/instafeed.min.js') --}}
        @vite('public/js/script.js')

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> --}}
        @vite('resources/js/app.js')

    </body>

</html>
