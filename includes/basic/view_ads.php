    <?php include 'includes/header.php'; ?>
    <div id="page">
        <section id="main">
            <div class="wrap group">
                <div id="box-container">
                    <div id="entry-listing" class="group">
                        <?php
                            $sql='SELECT * FROM ads WHERE active = 1 and id NOT IN (SELECT ad_id from shares where user_id='.$_SESSION['id_membre'].') order by id';
                            $req=mysql_query($sql);
                            while($data=mysql_fetch_array($req)) {
                        ?>
                        <article id="post-215" class="post-215 category-people category-photography category-pretty-girls entry box format-image">
                            <div class="entry-content-cnt">
                                <div class="entry-content">
                                    <a href="<?php echo 'ad-'.$data['aid']; ?>" class="thumb" title="">
                                    <img src="<?php echo RepPhoto.'pic_ads/'.$data['image']; ?>" class="attachment-ci_listing_thumb" alt="<?php echo $data['title']; ?>" title="<?php echo $data['description']; ?>"></a>
                                </div>
                            </div>

                            <div class="entry-desc">
                                <h1><a href="#" title="Permalink to High fashion model in autumn/winter clothes wearing sunglasses."><?php echo $data['description']; ?></a></h1>

                                <div class="entry-meta group">
                                    <a class="comments-no" href="#"><?php echo getnbrTotalShare($data['aid']); ?></a> <a class="entry-permalink" href="<?php echo 'ad-'.$data['aid']; ?>" title="<?php echo $data['description']; ?>"><?php echo $data['description']; ?></a>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div><!-- #entry-listing -->

                </div>
            </div><!-- .wrap < #main -->
        </section><!--  #main -->

        <?php include 'includes/footer.php'; ?>