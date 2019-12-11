<section class="hero is-link is-fullheight-with-navbar">
    <div class="hero-body">
        <div class="container">
            <p class="title">
                Hier ist dein persönlicher Link zum Memory
            </p>
            <p>Teile diesen mit deinen Freunden!</p>

            <div class="columns is-centered">

                <div class="column is-centered">
                    <div class="control">
                        <input class="input is-medium customLinkInput" type="text" value="memoriz.it/lernen/memory/<?= $link ?>"
                            readonly>
                    </div>
                </div>
                <div class="column is-centered">
                    <button class="button is-medium is-primary is-light copyLinkButton">
                        <span>Kopieren</span>
                        <span class="icon is-small"><i class="fas fa-copy" aria-hidden="true"></i></span>
                    </button>
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