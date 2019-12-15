<section class="section">

    <h2 class="title">Eigenes Memory-Set erstellen</h2>

    <div class="tabs is-centered is-boxed is-medium">
        <ul>
            <li class="is-active">
                <a href="https://memoriz.it/erstellen/datei_upload">
                    <span class="icon is-small"><i class="fas fa-file-upload" aria-hidden="true"></i></span>
                    <span>Datei Hochladen</span>
                </a>
            </li>
            <li>
                <a href="https://memoriz.it/erstellen/web_interface">
                    <span class="icon is-small"><i class="fas fa-pen" aria-hidden="true"></i></span>
                    <span>im Browser erstellen</span>
                </a>
            </li>
            </li>
        </ul>
    </div>
    <section class="section">
        <div class="columns">

            <div class="column column is-half is-offset-one-quarter">

                <form method="post" action="http://memoriz.it/erstellen" enctype="multipart/form-data">
                    <div class="field">
                        <div class="memoryFileUpload file is-centered is-boxed is-primary has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="memoryFile">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Datei auswählen
                                    </span>
                                </span>
                                <span class="file-name">
                                    Keine Datei ausgewählt
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="memoryName" type="text" placeholder="z.b. Straßenschilder">
                        </div>
                    </div>

                    <div class="buttons is-centered">
                        <button type="submit" name="submitFile" class="button is-primary">Erstellen</button>
                    </div>
                </form>
                <div class="is-link has-text-centered">
                    <a href="https://memoriz.it/erstellen/datei_upload/anleitung">Wie erstellt man eine Memoryset
                        Datei?</a>
                </div>
            </div>
        </div>

    </section>
</section>

<script>
    const fileInput = document.querySelector('.memoryFileUpload input[type=file]');
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector('.memoryFileUpload .file-name');
            fileName.textContent = fileInput.files[0].name;
        }
    }
</script>