<?php

require_once __DIR__ . '/Database.php';

$db = \config\Database::getConnection();
echo "Sukses Membuat Koneksi Database";