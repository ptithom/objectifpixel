<?php
$cakeDescription = __d('Objectifpixel', 'Admin');
?><!DOCTYPE html>
    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
    <!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
    <!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
    <!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
    <!--[if gt IE 8]><!--> <html lang="fr_FR"> <!--<![endif]-->
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
        <?php echo $this->Html->css('responsive'); ?>
        <?php echo $this->Html->css('supersized'); ?>
        <?php echo $this->Html->css('admin'); ?>

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

    <body class="admin">


        <div class="wapper">

            <?php echo $this->element('header_admin'); ?>
            <?php echo $this->element('sidebar_admin'); ?>
            <div class="wrapper_content">

                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>

            </div>
        </div>

    </body>
</html>
