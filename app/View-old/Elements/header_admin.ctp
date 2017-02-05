<header>
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
            <a id="goUp" href="<?= Configure::read('host') ?>/#home-slider">Objectif-pixel</a>
        </div>
        
        <nav id="menu">
            <ul id="menu-nav">
                <li class="current"><a href="<?= Configure::read('host') ?>/#home-slider" target="_blank" >Home</a></li>
                <li><a href="<?= Configure::read('host') ?>/#work" target="_blank" >News</a></li>
                <li><a href="<?= Configure::read('host') ?>/#projet" target="_blank" >Projet</a></li>
                <li><a href="<?= Configure::read('host') ?>/#about" target="_blank" >Présentation</a></li>
                <li><a href="<?= Configure::read('host') ?>/Pages/contact" target="_blank" >Contact</a></li>
            </ul>
        </nav>
    </div>
</header>


<script>

    $(function() {
        $('#menu-nav li a').click(function(){
            location.replace($(this).attr('href'));
        });
    });

</script>
