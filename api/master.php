<?php require __DIR__.'/_boot.php'; api_user(); $t=$_GET['t']??'';
if(!isset($MASTER[$t]))out(400,['error'=>'Parameter t tidak valid','pilihan'=>array_keys($MASTER)]);
out(200,['data'=>rows(q("SELECT * FROM $t ORDER BY id"))]);
