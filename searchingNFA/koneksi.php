<!-- Simpan dalam format .php -->
<?php
// koneksi ke server
$db = new mysqli("localhost", "root", "", "db_dokumen");
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
