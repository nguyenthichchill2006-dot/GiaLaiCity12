<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Khóa bảo mật Admin
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header("Location: index.php");
    exit();
}

include 'db.php';

// Kiểm tra xem có nhận được ID bài viết cần xóa hay không
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Ép kiểu số nguyên để bảo mật chống SQL Injection

    // Truy vấn xóa bài viết
    $sql_delete = "DELETE FROM cultural_posts WHERE id = $id";
    
    if (mysqli_query($conn, $sql_delete)) {
        // Xóa thành công, chuyển hướng về trang quản lý bài viết kèm thông báo thành công nếu cần
        header("Location: admin_manage_posts.php");
        exit();
    } else {
        echo "Lỗi khi xóa dữ liệu: " . mysqli_error($conn);
    }
} else {
    header("Location: admin_manage_posts.php");
    exit();
}
?>