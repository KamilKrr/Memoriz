<link rel="stylesheet" href="/public/lernen/css/normalize.css">
<link rel="stylesheet" href="/public/lernen/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive+Mono&display=swap" rel="stylesheet">
<section id="maingame">
    <div id="gamecomplete" class="hide">
        <div>
            <h2>Herzlichen Glückwunsch</h2>
            <p>Du hast das TOFT Memory geschafft und dich ein bisschen mit unserer Schule vertraut gemacht.</p>
            <p>Deine Zeit:</p>
            <div class="clock" id="clock2">
                <span id="time2"></span>
            </div>
            <button type="submit" value="Neustart" onClick="window.location.reload();">Neustart</button>
        </div>
    </div>
    <div class="contentMem">
        <div class="fieldContainer">
            <div class="field-center" id="cardBoard">
                <?php $getCards() ?>
            </div>
        </div>
        <div class="stats">
            <span class="infoicon icon is-large is-hidden-tablet is-hidden-desktop is-hidden-widescreen" onclick="toggleInfo()">
                <i class="fas fa-2x fa-info-circle"></i>
            </span>
            <div class="notification is-primary is-hidden" id="infoNotification">
                <button class="delete" onclick="toggleInfo()"></button>
                <h2>Info</h2>
                <span><?= $info ?></span>
            </div>
            <div class="center">
                <h1><?= $name ?></h1>
            </div>
            <div class="info is-hidden-mobile">
                <h2>Info</h2>
                <span><?= $info ?></span>
            </div>


            <div class="bottom">
                <div class="turns" id="turns">
                    <span>0</span>
                    <span>Züge</span>
                </div>
                <div class="clock" id="clock">
                    <span id="time"></span>
                    <span>Zeit</span>
                </div>
                <div class="correct" id="correct">
                    <span>0</span>
                    <span>Richtig</span>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/lernen/js/stopwatch.js"></script>
    <script src="/public/lernen/js/main.js"></script>
</section>