<?php

if(isset($_POST['delete']))
{
    $id=GetImageButtonValue($_POST['delete']);
    
    // on supprimer l'enregistrement
    $sql='delete from delegues where id="'.$id.'"';
    mysql_query($sql);
}

$sql='select * from delegues order by id desc';
$req=mysql_query($sql);

?>
<h2>Liste des délégués</h2>
<br/>
<a href="index.php?action=add_delegue"><img src="imgs/Add.gif" />&nbsp;Ajouter un delegue</a>
<br/>
<br/>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0" class="display" id="example">
	<thead>
	<tr>	
		<th>Photo</th>
		<th>Ville</th>
		<th>Nom</th>				<th>Prenom</th>
		<th>Tél</th>
		<th>Email</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
<?php while($data=mysql_fetch_array($req)) { ?>
	<tr>	
		<td><img src="../images/photos/<?php echo $data['photo']; ?>" width="80" height="90"/></td>
		<td>
			<?php 
				$sq='select * from villes where id="'.$data['id_ville'].'"';
				$rq=mysql_query($sq);
				$fg=mysql_fetch_assoc($rq);
				echo $fg['ville']; 
			?>
		</td>
		<td><?php echo $data['nom']; ?></td>
		<td><?php echo $data['prenom']; ?></td>
		<td><?php echo $data['tel']; ?></td>
		<td><?php echo $data['email']; ?></td>
		<td>
		<a href="index.php?action=modif_delegue&id=<?php echo $data['id']; ?>" title="Modifier" style="margin-right:5px;"><img src="imgs/b_edit.gif" border="0" /></a>
     <input style="margin-left:10px;" type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Etes vous sur de le supprimer ?")){this.submit();} else return false;'>
	 </td>
	</tr>
<?php } ?>
</tbody>	
</table>	
</form>