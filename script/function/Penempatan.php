<?php

include 'Databases.php';
include '../global.php';

if (isset($_POST['_tempatkan'])) {
    $nim = e($_POST['nim']);
    $id_penempatan = e($_POST['id_penempatan']);
    $posisi = e($_POST['posisi']);

    $push = mysqli_query($db, "INSERT INTO penempatan VALUES('','$nim','$id_penempatan','$posisi',curdate())");
    if ($push) {
        header('Location: ../adm/penempatan.php?con=sukses_tempatkan');
    } else {
        header('Location: ../adm/penempatan.php?con=gagal_tempatkan');
    }
}
if (isset($_POST['_mhstambahkan'])) {
    $nim = e($_POST['id']);
    $nama = e($_POST['nama']);
    $password = e($_POST['password']);
    $status = e($_POST['status']);
    // $url = $_POST['url'];
    $push = mysqli_query($db, "INSERT INTO users VALUES('$nim','$nama',MD5('$password'),'$status')");
    if ($push) {
        header('Location: ../adm/mahasiswa.php?con=sukses_mhsadd');
    } else {
        header('Location: ../adm/mahasiswa.php?con=gagal_mhsadd');
    }
}
if (isset($_POST['_comtambahkan'])) {
    $id = e($_POST['id']);
    $nama = e($_POST['nama']);
    $password = e($_POST['password']);
    $status = e($_POST['status']);

    $nama_perusahaan = e($_POST['nama_perusahaan']);
    $alamat_perusahaan = e($_POST['alamat_perusahaan']);
    $bidang_perusahaan = e($_POST['bidang_perusahaan']);
    $nomor_perusahaan = e($_POST['nomor_perusahaan']);
    $nama_PIC = e($_POST['nama_PIC']);
    $nomor_PIC = e($_POST['nomor_PIC']);

    $push = mysqli_query($db, "INSERT INTO users VALUES('$id','$nama',MD5('$password'),'$status')");
    $push2 = mysqli_query($db, "INSERT INTO perusahaan VALUES('$id','$nama_perusahaan','$alamat_perusahaan','$bidang_perusahaan','$nomor_perusahaan','$nama_PIC','$nomor_PIC')");
    if ($push && $push2) {
        header('Location: ../adm/perusahaan.php?con=sukses_mhsadd');
    } else {
        header('Location: ../adm/perusahaan.php?con=gagal_mhsadd');
    }
}
if (isset($_POST['_hapusdatamhscom'])) {
    $id = $_POST['id'];
    $url = $_POST['url'];
    $push = mysqli_query($db, "DELETE FROM users WHERE id='$id'");
    if ($push && $url == "Mahasiswa") {
        header('Location: ../adm/mahasiswa.php?con=sukses_mhshps');
    } else if ($push && $url == "Perusahaan") {
        header('Location: ../adm/perusahaan.php?con=sukses_comhps');
    } else {
        header('Location: ../adm/mahasiswa.php?con=gagal_mhsadd');
    }
}
