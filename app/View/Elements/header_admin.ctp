<header>
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
            <a id="goUp" href="<?= Configure::read('host') ?>/#home-slider">Objectif-pixel</a>
        </div>

        <nav id="menu">
            <?php echo $this->Session->flash(); ?>
        </nav>

    </div>
</header>
