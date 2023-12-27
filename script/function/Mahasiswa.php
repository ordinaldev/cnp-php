<?php

include 'Databases.php';
include '../global.php';

if (isset($_POST['lengkapi_biodata'])) {
    $nim = e($_POST['nim']);
    $prodi = e($_POST['prodi']);
    $alamat = e($_POST['alamat']);
    $nomor_hp = e($_POST['nomor_hp']);
    $email = e($_POST['email']);
    $tempat_lahir = e($_POST['tempat_lahir']);
    $agama = e($_POST['agama']);
    $tanggal_lahir = e($_POST['tanggal_lahir']);
    $status_bekerja     = "Belum Bekerja";

    $push = mysqli_query($db, "INSERT INTO mahasiswa VALUES('$nim','$prodi','$alamat','$nomor_hp','$email','$tempat_lahir','$agama','$tanggal_lahir','$status_bekerja')");
    if ($push) {
        header('Location: ../mhs?con=sukses_biodata');
    } else {
        header('Location: ../mhs/?con=gagal_biodata');
    }
}
