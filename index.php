<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
include 'data.php';

// 1. Panggil header (container sederhana)
include 'header.php'; 
?>

<h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Daftar Kontak</h2>

<div class="flex justify-between items-center mb-6">
    <a href="tambah.php" 
       class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300">
       + Tambah Kontak
    </a>
    
    <a href="logout.php" 
       class="px-5 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300">
       Logout
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        
        <thead class="bg-blue-100"> 
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Telepon</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($_SESSION['kontak'] as $id => $k): ?>
            <tr class="hover:bg-gray-50"> 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $id ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($k['nama']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($k['telepon']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($k['email']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            
                    <a href="edit.php?id=<?= $id ?>" 
                        class="inline-block px-4 py-2 bg-green-600 text-white font-semibold text-xs rounded-md shadow-md hover:bg-green-700 transition duration-300">
                        Edit
                    </a>
            
                    <a href="hapus.php?id=<?= $id ?>" 
                        onclick="return confirm('Hapus kontak?')" 
                        class="inline-block px-4 py-2 bg-red-600 text-white font-semibold text-xs rounded-md shadow-md hover:bg-red-700 transition duration-300 ml-2">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// 2. Panggil footer
include 'footer.php'; 
?>