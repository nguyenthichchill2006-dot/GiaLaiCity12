<?php
$page_title = "Chính sách bảo mật";
$page_active = "chinh-sach-bao-mat";
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

    /* Privacy highlights */
    .privacy-highlights {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-bottom: 48px;
    }
    .highlight-card {
      background: rgba(201,168,76,0.06);
      border: 1px solid rgba(201,168,76,0.15);
      border-radius: 4px;
      padding: 20px 18px;
      text-align: center;
    }
    .highlight-card .icon { font-size: 1.8rem; margin-bottom: 10px; }
    .highlight-card h3 { font-size: 0.85rem; color: var(--gold); font-weight: 600; margin-bottom: 6px; }
    .highlight-card p { font-size: 0.8rem; color: var(--text-muted); line-height: 1.6; }

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

    .contact-box {
      background: rgba(201,168,76,0.08);
      border: 1px solid rgba(201,168,76,0.2);
      border-radius: 4px;
      padding: 24px 28px;
      margin-top: 20px;
    }
    .contact-box h3 { color: var(--gold); font-size: 0.95rem; margin-bottom: 10px; }
    .contact-box p { font-size: 0.9rem; color: var(--text-muted); line-height: 1.75; }
    .contact-box a { color: var(--gold); text-decoration: none; }

    @media (max-width: 768px) {
      .sidebar { width: 100%; height: auto; position: relative; }
      .main { margin-left: 0; padding: 30px 24px; }
      .privacy-highlights { grid-template-columns: 1fr; }
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
  <div class="breadcrumb">Trang chủ › Về chúng tôi › <span>Chính sách bảo mật</span></div>
  <h1>Chính sách bảo mật</h1>
  <div class="underline-bar"></div>
  <div class="meta">Cập nhật lần cuối: <?= $updated_date ?></div>

  <div class="privacy-highlights">
    <div class="highlight-card">
      <div class="icon">🔐</div>
      <h3>Bảo mật dữ liệu</h3>
      <p>Thông tin của bạn được mã hóa và bảo vệ theo tiêu chuẩn cao nhất.</p>
    </div>
    <div class="highlight-card">
      <div class="icon">🚫</div>
      <h3>Không bán dữ liệu</h3>
      <p>Chúng tôi cam kết không bán hoặc chia sẻ thông tin cá nhân của bạn.</p>
    </div>
    <div class="highlight-card">
      <div class="icon">✅</div>
      <h3>Quyền kiểm soát</h3>
      <p>Bạn có toàn quyền xem, chỉnh sửa hoặc xóa dữ liệu của mình.</p>
    </div>
  </div>

  <div class="toc">
    <h3>Mục lục</h3>
    <ol>
      <li><a href="#sec1">Thông tin chúng tôi thu thập</a></li>
      <li><a href="#sec2">Mục đích sử dụng thông tin</a></li>
      <li><a href="#sec3">Chia sẻ thông tin với bên thứ ba</a></li>
      <li><a href="#sec4">Bảo mật thông tin</a></li>
      <li><a href="#sec5">Cookie và công nghệ theo dõi</a></li>
      <li><a href="#sec6">Quyền của người dùng</a></li>
      <li><a href="#sec7">Liên hệ</a></li>
    </ol>
  </div>

  <div class="article-section" id="sec1">
    <h2>1. Thông tin chúng tôi thu thập</h2>
    <p>Chúng tôi có thể thu thập các loại thông tin sau khi bạn sử dụng website:</p>
    <ul>
      <li><strong>Thông tin cá nhân:</strong> họ tên, địa chỉ email, số điện thoại khi bạn đăng ký hoặc liên hệ với chúng tôi.</li>
      <li><strong>Dữ liệu sử dụng:</strong> địa chỉ IP, loại trình duyệt, trang đã xem, thời gian truy cập.</li>
      <li><strong>Dữ liệu cookie:</strong> được thu thập tự động để cải thiện trải nghiệm người dùng.</li>
    </ul>
  </div>

  <div class="article-section" id="sec2">
    <h2>2. Mục đích sử dụng thông tin</h2>
    <p>Thông tin thu thập được sử dụng để:</p>
    <ul>
      <li>Cung cấp và cải thiện các dịch vụ của chúng tôi.</li>
      <li>Gửi thông báo, cập nhật liên quan đến tài khoản hoặc dịch vụ.</li>
      <li>Phân tích xu hướng sử dụng nhằm nâng cao chất lượng website.</li>
      <li>Xử lý yêu cầu hỗ trợ từ người dùng.</li>
      <li>Tuân thủ các yêu cầu pháp lý khi cần thiết.</li>
    </ul>
  </div>

  <div class="article-section" id="sec3">
    <h2>3. Chia sẻ thông tin với bên thứ ba</h2>
    <p>Chúng tôi <strong>không bán, trao đổi hay cho thuê</strong> thông tin cá nhân của bạn cho bên thứ ba vì mục đích thương mại.</p>
    <p>Thông tin có thể được chia sẻ trong các trường hợp sau:</p>
    <ul>
      <li>Khi có yêu cầu từ cơ quan nhà nước có thẩm quyền theo quy định pháp luật.</li>
      <li>Với các đối tác cung cấp dịch vụ hỗ trợ kỹ thuật (lưu trữ, phân tích), có ràng buộc bảo mật chặt chẽ.</li>
      <li>Khi bạn đã đồng ý rõ ràng với việc chia sẻ đó.</li>
    </ul>
  </div>

  <div class="article-section" id="sec4">
    <h2>4. Bảo mật thông tin</h2>
    <p>Chúng tôi áp dụng các biện pháp kỹ thuật và quản lý phù hợp để bảo vệ thông tin của bạn, bao gồm mã hóa SSL, kiểm soát truy cập và giám sát hệ thống định kỳ.</p>
    <p>Tuy nhiên, không có phương thức truyền tải dữ liệu nào trên Internet là an toàn tuyệt đối. Chúng tôi cam kết nỗ lực bảo vệ dữ liệu của bạn nhưng không thể đảm bảo an toàn 100%.</p>
  </div>

  <div class="article-section" id="sec5">
    <h2>5. Cookie và công nghệ theo dõi</h2>
    <p>Website sử dụng cookie để ghi nhớ tùy chọn của bạn và cải thiện trải nghiệm. Bạn có thể tắt cookie trong cài đặt trình duyệt, tuy nhiên điều này có thể ảnh hưởng đến một số chức năng của website.</p>
    <p>Chúng tôi cũng có thể sử dụng các công cụ phân tích của bên thứ ba (như Google Analytics) để theo dõi hành vi truy cập ở dạng tổng hợp, ẩn danh.</p>
  </div>

  <div class="article-section" id="sec6">
    <h2>6. Quyền của người dùng</h2>
    <p>Bạn có các quyền sau liên quan đến dữ liệu cá nhân của mình:</p>
    <ul>
      <li><strong>Quyền truy cập:</strong> yêu cầu xem thông tin chúng tôi đang lưu giữ về bạn.</li>
      <li><strong>Quyền chỉnh sửa:</strong> yêu cầu sửa thông tin không chính xác.</li>
      <li><strong>Quyền xóa:</strong> yêu cầu xóa dữ liệu trong phạm vi cho phép của pháp luật.</li>
      <li><strong>Quyền phản đối:</strong> phản đối việc xử lý dữ liệu vì mục đích marketing.</li>
    </ul>
    <p>Để thực hiện các quyền này, vui lòng liên hệ với chúng tôi theo thông tin bên dưới.</p>
  </div>

  <div class="article-section" id="sec7">
    <h2>7. Liên hệ</h2>
    <p>Nếu bạn có bất kỳ câu hỏi nào liên quan đến Chính sách bảo mật này, vui lòng liên hệ:</p>
    <div class="contact-box">
      <h3>Bộ phận Bảo mật & Quyền riêng tư</h3>
      <p>
        📧 Email: <a href="mailto:privacy@example.vn">privacy@example.vn</a><br>
        📞 Điện thoại: 1800 xxxx (miễn phí, 8:00–17:00 các ngày làm việc)<br>
        🏢 Địa chỉ: 123 Đường ABC, Quận X, TP. Hồ Chí Minh
      </p>
    </div>
  </div>
</main>

</body>
</html>
