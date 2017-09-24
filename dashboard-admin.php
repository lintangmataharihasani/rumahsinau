<?php
    include 'islogin.php';
    include 'connect-db.php';

    $thisMonth = date("F Y");
    $month = date("Y-m-d");
                                
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
           
            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i>Kursus Terverifikasi</p>
                                        <h4 class="card-stats-number">
                                            <?php
                                            $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 1;"); //belum pk date
                                            $countKursus = 0;
                                            while ($line = mysqli_fetch_array($result)) {
                                                $countKursus++;
                                            }
                                            echo $countKursus;
                                            ?>
                                        </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i><span class="green-text text-lighten-5">Saat Ini</span>
                                        </p>
                                    </div>
                                    <div class="card-action  green darken-2">
                                        <div id="clients-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Kursus Baru</p>
                                        <h4 class="card-stats-number">
                                            <?php
                                            $result =  mysqli_query($connection, "SELECT * FROM kursus WHERE verified = 0;"); //belum pk date
                                            $countMitraDaftar = 0;
                                            while ($line = mysqli_fetch_array($result)) {
                                                $countMitraDaftar++;
                                            }
                                            echo $countMitraDaftar;
                                            ?>
                                        </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i><span class="purple-text text-lighten-5"><?php echo $thisMonth; ?></span>
                                        </p>
                                    </div>
                                    <div class="card-action purple darken-2">
                                        <div id="sales-compositebar"></div>

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Pendaftar Kursus</p>
                                        <h4 class="card-stats-number">
                                            <?php
                                            
                                            $result =  mysqli_query($connection, "SELECT * FROM peserta_kursus;"); //belum pk date
                                            $countDaftarKursus = 0;
                                            while ($line = mysqli_fetch_array($result)) {
                                                $countDaftarKursus++;
                                            }
                                            echo $countDaftarKursus;
                                            
                                            ?>
                                        </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i><span class="blue-grey-text text-lighten-5"><?php echo $thisMonth; ?></span>
                                        </p>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content pink lighten-2 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>Mitra Lembaga </p>
                                        <h4 class="card-stats-number">
                                            <?php
                                            $result =  mysqli_query($connection, "SELECT * FROM lembaga_kursus;"); //belum pk date
                                            $countLembaga = 0;
                                            while ($line = mysqli_fetch_array($result)) {
                                                $countLembaga++;
                                            }
                                            echo $countLembaga;
                                            ?>
                                        </h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i><span class="deep-purple-text text-lighten-5">Saat Ini</span>
                                        </p>
                                    </div>
                                    <div class="card-action  pink darken-2">
                                        <div id="invoice-line"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--card stats end-->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <section>
                <div class="container">
                    <div class="card">
                        <div class="card-content">
                            <div class="row center">
                                <h5>Pendaftaran Mitra</h5>
                                <p>Daftar pendaftaran mitra bulan <span><?php echo $thisMonth; ?></span></p>
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
                                                    $islembaga = TRUE;
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
                                                                <form action='verify-kursus.php?nama_kursus='" . $line[1] . "' method='post'>
                                                                  <input type='hidden' name='nama_kursus' value='" . $line[1] ."'>
                                                                  <input type='submit' class='btn waves-effect waves-light green' name='submit' value='Verify' style='width:125px;'>
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
                                                  $lembaga = FALSE;
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
                                <h5>Pendaftaran Kursus</h5>
                                <p>Pendaftaran kursus bulan <span><?php echo $thisMonth; ?></span></p>
                                  <table class="striped highlight responsive-table centered">
                                    <thead>
                                        <tr>
                                            <th>Id Pendaftaran</th>
                                            <th>Nama Kursus</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php

                                        /*$resultPeserta =  mysqli_query($connection, "
                                          SELECT DISTINCTpendaftaran.id, pendaftaran.biaya, pendaftaran.id_kursus, pendaftaran.tgl_daftar, peserta_kursus.id, kursus.nama, kursus.kota, kursus.provinsi, peserta_kursus.nama from kursus, pendaftaran, peserta_kursus, pendaftaran_peserta 
                                          WHERE 
                                          pendaftaran.id = pendaftaran_peserta.id_pendaftaran AND peserta_kursus.id = pendaftaran_peserta.id_peserta
                                          AND pendaftaran.id_kursus = kursus.id
                                          "); */

                                          $resultPendaftaran =  mysqli_query($connection, "
                                          SELECT pendaftaran.id, pendaftaran.biaya, pendaftaran.id_kursus, pendaftaran.tgl_daftar, kursus.nama, kursus.kota, kursus.provinsi from kursus, pendaftaran 
                                          WHERE 
                                             pendaftaran.id_kursus = kursus.id AND pendaftaran.bayar=0
                                          "); 

                                            while ($line2 = mysqli_fetch_array($resultPendaftaran)) {
                                              echo "<tr>
                                                  <td>".$line2[0]."</td>
                                                  <td>".$line2[5]."</td>
                                                  <td>".$line2[3]."</td>
                                                  <td><a class='modal-trigger' href='#modal" . $line2[0] . "'>Detail</a></td>
                                                  <td>
                                                      <form action='delete-peserta.php?id_peserta='" . $line2[0] . "' method='post'>
                                                        <input type='hidden' id_peserta='id_peserta' value='" . $line2[0] ."'>
                                                        <input type='submit' class='btn waves-effect waves-light red' name='submit' value='Delete'>
                                                      </form><br>
                                                      <form action='verify-peserta.php?id_peserta='" . $line2[0] . "' method='post'>
                                                          <input type='hidden' id_peserta='id_peserta' value='" . $line2[0] ."'>
                                                          <input type='submit' class='btn waves-effect waves-light green' name='submit' value='Verify' style='width:125px;'>
                                                      </form>
                                                  </td>
                                              </tr>";

                                              //Modal
                                                  echo "<div id='modal" . $line2[0] . "' class='modal'>";
                                                    echo "<div class='modal-content'>";

                                                      echo "<h5>Data Pendaftaran</h5>";
                                                      echo "<div class=''>";
                                                      $resultKursus = mysqli_query($connection, "SELECT * FROM pendaftaran_peserta, pendaftaran, kursus, peserta_kursus
                                                        WHERE peserta_kursus.id = pendaftaran_peserta.id_peserta AND kursus.id = pendaftaran.id_kursus
                                                        AND pendaftaran.id = pendaftaran_peserta.id_pendaftaran");

                                                      while ($line4 = mysqli_fetch_array($resultKursus)) {
                                                        echo "
                                                                <ul>
                                                                  <li>Nama Kursus : ".$line4[11]."</li>
                                                                  <li>Alamat Kursus : ".$line4[20].", ".$line4[21]."</li>
                                                                  <li>Catatan : ".$line4[2]."</li>
                                                                  <li>Tanggal Daftar : ".$line4[4]."</li>
                                                                  <li>Total Biaya : ".$line4[6]."</li>
                                                                </ul>";
                                                      }
                                                      echo "</div><br>";

                                                      echo "<h5>Data Peserta</h5>";
                                                      echo "<div class=''>";
                                                      $resultPeserta = mysqli_query($connection, "SELECT * FROM peserta_kursus, pendaftaran_peserta, pendaftaran, kursus
                                                      WHERE peserta_kursus.id = pendaftaran_peserta.id_peserta AND kursus.id = pendaftaran.id_kursus
                                                      AND pendaftaran.id = pendaftaran_peserta.id_pendaftaran");

                                                      $a = 1;

                                                      while ($line3 = mysqli_fetch_array($resultPeserta)) {
                                                        echo "
                                                                <ul>
                                                                  <li>Peserta ".$a."</li>
                                                                  <li>Nama : ".$line3[1]."</li>
                                                                  <li>Email : ".$line3[2]."</li>
                                                                  <li>Telepon : ".$line3[3]."</li>
                                                                  <li>Alamat : ".$line3[4]."</li>
                                                                </ul>";
                                                        $a++;
                                                      }
                                                      echo "</div><br>";
                                                      echo "</div>
                                                          </div>";

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
