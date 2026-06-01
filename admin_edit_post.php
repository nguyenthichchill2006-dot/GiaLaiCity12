<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header("Location: index.php");
    exit();
}

include 'db.php';
include 'header.php';

$msg = "";
$msg_class = "";

// 1. ĐỔ DỮ LIỆU CŨ LÊN FORM ĐỂ SỬA
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_get = "SELECT * FROM cultural_posts WHERE id = $id";
    $res_get = mysqli_query($conn, $sql_get);
    
    if (mysqli_num_rows($res_get) == 1) {
        $post = mysqli_fetch_assoc($res_get);
    } else {
        echo "<div class='container' style='margin-top:50px;'>Bài viết không tồn tại.</div>";
        exit();
    }
} else {
    header("Location: admin_manage_posts.php");
    exit();
}

// 2. XỬ LÝ KHI ADMIN BẤM NÚT "CẬP NHẬT BÀI VIẾT"
if (isset($_POST['btn_update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); // Nhận về 'cu' hoặc 'moi'
    
    $image_name = $post['image']; // Mặc định giữ nguyên ảnh cũ đang có trong DB
    
    // Nếu có chọn file ảnh mới để thay thế
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "images/";
        $new_image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $new_image_name;
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_name = $new_image_name; // Thay bằng tên file ảnh mới
        }
    }

    // Câu lệnh cập nhật SQL chuẩn hóa
    $sql_update = "UPDATE cultural_posts SET 
                    title = '$title', 
                    summary = '$summary', 
                    content = '$content', 
                    category = '$category', 
                    image = '$image_name' 
                   WHERE id = $id";
                   
    if (mysqli_query($conn, $sql_update)) {
        $msg = "Cập nhật bài viết văn hóa thành công!";
        $msg_class = "success-alert";
        // Cập nhật lại mảng dữ liệu để form hiển thị thông tin mới ngay lập tức
        $post['title'] = $title;
        $post['summary'] = $summary;
        $post['content'] = $content;
        $post['category'] = $category;
        $post['image'] = $image_name;
    } else {
        $msg = "Có lỗi xảy ra: " . mysqli_error($conn);
        $msg_class = "error-alert";
    }
}
?>

<div class="container" style="margin-top: 40px; margin-bottom: 50px; font-family: 'Roboto', sans-serif;">
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        <h2 style="color: #1b4d3e; border-bottom: 2px solid #e8f5e9; padding-bottom: 15px; margin-bottom: 25px;">
            <i class="fa-solid fa-file-pen"></i> CHỈNH SỬA BÀI VIẾT VĂN HÓA
        </h2>

        <?php if(!empty($msg)): ?>
            <div style="padding: 15px; background: #e8f5e9; color: #2e7d32; border-radius: 4px; margin-bottom: 20px; font-weight: bold;">
                🎉 <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:500; margin-bottom:8px;">Tiêu đề bài viết quảng bá <span style="color:red;">*</span></label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:500; margin-bottom:8px;">Thuộc danh mục văn hóa nào? <span style="color:red;">*</span></label>
                <select name="category" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:4px;">
                    <option value="cu" <?php echo ($post['category'] == 'cu' || $post['category'] == 'Văn hóa Gia Lai Cũ (Thuần Tây Nguyên)') ? 'selected' : ''; ?>>Văn hóa Gia Lai Cũ (Thuần Tây Nguyên)</option>
                    <option value="moi" <?php echo ($post['category'] == 'moi' || $post['category'] == 'Văn hóa Gia Lai Mới (Giao thoa Bình Định)') ? 'selected' : ''; ?>>Văn hóa Gia Lai Mới (Giao thoa Bình Định)</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:500; margin-bottom:8px;">Mô tả ngắn/Tóm tắt <span style="color:red;">*</span></label>
                <textarea name="summary" required style="width:100%; height:80px; padding:10px; border:1px solid #ddd; border-radius:4px;"><?php echo htmlspecialchars($post['summary']); ?></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; font-weight:500; margin-bottom:8px;">Hình ảnh đại diện bài viết hiện tại</label>
                <?php 
                    // Kiểm tra đường dẫn ảnh linh hoạt để hiển thị đúng ảnh cũ trên form quản trị
                    $preview_img = $post['image'];
                    if (!empty($preview_img) && strpos($preview_img, 'images/') === false) {
                        $preview_img = 'images/' . $preview_img;
                    }
                ?>
                <img src="<?php echo $preview_img; ?>" style="width: 150px; border-radius: 4px; display: block; margin-bottom: 10px; border: 1px solid #eee;">
                <input type="file" name="image" style="width:100%; padding:5px; border:1px solid #ddd; border-radius:4px;">
                <small style="color:#666;">(Chỉ chọn file mới nếu bạn muốn thay đổi ảnh đại diện)</small>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display:block; font-weight:500; margin-bottom:8px;">Nội dung chi tiết bài viết <span style="color:red;">*</span></label>
                <textarea name="content" required style="width:100%; height:250px; padding:10px; border:1px solid #ddd; border-radius:4px;"><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                <a href="admin_manage_posts.php" style="background: #cfd8dc; color: #37474f; padding: 12px 20px; border-radius: 4px; text-decoration: none; font-weight: bold;">Hủy bỏ</a>
                <button type="submit" name="btn_update" style="background: #1b4d3e; color: white; padding: 12px 25px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                    <i class="fa-solid fa-floppy-disk"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>