<?php
if (!isset($_SESSION['kontak'])) {
    $_SESSION['kontak'] = [
        1 => [
            'nama' => 'Arianti Kartika', 
            'telepon' => '081211112222', 
            'email' => 'arianti@mail.com'
        ],
        2 => [
            'nama' => 'Dimas Bambang', 
            'telepon' => '081322223333', 
            'email' => 'dimas@mail.com'
        ],
        3 => [
            'nama' => 'Ahafizh Fajar', 
            'telepon' => '081433334444', 
            'email' => 'ahafizh@mail.com'
        ],
        4 => [
            'nama' => 'Muhammad Ifan, S.T., M.T.', 
            'telepon' => '081544445555', 
            'email' => 'ifan.mt@mail.com'
        ]
    ];
}
?>