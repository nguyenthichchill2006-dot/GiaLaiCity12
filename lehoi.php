<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lễ Hội - Văn Hóa Gia Lai</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; line-height: 1.6; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://source.unsplash.com/1600x900/?festival,traditional') center/cover;
            color: white;
            text-align: center;
            padding: 110px 20px;
        }
        .hero h1 { font-size: 50px; }

        .festival-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 30px;
            padding: 70px 0;
        }
        .festival-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .festival-card img { width: 100%; height: 250px; object-fit: cover; }
        .festival-info { padding: 25px; }
        .festival-info h3 { color: #d4a853; margin-bottom: 12px; }
    </style>
</head>
<body>

<div class="hero">
    <div class="container">
        <h1>Lễ Hội Văn Hóa Gia Lai</h1>
        <p>Những nét đẹp truyền thống của vùng đất Tây Nguyên</p>
    </div>
</div>

<div class="container">
    <div class="festival-grid">
        <div class="festival-card">
            <img src="https://source.unsplash.com/600x400/?gong,festival" alt="Cồng Chiêng">
            <div class="festival-info">
                <h3>Lễ hội Cồng Chiêng</h3>
                <p>Di sản văn hóa phi vật thể của nhân loại. Diễn ra vào tháng 3 hàng năm.</p>
            </div>
        </div>
        <div class="festival-card">
            <img src="https://source.unsplash.com/600x400/?rice,harvest" alt="Lễ hội cúng lúa">
            <div class="festival-info">
                <h3>Lễ hội Cúng Lúa Mới</h3>
                <p>Lễ hội quan trọng của đồng bào Bahnar, Jrai vào tháng 10 - 11.</p>
            </div>
        </div>
        <div class="festival-card">
            <img src="https://source.unsplash.com/600x400/?fire,dance" alt="Lễ hội lửa">
            <div class="festival-info">
                <h3>Lễ hội Lửa Blang</h3>
                <p>Nghi lễ thiêng liêng của đồng bào Gia Rai.</p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>