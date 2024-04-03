<?php
include 'config.php';

try {
    $stmt = $db->query("SELECT * FROM tasks ORDER BY deadline");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Failed to fetch tasks: ' . $e->getMessage());
}

foreach ($tasks as $task) {
    echo '<li><span>' . $task['task'] . '</span> - Deadline: ' . $task['deadline'] . ' <button class="delete-btn">Delete</button></li>';
} ?>
<script src="script.js"></script>