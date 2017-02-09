<?php echo $this->element('header_admin'); ?>
<?php echo $this->element('sidebar_admin'); ?>
<div style="text-align: center;margin-top:50px;">
<?= $this->Form->create(null, array('url' => '/l/admin/add_photo','type' => 'file')); ?>

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
    <?= $this->Form->input('Photo.date', array('type' => 'date', 'multiple')); ?>
	<?= $this->Form->input('Photo.images.', array('type' => 'file', 'multiple')); ?>
    <?= $this->Form->input('Photo.desc', array('type' => 'text')); ?>


<?= $this->Form->end('Submit') ?>
</div>