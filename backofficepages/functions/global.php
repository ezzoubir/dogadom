<?php
function GetImageButtonValue($Button)
{
  $cles = array_keys($Button);
  return $cles[0]; 
}
function ConvertDateToFr($DateUS)
{
   $array=explode("-",$DateUS);
   $NewDate=$array[2].'/'.$array[1].'/'.$array[0];
    return $NewDate;
}

function do_update($table,$fields,$id){
	$i = 0;
	$len = count($fields);
	$sql='update '.$table.' set ';
	foreach($fields as $key=>$val) {
		if($i == $len - 1) {
			$sql .=' '.$key.' = '.$val.'';
		} else {
			$sql .=' '.$key.' = '.$val.' ,';
		}
	$i++;
	}
	$sql .=' where id = "'.$id.'"';
	
	if(mysql_query($sql)) {
		echo true;
	} else {
		echo false;
	}
}

function do_insert($table,$fields){
	$i = 0;
	$len = count($fields);
	$sql='insert into '.$table.'';
	echo '(';
	foreach($fields as $key=>$val){
		if($i == $len - 1) {
			echo $key;
		} else {
			echo $key.',';
		}
	}
	echo ')';
	echo 'values';
	echo '(';
	foreach($fields as $key=>$val){
		if($i == $len - 1) {
			echo $val;
		} else {
			echo $val.',';
		}
	}
	echo ')';
}

function getCompanyName($id){
	$sql=mysql_qurey('select * from users where id="'.$id.'"');
	$data=mysql_fetch_array($sql);
	
	return $data['company'];
}

function getCompanyNameByAd($id){
	$sql=mysql_qurey('select * from ads where id="'.$id.'"');
	$data=mysql_fetch_array($sql);
	$iduser = $data['user_id'];
	$sql=mysql_qurey('select * from users where id="'.$iduser.'"');
	$data=mysql_fetch_array($sql);
	
	return $data['company'];
}

function getUserNameByAd($id){
	$sql=mysql_qurey('select * from users where id="'.$id.'"');
	$data=mysql_fetch_array($sql);
	
	return $data['first_name'].' '.$data['last_name'];
}

/* Suppression d'un repertoire */
function deltree($dossier)
{
        if(($dir=opendir($dossier))===false)
            return;
 
        while($name=readdir($dir)){
            if($name==='.' or $name==='..')
                continue;
            $full_name=$dossier.'/'.$name;
 
            if(is_dir($full_name))
                @deltree($full_name);
            else @unlink($full_name);
            }
 
        closedir($dir);
 
        @rmdir($dossier);
        }



 function getTotalUser(){
 	$sql=mysql_query('select count(*) as total from users where type="basic"');
 	$data=mysql_fetch_array($sql);

 	return $data['total'];
 }

 function getTotalAd(){
 	$sql=mysql_query('select count(*) as total from ads');
 	$data=mysql_fetch_array($sql);

 	return $data['total'];
 }

 function getTotalShare(){
 	$sql=mysql_query('select count(*) as total from shares');
 	$data=mysql_fetch_array($sql);

 	return $data['total'];
 }

 function getTotalPaye(){
 	$sql=mysql_query('select count(*) as total from shares');
 	$data=mysql_fetch_array($sql);

 	return $data['total'] * 0.25 ;
 }

?>