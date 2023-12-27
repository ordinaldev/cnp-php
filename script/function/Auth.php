<?php
session_start();

include 'Databases.php';
include '../global.php';

if (isset($_POST['_login'])) {
    $id = e($_POST['id']);
    $password = md5(e($_POST['password']));
    $login = mysqli_query($db, "SELECT * FROM users WHERE id='$id' and password='$password' limit 1");
    if (mysqli_num_rows($login) > 0) {

        $data = mysqli_fetch_assoc($login);
        $_SESSION["id"] = $id;
        $_SESSION["status"] = $data['status'];

        switch ($data['status']) {
            case "Mahasiswa":
                header('Location: ../mhs/');
                break;
            case "Perusahaan":
                header('Location: ../com/');
                break;
            case "Admin":
                header('Location: ../adm/');
                break;
            default:
                header('Location: /login.php');
        }
    } else {
        header('Location: /login.php');
    }
}
if (isset($_POST['ubah_password'])) {
    $id = $_POST['id'];
    $password = e($_POST['password']);
    $ubah = mysqli_query($db, "UPDATE users SET password = md5('$password') where id='$id'");
    session_destroy();
    header('Location: /login.php?com=logout');
}
if (isset($_POST['_logout'])) {
    session_destroy();
    header('Location: /login.php?com=logout');
}
