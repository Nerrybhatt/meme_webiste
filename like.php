<?php
include "database_connection.php";

$id = $_GET['id'];
$type = $_GET['type']; // like OR dislike

if ($type === "like") {
    $sql = "UPDATE post SET like_count = like_count + 1 WHERE id = $id";
} elseif ($type === "dislike") {
    $sql = "UPDATE post SET dislike_count = dislike_count + 1 WHERE id = $id";
}

mysqli_query($conn, $sql);

mysqli_close($conn);

// Redirect back to homepage
header("Location: index.php");
exit();
?>