<?php
$cakeDescription = __d('Objectifpixel', "Objectifpixel: Photographe événementielle. Par Thomas sire");

?><!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]>
<html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="fr-FR"> <!--<![endif]-->
<head>

    <?php echo $this->Html->charset(); ?>

    <title>
        Objectif-Pixel<?= ($this->request->here != '/') ? " : " . $this->params['controller'] : ""; ?>
    </title>

    <link href="/img/icon.ico" type="image/x-icon" rel="icon">
    <link rel="shortcut icon" href="/img/icon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/fav/favicon-16x16.png">
    <link rel="manifest" href="/img/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php echo $this->fetch('meta'); ?>

    <meta name="description" content="<?php echo $cakeDescription ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>

    <?php if ($this->request->params['action'] == "galerie" && !empty($categorie)): ?>

        <?php
        $img_src = WWW_ROOT . $categorie['CategoriesInformation']['img_cat'];
        $size_media = getimagesize($img_src);
        ?>

        <meta property="og:title"
              content="Objectifpixel - <?php echo $categorie['CategoriesInformation']['sub_name'] ?>"/>
        <meta property="og:description" content="<?php echo $categorie['desc_cat']; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url"
              content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
        <meta property="og:site_name" content="Objectifpixel"/>
        <meta property="og:image" content="<?= "/app/webroot" . $categorie['CategoriesInformation']['img_cat'] ?>"/>
        <meta property="og:image:width" content="<?php echo $size_media[0]; ?>"/>
        <meta property="og:image:height" content="<?php echo $size_media[1]; ?>"/>
        <link rel="image_src" href="<?php echo "/app/webroot" . $categorie['CategoriesInformation']['img_cat']; ?>"/>

    <?php else: ?>
        <meta property="og:title" content="Objectif Pixel"/>
        <meta property="og:description" content="<?php echo $cakeDescription ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="http://objectifpixel.com/"/>
        <meta property="og:image" content="http://objectifpixel.com/img/logo3.png"/>
    <?php endif; ?>

    <!-- Css -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'); ?>
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


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900'
          rel='stylesheet' type='text/css'>


    <!-- Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- jQuery Core -->

</head>

<body id="page_<?= $this->request->params['action']; ?>">
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=938453189516083&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
<?php echo $this->Html->script('modernizr.js'); ?>
<?php echo $this->Html->script('bootstrap.min.js'); ?><!-- Bootstrap -->
<?php echo $this->Html->script('supersized.3.2.7.min.js'); ?><!-- Slider -->
<?php echo $this->Html->script('waypoints.js'); ?> <!-- WayPoints -->
<?php echo $this->Html->script('waypoints-sticky.js'); ?> <!-- Waypoints for Header -->
<?php echo $this->Html->script('jquery.isotope.js'); ?><!-- Isotope Filter -->
<?php echo $this->Html->script('jquery.fancybox.pack.js'); ?><!-- Fancybox -->
<?php echo $this->Html->script('jquery.fancybox-media.js'); ?> <!-- Fancybox for Media -->
<?php echo $this->Html->script('jquery.tweet.js'); ?><!-- Tweet -->
<?php echo $this->Html->script('plugins.js'); ?>
<!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<?php echo $this->Html->script('main.js'); ?><!-- Default JS -->
<!-- End Js -->

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-38625631-1', 'auto');
    ga('send', 'pageview');

</script>


<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
