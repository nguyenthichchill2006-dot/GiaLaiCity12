<?php include 'header.php'; ?>
<?php
$page_title = "Liên hệ - Gia Lai Culture";

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim($_POST['name'] ?? '');
  $email   = trim($_POST['email'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if (empty($name))    $errors[] = "Vui lòng nhập họ và tên.";
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
                       $errors[] = "Email không hợp lệ.";
  if (empty($subject)) $errors[] = "Vui lòng nhập tiêu đề.";
  if (strlen($message) < 10) $errors[] = "Nội dung phải có ít nhất 10 ký tự.";

  if (empty($errors)) {
    // Gửi email thực tế (bỏ comment khi triển khai)
    // $to = "vanhoagialai@gmail.com";
    // $headers = "From: $email\r\nContent-Type: text/plain; charset=UTF-8";
    // mail($to, "[Liên hệ] $subject", "Từ: $name\nEmail: $email\n\n$message", $headers);
    $success = true;
  }
}
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
    header { background: #1a3a1f; color: #fff; padding: 16px 40px; }
    header h1 { font-size: 1.1rem; font-weight: 600; }
    header span { font-size: 0.8rem; color: #a8c5a0; }
    .breadcrumb { background: #fff; padding: 10px 40px; font-size: 0.85rem; color: #888; border-bottom: 1px solid #e0e0e0; }
    .breadcrumb a { color: #2a6a2e; text-decoration: none; }
    .container { max-width: 1000px; margin: 40px auto; padding: 0 20px; display: grid; grid-template-columns: 1fr 1.5fr; gap: 28px; }
    .page-header { grid-column: 1 / -1; }
    .page-title { font-size: 1.8rem; font-weight: 700; color: #1a3a1f; margin-bottom: 6px; }
    .page-subtitle { color: #666; font-size: 0.95rem; }
    .info-card { background: #1a3a1f; color: #fff; border-radius: 10px; padding: 28px; }
    .info-card h3 { font-size: 1rem; margin-bottom: 20px; color: #d4e8d4; }
    .info-item { display: flex; gap: 14px; margin-bottom: 22px; align-items: flex-start; }
    .info-icon { width: 36px; height: 36px; background: rgba(255,255,255,0.12); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
    .info-label { font-size: 0.75rem; color: #a8c5a0; margin-bottom: 3px; }
    .info-value { font-size: 0.92rem; color: #fff; }
    .hours { margin-top: 24px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.15); font-size: 0.85rem; color: #a8c5a0; line-height: 1.7; }
    .form-card { background: #fff; border-radius: 10px; padding: 28px; box-shadow: 0 1px 6px rgba(0,0,0,0.07); }
    .form-card h3 { font-size: 1rem; color: #1a3a1f; margin-bottom: 20px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }
    .form-group { margin-bottom: 14px; }
    .form-group label { display: block; font-size: 0.85rem; font-weight: 600; color: #444; margin-bottom: 6px; }
    .form-group input, .form-group select, .form-group textarea {
      width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 6px;
      font-size: 0.92rem; font-family: inherit; transition: border 0.2s; color: #222;
    }
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
      outline: none; border-color: #2a6a2e;
    }
    textarea { resize: vertical; min-height: 120px; }
    .btn-submit { width: 100%; background: #d4a017; color: #fff; border: none; padding: 12px; border-radius: 6px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.2s; }
    .btn-submit:hover { background: #b8880f; }
    .alert-success { background: #e8f5e9; border: 1px solid #4caf50; color: #2e7d32; padding: 14px 18px; border-radius: 6px; margin-bottom: 18px; font-size: 0.92rem; }
    .alert-error { background: #fdecea; border: 1px solid #e57373; color: #c62828; padding: 14px 18px; border-radius: 6px; margin-bottom: 18px; font-size: 0.92rem; }
    .alert-error ul { margin-top: 6px; padding-left: 18px; }
    footer { background: #1a3a1f; color: #a8c5a0; text-align: center; padding: 20px; font-size: 0.85rem; margin-top: 60px; }
    @media (max-width: 680px) { .container { grid-template-columns: 1fr; } .form-row { grid-template-columns: 1fr; } }
  </style>
</head>
<body>

<header>
  <h1>Gia Lai Culture</h1>
  <span>Kết nối tinh hoa - Lan tỏa bản sắc</span>
</header>

<div class="breadcrumb">
  <a href="/">Trang chủ</a> › <a href="/ho-tro">Hỗ trợ</a> › Liên hệ
</div>

<div class="container">
  <div class="page-header">
    <div class="page-title">Liên hệ với chúng tôi</div>
    <div class="page-subtitle">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn.</div>
  </div>

  <div class="info-card">
    <h3>Thông tin liên hệ</h3>
    <div class="info-item">
      <div class="info-icon">📍</div>
      <div>
        <div class="info-label">Địa chỉ</div>
        <div class="info-value">59 Trần Phú, P. Diên Hồng,<br>TP. Pleiku, Gia Lai</div>
      </div>
    </div>
    <div class="info-item">
      <div class="info-icon">📞</div>
      <div>
        <div class="info-label">Điện thoại</div>
        <div class="info-value">0269 123 4567</div>
      </div>
    </div>
    <div class="info-item">
      <div class="info-icon">✉️</div>
      <div>
        <div class="info-label">Email</div>
        <div class="info-value">vanhoagialai@gmail.com</div>
      </div>
    </div>
    <div class="hours">
      <strong style="color:#d4e8d4">Giờ làm việc</strong><br>
      Thứ Hai – Thứ Sáu: 7:30 – 17:00<br>
      Thứ Bảy: 8:00 – 12:00<br>
      Chủ Nhật: Nghỉ
    </div>
  </div>

  <div class="form-card">
    <h3>Gửi tin nhắn cho chúng tôi</h3>

    <?php if ($success): ?>
      <div class="alert-success">✅ Cảm ơn bạn! Tin nhắn đã được gửi thành công. Chúng tôi sẽ phản hồi trong vòng 1-2 ngày làm việc.</div>
    <?php elseif (!empty($errors)): ?>
      <div class="alert-error">
        <strong>Vui lòng kiểm tra lại:</strong>
        <ul><?php foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>"; ?></ul>
      </div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST" action="">
      <div class="form-row">
        <div class="form-group">
          <label for="name">Họ và tên <span style="color:red">*</span></label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="Nguyễn Văn A">
        </div>
        <div class="form-group">
          <label for="email">Email <span style="color:red">*</span></label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="email@example.com">
        </div>
      </div>
      <div class="form-group">
        <label for="subject">Tiêu đề <span style="color:red">*</span></label>
        <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>" placeholder="Chủ đề bạn muốn liên hệ">
      </div>
      <div class="form-group">
        <label for="message">Nội dung <span style="color:red">*</span></label>
        <textarea id="message" name="message" placeholder="Nhập nội dung tin nhắn của bạn..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
      </div>
      <button type="submit" class="btn-submit">Gửi tin nhắn</button>
    </form>
    <?php endif; ?>
  </div>
</div>

<footer>
  &copy; <?= date('Y') ?> Văn hóa Gia Lai. All rights reserved.
</footer>

</body>
</html>
