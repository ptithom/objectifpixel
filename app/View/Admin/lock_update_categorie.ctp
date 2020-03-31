<div class="wrapper_title">
    <h1 class="title">
        <?php if (!empty($this->request->data["CategoriesPhoto"]['id'])): ?>
            Modifier une Catégorie
        <?php else: ?>
            Ajouter une Catégorie
        <?php endif; ?>

        <div class="wrapper_link">
            <?php if (!empty($this->request->data["CategoriesPhoto"]['id'])): ?>
                <a class="btn"
                   href="<?= Configure::read('host') ?>/archives/categorie/<?= $this->request->data['CategoriesPhoto']['slug'] ?> "
                   target="_blank">F.O.</a>
                <a class="btn"
                   href="<?= Configure::read('host') ?>/l/Admin/delete_categorie/<?= $this->request->data['CategoriesPhoto']['id'] ?>">Supprimer</a>

            <?php if (!empty($this->request->data["CategoriesPhoto"]['categories_photo_id'])): ?>
                <a class="btn"
                   href="<?= Configure::read('host') ?>/l/Admin/update_photo/<?= $this->request->data['CategoriesPhoto']['id'] ?>">Photos</a>
            <?php endif; ?>
            <?php else: ?>
                <a class="btn" href="<?= Configure::read('host') ?>/l/Admin/categories/">Mes shooting</a>
            <?php endif; ?>
        </div>

    </h1>
</div>

<?= $this->Form->create(null, array('url' => '/l/admin/update_categorie', 'type' => 'file')); ?>

<?= $this->Form->input('CategoriesInformation.sub_name', array('type' => 'string', 'label' => "Titre")); ?>
<?= $this->Form->input('CategoriesPhoto.id', array('type' => 'hidden')); ?>
<?= $this->Form->input('CategoriesPhoto.slug', array('type' => 'string')); ?>

<?php if (empty($this->request->data['CategoriesPhoto']['id']) || (!empty($this->request->data['CategoriesPhoto']['id']) && !empty($this->request->data['CategoriesPhoto']['categories_photo_id']))): ?>
    <?= $this->Form->input('CategoriesPhoto.categories_photo_id', array('options' => $options_cat, 'label' => "Catégorie")); ?>
<?php elseif (!empty($this->request->data['CategoriesPhoto']['id']) && empty($this->request->data['CategoriesPhoto']['categories_photo_id'])): ?>
   <div class="input">
       Cette catégorie a des enfants, elle ne peut donc pas etre modifié.
   </div>
<?php endif; ?>

<?= $this->Form->input('CategoriesPhoto.desc_cat', array('type' => 'textarea', 'escape' => false, 'label' => "Description")); ?>

<?= $this->Form->input('CategoriesInformation.img_cat', array('type' => 'file', 'label' => "Image de présentation ( Max : " . ini_get('upload_max_filesize') . ")")); ?>

<?php if (!empty($this->request->data['CategoriesInformation']['img_cat'])): ?>
    <div class="preview_img"
         style="background-image:url('<?= Configure::read('host') ?>/app/webroot<?= $this->request->data['CategoriesInformation']['img_cat'] ?>')"></div>
<?php endif; ?>

<?= $this->Form->input('CategoriesPhoto.cat_def', array('type' => 'hidden', 'value' => "1")); ?>


<?= $this->Form->input('CategoriesInformation.id', array('type' => 'hidden')); ?>
<?= $this->Form->input('CategoriesInformation.date', array('type' => 'date', 'label' => "Date du shooting")); ?>
<?= $this->Form->input('CategoriesInformation.location', array('type' => 'string', 'label' => "Lieu du shooting")); ?>
<?= $this->Form->input('CategoriesPhoto.event', array('options' => array('1' => 'Oui', '0' => 'Non'))); ?>
<?= $this->Form->input('CategoriesInformation.type', array('label' => "Type d'evenemen", 'options' => array(
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

