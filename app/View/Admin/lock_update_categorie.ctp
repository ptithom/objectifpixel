<div class="wrapper_title">
    <h1 class="title">
        Ajouter / Modifier une Catégorie

        <?php if(!empty($this->request->data["CategoriesPhoto"]['id'])): ?>
            <div class="wrapper_link">
                <a class="btn" href="<?= Configure::read('host') ?>/l/Admin/update_categorie/<?= $this->request->data['CategoriesPhoto']['id'] ?> ">Modifier </a>
                <a class="btn" href="<?= Configure::read('host') ?>/l/Admin/delete_categorie/<?= $this->request->data['CategoriesPhoto']['id'] ?> ">Supprimer</a>
            </div>
        <?php endif; ?>
    </h1>

</div>

<?= $this->Form->create(null, array('url' => '/l/admin/add_categorie', 'type' => 'file')); ?>

    <?= $this->Form->input('CategoriesInformation.sub_name', array('type' => 'string', 'label' => "Titre")); ?>
    <?= $this->Form->input('CategoriesPhoto.slug', array('type' => 'string')); ?>
    <?php
    foreach ($categories as $key => $categorie) {
        $categorie = current($categorie);
        $option[$categorie['id']] = $categorie['slug'];
    }
    $option['NULL'] = 'Catégorgie racine';
    ?>
    <?= $this->Form->input('CategoriesPhoto.categories_photo_id', array('options' => $option, 'label' => "Catégorie")); ?>
    <?= $this->Form->input('CategoriesInformation.img_cat', array('type' => 'file', 'label' => "Image de présentation")); ?>
    <?= $this->Form->input('CategoriesPhoto.desc_cat', array('type' => 'textarea', 'escape' => false, 'label' => "Description")); ?>
    <?= $this->Form->input('CategoriesPhoto.cat_def', array('type' => 'hidden', 'value' => "1")); ?>


    <?= $this->Form->input('CategoriesInformation.date', array('type' => 'date', 'label' => "Date du shooting")); ?>

    <?= $this->Form->input('CategoriesInformation.location', array('type' => 'string', 'label' => "Lieu du shooting")); ?>

    <?= $this->Form->input('CategoriesPhoto.event', array('options' => array('1' => 'Oui', '0' => 'Non'))); ?>
    <?= $this->Form->input('CategoriesInformation.type', array('label' => "Type d'evenemen",'options' => array(
        '' => "Non-défini",
        'Festival - Musique' => 'Festival - Musique',
        'Festival - Cirque' => 'Festival - Cirque',
        'Soirée Concert' => 'Soirée Concert',
        'Musique' => 'Musique',
        'Théâtre' => 'Théâtre',
        'Roller Derby' => 'Roller Derby',
        'Cirque' => 'Cirque'
    ))); ?>

<?= $this->Form->end('Enregistrer') ?>

