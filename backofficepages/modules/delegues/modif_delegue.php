<?php
	// ce module peut servir pour un diaporama, une banière.. etc ...
include '../class/upload.class.inc.php';
function ProposePhoto($UploadingFile)
{
        $charge=false;
        //insertion photo traitement 
        $handle = new upload($UploadingFile);
        if ($handle->uploaded && $handle->file_is_image) 
        {
            $FileName='delegue_'.time();
            $Rep='../'.RepPhoto;
            $Rep2='../'.RepPhoto.'mins';
            $ext='.'.$handle->file_src_name_ext;
            $handle->file_new_name_body  = $FileName;
            if($handle->image_src_x>800)
            {
                 $handle->image_resize         = true;
                 $handle->image_x             =800;
                 $handle->image_ratio_y        = true;
              } 
            $handle->process($Rep);
            $handle->file_new_name_body  = $FileName;
            if($handle->image_src_x>150)
            {
                 $handle->image_resize         = true;
                 $handle->image_x             =150;
                 
                 $handle->image_ratio_y        = true;
            } 

            $handle->process($Rep2);
            $charge=true;
            $handle->clean(); 
            unset($handle);
            $file=$FileName.$ext;
            return $file;
      }
      else return false;
    } 
	
	if(isset($_POST['del_image']))
{
    $id_photo=GetImageButtonValue($_POST['del_image']);  
    $sql='update delegues set photo="" where id="'.$id_photo.'"';
    mysql_query($sql);
}
	
	
	if(isset($_POST['modifier']))
  {
  
	$sql='update delegues set nom="'.$_POST['nom'].'",
		prenom="'.$_POST['prenom'].'",
		tel="'.$_POST['tel'].'",
		email="'.$_POST['email'].'",
		id_ville="'.$_POST['ville'].'" where id="'.$_POST['id'].'"';
		
	mysql_query($sql);
	
	$upload=ProposePhoto($_FILES['photo']);
    if($uplaod !=false)
    {
          $sql='update delegues set photo="'.$uplaod.'" where id="'.$_POST['id'].'"';
          mysql_query($sql);
    
    }
	
	$msg='<script>alert("Les données ont été modifié avec succès")</script>';
  }
  
  $sd='select * from delegues where id="'.$_GET['id'].'"';
  $fg=mysql_query($sd);
  $dr=mysql_fetch_assoc($fg);
?>
<h2>Modifier le commercial : <?php echo $dr['nom'].' '.$dr['prenom']; ?></h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0">
		<tr><td>Photo :</td><td><input type="file" name="photo"  />
		<br/>
		<img src="../images/photos/<?php echo $dr['photo']; ?>" />
		<br /><br />
        <input type="submit" name="del_image[<?php echo $dr['id']; ?>]" value="Supprimer" >
		</td></tr>
		<tr><td>Nom</td><td><input type="text" name="nom" value="<?php echo $dr['nom']; ?>" /></td></tr>
		<tr><td>Prenom</td><td><input type="text" name="entreprise" value="<?php echo $dr['prenom']; ?>" /></td></tr>
		<tr><td>Tél</td><td><input type="text" name="tel" value="<?php echo $dr['tel']; ?>" /></td></tr>
		<tr><td>email</td><td><input type="text" name="email" value="<?php echo $dr['email']; ?>" /></td></tr>
		<tr><td>Ville</td><td><select name="ville">
		<option value=""></option>
		<?php
			$sq='select * from villes order by ville asc';
			$rq=mysql_query($sq);
			while($dt=mysql_fetch_array($rq)){
		?>
		<option value="<?php echo $dt['id']; ?>" <?php if($dr['id_ville']==$dt['id']) { echo 'selected';} ?>><?php echo $dt['ville']; ?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td></td><td><input type="submit" name="modifier" value="Modifier" /></td></tr>
</table>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
</form>
<?php
	if(isset($msg)) {
		echo $msg;
	}
?>
	