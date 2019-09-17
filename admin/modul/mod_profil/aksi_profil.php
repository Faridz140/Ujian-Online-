<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update profil
if ($module=='profil' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("UPDATE modul SET isi_modul = '$_POST[isi]',
                                  gambar  = '$nama_file'    
                            WHERE id_modul      = '$_POST[id]'");
  }
  else{
    mysql_query("UPDATE modul SET 
									   isi_modul = '$_POST[isi]'
                            WHERE id_modul       = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
