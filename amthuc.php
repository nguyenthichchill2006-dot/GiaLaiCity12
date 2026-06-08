<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ẩm Thực - Văn Hóa Gia Lai</title>
    <link rel="stylesheet" href="css/amthuc.css">
</head>
<body>

<div class="pg">

  <!-- ══ HERO ══ -->
  <section class="hero" aria-label="Giới thiệu ẩm thực Gia Lai">
    <div class="hero-bg-img" aria-hidden="true"></div>

    <span class="hero-badge" aria-hidden="true">
      <i class="ti ti-map-pin" style="font-size:11px; margin-right:5px;"></i>
      Tây Nguyên · Việt Nam
    </span>

    <div class="hero-content">
      <span class="hero-eyebrow">Văn hóa ẩm thực · Gia Lai · Tây Nguyên</span>
      <h1 class="hero-title">Hương vị<br><em>núi rừng</em></h1>
      <div class="hero-divider"></div>
      <p class="hero-sub">Bản sắc ẩm thực độc đáo của vùng cao nguyên Gia Lai — nơi mỗi món ăn là một câu chuyện về đất và người.</p>
      <div class="hero-stats">
        <div class="hero-stat">
          <span class="stat-num">12+</span>
          <span class="stat-lbl">Đặc sản</span>
        </div>
        <div class="hero-stat">
          <span class="stat-num">6</span>
          <span class="stat-lbl">Dân tộc</span>
        </div>
        <div class="hero-stat">
          <span class="stat-num">740m</span>
          <span class="stat-lbl">Cao nguyên</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ BODY ══ -->
  <div class="pg-body">

    <!-- Section header -->
    <div class="section-bar">
      <h2>Món ăn đặc trưng</h2>
      <div class="section-bar-line"></div>
      <span class="section-bar-tag">4 đặc sản</span>
    </div>

    <!-- Featured row: 1 tall + 1 tall -->
    <div class="featured-row">

      <!-- Card 01 — Phở khô -->
      <div class="fc fc--tall">
        <div class="fc-img-wrap">
          <img
            src="img/phokho.jpg"
            alt="Phở khô Gia Lai"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="fc-img-ph" style="display:none;">
            <i class="ti ti-soup" aria-hidden="true"></i>
            <span>pho-kho-gia-lai.jpg</span>
          </div>
          <div class="fc-ribbon">Đặc sản Pleiku</div>
          <div class="fc-num">01</div>
        </div>
        <div class="fc-body">
          <span class="fc-tag fc-tag-amber">Bữa sáng trứ danh</span>
          <h3>Phở khô Gia Lai</h3>
          <p>Phở hai tô độc nhất vô nhị — tô khô ăn riêng, tô nước chấm nhúng. Topping lòng, chả, hành phi giòn rụm. Được xem là linh hồn ẩm thực buổi sáng của người Pleiku.</p>
          <div class="fc-footer">
            <div class="fc-dot fc-dot-amber"></div>
            <span class="fc-meta">Phổ biến toàn tỉnh · Giá 30–50k</span>
          </div>
        </div>
      </div>

      <!-- Card 02 — Gà nướng cơm lam -->
      <div class="fc fc--tall">
        <div class="fc-img-wrap">
          <img
            src="img/ga.jpg"
            alt="Gà nướng cơm lam"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="fc-img-ph" style="display:none;">
            <i class="ti ti-flame" aria-hidden="true"></i>
            <span>ga-nuong-com-lam.jpg</span>
          </div>
          <div class="fc-ribbon">Món nướng dân tộc</div>
          <div class="fc-num">02</div>
        </div>
        <div class="fc-body">
          <span class="fc-tag fc-tag-green">Ẩm thực Bahnar · Jrai</span>
          <h3>Gà nướng cơm lam</h3>
          <p>Gà ta thả vườn ướp lá rừng, nướng trên than củi hồng. Ăn kèm cơm lam ống tre và muối kiến vàng hạt tiêu — trọn vẹn hương vị đại ngàn.</p>
          <div class="fc-footer">
            <div class="fc-dot fc-dot-green"></div>
            <span class="fc-meta">Lễ hội & nhà hàng dân tộc</span>
          </div>
        </div>
      </div>

    </div><!-- /featured-row -->

    <!-- Regular grid: 2 more cards -->
    <div class="cards-grid">

      <!-- Card 03 — Bò một nắng -->
      <div class="fc fc--reg">
        <div class="fc-img-wrap">
          <img
            src="img/bo.jpg"
            alt="Bò một nắng Gia Lai"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="fc-img-ph" style="display:none;">
            <i class="ti ti-meat" aria-hidden="true"></i>
            <span>bo-mot-nang.jpg</span>
          </div>
          <div class="fc-ribbon">Đặc sản khô</div>
          <div class="fc-num">03</div>
        </div>
        <div class="fc-body">
          <span class="fc-tag fc-tag-coral">Quà tặng cao nguyên</span>
          <h3>Bò một nắng Gia Lai</h3>
          <p>Thịt bò tươi ướp muối, tiêu rừng và ớt hiểm, phơi đúng một nắng cao nguyên. Dai ngon, đậm vị núi rừng khó quên.</p>
          <div class="fc-footer">
            <div class="fc-dot fc-dot-coral"></div>
            <span class="fc-meta">Đặc sản mang về · 200–350k/kg</span>
          </div>
        </div>
      </div>

      <!-- Card 04 — Rượu cần -->
      <div class="fc fc--reg">
        <div class="fc-img-wrap">
          <img
            src="img/ruou.jpg"
            alt="Rượu cần Tây Nguyên"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
          <div class="fc-img-ph" style="display:none;">
            <i class="ti ti-bottle" aria-hidden="true"></i>
            <span>ruou-can.jpg</span>
          </div>
          <div class="fc-ribbon">Văn hóa lễ hội</div>
          <div class="fc-num">04</div>
        </div>
        <div class="fc-body">
          <span class="fc-tag fc-tag-teal">Hồn của đồng bào</span>
          <h3>Rượu cần &amp; cà phê rượu</h3>
          <p>Ủ từ men lá rừng và gạo nếp, uống bằng cần tre quanh ché. Linh hồn của mọi lễ hội Bahnar, Gia Rai, Jrai.</p>
          <div class="fc-footer">
            <div class="fc-dot fc-dot-teal"></div>
            <span class="fc-meta">Lễ hội cồng chiêng · Nhà rông</span>
          </div>
        </div>
      </div>

    </div><!-- /cards-grid -->

    <!-- ══ HIGHLIGHT BAND ══ -->
    <div class="highlight-band" aria-label="Bí quyết ẩm thực">
      <div class="hb-text">
        <h3>Hương vị được<br><em>trao truyền qua thế hệ</em></h3>
        <p style="margin-top:0.8rem;">Từ bếp lửa nhà rông đến những phiên chợ sáng sớm Pleiku — ẩm thực Gia Lai mang dấu ấn của đất đỏ bazan, gió cao nguyên và tâm hồn người Jrai, Bahnar.</p>
      </div>
      <ul class="hb-list">
        <li>Nguyên liệu rừng núi hoàn toàn tự nhiên, hái trực tiếp từ đại ngàn</li>
        <li>Kỹ thuật nướng than củi truyền thống giữ trọn hương vị</li>
        <li>Muối kiến vàng và tiêu rừng — gia vị đặc hữu của Tây Nguyên</li>
        <li>Mỗi mùa lễ hội mang đến công thức ẩm thực riêng biệt</li>
      </ul>
    </div>

    <!-- ══ EXPLORE ROW ══ -->
    <div class="section-bar">
      <h2>Khám phá thêm</h2>
      <div class="section-bar-line"></div>
    </div>

    <div class="explore-row">
      <a href="#" class="explore-chip">
        <div class="explore-chip-icon"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
        <div>
          <span>Địa điểm ăn uống</span>
          <small>Nhà hàng &amp; quán địa phương</small>
        </div>
      </a>
      <a href="#" class="explore-chip">
        <div class="explore-chip-icon"><i class="ti ti-calendar-event" aria-hidden="true"></i></div>
        <div>
          <span>Lễ hội ẩm thực</span>
          <small>Sự kiện trong năm</small>
        </div>
      </a>
      <a href="#" class="explore-chip">
        <div class="explore-chip-icon"><i class="ti ti-shopping-bag" aria-hidden="true"></i></div>
        <div>
          <span>Đặc sản mang về</span>
          <small>Quà từ Gia Lai</small>
        </div>
      </a>
      <a href="#" class="explore-chip">
        <div class="explore-chip-icon"><i class="ti ti-chef-hat" aria-hidden="true"></i></div>
        <div>
          <span>Công thức nấu ăn</span>
          <small>Tự tay chế biến tại nhà</small>
        </div>
      </a>
    </div>

  </div><!-- /pg-body -->

</div><!-- /pg -->

<?php include('footer.php'); ?>
</body>
</html>