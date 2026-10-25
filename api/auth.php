<?php require __DIR__.'/_boot.php';
if($_SERVER['REQUEST_METHOD']!=='POST')out(405,['error'=>'Gunakan POST']);
$b=json_decode(file_get_contents('php://input'),true)?:$_POST;
$r=rows(q("SELECT * FROM users WHERE username=?",[$b['username']??'']))[0]??null;
if(!$r||!password_verify($b['password']??'',$r['password']))out(401,['error'=>'Login gagal']);
out(200,['username'=>$r['username'],'role'=>$r['role'],'api_key'=>$r['api_key']]);
