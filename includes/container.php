<?php
	switch ($_GET['page']) {
		case '1':
			include 'hp_interface.php';
			break;
		case '2':
			include 'basic/view_ads.php';
			break;
		case '3':
			include 'basic/detail_ad.php';
			break;
		case '4':
			include 'contact.php';
			break;
		case '6':
			include 'basic/profil.php';
			break;
		default:
			include 'hp_interface.php';
			break;
	}
?>