    <?php
		$sql='select * from marchands where slug = "'.$_GET['slug'].'"';
		$req=mysql_query($sql);
		$dtmch=mysql_fetch_assoc($req);
	
	?>
		<div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title"><?php echo $dtmch['marchand']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-brand-detail-2 clearfix">
                    <div class="grid_9 wrap-left-info">
                        <p class="rs ta-c banner-brand"><img src="images/08-03.jpg" alt="<?php echo $dtmch['marchand']; ?>"></p>
                        <div class="mod-grp-coupon block clearfix">
                            <h3 class="title-block">les coupons de <?php echo $dtmch['marchand']; ?></h3>
                            <div class="block-content list-coupon clearfix">
								<?php
									$sqc='select * from coupons where id_marchand = "'.$dtmch['id'].'"';
									$rec=mysql_query($sqc);
									while($dtc2=mysql_fetch_array($rec)){
								?>
								<?php if($dtc2['date_fin'] > date('Y-m-d')) { ?>
                                <div class="coupon-item">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
                                            <div class="wrap-img-thumb">
                                                <span class="ver_hold"></span>
                                                <a href="promo-<?php echo $dtc2['slug']; ?>.html" class="ver_container"><img src="images/photos/<?php echo $dtc2['logo']; ?>" alt="<?php echo $dtc2['titre']; ?>"></a>
                                            </div>
                                        </div>
                                        <div class="coupon-price">Réduction de: <span style="color:#F16262"><?php echo $dtc2['reduction']; ?></span></div>
                                        <div class="coupon-brand"><?php echo $dtc2['titre']; ?></div>
                                        <div class="coupon-desc"><?php echo $dtc2['presentation']; ?> </div>
                                        <div class="time-left"><br/>
										<div class="countdown<?php echo $dtc2['id']; ?> styled"></div>
											<script type="text/javascript">
											  $(function() {
												<?php
													$dt = explode('-',$dtc2['date_fin']);
													$monthName = date("F", mktime(0, 0, 0, $dt[1], 10));
												?>
												var endDate = "<?php echo $monthName; ?> <?php echo $dt[2]; ?>, <?php echo $dt[0]; ?> 23:59:59";

												$('.countdown<?php echo $dtc2['id']; ?>.styled').countdown({
												  date: endDate,
												  render: function(data) {
													$(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>jours</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>heures</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>minutes</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>secondes</span></div>");
												  }
												});
												});
											</script></div>
                                        <a class="btn btn-blue btn-take-coupon" href="coupon-<?php echo $dtc2['slug']; ?>.html">Voir le bon</a>
                                    </div>
                                </div><!--end: .coupon-item -->
								<?php } } ?>
                            </div>
                         </div><!--end block: group coupons-->
                    </div>
					<div class="grid_3 wrap-right-info">
						<div class="brand-info-right">
                            <p class="rs ta-c brand-logo"><img src="images/photos/<?php echo $dtmch['logo']; ?>" alt="<?php echo $dtmch['marchand']; ?>"></p>
                            <div class="rate-brand clearfix">
                                <div class="basic" data-average="12" data-id="<?php echo $dtmch['id']; ?>"></div>
                            </div>
                            <div class="count-info clearfix">
                                <span class="lbl">Follower</span>
                                <span class="val">
									<?php 
										$sql=mysql_query('select count(*) as total from followers where id_marchand = "'.$dtmch['id'].'"');
										$dataf = mysql_fetch_array($sql);
										echo $dataf['total']; 
									?>
								</span>
                            </div>
                            <div class="count-info clearfix">
                                <span class="lbl">Coupons</span>
                                <span class="val">
									<?php 
										$sql=mysql_query('select count(*) as total from coupons where id_marchand = "'.$dtmch['id'].'"');
										$datac = mysql_fetch_array($sql);
										echo $datac['total']; 
									?>
								</span>
                            </div>
							<?php 
								$sqq='select * from followers where id_membre = "22" and id_marchand = "'.$dtmch['id'].'"';
								$reqq=mysql_query($sqq);
								$nmq=mysql_num_rows($reqq);
								if($nmq==1){
							?>
                            <a class="btn btn-blue btn-unfollow-brand" data-id="<?php echo $dtmch['id']; ?>" href="javascript:void(0);">Unfollow <?php echo $dtmch['marchand']; ?></a>
							<?php } else { ?>
							<a class="btn btn-blue btn-follow-brand" data-id="<?php echo $dtmch['id']; ?>" href="javascript:void(0);">Follow <?php echo $dtmch['marchand']; ?></a>
							<?php } ?>
                            <div class="brand-desc">
                                <div class="title-desc">À propos de <?php echo $dtmch['marchand']; ?></div>
                                <p class="rs"><?php echo $dtmch['presentation']; ?> </p>
                            </div>
                            <i class="stick-lbl trust-brand-y"></i>
                        </div><!--end: .brand-info-right -->
					</div>
                </div><!--end: .mod-brand-detail-2 -->
            </div>
        </div>
        