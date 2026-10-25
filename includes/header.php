<?php $u=$_SESSION['user']??null; $pub=!empty($public)||!$u; $cur=basename($_SERVER['SCRIPT_NAME']); ?><!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title??'SIM Dosen')?> - SIM Dosen UM Bengkulu</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="icon" href="/assets/favicon.png"><link rel="stylesheet" href="/assets/style.css"></head><body>
<?php if($pub): ?>
<header class="top"><span class="mark"></span><b>SIM Dosen UMB</b><div class="sp"><?php if($u): ?><a class="btn" href="/dashboard.php">Buka dashboard</a><?php else: ?><a class="btn" href="/login.php">Masuk</a><?php endif; ?></div></header><main>
<?php else: $nav=[['dashboard.php','home','Dashboard',1],['modules/dosen.php','users','Data dosen',can('dosen_read')],['modules/master.php','db','Data master',can('master')],['modules/users.php','key','Pengguna',can('master')],['laporan.php','doc','Laporan',can('laporan')],['api-tester.php','key','Uji API',can('dosen_read')]]; ?>
<div class="app"><aside class="side"><div class="brand"><span class="mark"></span><div>SIM Dosen<small>Universitas Muhammadiyah Bengkulu</small></div></div>
<?php foreach($nav as [$h,$i,$l,$ok]) if($ok) echo "<a href='/$h' class='".(strpos($h,$cur)!==false?'on':'')."'>".ico($i)."$l</a>"; ?>
<div class="who"><b><?=e($u['nama'])?></b><?=e($u['role'])?><br><a href="/logout.php" style="padding:8px 0 0"><?=ico('out')?>Keluar</a></div></aside><main class="content">
<?php endif; ?>
