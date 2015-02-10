	<!-- header text -->
    <div class="header_text">
        <div class="container_12">
            <div class="grid_12">
                <h1>Mes informations</h1>
            </div>
        </div>
    </div>
    <!-- header text end -->
	<?php
	$sql=mysql_query('select * from users where id="'.$_SESSION['id_membre'].'"');
	$data=mysql_fetch_array($sql);
?>
	<!-- container 12 -->
	<div class="container_12">
		<!-- container with sidebar -->
		<div class="content grid_12">
			<div class="divider_page"><h4>Veuillez remplir tous les champs pour recevoir votre paiement</h4></div>
			<div class="contact_form">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" name="messageform">
					<div class="grid_12 alpha">
						<input class="input-text" name="first_name" placeholder="Prenom" value="<?php echo $data['first_name']; ?>">
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="last_name" placeholder="Nom" value="<?php echo $data['last_name']; ?>">
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="cin" placeholder="CIN" value="<?php echo $data['cin']; ?>">
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="address" placeholder="Adresse" value="<?php echo $data['address']; ?>">
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="email" placeholder="Email" value="<?php echo $data['email']; ?>">
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="birthday" placeholder="Date de naissance" value="<?php echo $data['birthday']; ?>">
					</div>
					<div class="grid_12 alpha">
						<select name="sex" class="select-text">
							<option value="male" <?php if($data['sex']=='male') echo 'selected'; ?>>Male</option>
							<option value="female" <?php if($data['sex']=='female') echo 'selected'; ?>>Female</option>
						</select>
					</div>
					<div class="grid_12 alpha">
						<select name="city" class="select-text">
							<option value="">Ville</option>
							<?php
								$sql=mysql_query('select * from villes');
								while($vl=mysql_fetch_array($sql)) {
							?>
							<option value="<?php echo $vl['ville']; ?>" <?php if($data['city']==$vl['ville']) echo 'selected'; ?>><?php echo $vl['ville']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="country" placeholder="Pays" value="<?php echo $data['country']; ?>">
					</div>
					<div class="grid_12 alpha">
						<select name="banque" class="select-text">
							<option value="" >Banque</option>
							<option value="bp" >Banque populaire</option>
							<option value="bmci" >BMCI</option>
							<option value="bmce" >BMCE</option>
							<option value="ca" >CA</option>
							<option value="sgmb" >SGMB</option>
							<option value="wafa" >WAFA</option>
							<option value="cih" >CIH</option>
						</select>
					</div>
					<div class="grid_12 alpha">
						<input class="input-text" name="rib" placeholder="RIB" value="<?php echo $data['rib']; ?>">
						<div class="alert-contact"></div>
						<span class="send-message sc_button medium" name="updateuser" type="submit">Modifier</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- container 12 end -->