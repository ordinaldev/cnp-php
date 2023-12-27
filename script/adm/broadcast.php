<?php
session_start();

$title = "Data Perusahaan";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

$bro = mysqli_query($db, "SELECT * FROM broadcast,perusahaan WHERE perusahaan.id_perusahaan = broadcast.id_perusahaan;");

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h2>Broadcast Lowongan kerja</h2>
            <table class="table">
                <tr class="text-center">
                    <th>Judul Broadcast</th>
                    <th>Nama Perusahaan</th>
                    <th>Tgl _Publish</th>

                </tr>
                <?php foreach ($bro as $m) { ?>
                    <tr class="text-center">
                        <th><?= e($m['judul_broadcast']); ?></th>
                        <th><?= e($m['nama_perusahaan']); ?></th>
                        <th><?= e($m['tgl_broadcast']); ?></th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
