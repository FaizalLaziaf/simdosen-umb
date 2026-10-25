<?php require '../includes/auth.php'; need('dosen_read');
$id=(int)($_GET['id']??0); $f=$_GET['form']??''; $msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){ need('dosen_write'); csrf_check();
 if(isset($_POST['hapus'])){ q("DELETE FROM dosen WHERE id=?",[$_POST['hapus']]); $msg='Data dihapus.'; }
 else{ $cols=array_merge(['nomor_registrasi','nuptk','nama','nip'],array_keys($FK)); $v=[];
  foreach($cols as $c){$x=trim($_POST[$c]??''); $v[]=$x===''?null:$x;}
  try{ if($id){ q("UPDATE dosen SET ".implode(',',array_map(fn($c)=>"$c=?",$cols))." WHERE id=?",[...$v,$id]); }
   else q("INSERT INTO dosen(".implode(',',$cols).") VALUES(".rtrim(str_repeat('?,',count($cols)),',').")",$v);
   header('Location: dosen.php'); exit; }catch(Exception $ex){ $msg='Gagal simpan (NUPTK/NIP/No.Reg mungkin duplikat).'; $f='1'; } } }
$title='Data Dosen'; include '../includes/header.php'; echo "<div class=\"head\"><h2>Data dosen</h2></div>"; if($msg)echo '<p class="err">'.e($msg).'</p>';
if($f||$id){ need('dosen_write'); $d=$id?(rows(q("SELECT * FROM dosen WHERE id=?",[$id]))[0]??[]):$_POST; ?>
<div class="card"><h3><?=$id?'Ubah':'Tambah'?> Dosen</h3><form method="post"><input type="hidden" name="csrf" value="<?=csrf()?>"><div class="grid">
<?php foreach(['nomor_registrasi'=>'Nomor Registrasi','nuptk'=>'NUPTK','nama'=>'Nama','nip'=>'NIP'] as $c=>$l)echo "<div><label>$l</label><input name='$c' value='".e($d[$c]??'')."'".($c=='nama'?' required':'')."></div>";
foreach($FK as $c=>$t){ echo "<div><label>".e($MASTER[$t])."</label><select name='$c'><option value=''>-- pilih --</option>"; foreach(rows(q("SELECT * FROM $t ORDER BY nama")) as $o)echo "<option value='{$o['id']}'".(($d[$c]??'')==$o['id']?' selected':'').">".e($o['nama'])."</option>"; echo "</select></div>"; } ?>
</div><p><button class="btn">Simpan</button> <a class="btn g" href="dosen.php">Batal</a></p></form></div>
<?php } else { $k=trim($_GET['k']??''); $w=$k?"WHERE d.nama LIKE ? OR d.nip LIKE ? OR d.nuptk LIKE ?":''; $p=$k?array_fill(0,3,"%$k%"):[];
 $r=rows(q(dosen_sql($w),$p)); ?>
<div class="card"><form class="noprint" style="display:flex;gap:8px;margin-bottom:10px"><input name="k" placeholder="Cari nama / NIP / NUPTK" value="<?=e($k)?>"><button class="btn">Cari</button><?php if(can('dosen_write'))echo '<a class="btn" href="?form=1">+ Tambah</a>'; ?></form>
<table><tr><th>No</th><th>No.Reg</th><th>NUPTK</th><th>Nama</th><th>NIP</th><th>Jabatan</th><th>Pangkat</th><th>Pendidikan</th><th>Rumpun</th><th>Serdos</th><th>Pegawai</th><th>Ikatan</th><th>Aktivitas</th><th>Penempatan</th><th>Aksi</th></tr>
<?php foreach($r as $i=>$x){ echo '<tr><td>'.($i+1).'</td>'; foreach(['nomor_registrasi','nuptk','nama','nip','jabatan','kepangkatan','pendidikan','rumpun','serdos','status_pegawai','ikatan','aktivitas','penempatan'] as $c)echo '<td>'.($c=='aktivitas'?chip($x[$c]):e($x[$c])).'</td>';
 echo '<td>'; if(can('dosen_write'))echo "<a class='btn' href='?id={$x['id']}'>Ubah</a> <form method='post' style='display:inline' onsubmit='return confirm(\"Hapus?\")'><input type='hidden' name='csrf' value='".csrf()."'><button class='btn r' name='hapus' value='{$x['id']}'>Hapus</button></form>"; echo '</td></tr>'; } ?></table></div>
<?php } include '../includes/footer.php'; ?>
