<?php
function e($s){return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8');}
function csrf(){ if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(16)); return $_SESSION['csrf']; }
function csrf_check(){ if(!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??''))die('Token CSRF tidak valid'); }
function q($sql,$p=[]){ global $db; $s=$db->prepare($sql); if($p)$s->bind_param(str_repeat('s',count($p)),...$p); $s->execute(); return $s; }
function rows($s){ return $s->get_result()->fetch_all(MYSQLI_ASSOC); }
// Tabel master (hasil normalisasi kolom dari laporan daftar dosen)
$MASTER=['jabatan_fungsional'=>'Jabatan Fungsional','kepangkatan'=>'Kepangkatan','pendidikan'=>'Pendidikan Terakhir','rumpun_ilmu'=>'Rumpun Ilmu','status_serdos'=>'Status Serdos','status_pegawai'=>'Status Pegawai','ikatan_kerja'=>'Ikatan Kerja','status_aktivitas'=>'Status Aktivitas','penempatan'=>'Penempatan','fakultas'=>'Fakultas','prodi'=>'Program Studi'];
$FK=['jabatan_id'=>'jabatan_fungsional','kepangkatan_id'=>'kepangkatan','pendidikan_id'=>'pendidikan','rumpun_id'=>'rumpun_ilmu','serdos_id'=>'status_serdos','status_pegawai_id'=>'status_pegawai','ikatan_id'=>'ikatan_kerja','aktivitas_id'=>'status_aktivitas','penempatan_id'=>'penempatan','fakultas_id'=>'fakultas','prodi_id'=>'prodi'];
function dosen_sql($where=''){ global $FK; $sel='d.*';$j='';$i=0;
 foreach($FK as $c=>$t){$i++;$a="t$i";$sel.=",$a.nama AS ".substr($c,0,-3);$j.=" LEFT JOIN $t $a ON $a.id=d.$c";}
 return "SELECT $sel FROM dosen d$j $where ORDER BY d.nama"; }
function chip($t){ $c=['Aktif'=>'ok','Cuti'=>'warn','Tugas Belajar'=>'warn','Pensiun'=>'off'][$t]??''; return $t===null||$t===''?'':"<span class='chip $c'>".e($t)."</span>"; }
function ico($n){ $p=['home'=>'<path d="M3 11l9-8 9 8v9a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1z"/>','users'=>'<circle cx="9" cy="8" r="3.5"/><path d="M2 20c0-4 3-6 7-6s7 2 7 6M17 4.5a3.5 3.5 0 010 7M19 14c2 .8 3 2.6 3 6"/>','db'=>'<ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v14c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 12c0 1.7 3.6 3 8 3s8-1.3 8-3"/>','key'=>'<circle cx="8" cy="15" r="4"/><path d="M11 12l9-9M16 7l3 3"/>','doc'=>'<path d="M6 2h9l5 5v15H6zM14 2v6h6M9 13h8M9 17h8"/>','out'=>'<path d="M9 21H4V3h5M16 17l5-5-5-5M21 12H9"/>'][$n]??''; return "<svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'>$p</svg>"; }
