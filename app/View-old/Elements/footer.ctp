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
                            <section style="margin-bottom: 20px;background-color: rgba(255, 255, 255, 0.04);border-radius: 4px;padding: 15px;padding-bottom: 25px;">
                                <div style="display: inline-block;width: 12%;vertical-align: top;padding-right: 2%;padding-top: 10px;">
                                    <?= $this->Html->image('info2.png', array('alt' => 'info')); ?>
                                </div>
                                <div style="display:inline-block;text-align: initial;width: 80%;padding-right: 2%;">
                                    <a href="<?= $last_story_post->link ?>" target=_blank>
                                        <?= $Actue_footer['Actualite']['title'] ?>
                                    </a>
                                    <?php if(!empty($Actue['Actualite']['photographe_id'])): ?>
                                        <span style="font-size:10px;color: #7F8289;text-align:right;float:right">
                                            By <?= $Actue_footer['Photographe']['name'] ?> 
                                        </span>
                                    <?php endif; ?></br>
                                    <span style="color: #7F8289;font-style: italic;font-size: 14px;line-height: 18px;"><?= $Actue_footer['Actualite']['content'] ?></span></br>
                                </div>
                            </section>

                            <section style="margin-bottom: 20px;background-color: rgba(255, 255, 255, 0.04);border-radius: 4px;padding: 15px;padding-bottom: 25px;">
                                <div style="display:inline-block;text-align: initial;width: 80%;padding-right: 2%;">
                                    <div style="display:inline-block;width:31%;margin-top: 30px;float: left;">
                                        <a href="<?= $last_story_post->link ?>" target=_blank>
                                            <img src="<?= $last_story_post->picture ?>" width="100px"/>
                                        </a>
                                    </div>
                                    <div style="display:inline-block;width:66%;text-align: initial;padding-left: 2%;border-left: 1px solid;">
                                        <a href="<?= $last_story_post->link ?>" target=_blank>
                                            <?= $last_story_post->name ?>
                                        </a></br>
                                        <span style="color: #7F8289;font-style: italic;font-style: italic;font-size: 14px;line-height: 18px;"><?= $last_story_post->message ?></span></br>
                                        <span style="font-size:10px;color: #DE5E60;">
                                            <?php if(!empty($last_story_post->properties[0]->name) && !empty($last_story_post->properties[0]->text)): ?>
                                                <?= $last_story_post->properties[0]->name ?> <?= $last_story_post->properties[0]->text ?> 
                                            <?php endif; ?>
                                            <span style="color:#7F8289"><?= count($last_story_post->likes->data) ?> likes</span>
                                        </span></br>
                                        
                                    </div>
                                </div>
                                <div style="display: inline-block;width: 12%;vertical-align: top;padding-right: 2%;padding-top: 10px;float: right;"><a href="<?= $last_story_post->link ?>" target=_blank>
                                    <?= $this->Html->image('facebook.png', array('alt' => 'info')); ?>
                                </a></div>
                            </section>
                            <section >
                                <!--<div class="follow">
                                    <a href="https://twitter.com/Bluxart" title="Follow Me on Twitter" target="_blank"><i class="font-icon-social-twitter"></i></a>-->
                                
                                
                            </section>
                        </div>

                        <div class="span3">
                            <div style="margin-bottom: 18px;font-size: 20px;">Tags</div>
                            <ul class="tags-list">
                                <li><a href="#">Photographie</a></li>
                                <li><a href="#">Evenement</a></li>
                                <li><a href="#">Book</a></li>
                                <li><a href="#">1Pix 1Week</a></li>
                                <li><a href="#">Objectif pixel</a></li>
                                <li><a href="#">Shoot Photo</a></li>
                                <li><a href="#">Photo Art</a></li>
                                <li><a href="#">Angers</a></li>
                                <li><a href="#">Super Cool</a></li>
                            </ul>
                        </div>
                        <div class="span3">
                            <div style="text-align:center;margin-bottom: 18px;font-size: 20px;">News</div>
                            <div>
                                <?php foreach ($Pictures_footer as $key => $value): ?>
                                    <div class="blocs_new_footer"><?= $this->Html->image('../'.$value['Photo']['link'], array('alt' => 'news','class' => 'img_blocs_new_footer')); ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        	<p class="credits">&copy;2014 OBJECTIFPIXEL. Developper by <a href="http://www.thomassire.com/" title="Athoamssire | Web Developpeur" target="_blank">THOMAS SIRE</a></p>
        </footer>