<?php echo $this->element('header'); ?>
<?php if($this->Session->check("breadscrumps")): ?>
    <?php echo $this->element('breadcrumbs'); ?>
<?php endif; ?>
<div id="work" class="page-alternate2">
	<div class="container">
		<?php if(!empty($categorie['CategoriesInformation'])): ?>
			 <div class="row">
	            <div class="span12 wrappe_pres_cat">
	            	<div class="pict_event" style="background-image:url('<?= Configure::read('host') ?>/app/webroot/<?= $categorie['CategoriesInformation']['img_cat'] ?>')"></div>
                    <div class="info_event" >
						<p>
							<span><?= $categorie['CategoriesInformation']['type'] ?></span>
							<?php
								$date = new DateTime($categorie['CategoriesInformation']['date']);
							?>
							<span><?=  $date->format('d/m/Y') ?><span>
						</p>
						<h1><?= $categorie['CategoriesInformation']['sub_name'] ?></h1>
						<p><?= $categorie['CategoriesInformation']['location'] ?></p>
						<p class="desc"><?= $categorie['desc_cat'] ?></p>
					</div>

	            </div>
	        </div>
        <?php else: ?>
            <div class="row">
                <div class="span12">
                    <div class="title-page title_new_events">
                        <h1 class="title "><?= $categorie['slug'] ?></h1>
                    </div>
                </div>
            </div>
	    <?php endif; ?>

        <?php if(empty($Photo)): ?>
            <div class="row">
                <div class="span12">
                    <div class="title-page title_new_events">
                        <p class="title ">C'est en cours !</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

		<div class="row">
			<div class="span16" style="width: 100%;">
				<div class="row">
			    	<section id="projects">
			        	<ul id="thumbs" class="galerie">
                            <?php foreach ($Photo as $key => $value): ?>
                                <li class="item-thumbs span3 <?= $value['Photo']['categories_photo_id'] ?>" >
                                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="<?= Configure::read('host').$value['Photo']['link'] ?>">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-search"></span>
                                    </a>
                                    <?php $date = new DateTime($value['Photo']['date']); ?>
                                    <?php $alt = 'Objectif-pixel - '.$date->format('d/m/Y'); ?>
                                    <?= $this->Image->resize('../'.$value['Photo']['link'],"300", "300",
                                    array('alt' => (!empty($value['Photo']['desc']))? $alt." - ".$value['Photo']['desc']:$alt),
                                    100
                                    ); ?>
                                </li>
                            <?php endforeach ?>
			            </ul>
			        </section>
				</div>
			</div>
		</div>
	</div>
</div>

        <?php echo $this->element('call_contact'); ?>