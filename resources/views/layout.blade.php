<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheets/navbar.css">
    <link rel="stylesheet" href="../stylesheets/layout.css">
    <link rel="stylesheet" href="../stylesheets/events.css">
    <link rel="stylesheet" href="../stylesheets/index.css">
    <link rel="stylesheet" href="../stylesheets/memberships.css">
    <link rel="stylesheet" href="../stylesheets/ourclasses.css">
    <link rel="stylesheet" href="../stylesheets/ourproducts.css">
    <link rel="stylesheet" href="../stylesheets/aboutus.css">
    <link rel="stylesheet" href="../stylesheets/mandala-decor.css">
    <link rel="stylesheet" href="../stylesheets/lotus-decor.css">

</head>

<body>
    @include('navbar')
    @yield('content')

    <footer>
        <div class="footer-container">
            <div class="footer-image-container">
                <img class="logo-footer" src="/assets/logo-white.svg" />
            </div>
            <div class="footer-info-container">
                <div>
                    <p><b>CONTACT</b></p>
                    <p>Ananda Yoga</p>
                    <p>Beraban, Kediri, Tabanan Regency</p>
                    <p>Bali 82121, Indonesia</p>
                    <p>info@anandayoga.com</p>
                    <p>+62 36 123 456 123</p>
                </div>
                <div>
                    <p><b>OPENING HOURS</b></p>
                    <p>Mon-fri: 06.00-20.00</p>
                    <p>Saturday: 06.00-21.00</p>
                    <p>Sunday: 07.00-19.00</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/scripts/navbar.js"></script>
</body>

</html>
