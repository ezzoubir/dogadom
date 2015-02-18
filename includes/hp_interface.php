<!-- header text -->
    <div class="header_text">
        <div class="container_12">
            <div class="grid_9">
                <h3>Bienvenue! Maintenant, vous pouvez multiplier vos gains juste en partageant des publicités.</h3>
                <p>Chez <?php echo NAME_SITE; ?>, vous êtes payés pour partager les publicites de nos annonceurs.</p>
            </div>
            <div class="grid_3 align_right">
                <a href="/login.php?provider=facebook<?php if(isset($_GET['ur'])) { echo '&ur='.$_GET['ur']; } ?>" class="sc_button large box_button"><span class="social_white_icons16 icon16_22 icon"></span><span class="icon_divider"></span><span class="button_text">Se connecter</span></a>
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
                    <div class="feature_icon"><a href="#" class="users_icons32 icon32_5"></a></div>
                    <div class="feature_content">
                        <div class="feature_heading">
                            <div class="medium">Membre</div>
                        </div>
                        <p class="feature_desc">En tant que membre, vous pouvez gagner simplement en partageant toutes les publicités que nous affichons.</p>
                    </div>
                </div>
                <!-- a feature box end -->
            </div>
            <div class="grid_4 lambda">
                <!-- a feature box -->
                <div class="feature_box">
                    <div class="feature_icon"><a href="#" class="users_icons32 icon32_4"></a></div>
                    <div class="feature_content">
                        <div class="feature_heading">
                            <div class="medium">Annonceur</div>
                        </div>
                        <p class="feature_desc">Vous pouvez annoncer votre publicité <br/>pour aider à augmenter la circulation et vos ventes.<br/></p>
                    </div>
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
                </div>
                <!-- a feature box end -->
            </div>
        </div>
        <!-- features boxes end -->
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
                <!--a href="#" target="_blank" class="a_client">
					<img src="<?php echo BASE_URL.RepPhoto.'pic_company/'.$data['name']; ?>" alt="<?php echo $data['name']; ?>" title="<?php echo $data['name']; ?>"/>
				</a-->
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