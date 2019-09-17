<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='hasilujian' AND $act=='hapus') {
	mysql_query("DELETE FROM tbl_nilai WHERE id_nilai='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

?>

