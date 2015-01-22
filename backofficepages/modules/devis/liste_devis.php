<?php

if(isset($_POST['save']))
  {
      // id_membre =
      $id=GetImageButtonValue($_POST['save']);
      if(isset($_POST['statut'][$id]))
      {
          $sql='update  devis set statut="1" where id="'.$id.'"';
          mysql_query($sql);
      }
      else
      {
      
        $sql='update  devis set statut="0" where id="'.$id.'"';
        mysql_query($sql);
      }
	  
}

if(isset($_POST['delete']))
{
    $id=GetImageButtonValue($_POST['delete']);
    
    // on supprimer l'enregistrement
    $sql='delete from devis where id="'.$id.'"';
    mysql_query($sql);
}

$sql='select * from devis order by id desc';
$req=mysql_query($sql);

?>
<h2>Liste des devis</h2>
<br/>
<br/>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0" class="display" id="example">
	<thead>
	<tr>	
		<th>Nom</th>
		<th>Tél</th>
		<th>Email</th>		<th>Sujet</th>		<th>Message</th>		<th>Visite</th>
		<th>statut</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
<?php while($data=mysql_fetch_array($req)) { ?>
	<tr>
		<td><a href=""><?php echo $data['nom']; ?></a></td>		<td><a href=""><?php echo $data['email']; ?></a></td>		<td><a href=""><?php echo $data['tel']; ?></a></td>		<td><a href=""><?php echo $data['sujet']; ?></a></td>		<td><a href=""><?php echo $data['message']; ?></a></td>		<td><a href=""><?php  if($data['statut']==1) echo '<img src="../images/yes.jpg">'; else echo '<img src="../images/no.jpg">'; ?></a></td>
   <td><input type="checkbox" name="statut[<?php echo $data['id']; ?>]" <?php if($data['statut']==1) echo ' checked '; ?>></td>
		<td><input type="image" name="save[<?php echo $data['id']; ?>]" src="imgs/floppy_disk16.gif">
     <input style="margin-left:10px;" type="image" name="delete[<?php echo $data['id']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Supprimer cette coupon ?")){this.submit();} else return false;'>
	 </td>
	</tr>
<?php } ?>
</tbody>	
</table>	
</form>