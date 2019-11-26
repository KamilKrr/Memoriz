<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memoriz: Eine Memory-basierte Lernplattform</title>

    <meta name="description"
        content="Memoriz.it ist eine Memory-basierte Lernplattform die dabei hilft Daten in Paarenform so vorzubereiten, dass man sich diese einfacher merken kann. Memoriz.it ist perfekt für das Lernen und üben von Schulstoff.">
    <meta name="keywords"
        content="Memory, lernen, Vokabeln, Schule, Schulstoff, Spaß, Schüler, HTL Rennweg, auswendig lernen, üben, vorbereiten, Tests, Schularbeiten">
    <meta name="author" content="Memoriz">
    <meta name="robots" content="index, follow">

    <!--custom css-->
    <link href="/public/css/app.css" rel="stylesheet">

    <!--custom js-->
    <script src="/public/js/app.js"></script>

    <!--Bulma-->
    
    <link rel="stylesheet" href="/public/css/mystyles.css">

    <!--Font Awesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://memoriz.it">
                <img src="/public/images/memoriz_logo.png" width="112" height="28" alt="Official Memoriz Text Logo">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="MemorizNavbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="MemorizNavbar" class="navbar-menu">
            <div class="navbar-start">
                <a href="https://memoriz.it/" class="navbar-item <?php echo($page == 'startseite' ? 'is-active' : '')?>">
                    Startseite
                </a>

                <a href="https://memoriz.it/toft" class="navbar-item <?php echo($page == 'spielen' ? 'is-active' : '')?>">
                    Spielen
                </a>

                <a class="navbar-item <?php echo($page == 'erstellen' ? 'is-active' : '')?>">
                    Erstellen
                </a>
            </div>
        </div>
    </nav>