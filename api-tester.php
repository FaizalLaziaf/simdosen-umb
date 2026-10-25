<?php require 'includes/auth.php'; need('dosen_read'); $title='Uji API'; include 'includes/header.php'; $k=$_SESSION['user']['api_key']; ?>
<div class="head"><div><h2>Uji API</h2><p>Coba web service langsung dari browser. API key akun Anda sudah terisi otomatis.</p></div></div>
<div class="card"><div class="grid" style="grid-template-columns:140px 1fr">
<div><label>Method</label><select id="m"><option>GET</option><option>POST</option><option>PUT</option><option>DELETE</option></select></div>
<div><label>Endpoint</label><input id="u" value="/api/dosen.php"></div></div>
<p><label style="font-size:12px;font-weight:600;color:var(--mut)">X-API-KEY</label><input id="k" value="<?=e($k)?>"></p>
<p><label style="font-size:12px;font-weight:600;color:var(--mut)">Body JSON (untuk POST / PUT)</label><textarea id="b" rows="4" style="width:100%;padding:10px;border:1px solid #c5d1ca;border-radius:10px;font:13px ui-monospace,monospace">{"nama":"Dosen Baru, M.Kom","nip":"199001012020011001"}</textarea></p>
<p><button class="btn gold" id="go">Kirim permintaan</button> <span id="st" class="chip"></span></p>
<p style="font-size:13px;color:var(--mut)">Contoh endpoint: <code>/api/dosen.php?q=contoh</code>, <code>/api/dosen.php?id=1</code>, <code>/api/master.php?t=prodi</code></p></div>
<div class="card"><h3>Respons</h3><pre id="out">Belum ada permintaan.</pre></div>
<script>
document.getElementById('go').onclick=async()=>{const m=document.getElementById('m').value,o=document.getElementById('out'),s=document.getElementById('st');
 const opt={method:m,headers:{'X-API-KEY':document.getElementById('k').value}}; if(m=='POST'||m=='PUT')opt.body=document.getElementById('b').value;
 o.textContent='Memuat...';try{const r=await fetch(document.getElementById('u').value,opt);const t=await r.text();s.textContent=r.status+' '+r.statusText;s.className='chip '+(r.ok?'ok':'off');
 try{o.textContent=JSON.stringify(JSON.parse(t),null,2)}catch(e){o.textContent=t}}catch(e){o.textContent='Gagal: '+e.message}};
</script>
<?php include 'includes/footer.php'; ?>
