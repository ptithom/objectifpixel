<?= $this->Form->create(null, array('url' => '/l/admin/update_photographe')); ?>

    <div class="wrapper_title">
        <h1 class="title">
            Mon compte
        </h1>
    </div>

<?= $this->Form->input('Photographe.id', array('type' => 'hidden')); ?>
<?= $this->Form->input('Photographe.name', array('type' => 'string')); ?>
<?= $this->Form->input('Photographe.link', array('type' => 'string')); ?>
<?= $this->Form->input('Photographe.desc', array('type' => 'textarea', 'escape' => false)); ?>
<?= $this->Form->input('Photographe.email', array('type' => 'email')); ?>
<?= $this->Form->input('Photographe.passwd', array('type' => 'password')); ?>
<?php if(!empty($this->request->data['Photographe']["id"])): ?>
<?= $this->Form->input('Photographe.new_passwd', array('type' => 'password')); ?>
<?php endif; ?>

<?= $this->Form->submit('Enregister') ?>
<?= $this->Form->end() ?>
