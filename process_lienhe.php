<?php
// ============================================================
//  CẤU HÌNH - chỉnh sửa theo môi trường của bạn
// ============================================================

// --- Database ---
define('DB_HOST', 'localhost');
define('DB_NAME', 'gialai');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// --- Email nhận thông báo ---
define('ADMIN_EMAIL', 'info@vanhoagialai.vn');
define('SITE_NAME',   'Văn Hóa Gia Lai');

// ============================================================
//  CHỈ CHẤP NHẬN POST
// ============================================================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: lienhe.php');
    exit;
}

// ============================================================
//  HÀM TIỆN ÍCH
// ============================================================
function clean(string $value): string {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

function redirect(string $status, string $message, array $old = []): void {
    $msg = urlencode($message);
    $query = "status={$status}&msg={$msg}";
    foreach ($old as $key => $val) {
        $query .= '&' . urlencode($key) . '=' . urlencode($val);
    }
    header("Location: lienhe.php?{$query}");
    exit;
}

// ============================================================
//  LẤY & VALIDATE DỮ LIỆU
// ============================================================
$hoten   = clean($_POST['hoten']   ?? '');
$email   = clean($_POST['email']   ?? '');
$sdt     = clean($_POST['sdt']     ?? '');
$tieude  = clean($_POST['tieude']  ?? '');
$noidung = clean($_POST['noidung'] ?? '');

$errors = [];

if ($hoten === '') {
    $errors[] = 'Vui lòng nhập họ và tên.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Địa chỉ email không hợp lệ.';
}
if ($noidung === '') {
    $errors[] = 'Vui lòng nhập nội dung tin nhắn.';
}
if ($sdt !== '' && !preg_match('/^[0-9\s\+\-]{7,15}$/', $sdt)) {
    $errors[] = 'Số điện thoại không hợp lệ.';
}

if (!empty($errors)) {
    redirect('error', implode(' ', $errors), [
        'hoten'   => $hoten,
        'email'   => $email,
        'sdt'     => $sdt,
        'tieude'  => $tieude,
        'noidung' => $noidung,
    ]);
}

// ============================================================
//  LƯU VÀO DATABASE
// ============================================================
try {
    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        DB_HOST, DB_NAME, DB_CHARSET
    );
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Tự động tạo bảng nếu chưa có
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS lienhe (
            id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            hoten      VARCHAR(100)  NOT NULL,
            email      VARCHAR(150)  NOT NULL,
            sdt        VARCHAR(20)   DEFAULT NULL,
            tieude     VARCHAR(255)  DEFAULT NULL,
            noidung    TEXT          NOT NULL,
            ngay_gui   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
            da_doc     TINYINT(1)    NOT NULL DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    $stmt = $pdo->prepare("
        INSERT INTO lienhe (hoten, email, sdt, tieude, noidung)
        VALUES (:hoten, :email, :sdt, :tieude, :noidung)
    ");
    $stmt->execute([
        ':hoten'   => $hoten,
        ':email'   => $email,
        ':sdt'     => $sdt     ?: null,
        ':tieude'  => $tieude  ?: null,
        ':noidung' => $noidung,
    ]);

} catch (PDOException $e) {
    error_log('[LienHe DB Error] ' . $e->getMessage());
    redirect('error', 'Có lỗi xảy ra khi lưu dữ liệu. Vui lòng thử lại sau.', [
        'hoten'   => $hoten,
        'email'   => $email,
        'sdt'     => $sdt,
        'tieude'  => $tieude,
        'noidung' => $noidung,
    ]);
}

// ============================================================
//  GỬI EMAIL THÔNG BÁO
// ============================================================
$ngayGui = date('d/m/Y H:i:s');

// --- Email gửi đến Admin ---
$subjectAdmin  = '[' . SITE_NAME . '] Tin nhắn mới từ ' . $hoten;
$bodyAdmin = "
Bạn vừa nhận được một tin nhắn liên hệ mới từ website " . SITE_NAME . ".

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  THÔNG TIN NGƯỜI GỬI
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Họ tên   : {$hoten}
Email    : {$email}
SĐT      : " . ($sdt ?: 'Không cung cấp') . "
Tiêu đề  : " . ($tieude ?: 'Không có tiêu đề') . "
Ngày gửi : {$ngayGui}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  NỘI DUNG TIN NHẮN
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
{$noidung}

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Email này được gửi tự động từ hệ thống " . SITE_NAME . ".
";

$headersAdmin  = "From: noreply@vanhoagialai.vn\r\n";
$headersAdmin .= "Reply-To: {$email}\r\n";
$headersAdmin .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headersAdmin .= "X-Mailer: PHP/" . phpversion();

$mailAdminOk = mail(ADMIN_EMAIL, $subjectAdmin, $bodyAdmin, $headersAdmin);

// --- Email xác nhận gửi đến người dùng ---
$subjectUser  = '[' . SITE_NAME . '] Chúng tôi đã nhận được tin nhắn của bạn';
$bodyUser = "
Xin chào {$hoten},

Cảm ơn bạn đã liên hệ với " . SITE_NAME . "!
Chúng tôi đã nhận được tin nhắn của bạn và sẽ phản hồi trong thời gian sớm nhất.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
  TIN NHẮN CỦA BẠN
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Tiêu đề  : " . ($tieude ?: 'Không có tiêu đề') . "
Nội dung : {$noidung}
Ngày gửi : {$ngayGui}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Nếu bạn cần hỗ trợ khẩn, vui lòng gọi: 0375818959

Trân trọng,
Đội ngũ " . SITE_NAME . "
📍 123 Đường Phan Đình Phùng, TP. Pleiku, Gia Lai
";

$headersUser  = "From: " . SITE_NAME . " <noreply@vanhoagialai.vn>\r\n";
$headersUser .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headersUser .= "X-Mailer: PHP/" . phpversion();

mail($email, $subjectUser, $bodyUser, $headersUser);

// Ghi log nếu email admin thất bại (không chặn luồng)
if (!$mailAdminOk) {
    error_log('[LienHe Mail Error] Không gửi được email thông báo đến admin.');
}

// ============================================================
//  THÀNH CÔNG - REDIRECT
// ============================================================
redirect('success', 'Tin nhắn của bạn đã được gửi thành công! Chúng tôi sẽ phản hồi sớm nhất có thể.');