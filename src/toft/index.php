<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Memoriz</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="57x57" href="/src/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/src/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/src/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/src/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/src/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/src/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/src/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/src/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/src/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/src/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/src/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/src/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/src/icons/favicon-16x16.png">
  <link rel="manifest" href="/src/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/src/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="/src/toft/css/normalize.css">
  <link rel="stylesheet" href="/src/toft/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cutive+Mono&display=swap" rel="stylesheet">

</head>

<body onload="show();">
<div id="gamecomplete" class="hide">
  <div>
    <h2>Herzlichen Glückwunsch</h2>
    <p>Du hast das TOFT Memory geschaff und dich ein bisschen mit unserer Schule vertraut gemacht.</p>
    <p>Deine Zeit:</p>
    <div class="clock" id="clock2">
      <span id="time2"></span>
    </div>
    <button type="submit" value="Neustart" onClick="window.location.reload();">Neustart</button>
  </div>
</div>
<div class="content">
  <div class="field">
  <div class="field-center" id="cardBoard">
  </div>
</div>
<div class="stats">
<div class="navbar">
  <div class="login">

  </div>
  <div class="logo">
    <img src="/src/toft/resources/logo_purpleish.png">
  </div>
  <div class="menu">
    <div>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

</div>

  <div class="center">
    <span>Tag der offenen Tür</span>
    <div class="clock" id="clock">
      <span id="time"></span>
    </div>
  </div>

  <div class="bottom">
    <div class="turns" id="turns">
      <span>0</span>
      <span>Züge</span>
    </div>
    <div class="trys">
      <span>0</span>
      <span>Versuche</span>
    </div>
    <div class="correct" id="correct">
      <span>0</span>
      <span>Richtig</span>
    </div>
  </div>

</div>
</div>

<script src="/src/toft/js/stopwatch.js"></script>
<script src="/src/toft/js/main.js"></script>
</body>

</html>
