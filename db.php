<?php
// 1. Khai báo các thông số cấu hình cơ sở dữ liệu
$host     = 'localhost';      // Tên server (mặc định của XAMPP là localhost)
$db_name  = 'gialai'; // TÊN DATABASE CỦA BẠN
$username = 'root';           // Tài khoản mặc định của XAMPP là root
$password = '';               // Mật khẩu mặc định của XAMPP là để trống
$charset  = 'utf8mb4';        // Đảm bảo lưu tiếng Việt có dấu không bị lỗi font

// ========================================================
// [CẤU HÌNH CŨ] - KẾT NỐI QUA PDO (Dành cho các file cũ của bạn)
// ========================================================
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    die("Lỗi kết nối cơ sở dữ liệu rồi bạn ơi: " . $e->getMessage());
}

// ========================================================
// [THÊM MỚI] - KẾT NỐI QUA MYSQLI (Dành cho chức năng Thêm, Sửa, Xóa)
// ========================================================
$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    die("Kết nối MySQLi thất bại rồi bạn ơi: " . mysqli_connect_error());
}
mysqli_set_charset($conn, $charset);
?>