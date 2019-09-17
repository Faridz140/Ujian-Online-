        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <!--   <h3 class="page-header"> Peraturan </h3> -->

                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Daftar User
                        </div>
                        <div class="panel-body">


                          
<?php
$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_user");
      echo "<h2> Daftar User</h2>
    <table class='table table-striped table-bordered table-hover'>
          <tr><th>no</th><th>Username</th><th>Nama</th><th>Password</th><th>Jenis Kelamin</th><th>Aktif</th><th>Lihat</th><th>aksi</th><th>Status</th></tr>"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
            <td>$r[nama]</td>
            <td>$r[password]</td>
        <td>$r[jk]</td>
          <td align=center>$r[statusaktif]</td>
        <td><a href='?module=users&act=lihat&id=$r[id_user]'>View</a></td>
             <td><a href=$aksi?module=users&act=hapus&id=$r[id_user]>Hapus</a></td>";
        if ($r[statusaktif]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=users&act=nonaktif&id=$r[id_user]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-primary' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=users&act=aktif&id=$r[id_user]';\"></td>";
        }
        echo"</tr>";
      $no++;
    }
    echo "</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
    break;
  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_user WHERE id_user='$_GET[id]'");
    $t=mysql_fetch_array($tampil);
    echo "
  <table width='60%'>
    <tr><th colspan=2 align='center'>DETAIL USER</th></tr>
    <tr><td>Username</td><td>$t[username]</td></tr>
    <tr><td>Password</td><td>$t[password]</td></tr>
    <tr><td>Nama</td><td>$t[nama]</td></tr>
    <tr><td>Tgl Lahir </td><td>$t[tgl_lahir]</td></tr>
    <tr><td>Jenis Kelamin </td><td>$t[jk]</td> </tr>
    <tr><td>Agama</td><td>$t[agama]</td></tr>
    <tr><td>Kewarganegaraan</td><td>$t[kwgn]</td></tr>
    <tr><td>Nama Ayah </td><td>$t[nama_ayah]</td></tr>
    <tr><td>Nama Ibu </td><td>$t[nama_ibu]</td></tr>
    <tr><td>Pekerjaan Ayah</td><td>$t[pekerjaan_ayah]</td></tr>
    <tr><td>Pekerjaan Ibu </td><td>$t[pekerjaan_ibu]</td></tr>
    <tr><td>Sekolah Asal </td><td>$t[sekolah_asal]</td></tr>
    <tr> <td>Telp</td><td>$t[telp]</td></tr>
    <tr><td>Alamat</td><td>$t[alamat]</td></tr>
  </table>";
  break;
}
?>

                        </div>
                        <div class="panel-footer">
                           
                        </div>
                    </div>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

