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
      <div class="container center">
        <h3 style="margin-top: 15%;" class="white-text">Pendaftaran Mitra</h3>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/english-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section center"><br>
      <h4 class="cyan-text text-darken-2">Mari memperluas akses pendidikan informal di Indonesia bersama Rumah Sinau</h4><br>

      <blockquote>Untuk mendaftar sebagai mitra harap klik salah satu link dibawah ini. Jika Anda ingin mendaftar sebagai lembaga/LKP silahkan klik Pendaftaran Lembaga. Jika Anda ingin mendaftar sebagai individu silahkan klik Pendaftaran Individu.</blockquote><br>
      <div class="row center">
        <div class="col s12 m4 l6"><a class="btn waves-effect waves-light blue" href="daftar-mitra-lembaga.php">Pendaftaran Lembaga</a></div>
        <div class="col s12 m4 l6"><a class="btn waves-effect waves-light cyan" href="daftar-mitra-individu.php">Pendaftaran Individu</a></div>
      </div><br><br>

      <p>Dapatkan berbagai keuntungan dengan mendaftar menjadi mitra Rumah Sinau. Tersedia juga pilihan menjadi kursus unggulan dengan fitur marketing support untuk mendapatkan lebih banyak pendaftar kursus sesuai target market Anda</p><br>

      <h5>Keuntungan Mendaftarkan Kursus Unggulan</h5>
      <div class="row center">
         <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">message</i></h2>
            <h5 class="center">1. Priority Listing</h5>

            <p class="light">Kursus Anda akan ditampilkan di baris teratas pencarian dan di laman kursus pilihan (rekomendasi)</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">search</i></h2>
            <h5 class="center">2. Marketing Support via Facebook dan Google</h5>

            <p class="light">Rumah Sinau akan membantu memasarkan kursus Anda sesuai target market Anda dan dapatkan lebih banyak pendaftar untuk kursus/seminar Anda</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">message</i></h2>
            <h5 class="center">3. More Profit</h5>

            <p class="light">Rumah Sinau hanya mengambil 5% service fee dari setiap kegiatan kelas yang berlangsung</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l4 s12">
          <h5 class="white-text">Butuh Bantuan ?</h5>
          <p class="grey-text text-lighten-4">Kirim email ke kami</p>
          <p class="grey-text text-lighten-4">admin@rumahsinau.com</p>
        </div>
        <div class="col l4 s12">
          <h5 class="white-text">Informasi Lain</h5>
          <ul>
            <li><a class="white-text" href="faq.php">FAQ</a></li>
            <li><a class="white-text" href="blog.rumahsinau.org">Blog</a></li>
          </ul>
        </div>
        <div class="col l4 s12">
          <h5 class="white-text">Ikuti Kami</h5>
          <div class="fb-page" data-href="https://www.facebook.com/rumahsinau" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/rumahsinau" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/rumahsinau">Rumah Sinau</a></blockquote></div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
