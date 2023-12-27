<?php
session_start();

$title = "Dashboard";

include '../function/Databases.php';
include '../session.php';
include '../layout/adm_top.php';

$mhs = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$id'");
$m = mysqli_fetch_array($mhs);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
            <p class="mb-0">This is a sample page </p>
        </div>
    </div>
</div>

<?php
include '../layout/adm_bottom.php';
