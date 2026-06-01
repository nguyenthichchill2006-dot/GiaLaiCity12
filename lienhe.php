<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Văn Hóa Gia Lai</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://source.unsplash.com/1600x900/?gialai,mountain') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 120px 20px;
        }
        .hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
        }

        /* Content */
        .contact-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }

        .contact-info h3 {
            color: #d4a853;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .info-item {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .info-item i {
            font-size: 22px;
            color: #d4a853;
            width: 30px;
        }

        /* Form */
        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        .form-group textarea {
            height: 160px;
            resize: vertical;
        }
        button {
            background: #d4a853;
            color: white;
            padding: 14px 40px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #c4963f;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
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
                <form action="process_lienhe.php" method="POST">
                    <div class="form-group">
                        <label>Họ và tên <span style="color:red;">*</span></label>
                        <input type="text" name="hoten" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span style="color:red;">*</span></label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="tel" name="sdt">
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="tieude" placeholder="Ví dụ: Hỏi về tour du lịch Pleiku">
                    </div>
                    <div class="form-group">
                        <label>Nội dung <span style="color:red;">*</span></label>
                        <textarea name="noidung" required placeholder="Nhập nội dung bạn muốn liên hệ..."></textarea>
                    </div>
                    <button type="submit">Gửi tin nhắn</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

</body>
</html>