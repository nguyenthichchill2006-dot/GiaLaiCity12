<?php 
// 1. Kết nối cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "gialai");
mysqli_set_charset($conn, "utf8mb4");

// 2. Tải thanh Header
include 'header.php'; 

// 3. Lấy loại văn hóa từ URL
$type = isset($_GET['type']) ? $_GET['type'] : '';
?>

<link rel="stylesheet" href="css/culture.css?v=<?php echo time(); ?>">

<div class="culture-pure-isolated">

    <?php if($type == ''): ?>
        <div class="category-wrapper-split">
            
            <div class="category-box-split box-left" style="background-image: url('images/vhgialai.jpg') !important;">
                <div class="box-overlay">
                    <div class="box-content-inner">
                        <span class="box-subtitle-top">DI SẢN ĐẠI NGÀN</span>
                        <h2 class="box-title-split">Văn Hóa Gia Lai Tây<br><span>(Thuần Tây Nguyên)</span></h2>
                        <p class="box-desc-split">Tìm hiểu về không gian văn hóa cồng chiêng, kiến trúc nhà rông cổ kính, sử thi đại ngàn hùng vĩ cùng các lễ hội đâm trâu, lễ bỏ mả lâu đời của đồng bào dân tộc Jrai, Ba Na...</p>
                        <a href="vanhoa.php?type=cu" class="category-btn-split">Khám phá ngay &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="category-box-split box-right" style="background-image: url('images/vhbinhdinh.jpg') !important;">
                <div class="box-overlay">
                    <div class="box-content-inner">
                        <span class="box-subtitle-top">TINH HOA ĐẤT VÕ</span>
                        <h2 class="box-title-split">Văn Hóa Gia Lai Đông<br><span>(Giao Thoa Bình Định)</span></h2>
                        <p class="box-desc-split">Khám phá dòng chảy văn hóa thầm lặng từ đất võ Bình Định lên vùng đất cao nguyên: Những ngôi làng kinh tế mới, nghệ thuật hô Bài Chòi di sản nhân loại và nét ẩm thực độc đáo...</p>
                        <a href="vanhoa.php?type=moi" class="category-btn-split">Khám phá ngay &rarr;</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="culture-features-strip">
            
            <div class="feature-item">
                <div class="feature-icon-wrapper">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="feature-text">
                    <h4>Bảo tồn di sản</h4>
                    <p>Gìn giữ và phát huy giá trị văn hóa truyền thống</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon-wrapper">
                    <i class="fa-solid fa-hands-holding-child"></i>
                </div>
                <div class="feature-text">
                    <h4>Giao thoa văn hóa</h4>
                    <p>Kết nối tinh hoa giữa Tây Nguyên và Duyên hải</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon-wrapper">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="feature-text">
                    <h4>Lan tỏa bản sắc</h4>
                    <p>Quảng bá văn hóa Việt Nam đến bạn bè thế giới</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon-wrapper">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="feature-text">
                    <h4>Cộng đồng</h4>
                    <p>Xây dựng cộng đồng yêu văn hóa, du lịch bền vững</p>
                </div>
            </div>

        </div>

    <?php else: 
        // ĐỒNG BỘ HOÀN TOÀN VỚI CSS MỚI: ĐỔI TẤT CẢ CLASS THÀNH MODERN
        $category_title = ($type == 'cu') ? 'Văn Hóa Gia Lai Tây' : 'Văn Hóa Gia Lai Đông';
        $category_subtitle = ($type == 'cu') ? 'Thuần Tây Nguyên' : 'Giao Thoa Bình Định';
        
        if ($type == 'cu') {
            $query = "SELECT * FROM cultural_posts WHERE (category = 'cu' OR category = 'Văn hóa Gia Lai Cũ (Thuần Tây Nguyên)') ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM cultural_posts WHERE (category = 'moi' OR category = 'Văn hóa Gia Lai Mới (Giao thoa Bình Định)') ORDER BY id DESC";
        }
        $result = mysqli_query($conn, $query);
    ?>
        <div class="list-posts-wrapper-inner">
            
            <div class="list-posts-header">
                <a href="vanhoa.php" class="back-btn-modern">
                    <i class="fa-solid fa-arrow-left-long"></i> Quay lại danh mục chính
                </a>
                <span class="culture-mini-tag">Khám phá di sản</span>
                <h2 class="culture-main-title"><?php echo $category_title; ?> <span>(<?php echo $category_subtitle; ?>)</span></h2>
                <div class="title-divider"></div>
                <p class="culture-lead-text">Tổng hợp những nét văn hóa đặc trưng, di sản phi vật thể và dòng chảy nếp sống lâu đời qua các thời kỳ lịch sử.</p>
            </div>
            
            <div class="culture-grid-modern">
                <?php 
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $date = date('d/m/Y', strtotime($row['created_at']));
                        
                        $image_src = $row['image'];
                        if (!empty($image_src) && strpos($image_src, 'images/') === false) {
                            $image_src = 'images/' . $image_src;
                        }
                ?>
                        <div class="culture-card-modern">
                            <div class="card-img-wrap">
                                <img src="<?php echo $image_src; ?>" alt="<?php echo $row['title']; ?>" class="card-img-inside">
                                <span class="card-tag-badge"><?php echo $category_subtitle; ?></span>
                            </div>
                            
                            <div class="card-body-inside">
                                <div class="card-meta-info">
                                    <span class="card-date-modern"><i class="fa-regular fa-calendar-days"></i> <?php echo $date; ?></span>
                                    <span class="card-author-modern"><i class="fa-regular fa-user"></i> Ban biên tập</span>
                                </div>
                                <h3 class="card-title-modern"><?php echo $row['title']; ?></h3>
                                <p class="card-text-modern"><?php echo $row['summary']; ?></p>
                                <a href="baiviet.php?slug=<?php echo $row['slug']; ?>" class="readmore-btn-modern">
                                    Đọc bài viết <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                <?php 
                    }
                } else {
                    echo "<div class='empty-posts-state'>
                            <i class='fa-solid fa-folder-open'></i>
                            <p>Hiện chưa có bài viết nào trong mục này. Chúng tôi sẽ cập nhật sớm!</p>
                          </div>";
                }
                ?>
            </div>
            
        </div>
    <?php endif; ?>

</div>

<?php 
// 4. Tải thanh Footer
include 'footer.php'; 
?>