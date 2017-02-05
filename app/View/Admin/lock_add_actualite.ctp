<?php echo $this->element('header_admin'); ?>
<?php echo $this->element('sidebar_admin'); ?>
<div style="text-align: center;margin-top:50px;">
<?= $this->Form->create(null, array('url' => '/l/admin/add_actualite')); ?>

	<?= $this->Form->input('Actualite.title', array('type' => 'string')); ?>
	<?= $this->Form->input('Actualite.content',array('type' => 'textarea', 'escape' => false)); ?>
	<?php
		foreach ($Photographes as $key => $Photographe) {
			$Photographe = current($Photographe);
			$option[$Photographe['id']] = $Photographe['name'];
		}
	?>
    <?= $this->Form->input('Actualite.photographe_id', array('options' => $option)); ?>
    <?= $this->Form->input('Actualite.link', array('type' => 'string')); ?>

<?= $this->Form->end('Submit') ?>
</div>
