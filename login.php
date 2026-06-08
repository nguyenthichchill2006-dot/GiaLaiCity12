<?php
// Khởi động Session
session_start();

require_once 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        // ==================== KIỂM TRA ADMIN TRƯỚC ====================
        $stmt_admin = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt_admin->execute([$username]);
        $admin = $stmt_admin->fetch();

        if ($admin && md5($password) === $admin['password']) {
            // Đăng nhập Admin
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_name']   = $admin['fullname'];

            // Xóa session user để tránh xung đột
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);

            header("Location: admin_add_post.php");
            exit();
        }

        // ==================== KIỂM TRA USER ====================
        $stmt_user = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt_user->execute([$username]);
        $user = $stmt_user->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập User thành công
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['fullname'];
            $_SESSION['user_role']  = $user['role'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_avatar']= $user['avatar'] ?? 'images/default.jpg';

            // Xóa session admin để tránh xung đột
            unset($_SESSION['admin_logged']);
            unset($_SESSION['admin_name']);

            header("Location: index.php");
            exit();
        } 

        // Nếu không khớp Admin lẫn User
        $error = "Tài khoản hoặc mật khẩu không chính xác!";

    } catch (\PDOException $e) {
        $error = "Lỗi hệ thống: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Gia Lai Culture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-wrapper login-page">
    <div class="auth-sidebar">
        <div class="brand-header">
            <img src="images/logo.jpg" alt="Logo" class="brand-logo">
            <div class="brand-name">
                <h2>Gia Lai Culture</h2>
                <p>Kết nối tinh hoa - Lan tỏa bản sắc</p>
            </div>
        </div>
        <div class="brand-slogan">
            <p>"Khám phá văn hóa –<br>Kết nối yêu thương"</p>
            <div class="decorator">♦ ❖ ♦</div>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="form-header">
            <h1>Đăng nhập</h1>
            <p>Chào mừng bạn trở lại với Gia Lai Culture</p>
        </div>

        <form action="" method="POST">
            <div class="input-box">
                <i class="fa-regular fa-user input-icon"></i>
                <input type="text" name="username" placeholder="Email hoặc số điện thoại" required>
            </div>

            <div class="input-box">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="password" id="login-pass" placeholder="Mật khẩu" required>
                <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('login-pass', this)"></i>
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                </label>
                <a href="#">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="btn-submit">Đăng nhập</button>
        </form>

        <div class="switch-auth login-switch">
            <p>Bạn chưa có tài khoản?</p>
            <a href="register.php" class="btn-switch-link">Đăng ký ngay</a>
        </div>
    </div>
</div>

<script>
    function togglePassword(id, icon) {
        const field = document.getElementById(id);
        if (field.type === "password") {
            field.type = "text";
            icon.className = "fa-regular fa-eye-slash toggle-password";
        } else {
            field.type = "password";
            icon.className = "fa-regular fa-eye toggle-password";
        }
    }
</script>
</body>
</html>