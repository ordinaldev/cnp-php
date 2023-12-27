<?php
session_start();

$title = "Dashboard";
// include '../global.php';

include '../function/Databases.php';
include '../session.php';
include '../layout/com_top.php';

$id = $_SESSION['id'];
$com = mysqli_query($db, "SELECT * FROM berkas,users,mahasiswa where users.id = berkas.nim and berkas.nim=mahasiswa.nim");
?>

<main class="p-4 md:ml-64 h-auto pt-20">
    <div class="container mx-auto p-4 lg:h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <?php foreach ($com as $data) { ?>
                <div class="max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1516205651411-aef33a44f7c2?auto=format&fit=crop&q=80&w=1528&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-auto object-cover rounded-lg">
                    <div class="absolute bottom-0 left-0 right-0 h-40  bg-gray-50 dark:bg-gray-800  text-gray-500 dark:text-gray-400 p-4 rounded-b-lg">
                        <h1 class="text-2xl font-semibold"><?= $data['nama']; ?></h1>
                        <p class="mt-2"><?= $data['prodi']; ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</main>

<?php
include '../layout/com_bottom.php';
