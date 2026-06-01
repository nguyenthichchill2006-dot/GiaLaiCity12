<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức - Văn Hóa Gia Lai</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url('https://source.unsplash.com/1600x900/?news,gialai') center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero h1 { font-size: 48px; margin-bottom: 10px; }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            padding: 60px 0;
        }
        .news-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .news-card:hover { transform: translateY(-10px); }
        .news-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .news-content {
            padding: 20px;
        }
        .news-content h3 {
            margin-bottom: 12px;
            color: #d4a853;
        }
        .news-meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="container">
        <h1>Tin Tức & Sự Kiện</h1>
        <p>Cập nhật những thông tin mới nhất về văn hóa Gia Lai</p>
    </div>
</div>

<div class="container">
    <div class="news-grid">
        <div class="news-card">
            <img src="https://source.unsplash.com/600x400/?festival,gialai" alt="Lễ hội">
            <div class="news-content">
                <div class="news-meta">15/05/2026 • Văn hóa</div>
                <h3>Lễ hội Cồng Chiêng Tây Nguyên 2026 sẽ diễn ra tại Pleiku</h3>
                <p>UBND tỉnh Gia Lai vừa công bố kế hoạch tổ chức Lễ hội Cồng Chiêng lớn nhất năm...</p>
            </div>
        </div>

        <div class="news-card">
            <img src="https://source.unsplash.com/600x400/?coffee,highlands" alt="Cà phê">
            <div class="news-content">
                <div class="news-meta">12/05/2026 • Kinh tế - Văn hóa</div>
                <h3>Gia Lai hướng tới xây dựng thương hiệu cà phê đặc sản quốc tế</h3>
                <p>Hàng trăm hộ nông dân tham gia chương trình cà phê bền vững...</p>
            </div>
        </div>

        <div class="news-card">
            <img src="https://source.unsplash.com/600x400/?village,gialai" alt="Làng văn hóa">
            <div class="news-content">
                <div class="news-meta">10/05/2026 • Du lịch</div>
                <h3>Khám phá làng văn hóa Bahnar - Điểm đến không thể bỏ lỡ</h3>
                <p>Làng Pleiơr, Ia Grai đang trở thành điểm đến hấp dẫn du khách...</p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>