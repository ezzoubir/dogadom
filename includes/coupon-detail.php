<?php
	$sql='select * from coupons where slug = "'.$_GET['slug'].'"';
	$req=mysql_query($sql);
	$dtcp=mysql_fetch_assoc($req);
	
	$sql='select * from marchands where id = "'.$dtcp['id_marchand'].'"';
	$req=mysql_query($sql);
	$dtmch=mysql_fetch_assoc($req);
?>
		<div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title">Promo : <?php echo $dtcp['titre'].' : '.$dtcp['reduction']; ?> </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-breadcrumb clearfix">
                    <div class="grid_12">
                        <a href="#">Accueil</a>
                        <span>&gt;</span>
                        <a href="#">Bons</a>
                        <span>&gt;</span>
                        <a href="#"><?php echo $dtcp['titre'].' : '.$dtcp['reduction']; ?> </a>
                    </div>
                </div><!--end: .mod-breadcrumb -->
                <div class="mod-coupon-detail clearfix">
                    <div class="grid_4">
                        <div class="wrap-thumb">
                            <div class="img-thumb-center">
                                <div class="wrap-img-thumb">
                                    <span class="ver_hold"></span>
									<a href="images/photos/<?php echo $dtcp['logo']; ?>" data-lightbox="<?php echo $dtcp['titre']; ?>" data-title="<?php echo $dtcp['titre']; ?>"><img src="images/photos/<?php echo $dtcp['logo']; ?>" alt="<?php echo $dtcp['titre']; ?>"></a>
                                </div>
                            </div>
                            <i class="stick-lbl hot-sale"></i>
                        </div>
                    </div>
                    <div class="grid_5">
                        <div class="save-price">Réduction de : <span style="color:#F16262"><?php echo $dtcp['reduction']; ?></span></div>
                        <a href="#" class="brand-name"><?php echo $dtmch['marchand']; ?></a>
                        <div class="coupon-desc"><?php echo $dtcp['presentation']; ?></div>
						<div id="adressecoupon" class="coupon-desc" style="font-size:14px;border:5px solid #f16262;padding:8px;display:none;">
							<b><span style="color:#00B5F4">Adresse :</span></b> <?php echo $dtmch['adresse']; ?><br/>
							<b><span style="color:#00B5F4">Tél :</span></b> <?php echo $dtmch['tel']; ?><br/>
							<b><span style="color:#00B5F4">Site :</span></b> <?php echo $dtmch['site']; ?><br/>
						</div>
                        <div class="wrap-btn clearfix">
                            <div class="day-left">
							<div class="countdown<?php echo $dtcp['id']; ?> styled"></div>
									<script type="text/javascript">
									  $(function() {
										<?php
											$dt = explode('-',$dtcp['date_fin']);
											$monthName = date("F", mktime(0, 0, 0, $dt[1], 10));
										?>
										var endDate = "<?php echo $monthName; ?> <?php echo $dt[2]; ?>, <?php echo $dt[0]; ?> 23:59:59";

										$('.countdown<?php echo $dtcp['id']; ?>.styled').countdown({
										  date: endDate,
										  render: function(data) {
											$(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>jours</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>heures</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>minutes</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>secondes</span></div>");
										  }
										});
										});
									</script>
							</div>
							<?php if(isset($_SESSION['id_membre'])) { ?>
                            <span id="showadress" data-value="<?php echo $dtcp['id']; ?>" class="btn btn-blue btn-take-coupon" href="#">Afficher l'adresse</span>
							<?php } else { ?>
							<span id="showloginpop" class="btn btn-blue btn-take-coupon" href="#">Afficher l'adresse</span>
							<?php } ?>
                        </div>
                        <div class="wrap-action clearfix">
                            <div class="left-vote">
                                <!--span class="lbl-work">100% work</span>
                                <span class="lbl-vote">12 <i class="icon iAddVote"></i></span>
                                <span class="lbl-vote">2 <i class="icon iSubVote"></i></span-->
                            </div>
                            <div class="right-social">
                                Partagez sur
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo BASE_URL.$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
								<a href="http://twitter.com/share?text=<?php echo $dtcp['titre']; ?>&amp;url=<?php echo BASE_URL.$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>
                                <a href="http://pinterest.com/pin/create/button/?url=<?php echo BASE_URL.$_SERVER['REQUEST_URI']; ?>&description=<?php echo $dtcp['titre']; ?>" target="_blank"><i class="fa fa-pinterest-square fa-2x"></i></a>
                                <!--a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a-->
                            </div>
                        </div>
                    </div>
                    <div class="grid_3">
                        <div class="brand-info ta-c">
                            <div class="brand-logo"><img src="images/photos/<?php echo $dtmch['logo']; ?>" alt="<?php echo $dtmch['marchand']; ?>"></div>
                            <span class="star-rate"><span style="width: 91%"></span></span>
                            <div class="rated-number">
							<?php 
								$sql=mysql_query('select count(*) as total from followers where id_marchand = "'.$dtmch['id'].'"');
								$data = mysql_fetch_array($sql);
								echo $data['total']; 
							?>
							Followers</div>
                            <div class="brand-desc ta-l"><?php echo $dtmch['presentation']; ?></div>
                            <a class="link-brand" href="marchand-<?php echo $dtmch['slug']; ?>.html">Voir le marchand</a>
                        </div>
                    </div>
                </div><!--end: .mod-coupon-detail -->
                <div class="mod-grp-coupon block clearfix">
                    
                 </div><!--end block: Related coupons-->
            </div>
        </div>