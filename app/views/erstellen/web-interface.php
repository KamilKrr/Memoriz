<link rel="stylesheet" href="/public/css/erstellen/style.css">

<section class="section">

    <h2 class="title">Eigenes Memory-Set erstellen</h2>

    <div class="tabs is-centered is-boxed is-medium">
        <ul>
            <li>
                <a href="https://memoriz.it/erstellen/datei_upload">
                    <span class="icon is-small"><i class="fas fa-file-upload" aria-hidden="true"></i></span>
                    <span>Datei Hochladen</span>
                </a>
            </li>
            <li class="is-active">
                <a href="https://memoriz.it/erstellen/web_interface">
                    <span class="icon is-small"><i class="fas fa-pen" aria-hidden="true"></i></span>
                    <span>im Browser erstellen</span>
                </a>
            </li>
            </li>
        </ul>
    </div>

    <section class="section content">
        <form>
            <div class="field columns is-hidden-mobile">
                <div class="column is-1">
                    <div class="content subtitle">
                        Nr.
                    </div>
                </div>
                <div class="column">
                    <div class="content subtitle">
                        Karte 1
                    </div>
                </div>
                <div class="column">
                    <div class="content subtitle">
                        Karte 2
                    </div>
                </div>
                <div class="column">
                    <div class="content subtitle">
                        Beschreibung (Optional)
                    </div>
                </div>
            </div>
            <div class="field columns memory-paar-erstellen">
                <div class="column is-1">
                    <div class="content">
                        1
                    </div>
                </div>
                <div class="column memoryKarteInput">
                    <div class="field has-addons memory-text-input">
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Text von Karte 1">
                        </div>
                        <div class="control changeMode">
                            <a class="button is-primary">
                                <i class="far fa-image"></i>
                            </a>
                        </div>
                    </div>

                    <div class="field has-addons memory-bild-input">
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Bildbeschreibung">
                        </div>
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Bildadresse">
                        </div>
                        <div class="control changeMode">
                            <a class="button is-primary">
                                <i class="fas fa-font"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column memoryKarteInput memory-bild-input-mode">
                    <div class="field has-addons memory-text-input">
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Text von Karte 2">
                        </div>
                        <div class="control changeMode">
                            <a class="button is-primary">
                                <i class="far fa-image"></i>
                            </a>
                        </div>
                    </div>

                    <div class="field has-addons memory-bild-input">
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Bildbeschreibung">
                        </div>
                        <div class="control is-expanded">
                            <input class="input" type="text" placeholder="Bildadresse">
                        </div>
                        <div class="control changeMode">
                            <a class="button is-primary">
                                <i class="fas fa-font"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="control">
                        <input class="input" type="text" placeholder="Beschreibung von Paar 1">
                    </div>
                </div>
            </div>
            <hr>

            <div class="column column is-half is-offset-one-quarter">
                <div class="buttons is-centered">
                    <button type="submit" name="submitFile" class="button is-primary">Erstellen</button>
                </div>
            </div>
        </form>
    </section>
</section>

<script>

const $changeModeButtons = Array.prototype.slice.call(document.querySelectorAll('.changeMode a'), 0);

  if ($changeModeButtons.length > 0) {
    $changeModeButtons.forEach(component => {
        component.addEventListener("click", event => {
            event.currentTarget.parentElement.parentElement.parentElement.classList.toggle("memory-bild-input-mode");
        });
    });
  }


</script>