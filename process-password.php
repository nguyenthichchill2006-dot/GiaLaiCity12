<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra quyền truy cập đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Gọi file kết nối cơ sở dữ liệu
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id          = $_SESSION['user_id'];
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Kiểm tra không được bỏ trống thông tin bắt buộc
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Vui lòng điền đầy đủ các trường bắt buộc!"));
        exit();
    }

    // 2. Kiểm tra độ dài mật khẩu mới
    if (strlen($new_password) < 6) {
        header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Mật khẩu mới phải từ 6 ký tự trở lên!"));
        exit();
    }

    // 3. Kiểm tra mật khẩu mới và xác nhận mật khẩu đã trùng nhau chưa
    if ($new_password !== $confirm_password) {
        header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Xác nhận mật khẩu mới không trùng khớp!"));
        exit();
    }

    try {
        // 4. Lấy mật khẩu mã hóa hiện tại trong cơ sở dữ liệu của cơ sở người dùng
        $sql = "SELECT password FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // 5. Kiểm tra mật khẩu cũ người dùng nhập vào có khớp với hash trong DB không
            if (!password_verify($current_password, $user['password'])) {
                header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Mật khẩu hiện tại không chính xác!"));
                exit();
            }

            // 6. Mã hóa an toàn mật khẩu mới trước khi lưu vào DB
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            // 7. Tiến hành cập nhật mật khẩu mới vào Database
            $update_sql = "UPDATE users SET password = :password WHERE id = :id";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([
                ':password' => $new_password_hash,
                ':id'       => $user_id
            ]);

            // Trả về kết quả thành công hoàn toàn
            header("Location: profile.php?tab=password&pwd_status=success");
            exit();
        } else {
            header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Tài khoản không tồn tại trên hệ thống!"));
            exit();
        }

    } catch (PDOException $e) {
        header("Location: profile.php?tab=password&pwd_status=error&message=" . urlencode("Lỗi hệ thống CSDL: " . $e->getMessage()));
        exit();
    }
} else {
    // Nếu truy cập trái phép bằng URL, đẩy về lại trang mật khẩu
    header("Location: profile.php?tab=password");
    exit();
}