

<div id="work" class="page">
	<div class="container">

    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page title_new_events">
                    <h2 class="title ">Couverture evenementiel</h2>
                </div>
            </div>

			<p class="title-description-news span8">Depuis longtemps passionné de <strong>phographie prise sur le vif</strong>, j'ai vite compris que l'evenementiel est un tres bon vivier pour ce type de cliché. Ce qui m'annime, c'est d'<strong>arriver à transmettre l'intensité</strong>, la chaleur, la beauté, d'un moment, a traver une image figé dans le temps.</p>


		</div>
        <!-- End Title Page -->

        <!-- Event Shoot -->
        <div class="wrappe_new_events" >
			<?php foreach ($new_events as $key => $event): ?>
				<div class="new_event">
					<a href="<?= Configure::read('host') ?>/archives/galerie/<?= $event['CategoriesPhoto']['slug'] ?>">
						<div class="wrapper_img">
                            <div class="pict_event" style="background-image:url('<?= $this->Image->resizedUrl('..'.$event['CategoriesInformation']['img_cat'],"367", "250") ?>')"></div>
                        </div>
					</a>
					<div class="info_event" >
						<p>
							<span><?= $event['CategoriesInformation']['type'] ?></span>
							<?php
								$date = new DateTime($event['CategoriesInformation']['date']);
							?>
							<span><?=  $date->format('d/m/Y') ?><span>
						</p>
						<p
							<a href="<?= Configure::read('host') ?>/archives/galerie/<?= $event['CategoriesPhoto']['slug'] ?>">
								<?= $event['CategoriesInformation']['sub_name'] ?>
							</a>
						</p>
						<p><?= $event['CategoriesInformation']['location'] ?></p>
					</div>
				</div>
			
			<?php endforeach; ?>

		</div>
        <!-- End  Event Shoot -->

		<a href="<?= Configure::read('host') ?>/archives/categorie/event" class="btn-more" > Voir plus </a>



    </div>
</div>