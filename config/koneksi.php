<?php
require __DIR__.(is_file(__DIR__.'/db.local.php')?'/db.local.php':'/db.example.php');
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
try{ $db=new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME,$DB_PORT); $db->set_charset('utf8mb4'); }
catch(Exception $e){ http_response_code(500); die('Koneksi database gagal.'); }
