	<?php
		/*$sql='SELECT * FROM pages_facebook WHERE active = 1 and nbr_like > 0 and finished=0 and id NOT IN (SELECT pf_id from likes where user_id='.$_SESSION['id_membre'].') order by id limit 0,1';
        $req=mysql_query($sql);
        $data=mysql_fetch_array($req);
			// 178585515507054 = Facebook page ID
		  //$url="https://graph.facebook.com/<?php echo $data['page_id'];?>";*/
		  $url="https://graph.facebook.com/304360739620539";
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($ch,CURLOPT_URL,$url);
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
		  $content = curl_exec($ch);
		  $content = json_decode($content);
		  /*var_dump($content);/*
		  var_dump($content->name);
		  string "Expert Developer" (length=16)*/
	
	
	?>
	<!-- flex slider -->
	<div class="container_12">
		<div class="pagefb">
          	<img src="<?php echo $content->cover->source; ?>" alt="<?php echo $content->name; ?>"/>
          	<!--img src="https://graph.facebook.com/<?php echo $content->name; ?>/picture/?width=160&height=160" alt="<?php echo $content->name; ?>"/-->
        </div>
	</div>
	<!-- flex slider end -->
	<!-- header text -->
	<div class="header_text">
		<div class="container_12">
			<div class="grid_9">
				<h3><?php echo $content->name; ?></h3>
				<p><b><?php echo $content->likes; ?></b> personnes aiment ça • <b><?php echo $content->talking_about_count; ?></b> personnes en parlent</p>
				<p><?php echo $content->about; ?></p>
			</div>
			<div class="grid_3 align_right">
				<a href="http://themeforest.net/user/DesignForLife" target="_blank" class="sc_button large box_button"><span class="social_white_icons16 icon16_2 icon"></span><span class="icon_divider"></span><span class="button_text">J'aime</span></a>
			</div>
		</div>
	</div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- features boxes -->
		<div class="grid_12">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FMisencil&amp;width=600&amp;height=600&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=true&amp;appId=1562922873946573" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:600px;" allowTransparency="true"></iframe></div>
		<!-- features boxes end -->
	</div>
	<!-- container 12 end -->