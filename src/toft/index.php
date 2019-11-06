<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Memoriz</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="/src/toft/css/normalize.css">
  <link rel="stylesheet" href="/src/toft/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cutive+Mono&display=swap" rel="stylesheet">

</head>

<body onload="show();">
<div class="field" onclick="start()">
  <div class="field-center" id="cardBoard">
  </div>
</div>
<div class="stats">
<div class="navbar">
  <div class="login">

  </div>
  <div class="logo">
    <img src="resources/logo_purpleish.png">
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
      <span>Turns</span>
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
<script src="/src/toft/js/main.js"></script>
<script src="/src/toft/js/stopwatch.js"></script>
</body>

</html>