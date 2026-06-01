<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🛠️ TỰ ĐỘNG LẤY TÊN TRANG HIỆN TẠI (Ví dụ: index.php, vanhoa.php)
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gia Lai Culture - Kết nối tinh hoa, lan tỏa bản sắc</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>

    <header class="main-header">
        
        <div class="top-bar">
            <div class="container top-bar-wrapper">
                <div class="top-bar-left">
                    <span><i class="fa-solid fa-person-shelter"></i> Chào mừng đến với Văn hóa Gia Lai</span>
                    <a href="mailto:vanhoagialai@gmail.com"><i class="fa-solid fa-envelope"></i> vanhoagialai@gmail.com</a>
                    <a href="tel:02691234567"><i class="fa-solid fa-phone"></i> 0269 123 4567</a>
                </div>
                <div class="top-bar-right">
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                    <div class="language-select">
                        <img src="images/co.jpg" alt="VN" class="flag-icon"> Tiếng Việt <i class="fa-solid fa-chevron-down"></i>
                    </div>
<div class="auth-dropdown-wrapper">
    <?php 
    // ========================================================
    // TRƯỜNG HỢP 1: NẾU LÀ ADMIN ĐĂNG NHẬP
    // ========================================================
    if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true): 
        // Admin dùng ảnh đại diện mặc định riêng cho ban quản trị
        $admin_avatar = 'images/default.jpg'; 
    ?>
        <div class="user-profile-dropdown">
            <button onclick="toggleProfileMenu(event)" class="profile-dropbtn">
                <img src="<?php echo $admin_avatar; ?>" alt="Admin Avatar" class="user-nav-avatar" style="border: 2px solid #ffca28;">
                <span class="user-nav-name">Chào Admin, <strong><?php echo htmlspecialchars($_SESSION['admin_name']); ?></strong></span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
            </button>
            
            <div id="profileDropdown" class="profile-dropdown-content">
                <div class="user-card-header" style="background: #e8f5e9;">
                    <img src="<?php echo $admin_avatar; ?>" alt="Admin Avatar Big" class="user-card-avatar">
                    <div class="user-card-info">
                        <h4 style="color: #1b4d3e;"><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h4>
                        <p style="color: #2e7d32; font-weight: bold;"><i class="fa-solid fa-user-shield"></i> Ban Quản Trị</p>
                    </div>
                </div>
                
                <div class="dropdown-divider"></div>
                
                <ul class="dropdown-menu-list">
    <li>
        <a href="admin_add_post.php" class="menu-item <?php echo ($current_page == 'admin_add_post.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-file-pen"></i> Viết bài văn hóa mới
        </a>
    </li>
    <li>
        <a href="admin_manage_posts.php" class="menu-item <?php echo ($current_page == 'admin_manage_posts.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-list-check"></i> Quản lý bài viết
        </a>
    </li>
    <li>
        <a href="vanhoa.php" class="menu-item <?php echo ($current_page == 'vanhoa.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-eye"></i> Xem trang văn hóa
        </a>
    </li>
    <li>
        <a href="index.php" class="menu-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-house"></i> Quay lại trang chủ
        </a>
    </li>
</ul>
                
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-footer">
                    <a href="logout.php" class="btn-logout-item" style="color: #c62828;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất hệ thống
                    </a>
                </div>
            </div>
        </div>

    <?php 
    // ========================================================
    // TRƯỜNG HỢP 2: NẾU LÀ USER THƯỜNG ĐĂNG NHẬP
    // ========================================================
    elseif (isset($_SESSION['user_id'])): 
        $nav_avatar = !empty($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : 'images/default.jpg';
        $nav_avatar_version = htmlspecialchars($nav_avatar) . '?v=' . time();
    ?>
        <div class="user-profile-dropdown">
            <button onclick="toggleProfileMenu(event)" class="profile-dropbtn">
                <img src="<?php echo $nav_avatar_version; ?>" alt="Avatar" class="user-nav-avatar">
                <span class="user-nav-name">Chào, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></span>
                <i class="fa-solid fa-chevron-down arrow-icon"></i>
            </button>
            
            <div id="profileDropdown" class="profile-dropdown-content">
                <div class="user-card-header">
                    <img src="<?php echo $nav_avatar_version; ?>" alt="Avatar Big" class="user-card-avatar">
                    <div class="user-card-info">
                        <h4><?php echo htmlspecialchars($_SESSION['user_name']); ?></h4>
                        <p><?php echo isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : ''; ?></p>
                    </div>
                </div>
                
                <div class="dropdown-divider"></div>
                
                <ul class="dropdown-menu-list">
                    <li>
                        <a href="profile.php?tab=edit" class="menu-item">
                            <i class="fa-solid fa-user-pen"></i> Chỉnh sửa hồ sơ
                        </a>
                    </li>
                    <li>
                        <a href="profile.php?tab=info" class="menu-item">
                            <i class="fa-regular fa-address-card"></i> Thông tin cá nhân
                        </a>
                    </li>
                    <li>
                        <a href="profile.php?tab=password" class="menu-item">
                            <i class="fa-solid fa-lock"></i> Đổi mật khẩu
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-item">
                            <i class="fa-regular fa-bell"></i> Thông báo
                            <span class="badge-count">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-item">
                            <i class="fa-solid fa-gear"></i> Cài đặt
                        </a>
                    </li>
                </ul>
                
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-footer">
                    <a href="logout.php" class="btn-logout-item">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                    </a>
                </div>
            </div>
        </div>

    <?php 
    // ========================================================
    // TRƯỜNG HỢP 3: CHƯA ĐĂNG NHẬP
    // ========================================================
    else: 
    ?>
        <a href="login.php" class="btn-login">Đăng nhập</a>
        <a href="register.php" class="btn-register" style="color: #ffffff; border: 1px solid #ffffff; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 13px;">Đăng ký</a>
    <?php endif; ?>

    <script>
        function toggleProfileMenu(event) {
            event.stopPropagation(); 
            var dropdown = document.getElementById("profileDropdown");
            dropdown.classList.toggle("show-menu");
        }

        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById("profileDropdown");
            var button = document.querySelector('.profile-dropbtn');
            
            if (dropdown && dropdown.classList.contains('show-menu')) {
                if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                    dropdown.classList.remove('show-menu');
                }
            }
        });
    </script>
</div>
                </div>
            </div>
        </div>

        <nav class="main-navigation">
            <div class="container nav-wrapper">
                <a href="index.php" class="logo-brand">
                    <img src="images/logo.jpg" alt="Gia Lai Culture Logo" class="logo-img" style="border-radius: 50%; object-fit: cover;">
                    <div class="logo-text">
                        <span class="logo-title">Gia Lai Culture</span>
                        <span class="logo-subtitle">Kết nối tinh hoa - Lan tỏa bản sắc</span>
                    </div>
                </a>

                <ul class="nav-menu">
                    <li>
                        <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                            <i class="fa-solid fa-house"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="vanhoa.php" class="<?php echo ($current_page == 'vanhoa.php') ? 'active' : ''; ?>">
                            Văn hóa <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'diemden.php') ? 'active' : ''; ?>">
                            Điểm đến <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'lehoi.php') ? 'active' : ''; ?>">Lễ hội</a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'amthuc.php') ? 'active' : ''; ?>">Ẩm thực</a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'luutru.php') ? 'active' : ''; ?>">Lưu trú</a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'tintuc.php') ? 'active' : ''; ?>">Tin tức</a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'thuvien.php') ? 'active' : ''; ?>">Thư viện</a>
                    </li>
                    <li>
                        <a href="#" class="<?php echo ($current_page == 'lienhe.php') ? 'active' : ''; ?>">Liên hệ</a>
                    </li>
                    <li>
                        <a href="#" class="search-icon-btn"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>