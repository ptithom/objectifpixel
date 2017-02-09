<?php echo $this->element('header_admin'); ?>
<div style="text-align: center;margin-top:50px;">
	<?php if(!empty($mess)): ?>
		<div><?= $mess ?></div>
	<?php endif; ?>
<?= $this->Form->create(null, array('url' => '/admin/connect')); ?>

	<?= $this->Form->input('photographe.email', array('type' => 'text')); ?>
    <?= $this->Form->input('photographe.passwd', array('type' => 'password')); ?>

<?= $this->Form->end('Connect') ?>
</div>