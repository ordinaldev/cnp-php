<?php
session_start();

$title = "Data Penempatan";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

// $com = mysqli_query($db, "SELECT * FROM penempatan,mahasiswa,users,perusahaan WHERE users.id = perusahaan.id_perusahaan AND mahasiswa.nim = users.id AND penempatan.nim = mahasiswa.nim AND penempatan.id_perusahaan = perusahaan.id_perusahaan");
$com = mysqli_query($db, "SELECT *,count(penempatan.tanggal_penempatan) as jumlah FROM penempatan,mahasiswa,users,perusahaan WHERE users.id = mahasiswa.nim AND penempatan.id_perusahaan = perusahaan.id_perusahaan AND penempatan.nim = mahasiswa.nim group by penempatan.tanggal_penempatan,perusahaan.nama_perusahaan desc;");
$m = mysqli_fetch_array($com);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h2>Data Penempatan Kerja Politeknik LP3i Pekanbaru</h2>

            <table class="table">
                <tr class="text-center">
                    <th>Nama Perusahaan</th>
                    <th>Jumlah</th>
                    <th>Tgl Penempatan</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($com as $c) { ?>
                    <tr>
                        <td><?= e($c['nama_perusahaan']); ?></td>
                        <td><?= e($c['jumlah']); ?> Orang </td>
                        <td><?= e($c['tanggal_penempatan']); ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-danger">Left</button>
                                <button type="button" class="btn btn-warning">Middle</button>
                                <button type="button" class="btn btn-success">Right</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
