<?php
  include "../config/koneksi.php";
		$view=mysql_query("SELECT * FROM tbl_soal WHERE id_soal='$_GET[id]'");
		$t=mysql_fetch_array($view);
		echo "<h2>Soal :</h2>
		$t[soal]</br>";
          if ($t['gambar']!=''){
              echo "<img src='../foto/$t[gambar]'>";  
          }
		echo"<h2>Jawaban :</h2>
		a. $t[a] </br>
		b. $t[b] </br>
		c. $t[c] </br>
		d. $t[d] </br>";
		echo "<h2>Kunci Jawaban Soal : $t[knc_jawaban]</h2>";

?>
