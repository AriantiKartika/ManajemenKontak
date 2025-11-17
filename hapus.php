<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
$id = $_GET['id'];
unset($_SESSION['kontak'][$id]);
header('Location: index.php');
exit();
?>
