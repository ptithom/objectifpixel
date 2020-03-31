
<div class="wrapper_title">
    <h1 class="title">
        Ajouter une Actualité
    </h1>
</div>

<?= $this->Form->create(null, array('url' => '/l/admin/add_actualite')); ?>

	<?= $this->Form->input('Actualite.title', array('type' => 'string', 'label' => "Titre")); ?>
	<?= $this->Form->input('Actualite.content',array('type' => 'textarea', 'escape' => false, 'label' => "Texte")); ?>
	<?php
		foreach ($Photographes as $key => $Photographe) {
			$Photographe = current($Photographe);
			$option[$Photographe['id']] = $Photographe['name'];
		}
	?>
    <?= $this->Form->input('Actualite.photographe_id', array('options' => $option)); ?>
    <?= $this->Form->input('Actualite.link', array('type' => 'string', 'label' => "Lien")); ?>

<?= $this->Form->end('Enregistrer') ?>
