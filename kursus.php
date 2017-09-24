<?php
  include "connect-db.php";

  $search = "";
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
        <br><br>
        <h3 class="header center white-text text-lighten-4" style="margin-top:12%; text-shadow: 1px 1px;">Di Mana Saja. Berkumpul. Belajar</h3>
        <div class="row center">
          <h5 class="header col s12 light">Temukan kursus terbaik untuk kamu</h5>
        </div>
        <div class="row">
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
    <h4 class="header center cyan-text text-darken-2">Les/Kursus Pilihan</h4>
    <form method="post" action="kursus.php">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="search" id="search">
          <label for="search">Masukkan Pencarian</label>
        </div>
      </div>
      <div class="row center">
        <button class="btn waves-effect waves-light orange" type="submit" name="action">Cari
          <i class="material-icons right">search</i>
        </button><br><br>
      </div>
    </form>

      <?php
        
        echo "<div class='row'>";
        $token = "";
        $query_buatan = "";

        // Pencarian
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST["search"])) {
            $search = $_POST["search"];

            $token = strtok($search, " ");

            $queries = array();
            while ($token !== false)
            {
              if ($token == "kursus" || $token == "les" || $token == "course" || $token == "Kursus" || $token == "Les" || $token == "Course" || $token == "KURSUS" || $token == "LES" || $token == "COURSE") {
                # code...
              } else {
                array_push($queries, $token);
              }
            $token = strtok(" ");
            } 

            $arrlength=count($queries);

            for($x=0;$x<$arrlength;$x++){
              if ($x == $arrlength - 1) {
                $query_buatan = $query_buatan . " (nama LIKE '%".$queries[$x]."%') OR (provinsi LIKE '%".$queries[$x]."%') OR (kota LIKE '%".$queries[$x]."%') OR (jenis LIKE '%".$queries[$x]."%')";
              } else {
                $query_buatan = $query_buatan . " (nama LIKE '%".$queries[$x]."%') OR (provinsi LIKE '%".$queries[$x]."%') OR (kota LIKE '%".$queries[$x]."%') OR (jenis LIKE '%".$queries[$x]."%') OR ";
              }
            }

            $query = "SELECT * FROM kursus WHERE " . $query_buatan . " AND verified = 1   ;";
            $result =  mysqli_query($connection, $query);
          }
        }

        if ($search == "" ) {
          $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 1;");
        } 

        $premium = "<a class='btn-floating halfway-fab orange'><i class='material-icons'>stars</i></a>";

        $countDaftarKursus = 0;

        while ($line = mysqli_fetch_array($result)) {

          $jenis = $line[2];
          $img = $line[7];

          if ($img == "") {
              if ($jenis == "Aksesoris" || $jenis == "Menjahit" || $jenis == "Melukis") {
              $img = "asset/img/aksesoris-1.jpg";
            } elseif ($jenis == "Decoupage" || $jenis == "Kerajinan Tangan" || $jenis == "Batik") {
              $img = "asset/img/aksesoris-2.jpg";
            } elseif ($jenis == "Bhs. Jerman" || $jenis == "Bhs. Arab" || $jenis == "Bhs. Jepang" || $jenis == "Bhs. Inggris") {
              $img = "asset/img/deutsch-1.jpg";
            } elseif ($jenis == "Profesional" || $jenis == "Perkantoran" || $jenis == "Perhotelan"  ) {
              $img = "asset/img/profesinal-1.jpg";
            } elseif ($jenis == "SD" || $jenis == "SMP" || $jenis == "SMA" || $jenis == "IPA SMA" || $jenis == "IPS SMA" || $jenis == "SBMPTN") {
              $img = "asset/img/sahabat-mulya.jpg";
            } else {
              $img = "asset/img/bimbel-1.jpg";
            }
          }
          

          $premium = "";
          if ($line[13] == 1) {
            $premium = "<a class='btn-floating halfway-fab orange'><i class='material-icons'>stars</i></a>";
          }

          $countDaftarKursus++;

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
      </div><br>
      <!--<script type="text/javascript">
            $(document).ready(function(){
            $('.pagination').pagination({
                    items: <?php echo $total_records;?>,
                    itemsOnPage: <?php echo $limit;?>,
                    cssStyle: 'light-theme',
                    currentPage : <?php echo $page;?>,
                    hrefTextPrefix : 'kursus.php?page='
                });
                });
      </script>
      <?php
        $rs_result = $result;  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $countDaftarKursus;  
        $total_pages = ceil($total_records / 8);  
        $pagLink = "<div class='center'><ul class='pagination'>";  
        for ($i=1; $i<=$total_pages; $i++) {  
          $pagLink .= "<li class='waves-effect'><a href='kursus.php?page=".$i."'>".$i."</a></li>";  
        };  
        echo $pagLink . "</ul></div>";
      ?>
    </div><br><br>-->
  </div>

   <?php include "footer.php";?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
