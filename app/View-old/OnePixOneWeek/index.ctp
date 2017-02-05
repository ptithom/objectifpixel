<?php echo $this->element('header'); ?>
<div id="work" class="page-alternate2">
	<div class="container onepixoneweek">
		<div class="row">
			<div class="span16" style="width: 100%;">
				<div class="row">
			    	<section id="projects">
			        	<ul id="thumbs">

			                <?php foreach ($Photo as $key => $value): ?>
			                    <li class="item-thumbs span3 <?= $value['Photo']['categories_photo_id'] ?>">
			                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="<?= Configure::read('host').$value['Photo']['link'] ?>">
			                            <span class="overlay-img"></span>
			                            <?php
											$date = new DateTime($value['Photo']['date']);
										?>
			                            <span class="overlay-img-thumb "><?=  $date->format('d/m/Y') ?></span>

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