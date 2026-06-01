<?php
// 1. KHỞI ĐỘNG SESSION VÀ KIỂM TRA BẢO MẬT (Phải đặt ở đầu file)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ổ KHÓA BẢO MẬT: Nếu không tồn tại session đăng nhập của admin, đá văng về trang chủ lập tức
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    echo "<script>
            alert('Trang này chỉ dành riêng cho Ban Quản Trị Nhóm!');
            window.location.href = 'index.php';
          </script>";
    exit(); // Dừng toàn bộ code phía dưới không cho chạy tiếp
}

// Nhúng thanh Header để giữ nguyên giao diện đẹp đẽ của website
include 'header.php';

// Khởi tạo các biến thông báo
$msg = "";
$msg_class = "";

// XỬ LÝ KHI NGƯỜI DÙNG BẤM NÚT "ĐĂNG BÀI VIẾT"
if (isset($_POST['btn_submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "gialai");
    mysqli_set_charset($conn, "utf8mb4");

    // Lấy dữ liệu từ form và chống hack SQL Injection
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category = $_POST['category']; // Nhận giá trị 'cu' hoặc 'moi'

    // Tự động tạo slug từ tiêu đề (Dùng cho đường dẫn thân thiện)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

    // Xử lý Upload hình ảnh bài viết
    $target_dir = "images/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;

    if (!empty($image_name)) {
        // Kiểm tra xem có đúng là file ảnh không
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // ĐỒNG BỘ: Chỉ lưu nguyên tên file vào CSDL
                $db_image_path = $image_name;
            } else {
                $uploadOk = 0;
                $msg = "Lỗi khi tải ảnh lên thư mục.";
                $msg_class = "alert-danger";
            }
        } else {
            $uploadOk = 0;
            $msg = "File tải lên không phải là hình ảnh hợp lệ.";
            $msg_class = "alert-danger";
        }
    } else {
        // Nếu không chọn ảnh, lấy ảnh mặc định
        $db_image_path = "default_culture.jpg";
    }

    // Nếu upload ảnh không lỗi, tiến hành chèn vào Database
    if ($uploadOk == 1) {
        $sql = "INSERT INTO `cultural_posts` (`title`, `slug`, `summary`, `content`, `image`, `category`) 
                VALUES ('$title', '$slug', '$summary', '$content', '$db_image_path', '$category')";
        
        if (mysqli_query($conn, $sql)) {
            $msg = "🎉 Đăng bài viết quảng bá văn hóa thành công!";
            $msg_class = "alert-success";
        } else {
            $msg = "Lỗi Database: " . mysqli_error($conn);
            $msg_class = "alert-danger";
        }
    }
}
?>

<div class="container" style="margin-top: 40px; min-height: 80vh; max-width: 800px; padding: 0 20px; font-family: 'Segoe UI', sans-serif;">
    
    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #eee;">
        
        <h2 style="color: #1b4d3e; font-weight: 700; margin-bottom: 5px;"><i class="fa-solid fa-file-pen"></i> TRANG QUẢN TRỊ - THÊM BÀI VIẾT VĂN HÓA</h2>
        <p style="color: #666; margin-bottom: 25px;">Xin chào, <strong><?php echo $_SESSION['admin_name']; ?></strong>. Hệ thống tự động lưu vào MySQL cho trang Gia Lai Culture.</p>

        <?php if (!empty($msg)): ?>
            <div style="padding: 15px; margin-bottom: 20px; border-radius: 6px; font-weight: 500; 
                background-color: <?php echo ($msg_class == 'alert-success') ? '#e8f5e9' : '#ffebee'; ?>; 
                color: <?php echo ($msg_class == 'alert-success') ? '#2e7d32' : '#c62828'; ?>;
                border: 1px solid <?php echo ($msg_class == 'alert-success') ? '#c8e6c9' : '#ffcdd2'; ?>;">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form action="admin_add_post.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            
            <div>
                <label style="font-weight: 600; color: #333; display: block; margin-bottom: 8px;">Tiêu đề bài viết quảng bá <span style="color:red;">*</span></label>
                <input type="text" name="title" required placeholder="Ví dụ: Lễ hội đâm trâu của người Ba Na..." 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;">
            </div>

            <div>
                <label style="font-weight: 600; color: #333; display: block; margin-bottom: 8px;">Thuộc danh mục văn hóa nào? <span style="color:red;">*</span></label>
                <select name="category" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px;">
                    <option value="cu">Văn hóa Gia Lai Cũ (Thuần Tây Nguyên)</option>
                    <option value="moi">Văn hóa Gia Lai Mới (Giao thoa Bình Định)</option>
                </select>
            </div>

            <div>
                <label style="font-weight: 600; color: #333; display: block; margin-bottom: 8px;">Mô tả ngắn/Tóm tắt <span style="color:red;">*</span></label>
                <textarea name="summary" required rows="3" placeholder="Viết một đoạn ngắn thu hút người đọc hiển thị ngoài danh sách bài viết..." 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-family: inherit; box-sizing: border-box;"></textarea>
            </div>

            <div>
                <label style="font-weight: 600; color: #333; display: block; margin-bottom: 8px;">Hình ảnh đại diện bài viết</label>
                <input type="file" name="image" accept="image/*" style="width: 100%; padding: 8px; border: 1px solid #eee; background: #fafafa; border-radius: 6px;">
            </div>

            <div>
                <label style="font-weight: 600; color: #333; display: block; margin-bottom: 8px;">Nội dung chi tiết bài viết <span style="color:red;">*</span></label>
                <textarea name="content" required rows="8" placeholder="Viết toàn bộ nội dung chi tiết của bài viết tại đây..." 
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-family: inherit; box-sizing: border-box;"></textarea>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 10px; justify-content: flex-end;">
                <a href="vanhoa.php" style="padding: 12px 24px; border: 1px solid #ccc; border-radius: 6px; text-decoration: none; color: #555; font-weight: 500; text-align: center;">Xem trang văn hóa</a>
                <button type="submit" name="btn_submit" style="background: #1b4d3e; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s;">
                    <i class="fa-solid fa-paper-plane"></i> Đăng bài viết ngay
                </button>
            </div>

        </form>
    </div>
</div>

<?php include 'footer.php'; ?>