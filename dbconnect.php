<?php
$dsn = "mysql:=localhost; dbmane=homeworktracker";
$username = 'root';
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<script src="script.js"></script>