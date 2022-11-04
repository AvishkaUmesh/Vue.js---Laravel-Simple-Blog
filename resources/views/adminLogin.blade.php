<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/adminLogin.css">

    <title>Admin Login</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">

                <h2>Admin Login</h2>
            </div>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" required="" name="password">
                @error('password')
                    <br>
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong> <br>
                    </span>
                @enderror
                <br>
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>

</body>

</html>
