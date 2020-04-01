<?php
$access_token = "4e427830d6d027511b46e63281c4896d";
$last_story_post = null;
if (file_get_contents('https://graph.facebook.com/objectifpixel/feed?access_token=' . $access_token)) {
    $mur = json_decode(file_get_contents('https://graph.facebook.com/objectifpixel/feed?access_token=' . $access_token));
    foreach ($mur->data as $key => $value) {
        if (!empty($value->status_type)) {
            $val = $value->status_type;
            if ($val == 'shared_story') {
                $last_story_post = $value;
            }
        }
    }
}

?>

<footer>
    <div id="twitter-feed" class="page-alternate">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div style="margin-bottom: 18px;text-align: left;padding-left: 18px;">Informations</div>
                    <section class="wrappe_actu_site">
                        <div class="picto_actu_site">
                            <?= $this->Html->image('info2.png', array('alt' => 'info')); ?>
                        </div>
                        <div class="content_actu_site">
                            <a href="<?= $Actue_footer['Actualite']['link'] ?>" target=_blank>
                                <?= $Actue_footer['Actualite']['title'] ?>
                            </a>
                            <?php if (!empty($Actue['Actualite']['photographe_id'])): ?>
                            <span class="author_actue_site">
                                            By <?= $Actue_footer['Photographe']['name'] ?> 
                                        </span>
                            <?php endif; ?></br>
                            <span class="txt_actu_site"><?= $Actue_footer['Actualite']['content'] ?></span></br>
                        </div>
                    </section>
                    <?php if (!empty($last_story_post)): ?>
                        <section class="actu_fb">
                            <div class="wrappe_actu_fb">
                                <div class="img_actu_fb">
                                    <a href="<?= $last_story_post->link ?>" target="_blank">
                                        <img src="<?= $last_story_post->picture ?>" width="100px"/>
                                    </a>
                                </div>
                                <div class="content_actu_fb">
                                    <a href="<?= $last_story_post->link ?>" target=_blank>
                                        <?= $last_story_post->name ?>
                                    </a></br>
                                    <span class="txt_actu_fb"><?= $last_story_post->message ?></span></br>
                                    <span class="author_actu_fb">
                                            <?php if (!empty($last_story_post->properties[0]->name) && !empty($last_story_post->properties[0]->text)): ?>
                                                <?= $last_story_post->properties[0]->name ?> <?= $last_story_post->properties[0]->text ?>
                                            <?php endif; ?>
                                            <span style="color:#7F8289"><?= count($last_story_post->likes->data) ?> likes</span>
                                        </span></br>

                                </div>
                                <div class="picto_actu_fb" style=""><a href="<?= $last_story_post->link ?>"
                                                                       target=_blank>
                                        <?= $this->Html->image('facebook.png', array('alt' => 'info')); ?>
                                    </a></div>
                            </div>

                        </section>
                    <?php endif; ?>
                    <div class="list_rs">
                        <a href="https://www.facebook.com/objectifpixel" title="Lien Facebook" >
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/objectifpixel/" title="Lien Instagram" >
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div class="span3">
                    <div style="margin-bottom: 18px;">&nbsp;</div>
                    <ul class="tags-list">
                        <li><strong>Objectif pixel</strong></li>
                        <li><strong>Photographie</strong></li>
                        <li><strong>Evenement</strong></li>
                        <li><strong>Photomaniax</strong></li>
                        <li><strong>Argentique</strong></li>
                        <li><strong>Prise sur le vif</strong></li>
                        <li><strong>Concert</strong></li>
                        <li><strong>Abstrait</strong></li>
                        <li><strong>Maine et Loire</strong></li>
                    </ul>
                </div>
                <div class="span3">
                    <div style="text-align:center;margin-bottom: 18px;font-size: 20px;font-style:italic">News</div>
                    <div>
                        <?php foreach ($Pictures_footer as $key => $value): ?>
                            <div class="blocs_new_footer">

                                <?php
                                echo $this->Html->link($this->Image->resize('../' . $value['Photo']['link'], "90", "90", array('alt' => 'news', 'class' => 'img_blocs_new_footer'), 100),
                                    array('controller' => 'archives', 'action' => 'categorie', $value['CategoriesPhoto']['slug']),
                                    array('escape' => false)
                                );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="credits">&copy;2014 OBJECTIFPIXEL - Developpé par <a href="http://www.thomassire.com/"
                                                                  title="Thomas Sire | Web Developpeur" target="_blank"><strong> THOMAS
                SIRE</strong></a></p>
</footer>