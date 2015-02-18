<!-- header text -->
	<div class="header_text">
		<div class="container_12">
			<div class="grid_12">
				<h1>Contact</h1>
			</div>
		</div>
	</div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- container with sidebar -->
		<div class="content right grid_9">
			<div class="divider_page"><h4>Restez en contact avec nous !</h4></div>
			<div class="contact_form">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" name="messageform">
					<div class="grid_3 alpha">
						<input name="nom_contact" type="text" value="Nom:" class="input-text" />
					</div>
					<div class="grid_3 lambda">
						<input name="email_contact" type="text" value="E-Mail:" class="input-text" />
					</div>
					<div class="grid_3 omega">
						<input name="sujet_contact" type="text" value="Sujet:" class="input-text" />
					</div>
					<div class="grid_9 alpha omega">
						<textarea name="message_contact" class="text-area">Message:</textarea>
						<div class="alert-contact"></div>
						<span class="send-message sc_button medium" type="submit" name="envoyer_contact">Envoyer</span>
					</div>
				</form>
			</div>
		</div>
		<!-- container with sidebar end -->
		<!-- sidebar left -->
		<div class="sidebar left grid_3">
			<div class="divider_page"><h4>Contact Info</h4></div>
			<p><b>Adresse:</b><br>Sokullu Mehmet Pasa Street 1234, Country<br><b>Mobile:</b><br>06 71 70 83 12<br><b>Gsm:</b><br>06 71 70 83 12</p>
			<div class="divider_page"><h4>Get Social</h4></div>
			<p>
				<a href="#" class="social_icons16 icon16_11 tooltip_s" title="Google Plus"></a>
				<a href="#" class="social_icons16 icon16_28 tooltip_s" title="Twitter"></a>
				<a href="#" class="social_icons16 icon16_21 tooltip_s" title="LinkedIn"></a>
				<a href="#" class="social_icons16 icon16_22 tooltip_s" title="Facebook"></a>
				<a href="#" class="social_icons16 icon16_2 tooltip_s" title="Facebook"></a>
				<a href="#" class="social_icons16 icon16_3 tooltip_s" title="Twitter"></a>
				<a href="#" class="social_icons16 icon16_17 tooltip_s" title="Skype"></a>
			</p>
		</div>
	</div>
	<!-- container 12 end -->