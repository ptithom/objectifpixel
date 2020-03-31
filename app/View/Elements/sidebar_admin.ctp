


<aside id="menu-admin">
	<ul id="menu-nav-admin">
    	<li><a href="<?= Configure::read('host') ?>/l/Admin/update_photographe/<?= $this->Session->read('Auth.User.Photographe.id'); ?>">Mon Compte</a></li>
        <li>
            <a href="<?= Configure::read('host') ?>/l/Admin/categories">Mes Shootings</a>
            <ul class="sub-menu">
                <li><a href="<?= Configure::read('host') ?>/l/Admin/update_categorie"> - Ajouter une catégorie</a></li>
                <li><a href="<?= Configure::read('host') ?>/l/Admin/update_photo"> - Ajouter des photos</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= Configure::read('host') ?>/l/Admin/actualites">Mes Actualités</a>
            <ul class="sub-menu">
                <li><a href="<?= Configure::read('host') ?>/l/Admin/update_actualite"> - Ajouter</a></li>
            </ul>
        </li>
<!--        <li>-->
<!--            <a href="--><?//= Configure::read('host') ?><!--/l/Admin/photographes">Photographe</a>-->
<!--            <ul class="sub-menu">-->
<!--                <li><a href="--><?//= Configure::read('host') ?><!--/l/Admin/update_photographe"> - Ajouter</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li><a href="--><?//= Configure::read('host') ?><!--/l/Admin/">ADD Book</a></li>-->
        <li><a href="<?= Configure::read('host') ?>/Admin/logout">Logout</a></li>
    </ul>
</aside>