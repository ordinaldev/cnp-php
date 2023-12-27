<?php
// session_start();
$id = $_SESSION['id'];
$login = mysqli_query($db, "SELECT * FROM users WHERE id='$id' limit 1");
$data = mysqli_fetch_assoc($login);

if (isset($id)) {
    switch ($data['status']) {
        case "Mahasiswa":

            break;
        case "Perusahaan":

            break;
        case "Admin":
            // header('Location: ../adm/');
            break;
        default:
            header('Location: /login.php');
    }
} else {
    header('Location: /login.php');
}
