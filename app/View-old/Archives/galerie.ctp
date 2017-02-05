<?php echo $this->element('header'); ?>
<?php echo $this->element('breadcrumbs'); ?>
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
	    <?php endif; ?>

		<div class="row">
			<div class="span16" style="width: 100%;">
				<div class="row">
			    	<section id="projects">
			        	<ul id="thumbs">

			                <?php foreach ($Photo as $key => $value): ?>
			                    <li class="item-thumbs span3 <?= $value['Photo']['categories_photo_id'] ?>">
			                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="<?= Configure::read('host').$value['Photo']['link'] ?>">
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
	</div>
</div>