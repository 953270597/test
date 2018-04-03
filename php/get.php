<?php

$conn =new mysqli('localhost','root','root','dlgl');
header("Content-type: text/html; charset=utf-8");
$conn->query("set character set 'utf8'");
$conn->query("set names 'utf8'");
$search = 'select * from zysxx';

$res = $conn->query($search);
$result=array();
$arr=array();
while($row=$res->fetch_assoc()){
    $result[]=$row;
    if($result){
        array_push($arr, json_encode($result));
    }
}
$n=count($arr);
echo $arr[$n-1];
$res->free();
