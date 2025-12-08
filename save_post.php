<?php
include "database_connection.php";
session_start(); // if using sessions for logged-in users

$user_id = 1; // replace with $_SESSION['user_id'] for logged-in users
$post_id = $_POST['post_id'];

if (isset($_POST['save_post'])) {
    // Check if already saved
    $check_sql = "SELECT * FROM saved_posts WHERE user_id=$user_id AND post_id=$post_id";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        // Insert into database
        $sql = "INSERT INTO saved_posts (user_id, post_id) VALUES ($user_id, $post_id)";
        mysqli_query($conn, $sql);
    }

    // Redirect back to the same page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>