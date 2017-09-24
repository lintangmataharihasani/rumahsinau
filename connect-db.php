<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rumahsinau";

$connection = new mysqli($servername, $username, $password, $dbname);
        if($connection) {
          //echo 'connected';
        } else {
          echo 'Ada kesalahan. Gagal menyambung dengan server';
        }

?>