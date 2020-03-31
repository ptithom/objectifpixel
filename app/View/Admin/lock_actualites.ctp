<div class="wrapper_title">
    <h1 class="title">
       Mes Actualitées
        <div class="wrapper_link">
            <a href="<?= Configure::read('host') ?>/l/Admin/update_actualite" class="btn"> + </a>
        </div>
    </h1>
</div>

<div class="wrapper_list_items">

    <ul>
        <?php foreach ($actualites as $key => $actualite): ?>
        <li>
            <?= substr($actualite['Actualite']['content'],0,60) ?>[...]
            <div class="wrapper_action">
                <ul>
                    <li>
                        <a href="<?= Configure::read('host') ?>/l/Admin/update_actualite/<?= $actualite['Actualite']['id'] ?> ">Modifier </a>
                    </li>
                    <li>
                        <a href="<?= Configure::read('host') ?>/l/Admin/delete_actualite/<?= $actualite['Actualite']['id'] ?> ">Supprimer</a>
                    </li>
                </ul>
                 </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>