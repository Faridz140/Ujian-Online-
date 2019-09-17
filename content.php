<?php
include "config/koneksi.php";

if ($_GET[hal]=="soal") {
	include "sidebar.php";
	include "soal.php";
}
elseif ($_GET[hal]=="home") {
	include "sidebar.php";
	include "home.php";
}
elseif ($_GET[hal]=="register") {
	include "sidebar.php";
	include "register.php";
}
elseif ($_GET[hal]=="formlogin") {
	include "sidebar.php";
	include "formlogin.php";
}
elseif ($_GET[hal]=="jawaban") {
	include "sidebar.php";
	include "jawaban.php";
}
elseif ($_GET[hal]=="profiluser") {
	include "sidebar.php";
	include "profileuser.php";
}
elseif ($_GET[hal]=="profil") {
	include "sidebar.php";
	$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='2'");
    $r    = mysql_fetch_array($sql);
	
	echo "<div style='text-align:center'><img src='foto/$r[gambar]' width='260' height='260' align='center'></div>";
	echo "$r[isi_modul]";

}
elseif ($_GET[hal]=="panduan") {
	include "sidebar.php";
	$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='3'");
    $r    = mysql_fetch_array($sql);
	
	echo "<div align='center'><img src='foto/$r[gambar]' width='160' height='160'></div>";
	echo "$r[isi_modul]";

}
//Home
else {
	include "sidebar.php";
	$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='1'");
    $r    = mysql_fetch_array($sql);
	
	echo "<img src='foto/$r[gambar]' width='160' height='160' align='left'>";
	echo "$r[isi_modul]";
}
?>