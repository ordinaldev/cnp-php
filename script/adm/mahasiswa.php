<?php
session_start();

$title = "Mahasiswa";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

$mhs = mysqli_query($db, "SELECT * FROM mahasiswa,users WHERE users.id = mahasiswa.nim ");
$m = mysqli_fetch_array($mhs);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h2>Data Mahasiswa Politeknik LP3i Pekanbaru</h2>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Mahasiswa
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../function/Penempatan.php" method="POST">
                                        <div class="row g-3">
                                            <div class="col">
                                                <label for="nim">Nomor Induk Mahasiswa</label>
                                                <input type="text" name="id" class="form-control" placeholder="NIM">
                                            </div>
                                            <div class="col">
                                                <label for="nama">Nama Mahasiswa</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col">
                                                <label for="nama">Password Login</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="col">
                                                <label for="status">Role</label>
                                                <select name="status" class="form-control">
                                                    <option value="Admin">Admin</option>
                                                    <option value="Perusahaan">Perusahaan</option>
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                </select>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn bg-primary text-light" name="_mhstambahkan">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mt-4">
                <tr class="text-center">
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <!-- <th>Jenis Kelamin</th> -->
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($mhs as $m) { ?>
                    <tr>
                        <td><?= e($m['nim']); ?></td>
                        <td><?= e($m['nama']); ?></td>
                        <td><?= e($m['prodi']); ?></td>
                        <td><?= e($m['status_bekerja']); ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="../function/Penempatan.php" method="POST">
                                    <input type="hidden" name="id" value="<?= e($m['nim']); ?>">
                                    <input type="hidden" name="url" value="<?= $title; ?>">
                                    <button type="submit" class="badge rounded-pill bg-danger" name="_hapusdatamhscom">Hapus</button>
                                </form>
                                <div>
                                    <button type="button" class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#mhs<?= e($m['nim']); ?>">Lihat</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="mhs<?= e($m['nim']); ?>" tabindex="-1" aria-labelledby="mhs<?= e($m['nim']); ?>"" aria-hidden=" true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data <?= e($m['nama']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-5">Nama Lengkap</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nama']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nomor Induk Mahasiswa</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nim']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Alamat</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['alamat']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nomor HP</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nomor_hp']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Alamat Email</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['email']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">TTL</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?php echo e($m['tempat_lahir']) . e($m['tanggal_lahir']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Agama</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['agama']); ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
