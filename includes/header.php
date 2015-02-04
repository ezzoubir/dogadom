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
            <li><a href="annonces">Annonces</a></li>
            <?php if(isset($_SESSION['id_membre'])) { ?>
            <li><a href="<?php echo BASE_URL; ?>profil"><?php checkribUser($_SESSION['id_membre']); ?> Mon profil</a></li>
            <li><a href="<?php echo BASE_URL; ?>logout">Deconnexion</a></li>
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
    <div class="camera_wrap menuBGSlider" id="cameraSlider">
        <div data-thumb="assets/images/mix/80/writingidea.jpg" data-src="assets/images/mix/940/writingidea.jpg">
            <div class="camera_desc pink heading fadeIn camera_effected" style="bottom:190px;left:80px;">DreamLife Responsive Template</div>
            <div class="camera_desc black fadeIn camera_effected" style="bottom:140px;left:80px;">Choose the best option for your personal or business website. Of course DreamLife!</div>
        </div>
        <div data-thumb="assets/images/mix/80/vogue.jpg" data-src="assets/images/mix/940/vogue.jpg">
            <div class="camera_desc green heading fadeIn camera_effected" style="bottom:190px;right:80px;">Creative Design</div>
            <div class="camera_desc black fadeIn camera_effected" style="bottom:140px;right:80px;">DreamLife is incredibly responsive, with a refreshingly clean design</div>
        </div>
        <div data-thumb="assets/images/mix/80/urbanstyle.jpg" data-src="assets/images/mix/940/urbanstyle.jpg"></div>
        <div data-thumb="assets/images/mix/80/tourist.jpg" data-src="assets/images/mix/940/tourist.jpg">
            <div class="camera_desc blue heading fadeIn camera_effected" style="bottom:230px;left:50%;margin-left:-95px;">Enjoy the Landscape!</div>
            <div class="camera_desc black fadeIn camera_effected" style="bottom:200px;left:50%;margin-left:-145px; max-width:290px;">with the many features different from each other.</div>
        </div>
        <div data-thumb="assets/images/mix/80/childalone.jpg" data-src="assets/images/mix/940/childalone.jpg">
            <div class="camera_desc orange heading fadeIn camera_effected" style="bottom:230px;left:180px;">Be any different!</div>
            <div class="camera_desc black fadeIn camera_effected" style="bottom:200px;left:180px;">with the beautiful colors...</div>
        </div>
        <div data-thumb="assets/images/mix/80/digitalcreativity.jpg" data-src="assets/images/mix/940/digitalcreativity.jpg">
            <div class="camera_desc blue heading fadeIn camera_effected" style="bottom:230px;left:180px;">Have you any idea?</div>
            <div class="camera_desc black fadeIn camera_effected" style="bottom:200px;left:180px;">Your design dreams come true here!</div>
        </div>
    </div>
    <!-- slider end -->
    <?php } ?>
    </div>
    <!-- header end -->
    <div class="clearfix"></div>
    