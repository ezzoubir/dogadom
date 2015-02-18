<!-- container full -->
<div class="container_full">
    <!-- header -->
    <div id="header_wrapper">
    <!-- menu -->
    <div id="header">
        <!-- logo -->
        <div id="logo"><a href="/"><img src="assets/images/logo.png" alt="logo" /></a></div>
        <!-- logo end -->
        <!-- main menu -->
        <ul id="mainmenu">
            <li class="home_icon"><span class="circle_effect"></span><a href="<?php echo BASE_URL; ?>">Accueil</a></li>
            <li><a href="<?php echo BASE_URL; ?>annonces">Annonces</a></li>
            <?php if(isset($_SESSION['id_membre'])) { ?>
            <li><a href="<?php echo BASE_URL; ?>mespages-fb">Pages Facebook</a></li>
            <li><a href="<?php echo BASE_URL; ?>profil"><?php checkribUser($_SESSION['id_membre']); ?> Mon profil</a></li>
            <li><a href="<?php echo BASE_URL; ?>deconnexion">Deconnexion</a></li>
            <?php } else { ?>
            <li><a href="<?php echo BASE_URL; ?>pages-fb">Pages Facebook</a></li>
            <li><a href="/login.php?provider=facebook<?php if(isset($_GET['ur'])) { echo '&ur='.$_GET['ur']; } ?>">Se connecter via Facebook</a></li>
            <?php } ?>
            <li class="contact_icon"><span class="circle_effect"></span><a href="<?php echo BASE_URL; ?>/contact">Contact</a></li>
        </ul>
        <!-- main menu end -->
        <!-- search bar -->
        <div class="search_bar">
        <?php if(isset($_SESSION['id_membre'])) { ?>
            <img src="assets/images/icons/money.png" /> Total : <?php echo getTotalGain($_SESSION['id_membre']); ?> Dhs
        <?php } ?>
        </div>
        <!-- search bar end -->
    </div>
    <!-- menu end -->
    <?php if($_GET['page']==1) { ?>
    <!-- slider -->
    <div class="menuBGSlider nivo-slider theme-dark">
        <div id="nivoslider" class="nivoSlider">
                <img src="assets/images/mix/940/writingidea_fixed.jpg" alt="" title="Choose the best option for your personal or business website. Of course DreamLife!" />
                <img src="assets/images/mix/940/vogue_fixed.jpg"  alt="" title="DreamLife is incredibly responsive, with a refreshingly clean design" />
                <img src="assets/images/mix/940/urbanstyle_fixed.jpg" alt="" />
                <img src="assets/images/mix/940/tourist_fixed.jpg" alt="" title="Enjoy the Landscape with the many features different from each other." />
                <img src="assets/images/mix/940/childalone_fixed.jpg" alt="" title="Be any different with the beautiful colors..." />
                <img src="assets/images/mix/940/digitalcreativity_fixed.jpg" alt="" title="Have you any idea? Your design dreams come true here!" />
            </div>
    </div>
    <!-- slider end -->
    <?php } ?>
    <?php if($_GET['page']==4) { ?>
    <!-- google map -->
    <div class="menuBGSlider" id="map_canvas">
    </div>
    <!-- google map end -->
    <?php } ?>
    </div>
    <!-- header end -->
    <div class="clearfix"></div>
    