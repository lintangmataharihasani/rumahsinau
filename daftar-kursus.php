<?php
	include 'connect-db.php';

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$tgl_daftar = date('Y-m-d');
		$jumlah_peserta = $_POST["jumlah_peserta"];
		$id = $_POST["id"];
		$biaya = $_POST["biaya"];
		$email_utama = $_POST["email_peserta_0"];
		$catatan = $_POST["catatan"];

		$insert_pendaftaran = mysqli_query($connection, "INSERT INTO pendaftaran (tgl_daftar, id_kursus, biaya, jumlah_peserta, email_konfirmasi) VALUES ('$tgl_daftar', '$id', '$biaya', '$jumlah_peserta', '$email_utama')");

		for ($i=0; $i < $jumlah_peserta; $i++) { 
			$nama_peserta = $_POST["nama_peserta_".$i];
		    $email_peserta = $_POST["email_peserta_".$i];
		    $telepon_peserta = $_POST["telepon_peserta_".$i];
		    $alamat_peserta = $_POST["alamat_peserta_".$i];	
		    if (isset($_POST["catatan".$i])) {
	    		$catatan = $_POST["catatan_".$i]; 
	    	}

	    	$insert_peserta = mysqli_query($connection, "INSERT INTO peserta_kursus (nama, email, telepon, alamat) VALUES ('$nama_peserta', '$email_peserta', '$telepon_peserta', '$alamat_peserta');");

	    	$result = mysqli_query($connection, "SELECT * FROM peserta_kursus WHERE nama='$nama_peserta' AND email='$email_peserta';");
    		$line = mysqli_fetch_array($result);
    		$id_peserta = $line[0];

    		$result2 = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE id_kursus='$id' AND email_konfirmasi='$email_utama';");
    		$line2 = mysqli_fetch_array($result2);
    		$id_pendaftaran = $line2[0];

        $result3 = mysqli_query($connection, "SELECT * FROM kursus WHERE id='$id';");
        $line3 = mysqli_fetch_array($result3);
        $kuota = $line3[16];
        $kuotaBaru = $kuota - $jumlah_peserta;

        $updateKuota = mysqli_query($connection, "UPDATE kursus SET kuota=$kuotaBaru WHERE id='$id'");

	    	$insert_pendaftaran_peserta = mysqli_query($connection, "INSERT INTO pendaftaran_peserta (id_peserta, id_pendaftaran, catatan) VALUES ('$id_peserta', '$id_pendaftaran', '$catatan');");
		}

		if ($insert_peserta && $insert_pendaftaran_peserta && $insert_pendaftaran && $updateKuota) {
			$response_header = "
	          <div class='offset-m2 l6 offset-l3'>
	            <div class='card-panel green lighten-2'>
	              <div class='white-text'><i class='material-icons left'>announcement</i><p>Pendaftaran Berhasil</p>
	            </div>
	          </div>
	          ";

      // Send mail
        //mail($mail_to, $mail_subject, $mail_message, $header);
        //to Admin Rumah Sinau
        $subjectToAdmin = "Pendaftaran Kursus (" . $id . ") (" . $nama_peserta_0 . ") (" . $date . ")";
        $messageToAdmin = "Pada " . $date . " ada pendaftaran kursus dengan rincian sebagai berikut:" . "\n" .
                    "Nama Pendaftar Utama :" . $nama_peserta_0 . "\n" .
                    "Id Kursus :" . $id . "\n" .
                    "Total Biaya :" . $biaya . "\n" .
                    "Catatan :" . $catatan . "\n" .
                    "Email :" . $email_utama . "\n" .
                    "Admin harap segera mengecek pendaftaran diatas pada laman dashboard untuk dilakukan verifikasi.
                    Info lebih lanjut dan bantuan harap hubungi Lintang (CIO/IT Support) di sternundsonne@gmail.com/lintang@rumahsinau.com";

        $encoding = "utf-8";

        // Preferences for Subject field
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        // Mail header
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: Rumah Sinau <admin@rumahsinau.org> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $subjectToAdmin, $subject_preferences);

        //mail("admin@rumahsinau.com", $subjectToAdmin, $messageToAdmin, $header);
        mail("test.rumahsinau@gmail.com", $subjectToAdmin, $messageToAdmin, $header);

        //to Mitra Lembaga Rumah Sinau
        $subjectToLembaga = "Terima Kasih Telah Mendaftar di Rumah Sinau";
        $messageToLembaga = "Terima kasih sudah mendaftar di Rumah Sinau. Pendaftaran Anda akan segera kami proses. Info lebih lanjut harap hubungi
        info@rumahsinau.com";

        $encoding = "utf-8";

        // Preferences for Subject field
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        // Mail header
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: Rumah Sinau <admin@rumahsinau.org> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $subjectToLembaga, $subject_preferences);

        mail("test.rumahsinau@gmail.com", $subjectToLembaga, $messageToLembaga, $header);
		} else {
			$response_header = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Maaf pendaftaran belum bisa diproses</p>
              </div>
            </div>
          </div>
          ";
		}
		

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Di Mana Saja. Berkumpul, Belajar</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!--JS-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();

      $('#textarea1').trigger('autoresize');

      $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
      });

      $('select').material_select();
        
    });
  </script>
</head>

<body>
<?php include 'chatbox.php'; ?>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

  <?php include "navbar-default.php";?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container center">
        <h3 style="margin-top: 15%;" class="white-text">Pendaftaran Berhasil</h3>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/english-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
    <?php
    	echo $response_header;
    ?>
    <h4>Detail Pendaftaran</h4>
    <div class="row">
      <div class="col s12">
        <div class="card-panel">
          <span class="container">
          <?php
          	echo "<div class='row center'>
          			<div class='col s12 m4 l4'>
          				<p>Jumlah Peserta</p>
          				<h4><strong>".$jumlah_peserta."</strong></h4>
          			</div>
          			<div class='col s12 m4 l4'>
          				<p>Total Biaya</p>
          				<h4><strong>".$biaya."</strong></h4>
          			</div>
          			<div class='col s12 m4 l4'>
          				<p>Id Pendaftaran</p>
          				<h4><strong>".$id_pendaftaran."</strong></h4>
          			</div>
          		</div>
          		<div class='row'>
          			<table class='centered responsive-table striped'>
          				<thead>
          					<th>Nama</th>
          					<th>No. Telepon</th>
          					<th>Email</th>
          				</thead>
          				<tbody>";

         if ($_SERVER["REQUEST_METHOD"]=="POST") {
         	for ($x=0; $x < $jumlah_peserta; $x++) { 
         		$nama_peserta = $_POST["nama_peserta_".$x];
		    	$email_peserta = $_POST["email_peserta_".$x];
		    	$telepon_peserta = $_POST["telepon_peserta_".$x];
          		echo        "<tr>
          						<td>".$nama_peserta."</td>
          						<td>".$email_peserta."</td>
          						<td>".$telepon_peserta."</td>
          					</tr>";
          	}		
          		echo	"</tbody>
          			</table>
          		</div>";
         }
          	
          ?>
          <div class="center">
            <p>Untuk pembayaran harap transfer ke</p>
           <strong>BNI 0189-712-728</strong><br>
           <strong>Mandiri 00000-3171-4968</strong><br>
           <strong>BCA 5240-3832-43</strong><br>
           <strong>BRI 0341-0107-2771-502</strong><br>
           <p>a.n Abdul Basir</p>
          </div>
          
          <blockquote>
            Mohon transfer sesuai jumlah yang harus dibayarkan ke rekening yang kami cantumkan. Silahkan konfirmasi pembayaran Anda dengan mengirimkan email ke admin@rumahsinau.org atau WA ke nomor 0812-8753-4419. Jika kami tidak menerima pembayaran lebih dari 3 jam, maka pendaftaran Anda kami batalkan.
          </blockquote>
          </span>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
   </div>
</body>

  <?php include "footer.php";?>
  
</html>