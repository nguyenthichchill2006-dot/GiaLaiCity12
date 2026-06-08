<?php
$page_title = "Sơ đồ website";
$page_active = "so-do-website";
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
    }
    .sidebar nav a {
      display: block;
      padding: 11px 28px;
      color: var(--text);
      text-decoration: none;
      font-size: 0.92rem;
      transition: all 0.2s;
    }
    .sidebar nav a::before { content: '›'; margin-right: 8px; color: var(--gold); }
    .sidebar nav a:hover { color: var(--gold-light); background: rgba(201,168,76,0.07); }
    .sidebar nav a.active { color: var(--gold); font-weight: 600; background: rgba(201,168,76,0.12); }

    .main { margin-left: 260px; padding: 60px 70px; }
    .breadcrumb { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 40px; letter-spacing: 0.05em; text-transform: uppercase; }
    .breadcrumb span { color: var(--gold); }
    h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; color: var(--white); margin-bottom: 8px; }
    .underline-bar { width: 60px; height: 3px; background: var(--gold); margin-bottom: 40px; }
    .intro { font-size: 0.97rem; color: var(--text-muted); margin-bottom: 50px; line-height: 1.8; }

    /* Sitemap tree */
    .sitemap { max-width: 780px; }
    .site-root {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      background: var(--gold);
      color: var(--darker);
      font-weight: 700;
      font-size: 0.95rem;
      padding: 12px 28px;
      border-radius: 3px;
      margin-bottom: 0;
      letter-spacing: 0.02em;
    }
    .level-1-group { margin-top: 0; padding-left: 30px; position: relative; }
    .level-1-group::before {
      content: '';
      position: absolute;
      left: 0; top: 0; bottom: 30px;
      width: 2px;
      background: rgba(201,168,76,0.3);
    }
    .level-1-item { position: relative; margin-top: 0; }
    .level-1-connector {
      display: flex;
      align-items: center;
      padding: 14px 0;
    }
    .level-1-connector::before {
      content: '';
      display: block;
      width: 28px;
      height: 2px;
      background: rgba(201,168,76,0.3);
      margin-right: 14px;
      flex-shrink: 0;
    }
    .level-1-label {
      background: rgba(201,168,76,0.12);
      border: 1px solid rgba(201,168,76,0.25);
      color: var(--gold-light);
      font-weight: 600;
      font-size: 0.9rem;
      padding: 9px 20px;
      border-radius: 3px;
      min-width: 180px;
    }
    .level-2-group { padding-left: 70px; position: relative; }
    .level-2-group::before {
      content: '';
      position: absolute;
      left: 42px; top: 0; bottom: 20px;
      width: 1px;
      background: rgba(201,168,76,0.15);
    }
    .level-2-item {
      display: flex;
      align-items: center;
      padding: 7px 0;
      position: relative;
    }
    .level-2-item::before {
      content: '';
      display: block;
      width: 22px;
      height: 1px;
      background: rgba(201,168,76,0.15);
      margin-right: 10px;
      flex-shrink: 0;
    }
    .level-2-link {
      color: var(--text);
      text-decoration: none;
      font-size: 0.85rem;
      padding: 5px 14px;
      border-radius: 2px;
      transition: all 0.2s;
    }
    .level-2-link:hover { color: var(--gold); background: rgba(201,168,76,0.06); }

    @media (max-width: 768px) {
      .sidebar { width: 100%; height: auto; position: relative; }
      .main { margin-left: 0; padding: 30px 24px; }
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
  <div class="breadcrumb">Trang chủ › Về chúng tôi › <span>Sơ đồ website</span></div>
  <h1>Sơ đồ website</h1>
  <div class="underline-bar"></div>
  <p class="intro">Tổng quan cấu trúc các trang và mục nội dung trên website của chúng tôi.</p>

  <div class="sitemap">
    <div class="site-root">🏠 Trang chủ</div>

    <div class="level-1-group">

      <div class="level-1-item">
        <div class="level-1-connector">
          <div class="level-1-label">📰 Tin tức</div>
        </div>
        <div class="level-2-group">
          <div class="level-2-item"><a class="level-2-link" href="#">Tin tức mới nhất</a></div>
          <div class="level-2-item"><a class="level-2-link" href="#">Tin trong nước</a></div>
          <div class="level-2-item"><a class="level-2-link" href="#">Tin quốc tế</a></div>
        </div>
      </div>

      <div class="level-1-item">
        <div class="level-1-connector">
          <div class="level-1-label">📦 Sản phẩm / Dịch vụ</div>
        </div>
        <div class="level-2-group">
          <div class="level-2-item"><a class="level-2-link" href="#">Danh mục sản phẩm</a></div>
          <div class="level-2-item"><a class="level-2-link" href="#">Bảng giá</a></div>
          <div class="level-2-item"><a class="level-2-link" href="#">Hỗ trợ & tư vấn</a></div>
        </div>
      </div>

      <div class="level-1-item">
        <div class="level-1-connector">
          <div class="level-1-label">🏢 Về chúng tôi</div>
        </div>
        <div class="level-2-group">
          <div class="level-2-item"><a class="level-2-link" href="gioi-thieu.php">Giới thiệu</a></div>
          <div class="level-2-item"><a class="level-2-link" href="so-do-website.php">Sơ đồ website</a></div>
          <div class="level-2-item"><a class="level-2-link" href="dieu-khoan-su-dung.php">Điều khoản sử dụng</a></div>
          <div class="level-2-item"><a class="level-2-link" href="chinh-sach-bao-mat.php">Chính sách bảo mật</a></div>
        </div>
      </div>

      <div class="level-1-item">
        <div class="level-1-connector">
          <div class="level-1-label">✉️ Liên hệ</div>
        </div>
        <div class="level-2-group">
          <div class="level-2-item"><a class="level-2-link" href="#">Thông tin liên hệ</a></div>
          <div class="level-2-item"><a class="level-2-link" href="#">Gửi phản hồi</a></div>
        </div>
      </div>

    </div>
  </div>
</main>

</body>
</html>
