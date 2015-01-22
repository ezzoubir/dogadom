<?php
/*
if(isset($_POST['delete']))
{
    $id=GetImageButtonValue($_POST['delete']);
    
    // on supprimer l'enregistrement
    $sql='delete from supervision where id="'.$id.'"';
    mysql_query($sql);
}*/

$sql='select * from supervision order by id desc';
$req=mysql_query($sql);

?>
<h2>Liste des supervisions</h2>
<br/>
<a href="index.php?action=add_supervision"><img src="imgs/Add.gif" />&nbsp;Ajouter une trace</a>
<br/>
<br/>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0" class="display" id="example">
	<thead>
	<tr>	
		<th>Commercial</th>
		<th>Marchand</th>
		<th>Commission</th>				<th>Durée de contrat</th>
		<th>Type de paiement</th>
		<th>Chiffre d'affaires</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
<?php while($data=mysql_fetch_array($req)) { ?>
	<tr>	
		<td>			<?php 				$sq='select * from delegues where id="'.$data['id_delegue'].'"';				$rq=mysql_query($sq);				$fg=mysql_fetch_assoc($rq);				echo $fg['ville']; 			?></td>
		<td>
			<?php 
				$sq='select * from marchands where id="'.$data['id_marchand'].'"';
				$rq=mysql_query($sq);
				$fg=mysql_fetch_assoc($rq);
				echo $fg['ville']; 
			?>
		</td>
		<td><?php echo $data['commission']; ?></td>
		<td><?php echo $data['duree_contrat']; ?></td>
		<td><?php echo $data['type_paiement']; ?></td>
		<td><?php echo $data['chiffre_affaire']; ?></td>
		<td>
		<a href="index.php?action=modif_supervision&id=<?php echo $data['id']; ?>" title="Modifier" style="margin-right:5px;"><img src="imgs/b_edit.gif" border="0" /></a>
     <!--input style="margin-left:10px;" type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Etes vous sur de le supprimer ?")){this.submit();} else return false;'-->
	 </td>
	</tr>
<?php } ?>
</tbody>	
</table>	
</form>