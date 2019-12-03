<div class="container list-component memorySet">
    <div class="columns is-mobile is-marginless memory-set-header">
        <div class="column is-1 chevron">
                <span class="icon dropdown-arrow">
                    <i class="fas fa-chevron-down"></i>
                </span>
        </div>
        <h3 class="name column memory-set-name"><?= $name?></h3>
        <div class="kategorie column is-one-fifth is-hidden-mobile"><?= $kategorie?></div>
        <div class="jahrgang column is-one-fifth is-hidden-mobile"><span><?= $jahrgang?></span>. Jahrgang</div>
        <div class="column is-one-fifth">
            <a href="https://memoriz.it/lernen/memory/<?= $link ?>">
                <button class="button is-primary is-small">
                    <span class="icon arrow has-text-white">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </button>
            </a>
        </div>   
    </div>
    <div class="columns is-multiline is-mobile is-hidden dropdown">
        <div class="info column is-full-mobile rows">
            <h4 class="row"><strong>Info</strong></h4>
            <p class="row memory-set-beschreibung"><?= $beschreibung?></p>
        </div>
        <div class="author column is-one-fifth-desktop is-one-fifth-tablet is-half-mobile">
            <h4 class="row"><strong>Autor</strong></h4>
            <p class="row memory-set-autor"><?= $autor?></p>
        </div>
        <div class="author column is-hidden-desktop is-hidden-tablet is-half-mobile">
            <h4 class="row"><strong>Jahrgang</strong></h4>
            <p class="row"><span class="memory-set-jahrgang"><?= $jahrgang?></span. Jahrgang</p>
        </div>
        <div class="author column is-hidden-desktop is-hidden-tablet is-half-mobile">
            <h4 class="row"><strong>Kategorie</strong></h4>
            <p class="row memory-set-kategorie"><?= $kategorie?></p>
        </div>
        <div class="tags column is-one-fifth-desktop is-one-fifth-tablet is-half-mobile">
            <h4 class="row"><strong>Tags</strong></h4>
            <div class="row memory-set-tags">
                <?= $getTags()?>
            </div>
        </div>
        <div  class="column is-one-fifth"></div>
    </div>
</div>