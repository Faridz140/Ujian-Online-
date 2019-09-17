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
                          Hasil Ujian
                        </div>
                        <div class="panel-body">
                          <?php
$aksi="modul/mod_hasilujian/aksi_hasilujian.php";
switch($_GET[act]){
  // Tampil Hasil Ujian Users
  default:
      $tampil = mysql_query("SELECT * FROM tbl_nilai,tbl_user WHERE tbl_nilai.id_user=tbl_user.id_user");
      echo "<h2>Hasil Tes Ujian User</h2>
        <table class='table table-striped table-bordered table-hover'>
          <tr><th>no</th><th>Usersname</th><th>Nama</th><th>Benar</th><th>Salah</th><th>Kosong</th><th>Nilai</th><th>Tanggal</th><th>Keterangan</th><th>aksi</th></tr>"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    $tgl = tgl_indo($r[tanggal]);

       echo "<tr><td>$no</td>
             <td>$r[username]</td>
            <td>$r[nama]</td>
            <td>$r[benar]</td>
        <td>$r[salah]</td>
        <td>$r[kosong]</td>
        <td>$r[score]</td>
        <td>$tgl</td>
        <td>$r[keterangan]</td>
   <td><input type=button value='Hapus' class='btn btn-danger' onclick=\"window.location.href='$aksi?module=hasilujian&act=hapus&id=$r[id_nilai]';\">
   </td>
      </tr>";
      $no++;
    }
    echo "</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
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

