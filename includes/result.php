<?php
	require 'config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
  
			if($_POST['filter']==1) {
							$cat = isset($_POST['catId']) && $_POST['catId'] !=0 ? ' AND id_cat="'.$_POST['catId'].'" ' : '';
							$ville = isset($_POST['cityId']) && $_POST['cityId'] !=0 ? ' AND id_ville="'.$_POST['cityId'].'" ' : '';
							$recherche = isset($_POST['search']) && $_POST['search'] !='' ? ' AND (titre like "%'.$_POST['search'].'%" OR presentation like "%'.$_POST['search'].'%" OR code = "'.$_POST['search'].'")' : '';
							
							$sqc='select * from coupons where 1=1'
								.$cat
								.$ville
								.$recherche;
								
															
							$rec=mysql_query($sqc);
							while($dtc2=mysql_fetch_array($rec)){
						?>
						
							<div class="coupon-item grid_3">
								<div class="coupon-content">
									<div class="img-thumb-center">
										<div class="wrap-img-thumb">
											<span class="ver_hold"></span>
											<a href="coupon-<?php echo $dtc2['slug']; ?>.html" class="ver_container"><img src="images/photos/<?php echo $dtc2['logo']; ?>" alt="<?php echo $dtc2['titre']; ?>"></a>
										</div>
									</div>
									<div class="coupon-price"><?php echo $dtc2['reduction']; ?> Off</div>
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
										</script>
									</div>
									<a class="btn btn-blue btn-take-coupon" href="coupon-<?php echo $dtc2['slug']; ?>.html">Take Coupon</a>
								</div>
								<i class="stick-lbl hot-sale"></i>
							</div><!--end: .coupon-item -->
						<?php } } elseif($_POST['filter']=='addconsoma') {
								$sql='insert into users_coupons (id_membre,id_coupon) values ("'.$_POST['idmembre'].'","'.$_POST['idpromo'].'") ';
								mysql_query($sql);
						 } ?>