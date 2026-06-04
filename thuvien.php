<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện Văn Hóa Gia Lai</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #0a3d2a;
            --accent: #c19a5b;
            --dark: #2c2218;
            --light: #f8f5f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--light);
            color: #3a2f1f;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 61, 42, 0.95);
            backdrop-filter: blur(12px);
            z-index: 1000;
            padding: 16px 0;
            transition: all 0.4s ease;
        }

        .nav-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Hero */
        .hero {
            background: linear-gradient(rgba(10, 45, 35, 0.8), rgba(10, 45, 35, 0.85)), 
                        url('https://source.unsplash.com/2000x1200/?vietnam,highlands,mountains,epic') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 220px 20px 140px;
            position: relative;
            margin-top: 80px;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: linear-gradient(transparent, #f8f5f0);
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 62px;
            margin-bottom: 20px;
            text-shadow: 0 6px 30px rgba(0, 0, 0, 0.7);
            letter-spacing: -2px;
        }

        .hero p {
            font-size: 22px;
            max-width: 780px;
            margin: 0 auto 30px;
            opacity: 0.95;
        }

        .cta-button {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 16px 42px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(193, 154, 91, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(193, 154, 91, 0.4);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Filters */
        .filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin: 60px 0 40px;
        }

        .filter-btn {
            padding: 12px 28px;
            border: 2px solid #ddd;
            background: white;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .filter-btn.active, .filter-btn:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 28px;
            padding-bottom: 120px;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            height: 420px;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: translateY(-18px) scale(1.03);
            box-shadow: 0 30px 60px rgba(10, 61, 42, 0.25);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.12);
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(10, 45, 35, 0.95));
            color: white;
            padding: 40px 28px 28px;
            transform: translateY(40px);
            transition: all 0.5s ease;
        }

        .gallery-item:hover .overlay {
            transform: translateY(0);
        }

        .overlay h3 {
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .overlay p {
            font-size: 15.5px;
            opacity: 0.9;
            line-height: 1.5;
        }

        .overlay .tags {
            margin-top: 14px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .tag {
            font-size: 12px;
            padding: 4px 12px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            backdrop-filter: blur(4px);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.92);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-content {
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .modal-image {
            width: 100%;
            height: 520px;
            object-fit: cover;
        }

        .modal-info {
            padding: 32px;
        }

        .modal-info h2 {
            font-size: 32px;
            margin-bottom: 16px;
            color: var(--primary);
        }

        .close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 32px;
            color: white;
            cursor: pointer;
            z-index: 10;
        }

        /* Section Title */
        .section-title {
            text-align: center;
            font-size: 42px;
            margin: 80px 0 20px;
            color: var(--primary);
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 130px;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            position: absolute;
            bottom: -16px;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: #666;
            max-width: 600px;
            margin: 0 auto 60px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero { padding: 160px 20px 100px; }
            .hero h1 { font-size: 48px; }
            .gallery { grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); }
            .gallery-item { height: 340px; }
        }
    </style>
</head>
<body>

<!-- Hero -->
<div class="hero">
    <div class="container">
        <h1>Thư Viện Văn Hóa Gia Lai</h1>
        <p>Khám phá tinh hoa văn hóa Tây Nguyên qua những hình ảnh và câu chuyện chân thực nhất</p>
        <a href="#gallery" class="cta-button">Khám Phá Ngay</a>
    </div>
</div>

<div class="container">
    <h2 class="section-title">Bộ Sưu Tập Ảnh</h2>
    <p class="section-subtitle">Hơn 50+ hình ảnh chất lượng cao về văn hóa, con người và thiên nhiên Gia Lai</p>

    <!-- Filters -->
    <div class="filters" id="filters">
        <button class="filter-btn active" data-filter="all">Tất cả</button>
        <button class="filter-btn" data-filter="congchieng">Cồng Chiêng</button>
        <button class="filter-btn" data-filter="lang">Làng & Nhà Rông</button>
        <button class="filter-btn" data-filter="cafe">Cà Phê & Nông Nghiệp</button>
        <button class="filter-btn" data-filter="nguoi">Con Người</button>
        <button class="filter-btn" data-filter="thiennhien">Thiên Nhiên</button>
    </div>

    <div class="gallery" id="gallery">
        <!-- Item 1 -->
        <div class="gallery-item" data-category="congchieng">
            <img src="img/nharong.jpg" alt="Cồng chiêng">
            <div class="overlay">
                <h3>Cồng Chiêng Tây Nguyên</h3>
                <p>Linh hồn của núi rừng, âm thanh vang vọng qua bao thế hệ.</p>
                <div class="tags">
                    <span class="tag">Âm Nhạc</span>
                    <span class="tag">Di Sản UNESCO</span>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="gallery-item" data-category="lang">
            <img src="https://source.unsplash.com/800x600/?bahnar,village,highlands" alt="Làng Bahnar">
            <div class="overlay">
                <h3>Làng Bahnar Cổ</h3>
                <p>Nhà rông huyền bí giữa núi rừng xanh ngút ngàn.</p>
                <div class="tags">
                    <span class="tag">Kiến Trúc</span>
                    <span class="tag">Bahnar</span>
                </div>
            </div>
        </div>

        <!-- Thêm nhiều item hơn -->
        <div class="gallery-item" data-category="cafe">
            <img src="https://source.unsplash.com/800x600/?coffee,plantation,vietnam" alt="Đồi cà phê">
            <div class="overlay">
                <h3>Đồi Cà Phê Gia Lai</h3>
                <p>Thiên đường xanh ngút ngàn của cao nguyên.</p>
                <div class="tags">
                    <span class="tag">Nông Nghiệp</span>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="congchieng">
            <img src="https://source.unsplash.com/800x600/?traditional,dance,highlands" alt="Múa cồng chiêng">
            <div class="overlay">
                <h3>Múa Cồng Chiêng</h3>
                <p>Vũ điệu bất diệt, kết nối con người với thần linh.</p>
                <div class="tags">
                    <span class="tag">Nghệ Thuật</span>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="thiennhien">
            <img src="https://source.unsplash.com/800x600/?waterfall,gialai,vietnam" alt="Thác nước">
            <div class="overlay">
                <h3>Thác Nước Hùng Vĩ</h3>
                <p>Sức sống mãnh liệt của đại ngàn Tây Nguyên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="lang">
            <img src="https://source.unsplash.com/800x600/?rong,house,vietnam" alt="Nhà rông">
            <div class="overlay">
                <h3>Nhà Rông - Linh Hồn Làng</h3>
                <p>Biểu tượng văn hóa đặc trưng của đồng bào dân tộc.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="nguoi">
            <img src="https://source.unsplash.com/800x600/?jarai,people,culture" alt="Người Gia Rai">
            <div class="overlay">
                <h3>Người Gia Rai</h3>
                <p>Vẻ đẹp mạnh mẽ, kiêu hãnh của người dân Tây Nguyên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="lang">
            <img src="https://source.unsplash.com/800x600/?highlands,village,traditional" alt="Làng Tây Nguyên">
            <div class="overlay">
                <h3>Làng Dân Tộc</h3>
                <p>Bình yên và gần gũi với thiên nhiên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="cafe">
            <img src="img/caphe.jpg" alt="Thu hoạch cà phê">
            <div class="overlay">
                <h3>Thu Hoạch Cà Phê</h3>
                <p>Mùa vàng trên cao nguyên đất đỏ bazan.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="thiennhien">
            <img src="https://source.unsplash.com/800x600/?mountain,forest,highlands" alt="Rừng núi">
            <div class="overlay">
                <h3>Rừng Núi Gia Lai</h3>
                <p>Thiên nhiên nguyên sơ và hùng vĩ.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="congchieng">
            <img src="https://source.unsplash.com/800x600/?festival,traditional,vietnam" alt="Lễ hội">
            <div class="overlay">
                <h3>Lễ Hội Cồng Chiêng</h3>
                <p>Không khí sôi động và rực rỡ.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="nguoi">
            <img src="https://source.unsplash.com/800x600/?woman,traditional,costume,highlands" alt="Trang phục">
            <div class="overlay">
                <h3>Trang Phục Dân Tộc</h3>
                <p>Đẹp rực rỡ, mang đậm bản sắc văn hóa.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="imageModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" class="modal-image" src="" alt="">
        <div class="modal-info">
            <h2 id="modalTitle"></h2>
            <p id="modalDesc"></p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active to current
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            galleryItems.forEach(item => {
                if (filterValue === 'all') {
                    item.style.display = 'block';
                } else {
                    if (item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });

    // Modal functionality
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDesc = document.getElementById('modalDesc');
    const closeBtn = document.querySelector('.close');

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const title = item.querySelector('h3').textContent;
            const desc = item.querySelector('p').textContent;

            modalImage.src = img.src;
            modalTitle.textContent = title;
            modalDesc.textContent = desc;
            modal.style.display = 'flex';
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Keyboard escape
    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && modal.style.display === 'flex') {
            modal.style.display = 'none';
        }
    });
</script>
</body>
</html>
