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
    <div class="section">
      <h5>Pertanyaan Umum</h5>
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Apa Itu Rumah Sinau ?</div>
          <div class="collapsible-body"><span>Rumah Sinau adalah platform yang membantu kamu untuk mencari kursus yang kamu butuhkan se – Indonesia.
          Untuk para mitra, kami membantu mereka memasarkan jasa mereka keapda para calon pelanggan yang tepat.</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Siapa yang bisa menggunakan ?</div>
          <div class="collapsible-body"><span>Rumah Sinau dapat digunakan oleh masyarakat yang membutuhkan kursus tertentu untuk menambah pengetahuan dan keterampilan mereka.</span></div>
        </li>
      </ul>
      <h5>Seputar Pengguna</h5>
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Siapa Pengguna Rumah Sinau ?</div>
          <div class="collapsible-body"><span>Siapapun yang membutuhkan pendidikan diluar jam sekolah (non-formal) bisa menggunakan Rumah Sinau.</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Jasa Apa yang Bisa Dicari di Rumah Sinau ?</div>
          <div class="collapsible-body"><span>Anda bisa mencari berbagai les dan kursus yang diselenggarakan oleh para mitra kami se-Indonesia.
          Lihat daftarnya <a href="kursus.php">disini</a>. </span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Berapa Biayanya ?</div>
          <div class="collapsible-body"><span>Mitra Rumah Sinau memiliki kebebasan mengatur waktu, biaya, dan wilayah operasinya sendiri. Jadi, biaya yang tampil di website ini adalah biaya yang sudah ditetapkan masing – masing mitra.</span></div>
        </li>
      </ul>
      <h5>Seputar Mitra</h5>
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Siapa yang Bisa Bergabung ?</div>
          <div class="collapsible-body"><span>

Sejujurnya saat ini kami lebih memprioritaskan pendaftaran kursus, workshop maupun seminar dari lembaga/institusi resmi.

Namun, pendaftaran individu profesional juga masih kami terima walaupun dengan persyaratan yang lebih ketat. Namun, jika kamu memiliki pengalaman dan pengetahuan yang sudah terbukti, jangan ragu untuk mendaftar di Rumah Sinau ya.
</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Bagaimana Saya Bisa Bergabung ?</div>
          <div class="collapsible-body"><span>

Untuk bergabung sebagai mitra, silahkan membuat pengajuan di link <a href="daftar-mitra.php">ini</a>

Kemudian Anda akan diminta untuk mengisi profil dan hal – hal administrasi lainnya untuk verifikasi jasa Anda ditampilkan di website Rumah Sinau.
</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Kegiatan Apa yang Bisa Saya Daftarkan ?</div>
          <div class="collapsible-body"><span>

Secara garis besar ada 3 tipe kegiatan belajar yang saat ini diterima oleh Rumah Sinau:<br>

    - Kursus ( termasuk didalamnya bimbel ya )<br>
    - Seminar bertemakan pendidikan. Seminar lain dapat juga dicoba daftarkan yah<br>
    - Workshop atau pelatihan yang selesai dalam satu hari kegiatan atau maksimal 3 hari.<br><br>

Jenis – jenis kegiatan belajar antara lain:<br>
<ul>
  <li>1. Bimbingan belajar pelajaran semua jenjang</li>
  <li>2. Bahasa asing</li>
  <li>3. Keterampilan profesional</li>
  <li>4. Keterampilan terkait hobi atau komunitas tertentu</li>
  <li>5. Pelatihan teknis atau sertifikasi</li>
</ul>
</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Apa yang Akan Saya Dapatkan ?</div>
          <div class="collapsible-body"><span>

Dengan Rumah Sinau para mitra :<br>
<ul>
  <li>1. Menjangkau lebih banyak konsumen</li>
  <li>2. Dipromosikan jasa nya secara gratis</li>
  <li>3. Tidak perlu membuat website sendiri untuk mempromosikan usaha</li>
  <li>4. Bergabung dengan komunitas bersama para mitra yang lain</li>
  <li>5. Mendapatkan keuntungan sosial dengan mendukung aktivitas pendidikan diluar jam sekolah.</li>
</ul>
</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">library_books</i>Apa yang Akan Saya Dapatkan ?</div>
          <div class="collapsible-body"><span>


Mendaftar menjadi mitra di Rumah Sinau adalah GRATIS alias tidak dipungut biaya. Setiap mitra yang bergabung kemudian bisa mendaftarkan maksimal 2 kegiatan belajar.

Untuk mendaftar lebih dari 2 kegiatan belajar, mitra dapat mendaftar menjadi Mitra Unggulan dimana dia bisa mendaftarkan hingga 10 kegiatan belajar.

Selain itu, sebagai mitra unggulan, kegiatan belajar yang didaftarkan dapat dipromosikan dengan baik pada platform

</span></div>
        </li>
      </ul>
    </div>
  </div>

  <?php include "footer.php";?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
