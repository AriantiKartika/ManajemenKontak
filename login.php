<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === 'admin' && $pass === '123') {
        $_SESSION['login'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Login Sistem</h2>
        
        <form method="POST" class="space-y-5">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" id="username" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                              focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                              focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <input type="submit" value="Login"
                   class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md 
                          shadow-md hover:bg-blue-700 cursor-pointer transition duration-300">
        </form>

        <?php if (isset($error)): ?>
            <p class="mt-4 text-center text-red-600 font-medium"><?= $error ?></p>
        <?php endif; ?>
    </div>

</body>
</html>