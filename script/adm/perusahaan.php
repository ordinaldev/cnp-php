<?php
session_start();

$title = "Perusahaan";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

$com = mysqli_query($db, "SELECT * FROM perusahaan,users WHERE users.id = perusahaan.id_perusahaan ");
$m = mysqli_fetch_array($com);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <h2>Perusahaan yang bermitra dengan LP3i Pekanbaru</h2>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Perusahaan
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
                                        <small>Kredensial Akun Perusahaan</small>
                                        <div class="row g-3">
                                            <div class="col">
                                                <label for="id">Username/ID</label>
                                                <input type="text" name="id" class="form-control" placeholder="ex: nama perusahaan">
                                            </div>
                                            <div class="col">
                                                <label for="nama">Nama User</label>
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

                                            <div class="row g-3">
                                                <small>Data Perusahaan</small>
                                                <div class="col">
                                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                                </div>
                                                <div class="col">
                                                    <label for="bidang_perusahaan">Konsentrasi Perusahaan</label>
                                                    <input type="text" name="bidang_perusahaan" class="form-control" placeholder="Bidang Perusahaan">
                                                </div>
                                            </div>
                                            <label for="alamat">Alamat Perusahaan</label>
                                            <textarea name="alamat_perusahaan" class="form-control" style="resize:none"></textarea>
                                            <div class="row g-3">
                                                <div class="col">
                                                    <label for="nim">Nama PIC</label>
                                                    <input type="text" name="nama_PIC" class="form-control" placeholder="Nama PIC">
                                                </div>
                                                <div class="col">
                                                    <label for="nama">Nomor PIC</label>
                                                    <input type="text" name="nomor_PIC" class="form-control" placeholder="ex : 085374355822">
                                                </div>
                                            </div>
                                            <label for="nomor_perusahaan">Nomor Perusahaan</label>
                                            <input type="text" name="nomor_perusahaan" class="form-control" placeholder="nomor perusahaan">
                                            <button type="submit" class="btn bg-primary text-light" name="_comtambahkan">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <tr class="text-center">
                    <th>Nama Perusahaan</th>
                    <th>Bidang Perusahaan</th>
                    <th>Nama PIC</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($com as $c) { ?>
                    <tr>
                        <td><?= e($c['nama_perusahaan']); ?></td>
                        <td><?= e($c['bidang_perusahaan']); ?></td>
                        <td><?= e($c['nama_PIC']); ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <form action="../function/Penempatan.php" method="POST">
                                    <input type="hidden" name="id" value="<?= e($m['id_perusahaan']); ?>">
                                    <input type="hidden" name="url" value="<?= $title; ?>">
                                    <button type="submit" class="badge rounded-pill bg-danger" name="_hapusdatamhscom">Hapus</button>
                                </form>
                                <div>
                                    <button type="button" class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#com<?= e($m['id_perusahaan']); ?>">Lihat</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="com<?= e($m['id_perusahaan']); ?>" tabindex="-1" aria-labelledby="com<?= e($m['id_perusahaan']); ?>"" aria-hidden=" true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data <?= e($m['nama']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-5">Nama User</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nama']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nama Perusahaan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nama_perusahaan']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Alamat Perusahaan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['alamat_perusahaan']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nomor Perusahaan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nomor_perusahaan']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Konsetrasi Peruahaan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['bidang_perusahaan']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nama PIC</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?php echo e($m['nama_PIC']); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nomor PIC</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6"><?= e($m['nomor_PIC']); ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
