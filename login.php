<?php
	require 'includes/config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
	
function GetNewPass()
		{
			$NbrChrs=6;
			$list = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			mt_srand((double)microtime()*1000000);
			$pass="";
			while(strlen( $pass )< $NbrChrs ) 
			{
					$pass .= $list[mt_rand(0, strlen($list)-1)];
				}
				return $pass;
		}
		
		
if(isset($_REQUEST["provider"]))  
{  
     
   //On appelle la librairie  
   $config = $_SERVER['DOCUMENT_ROOT']."/hybridauth/config.php";  
   require_once( $_SERVER['DOCUMENT_ROOT']."/hybridauth/Hybrid/Auth.php" );  
   //Initialisation  
   try{$hybridauth = new Hybrid_Auth( $config );  
      //On  affecte le provider  
      $provider = @ trim( strip_tags( $_GET["provider"] ) );  
      // On tente une authentification  
      $adapter = $hybridauth->authenticate( $provider );  
      $adapter = $hybridauth->getAdapter( $provider );  
      //On récupère les informations du profile  
      $user_data = $adapter->getUserProfile();  
      /* les variables sont stockées dans $user_data. */
				
	
	    $sql='select * from '.PREFIXE_BDD.'membres where email="'.$user_data->email.'"';
        $res=mysql_query($sql);
		$ro=mysql_fetch_array($res);
		 // On interroge notre base de données pour voir si l'adresse email($user_data->email) est déjà attachée à un compte*/  
		if(mysql_num_rows($res)==1)//Si le compte existe on authentifie  
		  {  
			 //Création des variables de session 
				$_SESSION['id_membre']=$ro['id_membre'];			 
				$_SESSION['displayname']=$ro['nom'];

				 header('LOCATION:mes-promos.html');
		  }  
		  else  
		  {  
			 /*Sinon on redirige le visiteur vers le formulaire d'inscription en récupérant au préalable les données qui nous intéressent en vue de pré-remplir les champs*/ 
			 // on peut continuer
              $sql='insert into '.PREFIXE_BDD.'membres (nom,adresse,tel,email,password,date_inscription,statut,source)  values("'.$user_data->displayName.'","'.$user_data->address.'","'.$user_data->phone.'","'.$user_data->email.'","'.md5(GetNewPass()).'","'.date('Y-m-d').'","1","'.$_GET['provider'].'")';
              mysql_query($sql);
			
              // envoi email de confirmation
               require 'class/phpmailer.class.inc.php';
                 /*
                 DEFINE('EMAIL_TXT_MOT_DE_PASSE_OUBLIE','Bonjour,<br /><br />Veuillez trouver ci dessous votre nouveau mot de passe : <br /><br />');
DEFINE('MAIL_SIGNATURE','DROITS POUR TOUS');
                 */
                 
                  $message='<div>';
                  $message.='<br /><br />Merci de vous être enregistré sur lespromos.ma. Vous pouvez désormais<br/> vous identifier en cliquant sur ce lien ci-après ou en le copiant dans votre<br/> navigateur :<br /><br /><a href="'.BASE_URL.'">'.BASE_URL.'</a>';
				  $message.='Identifiant : '.$user_data->email;
				  $message.='Mot de passe : '.GetNewPass();
				  $message.='<br/>Ou<br/>par votre compte : '.$_GET['provider'];
				  $message.='Cordialement,<br/>L`\'équipe Groupromo.ma';
                  $message.='</div>';
                  $mail = new PHPmailer();
                  $mail->IsHTML(true);
                  $mail->From=EMAIL_EXP;
                  $mail->FromName=stripslashes(BASE_URL);
                  $mail->Subject=stripslashes('['.INSCRIPTION_MEMBRE_TITRE_OK.']['.BASE_URL.']');
                  $mail->AddReplyTo(EMAIL_ADMIN);
                  $mail->AddAddress($user_data->email);
                  $mail->Body=stripslashes($message);
                  $mail->Send();
              
				  // login
				  $sql='select * from '.PREFIXE_BDD.'membres where email="'.$user_data->email.'"';
				  $res=mysql_query($sql);
				  if(mysql_num_rows($res)==1)
				  {
					  $ro=mysql_fetch_array($res);
					  $_SESSION['id_membre']=$ro['id_membre'];
					  $_SESSION['displayname']=$ro['nom'];
									  
					  // on met à jour derniere conncection
					  $sql='update  '.PREFIXE_BDD.'membres set date_login="'.date('Y-m-d').'" where id_membre="'.$_SESSION['id_membre'].'"';
					  mysql_query($sql);
					  
					  header('LOCATION:mes-promos.html');
				  }  
		  }  
   }  
catch( Exception $e ){    
  
    // In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to   
    // let hybridauth forget all about the user so we can try to authenticate again.  
    // Display the recived error,   
    // to know more please refer to Exceptions handling section on the userguide  
    switch( $e->getCode() ){   
        case 0 : echo "Unspecified error."; break;  
        case 1 : echo "Hybriauth configuration error."; break;  
        case 2 : echo "Provider not properly configured."; break;  
        case 3 : echo "Unknown or disabled provider."; break;  
        case 4 : echo "Missing provider application credentials."; break;  
        case 5 : echo "Authentication failed. "   
                  . "The user has canceled the authentication or the provider refused the connection.";   
        case 6 : echo "User profile request failed. Most likely the user is not connected "  
                  . "to the provider and he should to authenticate again.";   
               $adapter->logout();   
               break;  
        case 7 : echo "User not connected to the provider.";   
               $adapter->logout();   
               break;  
    }   
    echo "  
  
<b>Original error message:</b> " . $e->getMessage();  
    echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";    
}  
} 

?>