<?php
session_start();

$title = "Dashboard";

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

        $see = mysqli_query($db, "SELECT * FROM mahasiswa where nim='$id'");
        if (mysqli_num_rows($see) > 0) {
        ?>

            <div class="w-100 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  dark:border-gray-700 dark:bg-gray-800 ">
                <div class="flex flex-col justify-between p-4 leading-normal w-full">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Biodata </h5>
                    <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"></p> -->
                    <div class="flex mx-8">

                        <table class="text-gray-900 dark:text-white px-8 py-8">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?= e($data['nama']); ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Induk Mahasiswa</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($data['id']); ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($m['alamat']); ?></td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($m['nomor_hp']); ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Email</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($m['email']); ?></td>
                            </tr>

                            <tr>
                                <td>TTL</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($m['tempat_lahir']) . e($m['tanggal_lahir']); ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><?php echo e($m['agama']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        <?php
        } else {
        ?> <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Kamu Belum Mengisi Biodata!.</span> isi Biodata Terlebih dahulu.
            </div>
            <br>
            <a href="./biodata.php" class="w-1/2 focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 text-center">Klik Untuk mengisi Biodata</a>

            <!-- <button @click="openModal" class=" py-2 w-1/2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Isi Biodata
            </button>

            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
                    <header class="flex justify-end">
                        <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </header>
                    <div class="mt-4 mb-6">
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                            Modal header
                        </p>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                            eligendi repudiandae voluptatem tempore!
                        </p>
                    </div>
                    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </button>
                        <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Accept
                        </button>
                    </footer>
                </div>
            </div> -->

        <?php
        }
        ?>
    </div>



</main>




<?php

include '../layout/mhs_bottom.php';
