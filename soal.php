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
                           Soal
                        </div>
                        <div class="panel-body">

<?php
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
//Lakukan Pengecekan Apakah Sudah Pernah Mengerjakan Soal atau belum
		$cek=mysql_num_rows(mysql_query("SELECT id_user FROM tbl_nilai WHERE id_user='$_SESSION[iduser]'"));
		if ($cek > 0) {
			      $tampil = mysql_query("SELECT * FROM tbl_nilai WHERE id_user='$_SESSION[iduser]'");
					$t=mysql_fetch_array($tampil);
					$username=  ucwords($_SESSION['username']);;

		echo "<h3 style='border:0';><u>$username</u> Sudah Mengerjakan Tes</h3>";
		 echo "<br><br><br><div align='center'>
		 <table><tr><th colspan=3>Hasil Tes Anda</th></tr>
		 <tr><td>Jumlah Jawaban Benar</td><td> : $t[benar]</td>";
		 $qry=mysql_query("SELECT nilai_min FROM tbl_pengaturan_ujian");
		 $hasil=mysql_fetch_array($qry);
		 $cek= $hasil['nilai_min'];
		 if ($t[score] >= $cek) {
		 	echo "<td rowspan='4'><h1>Lulus</h1></td></tr>";
		 }else {
		 	echo "<td rowspan='4'><h1>Gagal</h1></td></tr>";
		 }
	  echo "
		 <tr><td>Jumlah Jawaban Salah</td><td> : $t[salah]</td></tr>
		 <tr><td>Jumlah Jawaban Kosong</td><td>: $t[kosong]</td></tr>
		 <tr><td><b>Nilai anda            </td><td>: $t[score]</b></td></tr></table></div>";

		}
		else {
	//echo '<table><tr><th>Waktu Anda</th></tr>
		//  <tr><td align=center><span style="font-size:18px"><span id="menit"></span>:<span id="detik"></span></span> </td></tr></table>';
echo "<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>";
 echo '<table width="100%" border="0">';

		include "config/koneksi.php";
		$hasil=mysql_query("select * from tbl_soal WHERE aktif='Y' ORDER BY RAND ()");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["id_soal"];
			$pertanyaan=$row["soal"];
			$pilihan_a=$row["a"];
			$pilihan_b=$row["b"];
			$pilihan_c=$row["c"];
			$pilihan_d=$row["d"]; 
			
			?>
			<form name="form1" method="post" action="?hal=jawaban">
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<tr>
			  	<td width="17"><font color="#000000"><?php echo $urut=$urut+1; ?></font></td>
			  	<td width="430"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
			</tr>
			<?php
				if (!empty($row["gambar"])) {
					echo "<tr><td></td><td><img src='foto/$row[gambar]' width='200' hight='200'></td></tr>";
				}
			?>
			<tr>
			  	<td height="21"><font color="#000000">&nbsp;</font></td>
		  	  <td><font color="#000000">
	  	     A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
	  	      <?php echo "$pilihan_a";?></font> </td>
			</tr>
			<tr>
			  	<td><font color="#000000">&nbsp;</font></td>
		  	  <td><font color="#000000">
	  	     B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
	  	      <?php echo "$pilihan_b";?></font> </td>
			</tr>
			<tr>
			  	<td><font color="#000000">&nbsp;</font></td>
		  	  <td><font color="#000000">
	  	    C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
	  	      <?php echo "$pilihan_c";?></font> </td>
			</tr>
			<tr>
				<td><font color="#000000">&nbsp;</font></td>
		  	  <td><font color="#000000">
	  	    D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
	  	      <?php echo "$pilihan_d";?></font> </td>
            </tr>
			
		<?php
		}
		?>
        	<tr>
				<td>&nbsp;</td>
			  	<td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
			</table>
</form>
        </p>
</div>
	 <?php
		 $qry=mysql_query("SELECT * FROM tbl_pengaturan_ujian");
		 $r=mysql_fetch_array($qry);
	 ?>
<script> 
	<!-- 
	// 
	 var detik=20;
	 var menit=57;
	 //document.counter.d2.value='30' 
	
	function display()
	{ 
		if (menit==0&&detik==0) {
			alert('Waktu habis, klik OK untuk melihat hasil ujian anda.');
			location.href="?hal=hasil_ujian";
		}
	
	 if (detik<=0){ 
		detik=60;
		menit-=1;
	 } 
	 if (menit<=-1){ 
		detik=0;
		menit+=1;
	 } 
	 else 
		detik-=1 
		
		detik="" + detik
		menit="" + menit
		var pad = "00"
		document.getElementById("menit").innerHTML=pad.substring(0, pad.length - menit.length) + menit;
		document.getElementById("detik").innerHTML=pad.substring(0, pad.length - detik.length) + detik;
		//document.counter.d2.value=menit;
		//document.counter.d3.value=detik;
		setTimeout("display()",1000) 
	} 
	display() 
	--> 
	</script><?php } } ?>

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
               
