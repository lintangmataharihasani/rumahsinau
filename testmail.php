<?php
$nama_kursus = "Kursus Menjahit Mitra Keluarga";
$nama_lembaga = "LKP Mitra Keluarga";
$date = "2017-07-31";
$nama_penyelenggara = "Solehuddin";
$provinsi_lembaga = "Jawa Barat";
$kota_lembaga = "Bandung";
$email_penyelenggara = "solehuddin.rumahsinau@gmail.com";

// Send mail

        //mail($mail_to, $mail_subject, $mail_message, $header);
        //to Admin Rumah Sinau
        $subjectToAdmin = "Pendaftaran Mitra (" . $nama_kursus . ") (" . $nama_lembaga . ") (" . $date . ")";
        $messageToAdmin = "Pada " . $date . " mitra lembaga dengan rincian sebagai berikut:" . "\n" .
                    "Nama Lembaga :" . $nama_lembaga . "\n" .
                    "Nama Kursus :" . $nama_kursus . "\n" .
                    "Nama Penyelenggara/Pemilik :" . $nama_penyelenggara . "\n" .
                    "Provinsi :" . $provinsi_lembaga . "\n" .
                    "Kota :" . $kota_lembaga . "\n" .
                    "Email :" . $email_penyelenggara . "\n" .
                    "Admin harap segera mengecek pendaftaran diatas pada laman dashboard untuk dilakukan verifikasi.
                    Info lebih lanjut dan bantuan harap hubungi Lintang (CIO) di sternundsonne@gmail.com/lintang@rumahsinau.com";

        $encoding = "utf-8";

        // Preferences for Subject field
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        // Mail header
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: Rumah Sinau <info@rumahsinau.com> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $subjectToAdmin, $subject_preferences);

        //mail("admin@rumahsinau.com", $subjectToAdmin, $messageToAdmin, $header);
        mail("user.rumahsinau@gmail.com", $subjectToAdmin, $messageToAdmin, $header);
        mail("user.rumahsinau@gmail.com", "Apasaja", "Apasaja");

        //to Mitra Lembaga Rumah Sinau
        $subjectToLembaga = "Terima Kasih Telah Mendaftar di Rumah Sinau";
        $messageToLembaga = "Terima kasih sudah mendaftar di Rumah Sinau. Pendaftaran Anda akan segera kami proses. Info lebih lanjut harap hubungi
        info@rumahsinau.com";

        $encoding = "utf-8";

        // Preferences for Subject field
        $subject_preferences = array(
            "input-charset" => $encoding,
            "output-charset" => $encoding,
            "line-length" => 76,
            "line-break-chars" => "\r\n"
        );

        // Mail header
        $header = "Content-type: text/html; charset=".$encoding." \r\n";
        $header .= "From: Rumah Sinau <info@rumahsinau.com> \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-Transfer-Encoding: 8bit \r\n";
        $header .= "Date: ".date("r (T)")." \r\n";
        $header .= iconv_mime_encode("Subject", $subjectToLembaga, $subject_preferences);

        mail("user.rumahsinau@gmail.com", $subjectToLembaga, $messageToLembaga, $header);
        echo "Email Udah Dikirim";
?>