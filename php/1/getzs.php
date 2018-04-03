<?php

//$conn= mysqli_connect('localhost','root','root','dlgl');
//header("Content-type: text/html; charset=utf-8");

//require("../Main2/php/Db.php");
/* $conn=mysql_connect("localhost","root","root");
mysql_select_db("dlgl",$conn);
mysql_query("set names utf8"); */
//$db = Db::getInstance();

/* $res = mysql_query('select * from zsnrxx');
$result = mysql_fetch_array($res,MYSQL_ASSOC);
$data1=json_encode($result);
echo $data1; */


/* $data2=json_decode($data1,true);

	echo $data2['id'];
	echo $data2['name'];
	echo $data2['url']; */

//$zsnr=JSON.parse(data);
/* while($result = mysql_fetch_array($res)){
	echo $result['id'];
	} */

//$res = $db->fetchAll($search);
//echo json_encode($res);


require("../Db.php");

$db = Db::getInstance();

$search = 'select * from zsnrxx';

$res = $db->fetchAll($search);

echo json_encode($res);
?>

