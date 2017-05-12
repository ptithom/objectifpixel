<?php echo $this->element('header'); ?>
<div id="work" class="page-alternate2">
	<div class="container onepixoneweek">

        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page title_new_events">
                    <h1 class="title ">Mon Carnet Photographique</h1>
                </div>
            </div>
        </div>
        <!-- End Title Page -->

		<div class="row">
			<div class="span16" style="width: 100%;">
				<div class="row">
			    	<section id="projects">
			        	<ul id="thumbs">
			                <?php foreach ($Photo as $key => $value): ?>
			                    <li class="item-thumbs span3 <?= $value['Photo']['categories_photo_id'] ?>" style="background-image:url(<?= str_replace('../','',$this->Image->resizedUrl('../'.$value['Photo']['link'],'300', '300')) ?>)">
			                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="<?= Configure::read('host').$value['Photo']['link'] ?>">
			                            <span class="overlay-img"></span>
			                            <?php
											$date = new DateTime($value['Photo']['date']);
										?>
			                            <span class="overlay-img-thumb "><?=  $date->format('d/m/Y') ?></span>
			                        </a>
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