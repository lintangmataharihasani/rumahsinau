<?php 
  include "connect-db.php";
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
    <script type="text/javascript" src="src/js/jquery-3.1.0.min.js"></script>
    <script src="src/libs/materialize/js/materialize.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('select').material_select();

        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15, // Creates a dropdown of 15 years to control year
          format: 'dd/mm/yyyy'
        });

        // MODAL
        $('.modal').modal();
        // DROPDOWNS
        $(".dropdown-button").dropdown(
          {
            belowOrigin: true
          }
        );
        // TABS
        $('ul.tabs').tabs();
        // SCROLLSPY
        $('.scrollspy').scrollSpy();
        //SIDENAV
        $(".button-collapse").sideNav();
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
        <br><br>
        <h3 class="header center white-text text-lighten-4" style="margin-top:12%; text-shadow: 1px 1px;">Di Mana Saja. Berkumpul. Belajar</h3>
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
        <div class="row center">
         <a class="waves-effect waves-light btn-large orange darken-3" href="kursus.php"><i class="material-icons left">search</i>CARI KURSUS</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <h4 class="header center cyan-text text-darken-2">Bagaimana Caranya?</h4>
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">search</i></h2>
            <h5 class="center">1. Pilih atau Request Kursus</h5>

            <p class="light">Di Rumah Sinau kamu bisa memilih atau request kursus yang kamu inginkan</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">message</i></h2>
            <h5 class="center">2. Menerima Konfirmasi Email</h5>

            <p class="light">Kami akan mengirimkan konfirmasi email berisi jadwal dan biaya kursus</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">monetization_on</i></h2>
            <h5 class="center">3. Pembayaran dan Mulai Kursus</h5>

            <p class="light">Bayar biaya, dan les/kursus bisa dimulai sesuai jadwal</p>
          </div>
        </div>

      </div>
      <div class="center">
        <a class="waves-effect waves-light btn orange darken-3" href="kursus.php"><i class="material-icons left"></i>Daftar Sekarang</a>
      </div><br>
    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Temukan berbagai kursus yang kamu butuhkan. bimbel, bahasa, hingga berbagai hobi dan keterampilan</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">
      <h4 class="header center cyan-text text-darken-2">Les/Kursus Pilihan</h4>
      <?php
        
        echo "<div class='row'>";

        $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 1;");
        $premium = "<a class='btn-floating halfway-fab orange'><i class='material-icons'>stars</i></a>";

        while ($line = mysqli_fetch_array($result)) {

          $jenis = $line[2];
          if ($jenis == "Aksesoris" || $jenis == "Menjahit" || $jenis == "Melukis") {
            $img = "asset/img/aksesoris-1.jpg";
          } elseif ($jenis == "Decoupage" || $jenis == "Kerajinan Tangan" || $jenis == "Batik") {
            $img = "asset/img/aksesoris-2.jpg";
          } elseif ($jenis == "Bhs. Jerman" || $jenis == "Bhs. Arab" || $jenis == "Bhs. Jepang") {
            $img = "asset/img/deutsch-1.jpg";
          } elseif ($jenis == "Profesional" || $jenis == "Perkantoran" || $jenis == "Perhotelan"  ) {
            $img = "asset/img/profesinal-1.jpg";
          } elseif ($jenis == "SD" || $jenis == "SMP" || $jenis == "SMA" || $jenis == "IPA SMA" || $jenis == "IPS SMA" || $jenis == "SBMPTN") {
            $img = "asset/img/sahabat-mulya.jpg";
          } else {
            $img = "asset/img/bimbel-1.jpg";
          }

          $premium = "";
          if ($line[13] == 1) {
            $premium = "<a class='btn-floating halfway-fab orange'><i class='material-icons'>stars</i></a>";
          }

          echo "<div class='col s12 m6 l3'>
                <div class='card' style='height: 440px'>
                    <div class='card-image'>
                      <img src='" . $img . "'>
                      <span class='card-title'></span>
                          " . $premium . "
                      </div>
                    <div class='card-content center'>
                      <div style='margin-bottom: 12px'>
                        <h7><strong>" . $line[1] . "</strong></h7>  
                        <p style='font-size: 12px'>" . $line[10] . "</p>
                      </div>
                      <div style='margin-bottom: 12px'>
                        <div class='chip'>
                          <p class='text-light'>" . $line[2] . "</p>
                        </div>
                        <p class='cyan-text text-darken-2'><strong> Rp " . $line[6] . "/Sesi</strong></p>
                      </div>
                      <div class='center'>
                          <form action='detail-kursus.php?nama_kursus='" . $line[1]. "' method='post'>
                                <input type='hidden' name='nama_kursus' value='" . $line[1] . "'>
                                <input type='submit' class='btn waves-effect waves-light center cyan darken-3' name='submit' value='Daftar'>
                          </form>
                      </div>
                    </div>
                  </div>
              </div> <!-- End of Col -->";
        }
        echo "</div>";
      ?>
    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Rumah Sinau membantu mu menemukan kegiatan belajar yang kamu butuhkan</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">
      <h4 class="header center cyan-text text-darken-2">Ingin Menjadi Mitra Kami?</h4>
      <p class="light"> Rumah Sinau membantu mempromosikan kursus, seminar, dan workshop Anda atau lembaga yang Anda wakili secara gratis. Dapatkan juga dukungan pemasaran efektif jika Anda bergabung menjadi mitra premium</p>
      <div class="center">
        <a class="waves-effect waves-light btn orange darken-3" href="daftar-mitra.php"><i class="material-icons left"></i>Daftar</a>
      </div><br>
    </div>
  </div>

  <?php include "footer.php";?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
