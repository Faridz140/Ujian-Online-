

        <!-- Page Content -->
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
                           Peraturan
                        </div>
                        <div class="panel-body">
                          
<?php
$result=mysql_query("select * from tbl_soal WHERE aktif='Y'");
$hitung=mysql_num_rows($result);
		 $qry=mysql_query("SELECT * FROM tbl_pengaturan_ujian");
		 $r=mysql_fetch_array($qry);
 		 
		echo "
		<h3 align='center'>$r[nama_ujian]</h3><br/>
		Waktu Pengerjaan : $r[waktu] menit<br/>
		Jumlah Soal : $hitung<br/>
		<p/>
		<h2>PERATURAN</h2><br/>
		$r[peraturan]<br/>
		";
?>
<script>
 function cekForm() {
	if (!document.fValidate.agree.checked) {
				alert("Anda belum menyetujui!");
				return false;
			} else {
				location.href="?hal=soal";
			}
		}
</script>
<form name="fValidate">
<input type="checkbox" name="agree" id="agree" value="1"> Saya Mengerti dan Siap Untuk Mengikuti Tes<br/><br/>
          <div style='text-align:center;'><input type="button" name="button-ok" class="btn btn-primary" value="MULAI TES" onclick="cekForm()"></div>
</form>

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
               


