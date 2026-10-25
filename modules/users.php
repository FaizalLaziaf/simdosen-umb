<?php require '../includes/auth.php'; need('master'); $msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){ csrf_check(); $a=$_POST['aksi']??'';
 try{ if($a==='tambah')q("INSERT INTO users(username,password,nama,role,api_key) VALUES(?,?,?,?,?)",[trim($_POST['username']),password_hash($_POST['password'],PASSWORD_DEFAULT),trim($_POST['nama']),$_POST['role'],bin2hex(random_bytes(20))]);
  elseif($a==='role')q("UPDATE users SET role=? WHERE id=?",[$_POST['role'],$_POST['id']]);
  elseif($a==='key')q("UPDATE users SET api_key=? WHERE id=?",[bin2hex(random_bytes(20)),$_POST['id']]);
  elseif($a==='pass'&&$_POST['password']!=='')q("UPDATE users SET password=? WHERE id=?",[password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['id']]);
  elseif($a==='hapus'&&$_POST['id']!=$_SESSION['user']['id'])q("DELETE FROM users WHERE id=?",[$_POST['id']]);
 }catch(Exception $x){$msg='Gagal: username duplikat / data tidak valid.';} }
$title='Pengguna'; include '../includes/header.php'; $opt=fn($s)=>implode('',array_map(fn($r)=>"<option".($r==$s?' selected':'').">$r</option>",['admin','operator','viewer'])); ?>
<h2>Manajemen Pengguna (RBAC)</h2><?php if($msg)echo '<p class="err">'.e($msg).'</p>'; ?>
<div class="card"><form method="post" class="grid"><input type="hidden" name="csrf" value="<?=csrf()?>"><input type="hidden" name="aksi" value="tambah">
<input name="username" placeholder="username" required><input name="nama" placeholder="Nama lengkap" required><input type="password" name="password" placeholder="password" required><select name="role"><?=$opt('viewer')?></select><button class="btn">Tambah</button></form></div>
<div class="card"><table><tr><th>User</th><th>Nama</th><th>Role</th><th>API Key</th><th>Aksi</th></tr><?php foreach(rows(q("SELECT * FROM users ORDER BY id")) as $r): $h='<input type="hidden" name="csrf" value="'.csrf().'"><input type="hidden" name="id" value="'.$r['id'].'">'; ?>
<tr><td><?=e($r['username'])?></td><td><?=e($r['nama'])?></td>
<td><form method="post"><?=$h?><input type="hidden" name="aksi" value="role"><select name="role" onchange="this.form.submit()"><?=$opt($r['role'])?></select></form></td>
<td><code style="font-size:11px"><?=e($r['api_key'])?></code></td>
<td style="display:flex;gap:4px"><form method="post"><?=$h?><input type="hidden" name="aksi" value="key"><button class="btn g">Reset Key</button></form>
<form method="post" style="display:flex;gap:4px"><?=$h?><input type="hidden" name="aksi" value="pass"><input type="password" name="password" placeholder="pass baru"><button class="btn">Ganti</button></form>
<form method="post" onsubmit="return confirm('Hapus?')"><?=$h?><input type="hidden" name="aksi" value="hapus"><button class="btn r">Hapus</button></form></td></tr><?php endforeach; ?></table></div>
<?php include '../includes/footer.php'; ?>
