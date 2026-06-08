<?php 
// 1. Kết nối cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "gialai");
mysqli_set_charset($conn, "utf8mb4");

// 2. Tải thanh Header
include 'header.php'; 

// 3. Lấy các tham số bộ lọc từ URL
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$category = isset($_GET['cat']) ? mysqli_real_escape_string($conn, $_GET['cat']) : 'all';
$month = isset($_GET['month']) ? (int)$_GET['month'] : 0;

// --- CÂU TRUY VẤN 1: LẤY BÀI VIẾT NỔI BẬT (SLIDER BÊN TRÁI) ---
$featured_query = "SELECT * FROM cultural_posts WHERE (category LIKE '%Lễ hội%' OR title LIKE '%Lễ hội%') ORDER BY id DESC LIMIT 1";
$featured_result = mysqli_query($conn, $featured_query);
$featured_post = mysqli_fetch_assoc($featured_result);

// --- CÂU TRUY VẤN 2: LẤY DANH SÁCH LỄ HỘI CHÍNH (Đã nâng cấp tích hợp chức năng) ---
$main_query = "SELECT * FROM cultural_posts WHERE (category LIKE '%Lễ hội%' OR title LIKE '%Lễ hội%')";

// Chức năng 1: Lọc theo danh mục thẻ điều hướng
if ($category == 'truyenthong') {
    $main_query .= " AND (category LIKE '%truyền thống%' OR title LIKE '%Cồng chiêng%' OR title LIKE '%Đâm trâu%' OR title LIKE '%Đống Đa%')";
} elseif ($category == 'dangian') {
    $main_query .= " AND (category LIKE '%dân gian%' OR category LIKE '%cu%' OR title LIKE '%Mừng lúa%' OR title LIKE '%Chợ gò%')";
} elseif ($category == 'tongiao') {
    $main_query .= " AND (category LIKE '%tôn giáo%' OR category LIKE '%tâm linh%' OR title LIKE '%Bến nước%' OR title LIKE '%Bỏ mả%')";
}

// Chức năng 2: Lọc chính xác theo Tháng (Dựa trên chuỗi chữ trong bài hoặc tháng hệ thống của cột created_at)
if ($month > 0) {
    $month_padded = sprintf("%02d", $month);
    $main_query .= " AND (title LIKE '%Tháng $month%' OR summary LIKE '%Tháng $month%' 
                          OR title LIKE '%Tháng $month_padded%' OR summary LIKE '%Tháng $month_padded%'
                          OR MONTH(created_at) = $month)";
}

// Chức năng 3: Tìm kiếm theo từ khóa nhập vào ô input
if (!empty($search)) {
    $main_query .= " AND (title LIKE '%$search%' OR summary LIKE '%$search%' OR content LIKE '%$search%')";
}

// Sắp xếp bài viết mới nhất lên đầu và giới hạn phân trang hiển thị bài viết
$main_query .= " ORDER BY id DESC LIMIT 10";
$main_result = mysqli_query($conn, $main_query);
?>

<link rel="stylesheet" href="css/lehoi.css?v=<?php echo time(); ?>">

<div class="festival-hero-banner">
    <div class="hero-banner-content">
        <h1>LỄ HỘI GIA LAI</h1>
        <p class="hero-subtitle">Nơi tinh hoa văn hóa tỏa sáng qua những lễ hội truyền thống đặc sắc, lưu giữ bản sắc và kết nối cộng đồng.</p>
        
        <form action="lehoi.php" method="GET" class="hero-search-box">
            <?php if($category != 'all'): ?>
                <input type="hidden" name="cat" value="<?php echo htmlspecialchars($category); ?>">
            <?php endif; ?>
            <?php if($month > 0): ?>
                <input type="hidden" name="month" value="<?php echo $month; ?>">
            <?php endif; ?>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Tìm kiếm lễ hội...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</button>
        </form>
    </div>
</div>

<div class="festival-container">
    <div class="category-filter-nav">
        <a href="lehoi.php?cat=all<?php echo !empty($search)?'&search='.urlencode($search):''; ?><?php echo $month>0?'&month='.$month:''; ?>" class="cat-item <?php echo $category=='all'?'active':''; ?>"><i class="fa-solid fa-grid-2x2"></i> Tất cả lễ hội</a>
        <a href="lehoi.php?cat=truyenthong<?php echo !empty($search)?'&search='.urlencode($search):''; ?><?php echo $month>0?'&month='.$month:''; ?>" class="cat-item <?php echo $category=='truyenthong'?'active':''; ?>"><i class="fa-solid fa-person-dancing"></i> Lễ hội truyền thống</a>
        <a href="lehoi.php?cat=dangian<?php echo !empty($search)?'&search='.urlencode($search):''; ?><?php echo $month>0?'&month='.$month:''; ?>" class="cat-item <?php echo $category=='dangian'?'active':''; ?>"><i class="fa-solid fa-masks-theater"></i> Lễ hội dân gian</a>
        <a href="lehoi.php?cat=tongiao<?php echo !empty($search)?'&search='.urlencode($search):''; ?><?php echo $month>0?'&month='.$month:''; ?>" class="cat-item <?php echo $category=='tongiao'?'active':''; ?>"><i class="fa-solid fa-gopuram"></i> Lễ hội tôn giáo</a>
        <a href="#" class="cat-item"><i class="fa-solid fa-users"></i> Lễ hội cộng đồng</a>
    </div>

    <div class="festival-main-layout">
        
        <div class="layout-left-column">
            
            <h2 class="column-section-title"><i class="fa-solid fa-ornament"></i> LỄ HỘI NỔI BẬT</h2>
            
            <?php if($featured_post): 
                $feat_img = (strpos($featured_post['image'], 'images/') === false) ? 'images/'.$featured_post['image'] : $featured_post['image'];
                // Lấy tháng thực tế của bài nổi bật
                $feat_month = date('m', strtotime($featured_post['created_at']));
            ?>
                <div class="featured-festival-card">
                    <div class="featured-img-box">
                        <img src="<?php echo $feat_img; ?>" alt="<?php echo $featured_post['title']; ?>">
                        <span class="badge-hot">Nổi bật</span>
                        <div class="slider-arrows">
                            <span class="arrow-prev"><i class="fa-solid fa-chevron-left"></i></span>
                            <span class="arrow-next"><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                    </div>
                    <div class="featured-info-box">
                        <h3><?php echo $featured_post['title']; ?></h3>
                        <div class="feat-meta">
                            <span><i class="fa-regular fa-calendar"></i> Tháng <?php echo (int)$feat_month; ?> hàng năm</span>
                            <span><i class="fa-solid fa-location-dot"></i> Gia Lai</span>
                        </div>
                        <p><?php echo $featured_post['summary']; ?></p>
                        <a href="baiviet.php?slug=<?php echo $featured_post['slug']; ?>" class="btn-view-detail">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>

            <h2 class="column-section-title" style="margin-top: 40px;"><i class="fa-solid fa-ornament"></i> DANH SÁCH LỄ HỘI</h2>
            <div class="festival-grid-sub">
                <?php 
                if(mysqli_num_rows($main_result) > 0) {
                    while($row = mysqli_fetch_assoc($main_result)) {
                        $grid_img = (strpos($row['image'], 'images/') === false) ? 'images/'.$row['image'] : $row['image'];
                        
                        // Lấy tháng thực tế từ cột ngày đăng trong cơ sở dữ liệu bài viết
                        $real_month = date('m', strtotime($row['created_at']));
                ?>
                        <div class="festival-mini-card">
                            <div class="mini-card-thumb">
                                <img src="<?php echo $grid_img; ?>" alt="<?php echo $row['title']; ?>">
                                <span class="mini-month-tag">Tháng <?php echo (int)$real_month; ?></span>
                            </div>
                            <div class="mini-card-details">
                                <h4><?php echo $row['title']; ?></h4>
                                <p><i class="fa-solid fa-location-dot"></i> Gia Lai / Bình Định</p>
                                <div class="mini-card-bottom">
                                    <span><i class="fa-regular fa-calendar"></i> Bản địa</span>
                                    <a href="baiviet.php?slug=<?php echo $row['slug']; ?>"><i class="fa-solid fa-circle-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                } else {
                    echo "<div style='grid-column:1/-1; color:#777; padding:40px text-align:center;'>
                            <i class='fa-solid fa-folder-open' style='font-size:30px;color:#ccc;margin-bottom:10px;display:block;'></i>
                            Chưa có dữ liệu lễ hội nào phù hợp với bộ lọc hiện tại.
                          </div>";
                }
                ?>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="#" class="btn-load-more">Xem thêm lễ hội <i class="fa-solid fa-arrow-down"></i></a>
            </div>
        </div>

        <div class="layout-right-column">
            
            <div class="sidebar-widget-box">
                <h3 class="widget-title">LỄ HỘI THEO THÁNG</h3>
                <div class="months-badge-grid">
                    <?php for($m=1; $m<=12; $m++): 
                        // Nếu bấm vào tháng đang active thì lần bấm tiếp theo sẽ hủy lọc tháng (quay về 0)
                        $toggle_month = ($month == $m) ? 0 : $m;
                    ?>
                        <a href="lehoi.php?month=<?php echo $toggle_month; ?><?php echo $category!='all'?'&cat='.$category:''; ?><?php echo !empty($search)?'&search='.urlencode($search):''; ?>" class="month-btn <?php echo $month==$m?'active':''; ?>">T<?php echo $m; ?></a>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="sidebar-widget-box">
                <div class="widget-title-flex">
                    <h3>SẮP DIỄN RA</h3>
                    <a href="#" class="view-all-link">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <div class="upcoming-events-list">
                    <div class="upcoming-item">
                        <img src="images/luamoi.jpg" alt="event">
                        <div class="upcoming-info">
                            <h5>Lễ Cúng Mừng Lúa Mới</h5>
                            <p class="loc"><i class="fa-solid fa-location-dot"></i> K'Bang, Gia Lai</p>
                            <p class="date"><i class="fa-regular fa-calendar"></i> 15/06/2026</p>
                        </div>
                        <span class="countdown-badge">Còn 12 ngày</span>
                    </div>
                    <div class="upcoming-item">
                        <img src="images/pothi.jpg" alt="event">
                        <div class="upcoming-info">
                            <h5>Lễ Hội Pơ Thi</h5>
                            <p class="loc"><i class="fa-solid fa-location-dot"></i> Ia Grai, Gia Lai</p>
                            <p class="date"><i class="fa-regular fa-calendar"></i> 20/06/2026</p>
                        </div>
                        <span class="countdown-badge">Còn 17 ngày</span>
                    </div>
                </div>
            </div>

            <div class="sidebar-ad-banner" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/ad-bg.jpg') center/cover;">
                <h4>Trải nghiệm văn hóa đặc sắc Gia Lai</h4>
                <p>Tham gia các lễ hội truyền thống để cảm nhận bản sắc độc đáo của vùng đất đại ngàn.</p>
                <a href="#" class="btn-ad-discover">Khám phá ngay <i class="fa-solid fa-chevron-right"></i></a>
            </div>

        </div>

    </div>
</div>

<?php 
// 4. Tải thanh Footer
include 'footer.php'; 
?>