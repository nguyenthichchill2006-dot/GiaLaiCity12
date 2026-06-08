<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện Văn Hóa Gia Lai</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/thuvien.css"
    
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
            <img src="img/congchieng.jpg" alt="Cồng chiêng">
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
            <img src="img/thapchambd.jpg" alt="Tháp Chăm">
            <div class="overlay">
                <h3>Tháp Chăm</h3>
                <p>Tháp Chăm Bình Định là một dạng kiến trúc tôn giáo mang bản sắc rất riêng của dân tộc Chămpa</p>
                <div class="tags">
                    <span class="tag">Lịch sử</span>
                    <span class="tag">Tháp Chămpa</span>
                </div>
            </div>
        </div>

        <!-- Thêm nhiều item hơn -->
        <div class="gallery-item" data-category="cafe">
            <img src="img/caphe.jpg" alt="Đồi cà phê">
            <div class="overlay">
                <h3>Đồi Cà Phê Gia Lai</h3>
                <p>Thiên đường xanh ngút ngàn của cao nguyên.</p>
                <div class="tags">
                    <span class="tag">Nông Nghiệp</span>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="congchieng">
            <img src="img/vanhoacongchieng.jpg" alt="Múa cồng chiêng">
            <div class="overlay">
                <h3>Múa Cồng Chiêng</h3>
                <p>Vũ điệu bất diệt, kết nối con người với thần linh.</p>
                <div class="tags">
                    <span class="tag">Nghệ Thuật</span>
                </div>
            </div>
        </div>

        <div class="gallery-item" data-category="thiennhien">
            <img src="img/thacphucuong.jpg" alt="Thác nước">
            <div class="overlay">
                <h3>Thác Nước Hùng Vĩ</h3>
                <p>Sức sống mãnh liệt của đại ngàn Tây Nguyên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="lang">
            <img src="img/nharong.jpg" alt="Nhà rông">
            <div class="overlay">
                <h3>Nhà Rông - Linh Hồn Làng</h3>
                <p>Biểu tượng văn hóa đặc trưng của đồng bào dân tộc.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="nguoi">
            <img src="img/nguoigiarai.jpg" alt="Người Gia Rai">
            <div class="overlay">
                <h3>Người Gia Rai</h3>
                <p>Vẻ đẹp mạnh mẽ, kiêu hãnh của người dân Tây Nguyên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="lang">
            <img src="img/langtaynguyen.jpg" alt="Làng Tây Nguyên">
            <div class="overlay">
                <h3>Làng Dân Tộc</h3>
                <p>Bình yên và gần gũi với thiên nhiên.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="ngabadinh">
            <img src="img/ngabadinh.jpg" alt="Ngã Ba Đình">
            <div class="overlay">
                <h3>Ngã Ba Đình</h3>
                <p>Ngã Ba Đình là một di tích lịch sử quan trọng ở thôn Hy Văn, xã Hoài Sơn, huyện Hoài Nhơn, tỉnh Bình Định. Nơi đây không chỉ gắn liền với các cuộc đấu tranh kiên cường trong thời kỳ kháng chiến chống Pháp và Mỹ, mà còn lưu giữ những câu chuyện bi thương về sự tàn bạo của kẻ thù, và tinh thần đấu tranh bất khuất của người dân địa phương.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="thiennhien">
            <img src="img/rungnui.jpg" alt="Rừng núi">
            <div class="overlay">
                <h3>Rừng Núi Gia Lai</h3>
                <p>Thiên nhiên nguyên sơ và hùng vĩ.</p>
            </div>
        </div>

        <div class="gallery-item" data-category="nhonly">
            <img src="img/nhonly.jpg" alt="Lễ hội">
            <div class="overlay">
                <h3>Biển Nhơn Lý</h3>
                <p>Không khí trong lành và mát mẻ , địa điểm thu hút nhiều khách du lịch</p>
            </div>
        </div>

        <div class="gallery-item" data-category="nguoi">
            <img src="img/nhonhai.jpg" alt="Du Lịch">
            <div class="overlay">
                <h3>Biển Nhơn Hải</h3>
                <p>Bãi biển thuộc thành phố Quy Nhơn</p>
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