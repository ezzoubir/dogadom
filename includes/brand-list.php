		<?php 
			$sql='select * from marchands order by marchand';
			$req=mysql_query($sql);
			$num=mysql_num_rows($req);
			$dtmch=mysql_fetch_assoc($req);
		?>
        <div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title"><?php echo $num; ?> marchands vous attendent </h2>
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
                        <div style="position: relative;" id="container_list_link" class="clearfix link-alpha-link">
                            <div class="mod-brands block clearfix">
								<div id="ourHolder" class="block-content list-brand clearfix">
									<?php
										$sql='select * from marchands order by id desc limit 12';
										$req=mysql_query($sql);
										while($dtmch=mysql_fetch_assoc($req)){
										
									?>
									<div class="brand-item grid_4 item marchands-<?php $rest = strtolower(substr($dtmch['marchand'], 0, 1));  echo $rest; ?>">
										<div class="brand-content">
											<div class="brand-logo">
												<div class="wrap-img-logo">
													<span class="ver_hold"></span>
													<a href="marchand-<?php echo $dtmch['slug']; ?>.html" class="ver_container">
														<img class="lazy" data-original="images/photos/<?php echo $dtmch['logo']; ?>" alt="<?php echo $dtmch['marchand']; ?>">
													</a>
												</div>
											</div>
										</div>
									</div><!--end: .brand-item -->
									<?php } ?>
								</div>
                </div><!--end: .mod-brand -->
                        </div>
                    </div>
                </div><!--end block: Featured Coupons-->
                <?php include 'newsletter.php'; ?><!--end: .mod-email-newsletter-->
            </div>
        </div>
