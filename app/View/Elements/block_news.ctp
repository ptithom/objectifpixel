<div id="work" class="page">
	<div class="container">
    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Les nouveautées</h2>
                    <div class="title-description">Regarder les derniers <strong>Shooting</strong> publier.</div>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Shoot -->
        <div class="row">
        	<div class="span3">
            	<!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                    	<li class="type-work">Categorie de Shoot:</li>
                        <li><a href="#filter" data-option-value="*" class="selected">Touts les Shooting</a></li>
                        <?php foreach ($categories as $key => $value): ?>
                            <li><h3><a href="#filter" data-option-value=".<?= $value['CategoriesPhoto']['id'] ?>"><?= $value['CategoriesPhoto']['name'] ?></a></h3></li>
                        <?php endforeach ?>
                    </ul>
                </nav>
                <!-- End Filter -->
            </div>

            <div class="span9">
            	<div class="row">
                	<section id="projects">
                    	<ul id="thumbs">

                            <?php foreach ($new_photos as $key => $value): ?>
                                <li class="item-thumbs span3 <?= $value['Photo']['categories_photo_id'] ?>">
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<a href='<?= Configure::read('host') ?>/archives/categorie/<?= $value['CategoriesPhoto']['name'] ?>' ><?= $value['CategoriesPhoto']['name'] ?></a>" href="<?= Configure::read('host').$value['Photo']['link'] ?>">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-search"></span>
                                    </a>
                                    <?= $this->Html->image('../'.$value['Photo']['link'], array('alt' => 'Objectif-pixel',"width")); ?>
                                </li>
                            <?php endforeach ?>

                        </ul>
                    </section>
                    
            	</div>
            </div>

        </div>
        <!-- End Portfolio Projects -->



    </div>
</div>