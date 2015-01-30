    <?php include 'includes/header.php'; ?>
    <div id="page">
        <section id="main">
            <div class="wrap group">
                <div id="box-container">
                    <div id="entry-listing" class="group">
                        <?php
                            $sql='SELECT * FROM ads WHERE id NOT IN (SELECT ad_id from shares where userd_id='.$_SESSION['id_membre'].') order by id';
                            $req=mysql_query($sql);
                            while($data=mysql_fetch_array($req)) {
                        ?>
                        <article id="post-215" class="post-215 category-people category-photography category-pretty-girls entry box format-image">
                            <div class="entry-content-cnt">
                                <div class="entry-content">
                                    <a href="images/dummy/Fotolia_34084826_Subscription_XL-680x1024.jpg" class="thumb" data-lightbox="fancybox[215]" title=""><img src="images/dummy/Fotolia_34084826_Subscription_XL-500x752.jpg" class="attachment-ci_listing_thumb" alt="High fashion model in autumn/winter clothes wearing sunglasses" title="High fashion model in autumn/winter clothes wearing sunglasses"></a>
                                </div>
                            </div>

                            <div class="entry-desc">
                                <h1><a href="#" title="Permalink to High fashion model in autumn/winter clothes wearing sunglasses.">High fashion model in autumn/winter clothes wearing sunglasses.</a></h1>

                                <div class="entry-meta group">
                                    <a class="comments-no" href="#">4</a> <a data-post-id="215" class="heart-this loved" href="#" title="You love this."><span class="heart-no">7</span></a> <a class="entry-permalink" href="#" title="Permalink to High fashion model in autumn/winter clothes wearing sunglasses.">High fashion model in autumn/winter clothes wearing sunglasses.</a>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div><!-- #entry-listing -->

                </div>
            </div><!-- .wrap < #main -->
        </section><!--  #main -->

        <?php include 'includes/footer.php'; ?>