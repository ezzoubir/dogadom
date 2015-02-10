<!-- header text -->
    <?php 
        $sql='select * from ads where aid="'.$_GET['idad'].'" and active = 1  and finished = 0 and nbr_share > 0 ';
        $req=mysql_query($sql);
        $data=mysql_fetch_array($req);
    ?>
    <div class="header_text">
        <div class="container_12">
            <div class="grid_12">
                <h1><?php echo $data['title']; ?></h1>
            </div>
        </div>
    </div>
    <!-- header text end -->
    <!-- container 12 -->
    <div class="container_12">
        <!-- project container -->
        <script> 
          FB.init({appId: "1562922873946573", status: true, cookie: true});//change your application ID

          function postToFeed() {

            // calling the API ...
            var obj = {
              method: "share",
              href: "<?php echo BASE_URL.'ad-'.$data['aid']; ?>"
            };
            
            function callback(response) {
                if (response && response.post_id) {
                    alert('Post was published.');
                    var idad = <?php echo $data['aid']; ?>;
                    var iduser = <?php echo $_SESSION['userur']; ?>;
                    var data = "id_user="+iduser+"&id_ad="+idad+"&action=sharepaye";
                    $.ajax({
                        type: "POST",
                        url: 'phpajax/sharepaye.php',
                        data: data,
                        success : function(){
                            window.location.href = "<?php echo BASE_URL; ?>annonces";
                        }
                    });
                } else {
                  alert('Merci de partager cette annonce!');
                }
              }

            FB.ui(obj, callback);
          }
        
        </script>
        <div class="grid_5">
                <div class="divider_page"><h4><?php echo $data['title']; ?></h4></div>
                <!-- project content -->
                <div class="project-content">
                    <p><?php echo $data['description']; ?></p>
                </div>
                <!-- project content end -->
                <!-- share options -->
                <div class="share-post">
                    <div class="float_left heading">
                        Partager sur
                    </div>
                    <div class="float_right socialicons">
                        <a onclick='postToFeed(); return false;'><img src="assets/images/icons/facebook.png"  alt="partager sur facebook" style="margin-top: -2px;"/></a>
                    </div>
                </div>
                <!-- share options end -->
                <div class="clearfix"></div>
                <div class="divider_page"><h4>Project Details</h4></div>
                <!-- project meta info -->
                <div class="meta-info project-meta">
                    <div class="date-info">Ajouté par : <?php echo getCompanyName($data['user_id']); ?></div>
                </div>
        </div>
        <div class="grid_7">
            <!-- project slider -->
            <div class="theme-dark">
                <div style="text-align:center">
                    <img src="<?php echo RepPhoto.'pic_ads/'.$data['image']; ?>" alt="" />
                </div>
            </div>
            <!-- project slider end -->
        </div>
        <div class="clearfix"></div>
        <!-- recent works -->
        <div class="grid_12">
            <div class="divider_page">
                <h2>Autres publicites</h2>
                <div class="heading_button">
                    <div class="prev_button" id="recentworks_prev">Prev</div>
                    <div class="next_button" id="recentworks_next">Next</div>
                </div>
            </div>
        </div>
        <div id="recentWorks">
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="assets/images/mix/940/businessman_fixed.jpg" alt="Business Man" class="grid_image"/>
                    <div class="work_heading">Business Man</div>
                </div>
                <div class="hover">
                    <h4>Business Man</h4>
                    <div class="work_links">
                        <div><a href="single_project.html" class="misc_white_icons16 icon16_67" title="Project Details"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php //echo getnbrTotalShare($data['aid']); ?></a></div>
                    </div>
                    <!-- social links end -->
                </div>
            </div>
            <!-- a work end -->
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="assets/images/mix/940/luxury_fixed.jpg" alt="Luxury Life" class="grid_image"/>
                    <div class="work_heading">Luxury Life</div>
                </div>
                <div class="hover">
                    <h4>Luxury Life</h4>
                    <div class="work_links">
                        <div><a href="single_project.html" class="misc_white_icons16 icon16_67" title="Project Details"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php //echo getnbrTotalShare($data['aid']); ?></a></div>
                    </div>
                    <!-- social links end -->
                </div>
            </div>
            <!-- a work end -->
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="assets/images/mix/940/morning_fixed.jpg" alt="Good Morning" class="grid_image"/>
                    <div class="work_heading">Good Morning</div>
                </div>
                <div class="hover">
                    <h4>Good Morning</h4>
                    <div class="work_links">
                        <div><a href="single_project.html" class="misc_white_icons16 icon16_67" title="Project Details"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php //echo getnbrTotalShare($data['aid']); ?></a></div>
                    </div>
                    <!-- social links end -->
                </div>
            </div>
            <!-- a work end -->
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="assets/images/mix/940/shopping_fixed.jpg" alt="Shopping" class="grid_image"/>
                    <div class="work_heading">Shopping</div>
                </div>
                <div class="hover">
                    <h4>Shopping</h4>
                    <div class="work_links">
                         <div><a href="single_project.html" class="misc_white_icons16 icon16_67" title="Project Details"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php //echo getnbrTotalShare($data['aid']); ?></a></div>
                        </div>
                    </div>
                    <!-- social links end -->
            </div>
            <!-- a work end -->
            <!-- a work -->
            <div class="a_work">    
                <div class="normal">
                    <img src="assets/images/mix/940/urbanstyle_fixed.jpg" alt="Luxury Life" class="grid_image"/>
                    <div class="work_heading">Urban Style</div>
                </div>
                <div class="hover">
                    <h4>Urban Style</h4>
                    <div class="work_links">
                        <div><a href="single_project.html" class="misc_white_icons16 icon16_67" title="Project Details"></a></div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- social links -->
                    <div class="social_links">
                        <div class="share_text">Total de partage</div>
                        <div class="share_icons">
                            <a href="" target="_blank" class="tooltip_s" title="Total de partage sur Facebook"><?php //echo getnbrTotalShare($data['aid']); ?></a></div>
                        </div>
                    </div>
                    <!-- social links end -->
                </div>
        </div>
        <!-- recent works end -->
    </div>
    <!-- container 12 end -->