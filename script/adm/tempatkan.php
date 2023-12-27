<?php
session_start();

$title = "Data Penempatan";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

// $com = mysqli_query($db, "SELECT * FROM penempatan,mahasiswa,users,perusahaan WHERE users.id = perusahaan.id_perusahaan AND mahasiswa.nim = users.id AND penempatan.nim = mahasiswa.nim AND penempatan.id_perusahaan = perusahaan.id_perusahaan");
$com = mysqli_query($db, "SELECT * FROM penempatan,users,perusahaan WHERE users.id = perusahaan.id_perusahaan AND penempatan.id_perusahaan = perusahaan.id_perusahaan;");
$m = mysqli_fetch_array($com);
$mhs = mysqli_query($db, "SELECT * FROM users,mahasiswa WHERE users.id=mahasiswa.nim");
$com = mysqli_query($db, "SELECT * FROM users,perusahaan WHERE users.id=perusahaan.id_perusahaan");
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h2>Tambah Data Penempatan Kerja Politeknik LP3i Pekanbaru</h2>
            <form class="row g-3" action="../function/Penempatan.php" method="POST">
                <div class="col-md-6">
                    <label for="nim" class="form-label">Nama Mahasiswa</label>
                    <select class="form-select" name="nim" id="basic-usage" data-placeholder="Choose one thing">
                        <option></option>
                        <?php foreach ($mhs as $m) { ?>
                            <option value="<?= e($m['nim']); ?>"><?= e($m['nama']); ?></option>
                        <?php } ?>
                    </select>
                    <script>
                        $('#basic-usage').select2({
                            theme: "bootstrap-5",
                            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                            placeholder: $(this).data('placeholder'),
                        });
                    </script>
                </div>
                <div class="col-md-6">
                    <label for="id_perusahaan" class="form-label">Nama Perusahaan</label>
                    <select class="form-select" name="id_perusahaan" id="basic-usage2" data-placeholder="Choose one thing">
                        <option></option>
                        <?php foreach ($com as $m) { ?>
                            <option value="<?= e($m['id_perusahaan']); ?>"><?= e($m['nama_perusahaan']); ?></option>
                        <?php } ?>
                    </select>
                    <script>
                        $('#basic-usage2').select2({
                            theme: "bootstrap-5",
                            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                            placeholder: $(this).data('placeholder'),
                        });
                    </script>
                </div>
                <div class="col-12">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi" name="posisi">
                </div>

                <div class="col-12">
                    <button type="submit" name="_tempatkan" class="btn btn-primary">Tempatkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
