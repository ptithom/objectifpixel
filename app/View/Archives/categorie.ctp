<?php echo $this->element('header'); ?>
<?php echo $this->element('breadcrumbs'); ?>
<div id="work" class="page categories">
        <div class="container categories">
        <?php foreach($categories as $categorie): ?>
            <?php $categorie = $categorie; ?>
            <?php if(!empty($categorie['CategoriesInformation'])): ?>
                <?php $html = '
                <div class="span4 profile">
                    <div class="image-wrap">
                        <div class="hover-wrap">
                            <span class="overlay-img"></span>
                            <span class="overlay-text-thumb">'.$categorie['CategoriesInformation']['sub_name'].'</span>
                        </div>
                        <div class="pict_cat" style="background-image:url('. str_replace('../','',$this->Image->resizedUrl('../'.$categorie['CategoriesInformation']['img_cat'],'300', '300')).')"></div>
                    </div>
                </div>';
                ?>
            <?php else: ?>
                <?php $html = '
                    <div class="span4 profile">
                    <div class="image-wrap">
                    <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <span class="overlay-text-thumb">'.$categorie['CategoriesPhoto']['slug'].'</span>
                    </div>
                    <div class="pict_cat" ></div>

                    </div>
                    </div>';
                    ?>
            <?php endif; ?>

            <?php    
                echo $this->Html->link($html,
                    array('controller' => 'archives', 'action' => 'categorie' , $categorie['CategoriesPhoto']['slug']),
                    array('escape' => false) 
                );
            ?>

        <?php endforeach; ?>
    </div>
</div>
