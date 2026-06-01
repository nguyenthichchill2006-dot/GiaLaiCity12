<?php
// Bật session để có thể lưu thông báo
session_start();

// Gọi file kết nối cơ sở dữ liệu vào
require_once 'db.php';

$error = '';
$success = '';

// Kiểm tra xem người dùng có bấm nút Đăng ký (gửi form) chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form và loại bỏ khoảng trắng thừa
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = $_POST['password'];
    $re_pass  = $_POST['re-password'];

    // 1. Kiểm tra hai mật khẩu nhập vào có khớp nhau không
    if ($password !== $re_pass) {
        $error = "Mật khẩu nhập lại không trùng khớp!";
    } else {
        try {
            // 2. Kiểm tra xem Email này đã có ai đăng ký chưa
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->fetch()) {
                $error = "Email này đã được sử dụng cho tài khoản khác!";
            } else {
                // 3. Mã hóa mật khẩu để bảo mật tuyệt đối trước khi lưu vào database
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // 4. Thực hiện câu lệnh chèn (Insert) dữ liệu vào bảng users
                $sql = "INSERT INTO users (fullname, email, phone, password, role) VALUES (?, ?, ?, ?, 'user')";
                $insert_stmt = $pdo->prepare($sql);
                $insert_stmt->execute([$fullname, $email, $phone, $hashed_password]);

                $success = "Đăng ký tài khoản thành công! Đang chuyển hướng...";
                // Tự động chuyển hướng sang trang đăng nhập sau 2 giây
                header("refresh:2;url=login.php");
            }
        } catch (\PDOException $e) {
            $error = "Có lỗi xảy ra trong quá trình đăng ký: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản - Gia Lai Culture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-wrapper register-page">
    <div class="auth-sidebar">
        <div class="brand-header">
            <img src="images/logo.jpg" alt="Logo" class="brand-logo">
            <div class="brand-name">
                <h2>Gia Lai Culture</h2>
                <p>Kết nối tinh hoa - Lan tỏa bản sắc</p>
            </div>
        </div>
        <div class="brand-slogan">
            <p>"Cùng chung tay gìn giữ<br>và phát huy bản sắc Gia Lai"</p>
            <div class="decorator">♦ ❖ ♦</div>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="form-header">
            <h1>Đăng ký tài khoản</h1>
            <p>Tạo tài khoản để khám phá văn hóa Gia Lai</p>
        </div>

        <form action="" method="POST">
            <div class="input-box">
                <i class="fa-regular fa-user input-icon"></i>
                <input type="text" name="fullname" placeholder="Họ và tên" required>
            </div>

            <div class="input-box">
                <i class="fa-regular fa-envelope input-icon"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-box">
                <i class="fa-solid fa-phone input-icon"></i>
                <input type="tel" name="phone" placeholder="Số điện thoại" required>
            </div>

            <div class="input-box">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="password" id="reg-pass" placeholder="Mật khẩu" required>
                <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('reg-pass', this)"></i>
            </div>

            <div class="input-box">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="re-password" id="reg-repass" placeholder="Nhập lại mật khẩu" required>
                <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('reg-repass', this)"></i>
            </div>

            <div class="form-options">
                <label style="align-items: flex-start;">
                    <input type="checkbox" name="agree" required style="margin-top: 3px;">
                    <span>Tôi đồng ý với <a href="#">điều khoản sử dụng</a> và <a href="#">chính sách bảo mật</a></span>
                </label>
            </div>

            <button type="submit" class="btn-submit">Đăng ký</button>
        </form>

        <div class="switch-auth">
            Đã có tài khoản? <a href="login.php" class="normal-link">Đăng nhập ngay</a>
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