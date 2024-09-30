<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit_id = $_POST['edit_id'] ?? -1;

    $name = $_POST['name'];
    $category = $_POST['category'];
    $deadlineDate = $_POST['date'];

    $task = [
        "name" => $name,
        "deadline" => $deadlineDate,
        "category" => $category
    ];

    if ($edit_id != -1 && isset($_SESSION['tasks'][$edit_id])) {
        // Jika sedang mengedit, update user di index yang sesuai
        $_SESSION['tasks'][$edit_id] = $task;
        $_SESSION['type'] = 'success';
        $_SESSION['message'] = 'Data task berhasil diperbarui!';
    } else {
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = [];
        }
        $_SESSION['tasks'][] = $task;
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Data task berhasil ditambahkan";
    }
} else {
    $_SESSION['type'] = "danger";
    $_SESSION['message'] = "Data task gagal ditambahkan";
}
header("Location: index.php");
exit();
