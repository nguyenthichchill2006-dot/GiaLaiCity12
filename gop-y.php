<?php include 'header.php'; ?>
<?php
// gop-y.php
$page_title = "Góp ý - Gia Lai Culture";

// ============================================================
// CẤU HÌNH KẾT NỐI DATABASE — chỉnh lại cho phù hợp server
// ============================================================
define('DB_HOST', 'localhost');
define('DB_NAME', 'gialai');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHAR', 'utf8mb4');

function getDB(): PDO {
  static $pdo = null;
  if ($pdo === null) {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
  }
  return $pdo;
}

// ============================================================
// TẠO BẢNG NẾU CHƯA TỒN TẠI
// ============================================================
try {
  getDB()->exec("
    CREATE TABLE IF NOT EXISTS gop_y (
      id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      type       ENUM('noi_dung','giao_dien','tinh_nang','khac') NOT NULL,
      rating     TINYINT UNSIGNED NOT NULL,
      content    TEXT NOT NULL,
      email      VARCHAR(255) DEFAULT NULL,
      ip_address VARCHAR(45) DEFAULT NULL,
      created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  ");
} catch (PDOException $e) {
  // Không dừng trang — lỗi sẽ hiện khi submit
}

// ============================================================
// XỬ LÝ FORM
// ============================================================
$success = false;
$errors  = [];
$db_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type    = trim($_POST['type']    ?? '');
  $content = trim($_POST['content'] ?? '');
  $email   = trim($_POST['email']   ?? '') ?: null;
  $rating  = intval($_POST['rating'] ?? 0);

  $valid_types = ['noi_dung', 'giao_dien', 'tinh_nang', 'khac'];
  if (!in_array($type, $valid_types))  $errors[] = "Vui lòng chọn loại góp ý.";
  if (strlen($content) < 20)           $errors[] = "Nội dung góp ý phải có ít nhất 20 ký tự.";
  if ($email !== null && !filter_var($email, FILTER_VALIDATE_EMAIL))
                                        $errors[] = "Email không hợp lệ.";
  if ($rating < 1 || $rating > 5)      $errors[] = "Vui lòng đánh giá từ 1 đến 5 sao.";

  if (empty($errors)) {
    try {
      $stmt = getDB()->prepare("
        INSERT INTO gop_y (type, rating, content, email, ip_address)
        VALUES (:type, :rating, :content, :email, :ip)
      ");
      $stmt->execute([
        ':type'    => $type,
        ':rating'  => $rating,
        ':content' => $content,
        ':email'   => $email,
        ':ip'      => $_SERVER['REMOTE_ADDR'] ?? null,
      ]);
      $success = true;
    } catch (PDOException $e) {
      $db_error = "Không thể lưu góp ý vào hệ thống. Vui lòng thử lại sau.";
      // Ghi log lỗi thực tế (không hiển thị ra ngoài)
      error_log("[gop-y] DB error: " . $e->getMessage());
    }
  }
}

$type_labels = [
  'noi_dung'  => 'Nội dung bài viết',
  'giao_dien' => 'Giao diện & Trải nghiệm',
  'tinh_nang' => 'Tính năng website',
  'khac'      => 'Khác',
];
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
    .container { max-width: 680px; margin: 40px auto; padding: 0 20px; }
    .page-title { font-size: 1.8rem; font-weight: 700; color: #1a3a1f; margin-bottom: 6px; }
    .page-subtitle { color: #666; font-size: 0.95rem; margin-bottom: 30px; }
    .form-card { background: #fff; border-radius: 10px; padding: 32px; box-shadow: 0 1px 6px rgba(0,0,0,0.07); }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 0.87rem; font-weight: 700; color: #333; margin-bottom: 8px; }
    .form-group input, .form-group select, .form-group textarea {
      width: 100%; padding: 10px 14px; border: 1.5px solid #ddd; border-radius: 7px;
      font-size: 0.92rem; font-family: inherit; color: #222; transition: border 0.2s;
    }
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
      outline: none; border-color: #2a6a2e;
    }
    textarea { resize: vertical; min-height: 140px; }
    .type-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .type-option { border: 1.5px solid #ddd; border-radius: 7px; padding: 12px 14px; cursor: pointer; font-size: 0.88rem; color: #444; transition: all 0.18s; display: flex; align-items: center; gap: 8px; }
    .type-option input[type="radio"] { accent-color: #1a3a1f; }
    .type-option:has(input:checked) { border-color: #2a6a2e; background: #f0f7f0; color: #1a3a1f; font-weight: 600; }
    .star-row { display: flex; gap: 6px; flex-direction: row-reverse; justify-content: flex-end; }
    .star-row input { display: none; }
    .star-row label { font-size: 2rem; color: #ddd; cursor: pointer; transition: color 0.15s; }
    .star-row label:hover, .star-row label:hover ~ label,
    .star-row input:checked ~ label { color: #f9a825; }
    .star-hint { font-size: 0.8rem; color: #888; margin-top: 4px; }
    .optional-tag { font-weight: 400; color: #999; font-size: 0.8rem; }
    .btn-submit { width: 100%; background: #d4a017; color: #fff; border: none; padding: 13px; border-radius: 7px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.2s; margin-top: 6px; }
    .btn-submit:hover { background: #b8880f; }
    .alert-success { background: #e8f5e9; border: 1px solid #4caf50; color: #2e7d32; padding: 20px 22px; border-radius: 8px; margin-bottom: 20px; }
    .alert-success h3 { margin-bottom: 6px; }
    .alert-error { background: #fdecea; border: 1px solid #e57373; color: #c62828; padding: 14px 18px; border-radius: 7px; margin-bottom: 18px; font-size: 0.92rem; }
    .alert-error ul { margin-top: 6px; padding-left: 18px; }
    .alert-db { background: #fff3e0; border: 1px solid #fb8c00; color: #e65100; padding: 14px 18px; border-radius: 7px; margin-bottom: 18px; font-size: 0.92rem; }
    .privacy-note { font-size: 0.8rem; color: #999; margin-top: 10px; text-align: center; }
    .db-info { background: #f0f7f0; border: 1px solid #c8e6c9; border-radius: 7px; padding: 14px 18px; margin-bottom: 24px; font-size: 0.85rem; color: #2e7d32; }
    .db-info code { background: #dcedc8; padding: 2px 6px; border-radius: 3px; font-size: 0.82rem; }
    footer { background: #1a3a1f; color: #a8c5a0; text-align: center; padding: 20px; font-size: 0.85rem; margin-top: 60px; }
  </style>
</head>
<body>

<header>
  <h1>Gia Lai Culture</h1>
  <span>Kết nối tinh hoa - Lan tỏa bản sắc</span>
</header>

<div class="breadcrumb">
  <a href="/">Trang chủ</a> › <a href="/ho-tro">Hỗ trợ</a> › Góp ý
</div>

<div class="container">
  <div class="page-title">Góp ý cho chúng tôi</div>
  <div class="page-subtitle">Ý kiến của bạn giúp chúng tôi cải thiện cổng thông tin văn hóa Gia Lai ngày càng tốt hơn.</div>

  <!-- Ghi chú cấu hình (xóa khi đưa lên production) -->
  <div class="db-info">
    📦 Góp ý được lưu vào MySQL &nbsp;·&nbsp; Database: <code><?= DB_NAME ?></code> &nbsp;·&nbsp; Bảng: <code>gop_y</code>
  </div>

  <div class="form-card">

    <?php if ($success): ?>
      <div class="alert-success">
        <h3>🎉 Cảm ơn bạn đã góp ý!</h3>
        <p>Góp ý của bạn đã được lưu thành công. Chúng tôi sẽ xem xét và cải thiện trong thời gian sớm nhất.</p>
      </div>
      <p style="text-align:center; margin-top:10px"><a href="index.php" style="color:#2a6a2e">← Về trang chủ</a></p>

    <?php else: ?>

      <?php if (!empty($errors)): ?>
        <div class="alert-error">
          <strong>Vui lòng kiểm tra lại:</strong>
          <ul><?php foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>"; ?></ul>
        </div>
      <?php endif; ?>

      <?php if ($db_error): ?>
        <div class="alert-db">⚠️ <?= htmlspecialchars($db_error) ?></div>
      <?php endif; ?>

      <form method="POST" action="">

        <div class="form-group">
          <label>Loại góp ý <span style="color:red">*</span></label>
          <div class="type-grid">
            <?php foreach ($type_labels as $val => $label): ?>
            <label class="type-option">
              <input type="radio" name="type" value="<?= $val ?>"
                <?= (($_POST['type'] ?? '') === $val) ? 'checked' : '' ?>>
              <?= htmlspecialchars($label) ?>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="form-group">
          <label>Đánh giá tổng thể <span style="color:red">*</span></label>
          <div class="star-row">
            <?php for ($i = 5; $i >= 1; $i--): ?>
            <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>"
              <?= (intval($_POST['rating'] ?? 0) === $i) ? 'checked' : '' ?>>
            <label for="star<?= $i ?>">★</label>
            <?php endfor; ?>
          </div>
          <div class="star-hint">1 sao = Rất tệ &nbsp;|&nbsp; 5 sao = Rất tốt</div>
        </div>

        <div class="form-group">
          <label for="content">Nội dung góp ý <span style="color:red">*</span></label>
          <textarea id="content" name="content" placeholder="Hãy chia sẻ ý kiến, đề xuất hoặc vấn đề bạn gặp phải..."><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
          <label for="email">Email liên hệ <span class="optional-tag">(không bắt buộc)</span></label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="Để chúng tôi phản hồi nếu cần">
        </div>

        <button type="submit" class="btn-submit">Gửi góp ý</button>
        <p class="privacy-note">🔒 Thông tin của bạn được bảo mật và chỉ dùng để cải thiện dịch vụ.</p>
      </form>

    <?php endif; ?>
  </div>
</div>

<footer>
  &copy; <?= date('Y') ?> Văn hóa Gia Lai. All rights reserved.
</footer>

</body>
</html>