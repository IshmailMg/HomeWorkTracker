<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];

    try {
        $stmt = $db->prepare("INSERT INTO tasks (task, deadline) VALUES (:task, :deadline)");
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->execute();
        echo 'success';
    } catch (PDOException $e) {
        echo 'error';
    }
}
