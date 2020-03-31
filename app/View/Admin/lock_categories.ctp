<div class="wrapper_title">
    <h1 class="title">
        Catégories
        <div class="wrapper_link">
            <a href="<?= Configure::read('host') ?>/l/Admin/update_categorie" class="btn"> + </a>
        </div>
    </h1>
</div>

<div class="wrapper_list_items">

    <ul>
        <?php foreach ($categories as $key => $categorie): ?>
            <li>
                <?= $categorie['CategoriesPhoto']['slug'] ?>
                <div class="wrapper_action">
                    <ul>
                        <li>
                            <a href="<?= Configure::read('host') ?>/archives/categorie/<?= $categorie['CategoriesPhoto']['slug'] ?> "
                               target="_blank">Voir </a>
                        </li>
                        <li>
                            <a href="<?= Configure::read('host') ?>/l/Admin/update_categorie/<?= $categorie['CategoriesPhoto']['id'] ?> ">Modifier </a>
                        </li>
                        <?php if (empty($categorie["CategoriesPhoto"]['child'])) : ?>
                            <li>
                                <a href="<?= Configure::read('host') ?>/l/Admin/delete_categorie/<?= $categorie['CategoriesPhoto']['id'] ?> ">Supprimer</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>

            <?php if (!empty($categorie["CategoriesPhoto"]['child'])) : ?>
                <?php foreach ($categorie["CategoriesPhoto"]['child'] as $key_child_cat => $child_cat) : ?>

                    <li class="sub">
                        - <?= $child_cat['CategoriesPhoto']['slug'] ?>
                        <div class="wrapper_action">
                            <ul>
                                <li>
                                    <a href="<?= Configure::read('host') ?>/archives/categorie/<?= $child_cat['CategoriesPhoto']['slug'] ?> "
                                       target="_blank">Voir </a>
                                </li>
                                <li>
                                    <a href="<?= Configure::read('host') ?>/l/Admin/update_categorie/<?= $child_cat['CategoriesPhoto']['id'] ?> ">Modifier </a>
                                </li>
                                <li>
                                    <a href="<?= Configure::read('host') ?>/l/Admin/delete_categorie/<?= $child_cat['CategoriesPhoto']['id'] ?> ">Supprimer</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>