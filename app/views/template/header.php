<!DOCTYPE html>
<html lang="de">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memoriz: Eine Memory-basierte Lernplattform</title>

    <meta name="description" content="Memoriz.it ist eine Memory-basierte Lernplattform die dabei hilft Daten in Paarenform so vorzubereiten, dass man sich diese einfacher merken kann.">
    <meta name="keywords" content="Memory, lernen, Vokabeln, Schule, Schulstoff, Spaß, Schüler, HTL Rennweg, auswendig lernen, üben, vorbereiten, Tests, Schularbeiten">
    <meta name="author" content="Memoriz">
    <meta name="robots" content="index, follow">

    <!--twitter card-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@memoriz_it">
    <meta name="twitter:title" content="Memoriz">
    <meta name="twitter:description" content="Memoriz: eine Memory-basierte Lernplattform
Lerne jetzte für deine nächsten Tests mit Memoriz!">
    <meta name="twitter:image" content="https://pbs.twimg.com/profile_banners/1189196717964582912/1573287255/1500x500">

    <!--custom css-->
    <link href="/public/css/app.css" rel="stylesheet">

    <!--custom js-->
    <script src="/public/js/app.js"></script>

    <!--Bulma-->
    <link rel="stylesheet" href="/public/css/mystyles.css">

    <!--Font Awesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <!--SEO index & follow-->
    <meta name="robots" content="index, follow">

    <!--icons-->
    <link rel="apple-touch-icon" sizes="57x57" href="/public/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/public/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/public/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/icons/favicon-16x16.png">
    <link rel="manifest" href="/public/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/public/icons/ms-icon-144x144.png">
</head>

<body class="has-navbar-fixed-top">
    <nav class="navbar is-fixed-top" id="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://memoriz.it">
                <img src="/public/images/memoriz_logo.png" width="112" height="28" alt="Official Memoriz Text Logo">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="MemorizNavbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="MemorizNavbar" class="navbar-menu">
            <div class="navbar-start">
                <a href="https://memoriz.it/" class="navbar-item <?php echo ($page == 'startseite' ? 'is-active' : '') ?>">
                    Startseite
                </a>

                <a href="https://memoriz.it/kategorie" class="navbar-item <?php echo ($page == 'lernen' ? 'is-active' : '') ?>">
                    Lernen
                </a>

                <a href="https://memoriz.it/erstellen" class="navbar-item <?php echo ($page == 'erstellen' ? 'is-active' : '') ?>">
                    Erstellen
                </a>
            </div>
        </div>
    </nav>