<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <style>
        .bg-form {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: sans-serif;
            background: url("{{ asset('client/assets/img/Banner_partenariat.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden
        }

        .bg_dark {
            height: 100vh;
            backdrop-filter: blur(15px);
            background-color: rgba(18, 18, 18, 0.5);
        }

        @media screen and (max-width: 600px; ) {
            body {
                background-size: cover;
                : fixed
            }
        }

        #particles-js {
            height: 100%
        }

        .loginBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            min-height: 200px;
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            box-sizing: border-box
        }

        .user {
            margin: 0 auto;
            display: block;
            margin-bottom: 20px
        }

        h3 {
            margin: 0;
            padding: 0 0 20px;
            color: #59238F;
            text-align: center
        }

        .loginBox input {
            width: 100%;
            margin-bottom: 20px
        }

        .loginBox input[type="email"],
        .loginBox input[type="password"] {
            border: none;
            border-bottom: 2px solid #262626;
            outline: none;
            height: 40px;
            color: #000;
            background: transparent;
            font-size: 16px;
            padding-left: 20px;
            box-sizing: border-box
        }

        .loginBox input[type="email"]:hover,
        .loginBox input[type="password"]:hover {
            color: black;
            border: 1px solid black;
        }

        .loginBox input[type="email"]:focus,
        .loginBox input[type="password"]:focus {
            border-bottom: 2px solid black;
        }

        .inputBox {
            position: relative
        }

        .inputBox span {
            position: absolute;
            top: 10px;
            color: #262626
        }

        .loginBox input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            font-size: 16px;
            background: #59238F;
            color: #fff;
            border-radius: 20px;
            cursor: pointer
        }

        .loginBox a {
            color: #262626;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: block
        }

        a:hover {
            color: #00ffff
        }

        p {
            color: #0000ff
        }
    </style>


</head>

<body class="bg-form" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <div class="bg_dark">
        <div class="loginBox">
            <img class="user" src="{{ asset('client/assets/img/logo.png') }}" height="100px" width="100px">
            <h3>Espace Connexion</h3>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="inputBox">
                    <input id="uname" type="email" name="email" placeholder="Adresse Email" class="form-control">
                    <input id="pass" type="password" name="password" placeholder="Mot de passe" class="form-control">
                </div>
                <input type="submit" value="Se connecter">
            </form>
            <a href="/" class="btn btn-primary">Retour<br> </a>
        </div>
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('admin/assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('admin/assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('admin/assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('admin/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('admin/assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ asset('admin/assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('admin/assets/js/plugins/slider-tabs.js') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('admin/assets/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->
    <script src="{{ asset('admin/assets/vendor/aos/dist/aos.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('admin/assets/js/hope-ui.js') }}" defer></script>
</body>

</html>