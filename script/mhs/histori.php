<?php
session_start();

$title = "Record Penempatan";

include '../function/Databases.php';
include '../session.php';
include '../layout/mhs_top.php';

$mhs = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$id'");
$m = mysqli_fetch_array($mhs);

?>

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <?php

        $see = mysqli_query($db, "SELECT * FROM penempatan where nim='$id'");
        if (mysqli_num_rows($see) > 0) {
        ?>



        <?php
        } else {
        ?> <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Ops Data Penempatan Tidak Ditemukan!.</span> Silahkan Tunggu sampai data penempatan diisi.
            </div>
            <br>
        <?php

        }
        ?>
    </div>



</main>




<?php

include '../layout/mhs_bottom.php';
