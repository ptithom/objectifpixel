
<div class="wrapper_connect">
    <div class="vertical-center">
        <div class="wrapper_logo">
            <img src="/img/slider-images/logo_blanc.png" class="logo" />
        </div>
        <div>
            <?php if (!empty($mess)): ?>
                <div class="alert alert-warning" role="alert">
                    <?= $mess ?>
                </div>
            <?php endif; ?>
            <?= $this->Form->create(null, array('url' => '/admin/connect')); ?>
            <div class="wrapper_input">
                <?= $this->Form->input('photographe.email', array('type' => 'text','placeholder' => "E-mail","label"=> false)); ?>
                <?= $this->Form->input('photographe.passwd', array('type' => 'password','placeholder' => "MDP","label"=> false)); ?>
            </div>
            <?= $this->Form->submit('Connect', array("class" => 'btn')) ?>
        </div>


    </div>
</div>
