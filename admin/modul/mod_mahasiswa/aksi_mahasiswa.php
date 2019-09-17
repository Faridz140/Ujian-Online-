<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];
if ($module=='mahasiswa' AND $act=='hapus'){
  mysql_query("DELETE FROM tbl_mahasiswa WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='mahasiswa' AND $act=='input'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"foto/$nama_file");
    mysql_query("INSERT INTO tbl_mahasiswa(
                                    nama,
                                    ttl,
                                    alamat,
                                    gambar) 
                            VALUES(
                                   '$_POST[nama]',
								   '$_POST[ttl]',
                                   '$_POST[alamat]',
                                   '$nama_file')");
	}
	else {
    mysql_query("INSERT INTO tbl_mahasiswa(
                                    nama,
                                    ttl,
                                    alamat) 
                            VALUES(
                                   '$_POST[nama]',
								   '$_POST[ttl]',
                                   '$_POST[alamat]')");
	}
  header('location:../../media.php?module='.$module);
}
elseif ($module=='mahasiswa' AND $act=='update'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"foto/$nama_file");
	mysql_query("UPDATE tbl_mahasiswa SET 
								  nama='$_POST[nama]',
								  ttl = '$_POST[ttl]',
								  alamat ='$_POST[alamat]',
                                  gambar         = '$nama_file'
						WHERE id='$_POST[id]'");
  }
  else {
    mysql_query("UPDATE tbl_mahasiswa SET 
								  nama = '$_POST[nama]',
								  ttl = '$_POST[ttl]',
								  alamat ='$_POST[alamat]'
						WHERE id='$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}


?>
