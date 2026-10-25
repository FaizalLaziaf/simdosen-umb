<?php require 'includes/auth.php'; $err='';
if($_SERVER['REQUEST_METHOD']==='POST'){ csrf_check();
 $r=rows(q("SELECT * FROM users WHERE username=?",[trim($_POST['username']??'')]))[0]??null;
 if($r&&password_verify($_POST['password']??'',$r['password'])){ session_regenerate_id(true); unset($r['password']); $_SESSION['user']=$r; header('Location: /dashboard.php'); exit; }
 $err='Username atau password tidak cocok. Periksa lagi lalu coba masuk kembali.'; }
if(logged()){header('Location: /dashboard.php');exit;}
$title='Masuk'; ?><!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Masuk - SIM Dosen UMB</title>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"><link rel="icon" href="/assets/favicon.png"><link rel="stylesheet" href="/assets/style.css"></head><body>
<div class="login"><div class="l"><span class="mark" style="position:relative;margin-bottom:20px;width:84px;height:84px"></span><h1>Masuk untuk mengelola data dosen.</h1><p>Sistem Informasi Manajemen Dosen, Fakultas Teknik Universitas Muhammadiyah Bengkulu.</p></div>
<div class="r"><form method="post"><h2 style="font-size:30px">Masuk</h2><?php if($err)echo '<p class="err">'.e($err).'</p>'; ?><input type="hidden" name="csrf" value="<?=csrf()?>">
<p><label for="u">Username</label><input id="u" name="username" required autofocus autocomplete="username"></p><p><label for="p">Password</label><input id="p" type="password" name="password" required autocomplete="current-password"></p>
<button class="btn gold" style="width:100%;padding:12px">Masuk</button><div class="demo">Akun demo: <code>admin</code> / <code>admin123</code>, <code>operator</code> / <code>operator123</code>, <code>viewer</code> / <code>viewer123</code><br><a href="/index.php">Kembali ke beranda</a></div></form></div></div></body></html>
