<?php
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Menuatas
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='2'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Edit Profil Website</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=profil&act=update>
          <input type=hidden name=id value=$r[id_modul]>
          <table>
          <tr><td><img src='../foto/$r[gambar]' width='160' height='160'></td></tr>
         <tr><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
         <tr><td><textarea name='isi' style='width: 540px; height: 300px;'>$r[isi_modul]</textarea></td></tr>
         <tr><td><input type=submit value=Update></td></tr>
         </form></table>";
    break;  
  
}
?>
