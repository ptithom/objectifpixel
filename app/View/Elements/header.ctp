<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
        	<a id="goUp" href="<?= Configure::read('host') ?>/#home-slider">Objectif-pixel</a>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="<?= Configure::read('host') ?>/">Home</a></li>
                <li><a href="<?= Configure::read('host') ?>/archives/categorie/Evenement">Evenement</a></li>
                <li><a href="<?= Configure::read('host') ?>/OnePixOneWeek">Carnet</a></li>
                <li><a href="<?= Configure::read('host') ?>/archives/galerie/argentique">Argentique</a></li>
                <li><a href="https://www.photomaniax.ovh/" target="_blank">Photomaniax</a></li>
                <li><a href="<?= Configure::read('host') ?>/Pages/contact">Contact</a></li>
                <li><a href="<?= Configure::read('host') ?>/archives/categorie">Archives</a></li>
            </ul>
        </nav>
    </div>
</header>



    <script>

        $(function() {
            $(document).on('click',' #menu-nav li,#menu-nav-mobile li', function(){
                location.replace($(this).children('a').attr('href'));
            });
        });

    </script>

