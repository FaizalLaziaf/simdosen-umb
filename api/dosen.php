<?php require __DIR__.'/_boot.php'; $u=api_user(); $m=$_SERVER['REQUEST_METHOD']; $id=(int)($_GET['id']??0);
$b=json_decode(file_get_contents('php://input'),true)?:[]; $cols=array_merge(['nomor_registrasi','nuptk','nama','nip'],array_keys($FK));
if($m==='GET'){ if($id){$r=rows(q(dosen_sql('WHERE d.id=?'),[$id])); $r?out(200,['data'=>$r[0]]):out(404,['error'=>'Tidak ditemukan']);}
 $k=$_GET['q']??''; $r=$k?rows(q(dosen_sql('WHERE d.nama LIKE ? OR d.nip LIKE ? OR d.nuptk LIKE ?'),array_fill(0,3,"%$k%"))):rows(q(dosen_sql()));
 out(200,['total'=>count($r),'data'=>$r]); }
if(!in_array($u['role'],['admin','operator']))out(403,['error'=>'Role tidak diizinkan menulis']);
$v=function($cs)use($b){$a=[];foreach($cs as $c){$x=trim((string)($b[$c]??''));$a[$c]=$x===''?null:$x;}return $a;};
if($m==='POST'){ $a=$v($cols); if(!$a['nama'])out(422,['error'=>'nama wajib diisi']);
 $s=q("INSERT INTO dosen(".implode(',',$cols).") VALUES(".rtrim(str_repeat('?,',count($cols)),',').")",array_values($a)); if($s->errno)out(409,['error'=>'Gagal simpan (duplikat / FK tidak valid)']); out(201,['message'=>'Dibuat','id'=>$s->insert_id]); }
if(!$id)out(400,['error'=>'Parameter id wajib']);
if($m==='PUT'){ $cs=array_values(array_filter($cols,fn($c)=>array_key_exists($c,$b))); if(!$cs)out(422,['error'=>'Tidak ada field']); $a=$v($cs);
 $s=q("UPDATE dosen SET ".implode(',',array_map(fn($c)=>"$c=?",$cs))." WHERE id=?",[...array_values($a),$id]); if($s->errno)out(409,['error'=>'Gagal ubah']); out(200,['message'=>'Diubah']); }
if($m==='DELETE'){ $s=q("DELETE FROM dosen WHERE id=?",[$id]); out($s->affected_rows?200:404,['message'=>$s->affected_rows?'Dihapus':'Tidak ditemukan']); }
out(405,['error'=>'Method tidak didukung']);
