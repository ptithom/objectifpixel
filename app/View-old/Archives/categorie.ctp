<?php echo $this->element('header'); ?>
<?php echo $this->element('breadcrumbs'); ?>
<div id="work" class="page categories">
        <div class="container">
        <?php foreach($categories as $categorie): ?>
            <?php $categorie = current($categorie); ?>
            <?php $html = '
            <div class="span4 profile">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <span class="overlay-text-thumb">'.$categorie['slug'].'</span>
                    </div>'.

                    $this->Html->image('profile/profile-02.jpg', array('alt' => $categorie['slug']))

                    .'
                </div>
            </div>';
            ?>

            <?php    
                echo $this->Html->link($html,
                    array('controller' => 'archives', 'action' => 'categorie' , $categorie['slug']),
                    array('escape' => false) 
                );
            ?>

        <?php endforeach; ?>
    </div>
</div>
