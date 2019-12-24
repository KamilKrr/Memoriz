<link rel="stylesheet" href="/public/lernen/css/normalize.css">
<link rel="stylesheet" href="/public/lernen/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive+Mono&display=swap" rel="stylesheet">
<section id="maingame">
    <div id="gamecomplete" class="">
        <div>
            <h2>Herzlichen Glückwunsch</h2>
            <p>Du hast das <?= $name ?> Memory geschafft!</p>
            <p>Deine Zeit:</p>
            <div class="clock" id="clock2">
                <span id="time2"></span>
            </div>

            <p>
                <br>Eine detailiertere Ansicht der Kartenpaare findest du hier:
            </p>
            <div class="info-button">
                <a href="https://memoriz.it/ergebnis"><button class="button is-block is-primary is-outlined" value="info">
                        <span class="icon">
                            <i class="fas fa-info"></i>
                        </span>
                        <span>
                            INFO
                        </span>
                    </button>
                </a>
            </div>

            <a href="https://memoriz.it/kategorie" class="is-primary">
                <span class="icon back-arrow is-large">
                    <i class="fas fa-arrow-left fa-2x"></i>
                </span>
            </a>

            <h2>Eure Meinung zählt!</h2>
            <p>
                Wir sind gerade in der Entwicklungsphase und würden uns sehr über euer Feedback freuen.</br>
                Das Formular dauert nicht lange und hilft uns sehr Memoriz zu verbessern.
            </p>
            <p>
                <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=EDLCnlcOnkC-rAXnVeo92Av6sS-lLdVIsWJ6AlfeUMZUOEpUVDlJTDVDTFc2N1o1TFdDVDFTNUtFTC4u" target="_blank">Zum Feedback Formular</a>
            </p>

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
                <h2><?= $info ? "Info" : "" ?></h2>
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