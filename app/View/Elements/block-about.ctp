<div id="about" class="page-alternate">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Objectif Pixel</h2>
                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <div class="row">
            <div class="span12">

                <?= $this->Image->resize('perso.png', "130", "130", array('alt' => 'thomas sire', 'class' => 'logo_moi'), 100); ?>
                <div class="info-block">
                    <div class="info-text">
                        <h3><span class="color-text"><?= $photographe['Photographe']['name'] ?></span> - Photographe
                            événementiel</h3>
                        <?= $photographe['Photographe']['desc'] ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End People -->
    </div>
</div>