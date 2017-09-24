<?php 

  include 'connect-db.php';

  $nama_penyelenggara = $email_penyelenggara = $telepon_penyelenggara = $provinsi_penyelenggara = $kota_penyelenggara = $alamat_penyelenggara = ""; //Data penyelenggara 
  $nama_lembaga = $provinsi_lembaga = $kota_lembaga = $alamat_lembaga = $telepon_lembaga = ""; //Data lembaga
  $nama_kursus = $jenis_kursus = $deskripsi_kursus = $jadwal_kursus = $fasilitas = $harga_kursus = $img = $batas_daftar = $kuota = $persyaratan = ""; //Data Kursus

  $response = $responseEmail = $responseTelepon = $responseHarga = $response_header = $id_pemilik = "";

  $valid = true;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_kursus = $_POST["nama_kursus"];
    $jenis_kursus = $_POST["jenis_kursus"];
    if (isset($_POST["deskripsi_kursus"])) {
      $deskripsi_kursus = $_POST["deskripsi_kursus"];
    }
    $jadwal_kursus = "-";
    $fasilitas_kursus = "-"; 
    $harga_kursus = $_POST["harga_kursus"];
    $premium = 0;
    if (isset($_POST["premium"])) {
      $premium = $_POST["premium"];
    }
    $batas_daftar =  $_POST["batas_daftar"];
    $kuota =  $_POST["kuota"];
    $persyaratan =  $_POST["persyaratan"];
    $tgl_mulai =  $_POST["tgl_mulai"];

    $nama_penyelenggara = $_POST["nama_penyelenggara"];
    $email_penyelenggara = $_POST["email_penyelenggara"];
    $telepon_penyelenggara = $_POST["telepon_penyelenggara"]; 
    $provinsi_penyelenggara = $_POST["provinsi_penyelenggara"];
    $kota_penyelenggara = $_POST["kota_penyelenggara"];
    $alamat_penyelenggara = $_POST["alamat_penyelenggara"];

    //Validasi email
    //Reference: http://php.net/manual/en/filter.examples.validation.php
    if (filter_var($email_penyelenggara, FILTER_VALIDATE_EMAIL)) {
      //Email valid
    } else {
      $responseEmail = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Email salah</p></div>
            </div>
          </div>
          ";
      $valid = false;
    }


    if (strlen($email_penyelenggara) == 0) {
      $responseEmail = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap isi email Anda</p></div>
            </div>
          </div>
          ";
      $valid = false;
    }

    //Validasi Telepon
    if (strlen($telepon_penyelenggara) > 16 || !preg_match('/^[0-9]+$/', $telepon_penyelenggara)) {
      $responseTelepon = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>No telpon salah. Harap pastikan isian merupakan digit no telpon Anda</p></div>
            </div>
          </div>
          ";
      $valid = false;
    }

    if (strlen($telepon_penyelenggara) == 0) {
      $responseTelepon = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap isi No telpon Anda</p></div>
            </div>
          </div>
          ";
      $valid = false;
    }

    //Validasi Harga
    if (!preg_match('/^[0-9]+$/', $harga_kursus) ) {
      $responseHarga = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Harga salah. Harap pastikan isian merupakan angka tanpa simbol</p></div>
            </div>
          </div>
          ";
    }

    if (strlen($harga_kursus) == 0) {
      $responseHarga = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap isi harga kursus Anda</p></div>
            </div>
          </div>
          ";
    }

    //Validasi Lainnya
    if(strlen($nama_penyelenggara) == 0 || strlen($nama_kursus) == 0 || strlen($email_penyelenggara) == 0 ||
      strlen($alamat_penyelenggara) == 0 || strlen($jadwal_kursus) == 0 ||
      strlen($jenis_kursus) == 0 || strlen($kota_penyelenggara) == 0 ||
      strlen($provinsi_penyelenggara) == 0 || strlen($nama_penyelenggara) == 0 ){

      $response = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel red lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap lengkapi isian ini</p></div>
            </div>
          </div>
          ";
    }
    $date = date("Y-m-d"); // 2017-08-01

  //Insert data
    $lembaga = 0;
    $verified = 0;
    $inset_penyelenggara_kursus = mysqli_query($connection, "
      INSERT INTO rumahsinau.penyelenggara_kursus (nama, email, telepon, propinsi, kota, alamat) 
      VALUES ('$nama_penyelenggara', '$email_penyelenggara', '$telepon_penyelenggara', '$provinsi_penyelenggara', '$kota_penyelenggara', '$alamat_penyelenggara');
      ");

    $pemilik =  mysqli_query($connection, "SELECT * FROM penyelenggara_kursus WHERE email = '$email_penyelenggara';");
    while ($line = mysqli_fetch_array($pemilik)) {
      $id_pemilik = $line[0];
    }

    $inset_kursus = mysqli_query($connection, "
      INSERT INTO rumahsinau.kursus (nama, jenis, deskripsi, jadwal, fasilitas, harga, id_penyelenggara, tgl_daftar, kota, provinsi, premium, lembaga, verified, batas_daftar, kuota, persyaratan, tgl_mulai)
      VALUES ('$nama_kursus','$jenis_kursus', '$deskripsi_kursus', '$jadwal_kursus', '$fasilitas_kursus', '$harga_kursus', '$id_pemilik', '$date', '$kota_penyelenggara', '$provinsi_penyelenggara', $premium, $lembaga, $verified, '$batas_daftar', $kuota, '$persyaratan', '$tgl_mulai');
      ");

      if ($inset_kursus && $inset_penyelenggara_kursus) {
        $response_header = "
          <div class='offset-m2 l6 offset-l3'>
            <div class='card-panel green lighten-2'>
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Pendaftaran Berhasil</p>
              <blockquote>Kami akan mengirimkan email konfirmasi pendaftaran ke email lembaga Anda. Harap membalas email tersebut untuk mengkonfirmasi pendaftaran lembaga Anda. Setelah konfirmasi berhasil lembaga Anda akan ditampilkan di laman <a href='kursus.php'>kursus</a> Rumah Sinau</blockquote>
              </div>
            </div>
          </div>
          ";


              // Send mail
        //mail($mail_to, $mail_subject, $mail_message, $header);
        //to Admin Rumah Sinau
        $subjectToAdmin = "Pendaftaran Mitra Individu (" . $nama_kursus . ") (" . $nama_penyelenggara . ") (" . $date . ")";
        $messageToAdmin = "Pada " . $date . " mitra individu dengan rincian sebagai berikut:" . "\n" .
                    "Nama Pendaftar/Pemilik :" . $nama_penyelenggara . "\n" .
                    "Nama Kursus :" . $nama_kursus . "\n" .
                    "Provinsi :" . $provinsi_penyelenggara . "\n" .
                    "Kota :" . $kota_penyelenggara . "\n" .
                    "Email :" . $email_penyelenggara . "\n" .
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
              <div class='white-text'><i class='material-icons left'>announcement</i><p>Telah terjadi kesalahan basis data</p></div>
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
        <h3 style="margin-top: 15%;" class="white-text">Form Pendaftaran Individu</h3>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/english-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="">
          <h4>Formulir Pendaftaran Mitra Individu</h4>
          <?php echo $response_header; ?>
            <div class="row">
              <form class="col s12" action="daftar-mitra-individu.php" method="post">
                <h5>Data Kursus</h5>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="nama_kursus" name="nama_kursus" type="text" class="validate">
                    <label for="nama">Nama Kursus</label>
                    <?php echo $response; ?>
                  </div>
                </div>
                <div class="row">
                <div class="input-field col s12">
                  <select id="jenis_kursus" name="jenis_kursus">
                    <optgroup label="Jenis Kursus">
                      <option value="disabled">Silahkan pilih jenis kursus Anda</option>
                    </optgroup>
                    <optgroup label="Bahasa">
                      <option value="Bhs. Inggris">Inggris</option>
                      <option value="Bhs. Arab">Arab</option>
                      <option value="Bhs. Mandarin">Mandarin</option>
                      <option value="Bhs. Jerman">Jerman</option>
                      <option value="Bhs. Jepang">Jepang</option>
                    </optgroup>
                    <optgroup label="Keterampilan">
                      <option value="Melukis">Melukis</option>
                      <option value="Decoupage">Decoupage</option>
                      <option value="Menjahit">Menjahit</option>
                      <option value="Manik-manik">Manik-manik</option>
                      <option value="Ikebana">Ikebana</option>
                      <option value="Aksesoris">Aksesoris</option>
                      <option value="Tata Boga">Tata Boga</option>
                      <option value="Mengemudi">Mengemudi</option>
                      <option value="Kerajinan">Kerajinan Tangan</option>
                    </optgroup>
                    <optgroup label="Teknologi">
                      <option value="Pemrograman">Pemrograman</option>
                      <option value="Desain Grafis">Desain Grafis</option>
                      <option value="Office">Microsoft Office</option>
                    </optgroup>
                    <optgroup label="Bimbingan Belajar">
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="IPA SMA">IPA SMA</option>
                      <option value="IPS SMA">IPS SMA</option>
                      <option value="SMP SMA">SMP dan SMA</option>
                      <option value="SBMPTN">SBMPTN dan Mandiri</option>
                    </optgroup>
                    <optgroup label="Profesional">
                      <option value="Perkantoran">Perkantoran</option>
                      <option value="Perhotelan">Perhotelan</option>
                      <option value="Pariwisata">Pariwisata</option>
                    </optgroup>
                    <optgroup label="Musik">
                      <option value="Piano">Piano</option>
                      <option value="Gitar">Gitar</option>
                      <option value="Biola">Biola</option>
                      <option value="Drum">Drum</option>
                      <option value="Band">Band</option>
                      <option value="Vokal">Vokal</option>
                      <option value="Saxophone">Saxophone</option>
                    </optgroup>
                  </select>
                  <label>Jenis Kursus</label>
                  <?php echo $response; ?>
                </div>
                <div class="input-field col s12">
                    <!--<textarea id="deskripsi_kursus" name="deskripsi_kursus" class="materialize-textarea" placeholder="Tuliskan deskripsi kursus Anda"></textarea>-->
                    <!-- Create the editor container -->
                    <!-- Include stylesheet -->
                    <link href="https://cdn.quilljs.com/1.3.1/quill.snow.css" rel="stylesheet">

                    <!-- Create the editor container -->
                    <p>Deskripsi</p>
                    <div id="catatan">
                      <div id="deskripsi_kursus">
                        <p>Silahkan tuliskan deskripsi kursus disini</p>
                        <p><br></p>
                      </div>

                      <!-- Include the Quill library -->
                      <script src="https://cdn.quilljs.com/1.3.1/quill.js"></script>

                      <!-- Initialize Quill editor -->
                      <script>
                        var quill = new Quill('#deskripsi_kursus', {
                          modules: { toolbar: [
                            ['bold', 'italic', 'underline'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }]
                          ] },
                          theme: 'snow'
                        });

                        var deskripsi = quill.getText();

                        $.ajax({
                            type: "POST",
                            url: 'daftar-mitra-individu.php',
                            data: "deskripsi_kursus=" + deskripsi,
                            success: function(data){}
                        });

                        /*var deskripsi = quill.container.innerHTML;

                        if (window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                        }

                        else{
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }*/

                        var PageToSendTo = "daftar-mitra-individu.php?";
                        var MyVariable = deskripsi;
                        var VariablePlaceholder = "deskripsi_kursus=";
                        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;

                        xmlhttp.open("GET", UrlToSend, false);
                        xmlhttp.send();
                        </script>
                    </div>
                </div>
                <div class="input-field col s12">
                 
                </div>
                <div class="input-field col s12">
                    <textarea id="persyratan" name="persyaratan" class="materialize-textarea" placeholder="Tuliskan persayaratan untuk kursus Anda (Umur/Keahlian/Grade dll.)"></textarea>
                    <label for="catatan">Persyaratan</label>
                </div>
                <div class="input-field col s12">
                    <input class="datepicker" type="text" name="batas_daftar" id="batas_daftar">
                    <label for="batas_daftar">Batas Daftar</label>
                </div>
                <div class="input-field col s12">
                    <input class="datepicker" type="text" name="tgl_mulai" id="tgl_mulai">
                    <label for="tgl_mulai">Tanggal Mulai Kursus</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="kuota" id="kuota">
                    <label for="kuota">Kuota Peserta Kursus</label>
                </div>
                <div class="input-field col s12">
                    </div>
                  </div>
                  <div class="row">
                  <div class="input-field col s12">
                    <input id="harga_kursus" name="harga_kursus" type="number" class="validate">
                    <label for="harga_kursus">Harga Per Sesi/Paket</label>
                    <?php echo $responseHarga; ?>
                  </div>
                </div>
                <div class="row">
                  <div class=" col s12">
                    <blockquote>Dengan medaftar menjadi premium course Anda akan memperoleh berbagai keuntungan seperti marketing support untuk memprommosikan kursus Anda lebih luas sesuai target marketnya</blockquote>
                    <p>
                      <input type="checkbox" id="premium" name="premium" value="TRUE"/>
                      <label for="premium">Premium Course</label>
                    </p>
                  </div>
                </div>
                <h5>Data Diri Pemilik</h5>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="nama_penyelenggara" name="nama_penyelenggara" type="text" class="validate">
                    <label for="nama_penyelenggara">Nama Pemilik</label>
                    <?php echo $response; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input iid="email_penyelenggara" name="email_penyelenggara" type="email" class="validate">
                    <label for="email_penyelenggara">Email Pemilik</label>
                    <?php echo $responseEmail; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="telepon_penyelenggara" name="telepon_penyelenggara" type="text" class="validate">
                    <label for="telepon_penyelenggara">Nomor Telepon Pemilik</label>
                    <?php echo $responseTelepon; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <select id="provinsi_penyelenggara" name="provinsi_penyelenggara">
                      <option value="" disabled selected>Pilih Provinsi</option>
                      <option value="DKI Jakarta">DKI Jakarta</option>
                      <option value="Banten">Banten</option>
                      <option value="Jawa Barat">Jawa Barat</option>
                    </select>
                    <label>Provinsi</label>
                    <?php echo $response; ?>
                  </div>
                  <div class="input-field col s6">
                    <input id="kota_penyelenggara" name="kota_penyelenggara" type="text" class="validate">
                    <label for="kota">Kota</label>
                    <?php echo $response; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="alamat_penyelenggara" name="alamat_penyelenggara" type="text" class="validate">
                    <label for="alamat_penyelenggara">Alamat Pemilik</label>
                    <?php echo $response; ?>
                  </div>
                </div>
                <div class="row">
                  <blockquote>Dengan mendaftar sebagai mitra Rumah Sinau Anda telah sepakat dengan <a href="terms.html">terms and conditions</a> yang berlaku</blockquote>
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Daftar
                      <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              </form>
            </div>   
          </div>
        </div>
      </div>
    </div>

<?php include "footer.php"; ?>

  </body>
</html>