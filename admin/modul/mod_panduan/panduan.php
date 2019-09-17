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
                           Panduan
                        </div>
                        <div class="panel-body">


                          
<?php
$aksi="modul/mod_panduan/aksi_panduan.php";
switch($_GET[act]){
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='3'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Edit Panduan Mengerjakan Tes Online</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=panduan&act=update class='form-horizontal'>
          <input type=hidden name=id value=$r[id_modul]>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'></label>
            <div class='col-sm-10'>
              <img src='../foto/$r[gambar]' width='160' height='160'>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Peraturan</label>
            <div class='col-sm-5'>
             <input type=file size=30 name=fupload>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Peraturan</label>
            <div class='col-sm-10'>
             <textarea name='isi' style='width: 550px; height: 300px;'>$r[isi_modul]</textarea>
            </div>
          </div>

          <div class='form-group'>
            <label for='inputEmail3' class='col-sm-2 control-label'>Peraturan</label>
            <div class='col-sm-10'>
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
