<?php	
	
	if(isset($_POST['modifier']))
  {
  
	$sql='update supervision set id_delegue="'.$_POST['id_delegue'].'",
		id_marchand="'.$_POST['id_marchand'].'",
		commission="'.$_POST['commission'].'",
		duree_contrat="'.$_POST['duree_contrat'].'",				chiffre_affaire="'.$_POST['chiffre_affaire'].'",
		type_paiement="'.$_POST['type_paiement'].'" where id="'.$_POST['id'].'"';
		
	mysql_query($sql);
	
	$msg='<script>alert("Les données ont été modifié avec succès")</script>';
  }
  
  $sd='select * from supervision where id="'.$_GET['id'].'"';
  $fg=mysql_query($sd);
  $dr=mysql_fetch_assoc($fg);
?>
<h2>Modifier le commercial : <?php echo $dr['nom'].' '.$dr['prenom']; ?></h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0">
		<tr><td>Délégue</td><td>			<select name="id_delegue"><option value=""></option>				<?php					$sq='select * from delegues order by nom asc';					$rq=mysql_query($sq);					while($dt=mysql_fetch_array($rq)){				?>				<option value="<?php echo $dt['id']; ?>" <?php if($dr['id_delegue']==$dt['id']) { echo 'selected';} ?>><?php echo $dt['nom']; ?> <?php echo $dt['prenom']; ?></option>				<?php } ?>			</select>		</td></tr>		<tr><td>Marchand</td><td>			<select name="id_marchand"><option value=""></option>				<?php					$sq='select * from marchands order by marchand asc';					$rq=mysql_query($sq);					while($dt=mysql_fetch_array($rq)){				?>				<option value="<?php echo $dt['id']; ?>" <?php if($dr['id_marchand']==$dt['id']) { echo 'selected';} ?>><?php echo $dt['marchand']; ?></option>				<?php } ?>			</select>		</td></tr>		<tr><td>Commission</td><td><input type="text" name="commission" value="<?php echo $dr['commission']; ?>" /></td></tr>		<tr><td>Durée de contrat</td><td>			<select name="duree_contrat">				<option value=""></option>				<option value="semaine" <?php if($dr['duree_contrat']=='semaine') { echo 'selected';} ?>>1 semaine</option>				<option value="1mois" <?php if($dr['duree_contrat']=='1mois') { echo 'selected';} ?>>1 mois</option>				<option value="3mois" <?php if($dr['duree_contrat']=='3mois') { echo 'selected';} ?>>3 mois</option>				<option value="6mois" <?php if($dr['duree_contrat']=='6mois') { echo 'selected';} ?>>6 mois</option>				<option value="9mois" <?php if($dr['duree_contrat']=='9mois') { echo 'selected';} ?>>9 mois</option>				<option value="12mois" <?php if($dr['duree_contrat']=='12mois') { echo 'selected';} ?>>12 mois</option>			</select>		</td></tr>		<tr><td>Type de paiement</td><td>			<select name="type_paiement">				<option value=""></option>				<option value="virement" <?php if($dr['duree_contrat']=='virement') { echo 'selected';} ?>>Virement</option>				<option value="cheque" <?php if($dr['duree_contrat']=='cheque') { echo 'selected';} ?>>Cheque</option>			</select>		</td></tr>		<tr><td>Chiffre d'affaires</td><td><input type="text" name="chiffre_affaire" value="<?php echo $dr['chiffre_affaire']; ?>" /></td></tr>		
		<tr><td></td><td><input type="submit" name="modifier" value="Modifier" /></td></tr>
</table>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
</form>
<?php
	if(isset($msg)) {
		echo $msg;
	}
?>
	