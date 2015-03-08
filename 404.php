<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<link rel="shortcut icon" type="image/x-icon" href="http://winbox.ma/favicon.ico" />
<title>Winbox.ma :: Error Page</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="http://winbox.ma/assets/css/style.css" />
<!--[if lte IE 8]>
  <link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />
<![endif]-->
<link rel="stylesheet" href="http://winbox.ma/assets/css/jquery_popup.css" />
</head>
<body>
<!-- container full -->
<div class="container_full">
    <!-- header -->
    <div id="header_wrapper">
    <!-- menu -->
    <div id="header">
        <!-- logo -->
        <div id="logo"><a href="<?php echo BASE_URL; ?>"><img src="assets/images/logo.png" alt="logo" /></a></div>
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
            <li class="contact_icon"><span class="circle_effect"></span><a href="<?php echo BASE_URL; ?>contact">Contact</a></li>
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
    </div>
    <!-- header end -->
    <div class="clearfix"></div>

<div class="header_text">
		<div class="container_12">
			<div class="grid_12">
				<h1>Page non trouvée</h1>
			</div>
		</div>
	</div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<div class="grid_12">
			<div class="page404">
				<div class="heading_404">404</div>
				<div class="text_404">Upps! Quelque chose ça va pas</div>
			</div>
		</div>
	</div>
	<!-- container 12 end -->
<!-- footer -->
	<div id="footer">
		<div class="back_top"></div>
		
		<div class="">
			<div class="container_12 footer_content">
				<div class="grid_6">
					<div class="footer_text">Copyright  2015 &copy;, par <a href="http://www.inovancia.com" target="_blank">Inovancia</a></div>
				</div>
				<div class="grid_6">
					<div class="float_right socialicons">
						<a href="http://facebook.com/" target="_blank" class="social_colored facebook" title="Facebook"></a>
						<a href="http://twitter.com/" target="_blank" class="social_colored twitter" title="Twitter"></a>
						<a href="http://linkedin.com/" target="_blank" class="social_colored linkedin" title="Linkedin"></a>
						<a href="http://skype.com/" target="_blank" class="social_colored skype" title="Skype"></a>
						<a href="mailto:yourmail@mail.com" class="social_colored mail" title="Mail"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- footer bottom end -->
	</div>
	<!-- footer end -->
</div>
<script src="http://winbox.ma/assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="http://winbox.ma/assets/js/jquery.components.js" type="text/javascript"></script>
<script src="http://winbox.ma/assets/js/custom.js" type="text/javascript"></script>	
<script src="http://winbox.ma/assets/js/jquery_popup.js"></script>
</body>
</html>