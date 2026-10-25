<?php require '../includes/auth.php'; need('master');
$t=$_GET['t']??'jabatan_fungsional'; if(!isset($MASTER[$t]))die('Tabel tidak valid'); $msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){ csrf_check();
 try{ if(isset($_POST['hapus']))q("DELETE FROM $t WHERE id=?",[$_POST['hapus']]);
  elseif(!empty($_POST['id']))q("UPDATE $t SET nama=? WHERE id=?",[trim($_POST['nama']),$_POST['id']]);
  else q("INSERT INTO $t(nama) VALUES(?)",[trim($_POST['nama'])]); }catch(Exception $x){$msg='Gagal: nama duplikat / kosong.';} }
$title='Data Master'; include '../includes/header.php'; ?>
<h2>Data Master</h2><div class="card noprint"><?php foreach($MASTER as $k=>$l)echo "<a class='btn".($k==$t?'':' g')."' href='?t=$k'>".e($l)."</a> "; ?></div>
<div class="card"><h3><?=e($MASTER[$t])?></h3><?php if($msg)echo '<p class="err">'.e($msg).'</p>'; ?>
<form method="post" style="display:flex;gap:8px"><input type="hidden" name="csrf" value="<?=csrf()?>"><input name="nama" placeholder="Tambah data baru" required><button class="btn">Tambah</button></form><br>
<table><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr><?php foreach(rows(q("SELECT * FROM $t ORDER BY id")) as $r): ?>
<tr><form method="post"><input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="id" value="<?=$r['id']?>"><td><?=$r['id']?></td><td><input name="nama" value="<?=e($r['nama'])?>"></td>
<td><button class="btn">Simpan</button> <button class="btn r" name="hapus" value="<?=$r['id']?>" onclick="return confirm('Hapus?')">Hapus</button></td></form></tr><?php endforeach; ?></table></div>
<?php include '../includes/footer.php'; ?>
