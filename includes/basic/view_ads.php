    <!-- header text -->
    <div class="header_text">
        <div class="container_12">
            <div class="grid_12">
                <h1>Annonces</h1>
            </div>
        </div>
    </div>
    <!-- header text end -->
    <!-- container 12 -->
    <div class="container_12">
        <!-- portfolio items -->
        <div class="portfolio_items four_columns">
            <?php
				if(isset($_SESSION['id_membre']) && isset($_SESSION['userur'])) {
                $sql='SELECT * FROM ads WHERE active = 1 and nbr_share > 0 and finished=0 and aid NOT IN (SELECT ad_id from shares where user_id='.$_SESSION['id_membre'].') order by id';
                } else {
				$sql='SELECT * FROM ads WHERE active = 1 and nbr_share > 0 and finished=0 and aid NOT IN (SELECT ad_id from shares) order by id';
				}
				$req=mysql_query($sql);
                while($data=mysql_fetch_array($req)) {

                if($data['age1']<$_SESSION['age'] && $data['age2']>$_SESSION['age'] ) {
            ?>
            <!-- a portfolio item -->
            <div class="a_item" data-cats="photography interactive">
                <div class="grid_3">
                    <!-- item image -->
                    <div class="a_work">
                        <!-- image -->  
                        <div class="normal">
                            <img src="<?php echo RepPhoto.'pic_ads/'.$data['image']; ?>" alt="" class="grid_image"/>
                            <div class="work_heading"><?php echo $data['title']; ?></div>
                        </div>
                        <!-- image end -->
                        <!-- hover effect -->
                        <div class="hover">
                            <div class="work_links">
							<?php if(isset($_SESSION['id_membre']) && isset($_SESSION['userur'])) { ?>
                                <div><a href="<?php echo BASE_URL.'ad-'.$data['aid']; ?>" class="misc_white_icons16 icon16_67" title="<?php echo $data['title']; ?>"></a></div>
							<?php } else { ?>
								<div><a href="#" class="misc_white_icons16 icon16_67" title="<?php echo $data['title']; ?>"></a></div>
							<?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <!-- social links -->
                            <div class="social_links">
                                <div class="share_icons">
								<?php if(isset($_SESSION['id_membre']) && isset($_SESSION['userur'])) { ?>
                                    <a href="#" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php echo getnbrTotalShare($data['aid']); ?></a>
								<?php } ?>
                                </div>
                            </div>
                            <!-- social links end -->
                        </div>
                        <!-- hover effect end -->
                    </div>
                    <!-- item image end -->
                </div>
            </div>
            <!-- a portfolio item end -->
            <?php } } ?>
        </div>
        <!-- portfolio items end -->
    </div>
    <!-- container 12 end -->