<?php
session_start();
$error = "";

if (isset($_POST['btn_login'])) {
    $conn = mysqli_connect("localhost", "root", "", "gialai");
    
    $username = mysqli_real_string_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); // Mã hóa MD5 để check với DB

    // Truy vấn thẳng vào bảng admin mới tạo
    $query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $admin_data = mysqli_fetch_assoc($result);
        
        // Cấp quyền Admin cho phiên làm việc này
        $_SESSION['admin_logged'] = true;
        $_SESSION['admin_name'] = $admin_data['fullname'];
        
        // Đăng nhập thẳng vào trang thêm bài viết
        header("Location: admin_add_post.php");
        exit();
    } else {
        $error = "Tài khoản hoặc Mật khẩu Admin không chính xác!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Ban Quản Trị</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 350px;">
        <h2 style="text-align: center; color: #1b4d3e; margin-bottom: 30px;">ADMIN LOGIN</h2>
        
        <?php if(!empty($error)): ?>
            <p style="color: red; text-align: center; font-size: 14px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="admin_login.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            <input type="text" name="username" required placeholder="Tên đăng nhập Admin" style="padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            <input type="password" name="password" required placeholder="Mật khẩu Admin" style="padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" name="btn_login" style="background: #1b4d3e; color: white; padding: 12px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">Đăng nhập hệ thống</button>
        </form>
    </div>

</body>
</html>