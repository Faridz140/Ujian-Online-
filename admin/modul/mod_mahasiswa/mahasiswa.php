<?php
$aksi="modul/mod_mahasiswa/aksi_mahasiswa.php";

switch($_GET[act]){
  // Tampil Data Mahasiswa
  default:
    echo "<h2>Data Mahasiswa Amik Selatpanjang</h2>";
	//Tombol Tambah Data
	echo "<div style='text-align:left;padding-left:30px;'>
          <input type=button value='Tambah Data Mahasiswa' onclick=\"window.location.href='?module=mahasiswa&act=tambahmahasiswa';\">
		  </div>";
	//Form Pencarian Data
	echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=mahasiswa&act=carimahasiswa>
		 <input type=text name='cari' placeholder='Masukkan Nim atau Nama Mahasiswa' list='auto' size=40 required/> <input type=submit value='Cari'>";
		echo"<datalist id='auto'>";
		 $qry=mysql_query("SELECT * FROM tbl_mahasiswa");
		 while ($t=mysql_fetch_array($qry)) {
		 	echo "<option value='$t[nama]'>";
		 }
	echo"</datalist></form>
		  </div>";
    echo"   <table>
          <tr><th>No</th><th>Nama</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tbl_mahasiswa");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
	   		 <tr><td>$no</td>
             <td>$r[nama]</td>
             <td>   <a href=?module=mahasiswa&act=detailmahasiswa&id=$r[id]>Detail</a> |
			 	   <a href=?module=mahasiswa&act=editmahasiswa&id=$r[id]>Edit</a> | 
	               <a href=$aksi?module=mahasiswa&act=hapus&id=$r[id]>Hapus</a> 
				   
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Data Mahasiswa
  case "tambahmahasiswa":
    echo "<h2>Tambah Data Mahasiswa</h2>
         <form method=POST enctype='multipart/form-data' action=$aksi?module=mahasiswa&act=input>
          <table width=600px>
          <tr><td>Nama</td><td> : <input type=text name='nama' required/></td></tr>
          <tr><td>Tempat/Tgl lahir</td><td> : <input type=text name='ttl' size='30' required/></td></tr>
		  <tr><td>Alamat</td><td> : <input type=text name='alamat' size='30' required/></td></tr>
		  <tr><td>Gambar</td><td> :  <input type=file size=30 name=fupload></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Data Mahasiswa
  case "editmahasiswa":
  $sql=mysql_query("SELECT * FROM tbl_mahasiswa WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($sql);
    echo "<h2>Edit Data Mahasiswa</h2>
         <form method=POST enctype='multipart/form-data' action=$aksi?module=mahasiswa&act=update>
          <table width=600px>
          <tr><td>Nama</td><td> : <input type=text name='nama' value='$r[nama]'></td></tr>
          <tr><td>Tempat/Tgl lahir</td><td> : <input type=text name='ttl' size='30' value='$r[ttl]'></td></tr>
		  <tr><td>Alamat</td><td> : <input type=text name='alamat' value='$r[alamat]'></td></tr>
		  <tr><td colspan='2'><img src='../foto/$r[gambar]' width='60' height='65'></td></tr>
		  <tr><td>Gambar</td><td> :  <input type=file size=30 name=fupload><input type=hidden name='id' value='$r[id]'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
	 
  // Detail Mahasiswa
  case "detailmahasiswa":
  $sql=mysql_query("SELECT * FROM tbl_mahasiswa WHERE id='$_GET[id]'");
  $r=mysql_fetch_array($sql);
 echo'<div algin=left><input type=button value=Back onclick=self.history.back()></div>';
    echo "<h2>Data Mahasiswa</h2>
          <table>
          <tr><td>Nama</td><td> : $r[nama]</td></tr>
          <tr><td>Tempat/Tgl lahir</td><td> : $r[ttl]</td></tr>
		  <tr><td>Alamat</td><td> : $r[alamat]</td></tr>
		  <tr><td>Gambar</td><td> :  <img src='../foto/$r[gambar]' width='210' height='220'></td></tr>
          </table>";
     break;
	 
	 //Hasil Cari Mahasiswa
	 case "carimahasiswa":
    echo"<h2>Hasil Pencarian Dengan kata Kunci <i>$_POST[cari]</i></h2>   
	<table>
          <tr><th>No</th><th>Nama</th><th>Ttl</th><th>Jurusan</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tbl_mahasiswa WHERE id LIKE '%$_POST[cari]%' or nama LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
	   		 <tr><td>$no</td>
             <td>$r[nama]</td>
			 <td>$r[ttl]</td>
             <td>   <a href=?module=mahasiswa&act=detailmahasiswa&id=$r[id]>Detail</a> |
			 	   <a href=?module=mahasiswa&act=editmahasiswa&id=$r[id]>Edit</a> | 
	               <a href=$aksi?module=mahasiswa&act=hapus&id=$r[id]>Hapus</a> |
				   <a href=?module=khs&id=$r[id]>khs</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
}

?>
