<?php echo $this->element('header_admin'); ?>
<?php echo $this->element('sidebar_admin'); ?>
<div style="text-align: center;margin-top:50px;">
<?= $this->Form->create(null, array('url' => '/l/admin/add_categorie','type' => 'file')); ?>

	<?= $this->Form->input('CategoriesPhoto.slug', array('type' => 'string')); ?>
    <?php
		foreach ($categories as $key => $categorie) {
			$categorie = current($categorie);
			$option[$categorie['id']] = $categorie['slug'];
		}
		$option['NULL'] = 'Catégorgie racine';
	?>
    <?= $this->Form->input('CategoriesPhoto.categories_photo_id', array('options' => $option)); ?>
    <?= $this->Form->input('CategoriesPhoto.desc_cat', array('type' => 'textarea', 'escape' => false)); ?>
    <?= $this->Form->input('CategoriesPhoto.cat_def', array('type' => 'hidden','value' => "1")); ?>
    <?= $this->Form->input('CategoriesPhoto.event', array('options' => array('1' => 'Oui', '0' => 'Non'))); ?>
    <?= $this->Form->input('CategoriesInformation.type', array('options' => array(
    'Festival - Musique' => 'Festival - Musique',
    'Festival - Cirque' => 'Festival - Cirque',
    'Soirée Concert' => 'Soirée Concert',
    'Musique' => 'Musique',
    'Théâtre' => 'Théâtre',
    'Roller Derby' => 'Roller Derby',
    'Cirque' => 'Cirque',
     ))); ?>
    <?= $this->Form->input('CategoriesInformation.img_cat', array('type' => 'file')); ?>
    <?= $this->Form->input('CategoriesInformation.date', array('type' => 'date')); ?>
    <?= $this->Form->input('CategoriesInformation.sub_name', array('type' => 'string')); ?>
    <?= $this->Form->input('CategoriesInformation.location', array('type' => 'string')); ?>
    

<?= $this->Form->end('Submit') ?>
</div>
