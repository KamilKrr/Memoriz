<link href="/public/css/list-component.css" rel="stylesheet">
<link href="/public/css/list-header.css" rel="stylesheet">
<section class="section">
    <div class="container">
        <h2 class="title">Wähle zum spielen ein Memory-Set aus!</h2>
        <div class="columns">
            <div class="field has-addons column is-5">
                <div class="control is-expanded">
                    <input class="input memorySetSuche" type="text" placeholder="Finde ein Memory">
                </div>
                <div class="control">
                    <a class="button is-primary">
                        Suche
                    </a>
                </div>
            </div>
            <div class="column is-hidden-mobile"></div>
            <div class="column">
                <div class="control has-icons-left">
                    <div class="select">
                        <select class="kategorieFilter">
                            <option selected value="leer">Kategorie - leer</option>
                            <?= $getKategorien()?>
                        </select>
                    </div>
                    <span class="icon is-left is-normal">
                        <i class="fas fa-align-justify"></i>
                    </span>
                </div>
            </div>
            <div class="column">
                <div class="control has-icons-left">
                    <div class="select">
                        <select class="jahrgangFilter">
                            <option selected value="leer">Jahrgang - leer</option>
                            <?= $getJahrgaenge()?>
                        </select>
                    </div>
                    <span class="icon is-left is-normal">
                    <i class="fas fa-chalkboard-teacher"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="columns is-mobile is-marginless list-header">
            <div class="column is-1"></div>
            <div class="column">Name</div>
            <div class="kategorie column is-one-fifth is-hidden-mobile">Kategorie</div>
            <div class="jahrgang column is-one-fifth is-hidden-mobile">Jahrgang</div>
            <div class="column is-one-fifth"></div>
        </div>
    </div>