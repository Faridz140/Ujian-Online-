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
                          Pengaturan Ujian
                        </div>
                        <div class="panel-body">


                          <?php
$aksi="modul/mod_pengaturanujian/aksi_pengaturanujian.php";
switch($_GET[act]){
  // Tampil Menuatas
  default:
    $sql  = mysql_query("SELECT * FROM tbl_pengaturan_ujian");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Pengaturan Tes</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=pengaturanujian&act=update class='form-horizontal'>
          <input type=hidden name=id value=$r[id]>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nama Ujian</label>
            <div class='col-sm-5'>
              <input type=text size=30 class='form-control' name=nama_ujian value='$r[nama_ujian]'>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Waktu Pengerjaan</label>
            <div class='col-sm-5'>
              <input type=text size=30 class='form-control' name=waktu value='$r[waktu]'>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Nilai Minimum</label>
            <div class='col-sm-5'>
              <input type=text size=30 class='form-control' name=nilai_min value='$r[nilai_min]'>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Peraturan</label>
            <div class='col-sm-10'>
              <textarea name='peraturan' style='width: 450px; height: 350px;'>$r[peraturan]</textarea>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'></label>
            <div class='col-sm-5'>
              <input type=submit value=Update class='btn btn-primary'>
            </div>
          </div>

          

         </form>";
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


