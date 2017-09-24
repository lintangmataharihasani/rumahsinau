<?php

    $nama_kursus = $harga = $deskripsi = $fasilitas = $jadwal = "";

    include 'connect-db.php';

    $nama_kursus = $_POST["nama_kursus"];
    $result = mysqli_query($connection, "SELECT * FROM kursus WHERE nama='$nama_kursus';");
    $line = mysqli_fetch_array($result);
    $id = $line[0];
    $harga = $line[6];
    $deskripsi = $line[3];
    $fasilitas = $line[5];
    $jadwal = $line[4];
    $header = $line[7];
    $jenis = $line[2];
    $batas_daftar = $line[15];
    $kuota = $line[16];
    $persyaratan = $line[17];
    $tgl_mulai = $line[18];

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
<div id="fb-root"></div>
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
        <div class="row">
          <div class="col s8">
            <h2 class="header white-text text-lighten-4" style="margin-top:32%;"><?php echo $nama_kursus; ?></h2>
          </div>
          <div class="col s4">
            <blockquote><h4 class="white-text" style="margin-top:80%;"><strong>Rp. <?php echo $harga; ?>/Sesi</strong></h4></blockquote>
            <div class='row' style='padding-top: 5px; padding-bottom: 5px;'>
                    <p class='white-text text-white'><strong>Tanggal Mulai</strong></p>
                    <h5 class='white-text text-white'><?php echo $tgl_mulai; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo "<div class='parallax'><img src=" . $header . " alt='Unsplashed background img 1'></div>"; ?>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s8">
          <h4>Deskripsi</h4>
          <p><?php echo $deskripsi; ?></p>

          <?php
            if ($persyaratan != "") {
              echo "<h5>Persyaratan Peserta</h5><p>".$persyaratan."</p>";
            }
          ?>
          
          <h4>Fasilitas</h4>
          <div class="row center">
            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center teal-text"><i class="material-icons">search</i></h2>
                <p class="light">Full AC</p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center teal-text"><i class="material-icons">message</i></h2>
                <p class="light">Papan Tulis</p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center teal-text"><i class="material-icons">monetization_on</i></h2>
                <p class="light">Meja dan Bangku</p>
              </div>
            </div>
          </div>

          <!--
          <h4>Jadwal Kelas</h4>
          <h7><blockquote>Setiap hari Senin - Sabtu kecuali libur nasional</blockquote></h7>
          <table class="centered responsive-table striped">
            <thead>
              <tr>
                  <th>Sesi</th>
                  <th>Jam</th>
              </tr>
            </thead>

            <?php
              $token = strtok($jadwal, " ");
              while ($token !== false) {
                echo "<tr>";
                if ($token == "I") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>09.00 - 10.30</td>";
                }
                if ($token == "II") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>10.30 - 12.00</td>";
                }
                if ($token == "III") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>12.00 - 13.30</td>";
                }
                if ($token == "IV") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>13.30 - 15.00</td>";
                }
                if ($token == "V") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>15.00 - 16.30</td>";
                }
                if ($token == "VI") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>16.30 - 18.00</td>";
                }
                if ($token == "VII") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>18.00 - 19.30</td>";
                }
                if ($token == "VIII") {
                  echo "<td>" . $token . "</td>";
                  echo "<td>19.30 - 21.00</td>";
                }
                echo "<tr>";
                $token = strtok(" ");
              }
            ?>
          </table>-->

        </div>
        <div class="col s4">

        <h4>Daftar</h4><br>
          <?php 
          $hariIni = date('yyyy-mm-dd');

          if (($kuota > 0) && ($hariIni < $batas_daftar)) {
            echo "

                  <div class='row'>
                    <div class='col s12 m4 l6'>
                    <strong>Sisa Kuota</strong>
                    <h5>".$kuota."</h5>
                    </div>
                    <div class='col s12 m4 l6'>
                    <strong>Batas Pendaftaran<strong>
                    <h5>".$batas_daftar."</h5>
                    </div>
            </div>";
            echo "<blockquote>Pendaftaran akan ditutup ketika kuota habis atau tanggal batas pendaftaran sudah lewat</blockquote>";
            echo "<form action='konfirmasi.php?id='" . $line[0]. "' method='post'>
                        <input type='hidden' name='id' value='" . $line[0] . "'>
                        <div class='row'>
                            <div class='input-field col s12 m4 l10'>
                                <input type='number' name='jumlah_peserta' id='jumlah_peserta'>
                                <label for='jumlah_peserta'>Jumlah Peserta</label>
                            </div>
                            <div class='input-field col s12 m4 l2'>
                                <input type='submit' class='btn waves-effect waves-light center cyan darken-3' name='submit' value='Daftar'>
                            </div>
                        </div>
                      </form>"; 
          } else {
            echo "<blockquote>Maaf pendaftaran sudah ditutup</blockquote>";
          }

          ?>
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
