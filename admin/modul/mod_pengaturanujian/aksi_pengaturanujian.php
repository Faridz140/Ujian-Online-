<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update pengaturanujian
if ($module=='pengaturanujian' AND $act=='update'){
    mysql_query("UPDATE tbl_pengaturan_ujian SET nama_ujian = '$_POST[nama_ujian]',		
								waktu = '$_POST[waktu]',
								nilai_min = '$_POST[nilai_min]',
								peraturan = '$_POST[peraturan]'
                            WHERE id      = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
