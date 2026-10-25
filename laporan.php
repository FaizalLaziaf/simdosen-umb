<?php require 'includes/auth.php'; need('laporan');
$w=[];$p=[]; foreach(['prodi_id','aktivitas_id','fakultas_id'] as $c) if(!empty($_GET[$c])){$w[]="d.$c=?";$p[]=$_GET[$c];}
$r=rows(q(dosen_sql($w?'WHERE '.implode(' AND ',$w):''),$p));
$cols=['nomor_registrasi'=>'Nomor Registrasi','nuptk'=>'NUPTK','nama'=>'Nama','nip'=>'NIP','jabatan'=>'Jabatan Fungsional','kepangkatan'=>'Kepangkatan','pendidikan'=>'Pendidikan Terakhir','rumpun'=>'Rumpun Ilmu','serdos'=>'Status Serdos','status_pegawai'=>'Status Pegawai','ikatan'=>'Ikatan Kerja','aktivitas'=>'Status Aktivitas','penempatan'=>'Penempatan'];
if(isset($_GET['csv'])){ header('Content-Type: text/csv; charset=utf-8'); header('Content-Disposition: attachment; filename=daftar_dosen.csv'); $o=fopen('php://output','w'); fputcsv($o,array_merge(['No'],array_values($cols)));
 foreach($r as $i=>$x)fputcsv($o,array_merge([$i+1],array_map(fn($c)=>$x[$c],array_keys($cols)))); exit; }
$title='Laporan'; include 'includes/header.php';
$sel=fn($n,$t,$l)=>"<select name='$n' onchange='this.form.submit()'><option value=''>Semua $l</option>".implode('',array_map(fn($o)=>"<option value='{$o['id']}'".(($_GET[$n]??'')==$o['id']?' selected':'').">".e($o['nama'])."</option>",rows(q("SELECT * FROM $t ORDER BY nama"))))."</select>"; ?>
<form class="card noprint grid"><?=$sel('fakultas_id','fakultas','Fakultas')?><?=$sel('prodi_id','prodi','Prodi')?><?=$sel('aktivitas_id','status_aktivitas','Status')?>
<div><button type="button" class="btn" onclick="print()">Cetak</button> <a class="btn g" href="?<?=e(http_build_query($_GET+['csv'=>1]))?>">CSV</a></div></form>
<div class="card"><h3>Daftar Dosen Aktif Universitas</h3><p>Universitas : Universitas Muhammadiyah Bengkulu<br>Fakultas : <?=e($r[0]['fakultas']??'Teknik')?><br>Program Studi : <?=e($r[0]['prodi']??'Teknik Informatika')?></p>
<table><tr><th>No</th><?php foreach($cols as $l)echo "<th>$l</th>"; ?></tr><?php foreach($r as $i=>$x){echo '<tr><td>'.($i+1).'</td>'; foreach($cols as $c=>$l)echo '<td>'.($c=='aktivitas'?chip($x[$c]):e($x[$c])).'</td>'; echo '</tr>';} ?></table>
<p style="font-size:12px">Dicetak: <?=date('d-m-Y H:i')?> oleh <?=e($_SESSION['user']['nama'])?></p></div>
<?php include 'includes/footer.php'; ?>
