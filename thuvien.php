<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện - Văn Hóa Gia Lai</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url('https://source.unsplash.com/1600x900/?library,culture') center/cover;
            color: white;
            text-align: center;
            padding: 110px 20px;
        }
        .hero h1 { font-size: 48px; }

        .gallery {
            padding: 70px 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .gallery img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            transition: 0.3s;
        }
        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="container">
        <h1>Thư Viện Ảnh & Video</h1>
        <p>Khám phá vẻ đẹp văn hóa Gia Lai qua hình ảnh</p>
    </div>
</div>

<div class="container">
    <div class="gallery">
        <img src="https://source.unsplash.com/600x400/?gong,traditional" alt="Cồng chiêng">
        <img src="https://source.unsplash.com/600x400/?bahnar,village" alt="Làng Bahnar">
        <img src="https://source.unsplash.com/600x400/?coffee,plantation" alt="Đồi cà phê">
        <img src="https://source.unsplash.com/600x400/?dance,highlands" alt="Múa cồng chiêng">
        <img src="https://source.unsplash.com/600x400/?waterfall,gialai" alt="Thác nước">
        <img src="https://source.unsplash.com/600x400/?house,traditional" alt="Nhà rông">
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>