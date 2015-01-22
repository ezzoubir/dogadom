<?php
	
	if(isset($_POST['ajouter']))
  {
	$sql='insert into supervision (id_delegue,id_marchand,commission,duree_contrat,type_paiement,chiffre_affaire) 
			values 
		  ("'.$_POST['id_delegue'].'","'.$_POST['id_marchand'].'","'.$_POST['commission'].'","'.$_POST['duree_contrat'].'","'.$_POST['type_paiement'].'","'.$_POST['chiffre_affaire'].'")';
	mysql_query($sql);
	
	$msg='<script>alert("Les données ont été enregistré avec succès")</script>';
  }
?>
<h2>Ajouter une trace</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0">
		<tr><td>Délégue</td><td>			<select name="id_delegue"><option value=""></option>				<?php					$sq='select * from delegues order by nom asc';					$rq=mysql_query($sq);					while($dt=mysql_fetch_array($rq)){				?>				<option value="<?php echo $dt['id']; ?>"><?php echo $dt['nom']; ?> <?php echo $dt['prenom']; ?></option>				<?php } ?>			</select>		</td></tr>
		<tr><td>Marchand</td><td>			<select name="id_marchand"><option value=""></option>				<?php					$sq='select * from marchands order by marchand asc';					$rq=mysql_query($sq);					while($dt=mysql_fetch_array($rq)){				?>				<option value="<?php echo $dt['id']; ?>"><?php echo $dt['marchand']; ?></option>				<?php } ?>			</select>		</td></tr>
		<tr><td>Commission</td><td><input type="text" name="commission" value="" /></td></tr>
		<tr><td>Durée de contrat</td><td>			<select name="duree_contrat">				<option value=""></option>				<option value="semaine">1 semaine</option>				<option value="1mois">1 mois</option>				<option value="3mois">3 mois</option>				<option value="6mois">6 mois</option>				<option value="9mois">9 mois</option>				<option value="12mois">12 mois</option>			</select>		</td></tr>
		<tr><td>Type de paiement</td><td>			<select name="type_paiement">				<option value=""></option>				<option value="virement">Virement</option>				<option value="cheque">Cheque</option>			</select>		</td></tr>
		<tr><td>Chiffre d'affaires</td><td><input type="text" name="chiffre_affaire" value="" /></td></tr>
		<tr><td></td><td><input type="submit" name="ajouter" value="Ajouter" /></td></tr>
</table>
</form>
<?php
	if(isset($msg)) {
		echo $msg;
	}
?>
	