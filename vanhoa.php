<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('header.php');
$page_title = "Ẩm Thực - Văn Hóa Gia Lai";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #0f0f0f;
            color: #ddd;
        }

        /* Loại bỏ khoảng trắng thừa */
        .main-content {
            margin-top: 0;
            padding-top: 0;
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
            margin-top: -1px; /* Fix khoảng trắng thừa */
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
        }
        .hero h1 {
            font-size: 3.8rem;
            color: #ffd700;
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
        }
        .tag {
            background: #004d00;
            color: #90ee90;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 12px;
            display: inline-block;
        }

                .home-btn {
            text-align: center;
            margin: 80px 0 60px;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            background: linear-gradient(135deg, #006600, #1b5e20, #2e7d32);
            color: white;
            padding: 18px 55px;
            font-size: 1.35rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 12px 35px rgba(0, 102, 0, 0.5);
            transition: all 0.4s ease;
            border: 2px solid rgba(255, 215, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-home:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 20px 45px rgba(0, 102, 0, 0.7);
            background: linear-gradient(135deg, #008000, #2e7d32);
            color: #ffd700;
            border-color: #ffd700;
        }

        .btn-home i {
            font-size: 1.6rem;
            transition: all 0.4s ease;
        }

        .btn-home:hover i {
            transform: rotate(20deg) scale(1.2);
        }

        .btn-home::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 40%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: 0.7s;
        }

        .btn-home:hover::before {
            left: 200%;
        }
    </style>
</head>
<body>
<header>
    <div class="container position-relative">
        <h1>VĂN HÓA GIA LAI MỚI</h1>
        <p>Kết hợp tinh hoa Tây Nguyên (Gia Lai) và Duyên hải miền Trung (Bình Định)</p>
    </div>
</header>

<div class="container">
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card">
                <span class="tag">🌿 TÂY NGUYÊN</span>
                <img src="img/congchieng.jpg" alt="Cồng chiêng" class="w-100">
                <div class="card-body">
                    <h2>🎶 Không gian văn hóa Cồng Chiêng</h2>
                    <p>Cồng chiêng là di sản UNESCO, linh hồn của người Jrai và Bahnar, vang vọng trong từng lễ hội và nghi thức cộng đồng.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <span class="tag">🏠 TÂY NGUYÊN</span>
                <img src="img/nharong.jpg" alt="Nhà rông">
                <div class="card-body">
                    <h2>Nhà Rông - Biểu tượng văn hóa</h2>
                    <p>Trung tâm sinh hoạt cộng đồng, nơi diễn ra các cuộc họp làng, lễ hội và truyền dạy văn hóa.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <span class="tag">⚔️ BÌNH ĐỊNH</span>
                <img src="img/vo77.jpg" alt="Võ Bình Định">
                <div class="card-body">
                    <h2>Võ Cổ Truyền Bình Định</h2>
                    <p>Cái nôi võ thuật Việt Nam với tinh thần thượng võ bất diệt, được gìn giữ qua hàng trăm năm.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <span class="tag">🏯 BÌNH ĐỊNH</span>
                <img src="img/thapcham.jpg" alt="Tháp Chăm">
                <div class="card-body">
                    <h2>Tháp Chăm cổ</h2>
                    <p>Di tích kiến trúc Champa huyền bí, chứng nhân lịch sử hàng ngàn năm của văn hóa miền Trung.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Nút Trang Chủ -->
   <div class="home-btn text-center my-5">
        <a href="index.php" class="btn-home">
            <i class="fas fa-home"></i>
            <span>Quay về Trang Chủ</span>
        </a>
    </div>

<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>