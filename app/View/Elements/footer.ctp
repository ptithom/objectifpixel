<?php 
    $access_token="938453189516083|-iABxH0raK4hAiD5X2paVPJIFGk";
    $mur = json_decode(file_get_contents('https://graph.facebook.com/objectifpixel/feed?access_token='.$access_token));
    foreach ($mur->data as $key => $value) {
        if(!empty($value->status_type)){
            $val = $value->status_type;
            if($val == 'shared_story'){
                $last_story_post = $value;
            }
        }
    }
?>

        <footer>
            <div id="twitter-feed" class="page-alternate">
            	<div class="container">
                	<div class="row">
                        <div class="span6">
                            <section class="wrappe_actu_site" >
                                <div class="picto_actu_site">
                                    <?= $this->Html->image('info2.png', array('alt' => 'info')); ?>
                                </div>
                                <div class="content_actu_site" >
                                    <a href="<?= $Actue_footer['Actualite']['link'] ?>" target=_blank>
                                        <?= $Actue_footer['Actualite']['title'] ?>
                                    </a>
                                    <?php if(!empty($Actue['Actualite']['photographe_id'])): ?>
                                        <span class="author_actue_site" >
                                            By <?= $Actue_footer['Photographe']['name'] ?> 
                                        </span>
                                    <?php endif; ?></br>
                                    <span class="txt_actu_site" ><?= $Actue_footer['Actualite']['content'] ?></span></br>
                                </div>
                            </section>
                            <?php if(!empty($last_story_post)): ?>
                            <section class="actu_fb">
                                <div class="wrappe_actu_fb">
                                    <div class="img_actu_fb" >
                                        <a href="<?= $last_story_post->link ?>" target="_blank" >
                                            <img src="<?= $last_story_post->picture ?>" width="100px"/>
                                        </a>
                                    </div>
                                    <div class="content_actu_fb" >
                                        <a href="<?= $last_story_post->link ?>" target=_blank>
                                            <?= $last_story_post->name ?>
                                        </a></br>
                                        <span class="txt_actu_fb" ><?= $last_story_post->message ?></span></br>
                                        <span class="author_actu_fb" >
                                            <?php if(!empty($last_story_post->properties[0]->name) && !empty($last_story_post->properties[0]->text)): ?>
                                                <?= $last_story_post->properties[0]->name ?> <?= $last_story_post->properties[0]->text ?> 
                                            <?php endif; ?>
                                            <span style="color:#7F8289"><?= count($last_story_post->likes->data) ?> likes</span>
                                        </span></br>
                                        
                                    </div>
                                    <div  class="picto_actu_fb" style=""><a href="<?= $last_story_post->link ?>" target=_blank>
                                            <?= $this->Html->image('facebook.png', array('alt' => 'info')); ?>
                                        </a></div>
                                </div>

                            </section>
                            <?php endif; ?>
                            <section >
                                <!--<div class="follow">
                                    <a href="https://twitter.com/Bluxart" title="Follow Me on Twitter" target="_blank"><i class="font-icon-social-twitter"></i></a>-->
                                
                                
                            </section>
                        </div>

                        <div class="span3">
                            <div style="margin-bottom: 18px;font-size: 20px;font-style:italic">#Tags</div>
                            <ul class="tags-list">
                                <li><a href="#">Objectif pixel</a></li>
                                <li><a href="#">Photographie</a></li>
                                <li><a href="#">Evenement</a></li>
                                <li><a href="#">Book</a></li>
                                <li><a href="#">OnePixOneWeek</a></li>
                                <li><a href="#">Festival</a></li>
                                <li><a href="#">Concert</a></li>
                                <li><a href="#">Pictures Art</a></li>
                                <li><a href="#">Maine et Loire</a></li>
                                <li><a href="#">Loir et cher</a></li>
                            </ul>
                        </div>
                        <div class="span3">
                            <div style="text-align:center;margin-bottom: 18px;font-size: 20px;font-style:italic">News</div>
                            <div>
                                <?php foreach ($Pictures_footer as $key => $value): ?>
                                <div class="blocs_new_footer">

                                    <?php
                                    echo $this->Html->link($this->Image->resize('../'.$value['Photo']['link'],"90", "90",array('alt' => 'news','class' => 'img_blocs_new_footer'), 100),
                                        array('controller' => 'archives', 'action' => 'categorie' , $value['CategoriesPhoto']['slug']),
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

        	<p class="credits">&copy;2014 OBJECTIFPIXEL. Developpé par <a href="http://www.thomassire.com/" title="Thomas Sire | Web Developpeur" target="_blank"><strong>THOMAS SIRE</strong></a></p>
        </footer>