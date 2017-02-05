<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="<?= Configure::read('host') ?>/#home-slider">Objectif-pixel</a>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="<?= Configure::read('host') ?>/#home-slider">Home</a></li>
                <li><a href="<?= Configure::read('host') ?>/#work">News</a></li>
                <li><a href="<?= Configure::read('host') ?>/#projet">Projet</a></li>
                <li><a href="<?= Configure::read('host') ?>/#about">Présentation</a></li>
                <li><a href="<?= Configure::read('host') ?>/Pages/contact">Contact</a></li>
                <li><a href="<?= Configure::read('host') ?>/archives/categorie">Archive</a></li>
            </ul>
        </nav>
    </div>
</header>

<?php if($_SERVER['REQUEST_URI'] != Configure::read('host').'/' ): ?>

    <script>

        $(function() {
            $('#menu-nav li a,#navigation-mobile li a').click(function(){
                location.replace($(this).attr('href'));
            });
        });

    </script>

<?php endif; ?>