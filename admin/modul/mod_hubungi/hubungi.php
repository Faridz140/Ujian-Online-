<?php
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Menuatas
  default:
    $sql  = mysql_query("SELECT * FROM kontak WHERE id='1'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Edit Menu&#187;$r[menu]</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=hubungi&act=update>
          <input type=hidden name=id value=$r[id]>
          <table>
          <tr><td><img src='../foto/$r[gambar]' width='250' height='230'></td></tr>
         <tr><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
         <tr><td><textarea name='isi' style='width: 550px; height: 300px;'>$r[isi]</textarea></td></tr>
         <tr><td><input type=submit value=Update></td></tr>
         </form></table>";
    break;  
  
}
?>
