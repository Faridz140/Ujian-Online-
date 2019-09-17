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
 include "config/koneksi.php";
 include "config/library.php";

       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				/*RUMUS
				Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
				hasil= 100 / jumlah soal * jawaban yang benar
				*/
				
				$result=mysql_query("select * from tbl_soal WHERE aktif='Y'");
				$jumlah_soal=mysql_num_rows($result);
				$score = 100/$jumlah_soal*$benar;
				$hasil = number_format($score,1);
			}
		}
		//Lakukan Pengecekan  Data  dalam Database
	   $cek=mysql_num_rows(mysql_query("SELECT id_user FROM tbl_nilai WHERE id_user='$_SESSION[iduser]'"));
		if ($cek < 1) {
		//Pemberian kondisi lulus/ tidak lulus
		 $qry2=mysql_query("SELECT nilai_min FROM tbl_pengaturan_ujian");
		 $q2=mysql_fetch_array($qry2);
		 $ceknilai= $q2['nilai_min'];
		 if ($hasil >= $ceknilai) {
		//Lakukan Penyimpanan Kedalam Database
				$iduser= ucwords($_SESSION['iduser']);
				mysql_query("INSERT INTO tbl_nilai (id_user,benar,salah,kosong,score,tanggal,keterangan) Values ('$iduser','$benar','$salah','$kosong','$hasil','$tgl_sekarang','Lulus')");
		}else {
		//Lakukan Penyimpanan Kedalam Database
				$iduser= ucwords($_SESSION['iduser']);
				mysql_query("INSERT INTO tbl_nilai (id_user,benar,salah,kosong,score,tanggal,keterangan) Values ('$iduser','$benar','$salah','$kosong','$hasil','$tgl_sekarang','Tidak Lulus')");
		}
	}
		
		//Menampilkan Hasil Ujian Kompetensi
		$username=  ucwords($_SESSION['username']);
		echo "<h3 style='border:0';>Selamat <u>$username</u> Sudah Selesai Dalam Mengerjakan Tes</h3>";
		 echo "<br><br><br><div align='center'>
		 <table><tr><th colspan=3>Hasil Tes Anda</th></tr>
		  <tr><td><b>Nilai anda            </td><td>: $hasil</b></td>";
		 $qry=mysql_query("SELECT nilai_min FROM tbl_pengaturan_ujian");
		 $q=mysql_fetch_array($qry);
		 $cek= $q['nilai_min'];
		 if ($hasil >= $cek) {
		 	echo "<td rowspan='4'><h1>Lulus</h1></td></tr>";
		 }else {
		 	echo "<td rowspan='4'><h1>Tidak Lulus</h1></td></tr>";
		 }
	  echo "
		 <tr><td>Jumlah Jawaban Benar</td><td> : $benar </td></tr>
		 <tr><td>Jumlah Jawaban Salah</td><td> : $salah</td></tr>
		 <tr><td>Jumlah Jawaban Kosong</td><td>: $kosong</td></tr>
		</table></div>";
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