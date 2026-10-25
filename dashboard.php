<?php require 'includes/auth.php'; need('dosen_read'); $title='Dashboard'; include 'includes/header.php';
$one=fn($s)=>q($s)->get_result()->fetch_assoc()['c'];
$bars=function($t,$c){ $r=rows(q("SELECT COALESCE(x.nama,'Belum diisi') n,COUNT(d.id) c FROM dosen d LEFT JOIN $t x ON x.id=d.$c GROUP BY x.nama ORDER BY c DESC")); $m=max(1,...array_column($r,'c')?:[1]);
 foreach($r as $x)echo '<div><span>'.e($x['n']).'</span><u><i style="width:'.round($x['c']/$m*100).'%"></i></u><em>'.$x['c'].'</em></div>'; }; ?>
<div class="head"><div><h2>Halo, <?=e(explode(' ',$_SESSION['user']['nama'])[0])?></h2><p>Ringkasan data dosen hari ini, <?=date('d-m-Y')?>.</p></div><?php if(can('dosen_write'))echo '<a class="btn gold" href="/modules/dosen.php?form=1">Tambah dosen</a>'; ?></div>
<div class="kpi"><div><b><?=$one("SELECT COUNT(*) c FROM dosen")?></b><span>Total dosen</span></div>
<div><b><?=$one("SELECT COUNT(*) c FROM dosen d JOIN status_serdos s ON s.id=d.serdos_id WHERE s.nama LIKE 'Sudah%'")?></b><span>Sudah serdos</span></div>
<div><b><?=$one("SELECT COUNT(*) c FROM dosen d JOIN status_aktivitas s ON s.id=d.aktivitas_id WHERE s.nama='Aktif'")?></b><span>Berstatus aktif</span></div>
<div><b><?=$one("SELECT COUNT(*) c FROM users")?></b><span>Pengguna sistem</span></div></div>
<div class="grid" style="grid-template-columns:repeat(auto-fit,minmax(320px,1fr))">
<div class="card"><h3>Jabatan fungsional</h3><div class="bars"><?php $bars('jabatan_fungsional','jabatan_id'); ?></div></div>
<div class="card"><h3>Pendidikan terakhir</h3><div class="bars"><?php $bars('pendidikan','pendidikan_id'); ?></div></div>
<div class="card"><h3>Status aktivitas</h3><div class="bars"><?php $bars('status_aktivitas','aktivitas_id'); ?></div></div></div>
<?php include 'includes/footer.php'; ?>
