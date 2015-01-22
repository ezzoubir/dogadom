
        <div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title">Les promos </h2>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'filter.php'; ?>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="layout-2cols clearfix">
                    <div class="grid_8 content">
                        <div class="mod-coupons-code">
                            <div id="coupons_list" class="wrap-list couponslist">
							<?php
								$sql='select * from coupons order by id desc';
								$req=mysql_query($sql);
								while($dtcp=mysql_fetch_assoc($req)){
							?>
								<?php if($dtcp['date_fin'] > date('Y-m-d')) { ?>
                                <div class="coupons-code-item right-action flex">
                                    <div class="brand-logo thumb-left">
                                        <div class="wrap-logo">
                                            <div class="center-img">
                                                <span class="ver_hold"></span>
                                                <a href="coupon-<?php echo $dtcp['slug']; ?>.html" class="ver_container">
													<img class="lazy" data-original="images/photos/<?php echo $dtcp['logo']; ?>" alt<?php echo $dtcp['titre']; ?>">
												</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-content flex-body">
                                        <p class="rs save-price"><a href="#">Réduction de: <?php echo $dtcp['reduction']; ?> <br/> 
										<?php echo truncate($dtcp['presentation'], 80, '...', true); ?></a></p>
                                        <p class="rs coupon-desc">
											<div class="time-left"><br/>
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
											</script></div>
										</p>
                                        <div class="bottom-action">
                                            <div class="left-vote">
                                                <span class="lbl-work">100% ça marche</span>
                                                <!--span>
                                                    <span class="lbl-vote"><span class="vtop">12</span> <i class="icon iAddVote"></i></span>
                                                    <span class="lbl-vote"><span class="vbot">2</span> <i class="icon iSubVote"></i></span>
                                                </span-->
                                            </div>
                                            <a class="btn btn-blue btn-view-coupon" href="promo-<?php echo $dtcp['slug']; ?>.html">Détails</a>
                                        </div>
                                    </div>
                                </div><!--end: .coupons-code-item -->
							<?php } } ?>
                            </div>
                            <div class="pagination">
								<?php
								
									$query="select id from coupons order by id desc";
									$res=mysql_query($query);
									$count=mysql_num_rows($res);
									if($count > 0){
										  $paginationCount=getPagination($count);
									}

									if($count > 0){
										echo '<a class="page-nav" href="javascript:void(0)" onclick="changePagination(\'0\',\'first\')"><i class="icon iPrev"></i></a>';
									
										for($i=0;$i<$paginationCount;$i++){
										
											echo '<a id="page_'.$i.'" class="page-num" href="javascript:void(0)" onclick="changePagination(\''.$i.'\',\''.$i.'_no\')">'.($i+1).'</a>';
											  
										}
										echo '<a class="page-nav" href="javascript:void(0)" onclick="changePagination(\''.($paginationCount-1).'\',\'last\')"><i class="icon iNext"></i></a>';
										echo '<span class="flash"></span>';
																
									}
								
								?>
                            </div>
                        </div><!--end: .mod-coupons-code -->
                    </div>
                    <div class="grid_4 sidebar">
                        <div class="mod-list-store block">
                            <h3 class="title-block">Marchands Populaires</h3>
                            <div class="block-content">
                                <div class="wrap-list-store clearfix">
								<?php	
									$sql='select * from marchands order by id desc limit 8';
									$req=mysql_query($sql);
									while($dtmch=mysql_fetch_assoc($req)){
								?>
                                    <a class="brand-logo" href="marchand-<?php echo $dtmch['slug']; ?>.html">
                                        <span class="wrap-logo">
                                            <span class="center-img">
                                                <span class="ver_hold"></span>
                                                <span class="ver_container"><img src="images/photos/<?php echo $dtmch['logo']; ?>" alt<?php echo $dtmch['marchand']; ?>"></span>
                                            </span>
                                        </span>
                                    </a>
								<?php } ?>
                                </div>
                            </div>
                        </div><!--end: .mod-list-store -->
                        <div class="mod-ads"><a href="#"><img src="images/04-17.jpg" alt="$NAME"></a></div>
                        <div class="mod-ads"><a href="#"><img src="images/04-17.jpg" alt="$NAME"></a></div>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript">
			function changePagination(pageId,liId){
				 $("#coupons_list").html('<p style="text-align:center"><img src="<?php echo BASE_URL;?>images/loading.gif" /></p>');
				 var dataString = 'pageId='+ pageId;
				 $.ajax({
					   type: "POST",
					   url: "includes/loadData.php",
					   data: dataString,
					   cache: false,
					   success: function(result){
							 $(".flash").hide();
							 $(".pagination a").removeClass("active") ;
							 $("#page_"+pageId).addClass("active");
							 $("#coupons_list").html(result);
					   }
				  });
			}
		</script>