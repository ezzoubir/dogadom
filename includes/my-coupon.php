        <?php
			$sql='SELECT * from coupons cp 
				  LEFT JOIN users_coupons usp 
				  ON cp.id=usp.id_coupon 
				  WHERE usp.id_membre="'.$_SESSION['id_membre'].'"';
				  
			$req=mysql_query($sql);
			$total = mysql_num_rows($req);
		?>
		<div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title">Mes Coupons</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="my-coupon mod-grp-coupon block clearfix tabbable tab-style-2">
                    <div class="grid_12">
                        <h3 class="title-block">
                            <span class="wrap-tab clearfix">
                                <span class="lbl-tab active">COUPONS (<?php echo $total; ?>)</span>
                                <span class="lbl-tab">Ajouter une promotion</span>
                            </span>
                        </h3>
                    </div>
                    <div class="block-content list-coupon clearfix">
                        <div class="tab-content">
                            <div class="tab-content-item clearfix active">
                                <?php while($dtc2=mysql_fetch_array($req)){ ?>
								<div class="coupon-item grid_3">
                                    <div class="coupon-content">
                                        <div class="img-thumb-center">
										<div class="wrap-img-thumb">
											<span class="ver_hold"></span>
											<a href="promo-<?php echo $dtc2['slug']; ?>.html" class="ver_container"><img src="images/photos/<?php echo $dtc2['logo']; ?>" alt="<?php echo $dtc2['titre']; ?>"></a>
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
                                    </div>
                                    <i class="stick-lbl hot-sale"></i>
                                </div><!--end: .coupon-item -->
								<?php } ?>
                                <!--div class="grid_12">
                                    <div class="pagination">
                                        <a class="txt-nav" href="#">Newer <span>post</span></a>
                                        <a class="page-num active" href="#">1</a>
                                        <a class="page-num" href="#">2</a>
                                        <a class="page-num" href="#">3</a>
                                        <a class="page-num" href="#">4</a>
                                        <a class="page-num" href="#">5</a>
                                        <a class="txt-nav" href="#">Older <span>post</span></a>
                                    </div>
                                </div-->
                            </div><!--end: tab coupon-->
                            <div class="tab-content-item clearfix">
                                <div class="coupons-code-item view-code flex grid_12">
                                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                                        <table width="100%" cellspacing="5" cellpadding="0" class="addpromo">
                                                <tr><td>Titre</td><td><input type="text" name="titre" value="" /></td></tr>
                                                <tr><td>Image de promotion</td><td><input type="file" name="logo" value="" /></td></tr>
                                                <tr><td>Présentation</td><td><textarea cols="20" rows="3" name="presentation"></textarea></td></tr>    
                                                <tr><td>Web site</td><td><input type="text" name="site" value="" /></td></tr>       
                                                <tr><td>Réduction</td><td><input type="text" name="reduction" value="" /></td></tr>
                                                <tr><td>Ville</td><td><select name="ville">
                                                <option value=""></option>
                                                <?php
                                                    $sq='select * from villes order by ville asc';
                                                    $rq=mysql_query($sq);
                                                    while($dt=mysql_fetch_array($rq)){
                                                ?>
                                                <option value="<?php echo $dt['id']; ?>"><?php echo $dt['ville']; ?></option>
                                                <?php } ?>
                                                </select></td></tr>
                                                <tr><td>Marchand</td><td><select name="marchand">
                                                <option value=""></option>
                                                <?php
                                                    $sq='select * from marchands order by marchand asc';
                                                    $rq=mysql_query($sq);
                                                    while($dt=mysql_fetch_array($rq)){
                                                ?>
                                                <option value="<?php echo $dt['id']; ?>"><?php echo $dt['marchand']; ?></option>
                                                <?php } ?>
                                                </select></td></tr>
                                                <tr><td>Secteur</td><td><select name="cat">
                                                <option value=""></option>
                                                <?php
                                                    $sq='select * from categories order by cat asc';
                                                    $rq=mysql_query($sq);
                                                    while($dt=mysql_fetch_array($rq)){
                                                ?>
                                                <option value="<?php echo $dt['id']; ?>"><?php echo $dt['cat']; ?></option>
                                                <?php } ?>
                                                </select></td></tr>
                                                <tr><td>Date de debut</td><td><input type="text" name="date_debut" value="" placeholder="AAAA-MM-JJ"/></td></tr>
                                                <tr><td>Date de fin</td><td><input type="text" name="date_fin" value="" placeholder="AAAA-MM-JJ"/></td></tr>
                                                <tr><td></td><td><input type="submit" name="ajouter" value="Ajouter" /></td></tr>
                                        </table>
                                        </form>
                                </div><!--end: .coupons-code-item -->
                            </div><!--end: tab Coupon codes-->
                            <div class="tab-content-item clearfix">
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                                <div class="brand-item grid_4">
                                    <div class="brand-content">
                                        <div class="brand-logo">
                                            <div class="wrap-img-logo">
                                                <span class="ver_hold"></span>
                                                <a href="#" class="ver_container"><img src="images/01_07.jpg" alt="$BRAND_TITLE"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-unfollow ta-c">
                                        <a class="btn-discard" href="#">Unfollow</a>
                                    </div>
                                </div><!--end: .brand-item -->
                            </div><!--end: tab Brands-->
                        </div>
                    </div>
                </div><!--end block: Tab Coupons-->
            </div>
        </div>