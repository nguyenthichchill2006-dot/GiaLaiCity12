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

    <article class="tn-card" data-cat="kinhte" data-page="1">
      <div class="tn-card-thumb">
        <img src="img/caphe.jpg" onerror="this.src='img/placeholder.jpg'" alt="Cà phê Gia Lai">
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

    <article class="tn-card" data-cat="dulich" data-page="1">
      <div class="tn-card-thumb">
        <img src="img/langgialai.jpg" onerror="this.src='img/placeholder.jpg'" alt="Làng Bahnar">
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

    <article class="tn-card" data-cat="sukien" data-page="1">
      <div class="tn-card-thumb">
        <img src="img/hoadaquy.jpg" onerror="this.src='img/placeholder.jpg'" alt="Hoa dã quỳ">
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

    <article class="tn-card" data-cat="vanhoa" data-page="2">
      <div class="tn-card-thumb">
        <img src="img/nharong.jpg" onerror="this.src='img/placeholder.jpg'" alt="Nhà rông">
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

    <article class="tn-card" data-cat="dulich" data-page="2">
      <div class="tn-card-thumb">
        <img src="img/bienho.png" onerror="this.src='img/placeholder.jpg'" alt="Biển Hồ">
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

    <article class="tn-card" data-cat="sukien" data-page="2">
      <div class="tn-card-thumb">
        <img src="img/thacphucuong.jpg" onerror="this.src='img/placeholder.jpg'" alt="Thác Phú Cường">
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

    <article class="tn-card" data-cat="vanhoa" data-page="3">
      <div class="tn-card-thumb">
        <img src="img/congchieng.jpg" onerror="this.src='img/placeholder.jpg'" alt="Cồng chiêng">
        <span class="tn-badge">Văn hóa</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Văn hóa</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 20/04/2026</span>
        </div>
        <h3>Nghệ nhân cồng chiêng cuối cùng của làng Ia Mơr được vinh danh</h3>
        <p>Già làng Ksor Phước, 82 tuổi, được Bộ VHTTDL công nhận là nghệ nhân ưu tú trong lĩnh vực di sản âm nhạc dân gian.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="kinhte" data-page="3">
      <div class="tn-card-thumb">
        <img src="img/caphe.jpg" onerror="this.src='img/placeholder.jpg'" alt="Nông nghiệp">
        <span class="tn-badge tn-badge--green">Kinh tế</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Kinh tế</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 18/04/2026</span>
        </div>
        <h3>Gia Lai đứng đầu cả nước về diện tích trồng sầu riêng hữu cơ</h3>
        <p>Với hơn 15.000 ha canh tác theo tiêu chuẩn hữu cơ, Gia Lai trở thành vùng xuất khẩu sầu riêng lớn nhất Việt Nam.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

    <article class="tn-card" data-cat="dulich" data-page="3">
      <div class="tn-card-thumb">
        <img src="img/bienho.png" onerror="this.src='img/placeholder.jpg'" alt="Du lịch sinh thái">
        <span class="tn-badge tn-badge--teal">Du lịch</span>
      </div>
      <div class="tn-card-body">
        <div class="tn-meta">
          <span class="tn-cat">Du lịch</span>
          <span class="tn-date"><i class="fa-regular fa-calendar"></i> 15/04/2026</span>
        </div>
        <h3>Mô hình du lịch cộng đồng tại Kon Chiêng thu hút đầu tư nước ngoài</h3>
        <p>Hai doanh nghiệp Nhật Bản và Hàn Quốc ký kết hợp tác phát triển du lịch sinh thái tại huyện Mang Yang, Gia Lai.</p>
        <a href="#" class="tn-read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </article>

  </div><!-- end .tn-grid -->

  <!-- Pagination -->
  <div class="tn-pagination" id="pagination"></div>

</main>



<script>
(function () {
  const CARDS_PER_PAGE = 3;
  const grid = document.getElementById('newsGrid');
  const paginationEl = document.getElementById('pagination');

  let currentPage = 1;
  let currentCat = 'all';

  // Lấy toàn bộ card
  const allCards = Array.from(grid.querySelectorAll('.tn-card'));

  // Lọc card theo danh mục hiện tại
  function getFilteredCards() {
    return allCards.filter(c =>
      currentCat === 'all' || c.dataset.cat === currentCat
    );
  }

  // Tổng số trang
  function totalPages() {
    return Math.ceil(getFilteredCards().length / CARDS_PER_PAGE);
  }

  // Render pagination
  function renderPagination() {
    const total = totalPages();
    paginationEl.innerHTML = '';

    // Nút Trước
    const prevBtn = document.createElement('button');
    prevBtn.className = 'tn-page-btn';
    prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i> Trước';
    prevBtn.disabled = currentPage === 1;
    prevBtn.addEventListener('click', () => goToPage(currentPage - 1));
    paginationEl.appendChild(prevBtn);

    // Các nút số trang
    for (let i = 1; i <= total; i++) {
      const btn = document.createElement('button');
      btn.className = 'tn-page-btn' + (i === currentPage ? ' active' : '');
      btn.textContent = i;
      btn.addEventListener('click', () => goToPage(i));
      paginationEl.appendChild(btn);
    }

    // Chỉ báo "Trang X / Y"
    const info = document.createElement('span');
    info.className = 'tn-page-info';
    info.textContent = `${currentPage} / ${total}`;
    paginationEl.appendChild(info);

    // Nút Tiếp
    const nextBtn = document.createElement('button');
    nextBtn.className = 'tn-page-btn';
    nextBtn.innerHTML = 'Tiếp <i class="fa-solid fa-chevron-right"></i>';
    nextBtn.disabled = currentPage === total;
    nextBtn.addEventListener('click', () => goToPage(currentPage + 1));
    paginationEl.appendChild(nextBtn);
  }

  // Hiển thị card với stagger animation
  function showCards(cards) {
    // Ẩn tất cả trước
    allCards.forEach(c => {
      c.style.display = 'none';
      c.classList.remove('card-visible');
    });

    // Hiện card của trang hiện tại
    const start = (currentPage - 1) * CARDS_PER_PAGE;
    const pageCards = cards.slice(start, start + CARDS_PER_PAGE);

    pageCards.forEach((card, i) => {
      card.style.display = 'flex';
      // Stagger: mỗi card xuất hiện trễ hơn 80ms
      setTimeout(() => card.classList.add('card-visible'), i * 80);
    });
  }

  // Chuyển trang với hiệu ứng
  function goToPage(page) {
    if (page === currentPage) return;
    const total = totalPages();
    if (page < 1 || page > total) return;

    // Phase 1: fade out + slide xuống
    grid.classList.add('page-leaving');

    setTimeout(() => {
      currentPage = page;
      grid.classList.remove('page-leaving');
      grid.classList.add('page-entering');

      showCards(getFilteredCards());
      renderPagination();

      // Cuộn lên đầu grid mượt mà
      grid.scrollIntoView({ behavior: 'smooth', block: 'start' });

      // Phase 2: fade in + slide lên
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          grid.classList.remove('page-entering');
        });
      });
    }, 260);
  }

  // Bộ lọc danh mục
  document.querySelectorAll('.tn-filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tn-filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      currentCat = btn.dataset.cat;
      currentPage = 1;

      grid.classList.add('page-leaving');
      setTimeout(() => {
        grid.classList.remove('page-leaving');
        grid.classList.add('page-entering');
        showCards(getFilteredCards());
        renderPagination();
        requestAnimationFrame(() => requestAnimationFrame(() => {
          grid.classList.remove('page-entering');
        }));
      }, 260);
    });
  });

  // Khởi tạo
  showCards(getFilteredCards());
  renderPagination();
})();
</script>

<?php include('footer.php'); ?>