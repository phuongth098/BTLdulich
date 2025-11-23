<?php
// add_comment.php - Xử lý thêm comment (gọi từ form)
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user = 'Anonymous'; // Có thể lấy từ session nếu có login
    $comment = $_POST['comment'];

    $stmt = $mysqli->prepare("INSERT INTO comments (post_id, user, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $user, $comment);
    $stmt->execute();

    header("Location: posts.php"); // Redirect về posts
    exit;
}
?>