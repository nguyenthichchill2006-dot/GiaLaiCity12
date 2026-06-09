<?php include 'header.php'; ?>
<?php
$page_title = "Hướng dẫn sử dụng - Gia Lai Culture";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?></title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f5f5f0; color: #1a1a1a; }
    header { background: #1a3a1f; color: #fff; padding: 16px 40px; display: flex; align-items: center; gap: 12px; }
    header img { height: 40px; }
    header h1 { font-size: 1.1rem; font-weight: 600; }
    header span { font-size: 0.8rem; color: #a8c5a0; }
    .breadcrumb { background: #fff; padding: 10px 40px; font-size: 0.85rem; color: #888; border-bottom: 1px solid #e0e0e0; }
    .breadcrumb a { color: #2a6a2e; text-decoration: none; }
    .breadcrumb a:hover { text-decoration: underline; }
    .container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
    .page-title { font-size: 1.8rem; font-weight: 700; color: #1a3a1f; margin-bottom: 8px; }
    .page-subtitle { color: #666; margin-bottom: 32px; font-size: 0.95rem; }
    .section { background: #fff; border-radius: 8px; padding: 28px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
    .section h2 { font-size: 1.1rem; color: #1a3a1f; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
    .section h2 span.icon { width: 28px; height: 28px; background: #e8f5e9; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 0.9rem; }
    .step-list { list-style: none; counter-reset: steps; }
    .step-list li { counter-increment: steps; padding: 12px 0 12px 44px; position: relative; border-bottom: 1px solid #f0f0f0; font-size: 0.95rem; line-height: 1.6; color: #333; }
    .step-list li:last-child { border-bottom: none; }
    .step-list li::before { content: counter(steps); position: absolute; left: 0; top: 12px; width: 28px; height: 28px; background: #1a3a1f; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: 700; }
    .tip-box { background: #fffde7; border-left: 4px solid #f9a825; padding: 14px 16px; border-radius: 4px; font-size: 0.9rem; color: #555; margin-top: 16px; }
    .tip-box strong { color: #f9a825; }
    footer { background: #1a3a1f; color: #a8c5a0; text-align: center; padding: 20px; font-size: 0.85rem; margin-top: 60px; }
  </style>
</head>
<body>

<header>
  <div>
    <h1>Gia Lai Culture</h1>
    <span>Kết nối tinh hoa - Lan tỏa bản sắc</span>
  </div>
</header>

<div class="breadcrumb">
  <a href="/">Trang chủ</a> › <a href="/ho-tro">Hỗ trợ</a> › Hướng dẫn sử dụng
</div>

<div class="container">
  <div class="page-title">Hướng dẫn sử dụng</div>
  <div class="page-subtitle">Hướng dẫn chi tiết giúp bạn sử dụng cổng thông tin văn hóa Gia Lai một cách hiệu quả nhất.</div>

  <div class="section">
    <h2><span class="icon">🔍</span> Tìm kiếm thông tin</h2>
    <ul class="step-list">
      <li>Truy cập trang chủ tại địa chỉ <strong>gialaiulture.vn</strong></li>
      <li>Sử dụng thanh tìm kiếm ở đầu trang để nhập từ khóa (địa danh, lễ hội, ẩm thực...)</li>
      <li>Lọc kết quả theo danh mục: Văn hóa, Du lịch, Ẩm thực, Lễ hội</li>
      <li>Nhấn vào bài viết để xem nội dung chi tiết</li>
    </ul>
    <div class="tip-box"><strong>Mẹo:</strong> Dùng dấu ngoặc kép để tìm kiếm cụm từ chính xác, ví dụ: "cồng chiêng Tây Nguyên".</div>
  </div>

  <div class="section">
    <h2><span class="icon">👤</span> Đăng ký & Đăng nhập</h2>
    <ul class="step-list">
      <li>Nhấn nút <strong>Đăng ký</strong> ở góc trên bên phải trang web</li>
      <li>Điền đầy đủ thông tin: họ tên, email, mật khẩu (tối thiểu 8 ký tự)</li>
      <li>Kiểm tra email để xác nhận tài khoản</li>
      <li>Đăng nhập bằng email và mật khẩu đã đăng ký</li>
    </ul>
  </div>

  <div class="section">
    <h2><span class="icon">📰</span> Đăng ký nhận bản tin</h2>
    <ul class="step-list">
      <li>Cuộn xuống cuối trang (footer) để tìm mục <strong>Đăng ký nhận tin</strong></li>
      <li>Nhập địa chỉ email của bạn vào ô nhập liệu</li>
      <li>Nhấn nút <strong>Đăng ký</strong> màu vàng</li>
      <li>Kiểm tra email để xác nhận đăng ký thành công</li>
    </ul>
    <div class="tip-box"><strong>Lưu ý:</strong> Bạn có thể hủy đăng ký bất kỳ lúc nào bằng cách nhấn liên kết "Hủy đăng ký" trong email nhận được.</div>
  </div>
</div>

<footer>
  &copy; <?= date('Y') ?> Văn hóa Gia Lai. All rights reserved.
</footer>

</body>
</html>
