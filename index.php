<?php require 'includes/auth.php'; $title='Beranda'; $public=1; include 'includes/header.php';
$n=q("SELECT COUNT(*) c FROM dosen")->get_result()->fetch_assoc()['c'];
$r=rows(q(str_replace('ORDER BY d.nama','ORDER BY d.id DESC LIMIT 5',dosen_sql()))); ?>
<section class="hero"><div><h1>Data dosen UM Bengkulu, rapi dan siap dilaporkan.</h1>
<p class="lead">Kelola NUPTK, NIP, jabatan fungsional, serdos sampai status aktivitas dalam satu sistem, lalu cetak Daftar Dosen Aktif kapan pun dibutuhkan.</p>
<div class="cta"><a class="btn gold" href="<?=logged()?'/dashboard.php':'/login.php'?>">Masuk ke aplikasi</a><a class="btn g" href="#api">Lihat API</a></div></div>
<div class="paper"><h4>Daftar Dosen Aktif Universitas</h4><small>Universitas : Universitas Muhammadiyah Bengkulu<br>Fakultas : Teknik<br><?=$n?> dosen terdata</small>
<table><tr><th>No</th><th>Nama</th><th>Jabatan</th><th>Status</th></tr><?php foreach($r as $i=>$x)echo '<tr><td>'.($i+1).'</td><td>'.e($x['nama']).'</td><td>'.e($x['jabatan']).'</td><td>'.chip($x['aktivitas']).'</td></tr>'; ?></table></div></section>
<section class="band"><div class="in"><div><h3>Satu data, 14 kolom</h3><p>Seluruh kolom pada laporan daftar dosen dinormalisasi menjadi tabel master, sehingga data konsisten dan mudah diubah.</p></div>
<div><h3>Akses sesuai peran</h3><p>Admin mengatur semuanya, operator mengelola data dosen, dan viewer hanya melihat data serta laporan.</p></div>
<div><h3>Siap dihubungkan</h3><p>Data dosen tersedia lewat web service JSON, jadi aplikasi lain dapat membaca dan memperbarui data yang sama.</p></div></div></section>
<section class="api" id="api"><div><h2>Web service untuk aplikasi lain</h2><p style="color:var(--mut)">Ambil API key melalui login, lalu kirim di header <code>X-API-KEY</code> pada setiap permintaan.</p></div>
<pre>curl -X POST /api/auth.php \
  -d '{"username":"admin","password":"..."}'

curl /api/dosen.php?q=ahmad \
  -H "X-API-KEY: &lt;api_key&gt;"

{"total":1,"data":[{"nama":"...","nip":"..."}]}</pre></section>
<?php include 'includes/footer.php'; ?>
