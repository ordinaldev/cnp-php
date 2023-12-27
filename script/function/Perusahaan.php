<?php
include 'Databases.php';
include '../global.php';


if (isset($_POST['broadcast_set'])) {
    $id_perusahaan = $_POST['id_perusahaan'];
    $judul_broadcast = $_POST['judul_broadcast'];
    $dateline_broadcast = $_POST['dateline_broadcast'];
    $contact_broadcast = $_POST['contact_broadcast'];
    $isi_broadcast = $_POST['isi_broadcast'];


    $push = mysqli_query($db, "INSERT INTO broadcast VALUES('','$id_perusahaan','$judul_broadcast',curdate(),'$dateline_broadcast','$isi_broadcast','$contact_broadcast')");

    if ($push) {
        header('Location: ../com/?con=sukses_broadcast');
    } else {
        header('Location: ../com/?con=gagal_broadcast');
    }
}
