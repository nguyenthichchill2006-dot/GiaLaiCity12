<?php 
include('header.php'); 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ẩm Thực - Văn Hóa Gia Lai</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f0f0f;
            color: #ddd;
            line-height: 1.6;
        }

        /* Hero Section */
        .hero {
            background: url('https://via.placeholder.com/1920x650/003300/ffffff?text=ẨM+THỰC+GIA+LAI') center/cover no-repeat;
            height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.78);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
        }
        .hero h1 {
            font-size: 3.8rem;
            color: #ffd700;
            margin-bottom: 16px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.9);
        }
        .hero p {
            font-size: 1.45rem;
            color: #e0e0e0;
        }

        .container {
            max-width: 1400px;
            margin: 60px auto;
            padding: 0 20px;
        }

        h2 {
            color: #ffd700;
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 28px;
        }

        .card {
            background: #1a1a1a;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 102, 0, 0.5);
        }
        .card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }
        .card-body {
            padding: 24px;
        }
        .card h3 {
            color: #ffd700;
            margin-bottom: 12px;
            font-size: 1.4rem;
        }
        .tag {
            display: inline-block;
            background: #004d00;
            color: #90ee90;
            font-size: 0.85rem;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>ẨM THỰC GIA LAI</h1>
            <p>Hương vị núi rừng Tây Nguyên - Bản sắc văn hóa dân tộc</p>
        </div>
    </section>

    <div class="container">
        <h2>Các Món Ăn Đặc Trưng</h2>
        
        <div class="cards">
            <div class="card">
                <img src="https://via.placeholder.com/600x400?text=Phở+Khô+Gia+Lai" alt="Phở khô Gia Lai">
                <div class="card-body">
                    <span class="tag">Đặc sản Pleiku</span>
                    <h3>Phở Khô Gia Lai (Phở Hai Tô)</h3>
                    <p>Phở khô nổi tiếng với nước dùng đậm đà, topping lòng, chả, bánh phở giòn tan. Hương vị đặc trưng không thể lẫn.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/600x400?text=Gà+Nướng+Cơm+Lam" alt="Gà nướng cơm lam">
                <div class="card-body">
                    <span class="tag">Món nướng dân tộc</span>
                    <h3>Gà Nướng Cơm Lam</h3>
                    <p>Gà ta thả vườn nướng lá chuối, ăn kèm cơm lam và muối kiến vàng đặc trưng của Tây Nguyên.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/600x400?text=Bò+Một+Nắng" alt="Bò một nắng">
                <div class="card-body">
                    <span class="tag">Đặc sản khô</span>
                    <h3>Bò Một Nắng Gia Lai</h3>
                    <p>Thịt bò tươi ướp gia vị núi rừng, phơi một nắng, dai ngon, ăn cực đã.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/600x400?text=Rượu+Cần" alt="Rượu cần">
                <div class="card-body">
                    <span class="tag">Văn hóa dân tộc</span>
                    <h3>Rượu Cần & Cà Phê Rượu</h3>
                    <p>Đồ uống linh hồn của đồng bào Bahnar, Gia Rai, Jrai trong lễ hội và bữa ăn hàng ngày.</p>
                </div>
            </div>
        </div>
    </div>

<?php 
include('footer.php'); 
?>

</body>
</html>