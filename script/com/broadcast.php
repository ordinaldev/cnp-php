<?php
session_start();

$title = "Broadcast Loker";
// include '../global.php';


include '../function/Databases.php';
include '../session.php';
include '../layout/com_top.php';

$id = $_SESSION['id'];

?>

<main class="p-4 md:ml-64 h-auto pt-20">

    <div class="py-8 px-4 mx-auto lg:py-16">
        <h1 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Siarkan Lowongan Kerja Perusahaan Mu</h1>
        <form action="../function/Perusahaan.php" method="POST">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <input type="hidden" name="id_perusahaan" value="<?php echo e($_SESSION['id']); ?>">
                    <label for=" nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="<?= e($datac['nama_perusahaan']); ?>">
                </div>
                <div class="w-full">
                    <label for="judul_broadcast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Broadcast</label>
                    <input type="text" name="judul_broadcast" id="judul_broadcast" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Judul Broadcast" required>
                </div>
                <div class="w-full">
                    <label for="dateline_broadcast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Broadcast Akan Berakhir Pada</label>
                    <input type="date" name="dateline_broadcast" id="dateline_broadcast" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <div>
                    <label for="contact_broadcast" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak Yang Bisa Dihubungi</label>
                    <input type="text" name="contact_broadcast" id="contact_broadcast" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email/nomor wa" required>
                </div>
            </div>
            <div class="mx-4 my-4">
                <input id="x" type="hidden" name="isi_broadcast">
                <trix-editor input="x"></trix-editor>
            </div>
            <small>
                <input type="checkbox" required>Saya mengetahui broadcast yang sudah terpublish tidak bisa dihapus dan diedit
            </small>
            <br>
            <br>
            <button type="submit" name="broadcast_set" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                Publis
            </button>
        </form>
    </div>
</main>

<?php
include '../layout/com_bottom.php';
