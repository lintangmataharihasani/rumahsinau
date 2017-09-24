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
        // COLLAPSIBLE
        $('.collapsible').collapsible();
        //SIDENAV
        $(".button-collapse").sideNav();
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
        <br><br>
        <h3 class="header center teal-text text-lighten-4" style="margin-top:12%;">FAQ</h3>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section"><br>
      <h5>Tentang Rumah Sinau</h5>
      <p>Sebuah tempat dimana kamu bisa menemukan kegiatan belajar yang kamu butuhkan dari mitra – mitra kami yang terpercaya dan berpengalaman. Apakah itu kursus, bimbel, workshop atau seminar.</p><br><br>
      <p>
      
      <strong>Jadikan komunitas kita, makin berdaya</strong><br>

      Bekerjasama dengan komunitas lokal, baik itu individu, paguyuban, maupun instansi, Rumah Sinau ingin menghadirkan kegiatan belajar yang dibutuhkan masyarakat untuk menjadi lebih produktif dan berdaya. <br><br>

      <strong>Aktif mendukung pendidikan</strong><br>

      Dengan pendekatan komunitas dan silaturahmi, Rumah Sinau bekerjasama dengan masyarakat meningkatkan kualitas pendidikan.<br><br>

      <strong>Apa tujuan kami ?</strong><br>

      Kami ingin membantu masyarakat lebih mudah menemukan kegiatan belajar yang mereka butuhkan dari para penyelenggara yang terpercaya dan berpengalaman di bidangnya.<br>

      Untuk para mitra, kami membantu mereka menampilkan kegiatan mereka di internet dan memasarkannya ke target pasar yang tepat dengan biaya yang terjangkau<br><br>

      </p>
    </div>
  </div>

  <?php include "footer.php";?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
