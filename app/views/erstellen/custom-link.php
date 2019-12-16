<section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
        <div class="container">
            <p class="title">
                Hier ist dein persönlicher Link zum Memory
            </p>
            <p>Teile diesen mit deinen Freunden!</p>

            <div class="columns">

                <div class="column is-centered is-narrow">
                    <div class="control">
                        <input class="input is-medium customLinkInput" type="text" size="62"
                            value="memoriz.it/lernen/memory/<?= $link ?>" readonly>
                    </div>
                </div>
                <div class="column is-centered is-narrow">
                    <a href="https://memoriz.it/lernen/memory/<?= $link ?>">
                        <button class="button is-medium is-primary">
                            <span>Spielen</span>
                            <span class="icon is-small"><i class="fas fa-play" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
                <div class="column is-centered is-narrow">
                    <a>
                        <button class="button is-medium is-primary is-light copyLinkButton">
                            <span>Kopieren</span>
                            <span class="icon is-small"><i class="fas fa-copy" aria-hidden="true"></i></span>
                        </button>
                    </a>
                </div>
            </div>

            <p>
                <b>Achtung!</b> Dieser Link kann nicht wiederhergestellt werden! Speichere diesen gut ab!
            </p>
        </div>
    </div>
</section>

<script>
    document.querySelector(".copyLinkButton").addEventListener("click", copyLink);

    function copyLink() {
        var linkInput = document.querySelector(".customLinkInput");

        linkInput.select();
        linkInput.setSelectionRange(0, 99999); /*For mobile devices*/

        document.execCommand("copy");
    }
</script>