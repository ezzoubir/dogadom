<!-- header text -->
    <?php
        if(isset($_SESSION['id_membre']) && isset($_SESSION['userur'])) { 
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
                //if (response && response.post_id) {
                if (response && !response.error_code) {
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
    </div>
    <!-- container 12 end -->
    <?php } else { header('LOCATION:404'); } ?>