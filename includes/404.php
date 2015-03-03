<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<base href="<?php echo BASE_URL; ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>favicon.ico" />
<?php
  // on recupere meta
  $sql='select * from '.PREFIXE_BDD.'metatags where language="'.$_GET['language'].'"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res); 
  define('META_TITLE',$row['titre']);
  define('META_DESCRIPTION',$row['description']);
  define('META_KEYWORDS',$row['mots']);
?>
<title><?php echo META_TITLE; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="keywords" content="<?php echo META_KEYWORDS; ?>" />
<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow" />
<?php
if(isset($header_article_facebook))
{
  echo $header_article_facebook;
}
?>
<?php if(isset($_GET['idad'])) { 
    $sqlad='select * from ads where aid="'.$_GET['idad'].'"';
    $reqad=mysql_query($sqlad);
    $datad=mysql_fetch_array($reqad);                 
?>
<meta content="<?php echo $datad['title']; ?>" property="og:title" />
<meta content="website" property="og:type" />
<meta content="<?php echo $datad['url']; ?>" property="og:url" />
<meta content="<?php echo BASE_URL.RepPhoto.'pic_ads/'.$datad['image']; ?>" property="og:image" />
<meta content="<?php echo $datad['description']; ?>" property="og:description" />
<meta content="WINWIN" property="og:site_name" />
<?php } ?> 
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<!--[if lte IE 8]>
  <link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />
<![endif]-->
<link rel="stylesheet" href="assets/css/jquery_popup.css" />
</head>
<body>
<div id='fb-root'></div>
<script src='http://connect.facebook.net/fr_FR/all.js'></script>
<?php include 'header.php'; ?>
<div class="header_text">
		<div class="container_12">
			<div class="grid_12">
				<h1>Page Not Found</h1>
			</div>
		</div>
	</div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<div class="grid_12">
			<div class="page404">
				<div class="heading_404">404</div>
				<div class="text_404">Upps! Something is Wrong</div>
			</div>
		</div>
	</div>
	<!-- container 12 end -->
<?php include 'footer.php'; ?>
<script src="assets/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.components.js" type="text/javascript"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>	
<script src="assets/js/jquery_popup.js"></script>
</body>
</html>