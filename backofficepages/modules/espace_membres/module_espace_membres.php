<?php
  if(isset($_POST['save']))
  {
      // id_membre =
      $id_membre=GetImageButtonValue($_POST['save']);
      if(isset($_POST['statut'][$id_membre]))
      {
          $sql='update  '.PREFIXE_BDD.'membres set statut="1" where id_membre="'.$id_membre.'"';
          mysql_query($sql);
      }
      else
      {
      
        $sql='update  '.PREFIXE_BDD.'membres set statut="0" where id_membre="'.$id_membre.'"';
        mysql_query($sql);
      }
      
      if(isset($_POST['privilege'][$id_membre]))
      {
          $sql='update  '.PREFIXE_BDD.'membres set privilege="1" where id_membre="'.$id_membre.'"';
          mysql_query($sql);
      }
      else
      {
      
        $sql='update  '.PREFIXE_BDD.'membres set privilege="0" where id_membre="'.$id_membre.'"';
        mysql_query($sql);
      }
      
  }
  if(isset($_POST['delete_membre']))
  {
     // on recupere info membre pour suppresion de ses dossiers et articles
     //@unlink('../images/page/images/membres/')
     
     $id_membre=GetImageButtonValue($_POST['delete_membre']);  
     $dossier='../images/pages/images/membres/'.$id_membre.'/';
     //@deltree($dossier);
     unset($dossier);
     $dossier='../images/pages/files/membres/'.$id_membre.'/';
    // @deltree($dossier);
     unset($dossier);
     $dossier='../images/pages/media/membres/'.$id_membre.'/';
    // @deltree($dossier);
     unset($dossier);
     
     // on supprime sa page associé
     $sql='delete from '.PREFIXE_BDD.'membres_page where id_membre="'.$id_membre.'"';
     mysql_query($sql);
      
     // suppression des ses articles
     //$sql='delete from '.PREFIXE_BDD.'articles where id_utilisateur="'.$id_membre.'" ';
     $sql='update '.PREFIXE_BDD.'articles set id_page="0" where id_utilisateur="'.$id_membre.'" ';
     mysql_query($sql);
      
     $sql='delete from '.PREFIXE_BDD.'membres where id_membre="'.$id_membre.'"';
     mysql_query($sql);
  }

?>
<h1>Gestion espace membres</h1>

<div style="clear:left;"></div>

<?php
  $sql='select * from '.PREFIXE_BDD.'membres';
  $res=mysql_query($sql);
  $TotalEnregistrements=mysql_num_rows($res);
?>
<h2>Liste des membres (<?php echo $TotalEnregistrements; ?>)</h2>
<?php
  define('NBR_MEMBRE_PAR_PAGE',50);
  
  

  $PageNum=1; 
  $NbrPages=ceil($TotalEnregistrements/NBR_MEMBRE_PAR_PAGE);
  if(isset($_GET['num_page']))
    {
      $PageNum=intval($_GET['num_page']);
    }
    
      $Prev=$PageNum;
        if($PageNum>1)
          $Prev=$PageNum-1;
        
        if($PageNum<$NbrPages) 
          $Next=$PageNum+1;
        else $Next=$NbrPages;
        
        $PagesInit=array(0=>1,1=>$Prev,2=>$Next);
        
        $PageEnd=$NbrPages;
    
            if($PageNum>1) // limit pour sql
         $limit0=$PageNum*NBR_MEMBRE_PAR_PAGE-NBR_MEMBRE_PAR_PAGE;
        else $limit0=0;
  
    // on recupere les articles de la pages
  $sql='select * from '.PREFIXE_BDD.'membres limit '.$limit0.','.NBR_MEMBRE_PAR_PAGE ;
  $res=mysql_query($sql);
  $total=mysql_num_rows($res);

?>
<form name="form1" id='form1' action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
  <th>Id</th>
  <th>Date d'inscription</th>
  <th>Date login</th>
  <th>Nom</th>
  <th>Email</th>
  <th>Societé</th>
  <th>Adresse</th>
  <th>Tél</th>
  <th>Statut</th>
  <th>Fonction</th>
  </tr>
<?php
  while ($row=mysql_fetch_assoc($res))
	{
	
	 ?>
	 <tr>
	 <td><?php echo $row['id_membre']; ?></td>
	 <td><?php echo convertDateToFr($row['date_inscription']); ?></td>
	 <td><?php if($row['date_login']!='0000-00-00') echo convertDateToFr($row['date_login']); else echo '-'; ?></td>
	 <td><?php echo stripslashes($row['nom']); ?></td>
	 <td><?php echo $row['email']; ?></td>
	 <td><?php echo $row['societe']; ?></td>
	 <td><?php echo $row['adresse']; ?></td>
	 <td><?php echo $row['tel']; ?></td>
   <td><input type="checkbox" name="statut[<?php echo $row['id_membre']; ?>]" <?php if($row['statut']==1) echo ' checked '; ?>></td>
   <td><input type="image" name="save[<?php echo $row['id_membre']; ?>]" src="imgs/floppy_disk16.gif">
   <a href="index.php?action=espace_membre_modifier&id_membre=<?php echo $row['id_membre']; ?>" title="Page réservée" style="margin-right:5px;"><img src="imgs/b_edit.gif" border="0" /></a>
   <input style="margin-left:10px;" type="image" name="delete_membre[<?php echo $row['id_membre']; ?>]" src="imgs/b_drop.gif" onclick='javascript: if(confirm("Supprimer le compte de <?php echo stripslashes($row['prenom'].' - '.$row['nom'].' ('.$row['email'].') '); ?>  ?")){this.submit();} else return false;'>
   </td>
	 </tr>
	 <?php
	}
?>
  
  </table>
</form>