<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/index.css">

<section class="hero-banner">
  <h2 class="sr-only">Hero banner Văn hóa Gia Lai với hiệu ứng lướt ảnh tự động</h2>

  <div class="hero-wrap" id="heroWrap">

    <div class="slides" id="slides">
      <div class="slide">
        <div class="slide-bg" style="background-image:url('img/anhbac.jpg'); background-size:cover; background-position:center;"></div>
        <div class="overlay"></div>
      </div>
      <div class="slide">
        <div class="slide-bg" style="background-image:url('img/bienqnhon.jpg'); background-size:cover; background-position:center;"></div>
        <div class="overlay"></div>
      </div>
      <div class="slide">
        <div class="slide-bg" style="background-image:url('img/congchieng.jpg'); background-size:cover; background-position:center;"></div>
        <div class="overlay"></div>
      </div>
      <div class="slide">
        <div class="slide-bg" style="background-image:url('img/bienho.png'); background-size:cover; background-position:center;"></div>
        <div class="overlay"></div>
      </div>
      <div class="slide">
        <div class="slide-bg" style="background-image:url('img/ruou.jpg'); background-size:cover; background-position:center;"></div>
        <div class="overlay"></div>
      </div>
    </div>

    <div class="content">
      <div class="tag">Di sản văn hóa</div>
      <h1 class="hero-title">VĂN HÓA GIA LAI</h1>
      <p class="hero-subtitle">Từ đại ngàn cồng chiêng đến đất võ trời văn</p>
      <p class="hero-desc">Khám phá hai vùng đất di sản giàu bản sắc</p>
      <a href="#main-content" class="btn-primary">Khám phá ngay &rarr;</a>
    </div>

    <div class="dots" id="dots">
      <div class="dot active" onclick="goTo(0)"></div>
      <div class="dot" onclick="goTo(1)"></div>
      <div class="dot" onclick="goTo(2)"></div>
      <div class="dot" onclick="goTo(3)"></div>
      <div class="dot" onclick="goTo(4)"></div>
    </div>

    <div class="arrows">
      <button class="arrow-btn" onclick="navigate(-1)" aria-label="Ảnh trước">&#8592;</button>
      <button class="arrow-btn" onclick="navigate(1)" aria-label="Ảnh sau">&#8594;</button>
    </div>

  </div>
</section>

<section class="quick-categories container">
    <div class="category-card">
        <div class="cat-icon-circle bg-green"><i class="fa-solid fa-mountain-sun"></i></div>
        <div class="cat-info">
            <h4>GIA LAI</h4>
            <p>Khám phá chung</p>
        </div>
    </div>
    <div class="category-card">
        <div class="cat-icon-circle bg-orange"><i class="fa-solid fa-gong"></i></div>
        <div class="cat-info">
            <h4>VĂN HÓA</h4>
            <p>Kho tàng di sản</p>
        </div>
    </div>
    <div class="category-card">
        <div class="cat-icon-circle bg-teal"><i class="fa-solid fa-map-location-dot"></i></div>
        <div class="cat-info">
            <h4>ĐIỂM ĐẾN</h4>
            <p>Danh lam thắng cảnh</p>
        </div>
    </div>
    <div class="category-card">
        <div class="cat-icon-circle bg-red"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="cat-info">
            <h4>LỄ HỘI</h4>
            <p>Sự kiện đặc sắc</p>
        </div>
    </div>
    <div class="category-card">
        <div class="cat-icon-circle bg-brown"><i class="fa-solid fa-bowl-food"></i></div>
        <div class="cat-info">
            <h4>ẨM THỰC</h4>
            <p>Hương vị núi rừng</p>
        </div>
    </div>
    <div class="category-card">
        <div class="cat-icon-circle bg-blue"><i class="fa-solid fa-images"></i></div>
        <div class="cat-info">
            <h4>HÌNH ẢNH</h4>
            <p>Thư viện đa phương tiện</p>
        </div>
    </div>
</section>

<section class="main-content-section container">
    
    <div class="left-content-block">
        <div class="section-heading">
            <h3>Khám phá Gia Lai</h3>
        </div>
        
        <div class="grid-explore-cards">
            <div class="explore-card">
                <div class="card-thumb">
                    <img src="img/congchieng.jpg" alt="Không gian văn hóa Cồng chiêng">
                </div>
                <div class="card-body">
                    <h4>Không gian văn hóa Cồng chiêng</h4>
                    <p>Di sản văn hóa phi vật thể đại diện của nhân loại.</p>
                </div>
            </div>
            <div class="explore-card">
                <div class="card-thumb">
                    <img src="img/thacphucuong.jpg" alt="Thác Phú Cường">
                </div>
                <div class="card-body">
                    <h4>Thác Phú Cường</h4>
                    <p>Vẻ đẹp hùng vĩ giữa núi rừng Tây Nguyên.</p>
                </div>
            </div>
            <div class="explore-card">
                <div class="card-thumb">
                    <img src="img/bienho.png" alt="Biển Hồ T'nưng">
                </div>
                <div class="card-body">
                    <h4>Biển Hồ T'nưng</h4>
                    <p>Đôi mắt Pleiku giữa cao nguyên xanh.</p>
                </div>
            </div>
            <div class="explore-card">
                <div class="card-thumb">
                    <img src="img/nharong.jpg" alt="Nhà rông Tây Nguyên">
                </div>
                <div class="card-body">
                    <h4>Nhà rông Tây Nguyên</h4>
                    <p>Biểu tượng văn hóa của người bản địa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar-block">
        <div class="section-heading">
            <h3>Tin tức mới</h3>
            <a href="tintuc.php" class="link-all">Xem tất cả &rarr;</a>
        </div>
        
        <div class="sidebar-news-list">
            <div class="news-item-mini">
                <img src="img/hoadaquy.jpg" alt="Lễ hội hoa dã quỳ" class="news-mini-img">
                <div class="news-mini-info">
                    <h5>Lễ hội Hoa Dã Quỳ - Núi lửa Chư Đăng Ya</h5>
                    <span class="news-date">15/11/2023</span>
                    <p>Lễ hội đặc sắc diễn ra hàng năm vào tháng 11...</p>
                </div>
            </div>
            <div class="news-item-mini">
<img src="img/disan.jpg" alt="Nhận bằng di sản" class="news-mini-img">
                <div class="news-mini-info">
                    <h5>Gia Lai đón nhận bằng di sản văn hóa</h5>
                    <span class="news-date">05/11/2023</span>
                    <p>Sự kiện quan trọng đánh dấu bước phát triển...</p>
                </div>
            </div>
            <div class="news-item-mini">
                <img src="img/vanhoacongchieng.jpg" alt="Festival Cồng chiêng" class="news-mini-img">
                <div class="news-mini-info">
                    <h5>Festival Văn hóa Cồng chiêng 2023</h5>
                    <span class="news-date">28/10/2023</span>
                    <p>Sôi động và đậm đà bản sắc Tây Nguyên...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="css/thuvienindex.css">

<section class="video-gallery-section container">

    <h2 class="sr-only">Thư viện video các điểm đến nổi bật tại Gia Lai và miền Trung</h2>

<div class="vg-section">
  <div class="vg-heading">
    <h2>
      <i class="ti ti-device-tv" aria-hidden="true"></i>
      Video &amp; Thư viện
    </h2>
    <a href="videos.php" class="vg-link-all">
      Xem tất cả <i class="ti ti-arrow-right" style="font-size:13px;" aria-hidden="true"></i>
    </a>
  </div>

  <div class="vg-grid">

    <div class="vg-card">
      <div class="vg-thumb">
        <img src="img/anhnennuilua.jpg" alt="Núi lửa Chư Đăng Ya"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="vg-img-placeholder" style="display:none; position:absolute; inset:0;">
          <i class="ti ti-mountain"></i>
        </div>
        <div class="vg-overlay"></div>
        <a href="https://www.youtube.com/watch?v=8feQPRRPExg" target="_blank" class="vg-play" aria-label="Xem video Núi lửa Chư Đăng Ya">
          <div class="vg-play-btn">
            <i class="fa-solid fa-play" aria-hidden="true"></i>
          </div>
        </a>
        <span class="vg-badge">Gia Lai</span>
      </div>
      <div class="vg-content">
        <h4>Núi lửa Chư Đăng Ya</h4>
        <p>Điểm đến nổi tiếng của Gia Lai với vẻ đẹp thiên nhiên hùng vĩ.</p>
      </div>
    </div>

    <div class="vg-card">
      <div class="vg-thumb">
        <img src="img/bienho.png" alt="Biển Hồ Pleiku"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="vg-img-placeholder" style="display:none; position:absolute; inset:0;">
          <i class="ti ti-droplet"></i>
        </div>
        <div class="vg-overlay"></div>
        <a href="https://www.youtube.com/watch?v=IPnmQkohTac" target="_blank" class="vg-play" aria-label="Xem video Biển Hồ Pleiku">
          <div class="vg-play-btn">
            <i class="fa-solid fa-play" aria-hidden="true"></i>
</div>
        </a>
        <span class="vg-badge">Pleiku</span>
      </div>
      <div class="vg-content">
        <h4>Biển Hồ Pleiku</h4>
        <p>Đôi mắt Pleiku với làn nước xanh quanh năm.</p>
      </div>
    </div>

    <div class="vg-card">
      <div class="vg-thumb">
        <img src="img/thacphucuong.jpg" alt="Thác Phú Cường"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="vg-img-placeholder" style="display:none; position:absolute; inset:0;">
          <i class="ti ti-ripple"></i>
        </div>
        <div class="vg-overlay"></div>
        <a href="https://www.youtube.com/watch?v=DK8EHYMVRKI" target="_blank" class="vg-play" aria-label="Xem video Thác Phú Cường">
          <div class="vg-play-btn">
            <i class="fa-solid fa-play" aria-hidden="true"></i>
          </div>
        </a>
        <span class="vg-badge">Tây Nguyên</span>
      </div>
      <div class="vg-content">
        <h4>Thác Phú Cường</h4>
        <p>Một trong những ngọn thác đẹp nhất Tây Nguyên.</p>
      </div>  
    </div>

    <div class="vg-card">
      <div class="vg-thumb">
        <img src="img/bienqn.jpg" alt="Quy Nhơn"
          onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="vg-img-placeholder" style="display:none; position:absolute; inset:0;">
          <i class="ti ti-beach"></i>
        </div>
        <div class="vg-overlay"></div>
        <a href="https://www.youtube.com/watch?v=CKIUpDn39no" target="_blank" class="vg-play" aria-label="Xem video Quy Nhơn">
          <div class="vg-play-btn">
            <i class="fa-solid fa-play" aria-hidden="true"></i>
          </div>
        </a>
        <span class="vg-badge">Bình Định</span>
      </div>
      <div class="vg-content">
        <h4>Quy Nhơn</h4>
        <p>Vẻ đẹp thiên nhiên và văn hóa độc đáo của thành phố biển này.</p>
      </div>
    </div>

  </div>
</div>


</section>
<div class="floating-action-buttons">
    <a href="chat.php" class="float-btn zalo-color" title="Zalo"><i class="fa-solid fa-comment-dots"></i></a>
    <a href="https://www.facebook.com/messages/t/1065790793288697/" class="float-btn messenger-color" title="Messenger"><i class="fa-brands fa-facebook-messenger"></i></a>
    <a href="#" class="float-btn scroll-top-btn" title="Lên đầu trang"><i class="fa-solid fa-arrow-up"></i></a>
</div>

<div class="floating-action-buttons">
    <a href="chat.php" class="float-btn zalo-color" title="Zalo"><i class="fa-solid fa-comment-dots"></i></a>
    <a href="https://www.facebook.com/messages/t/1065790793288697/" class="float-btn messenger-color" title="Messenger"><i class="fa-brands fa-facebook-messenger"></i></a>
    <a href="#" class="float-btn scroll-top-btn" title="Lên đầu trang"><i class="fa-solid fa-arrow-up"></i></a>
</div>
</section>

<script>
  const TOTAL    = 5;
  const INTERVAL = 5000;
  let current    = 0;
  let autoTimer  = null;

  const slidesEl = document.getElementById('slides');
  const dotEls   = document.querySelectorAll('.dot');

  function goTo(n) {
    current = ((n % TOTAL) + TOTAL) % TOTAL;
    slidesEl.style.transform = 'translateX(-' + (current * 20) + '%)';
    dotEls.forEach((d, i) => d.classList.toggle('active', i === current));
    clearInterval(autoTimer);
    autoTimer = setInterval(() => navigate(1), INTERVAL);
  }

  function navigate(dir) { goTo(current + dir); }

  // Khởi động auto slide
  autoTimer = setInterval(() => navigate(1), INTERVAL);

  // Dừng khi hover
  const wrap = document.getElementById('heroWrap');
  wrap.addEventListener('mouseenter', () => clearInterval(autoTimer));
  wrap.addEventListener('mouseleave', () => {
    autoTimer = setInterval(() => navigate(1), INTERVAL);
  });

  // Swipe mobile
  let touchX = 0;
  wrap.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
  wrap.addEventListener('touchend',   e => {
    const diff = touchX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) navigate(diff > 0 ? 1 : -1);
  }, { passive: true });
</script>


<?php include 'footer.php'; ?>

