<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html<?php if(isset($declaration_entete_html)) echo $declaration_entete_html; ?>>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
<meta name="keywords" content="<?php echo META_KEYWORDS; ?>" />
<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
if(isset($header_article_facebook))
{
  echo $header_article_facebook;
}
?>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="colors/default.css" type="text/css" id="color">  
    
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css" type="text/css">
    <script src="js/modernizr.js" type="text/javascript">
</script>
</head>
<body>
	<?php 
		if($_GET['page']==1) {
			include 'login_interface.php';
		} elseif($_GET['page']==2){
			include 'basic/view_ads.php';
		}
	?>
	
</body></html>