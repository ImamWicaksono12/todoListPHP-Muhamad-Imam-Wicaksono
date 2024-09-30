<?php
session_start();

// Hapus semua data tugas dari session
unset($_SESSION['tasks']);

// Set pesan sukses
$_SESSION['message'] = 'Semua data task telah dihapus!';
$_SESSION['type'] = 'success';

// Redirect kembali ke halaman daftar peserta
header("Location: listTask.php");
exit();
