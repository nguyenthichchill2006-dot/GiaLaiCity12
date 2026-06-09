<?php include 'header.php'; ?>

<?php

$page_title = "Điều khoản sử dụng";
$page_active = "dieu-khoan-su-dung";
$updated_date = "01/06/2025";
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
    body { font-family: 'Be Vietnam Pro', sans-serif; background: var(--darker); color: var(--text); min-height: 100vh; }

    .sidebar {
      position: fixed; top: 0; left: 0;
      width: 260px; height: 100vh;
      background: var(--dark);
      border-right: 1px solid rgba(201,168,76,0.2);
      padding: 40px 0; z-index: 100;
    }
    .sidebar-title {
      font-family: 'Playfair Display', serif;
      color: var(--gold); font-size: 1.1rem; font-weight: 700;
      padding: 0 28px 12px;
      border-bottom: 2px solid var(--gold);
      margin-bottom: 20px;
    }
    .sidebar nav a {
      display: block; padding: 11px 28px;
      color: var(--text); text-decoration: none;
      font-size: 0.92rem; transition: all 0.2s;
    }
    .sidebar nav a::before { content: '›'; margin-right: 8px; color: var(--gold); }
    .sidebar nav a:hover { color: var(--gold-light); background: rgba(201,168,76,0.07); }
    .sidebar nav a.active { color: var(--gold); font-weight: 600; background: rgba(201,168,76,0.12); }

    .main { margin-left: 260px; padding: 60px 70px; max-width: 900px; }
    .breadcrumb { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 40px; letter-spacing: 0.05em; text-transform: uppercase; }
    .breadcrumb span { color: var(--gold); }
    h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; color: var(--white); margin-bottom: 8px; }
    .underline-bar { width: 60px; height: 3px; background: var(--gold); margin-bottom: 16px; }
    .meta { font-size: 0.82rem; color: var(--text-muted); margin-bottom: 40px; }

    /* TOC */
    .toc {
      background: rgba(201,168,76,0.06);
      border: 1px solid rgba(201,168,76,0.18);
      border-left: 3px solid var(--gold);
      padding: 22px 28px;
      margin-bottom: 48px;
      border-radius: 0 4px 4px 0;
    }
    .toc h3 { color: var(--gold); font-size: 0.85rem; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 14px; }
    .toc ol { padding-left: 18px; }
    .toc li { margin-bottom: 6px; }
    .toc a { color: var(--text); text-decoration: none; font-size: 0.88rem; }
    .toc a:hover { color: var(--gold); }

    .article-section { margin-bottom: 44px; }
    .article-section h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      color: var(--gold-light);
      margin-bottom: 16px;
      padding-bottom: 8px;
      border-bottom: 1px solid rgba(201,168,76,0.15);
    }
    .article-section p { font-size: 0.96rem; line-height: 1.88; color: var(--text); margin-bottom: 14px; }
    .article-section ul { padding-left: 20px; margin-bottom: 14px; }
    .article-section ul li { font-size: 0.96rem; line-height: 1.8; color: var(--text); margin-bottom: 6px; }
    .article-section ul li::marker { color: var(--gold); }

    .notice {
      background: rgba(201,168,76,0.08);
      border-left: 3px solid var(--gold);
      padding: 16px 20px;
      margin-top: 16px;
      font-size: 0.9rem;
      color: var(--text-muted);
      border-radius: 0 3px 3px 0;
    }

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
  <div class="breadcrumb">Trang chủ › Về chúng tôi › <span>Điều khoản sử dụng</span></div>
  <h1>Điều khoản sử dụng</h1>
  <div class="underline-bar"></div>
  <div class="meta">Cập nhật lần cuối: <?= $updated_date ?></div>

  <div class="toc">
    <h3>Mục lục</h3>
    <ol>
      <li><a href="#chap1">Chấp nhận điều khoản</a></li>
      <li><a href="#chap2">Quyền và nghĩa vụ của người dùng</a></li>
      <li><a href="#chap3">Nội dung bị cấm</a></li>
      <li><a href="#chap4">Quyền sở hữu trí tuệ</a></li>
      <li><a href="#chap5">Giới hạn trách nhiệm</a></li>
      <li><a href="#chap6">Sửa đổi điều khoản</a></li>
    </ol>
  </div>

  <div class="article-section" id="chap1">
    <h2>1. Chấp nhận điều khoản</h2>
    <p>Bằng việc truy cập và sử dụng website này, bạn xác nhận đã đọc, hiểu và đồng ý bị ràng buộc bởi các Điều khoản sử dụng dưới đây. Nếu bạn không đồng ý với bất kỳ điều khoản nào, vui lòng ngừng sử dụng website.</p>
    <p>Các điều khoản này áp dụng cho tất cả người dùng, bao gồm cả khách vãng lai và người dùng đã đăng ký tài khoản.</p>
  </div>

  <div class="article-section" id="chap2">
    <h2>2. Quyền và nghĩa vụ của người dùng</h2>
    <p>Người dùng có quyền:</p>
    <ul>
      <li>Truy cập và sử dụng các tính năng miễn phí của website.</li>
      <li>Đăng ký tài khoản để sử dụng các dịch vụ mở rộng.</li>
      <li>Yêu cầu hỗ trợ kỹ thuật từ đội ngũ chăm sóc khách hàng.</li>
    </ul>
    <p>Người dùng có nghĩa vụ:</p>
    <ul>
      <li>Cung cấp thông tin chính xác khi đăng ký tài khoản.</li>
      <li>Bảo mật thông tin đăng nhập của mình.</li>
      <li>Tuân thủ pháp luật Việt Nam khi sử dụng dịch vụ.</li>
      <li>Không thực hiện bất kỳ hành vi nào gây hại cho hệ thống hoặc người dùng khác.</li>
    </ul>
  </div>

  <div class="article-section" id="chap3">
    <h2>3. Nội dung bị cấm</h2>
    <p>Nghiêm cấm sử dụng website để:</p>
    <ul>
      <li>Đăng tải nội dung vi phạm pháp luật, xúc phạm hoặc phân biệt đối xử.</li>
      <li>Phát tán thông tin sai lệch, gây hoang mang dư luận.</li>
      <li>Thực hiện các hoạt động lừa đảo, gian lận.</li>
      <li>Tấn công, xâm nhập trái phép vào hệ thống.</li>
      <li>Sao chép, phân phối nội dung khi chưa được cấp phép.</li>
    </ul>
    <div class="notice">⚠️ Vi phạm các điều khoản trên có thể dẫn đến khóa tài khoản vĩnh viễn và các biện pháp pháp lý theo quy định.</div>
  </div>

  <div class="article-section" id="chap4">
    <h2>4. Quyền sở hữu trí tuệ</h2>
    <p>Toàn bộ nội dung trên website bao gồm văn bản, hình ảnh, logo, thiết kế và mã nguồn đều thuộc quyền sở hữu hoặc bản quyền của chúng tôi, hoặc đã được cấp phép hợp lệ từ bên thứ ba.</p>
    <p>Người dùng không được sao chép, chỉnh sửa hay phân phối lại bất kỳ nội dung nào mà không có văn bản chấp thuận rõ ràng từ chúng tôi.</p>
  </div>

  <div class="article-section" id="chap5">
    <h2>5. Giới hạn trách nhiệm</h2>
    <p>Chúng tôi không chịu trách nhiệm về thiệt hại phát sinh từ việc sử dụng hoặc không thể sử dụng website, bao gồm nhưng không giới hạn ở: mất dữ liệu, gián đoạn dịch vụ, hay thiệt hại gián tiếp.</p>
    <p>Website được cung cấp trên cơ sở "nguyên trạng" và chúng tôi không cam kết dịch vụ sẽ hoạt động liên tục, không có lỗi.</p>
  </div>

  <div class="article-section" id="chap6">
    <h2>6. Sửa đổi điều khoản</h2>
    <p>Chúng tôi có quyền cập nhật hoặc thay đổi các Điều khoản sử dụng bất cứ lúc nào. Thay đổi sẽ có hiệu lực ngay khi được đăng tải. Việc tiếp tục sử dụng website sau khi điều khoản được cập nhật đồng nghĩa với việc bạn chấp nhận các điều khoản mới.</p>
  </div>
</main>

</body>
</html>
