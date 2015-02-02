    <?php include 'includes/header.php'; ?>
    <div id="page">
        <section id="main">
            <div class="wrap group">
                <div class="inner-container group">
                    <div class="box-hold group">
                        <article class="entry box format-standard">
                        	<?php 
                        		$sql='select * from ads where aid="'.$_GET['idad'].'"';
                        		$req=mysql_query($sql);
                        		$data=mysql_fetch_array($req);
                        	?>
                            <div class="entry-intro">
                                <h1><?php echo $data['title']; ?></h1><span class="entry-meta">Ajouté par <strong><?php echo getCompanyName($data['user_id']); ?></strong></span>
                            </div><!-- .entry-intro -->

                            <figure class="entry-image"><a href="#" ><img src="<?php echo RepPhoto.'pic_ads/'.$data['image']; ?>" alt=""></a></figure>

                            <div class="entry-content">
                                <p><?php echo $data['description']; ?></p>
							 </div>

                            <div class="social-share">
                            	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo BASE_URL.'ad-'.$_GET['idad']; ?>" target="_blank">
								  	Partager sur Facebook
								</a>
                            </div>
                        </article>
                    </div><!-- .box-hold -->

                    <div class="box-hold">
                        <div class="box post-comments">
                            <div class="box-content">
                                <h3>Autres publicité</h3>
                                <ol id="comment-list" class="group">
                                	<?php
			                            $sql='SELECT * FROM ads WHERE active = 1 and id NOT IN (SELECT ad_id from shares where user_id='.$_SESSION['id_membre'].') order by id';
			                            $req=mysql_query($sql);
			                            while($dataoth=mysql_fetch_array($req)) {
			                        ?>
                                    <li class="comment">
                                        <span class="comment-meta">Ajouté par <strong><?php echo getCompanyName($dataoth['user_id']); ?></strong></span>

                                        <div class="comment-text group">
                                            <img class="avatar" src="<?php echo RepPhoto.'pic_ads/'.$dataoth['image']; ?>" alt="">

                                            <div class="comment-copy">
                                                <p><?php echo $dataoth['description']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ol>
                                <a class="load-more-comments" href="/ads">Voir plus de publicités ...</a>
                            </div>
                        </div>
                    </div><!-- .box-hold -->
                </div><!-- .inner-container -->
            </div><!-- .wrap < #main -->
        </section><!--  #main -->

        <?php include 'includes/footer.php'; ?>