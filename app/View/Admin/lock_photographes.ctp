<div class="wrapper_title">
    <h1 class="title">
       Catégories
        <div class="wrapper_link">
            <a href="<?= Configure::read('host') ?>/l/Admin/add_categorie" class="btn"> + </a>
        </div>
    </h1>
</div>

<div class="wrapper_list_items">

    <ul>
        <?php foreach ($categories as $key => $categories): ?>
        <li>
            <?= $categories['CategoriesPhoto']['slug'] ?>
            <div class="wrapper_action">
                <ul>
                    <li>
                        <a href="<?= Configure::read('host') ?>/archives/categorie/<?= $categories['CategoriesPhoto']['slug'] ?> " target="_blank">Voir </a>
                    </li>
                    <li>
                        <a href="<?= Configure::read('host') ?>/l/Admin/update_categorie/<?= $categories['CategoriesPhoto']['id'] ?> ">Modifier </a>
                    </li>
                    <li>
                        <a href="<?= Configure::read('host') ?>/l/Admin/delete_categorie/<?= $categories['CategoriesPhoto']['id'] ?> ">Supprimer</a>
                    </li>
                </ul>
                 </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>