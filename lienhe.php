<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Văn Hóa Gia Lai</title>
    <link rel="stylesheet" href = "css/lienhe.css">
    <style>
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }
        .alert-error {
            background: #fdecea;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="container">
        <h1>Liên Hệ Với Chúng Tôi</h1>
        <p style="font-size: 20px;">Hãy để chúng tôi đồng hành cùng bạn khám phá Văn hóa Gia Lai</p>
    </div>
</div>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Thông tin liên hệ -->
            <div class="contact-info">
                <h3>Thông tin liên hệ</h3>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Địa chỉ:</strong><br>
                        123 Đường Phan Đình Phùng, TP. Pleiku<br>
                        Tỉnh Gia Lai, Việt Nam
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <strong>Điện thoại:</strong><br>
                        0375818959<br>
                        0375818959 (Zalo)
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email:</strong><br>
                        info@vanhoagialai.vn<br>
                        hotro@vanhoagialai.vn
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Giờ làm việc:</strong><br>
                        Thứ 2 - Chủ Nhật: 8:00 - 17:30
                    </div>
                </div>
            </div>

            <!-- Form liên hệ -->
            <div class="contact-form">
                <h3>Gửi tin nhắn cho chúng tôi</h3>

                <?php
                // Lấy trạng thái và thông báo từ URL (do process_lienhe.php redirect về)
                $status = isset($_GET['status']) ? $_GET['status'] : '';
                $msg    = isset($_GET['msg'])    ? htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') : '';

                if ($status === 'success' && $msg !== '') {
                    echo '<div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> ' . $msg . '
                          </div>';
                } elseif ($status === 'error' && $msg !== '') {
                    echo '<div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i> ' . $msg . '
                          </div>';
                }

                // Giữ lại giá trị cũ khi có lỗi để người dùng không phải nhập lại
                $old = [
                    'hoten'   => htmlspecialchars($_GET['hoten']   ?? '', ENT_QUOTES, 'UTF-8'),
                    'email'   => htmlspecialchars($_GET['email']   ?? '', ENT_QUOTES, 'UTF-8'),
                    'sdt'     => htmlspecialchars($_GET['sdt']     ?? '', ENT_QUOTES, 'UTF-8'),
                    'tieude'  => htmlspecialchars($_GET['tieude']  ?? '', ENT_QUOTES, 'UTF-8'),
                    'noidung' => htmlspecialchars($_GET['noidung'] ?? '', ENT_QUOTES, 'UTF-8'),
                ];
                ?>

                <?php if ($status !== 'success'): ?>
                <form action="process_lienhe.php" method="POST">
                    <div class="form-group">
                        <label>Họ và tên <span style="color:red;">*</span></label>
                        <input type="text" name="hoten" required value="<?= $old['hoten'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" required value="<?= $old['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="tel" name="sdt" value="<?= $old['sdt'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="tieude" placeholder="Ví dụ: Hỏi về tour du lịch Pleiku" value="<?= $old['tieude'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nội dung <span style="color:red;">*</span></label>
                        <textarea name="noidung" required placeholder="Nhập nội dung bạn muốn liên hệ..."><?= $old['noidung'] ?></textarea>
                    </div>
                    <button type="submit">Gửi tin nhắn</button>
                </form>
                <?php else: ?>
                <div style="text-align:center; padding: 30px 0;">
                    <i class="fas fa-paper-plane" style="font-size:48px; color:#4CAF50; margin-bottom:16px; display:block;"></i>
                    <a href="lienhe.php" style="display:inline-block; margin-top:12px; padding:10px 24px; background:#4CAF50; color:#fff; border-radius:6px; text-decoration:none;">
                        Gửi tin nhắn khác
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

</body>
</html>