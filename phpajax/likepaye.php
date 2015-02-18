<?php
	require '../includes/config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
	
	
	if(isset($_POST['action']))
		{

			if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'likepaye')
	{
		/*
		* vars
		*/
		$iduser = intval($_POST['id_user']);
		$idpf = intval($_POST['id_pf']);
		
		// YOUR MYSQL REQUEST HERE or other thing :)
		/*
		*
		*/
		
		// if request successful
		$success = true;
		// else $success = false;
		
		// json datas send to the js file
		if($success)
		{
			$sql='insert into likes (pf_id,user_id,created) values ("'.$idpf.'","'.$iduser.'","'.date('Y-m-d H:i:s').'")';
			mysql_query($sql);

			$sqad = 'select * from pages_facebook where id = "'.$idpf.'"';
			$reqad = mysql_query($sqad);
			$datad = mysql_fetch_array($reqad);

			if($datad['nbr_like']>0) {

				$sql='update pages_facebook set nbr_like = nbr_like - 1 where id = "'.$idpf.'"';
				mysql_query($sql);

			} else {

				$sql='update pages_facebook set finished = 1, active = 0 where id = "'.$idpf.'"';
				mysql_query($sql);
			}

			$sql ='update paiements set total = total + 0.25 , modified="'.date('Y-m-d H:i:s').'" where user_id = "'.$iduser.'"';
			mysql_query($sql);
			
			$aResponse['message'] = 'Your like has been successfuly recorded. Thanks for your like :)';
					
			echo json_encode($aResponse);
		}
		else
		{
			$aResponse['error'] = true;
			$aResponse['message'] = 'An error occured during the request. Please retry';
	
			echo json_encode($aResponse);
		}
	} 
	else
	{
		$aResponse['error'] = true;
		$aResponse['message'] = '"action" post data not equal to \'rating\'';
		
		// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
			$aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';
		// END ONLY FOR DEMO
			
		
		echo json_encode($aResponse);
	}

		}