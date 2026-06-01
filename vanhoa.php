<?php 
// 1. Kết nối cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "gialai");
mysqli_set_charset($conn, "utf8mb4");

// 2. Tải thanh Header
include 'header.php'; 

// 3. Lấy loại văn hóa từ URL
$type = isset($_GET['type']) ? $_GET['type'] : '';
?>

<link rel="stylesheet" href="culture.css">

<div class="container" style="margin-top: 30px; min-height: 80vh; padding: 0 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <?php if($type == ''): ?>
        <div class="culture-banner">
            <div>
                <h1 style="font-size: 36px; font-weight: 700; margin-bottom: 10px;">DI SẢN VĂN HÓA GIA LAI</h1>
                <p style="font-size: 16px; font-weight: 300;">Nơi hội tụ hào khí đại ngàn Tây Nguyên và tinh hoa đất võ Bình Định</p>
            </div>
        </div>
        
        <div class="category-wrapper">
            <div class="category-box">
                <img src="images/gialai.jpg" alt="Gia Lai cũ">
                <h3 style="color: #1b4d3e; margin-top: 15px; font-weight: 600;">Văn Hóa Gia Lai Cũ (Thuần Tây Nguyên)</h3>
                <p style="color: #666; font-size: 14px; min-height: 60px; line-height: 1.6;">Tìm hiểu về không gian văn hóa cồng chiêng, kiến trúc nhà rông, sử thi cổ đại và các lễ hội đâm trâu, bỏ mả lâu đời của đồng bào Jrai, Ba Na...</p>
                <a href="vanhoa.php?type=cu" class="category-btn">Khám phá ngay</a>
            </div>

            <div class="category-box">
                <img src="images/binhdinh.jpg" alt="Gia Lai mới">
                <h3 style="color: #1b4d3e; margin-top: 15px; font-weight: 600;">Văn Hóa Gia Lai Mới (Giao Thoa Bình Định)</h3>
                <p style="color: #666; font-size: 14px; min-height: 60px; line-height: 1.6;">Khám phá dòng chảy văn hóa thầm lặng từ đất võ Bình Định lên cao nguyên: những ngôi làng Kinh định cư mới, điệu nghệ thuật Bài Chòi và nét ẩm thực độc đáo...</p>
                <a href="vanhoa.php?type=moi" class="category-btn">Khám phá ngay</a>
            </div>
        </div>

    <?php else: 
        // ĐỒNG BỘ TIÊU ĐỀ DANH MỤC
        $category_title = ($type == 'cu') ? 'Văn Hóa Gia Lai Cũ (Thuần Tây Nguyên)' : 'Văn Hóa Gia Lai Mới (Giao Thoa Bình Định)';
        
        // TRUY VẤN THÔNG MINH: Quét cả chuỗi viết tắt lẫn chuỗi tiếng Việt dài để không bỏ sót dữ liệu cũ
        if ($type == 'cu') {
            $query = "SELECT * FROM cultural_posts WHERE (category = 'cu' OR category = 'Văn hóa Gia Lai Cũ (Thuần Tây Nguyên)') ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM cultural_posts WHERE (category = 'moi' OR category = 'Văn hóa Gia Lai Mới (Giao thoa Bình Định)') ORDER BY id DESC";
        }
        $result = mysqli_query($conn, $query);
    ?>
        <a href="vanhoa.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Quay lại danh mục văn hóa</a>
        <h2 class="culture-title"><?php echo $category_title; ?></h2>
        <p style="color: #666; margin-bottom: 30px;">Tổng hợp những nét văn hóa, di sản phi vật thể và nếp sống đặc trưng qua từng thời kỳ.</p>
        
        <div class="culture-grid">
            <?php 
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $date = date('d/m/Y', strtotime($row['created_at']));
                    
                    // LÔGIC SỬA LỖI ĐƯỜNG DẪN ẢNH:
                    // Nếu chuỗi trong DB chưa có tiền tố "images/", ta tự động nối vào để tránh lỗi nhân đôi images/images/
                    $image_src = $row['image'];
                    if (!empty($image_src) && strpos($image_src, 'images/') === false) {
                        $image_src = 'images/' . $image_src;
                    }
            ?>
                    <div class="culture-card">
                        <img src="<?php echo $image_src; ?>" alt="<?php echo $row['title']; ?>" class="card-img">
                        <div class="card-body">
                            <span class="card-date"><i class="fa-regular fa-calendar"></i> Đăng ngày: <?php echo $date; ?></span>
                            <h3 class="card-title"><?php echo $row['title']; ?></h3>
                            <p class="card-text"><?php echo $row['summary']; ?></p>
                            <a href="baiviet.php?slug=<?php echo $row['slug']; ?>" class="readmore-btn">
                                Xem chi tiết <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
            <?php 
                }
            } else {
                echo "<p style='grid-column: 1/-1; text-align: center; color: #999; padding: 40px 0;'>Hiện chưa có bài viết nào trong mục này. Chúng tôi sẽ cập nhật sớm!</p>";
            }
            ?>
        </div>
    <?php endif; ?>

</div>

<?php 
// 4. Tải thanh Footer
include 'footer.php'; 
?>