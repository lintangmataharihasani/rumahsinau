<?php 

  session_start();
  include "connect-db.php";

  $username = $password = "";
  $responseUsername = $responsePassword = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['username']) and isset($_POST['password'])){
      $username = $_POST["username"];
      $password = $_POST["password"];

      if (strlen($username) > 50) {
        $responseUsername = "
            <div class='offset-m2 l6 offset-l3'>
              <div class='card-panel red lighten-2'>
                <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap masukkan Username/Email dengan benar</p></div>
              </div>
            </div>
            ";
      }

      if (strlen($password) > 20) {
        $responsePassword = "
            <div class='offset-m2 l6 offset-l3'>
              <div class='card-panel red lighten-2'>
                <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap masukkan Password dengan benar</p></div>
              </div>
            </div>
            ";
      }

      $accountAdmin = mysqli_query($connection, "SELECT * FROM akun WHERE username = '$username' AND password = '$password';");

      if ($accountAdmin) {
          $_SESSION["username"] = $username;
          $_SESSION["role"] = "admin";
          header("Location: dashboard-admin.php");
        } else {
          $response = "
          <div class='offset-m2 l6 offset-l3'>
              <div class='card-panel red lighten-2'>
                <div class='white-text'><i class='material-icons left'>announcement</i><p>Login gagal. Harap periksa kembali Usernmae dan Password Anda</p></div>
              </div>
            </div>
          ";
        }
    }
    if (strlen($username) == 0) {
        $responseUsername = "
            <div class='offset-m2 l6 offset-l3'>
              <div class='card-panel red lighten-2'>
                <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap masukkan Username/Email Anda</p></div>
              </div>
            </div>
            ";
      }

      if (strlen($password) == 0) {
        $responsePassword = "
            <div class='offset-m2 l6 offset-l3'>
              <div class='card-panel red lighten-2'>
                <div class='white-text'><i class='material-icons left'>announcement</i><p>Harap masukkan Password Anda</p></div>
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
        <h3 class="header center teal-text text-lighten-4" style="margin-top:12%;">Login</h3>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="asset/img/header-1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="container">
    <div class="section">
      <h4 class="header center cyan-text text-darken-2">Login</h4>
      <p class="light"> Silahkan login menggunakan email yang Anda daftarkan di Rumah Sinau</p>
      <div class="center">
        <form action="login.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="username" name="username" type="text" class="validate">
              <label for="nama">Email/Username</label>
              <?php echo $responseUsername; ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" name="password" type="password" class="validate">
              <label for="nama">Password</label>
              <?php echo $responsePassword; ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light" type="submit" name="action">Daftar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
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
