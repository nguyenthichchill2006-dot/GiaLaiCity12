<?php
$page_title = "Giới thiệu";
$page_active = "gioi-thieu";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?> - Về chúng tôi</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --dark: #1a2a1a;
      --darker: #0f1a0f;
      --gold: #c9a84c;
      --gold-light: #e8c97a;
      --text: #d4d9cc;
      --text-muted: #8a9e80;
      --white: #f5f0e8;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Be Vietnam Pro', sans-serif;
      background: var(--darker);
      color: var(--text);
      min-height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
      position: fixed;
      top: 0; left: 0;
      width: 260px;
      height: 100vh;
      background: var(--dark);
      border-right: 1px solid rgba(201,168,76,0.2);
      padding: 40px 0;
      z-index: 100;
    }
    .sidebar-title {
      font-family: 'Playfair Display', serif;
      color: var(--gold);
      font-size: 1.1rem;
      font-weight: 700;
      padding: 0 28px 12px;
      border-bottom: 2px solid var(--gold);
      margin-bottom: 20px;
      letter-spacing: 0.02em;
    }
    .sidebar nav a {
      display: block;
      padding: 11px 28px;
      color: var(--text);
      text-decoration: none;
      font-size: 0.92rem;
      font-weight: 400;
      transition: all 0.2s;
      position: relative;
    }
    .sidebar nav a::before {
      content: '›';
      margin-right: 8px;
      color: var(--gold);
    }
    .sidebar nav a:hover {
      color: var(--gold-light);
      background: rgba(201,168,76,0.07);
    }
    .sidebar nav a.active {
      color: var(--gold);
      font-weight: 600;
      background: rgba(201,168,76,0.12);
    }

    /* MAIN */
    .main {
      margin-left: 260px;
      padding: 60px 70px;
      max-width: 900px;
    }
    .breadcrumb {
      font-size: 0.8rem;
      color: var(--text-muted);
      margin-bottom: 40px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    .breadcrumb span { color: var(--gold); }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      color: var(--white);
      margin-bottom: 8px;
      line-height: 1.15;
    }
    .underline-bar {
      width: 60px;
      height: 3px;
      background: var(--gold);
      margin-bottom: 40px;
    }
    .lead {
      font-size: 1.1rem;
      font-weight: 300;
      color: var(--text);
      line-height: 1.9;
      margin-bottom: 36px;
    }
    .content-section {
      margin-bottom: 44px;
    }
    .content-section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.35rem;
      color: var(--gold-light);
      margin-bottom: 14px;
    }
    .content-section p {
      font-size: 0.97rem;
      line-height: 1.85;
      color: var(--text);
      margin-bottom: 12px;
    }

    .values-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 30px;
    }
    .value-card {
      background: rgba(201,168,76,0.06);
      border: 1px solid rgba(201,168,76,0.18);
      border-radius: 4px;
      padding: 24px 20px;
    }
    .value-card .icon {
      font-size: 1.6rem;
      margin-bottom: 12px;
    }
    .value-card h3 {
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--gold);
      margin-bottom: 8px;
    }
    .value-card p {
      font-size: 0.85rem;
      color: var(--text-muted);
      line-height: 1.7;
    }

    @media (max-width: 768px) {
      .sidebar { width: 100%; height: auto; position: relative; }
      .main { margin-left: 0; padding: 30px 24px; }
      .values-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-title">Về chúng tôi</div>
  <nav>
    <a href="gioi-thieu.php" class="<?= $page_active === 'gioi-thieu' ? 'active' : '' ?>">Giới thiệu</a>
    <a href="so-do-website.php" class="<?= $page_active === 'so-do-website' ? 'active' : '' ?>">Sơ đồ website</a>
    <a href="dieu-khoan-su-dung.php" class="<?= $page_active === 'dieu-khoan-su-dung' ? 'active' : '' ?>">Điều khoản sử dụng</a>
    <a href="chinh-sach-bao-mat.php" class="<?= $page_active === 'chinh-sach-bao-mat' ? 'active' : '' ?>">Chính sách bảo mật</a>
  </nav>
</aside>

<main class="main">
  <div class="breadcrumb">Trang chủ › Về chúng tôi › <span>Giới thiệu</span></div>

  <h1>Giới thiệu</h1>
  <div class="underline-bar"></div>

  <p class="lead">
    Chúng tôi là tổ chức hoạt động với sứ mệnh mang đến những giá trị thiết thực, bền vững cho cộng đồng — thông qua thông tin minh bạch, dịch vụ chất lượng và tinh thần trách nhiệm cao.
  </p>

  <div class="content-section">
    <h2>Về chúng tôi</h2>
    <p>Được thành lập với tâm huyết phục vụ người dùng Việt Nam, chúng tôi không ngừng cải tiến để đáp ứng nhu cầu ngày càng cao của xã hội. Đội ngũ chuyên gia giàu kinh nghiệm, am hiểu lĩnh vực, luôn đặt lợi ích của cộng đồng lên hàng đầu.</p>
    <p>Với phương châm <em>"Uy tín — Chất lượng — Tận tâm"</em>, mọi hoạt động của chúng tôi đều hướng đến mục tiêu tạo ra giá trị thực sự và lâu dài cho người dùng.</p>
  </div>

  <div class="content-section">
    <h2>Tầm nhìn & Sứ mệnh</h2>
    <p><strong style="color:var(--gold)">Tầm nhìn:</strong> Trở thành đơn vị uy tín hàng đầu, được tin tưởng bởi hàng triệu người dùng trên cả nước.</p>
    <p><strong style="color:var(--gold)">Sứ mệnh:</strong> Cung cấp thông tin chính xác, dịch vụ minh bạch và trải nghiệm tốt nhất cho mọi người dùng.</p>
  </div>

  <div class="content-section">
    <h2>Giá trị cốt lõi</h2>
    <div class="values-grid">
      <div class="value-card">
        <div class="icon">🎯</div>
        <h3>Chính xác</h3>
        <p>Thông tin luôn được kiểm chứng kỹ lưỡng trước khi đến tay người dùng.</p>
      </div>
      <div class="value-card">
        <div class="icon">🤝</div>
        <h3>Tận tâm</h3>
        <p>Đặt người dùng làm trung tâm trong mọi quyết định và hành động.</p>
      </div>
      <div class="value-card">
        <div class="icon">🔒</div>
        <h3>Minh bạch</h3>
        <p>Hoạt động công khai, rõ ràng và có trách nhiệm với cộng đồng.</p>
      </div>
    </div>
  </div>
</main>

</body>
</html>
