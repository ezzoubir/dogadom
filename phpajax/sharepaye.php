<?php
	require '../includes/config.php';
	$link =@mysql_connect(SQL_SVR,SQL_LOGIN,SQL_PASS); 
	@mysql_select_db(SQL_DATABASE);
	mysql_query("SET CHARACTER SET 'utf8';", $link)or die(mysql_error());
	mysql_query("SET NAMES 'UTF8' ");
	
	
	if(isset($_POST['action']))
		{

			if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'sharepaye')
	{
		/*
		* vars
		*/
		$iduser = intval($_POST['id_user']);
		$idad = intval($_POST['id_ad']);
		
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
			$sql='insert into shares (ad_id,user_id,created) values ("'.$idad.'","'.$iduser.'","'.date('Y-m-d H:i:s').'")';
			$req=mysql_query($sql);
			
			$aResponse['message'] = 'Your share has been successfuly recorded. Thanks for your share :)';
					
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