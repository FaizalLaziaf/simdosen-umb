<?php header('Content-Type: application/json; charset=utf-8'); mysqli_report(MYSQLI_REPORT_OFF);
require __DIR__.'/../config/koneksi.php'; require __DIR__.'/../includes/functions.php';
function out($c,$d){http_response_code($c);echo json_encode($d,JSON_UNESCAPED_UNICODE);exit;}
function api_user(){ $k=$_SERVER['HTTP_X_API_KEY']??($_GET['api_key']??''); $r=$k?rows(q("SELECT id,username,role FROM users WHERE api_key=?",[$k])):[]; if(!$r)out(401,['error'=>'API key tidak valid']); return $r[0]; }
