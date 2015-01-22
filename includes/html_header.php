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
<link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/normalize.css">
    <!--css plugin-->
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery_002.css">
    <link rel="stylesheet" href="css/jquery.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-dark.css">
    <link rel="stylesheet" href="css/style-gray.css">
	<link rel="stylesheet" href="css/lightbox.css">

    <!--[if IE 9]>
    <link rel="stylesheet" href="css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->

    <link rel="stylesheet" href="css/res-menu.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="jquery/jRating.jquery.css" type="text/css" />

<link href="css/css.css" type="text/css" rel="stylesheet">
<style type="text/css">#html5-text {color:#333; font-size:13px;font-weight:700; overflow:hidden; }.html5-error {text-align:center; color:#ff0000; font-size:14px; }</style>

<script type="text/javascript" src="js/jquery_002.js"></script>
<script type="text/javascript" src="js/jquery_004.js"></script>
<script type="text/javascript" src="js/jquery_003.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.countdown.js" type="text/javascript"></script>
<script src="js/jquery.lazyload.js" type="text/javascript"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/jquery.lightbox_me.js"></script>
	
	<style>
		.login-dialog .modal-dialog {
			width: 300px;
		}
	</style>
</head>
<body class="gray"><!--<div class="alert_w_p_u"></div>-->
<div class="container-page">
    <div class="mp-pusher" id="mp-pusher">
        <?php include 'header.php'; ?>
        <?php include 'mainmenu.php'; ?>
        <?php if($_GET['page']==1) { 
			include 'slide.php';
			include 'filter.php';
			include 'home.php'; 
		} elseif($_GET['page']==2) 
			{ include 'coupon-detail.php';
		} elseif($_GET['page']==3) 
			{ include 'brand-detail.php'; 
		} elseif($_GET['page']==4) 
			{ include 'coupon-list.php';
		} elseif($_GET['page']==5) 
			{ include 'my-coupon.php';
		}elseif($_GET['page']==6) 
			{ include 'brand-list.php'; 
		} elseif($_GET['page']==10) 
			{ include 'catalogues.php'; } 	
		?>
        <?php include 'footer.php'; ?>
    </div>
	<div id="sign_up">
                <h3 id="see_id" class="" >Demandez la carte Groupromo</h3>
                <span>S'il vous plaît renseigner votre informations en utilisant le formulaire ci-dessous</span>
                <div id="sign_up_form">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <label><strong>Nom:</strong> <input type="text" name="carte_nom"  class="sprited" required="true"/></label>
                    <label><strong>Prenom:</strong> <input type="text"  name="carte_prenom"  class="sprited" required="true"/></label>
                    <label><strong>Adresse:</strong> <input type="text"  name="carte_adresse"  class="sprited" required="true"/></label>
                    <label><strong>Tél:</strong> <input type="text"  name="carte_tel"  class="sprited" required="true"/></label>
                    <label><strong>Email:</strong> <input type="text" name="carte_email"  class="sprited" required="true"/></label>
                    <div id="actions">
                        <input type="submit" name="sign_carte"  style="margin-right: 27px;" />
                    </div>
					</form>
                </div>
                <a id="close_x" class="close sprited" href="#">close</a>
    </div>
	<div id="sign_devis">
                <h3 id="see_id" class="" >Demandez un devis</h3>
                <span>S'il vous plaît renseigner votre informations en utilisant le formulaire ci-dessous</span>
                <div id="sign_devis_form">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <label><strong>Nom & Prénom:</strong> <input type="text" name="devis_nom" class="sprited" required="true"/></label>
                    <label><strong>Tél:</strong> <input type="text"  name="devis_tel" class="sprited" required="true"/></label>
                    <label><strong>Email:</strong> <input type="text" name="devis_email" class="sprited" required="true"/></label>
                    <label><strong>Sujet:</strong> <input type="text"  name="devis_sujet" class="sprited" required="true"/></label>
                    <label><strong>Message:</strong> <textarea name="devis_msg" class="sprited" required="true"/></textarea></label>
                    <div id="actions">
						<input type="submit" name="sign_devis"  style="margin-right: 27px;" />
                    </div>
				</form>
                </div>
                <a id="close_x" class="close sprited" href="#">close</a>
    </div>
	<div id="sign_contact">
                <h3 id="see_id" class="" >Contactez nous</h3>
                <span>S'il vous plaît renseigner votre informations en utilisant le formulaire ci-dessous</span>
                <div id="sign_contact_form">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <label><strong>Nom & Prénom:</strong> <input type="text" name="FORM_NAME" class="sprited" required="true"/></label>
                    <label><strong>Email:</strong> <input type="text" name="FORM_EMAIL" class="sprited" required="true"/></label>
                    <label><strong>Ville:</strong> <input type="text"  name="FORM_VILLE" class="sprited" required="true"/></label>
                    <label><strong>Adresse:</strong> <input type="text"  name="FORM_SUJET" class="sprited" required="true"/></label>
                    <label><strong>Message:</strong> <textarea name="FORM_MESSAGE" class="sprited" required="true"/></textarea></label>
                    <div id="actions">
						<input type="submit" name="CONTACT_FORM_ENVOYER"  style="margin-right: 27px;" />
                    </div>
				</form>
                </div>
                <a id="close_x" class="close sprited" href="#">close</a>
    </div>
</div>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.js"></script>
<script type="text/javascript" src="js/html5lightbox.js"></script>
<!--//js for responsive menu-->
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="jquery/jRating.jquery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating({
				  length:5,
				  onSuccess : function(){
				  	bootbox.alert("Votre message a été envoyé avec succès");
				  },
				  onError : function(){
					bootbox.alert('Vous avez déja voté');
				  }
			});
			/*$('.scroll').jscroll({
				autoTrigger: false
			});*/
			$('.btn-follow-brand').click(function(){
				var marchand = $(this).attr('data-id');
				var data = "id_marchand="+marchand+"&action=follow";
				$.ajax({
					type: "POST",
					url: 'php/Follow.php',
					data: data,
					success : function(){
						bootbox.alert('Votre message a été envoyé avec succès');
					}
				});
			});
			
			$('.btn-unfollow-brand').click(function(){
				var marchand = $(this).attr('data-id');
				var data = "id_marchand="+marchand+"&action=unfollow";
				$.ajax({
					type: "POST",
					url: 'php/Follow.php',
					data: data,
					success : function(){
						bootbox.alert('Votre message a été envoyé avec succès');
					}
				});
			});
			$("#sys_apply_filter").on("click",function(){
								
								$('body .scroll').html('<p style="text-align:center"><img src="<?php echo BASE_URL;?>images/loading.gif" /></p>');
															
								setTimeout(function() {
								var srch = $("#sys_txt_search").val();
								var categ = $("#sys_selected_val").children("span").attr("data-cate-id");
								var villeid = $("#sys_selected_val_2").children("span").attr("data-ville-id");
								var formData = "filter=1&search="+srch+"&catId="+categ+"&cityId="+villeid;
								$.ajax({
										url : "includes/result.php",
										type: "POST",
										data : formData,
										success: function(data)
										{
											$('body .scroll').html(data);
										},
										error: function ()
										{
									 
										}
								});
							}, 3000);
					});
			$('span .type-tag').click(function(){
				$('body .couponslist').html('<p style="text-align:center"><img src="<?php echo BASE_URL;?>images/loading.gif" /></p>');
				setTimeout(function() {
								var tag = $(this).attr('data-value');
								//alert(tag);
								var formData = "filter=3&tag="+tag;
								$.ajax({
										url : "includes/result.php",
										type: "POST",
										data : formData,
										success: function(data)
										{
											$('body .couponslist').html(data);
										},
										error: function ()
										{
									 
										}
								});
				}, 3000);	
			});
						$('#filterOptions span').click(function() {
							var ourClass = $(this).attr('class');
							if(ourClass == 'all') {
							  $('#ourHolder').children('div.item').show();
							}
							else {
							  $('#ourHolder').children('div:not(.' + ourClass + ')').hide();
							  $('#ourHolder').children('div.' + ourClass).show();
							}
							return false;
						  });
			
			$("img.lazy").lazyload({effect : "fadeIn"});
			$('#try-1').click(function(e) {
				$('#sign_up').lightbox_me({
					centered: true, 
					onLoad: function() { 
						$('#sign_up').find('input:first').focus()
						}
					});
				//e.preventDefault();
			});
			$('#try-2').click(function(e) {
				$('#sign_devis').lightbox_me({
					centered: true, 
					onLoad: function() { 
						$('#sign_devis').find('input:first').focus()
						}
					});
				//e.preventDefault();
			});
			$('#try-3').click(function(e) {
				$('#sign_contact').lightbox_me({
					centered: true, 
					onLoad: function() { 
						$('#sign_contact').find('input:first').focus()
						}
					});
				//e.preventDefault();
			});
			$('#try-4').click(function(e) {
				$('#sign_contact').lightbox_me({
					centered: true, 
					onLoad: function() { 
						$('#sign_contact').find('input:first').focus()
						}
					});
				//e.preventDefault();
			});
			<?php if(isset($_SESSION['id_membre'])){ ?>
			$('#showadress').click(function(){
				$('#adressecoupon').fadeToggle(300);
				$('#map').fadeToggle(300);
					var idc = $(this).attr('data-value');
					var idm = <?php echo $_SESSION['id_membre']; ?>;
					var formData = "filter=addconsoma&idmembre="+idm+"&idpromo="+idc;
						$.ajax({
								url : "includes/result.php",
								type: "POST",
								data : formData
						});
			});
			<?php } ?>
			$("#showloginpop").on("click",function(){$("#sys_pop_login").fadeToggle(300)});
			
		});
	</script>
<!--[if lte IE 9]>
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<script type="text/javascript" src="js/create.placeholder.js"></script>
<![endif]-->

<!--[if lte IE 8]>
<script type="text/javascript" src="js/ie8.js"></script>
<![endif]-->
</body></html>