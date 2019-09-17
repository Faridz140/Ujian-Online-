<?php
include "../config/koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);


$qry=mysql_query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ");
$jumpa=mysql_num_rows($qry);
$r=mysql_fetch_array($qry);

if ($jumpa > 0) {
	session_start();
	$_SESSION[username]= $r[username];
	$_SESSION[idadmin]= $r[id_admin];
	header('location:media.php?module=home');
}
else {
	echo '<script language="javascript">
	alert("Userid atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
	window.location="index.php";
	</script>';
	exit();
}
?>