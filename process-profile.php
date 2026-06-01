<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra quyền đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Gọi file kết nối cơ sở dữ liệu của bạn vào
// Hãy chắc chắn rằng file 'db.php' của bạn đã khởi tạo biến kết nối (ví dụ: $conn hoặc $pdo)
require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    
    // Nhận và làm sạch dữ liệu đầu vào từ form
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $birthday  = trim($_POST['birthday']);
    $gender    = trim($_POST['gender']);
    $address   = trim($_POST['address']);
    $bio       = trim($_POST['bio']);
    
    // Mặc định giữ lại ảnh cũ từ Session nếu người dùng không chọn ảnh mới
    $avatar_path = isset($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : 'images/default-avatar.png';

    // XỬ LÝ UPLOAD ẢNH ĐẠI DIỆN (Nếu có file chọn lên và không bị lỗi)
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['avatar']['tmp_name'];
        $file_name     = $_FILES['avatar']['name'];
        $file_size     = $_FILES['avatar']['size'];
        $file_type     = $_FILES['avatar']['type'];
        
        // Trích xuất đuôi mở rộng của file (ví dụ: jpg, png)
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        // Kiểm tra định dạng hợp lệ
        if (in_array($file_ext, $allowed_extensions)) {
            // Kiểm tra dung lượng file giới hạn 2MB
            if ($file_size <= 2 * 1024 * 1024) {
                
                // Tạo thư mục 'uploads' nếu chưa tồn tại trong dự án
                $upload_dir = 'uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                // Đổi tên file ngẫu nhiên để tránh trùng lặp đè file cũ
                $new_file_name = 'avatar_' . $user_id . '_' . time() . '.' . $file_ext;
                $dest_path = $upload_dir . $new_file_name;

                // Tiến hành di chuyển file từ thư mục tạm vào thư mục dự án
                if (move_uploaded_file($file_tmp_path, $dest_path)) {
                    $avatar_path = $dest_path; // Gán đường dẫn ảnh mới thành công
                }
            }
        }
    }

    // CẬP NHẬT DỮ LIỆU VÀO DATABASE (Sử dụng PDO chuẩn bảo mật)
    try {
        // Bạn hãy kiểm tra lại tên các trường (column) trong bảng người dùng (users) của bạn xem đã khớp chưa nhé
        $sql = "UPDATE users SET 
                    fullname = :fullname, 
                    email = :email, 
                    phone = :phone, 
                    birthday = :birthday, 
                    gender = :gender, 
                    address = :address, 
                    bio = :bio, 
                    avatar = :avatar 
                WHERE id = :id";
                
        $stmt = $pdo->prepare($sql); // Thay $pdo bằng biến kết nối database của bạn nếu khác tên
        
        $stmt->execute([
            ':fullname' => $full_name,
            ':email'    => $email,
            ':phone'    => $phone,
            ':birthday' => $birthday,
            ':gender'   => $gender,
            ':address'  => $address,
            ':bio'      => $bio,
            ':avatar'   => $avatar_path,
            ':id'       => $user_id
        ]);

        // Cập nhật lại ngay lập tức dữ liệu mới vào Session để giao diện Header hiển thị đúng đồng bộ
        $_SESSION['user_name']   = $full_name;
        $_SESSION['user_email']  = $email;
        $_SESSION['user_avatar'] = $avatar_path;

        // Chuyển hướng người dùng quay lại trang profile kèm thông báo thành công
        header("Location: profile.php?status=success");
        exit();

    } catch (PDOException $e) {
        // Trường hợp lỗi kết nối hoặc truy vấn database
        header("Location: profile.php?status=error&message=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Nếu truy cập trái phép bằng phương thức GET, đẩy ngược lại trang cá nhân
    header("Location: profile.php");
    exit();
}