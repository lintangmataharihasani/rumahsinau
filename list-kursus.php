<?php
    include 'islogin.php';
    include 'connect-db.php';
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
<body class="grey lighten-3">

  <?php include "navbar-admin.php" ?>

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
           
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <section>
                <div class="container">
                    <div class="card">
                        <div class="card-content">
                            <div class="row center">
                                <h4>Kursus Terverifikasi</h4><br>
                                  <table class="striped highlight responsive-table centered">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Kursus</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 1;"); //belum pk date
                                            $islembaga = FALSE;

                                            while ($line = mysqli_fetch_array($result)) {
                                                $id_penyelenggara = $line[8];
                                                $date = $line[9];
                                                $penyelenggara = mysqli_query($connection, "SELECT * FROM penyelenggara_kursus WHERE id = '$id_penyelenggara';"); 
                                                while ($line2 = mysqli_fetch_array($penyelenggara)) {
                                                    $nama_penyelenggara = $line2[1];
                                                    $email = $line2[2];
                                                    $telepon_penyelenggara = $line2[3];
                                                    $provinsi_penyelenggara = $line2[4];
                                                    $kota_penyelenggara = $line2[5];
                                                    $alamat_penyelenggara = $line2[6]; 
                                                }
                                                $nama_kursus = $line[1];
                                                $kota = $line[10];
                                                $provinsi = $line[11];

                                                $nama_lembaga = "-";
                                                $email_lembaga = "-";
                                                $telepon_lembaga = "-";
                                                
                                                $lembaga = mysqli_query($connection, "SELECT * FROM lembaga_kursus WHERE id_pemilik = '$id_penyelenggara';"); 
                                                if ($line[13] == 1) { // Jika Lembaga
                                                  while ($line3 = mysqli_fetch_array($lembaga)) {
                                                    $nama_lembaga = $line3[1];
                                                    $alamat_lembaga = $line3[2];
                                                    $telepon_lembaga = $line3[3];
                                                    $email_lembaga = $line3[5];
                                                  }
                                                }

                                                echo "<tr>";
                                                    echo "<td>" . $date . "</td>";
                                                    echo "<td><strong>" . $nama_kursus . "</strong></td>";
                                                    echo "<td><a class='modal-trigger' href='#modal" . $nama_kursus . "'>Detail</a></td>
                                                            <td>
                                                                <form action='delete-kursus.php?nama_kursus='" . $line[1] . "' method='post'>
                                                                  <input type='hidden' name='nama_kursus' value='" . $line[1] ."'>
                                                                  <input type='submit' class='btn waves-effect waves-light red' name='submit' value='Delete'>
                                                                </form><br>
                                                                <form action='edit-kursus.php?nama_kursus='" . $line[1] . "' method='post'>
                                                                  <input type='hidden' name='nama_kursus' value='" . $line[1] ."'>
                                                                  <input type='submit' class='btn waves-effect waves-light teal' name='submit' value='Edit' style='width:125px;'>
                                                                </form>
                                                            </td>";
                                                echo "</tr>"; 

                                                //Modal
                                                  echo "<div id='modal" . $nama_kursus . "' class='modal'>";
                                                    echo "<div class='modal-content'>";
                                                      echo "<h5>Data Kursus</h5>";
                                                      echo "<div class=''>";
                                                      echo "<p>Nama Kursus : " . $nama_kursus . "</p>";
                                                      echo "<p>Jenis Kursus : " . $line[2] . "</p>";
                                                      echo "<p>Deskripsi : " . $line[3] . "</p>";
                                                      echo "<p>Jadwal : " . $line[4] . "</p>";
                                                      echo "<p>Fasilitas : " . $line[5] . "</p>";
                                                      echo "<p>Harga Kursus : " . $line[6] . "</p>";
                                                      echo "</div><br>";

                                                      echo "<h5>Data Penyelenggara</h5>";
                                                      echo "<div class=''>";
                                                      echo "<p>Nama Pemilik : " . $nama_penyelenggara . "</p>";
                                                      echo "<p>Email : " . $email . "</p>";
                                                      echo "<p>Telepon : " . $telepon_penyelenggara . "</p>";
                                                      echo "<p>Provinsi : " . $provinsi_penyelenggara . "</p>";
                                                      echo "<p>Kota : " . $kota_penyelenggara . "</p>";
                                                      echo "<p>Alamat : " . $alamat_penyelenggara . "</p>";
                                                      echo "</div>";

                                                      if ($line[13] == 1) {
                                                        echo "<h5>Data Lembaga</h5>";
                                                        echo "<div class=''>";
                                                        echo "<p>Nama : " . $nama_lembaga . "</p>";
                                                        echo "<p>Email : " . $email_lembaga . "</p>";
                                                        echo "<p>Telepon : " . $telepon_lembaga . "</p>";
                                                        echo "</div>";
                                                      }

                                                    echo "</div>";
                                                    echo "<div class='modal-footer'>";
                                                      echo "<a href='#!'' class='modal-action modal-close waves-effect waves-green btn-flat'>Tutup</a>";
                                                    echo "</div>";
                                                  echo "</div>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section><br>

            <section>
                <div class="container">
                    <div class="card">
                        <div class="card-content">
                            <div class="row center">
                                <h4>Kursus Belum Terverifikasi</h4><br>
                                  <table class="striped highlight responsive-table centered">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Kursus</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 0;"); //belum pk date

                                            while ($line = mysqli_fetch_array($result)) {
                                                $id_penyelenggara = $line[8];
                                                $date = $line[9];
                                                $penyelenggara = mysqli_query($connection, "SELECT * FROM penyelenggara_kursus WHERE id = '$id_penyelenggara';"); 
                                                while ($line2 = mysqli_fetch_array($penyelenggara)) {
                                                    $nama_penyelenggara = $line2[1];
                                                    $email = $line2[2];
                                                    $telepon_penyelenggara = $line2[3];
                                                    $provinsi_penyelenggara = $line2[4];
                                                    $kota_penyelenggara = $line2[5];
                                                    $alamat_penyelenggara = $line2[6]; 
                                                }
                                                $nama_kursus = $line[1];
                                                $kota = $line[10];
                                                $provinsi = $line[11];

                                                echo "<tr>";
                                                    echo "<td>" . $date . "</td>";
                                                    echo "<td><strong>" . $nama_kursus . "</strong></td>";
                                                    echo "<td><a class='modal-trigger' href='#modal" . $nama_kursus . "'>Detail</a></td>
                                                            <td>
                                                                <form action='delete-kursus.php?nama_kursus='" . $line[1] . "' method='post'>
                                                                  <input type='hidden' name='nama_kursus' value='" . $line[1] ."'>
                                                                  <input type='submit' class='btn waves-effect waves-light red' name='submit' value='Delete'>
                                                                </form><br>
                                                                <form action='verify-kursus.php?nama_kursus='" . $line[1] . "' method='post'>
                                                                  <input type='hidden' name='nama_kursus' value='" . $line[1] ."'>
                                                                  <input type='submit' class='btn waves-effect waves-light green' name='submit' value='Verify'>
                                                                </form>
                                                            </td>";
                                                echo "</tr>"; 

                                                //Modal
                                                  echo "<div id='modal" . $nama_kursus . "' class='modal'>";
                                                    echo "<div class='modal-content'>";
                                                      echo "<h5>Data Kursus</h5>";
                                                      echo "<div class=''>";
                                                      echo "<p>Nama Kursus : " . $nama_kursus . "</p>";
                                                      echo "<p>Jenis Kursus : " . $line[2] . "</p>";
                                                      echo "<p>Deskripsi : " . $line[3] . "</p>";
                                                      echo "<p>Jadwal : " . $line[4] . "</p>";
                                                      echo "<p>Fasilitas : " . $line[5] . "</p>";
                                                      echo "<p>Harga Kursus : " . $line[6] . "</p>";
                                                      echo "</div><br>";

                                                      echo "<h5>Data Penyelenggara</h5>";
                                                      echo "<div class=''>";
                                                      echo "<p>Nama Pemilik : " . $nama_penyelenggara . "</p>";
                                                      echo "<p>Email : " . $email . "</p>";
                                                      echo "<p>Telepon : " . $telepon_penyelenggara . "</p>";
                                                      echo "<p>Provinsi : " . $provinsi_penyelenggara . "</p>";
                                                      echo "<p>Kota : " . $kota_penyelenggara . "</p>";
                                                      echo "<p>Alamat : " . $alamat_penyelenggara . "</p>";
                                                      echo "</div>";

                                                    echo "</div>";
                                                    echo "<div class='modal-footer'>";
                                                      echo "<a href='#!'' class='modal-action modal-close waves-effect waves-green btn-flat'>Tutup</a>";
                                                    echo "</div>";
                                                  echo "</div>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
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
