<?php
  session_start();
  require 'includes/config.php';
  //if(ob_start)
    //ob_start("ob_gzhandler");   
  if(!isset($_GET['language']))
  {
    header('LOCATION:'.BASE_URL);
  }
  
  $link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
  @mysql_select_db(SQL_DATABASE);
  mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
  mysql_query("SET NAMES 'UTF8' ");
  
  
  // on recupere toutes les langues repertorié dans la base !
  $sql='select * from '.PREFIXE_BDD.'languages order by id_language';
  $res=mysql_query($sql);
  $find_language=false;
  while($row=mysql_fetch_array($res))
  {
      if($_GET['language']==$row['symbol'])
      {
          $language=$row['symbol'];
          include 'includes/languages/'.$row['symbol'].'.php';    
          $find_language=true;
      }
  }
  if(!$find_language)
  {
      $language='fr';
      include 'includes/languages/fr.php';
  }

  $_SESSION['language']=$language; // -> information pour les popups 
  
  if(!isset($_GET['page']))
  {
  if($language!='ar')
  {
  // on determine page d'accueil
  $sql='select * from '.PREFIXE_BDD.'pages where language="'.$language.'" and parent_id="0" order by ordre_affichage,id_page ASC limit 1';
  }
  else
  {
  $sql='select * from '.PREFIXE_BDD.'pages where language="'.$language.'" and parent_id="0" order by ordre_affichage DESC,id_page DESC limit 1';
  }
  
  $res_home=mysql_query($sql);
  $row_page=mysql_fetch_array($res_home);
  
  if(DETECT_AUTO_ACCUEIL)
  {
  //echo 'index.php?language='.$language.'&page='.$row_page['id_page'];
  header('LOCATION:'.BASE_URL.'intro.html');

  }
  }
  
  // on recupere les infos contact
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="Email_exp"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('EMAIL_EXP',$row['config_value']);
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="Email_admin1"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('EMAIL_ADMIN',$row['config_value']);
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="Email_admin2"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('EMAIL_ADMIN2',$row['config_value']);
  
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="Email_paiement_en_ligne"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('MAIL_PAYPAL',$row['config_value']);

  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="lien_webmail"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('WEBMAIL_URL',$row['config_value']);
  
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="lien_facebook"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('LIEN_FACEBOOK',$row['config_value']);
 
   $sql='select config_value from '.PREFIXE_BDD.'config where config_name="lien_twitter"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('LIEN_TWITTER',$row['config_value']);
  
     $sql='select config_value from '.PREFIXE_BDD.'config where config_name="lien_boutique"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('LIEN_BOUTIQUE',$row['config_value']);
  
  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="txt_pied_page"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  DEFINE ('TXT_PIED_PAGE',$row['config_value']);

  $sql='select config_value from '.PREFIXE_BDD.'config where config_name="config_simple_image"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  if($row['config_value']!='')
  DEFINE ('CONFIG_SIMPLE_IMAGE',RepPhoto.$row['config_value']);
  else DEFINE ('CONFIG_SIMPLE_IMAGE','');
  
    $sql='select config_value from '.PREFIXE_BDD.'config where config_name="config_simple_fichier"';
  $res=mysql_query($sql);
  $row=mysql_fetch_assoc($res);
  if($row['config_value']!='')
  DEFINE ('CONFIG_SIMPLE_FICHIER',RepPhoto.$row['config_value']);
  else DEFINE ('CONFIG_SIMPLE_FICHIER','');
  
  function strip_tags_only($str, $tags) { //balises interditent
    if(!is_array($tags)) {
        $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
        if(end($tags) == '') array_pop($tags);
    }
    foreach($tags as $tag) $str = preg_replace('#</?'.$tag.'[^>]*>#is', '', $str);
    return $str;
}
  
   
    /*  FONCTIONS GLOBALES */
  function getPageTitre($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
  
        return stripslashes($row['titre']);
  }


  
  function getPageText($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
        //images n'a pas le bon repertoire
        
        $row['texte']=str_replace('../images/pages/','images/pages/',$row['texte']);
        return stripslashes($row['texte']);

  }
  
  define('PAGE_PER_NO',1); // number of results per page.
	function getPagination($count)
	{
		$paginationCount= floor($count / PAGE_PER_NO);
		$paginationModCount= $count % PAGE_PER_NO;
		if(!empty($paginationModCount))
		{
			$paginationCount++;
		}
		return $paginationCount;
	}
  
  

function truncate($string, $max_length = 80, $replacement = '', $trunc_at_space = false)
{
	$max_length -= strlen($replacement);
	$string_length = strlen($string);
	
	if($string_length <= $max_length)
		return $string;
	
	if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
		$max_length = $space_position;
	
	return substr_replace($string, $replacement, $max_length);
}



 function getPageSuppTitre($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages_supplementaires where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
  
        return stripslashes($row['titre']);
  }
  
  function getPageSuppText($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages_supplementaires where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
        //images n'a pas le bon repertoire
        
        $row['texte']=str_replace('../images/pages/','images/pages/',$row['texte']);
        return stripslashes($row['texte']);

  } 


  function getTotalGain($user)
  {
      $sql='select * from shares where finished = "1" and payed = "0" and user_id = "'.$user.'"';
      $req=mysql_query($sql);
      $num=mysql_num_rows($req);
      
      return $num * 0.25;
  }

  function checkribUser($user)
  {
      $sql='select * from users where user_id = "'.$user.'"';
      $req=mysql_query($sql);
      $data=@mysql_fetch_array($req);
      
      if($data['rib']==0) {
          echo '<img src="assets/images/icons/alert.gif" />';
      } 
  }


  function getnbrTotalShare($aid)
  {
      $sql='select * from paiements where user_id = "'.$_SESSION['userur'].'"';
      $req=mysql_query($sql);
      $data=mysql_fetch_array($req);
      
      return $data['total'];
  }
  
  function getDetailPageFb($id_fb,$contenu) {
		$url="https://graph.facebook.com/".$id_fb;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
		$content = curl_exec($ch);
		$content = json_decode($content);
		
		return $content->$contenu;
  }

  function getCompanyName($id){
  $sql=mysql_query('select * from users where id="'.$id.'"');
  $data=mysql_fetch_array($sql);
  
  return $data['company'];
}


  function getTotalUserBasic(){
      $sql=mysql_query('select count(*) as total from users where type = "basic"');
      $data=mysql_fetch_array($sql);
      return $data['total'];
  }

  function getTotalUserPremium(){
      $sql=mysql_query('select count(*) as total from users where type = "Premium"');
      $data=mysql_fetch_array($sql);
      return $data['total'];
  }

  function getPageStaticTitre($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages_statiques  where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
  
  
        return stripslashes($row['titre']);
  }
  
  function getPageStaticText($id)
  {
        $sql='select * from  '.PREFIXE_BDD.'pages_statiques  where id_page="'.(int)$id.'"';
        $res=mysql_query($sql);
        $row=mysql_fetch_array($res);
        //images n'a pas le bon repertoire
        
        $row['texte']=str_replace('../images/pages/','images/pages/',$row['texte']);
        return stripslashes($row['texte']);

  }  
  
  function TestEmail($email)
  {
      $struct='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
      if(preg_match($struct,$email))
          return true;
      else 
          return false;
  }
  
  function ConvertDateToFr($DateUS)
  {
     $array=explode("-",$DateUS);
     $NewDate=$array[2].'/'.$array[1].'/'.$array[0];
      return $NewDate;
  }
  
 
  
  
  /*  /FONCTIONS GLOBALES */
  
  /* MODULES */
  /**********************************************************/
 
  
 
  
  if(isset($_POST['envoyer_contact']))
  {
    
      // formulaire de contact traitement
        include 'class/phpmailer.class.inc.php';

        $message='<div>';
        $message.=$_POST['nom_contact'].'<br /><br />
                 '.FORM_SUJET. ' : '.$_POST['sujet_contact'].'<br />
                 '.FORM_EMAIL. ' : '.$_POST['email_contact'].'<br />
                 '.FORM_MESSAGE. ' : '.$_POST['message_contact'].'<br />';
        $message.='</div>';
        $mail = new PHPmailer();
        $mail->IsHTML(true);
        $mail->From=EMAIL_EXP;
        $mail->FromName=stripslashes($_POST['nom_contact']);
        $mail->Subject=stripslashes('[Message de :]['.$_POST['nom_contact'].']');   
        $mail->AddReplyTo($_POST['email_contact']);//$EmailExp
        $mail->AddAddress(EMAIL_ADMIN);
        if(EMAIL_ADMIN2!='')
          $mail->AddAddress(EMAIL_ADMIN2);
        $mail->Body=stripslashes($message);
        $mail->Send();

        $msg='<script>alert("Message a été envoyé avec succès");</script>';
      
     
  }  

  if(isset($_GET['logout'])) {
    unset($_SESSION['id_membre']);
    unset($_SESSION['displayname']);
    unset($_SESSION['userur']);
    unset($_SESSION['likemypage']);
    header('LOCATION:'.BASE_URL);
	
 }

?>