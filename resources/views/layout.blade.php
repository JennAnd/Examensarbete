<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheets/navbar.css">
    <link rel="stylesheet" href="../stylesheets/profilenavbar.css">
    <link rel="stylesheet" href="../stylesheets/layout.css">
    <link rel="stylesheet" href="../stylesheets/admin.css">
    <link rel="stylesheet" href="../stylesheets/adminpanel.css">
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
    <link rel="stylesheet" href="../stylesheets/events.css">
    <link rel="stylesheet" href="../stylesheets/index.css">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <link rel="stylesheet" href="../stylesheets/memberships.css">
    <link rel="stylesheet" href="../stylesheets/ourclasses.css">
    <link rel="stylesheet" href="../stylesheets/ourproducts.css">
    <link rel="stylesheet" href="../stylesheets/payments.css">
    <link rel="stylesheet" href="../stylesheets/profile.css">
    <link rel="stylesheet" href="../stylesheets/signup.css">
    <link rel="stylesheet" href="../stylesheets/aboutus.css">
    <link rel="stylesheet" href="../stylesheets/mandala-decor.css">

</head>

<body>
    @include('navbar')
    @yield('content')

    <footer>
        <div class="footer-container">
            <div class="footer-image-container">
                <img class="logo-footer" src="/assets/mandala.svg" />
            </div>

            <div class="footer-info-container">
                <p>ABOUT YOGASTÄLLET</p>
                <p>info</p>
                <p>more info</p>
                <p>more info again</p>
                <p>more info again</p>
            </div>
            <div class="footer-opening-hours-container">
                <p>OPENING HOURS</p>
                <p>Mon-fri: 06.00-20.00</p>
                <p>Saturday: 06.00-21.00</p>
                <p>Sunday: 07.00-19.00</p>
            </div>
        </div>
    </footer>

    <script src="navbar.js"></script>
</body>

</html>
