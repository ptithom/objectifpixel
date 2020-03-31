
<?php if(!empty($photographies)): ?>
    <ul class="gal_cat">
        <?php foreach ($photographies as $key => $photo): ?>
            <li >
                <div class="preview_img"
                     style="background-image:url('<?= Configure::read('host') ?><?= $photo['Photo']['link'] ?>')">

                    <a class="link"
                       href="<?= Configure::read('host') ?>/l/Admin/delete_photo/<?= $photo['Photo']['id'] ?>">Supprimer</a>

                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>


<div class="wrapper_title">
	<h1 class="title">
        Ajouter des photographies
        <?php if (!empty($this->request->data["Photo"]['categories_photo_id'])): ?>
        <div class="wrapper_link">
            <a class="btn" href="<?= Configure::read('host') ?>/l/Admin/update_categorie/<?= $this->request->data['Photo']['categories_photo_id'] ?>">Modifier la catégorie</a>
        </div>
            <?php endif; ?>

	</h1>
</div>

<?= $this->Form->create(null, array('url' => '/l/admin/update_photo','type' => 'file')); ?>

	<?= $this->Form->input('Photo.photographe_id', array('type' => 'hidden')); ?>
	<?php
		foreach ($categories as $key => $categorie) {
			$categorie = current($categorie);
			$option[$categorie['id']] = $categorie['slug'];
			if(!empty($categorie['child'])){
				foreach ($categorie['child'] as $key_child_cat => $child_cat) {
					$child_cat = current($child_cat);
					$option[$child_cat['id']] = '- '.$child_cat['slug'];
				}

			}
		}
	?>
    <?= $this->Form->input('Photo.categories_photo_id', array('options' => $option)); ?>
    <?= $this->Form->input('Photo.date', array('type' => 'date')); ?>
	<?= $this->Form->input('Photo.images.', array('type' => 'file', 'multiple','label'=>"Mes photographies ( Max : ".ini_get('upload_max_filesize').")")); ?>
    <?= $this->Form->input('Photo.desc', array('type' => 'textarea')); ?>


<?= $this->Form->end('Enregistrer') ?>



