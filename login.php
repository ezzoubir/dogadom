<?php
	require 'includes/config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
	
function GetNewPass()
		{
			$NbrChrs=8;
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

      if(isset($_GET["ur"])) {
      	$referrer = @ trim( strip_tags( $_GET["ur"] ) );
  	  }
	  
      /* les variables sont stockées dans $user_data. */
				
	
	    $sql='select * from users where email="'.$user_data->email.'" and uid_facebook="'.$user_data->identifier.'"';
        $res=mysql_query($sql);
		$ro=mysql_fetch_array($res);
		 // On interroge notre base de données pour voir si l'adresse email($user_data->email) est déjà attachée à un compte*/  
		if(mysql_num_rows($res)==1)//Si le compte existe on authentifie  
		  {  
			 //Création des variables de session 
				$_SESSION['id_membre']=$ro['id'];			 
				$_SESSION['displayname']=$ro['name'];
				$_SESSION['userur']=$ro['uid_facebook'];
				$_SESSION['likemypage']=$ro['likemypage'];

				header('LOCATION:annonces');
		  }  
		  else  
		  {  
			 /*Sinon on redirige le visiteur vers le formulaire d'inscription en récupérant au préalable les données qui nous intéressent en vue de pré-remplir les champs*/ 
			 // on peut continuer
			 $birthdate = $user_data->birthYear.'-'.$user_data->birthMonth.'-'.$user_data->birthDay;
			 $password = GetNewPass();

			 if(isset($_GET["ur"])) {
		      	 $sql='insert into users (uid_facebook,parent_id,profile_facebook_url,first_name,last_name,sex,pic_big,name,birthday,city,country,email,phone,password,type,created,active)  values("'.$user_data->identifier.'","'.$referrer.'","'.$user_data->profileURL.'","'.$user_data->firstName.'","'.$user_data->lastName.'","'.$user_data->gender.'","'.$user_data->photoURL.'","'.$user_data->displayName.'","'.$birthdate.'","'.$user_data->city.'","'.$user_data->country.'","'.$user_data->email.'","'.$user_data->phone.'","'.$password.'","basic",'.date('Y-m-d').'","1")';
              	 mysql_query($sql);

              	 $sql='update paiements set total = total + 1, modified="'.date('Y-m-d H:i:s').'" where facebook_id = '.$referrer.'';
              	 mysql_query($sql);

              	 $sql ='insert into paiements (user_id,created) values ("'.$user_data->identifier.'","'.date('Y-m-d H:i:s').'")';
				 mysql_query($sql);

		  	  } else {
	              $sql='insert into users (uid_facebook,profile_facebook_url,first_name,last_name,sex,pic_big,name,birthday,city,country,email,phone,password,type,created,active)  values("'.$user_data->identifier.'","'.$user_data->profileURL.'","'.$user_data->firstName.'","'.$user_data->lastName.'","'.$user_data->gender.'","'.$user_data->photoURL.'","'.$user_data->displayName.'","'.$birthdate.'","'.$user_data->city.'","'.$user_data->country.'","'.$user_data->email.'","'.$user_data->phone.'","'.$password.'","basic",'.date('Y-m-d').'","1")';
	              mysql_query($sql);

              	$sql ='insert into paiements (user_id,created) values ("'.$user_data->identifier.'","'.date('Y-m-d H:i:s').'")';
				 mysql_query($sql);
          	}
			
              // envoi email de confirmation
               require 'class/phpmailer.class.inc.php';
                 /*
                 DEFINE('EMAIL_TXT_MOT_DE_PASSE_OUBLIE','Bonjour,<br /><br />Veuillez trouver ci dessous votre nouveau mot de passe : <br /><br />');
DEFINE('MAIL_SIGNATURE','DROITS POUR TOUS');
                 */
                 
                  $message='<div>';
                  $message.='<br /><br />Merci de vous être enregistré sur '.NAME_SITE.'. Vous pouvez désormais<br/> vous identifier ';
				  $message.='par votre compte : Facebook';
				  $message.='Cordialement,<br/>L\'équipe '.NAME_SITE;
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
				  $sql='select * from users where email="'.$user_data->email.'"';
				  $res=mysql_query($sql);
				  if(mysql_num_rows($res)==1)
				  {
					  $ro=mysql_fetch_array($res);
					    $_SESSION['id_membre']=$ro['id'];			 
						$_SESSION['displayname']=$ro['name'];
						$_SESSION['userur']=$ro['uid_facebook'];
						$_SESSION['likemypage']=$ro['likemypage'];

				      // on met à jour derniere conncection
					  $sql='update users set date_login="'.date('Y-m-d').'" where id="'.$_SESSION['id_membre'].'"';
					  mysql_query($sql);
					  
					  header('LOCATION:annonces');
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