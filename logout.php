<?php
session_start();
session_destroy(); // Xóa sạch phiên đăng nhập
header("Location: index.php"); // Quay lại trang chủ công cộng
exit();
?>