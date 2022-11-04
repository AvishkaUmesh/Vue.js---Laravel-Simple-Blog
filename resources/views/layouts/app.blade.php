<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin</title>

    @include('libraries.styles')

</head>

<body>
    <div id="app">
        @include('components.Nav')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo date('Y'); ?> &copy; Avishka</p>
                    </div>
                </div>

            </footer>
        </div>
    </div>
    @include('libraries.scripts')

</body>

</html>
