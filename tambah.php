<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $tel  = trim($_POST['telepon']);
    $email = trim($_POST['email']);
    if ($nama && $tel && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $ids = array_keys($_SESSION['kontak']);
        $idBaru = $ids ? max($ids) + 1 : 1; 
        
        $_SESSION['kontak'][$idBaru] = [
            'nama' => $nama,
            'telepon' => $tel,
            'email' => $email
        ];
        header('Location: index.php');
        exit();
    } else {
        $error = "Data tidak valid! Pastikan semua field terisi dan email valid.";
    }
}

// 1. Panggil header (container sederhana)
include 'header.php'; 
?>

<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Kontak Baru</h2>

    <form method="POST" class="space-y-5">
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" name="nama" id="nama" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon:</label>
            <input type="text" name="telepon" id="telepon" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" name="email" id="email" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                          focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <input type="submit" value="Simpan"
                   class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-md 
                          shadow-md hover:bg-blue-700 cursor-pointer transition duration-300">
            <a href="index.php" 
               class="ml-3 px-5 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md 
                      shadow-md hover:bg-gray-300 cursor-pointer transition duration-300">
               Batal
            </a>
        </div>
    </form>

    <?php if (isset($error)): ?>
        <p class="mt-4 text-red-600 font-medium"><?= $error ?></p>
    <?php endif; ?>

</div>

<?php
// 2. Panggil footer
include 'footer.php'; 
?>