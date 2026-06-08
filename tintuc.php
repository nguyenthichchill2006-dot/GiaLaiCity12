<?php include('header.php'); ?>
<link rel="stylesheet" href="css/tintuc.css">

<!-- ===== HERO TIN TỨC ===== -->
<section class="tn-hero">
  <div class="tn-hero-overlay"></div>
  <div class="tn-hero-content">
    <span class="tn-hero-tag">Cập nhật mới nhất</span>
    <h1>Tin Tức &amp; Sự Kiện</h1>
    <p>Những thông tin mới nhất về văn hóa, du lịch và đời sống Gia Lai</p>
  </div>
</section>

<!-- ===== BỘ LỌC ===== -->
<div class="tn-filter-bar container">
  <button class="tn-filter-btn active" data-cat="all">Tất cả</button>
  <button class="tn-filter-btn" data-cat="vanhoa">Văn hóa</button>
  <button class="tn-filter-btn" data-cat="dulich">Du lịch</button>
  <button class="tn-filter-btn" data-cat="kinhte">Kinh tế</button>
  <button class="tn-filter-btn" data-cat="sukien">Sự kiện</button>
</div>

<!-- ===== GRID TIN TỨC ===== -->
<main class="container tn-main" id="main-content">

  <!-- Tin nổi bật (featured) -->
  <article class="tn-card tn-card--featured" data-cat="vanhoa">
    <div class="tn-card-thumb">
      <img src="img/congchieng.jpg"
           onerror="this.src='img/placeholder.jpg'"
           alt="Lễ hội Cồng Chiêng Tây Nguyên 2026">
      <span class="tn-badge">Nổi bật</span>
    </div>
    <div class="tn-card-body">
      <div class="tn-meta">
        <span class="tn-cat">Văn hóa</span>
        <span class="tn-date"><i class="fa-regular fa-calendar"></i> 15/05/2026</span>
      </div>
      <h2>Lễ hội Cồng Chiêng Tây Nguyên 2026 sẽ diễn ra tại Pleiku</h2>
      <p>UBND tỉnh Gia Lai vừa công bố kế hoạch tổ chức Lễ hội Cồng Chiêng lớn nhất năm, quy tụ hàng nghìn nghệ nhân từ các tỉnh Tây Nguyên về biểu diễn.</p>
      <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </article>

  <!-- Grid tin thường -->
  <div class="tn-grid" id="newsGrid">

    <article class="tn-card" data-cat="kinhte">
      <div class="tn-card-thumb">
        <img src="img/caphe.jpg"
             onerror="this.src='img/placeholder.jpg'"
             alt="Cà phê Gia Lai">
        <span class="tn-badge tn-badge--green">Kinh tế</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Kinh tế – Văn hóa</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 12/05/2026</span>
        </div>
        <h3>Gia Lai hướng tới xây dựng thương hiệu cà phê đặc sản quốc tế</h3>
        <p>Hàng trăm hộ nông dân tham gia chương trình cà phê bền vững, hướng tới xuất khẩu trực tiếp sang thị trường châu Âu.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="dulich">
      <div class="tn-card-thumb">
        <img src="img/langgialai.jpg"
             onerror="this.src='img/placeholder.jpg'"
             alt="Làng Bahnar">
        <span class="tn-badge tn-badge--teal">Du lịch</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Du lịch</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 10/05/2026</span>
        </div>
        <h3>Khám phá làng văn hóa Bahnar – Điểm đến không thể bỏ lỡ</h3>
        <p>Làng Pleiơr, Ia Grai đang trở thành điểm đến hấp dẫn du khách trong và ngoài nước nhờ bản sắc văn hóa độc đáo.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="sukien">
      <div class="tn-card-thumb">
        <img src="img/hoadaquy.jpg"
             onerror="this.src='img/placeholder.jpg'"
             alt="Hoa dã quỳ">
        <span class="tn-badge tn-badge--orange">Sự kiện</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Sự kiện</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 08/05/2026</span>
        </div>
        <h3>Lễ hội Hoa Dã Quỳ – Núi lửa Chư Đăng Ya trở lại mùa thu này</h3>
        <p>Festival hoa dã quỳ thường niên hứa hẹn thu hút hàng chục nghìn lượt khách tham quan trong tháng 11.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="vanhoa">
      <div class="tn-card-thumb">
        <img src="img/nharong.jpg"
             onerror="this.src='img/placeholder.jpg'"
             alt="Nhà rông">
        <span class="tn-badge">Văn hóa</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Văn hóa</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 05/05/2026</span>
        </div>
        <h3>Bảo tồn nhà rông truyền thống – Bài toán giữa hiện đại và bản sắc</h3>
        <p>Nhiều làng tại Gia Lai đang nỗ lực phục dựng nhà rông gỗ truyền thống bên cạnh sức ép đô thị hóa ngày càng lớn.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="dulich">
      <div class="tn-card-thumb">
        <img src="img/bienho.png"
             onerror="this.src='img/placeholder.jpg'"
             alt="Biển Hồ">
        <span class="tn-badge tn-badge--teal">Du lịch</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Du lịch</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 02/05/2026</span>
        </div>
        <h3>Biển Hồ T'nưng vào top 10 hồ đẹp nhất Việt Nam năm 2026</h3>
        <p>Tạp chí du lịch quốc tế vinh danh Biển Hồ Pleiku trong danh sách những điểm đến thiên nhiên ấn tượng nhất cả nước.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="sukien">
      <div class="tn-card-thumb">
        <img src="img/thacphucuong.jpg"
             onerror="this.src='img/placeholder.jpg'"
             alt="Thác Phú Cường">
        <span class="tn-badge tn-badge--orange">Sự kiện</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Sự kiện</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 28/04/2026</span>
        </div>
        <h3>Khai trương tuyến trekking mới tại Thác Phú Cường – Krông Pa</h3>
        <p>Tuyến đường đi bộ dài 12km xuyên rừng nguyên sinh dẫn đến Thác Phú Cường chính thức mở cửa đón khách từ tháng 5.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

  </div><!-- end .tn-grid -->

  <!-- Pagination -->
  <div class="tn-pagination">
    <button class="tn-page-btn active">1</button>
    <button class="tn-page-btn">2</button>
    <button class="tn-page-btn">3</button>
    <button class="tn-page-btn tn-page-next">Tiếp <i class="fa-solid fa-chevron-right"></i></button>
  </div>

</main>

<script>
  // Bộ lọc danh mục
  const filterBtns = document.querySelectorAll('.tn-filter-btn');
  const cards = document.querySelectorAll('#newsGrid .tn-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cat = btn.dataset.cat;
      cards.forEach(card => {
        const show = cat === 'all' || card.dataset.cat === cat;
        card.style.display = show ? 'flex' : 'none';
      });
    });
  });

  // Pagination (demo — chưa kết nối DB)
  document.querySelectorAll('.tn-page-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tn-page-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
</script>

<?php include('footer.php'); ?>
