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
                          Kelola Soal
                        </div>
                        <div class="panel-body">


                         
<script language="JavaScript">
function bukajendela(url) {
 window.open(url, "window_baru", "width=800,height=500,left=120,top=10,resizable=1,scrollbars=1");
}
</script>

<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_soal/aksi_soal.php";
switch($_GET[act]){
  // Tampil Soal
  default:
    echo "<h2>Soal</h2>";
  // Tombol Tambah Soal
  echo "<div style='text-align:left;padding-left:30px;'>
          <input class='btn btn-primary' type=button value='Tambah Soal' 
          onclick=\"window.location.href='?module=soal&act=tambahsoal';\">";
  //Form Pencarian Data
  echo "<div style='text-align:right;padding-right:30px;'>
         <form method='POST' action=?module=soal&act=carisoal>
     <input type=text name='cari'  placeholder='Masukkan Pertanyaan' list='auto' size=40 required/> <input type=submit class='btn btn-danger' value='Cari'>";
    echo"<datalist id='auto'>";
     $qry=mysql_query("SELECT * FROM tbl_soal");
     while ($t=mysql_fetch_array($qry)) {
      echo "<option value='$t[soal]'>";
     }
  echo"</datalist></form>
      </div>";
  //Tampil Data Soal    
     echo" <table class='table table-striped table-bordered table-hover'>
          <tr><th>No</th><th>Pertanyaan</th><th>Status</th><th>aksi</th><th>View</th><th>Status</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tbl_soal ORDER BY id_soal DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    $soal=substr($r[soal],0,78);
       echo "<tr><td>$no</td>
             <td>$soal..</td>
       <td align='center'>$r[aktif]</td>
             <td>
        <a href=?module=soal&act=editsoal&id=$r[id_soal]><i class='fa fa-pencil-square-o'></i></a> | 
        <a href=$aksi?module=soal&act=hapus&id=$r[id_soal]><i class='fa fa-trash'></i></a></td>
        <td> <a href='#' onclick=\"bukajendela('zoom.php?id=$r[id_soal]')\"><i class='fa fa-eye'></i></a></td>";
        if ($r[aktif]=="Y") {
          echo"<td><input type=button class='btn btn-default' value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=soal&act=nonaktif&id=$r[id_soal]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=soal&act=aktif&id=$r[id_soal]';\"></td>";
        }
        
        echo"   </td>
    </tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Soal
  case "tambahsoal":
    echo "<h2>Tambah Soal</h2>
          <form method=POST class='form-horizontal' action='$aksi?module=soal&act=input' enctype='multipart/form-data'>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pertanyaan</label>
                          <div class='col-sm-10'>
                            <textarea name='soal' style='width: 500px; height: 100px;'></textarea>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban A</label>
                          <div class='col-sm-4'>
                            <input type=text name='a' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban B</label>
                          <div class='col-sm-4'>
                            <input type=text name='b' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban C</label>
                          <div class='col-sm-4'>
                            <input type=text name='c' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban D</label>
                          <div class='col-sm-4'>
                            <input type=text name='d' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kunci Jawaban</label>
                          <div class='col-sm-4'>
                            <select name='knc_jawaban' class='form-control'>
                            <option value='a'>A</option>
                            <option value='b'>B</option>
                            <option value='c'>C</option>
                            <option value='d'>D</option>
                            </select>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-4'>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </div>
                        </div>
                  </form>";
     break;
  
  // Form Edit Soal  
  case "editsoal":
    $edit=mysql_query("SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Soal</h2>
          <form method=POST action=$aksi?module=soal&act=update class='form-horizontal' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_soal]'>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Pertanyaan</label>
                          <div class='col-sm-10'>
                            <textarea name='soal' style='width: 500px; height: 100px;'>$r[soal]</textarea>
                          </div>
                        </div>";
                        if ($r[gambar]!=''){

                        echo "
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-10'>
                            <img src='../foto/$r[gambar]'>
                          </div>
                        </div>

                        ";  
                        }

                        echo"
                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Gambar</label>
                          <div class='col-sm-10'>
                            <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px
                          </div>
                        </div>


                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban A</label>
                          <div class='col-sm-4'>
                            <input type=text name='a' class='form-control' value='$r[a]' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban B</label>
                          <div class='col-sm-4'>
                            <input type=text name='b' value='$r[b]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban C</label>
                          <div class='col-sm-4'>
                            <input type=text name='c' value='$r[c]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Jawaban D</label>
                          <div class='col-sm-4'>
                            <input type=text name='d' value='$r[d]' class='form-control' size=80 required/>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'>Kunci Jawaban</label>
                          <div class='col-sm-4'>
                            <select name='knc_jawaban' id='knc_jawaban' class='form-control'>
                            <option value='a'>A</option>
                            <option value='b'>B</option>
                            <option value='c'>C</option>
                            <option value='d'>D</option>
                            </select>
                          </div>
                        </div>

                        <div class='form-group'>
                          <label for='inputEmail3' class='col-sm-2 control-label'></label>
                          <div class='col-sm-4'>
                        <input type=submit name=submit value=Simpan class='btn btn-primary'>
                        <input type=button value=Batal onclick=self.history.back() class='btn btn-danger'>
                        </div>
                        </div>

        </form>";
    break;  
  
  case "viewsoal":
    $view=mysql_query("SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
    $t=mysql_fetch_array($view);
    echo "<h2>Soal :</h2>
    $t[soal]</br>";
          if ($t[gambar]!=''){
              echo "<img src='../foto/$t[gambar]'>";  
          }
    echo"<h2>Jawaban :</h2>
    a. $t[a] </br>
    b. $t[b] </br>
    c. $t[c] </br>
    d. $t[d] </br>";
  break;
  
  case "carisoal":
       echo"<h2>Berikut adalah  Hasil Pencarian Yang ditemukan</h2>
     <table class='table table-striped table-bordered table-hover'>
          <tr><th>no</th><th>Pertanyaan</th><th>Status</th><th>aksi</th><th>Status</th><th>View</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tbl_soal WHERE soal LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[soal]</td>
       <td align='center'>$r[aktif]</td>
             <td>
        <a href=?module=soal&act=editsoal&id=$r[id_soal]><i class='fa fa-pencil-square-o'></i></a>|
        <a href=$aksi?module=soal&act=hapus&id=$r[id_soal]><i class='fa fa-trash'></i></a></td>";
        if ($r[aktif]=="Y") {
          echo"<td><input class='btn btn-default' type=button value='Non Aktifkan' onclick=\"window.location.href='$aksi?module=soal&act=nonaktif&id=$r[id_soal]';\"></td>";

        }else {
          echo"<td align='center'><input class='btn btn-success' type=button value='Aktifkan' onclick=\"window.location.href='$aksi?module=soal&act=aktif&id=$r[id_soal]';\"></td>";
        }
        
        echo"   </td>
    <td><a href=?module=soal&act=viewsoal&id=$r[id_soal]><i class='fa fa-eye'></i></a></a></td>

    </tr>";
      $no++;
    }
    echo "</table>";
    break;

  
  }
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


<script type="text/javascript">
  var $ = jQuery;
  $('#knc_jawaban').val('<?php echo $r['knc_jawaban'];?>');
</script> 