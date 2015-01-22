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
	
	if(isset($_POST['ajouter']))
  {
	$upload=ProposePhoto($_FILES['photo']);
	$sql='insert into delegues (photo,nom,prenom,tel,email,adresse,id_ville) 
			values 
		  ("'.$upload.'","'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['tel'].'","'.$_POST['email'].'","'.$_POST['ville'].'")';
	mysql_query($sql);
	
	$msg='<script>alert("Les données ont été enregistré avec succès")</script>';
  }
?>
<h2>Ajouter un commercial</h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="5" cellpadding="0">
		<tr><td>Photo</td><td><input type="file" name="photo" value="" /></td></tr>
		<tr><td>Nom</td><td><input type="text" name="nom" value="" /></td></tr>
		<tr><td>Prenom</td><td><input type="text" name="prenom" value="" /></td></tr>
		<tr><td>Tél</td><td><input type="text" name="tel" value="" /></td></tr>
		<tr><td>email</td><td><input type="text" name="email" value="" /></td></tr>
		<tr><td>Ville</td><td>
		<select name="ville">
		<option value=""></option>
		<?php
			$sq='select * from villes order by ville asc';
			$rq=mysql_query($sq);
			while($dt=mysql_fetch_array($rq)){
		?>
		<option value="<?php echo $dt['id']; ?>"><?php echo $dt['ville']; ?></option>
		<?php } ?>
		</select></td></tr>
		<tr><td></td><td><input type="submit" name="ajouter" value="Ajouter" /></td></tr>
</table>
</form>
<?php
	if(isset($msg)) {
		echo $msg;
	}
?>
	