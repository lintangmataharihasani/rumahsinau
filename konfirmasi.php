<?php

  include 'connect-db.php';
  $id = $_POST["id"];
  $jumlah_peserta = $_POST["jumlah_peserta"];
  

  $result = mysqli_query($connection, "SELECT * FROM kursus WHERE id='". $id . "';");
  $line = mysqli_fetch_array($result);
  $harga = $line[6];
   $header = $line[7];
    $jenis = $line[2];
    $nama = $line[1];

    if ($header == "") {
      if ($jenis == "Aksesoris" || $jenis == "Menjahit" || $jenis == "Melukis") {
            $header = "asset/img/aksesoris-1.jpg";
      } elseif ($jenis == "Decoupage" || $jenis == "Kerajinan Tangan" || $jenis == "Batik") {
            $header = "asset/img/aksesoris-2.jpg";
      } elseif ($jenis == "Bhs. Jerman" || $jenis == "Bhs. Arab" || $jenis == "Bhs. Jepang") {
            $header = "asset/img/deutsch-1.jpg";
      } elseif ($jenis == "Profesional" || $jenis == "Perkantoran" || $jenis == "Perhotelan"  ) {
            $header = "asset/img/profesinal-1.jpg";
      } elseif ($jenis == "SD" || $jenis == "SMP" || $jenis == "SMA" || $jenis == "IPA SMA" || $jenis == "IPS SMA" || $jenis == "SBMPTN") {
            $header = "asset/img/sahabat-mulya.jpg";
      } else {
            $header = "asset/img/bimbel-1.jpg";
      }
    }

  $nama_pendaftar = $email = $telepon = $alamat = $catatan = "";

  $harga_total = $jumlah_peserta * $harga;


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
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
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
      <div class="container">
        <h3 class="white-text">Konfirmasi Pendaftaran</h3>
      </div>
    </div>
    <?php echo "<div class='parallax'><img src=". $header ." alt='Unsplashed background img 1'></div>"; ?>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s8">
          <h4>Formulir Pendaftaran</h4> 
          <h5><?php echo $line[1]; ?></h5>

          <?php 

            for ($i=0; $i < $jumlah_peserta; $i++) { 
              echo "
                  <blockquote>Data Diri Pendaftar ".($i+1)."</blockquote>
                  <form class='col s12' action='daftar-kursus.php' method='post'>
                    <div class='row'>
                      <div class='input-field col s12'>
                        <input id='nama_peserta_".$i."' name='nama_peserta_".$i."' type='text' class='validate'>
                        <label for='nama_peserta_".$i."'>Nama Pendaftar</label>
                      </div>
                    </div>
                    <div class='row'>
                      <div class='input-field col s12'>
                        <input id='email_peserta_".$i."' name='email_peserta_".$i."' type='email' class='validate'>
                        <label for='email_peserta_".$i."'>Email</label>
                      </div>
                    </div>
                    <div class='row'>
                      <div class='input-field col s12'>
                        <input id='telepon_peserta_".$i."' name='telepon_peserta_".$i."' type='text' class='validate'>
                        <label for='telepon_peserta_".$i."'>Nomor Telepon</label>
                      </div>
                    </div>
                    <div class='row'>
                      <div class='input-field col s12'>
                        <input id='alamat_peserta_".$i."' name='alamat_peserta_".$i."' type='text' class='validate'>
                        <label for='alamat_peserta_".$i."' >Alamat</label>
                      </div>
                    </div>";
            }

          ?>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id='catatan' name='catatan' class='materialize-textarea' placeholder='Tuliskan jadwal sesi yang diikuti atau tambahan request tertentu jika ada'></textarea>
                        <label for='catatan'>Catatan</label>
                    </div>
                    <div class="input-field col s12 center">
                        <?php echo "<input type='hidden' name='jumlah_peserta' value='".$jumlah_peserta."'>"; 
                              echo "<input type='hidden' name='id' value='".$id."'>";
                              echo "<input type='hidden' name='biaya' value='".$harga_total."'>";
                              echo "<input type='hidden' name='nama_kursus' value='".$nama."'>";
                        ?>
                      <blockquote>
                        Mohon transfer sesuai jumlah yang harus dibayarkan ke rekening yang kami cantumkan. Silahkan konfirmasi pembayaran Anda dengan mengirimkan email ke admin@rumahsinau.org atau WA ke nomor 0812-8753-4419. Jika kami tidak menerima pembayaran lebih dari 3 jam, maka pendaftaran Anda kami batalkan.
                      </blockquote><br>
                      <button class="btn waves-effect waves-light" type="submit" name="action">Daftar
                          <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
        </div>
        <div class="col s4 center">
         <h4>Detail</h4>
              <div class="row center">
                <div class=" col s12 orange lighten-2 white-text">
                  <p>Jumlah Pendaftar</p>
                  <h3 class="white-text"><?php echo $jumlah_peserta; ?></h3>
                </div>
              </div>
          <h5>Rincian Biaya</h5>
          <table class="centered responsive-table striped">
            <thead>
              <tr>
                  <th>Item</th>
                  <th>Harga Satuan</th>
                  <th>Pendaftar</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Harga Paket Kursus</td>
                <td>Rp <?php echo $harga; ?></td>
                <td><?php echo $jumlah_peserta; ?> Orang</td>
              </tr>
            </tbody>
          </table>
          <h5>Total Biaya</h5>
          <h3 class="orange-text center text-lighten-2 underline">Rp <?php echo $harga_total; ?></h3>
          <div class="">
          <p>Untuk pembayaran harap transfer ke</p>
           <strong>BNI 0189-712-728</strong><br>
           <strong>Mandiri 00000-3171-4968</strong><br>
           <strong>BCA 5240-3832-43</strong><br>
           <strong>BRI 0341-0107-2771-502</strong><br>
           <p>a.n Abdul Basir</p>
          </div>
        </div>
      </div>
    </div>
  </div>


    <?php include "footer.php";?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
