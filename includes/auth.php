<?php
// Autentikasi + RBAC
session_set_cookie_params(['httponly'=>true,'samesite'=>'Lax']);
session_start();
require_once __DIR__.'/../config/koneksi.php';
require_once __DIR__.'/functions.php';
const ROLES=['admin'=>['*'],'operator'=>['dosen_read','dosen_write','laporan'],'viewer'=>['dosen_read','laporan']];
function logged(){ return !empty($_SESSION['user']); }
function can($p){ $r=$_SESSION['user']['role']??''; $a=ROLES[$r]??[]; return in_array('*',$a)||in_array($p,$a); }
function need($p){ if(!logged()){header('Location: /login.php');exit;} if(!can($p)){http_response_code(403);die('403 - Akses ditolak untuk role Anda.');} }
