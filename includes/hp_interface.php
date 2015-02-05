<!-- header text -->
    <div class="header_text">
        <div class="container_12">
            <div class="grid_9">
                <h3>Bienvenue! Maintenant, vous pouvez multiplier vos gains juste en partageant des publicités.</h3>
                <p>Chez WinWin, vous êtes payés pour partager les publicites de nos annonceurs.</p>
            </div>
            <div class="grid_3 align_right">
                <a href="/login.php?provider=facebook" class="sc_button large box_button"><span class="social_white_icons16 icon16_22 icon"></span><span class="icon_divider"></span><span class="button_text">Se connecter</span></a>
            </div>
        </div>
    </div>
    <!-- header text end -->
    <!-- container 12 -->
    <div class="container_12">
        <!-- features boxes -->
        <div class="grid_12">
            <div class="divider_page"><h2>Qui peut gagner & Principaux benefices</h2></div>
            <div class="grid_4 alpha">
                <!-- a feature box -->
                <div class="feature_box">
                    <div class="feature_icon"><a href="sliders.html" class="users_icons32 icon32_5"></a></div>
                    <div class="feature_content">
                        <div class="feature_heading">
                            <div class="medium">Membre</div>
                        </div>
                        <p class="feature_desc">En tant que membre, vous pouvez gagner simplement en partageant toutes les publicités que nous affichons.</p>
                    </div>
                    <div class="feature_link"><a href="sliders.html" class="arrows_icons16 icon16_5 tooltip_s" title="Read More"></a></div>
                </div>
                <!-- a feature box end -->
            </div>
            <div class="grid_4 lambda">
                <!-- a feature box -->
                <div class="feature_box">
                    <div class="feature_icon"><a href="portfolio_one_column.html" class="users_icons32 icon32_4"></a></div>
                    <div class="feature_content">
                        <div class="feature_heading">
                            <div class="medium">Annonceur</div>
                        </div>
                        <p class="feature_desc">Vous pouvez annoncer votre publicité pour aider à augmenter la circulation et vos ventes.<br/></p>
                    </div>
                    <div class="feature_link"><a href="portfolio_one_column.html" class="arrows_icons16 icon16_5 tooltip_s" title="Read More"></a></div>
                </div>
                <!-- a feature box end -->
            </div>
            <div class="grid_4 omega">
                <!-- a feature box -->
                <div class="feature_box">
                    <div class="feature_icon"><a href="contact.html" class="misc_icons32 icon32_96"></a></div>
                    <div class="feature_content">
                        <div class="feature_heading">
                            <div class="medium">A propos de nous</div>
                        </div>
                        <p class="feature_desc">Nous sommes experts en nouvelles solutions d'affaires dans un environnement gagnant-gagnant.</p>
                    </div>
                    <div class="feature_link"><a href="contact.html" class="arrows_icons16 icon16_5 tooltip_s" title="Read More"></a></div>
                </div>
                <!-- a feature box end -->
            </div>
        </div>
        <!-- features boxes end -->
        <!-- recent works -->
        <div class="grid_12">
            <div class="divider_page">
                <h2>Nouvelles Publicites</h2>
                <div class="heading_button">
                    <div class="prev_button" id="recentworks_prev">Prev</div>
                    <div class="next_button" id="recentworks_next">Next</div>
                </div>
            </div>
        </div>
        <div id="recentWorks">
            <?php
                $sql='SELECT * FROM ads WHERE active = 1 and finished=0 and aid NOT IN (SELECT ad_id from shares where user_id='.$_SESSION['id_membre'].') order by id desc limit 6';
                $req=mysql_query($sql);
                while($data=mysql_fetch_array($req)){
            ?>
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="<?php echo RepPhoto.'pic_ads/'.$data['image']; ?>" alt="<?php echo $data['title']; ?>" class="grid_image"/>
                    <div class="work_heading"><?php echo $data['title']; ?></div>
                </div>
                <div class="hover">
                    <h4><?php echo $data['title']; ?></h4>
                    <div class="work_links">
                        <div><a href="<?php echo BASE_URL.'ad-'.$data['aid']; ?>" class="misc_white_icons16 icon16_67" title="<?php echo $data['title']; ?>"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php echo getnbrTotalShare($data['aid']); ?></a></div>
                    </div>
                    <!-- social links end -->
                </div>
            </div>
            <!-- a work end -->
            <?php } ?>
            
        </div>
        <!-- recent works end -->
        <!-- our clients -->
        <div class="grid_12">
            <div class="divider_page">
                <h2>Nos Clients</h2>
                <div class="heading_button">
                    <div class="prev_button" id="ourclients_prev">Prev</div>
                    <div class="next_button" id="ourclients_next">Next</div>
                </div>
            </div>
            <div class="our_clients">
                <?php
                    $sql='select * from users where active=1 and type="premium" order by id desc';
                    $req=mysql_query($sql);
                    while($data=mysql_fetch_array($req)){
                ?>
                <a href="http://themeforest.net/?ref=DesignForLife" target="_blank" class="a_client themeforest"></a>
                <a href="http://activeden.net/?ref=DesignForLife" target="_blank" class="a_client activeden"></a>
                <a href="http://audiojungle.net/?ref=DesignForLife" target="_blank" class="a_client audiojungle"></a>
                <a href="http://codecanyon.net/?ref=DesignForLife" target="_blank" class="a_client codecanyon"></a>
                <a href="http://3docean.net/?ref=DesignForLife" target="_blank" class="a_client ocean3d"></a>
                <a href="http://photodune.net/?ref=DesignForLife" target="_blank" class="a_client photodune"></a>
                <a href="http://themeforest.net/?ref=DesignForLife" target="_blank" class="a_client tutorials"></a>
                <a href="http://videohive.net/?ref=DesignForLife" target="_blank" class="a_client videohive"></a>
                <a href="http://activeden.net/?ref=DesignForLife" target="_blank" class="a_client activeden"></a>
                <a href="http://themeforest.net/?ref=DesignForLife" target="_blank" class="a_client themeforest"></a>
                <?php } ?>
            </div>
        </div>
        <!-- our clients end -->
    </div>
    <!-- container 12 end -->