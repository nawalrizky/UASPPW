<?php
include('koneksi.php');


    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pesan'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pesan = $_POST['pesan'];
        $submission_date = date("Y-m-d");

        // Query untuk menyimpan data kontak ke dalam tabel contact
        $insert_sql = "INSERT INTO contact (nama, email, pesan, submission_date) VALUES ('$username', '$email', '$pesan', '$submission_date')";
        if (mysqli_query($conn, $insert_sql)) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Missing parameters";
    }


mysqli_close($conn);
?>
