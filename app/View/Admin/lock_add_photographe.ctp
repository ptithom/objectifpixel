<?php echo $this->element('header_admin'); ?>
<?php echo $this->element('sidebar_admin'); ?>
<div style="text-align: center;margin-top:50px;">
<?= $this->Form->create(null, array('url' => '/l/admin/add_photographe')); ?>

	<?= $this->Form->input('Photographe.name', array('type' => 'string')); ?>
    <?= $this->Form->input('Photographe.link', array('type' => 'string')); ?>
    <?= $this->Form->input('Photographe.desc', array('type' => 'textarea', 'escape' => false)); ?>
    <?= $this->Form->input('Photographe.email', array('type' => 'email')); ?>
    <?= $this->Form->input('Photographe.passwd', array('type' => 'password')); ?>
    <?= $this->Form->input('Photographe.type_user', array('type' => 'hidden')); ?>

<?= $this->Form->end('Submit') ?>
</div>
