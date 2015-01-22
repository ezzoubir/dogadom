
        <div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title">Catalogues</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php //include 'filter.php'; ?>
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-brand-alphabetical block clearfix">
                    <div class="block-content list-brand clearfix">
						<div class="grid_12 alphabe">
                            <div id="filterOptions" class="wrap-list-char">
                                <span class="all">Tous</span>
                                <span class="marchands-a">A</span>
                                <span class="marchands-b">B</span>
                                <span class="marchands-c">C</span>
                                <span class="marchands-d">D</span>
                                <span class="marchands-e">E</span>
                                <span class="marchands-f">F</span>
                                <!--a class="marchands-g" class="disable">G</a-->
                                <span class="marchands-g">G</span>
                                <span class="marchands-h">H</span>
                                <span class="marchands-i">I</span>
                                <span class="marchands-j">J</span>
                                <span class="marchands-k">K</span>
                                <span class="marchands-l">L</span>
                                <span class="marchands-m">M</span>
                                <span class="marchands-n">N</span>
                                <span class="marchands-o">O</span>
                                <span class="marchands-p">P</span>
                                <span class="marchands-q">Q</span>
                                <span class="marchands-r">R</span>
                                <span class="marchands-s">S</span>
                                <span class="marchands-t">T</span>
                                <span class="marchands-u">U</span>
                                <span class="marchands-v">V</span>
                                <span class="marchands-w">W</span>
                                <span class="marchands-x">X</span>
                                <span class="marchands-y">Y</span>
                                <span class="marchands-z">Z</span>
                                <span class="marchands-0">0</span>
                                <span class="marchands-1">1</span>
                                <span class="marchands-2">2</span>
                                <span class="marchands-3">3</span>
                                <span class="marchands-4">4</span>
                                <span class="marchands-5">5</span>
                                <span class="marchands-6">6</span>
                                <span class="marchands-7">7</span>
                                <span class="marchands-8">8</span>
                                <span class="marchands-9">9</span>
                            </div>
                        </div>
                        <div class="clear"></div>
						<div class="grid_12 content">
							<div class="mod-coupons-code">
								<div id="ourHolder" class="wrap-list couponslist">
								<?php
									$sql='select * from catalogues order by id desc';
									$req=mysql_query($sql);
									while($dtcp=mysql_fetch_assoc($req)){
								?>
									<div class="coupon-item grid_3 item marchands-<?php $rest = strtolower(substr($dtcp['catalogue_titre'], 0, 1));  echo $rest; ?>">
									<div class="coupon-content">
										<div class="img-thumb-center">
											<div class="wrap-img-thumb">
												<span class="ver_hold"></span>
												<a href="<?php echo BASE_URL.RepPhoto.$dtcp['catalogue']; ?>" target="_blank" class="ver_container">
														<img class="lazy" data-original="images/photos/<?php echo $dtcp['photo']; ?>" alt="<?php echo $dtcp['catalogue_titre']; ?>"><br/><br/>
														<div class="coupon-brand"><?php echo ucfirst($dtcp['catalogue_titre']); ?></div>
												</a>
												<br/>
												<a class="btn btn-blue btn-view-coupon" href="<?php echo BASE_URL.RepPhoto.$dtcp['catalogue']; ?>">Voir le catalogue</a>
											</div>
										</div>
										
									</div>
									<i class="stick-lbl hot-sale"></i>
								</div><!--end: .coupon-item -->
								<?php } ?>
								</div>
							</div><!--end: .mod-coupons-code -->
						</div>
					</div>
                </div>
            </div>
        </div>