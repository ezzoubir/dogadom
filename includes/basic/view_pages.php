    <!-- header text -->
    <div class="header_text">
        <div class="container_12">
            <div class="grid_12">
                <h1>Pages Facebook</h1>
            </div>
        </div>
    </div>
    <!-- header text end -->
    <!-- container 12 -->
    <div class="container_12">
        <!-- portfolio items -->
        <div class="portfolio_items four_columns">
            <?php
				if(isset($_SESSION['id_membre'])) {
                $sql='SELECT * FROM pages_facebook WHERE active = 1 and nbr_like > 0 and finished=0 and id NOT IN (SELECT pf_id from likdes where user_id='.$_SESSION['id_membre'].') order by id';
                } else {
				$sql='SELECT * FROM pages_facebook WHERE active = 1 and nbr_like > 0 and finished=0 and id NOT IN (SELECT pf_id from likdes) order by id';
				}
				$req=mysql_query($sql);
                while($data=mysql_fetch_array($req)) {
            ?>
            <!-- a portfolio item -->
            <div class="a_item" data-cats="photography interactive">
                <div class="grid_3">
                    <!-- item image -->
                    <div class="a_work">
                        <!-- image -->  
                        <div class="normal">
                            <img src="<?php echo getDetailPageFb($data['page_id'],'cover->source'); ?>" alt="" class="grid_image"/>
                            <div class="work_heading"><?php echo getDetailPageFb($data['page_id'],'name'); ?></div>
                        </div>
                        <!-- image end -->
                        <!-- hover effect -->
                        <div class="hover">
                            <!-- social links -->
                            <div class="social_links">
                                <div class="share_icons">
                                  <?php echo getDetailPageFb($data['page_id'],'cover->source'); ?>
								  <p><b><?php echo getDetailPageFb($data['page_id'],'likdes'); ?></b> personnes aiment ça</p>
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
            <?php } ?>
        </div>
        <!-- portfolio items end -->
    </div>
    <!-- container 12 end -->