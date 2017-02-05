<?php
$cakeDescription = __d('Objectifpixel', 'Objectifpixel: Book photo evenementiel');
?><!DOCTYPE html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
    <!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
    <!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
    <!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
    <!--[if gt IE 8]><!--> <html lang="fr-FR"> <!--<![endif]-->
    <head>

    	<?php echo $this->Html->charset(); ?>

        <title>
    		<?php echo $cakeDescription ?>:
    		<?php echo $title_for_layout; ?>
        </title>   

    	<?php
    		echo $this->Html->meta('icon');
    		echo $this->fetch('meta');
    	?>

        <meta name="description" content="Insert Your Site Description" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="true"/>
        <meta name="MobileOptimized" content="320"/>

        <!-- Js -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->

        <!-- Css -->

        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('main'); ?>
        <?php echo $this->Html->css('supersized'); ?>
        <?php echo $this->Html->css('supersized.shutter'); ?>
        <?php echo $this->Html->css('fancybox/jquery.fancybox'); ?>
        <?php echo $this->Html->css('fonts'); ?>
        <?php echo $this->Html->css('shortcodes'); ?>
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
        <?php echo $this->Html->css('main-responsive'); ?>
        <?php echo $this->Html->css('responsive'); ?>
        <?php echo $this->Html->css('supersized'); ?>
        <?php echo $this->Html->css('supersized.shutter'); ?>
        <?php echo $this->Html->script('modernizr.js'); ?>
        

        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

        <!-- Fav Icon -->
        <link rel="shortcut icon" href="#">
        <link rel="apple-touch-icon" href="#">
        <link rel="apple-touch-icon" sizes="114x114" href="#">
        <link rel="apple-touch-icon" sizes="72x72" href="#">
        <link rel="apple-touch-icon" sizes="144x144" href="#">

        <!-- Analytics -->
        <!-- End Analytics -->

    </head>

    <body>
        <div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=938453189516083&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

        <!-- This section is for Splash Screen -->
        <div class="ole">
            <section id="jSplash">
            	<div id="circle"></div>
            </section>
        </div>

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>

        <?php echo $this->element('footer'); ?>       


        <!-- Js -->
        <?php echo $this->Html->script('bootstrap.min.js'); ?><!-- Bootstrap -->
        <?php echo $this->Html->script('supersized.3.2.7.min.js'); ?><!-- Slider -->
        <?php echo $this->Html->script('waypoints.js'); ?> <!-- WayPoints -->
        <?php echo $this->Html->script('waypoints-sticky.js'); ?> <!-- Waypoints for Header -->
        <?php echo $this->Html->script('jquery.isotope.js'); ?><!-- Isotope Filter -->
        <?php echo $this->Html->script('jquery.fancybox.pack.js'); ?><!-- Fancybox -->
        <?php echo $this->Html->script('jquery.fancybox-media.js'); ?> <!-- Fancybox for Media -->
        <?php echo $this->Html->script('jquery.tweet.js'); ?><!-- Tweet -->
        <?php echo $this->Html->script('plugins.js'); ?> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
        <?php echo $this->Html->script('main.js'); ?><!-- Default JS -->
        <!-- End Js -->

        <?php //echo $this->element('sql_dump'); ?>

    </body>
</html>
