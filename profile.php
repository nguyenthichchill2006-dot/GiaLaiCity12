<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Gọi file kết nối cơ sở dữ liệu
require_once 'db.php'; 

$user_id = $_SESSION['user_id'];
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'edit';

// Khởi tạo biến chứa dữ liệu mặc định ban đầu
$user_name     = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Thành viên';
$user_email    = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
$user_phone    = '';
$user_birthday = '';
$user_gender   = 'Nam';
$user_address  = '';
$user_bio      = '';
$user_avatar   = 'images/default.jpg';

try {
    $sql_user = "SELECT * FROM users WHERE id = :id";
    $stmt_user = $pdo->prepare($sql_user); 
    $stmt_user->execute([':id' => $user_id]);
    $user_data = $stmt_user->fetch(PDO::FETCH_ASSOC);

    if ($user_data) {
        $user_name     = !empty($user_data['fullname']) ? $user_data['fullname'] : $user_name;
        $user_email    = !empty($user_data['email']) ? $user_data['email'] : $user_email;
        $user_phone    = !empty($user_data['phone']) ? $user_data['phone'] : '';
        $user_birthday = !empty($user_data['birthday']) ? $user_data['birthday'] : '';
        $user_gender   = !empty($user_data['gender']) ? $user_data['gender'] : 'Nam';
        $user_address  = !empty($user_data['address']) ? $user_data['address'] : '';
        $user_bio      = !empty($user_data['bio']) ? $user_data['bio'] : '';
        
        // Kiểm tra nếu trường avatar có giá trị trong DB thì lấy luôn đường dẫn đó
        if (!empty($user_data['avatar'])) {
            $user_avatar = $user_data['avatar'];
        }
        
        // CẬP NHẬT TRỰC TIẾP VÀO SESSION ĐỂ FILE HEADER PHÍA DƯỚI ĐỌC ĐƯỢC GIÁ TRỊ MỚI NHẤT
        $_SESSION['user_name']   = $user_name;
        $_SESSION['user_avatar'] = $user_avatar; 
        $_SESSION['user_email']  = $user_email;
    }
} catch (PDOException $e) {
    if (isset($_SESSION['user_avatar'])) {
        $user_avatar = $_SESSION['user_avatar'];
    }
}

// Tạo biến phiên bản ảnh chống lưu cache cho các thẻ img trên trang profile
$avatar_version = htmlspecialchars($user_avatar) . '?v=' . time();

// Gọi header chung sau khi các Session đã được làm mới thành công
require_once 'header.php';
?>

<link rel="stylesheet" href="css/profile.css">

<div class="profile-page-container">
    <div class="container profile-wrapper">
        
        <aside class="profile-sidebar">
            <div class="sidebar-user-card">
                <div class="avatar-wrapper">
                    <img src="<?php echo $avatar_version; ?>" alt="User Avatar" class="sidebar-avatar">
                    <span class="status-online-dot"></span>
                </div>
                <h3 class="sidebar-username"><?php echo htmlspecialchars($user_name); ?></h3>
                <p class="sidebar-email"><?php echo htmlspecialchars($user_email); ?></p>
            </div>
            
            <nav class="sidebar-menu">
                <a href="profile.php?tab=edit" class="sidebar-menu-item <?php echo $current_tab == 'edit' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-user-pen"></i> Chỉnh sửa hồ sơ
                </a>
                <a href="profile.php?tab=info" class="sidebar-menu-item <?php echo $current_tab == 'info' ? 'active' : ''; ?>">
                    <i class="fa-regular fa-address-card"></i> Thông tin cá nhân
                </a>
                <a href="profile.php?tab=password" class="sidebar-menu-item <?php echo $current_tab == 'password' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-lock"></i> Đổi mật khẩu
                </a>
                <a href="profile.php?tab=notification" class="sidebar-menu-item <?php echo $current_tab == 'notification' ? 'active' : ''; ?>">
                    <i class="fa-regular fa-bell"></i> Thông báo <span class="sidebar-badge">3</span>
                </a>
                <a href="profile.php?tab=setting" class="sidebar-menu-item <?php echo $current_tab == 'setting' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-gear"></i> Cài đặt
                </a>
                <div class="sidebar-divider"></div>
                <a href="logout.php" class="sidebar-menu-item logout-item">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                </a>
            </nav>
        </aside>

        <main class="profile-content-main">
            <div class="content-breadcrumbs">
                <span>Trang chủ</span> <i class="fa-solid fa-chevron-right"></i> 
                <span>Hồ sơ</span> <i class="fa-solid fa-chevron-right"></i> 
                <span class="current"><?php 
                    if ($current_tab == 'info') echo 'Thông tin cá nhân';
                    elseif ($current_tab == 'password') echo 'Đổi mật khẩu';
                    elseif ($current_tab == 'notification') echo 'Thông báo';
                    elseif ($current_tab == 'setting') echo 'Cài đặt hệ thống';
                    else echo 'Chỉnh sửa hồ sơ';
                ?></span>
            </div>

            <?php if ($current_tab == 'edit'): ?>
                <div class="profile-card-form">
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                        <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; border: 1px solid #badbcc;">
                            <i class="fa-solid fa-circle-check"></i> Chúc mừng! Hồ sơ của bạn đã được cập nhật thành công.
                        </div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                        <div style="background-color: #f8d7da; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; border: 1px solid #f5c2c7;">
                            <i class="fa-solid fa-circle-exclamation"></i> Có lỗi xảy ra: <?php echo htmlspecialchars($_GET['message']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="process-profile.php" method="POST" enctype="multipart/form-data" class="profile-grid-form">
                        <div class="form-inputs-block">
                            <h2 class="section-title">Thông tin hồ sơ</h2>
                            
                            <div class="input-group-row">
                                <label for="full_name">Họ và tên</label>
                                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user_name); ?>" required>
                            </div>

                            <div class="input-grid-2col">
                                <div class="input-group-row">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" required>
                                </div>
                                <div class="input-group-row">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user_phone); ?>">
                                </div>
                            </div>

                            <div class="input-grid-2col">
                                <div class="input-group-row">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="text" id="birthday" name="birthday" value="<?php echo htmlspecialchars($user_birthday); ?>" placeholder="DD/MM/YYYY">
                                </div>
                                <div class="input-group-row">
                                    <label for="gender">Giới tính</label>
                                    <select id="gender" name="gender">
                                        <option value="Nam" <?php echo $user_gender == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                        <option value="Nữ" <?php echo $user_gender == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                        <option value="Khác" <?php echo $user_gender == 'Khác' ? 'selected' : ''; ?>>Khác</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group-row">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user_address); ?>">
                            </div>

                            <div class="input-group-row">
                                <label for="bio">Giới thiệu</label>
                                <textarea id="bio" name="bio" rows="4"><?php echo htmlspecialchars($user_bio); ?></textarea>
                            </div>

                            <div class="form-action-buttons">
                                <button type="button" class="btn-secondary-cancel" onclick="window.history.back()">Hủy</button>
                                <button type="submit" class="btn-primary-submit">Lưu thay đổi</button>
                            </div>
                        </div>

                        <div class="form-avatar-upload-block">
                            <h3 class="avatar-title-label">Ảnh đại diện</h3>
                            <div class="upload-preview-box">
                                <img src="<?php echo $avatar_version; ?>" alt="Preview" id="avatarPreviewImage">
                                <label for="avatarFileInput" class="camera-upload-badge">
                                    <i class="fa-solid fa-camera"></i>
                                    <input type="file" id="avatarFileInput" name="avatar" accept="image/jpeg, image/png" onchange="previewImage(this)">
                                </label>
                            </div>
                            <p class="upload-hint-text">JPG, PNG (Tối đa 2MB)</p>
                        </div>
                    </form>
                </div>

            <?php elseif ($current_tab == 'info'): ?>
                <div class="profile-card-form spec-info-card">
                    <h2 class="section-title" style="margin-bottom: 5px;">Hồ sơ cá nhân</h2>
                    <p style="font-size: 14px; color: #666; margin-bottom: 25px;">Chi tiết thông tin tài khoản của bạn được lưu trữ trên hệ thống Văn Hóa Gia Lai.</p>
                    
                    <div class="info-details-list" style="display: flex; flex-direction: column; gap: 15px;">
                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-user" style="width: 20px; color: #1b5e3a;"></i> Họ và tên:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo htmlspecialchars($user_name); ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-envelope" style="width: 20px; color: #1b5e3a;"></i> Địa chỉ Email:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo htmlspecialchars($user_email); ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-phone" style="width: 20px; color: #1b5e3a;"></i> Số điện thoại:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo !empty($user_phone) ? htmlspecialchars($user_phone) : '<i style="color: #aaa;">Chưa cập nhật</i>'; ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-cake-candles" style="width: 20px; color: #1b5e3a;"></i> Ngày sinh:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo !empty($user_birthday) ? htmlspecialchars($user_birthday) : '<i style="color: #aaa;">Chưa cập nhật</i>'; ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-venus-mars" style="width: 20px; color: #1b5e3a;"></i> Giới tính:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo htmlspecialchars($user_gender); ?></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 180px 1fr; padding: 12px 0; border-bottom: 1px dashed #eee;">
                            <strong style="color: #555;"><i class="fa-solid fa-location-dot" style="width: 20px; color: #1b5e3a;"></i> Địa chỉ:</strong>
                            <span style="color: #333; font-weight: 500;"><?php echo !empty($user_address) ? htmlspecialchars($user_address) : '<i style="color: #aaa;">Chưa cập nhật</i>'; ?></span>
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 8px; padding: 12px 0;">
                            <strong style="color: #555;"><i class="fa-solid fa-quote-left" style="width: 20px; color: #1b5e3a;"></i> Giới thiệu bản thân:</strong>
                            <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; color: #545454; line-height: 1.6; border-left: 3px solid #1b5e3a; font-size: 14px;">
                                <?php echo !empty($user_bio) ? nl2br(htmlspecialchars($user_bio)) : '<i style="color: #aaa;">Chưa có thông tin tự giới thiệu.</i>'; ?>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 25px; display: flex; justify-content: flex-end;">
                        <a href="profile.php?tab=edit" style="background-color: #0b4226; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-user-pen"></i> Thay đổi thông tin
                        </a>
                    </div>
                </div>

            <?php elseif ($current_tab == 'password'): ?>
                <div class="profile-card-form">
                    <?php if (isset($_GET['pwd_status']) && $_GET['pwd_status'] == 'success'): ?>
                        <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; border: 1px solid #badbcc;">
                            <i class="fa-solid fa-circle-check"></i> Tuyệt vời! Mật khẩu của bạn đã được thay đổi thành công.
                        </div>
                    <?php elseif (isset($_GET['pwd_status']) && $_GET['pwd_status'] == 'error'): ?>
                        <div style="background-color: #f8d7da; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; border: 1px solid #f5c2c7;">
                            <i class="fa-solid fa-circle-exclamation"></i> Lỗi đổi mật khẩu: <?php echo htmlspecialchars($_GET['message']); ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="section-title"><i class="fa-solid fa-key"></i> Đổi mật khẩu tài khoản</h2>
                    <p style="font-size: 14px; color: #666; margin-bottom: 25px;">Để đảm bảo an toàn, vui lòng chọn mật khẩu mạnh có tối thiểu 6 ký tự.</p>

                    <form action="process-password.php" method="POST" style="max-width: 550px; display: flex; flex-direction: column; gap: 20px;">
                        <div class="input-group-row">
                            <label for="current_password" style="font-weight: 500; margin-bottom: 6px; display: block; color: #444;">Mật khẩu hiện tại <span style="color: red;">*</span></label>
                            <input type="password" id="current_password" name="current_password" required placeholder="Nhập mật khẩu bạn đang sử dụng" style="width: 100%; padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 15px;">
                        </div>

                        <div class="input-group-row">
                            <label for="new_password" style="font-weight: 500; margin-bottom: 6px; display: block; color: #444;">Mật khẩu mới <span style="color: red;">*</span></label>
                            <input type="password" id="new_password" name="new_password" required minlength="6" placeholder="Tối thiểu 6 ký tự" style="width: 100%; padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 15px;">
                        </div>

                        <div class="input-group-row">
                            <label for="confirm_password" style="font-weight: 500; margin-bottom: 6px; display: block; color: #444;">Xác nhận mật khẩu mới <span style="color: red;">*</span></label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="6" placeholder="Nhập lại mật khẩu mới phía trên" style="width: 100%; padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 15px;">
                        </div>

                        <div class="form-action-buttons" style="margin-top: 10px; display: flex; gap: 12px;">
                            <button type="button" class="btn-secondary-cancel" onclick="location.href='profile.php?tab=info'" style="cursor: pointer;">Hủy bỏ</button>
                            <button type="submit" class="btn-primary-submit" style="background-color: #0b4226; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-weight: 500; cursor: pointer;">Cập nhật mật khẩu</button>
                        </div>
                    </form>
                </div>

            <?php elseif ($current_tab == 'notification'): ?>
                <div class="profile-card-form">
                    <h2 class="section-title"><i class="fa-regular fa-bell"></i> Trung tâm thông báo</h2>
                    <p style="font-size: 14px; color: #666; margin-bottom: 20px;">Cập nhật tin tức mới nhất về các sự kiện văn hóa, lễ hội Gia Lai và tài khoản của bạn.</p>
                    
                    <div class="notification-list" style="display: flex; flex-direction: column; gap: 12px;">
                        <div style="background: #f4fbf7; border-left: 4px solid #0b4226; padding: 15px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="margin: 0 0 5px 0; color: #0b4226; font-size: 15px;"><i class="fa-solid fa-calendar-day"></i> Sự kiện văn hóa sắp diễn ra</h4>
                                <p style="margin: 0; font-size: 13.5px; color: #444;">Lễ hội Đâm trâu (Lễ mừng lúa mới) của đồng bào Ba Na tại huyện Chư Păh sẽ được tổ chức vào tuần tới. Đừng bỏ lỡ!</p>
                                <small style="color: #888; font-size: 11px; display: block; margin-top: 5px;"><i class="fa-regular fa-clock"></i> 2 giờ trước</small>
                            </div>
                            <span style="background: #0b4226; color: white; font-size: 11px; padding: 2px 8px; border-radius: 10px;">Mới</span>
                        </div>

                        <div style="background: #f9f9f9; border-left: 4px solid #ccc; padding: 15px; border-radius: 4px; opacity: 0.8;">
                            <h4 style="margin: 0 0 5px 0; color: #333; font-size: 15px;"><i class="fa-solid fa-circle-check"></i> Tài khoản xác thực thành công</h4>
                            <p style="margin: 0; font-size: 13.5px; color: #444;">Chào mừng <strong><?php echo htmlspecialchars($user_name); ?></strong> đã hoàn thiện thông tin hồ sơ thành viên trên hệ thống Gia Lai Culture.</p>
                            <small style="color: #888; font-size: 11px; display: block; margin-top: 5px;"><i class="fa-regular fa-clock"></i> 2 ngày trước</small>
                        </div>

                        <div style="background: #f9f9f9; border-left: 4px solid #ccc; padding: 15px; border-radius: 4px; opacity: 0.8;">
                            <h4 style="margin: 0 0 5px 0; color: #333; font-size: 15px;"><i class="fa-solid fa-bullhorn"></i> Khuyến nghị bảo mật</h4>
                            <p style="margin: 0; font-size: 13.5px; color: #444;">Hệ thống nhắc nhở bạn nên thay đổi mật khẩu định kỳ 6 tháng một lần để bảo vệ an toàn thông tin cá nhân.</p>
                            <small style="color: #888; font-size: 11px; display: block; margin-top: 5px;"><i class="fa-regular fa-clock"></i> 1 tuần trước</small>
                        </div>
                    </div>
                </div>

            <?php elseif ($current_tab == 'setting'): ?>
                <div class="profile-card-form">
                    <h2 class="section-title"><i class="fa-solid fa-gear"></i> Cài đặt hệ thống</h2>
                    <p style="font-size: 14px; color: #666; margin-bottom: 25px;">Tùy chỉnh cấu hình để có trải nghiệm khám phá văn hóa Gia Lai tốt nhất.</p>
                    
                    <form action="process-settings.php" method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 20px;">
                        <div style="background: #fafafa; padding: 15px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #eee;">
                            <div>
                                <strong style="color: #333; display: block; margin-bottom: 4px;">Thông báo qua Email</strong>
                                <span style="font-size: 13px; color: #666;">Nhận tin tức cập nhật về bài viết văn hóa và lễ hội Gia Lai nổi bật hàng tuần.</span>
                            </div>
                            <label class="switch-toggle" style="position: relative; display: inline-block; width: 44px; height: 22px;">
                                <input type="checkbox" name="email_newsletter" checked style="opacity: 0; width: 0; height: 0;">
                                <span class="slider-round" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px;"></span>
                            </label>
                        </div>

                        <div style="background: #fafafa; padding: 15px; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #eee;">
                            <div>
                                <strong style="color: #333; display: block; margin-bottom: 4px;">Chế độ giao diện (Dark Mode)</strong>
                                <span style="font-size: 13px; color: #666;">Chuyển đổi giao diện sang nền tối giúp bảo vệ mắt khi đọc bài viết vào ban đêm.</span>
                            </div>
                            <label class="switch-toggle" style="position: relative; display: inline-block; width: 44px; height: 22px;">
                                <input type="checkbox" name="dark_mode" style="opacity: 0; width: 0; height: 0;">
                                <span class="slider-round" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px;"></span>
                            </label>
                        </div>

                        <div style="background: #fafafa; padding: 15px; border-radius: 8px; display: flex; flex-direction: column; gap: 10px; border: 1px solid #eee;">
                            <div>
                                <strong style="color: #333; display: block; margin-bottom: 4px;">Ngôn ngữ ưu tiên</strong>
                                <span style="font-size: 13px; color: #666;">Chọn ngôn ngữ hiển thị mặc định cho các bài viết thuyết minh di tích lịch sử.</span>
                            </div>
                            <select name="preferred_lang" style="width: 200px; padding: 8px; border-radius: 6px; border: 1px solid #ccc; font-size: 14px;">
                                <option value="vi" selected>Tiếng Việt (Mặc định)</option>
                                <option value="en">English (Tiếng Anh)</option>
                            </select>
                        </div>

                        <div style="margin-top: 10px; display: flex; gap: 12px;">
                            <button type="submit" style="background-color: #0b4226; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-weight: 500; cursor: pointer;">Lưu thiết lập</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </main>

    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatarPreviewImage').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php
// Gọi footer trang web của bạn vào nếu cần
// require_once 'footer.php'; 
?>