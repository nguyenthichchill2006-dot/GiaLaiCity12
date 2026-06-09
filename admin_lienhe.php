<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cấu hình
define('DB_HOST',    'localhost');
define('DB_NAME',    'gialai');
define('DB_USER',    'root');
define('DB_PASS',    '');
define('DB_CHARSET', 'utf8mb4');

define('SITE_NAME',  'Văn Hóa Gia Lai');
define('FROM_EMAIL', 'noreply@vanhoagialai.vn');

// Kiểm tra Admin
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header('Location: login.php?redirect=admin_lienhe.php');
    exit;
}

// Kết nối DB
function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}

$pdo = getDB();

// Xử lý action
$action  = $_GET['action'] ?? '';
$message = '';
$msgType = '';

// Đánh dấu đã đọc
if ($action === 'view' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $pdo->prepare("UPDATE lienhe SET da_doc = 1 WHERE id = ?")->execute([$id]);
}

// Xóa tin nhắn
if ($action === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $pdo->prepare("DELETE FROM lienhe WHERE id = ?")->execute([$id]);
    header('Location: admin_lienhe.php?deleted=1');
    exit;
}

// Gửi phản hồi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'])) {
    $id      = (int)($_POST['reply_id'] ?? 0);
    $toEmail = trim($_POST['reply_email'] ?? '');
    $toName  = trim($_POST['reply_name']  ?? '');
    $subject = trim($_POST['reply_subject'] ?? '');
    $body    = trim($_POST['reply_body'] ?? '');

    if ($id && $toEmail && $subject && $body) {
        $headers  = "From: " . SITE_NAME . " <" . FROM_EMAIL . ">\r\n";
        $headers .= "Reply-To: " . FROM_EMAIL . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $fullBody = "Xin chào {$toName},\r\n\r\n{$body}\r\n\r\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\r\nTrân trọng,\r\nĐội ngũ " . SITE_NAME;

        if (mail($toEmail, $subject, $fullBody, $headers)) {
            $message = "Đã gửi phản hồi thành công!";
            $msgType = 'success';
        } else {
            $message = 'Gửi email thất bại.';
            $msgType = 'error';
        }
    } else {
        $message = 'Vui lòng nhập đầy đủ thông tin phản hồi.';
        $msgType = 'error';
    }
}

// Lấy dữ liệu
$filter  = $_GET['filter'] ?? 'all';
$search  = trim($_GET['search'] ?? '');
$page    = max(1, (int)($_GET['p'] ?? 1));
$perPage = 10;
$offset  = ($page - 1) * $perPage;

$where  = '1=1';
$params = [];
if ($filter === 'unread') $where .= ' AND da_doc = 0';
if ($filter === 'read')   $where .= ' AND da_doc = 1';
if ($search !== '') {
    $where .= ' AND (hoten LIKE ? OR email LIKE ? OR noidung LIKE ?)';
    $params = ["%{$search}%", "%{$search}%", "%{$search}%"];
}

$totalStmt = $pdo->prepare("SELECT COUNT(*) FROM lienhe WHERE {$where}");
$totalStmt->execute($params);
$total = (int)$totalStmt->fetchColumn();

$listStmt = $pdo->prepare("SELECT * FROM lienhe WHERE {$where} ORDER BY ngay_gui DESC LIMIT {$perPage} OFFSET {$offset}");
$listStmt->execute($params);
$list = $listStmt->fetchAll();

$statStmt = $pdo->query("SELECT COUNT(*) AS total, SUM(da_doc=0) AS unread, SUM(da_doc=1) AS read_count FROM lienhe");
$stats = $statStmt->fetch();

$detail = null;
if ($action === 'view' && isset($_GET['id'])) {
    $detailStmt = $pdo->prepare("SELECT * FROM lienhe WHERE id = ?");
    $detailStmt->execute([(int)$_GET['id']]);
    $detail = $detailStmt->fetch();
}

if (!empty($_GET['deleted'])) {
    $message = 'Đã xóa tin nhắn thành công!';
    $msgType = 'success';
}
?>

<?php include('header.php'); ?>

<style>
    .admin-page { padding: 40px 30px; background: #f8fafc; min-height: calc(100vh - 180px); }
    .page-header { display: flex; align-items: center; gap: 15px; margin-bottom: 35px; }
    .back-btn {
        padding: 12px 24px; background: white; color: #475569; border: 1px solid #e2e8f0;
        border-radius: 50px; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08); transition: all 0.3s;
    }
    .back-btn:hover { transform: translateX(-5px); box-shadow: 0 4px 12px rgba(0,0,0,0.12); }

    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; margin-bottom: 40px; }
    .stat-card {
        background: white; padding: 28px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        text-align: center; transition: all 0.4s;
    }
    .stat-card:hover { transform: translateY(-8px); }
    .stat-number { font-size: 48px; font-weight: 700; margin: 12px 0; }

    .table-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    th { background: #f1f5f9; padding: 20px 18px; text-align: left; font-weight: 600; color: #334155; }
    td { padding: 20px 18px; border-bottom: 1px solid #f1f5f9; }
    tr:hover { background: #f8fafc; }
    .name { font-weight: 600; color: #1e2937; }
    .email { color: #64748b; }

    .detail-card { 
        background: white; border-radius: 20px; padding: 40px; 
        box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
    }
    .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
    .message-box { 
        background: #fdf4ff; padding: 30px; border-radius: 16px; 
        border-left: 6px solid #e8643a; line-height: 1.85; font-size: 1.08em;
    }
    .reply-box { margin-top: 40px; padding: 30px; background: #f8fafc; border-radius: 16px; }
</style>

<div class="admin-page">
    <?php if ($message): ?>
        <div style="padding:16px 24px; margin-bottom:25px; border-radius:12px; background:<?= $msgType==='success'?'#ecfdf5':'#fef2f2' ?>; color:<?= $msgType==='success'?'#065f46':'#b91c1c' ?>;">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <?php if ($detail): ?>
        <!-- CHI TIẾT -->
        <div class="page-header">
            <a href="admin_lienhe.php" class="back-btn">← Quay lại danh sách</a>
            <h1 style="font-size: 32px; font-weight: 700; color: #1e2937;">📧 Chi tiết Tin nhắn</h1>
        </div>

        <div class="detail-card">
            <div class="detail-grid">
                <div>
                    <h3 style="color:#e8643a; margin-bottom:20px; font-size:22px;">👤 Thông tin người gửi</h3>
                    <p style="margin:12px 0;"><strong>Họ tên:</strong> <?= htmlspecialchars($detail['hoten']) ?></p>
                    <p style="margin:12px 0;"><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($detail['email']) ?>"><?= htmlspecialchars($detail['email']) ?></a></p>
                    <?php if (!empty($detail['sdt'])): ?>
                    <p style="margin:12px 0;"><strong>Điện thoại:</strong> <?= htmlspecialchars($detail['sdt']) ?></p>
                    <?php endif; ?>
                    <p style="margin:12px 0;"><strong>Ngày gửi:</strong> <?= date('d/m/Y H:i:s', strtotime($detail['ngay_gui'])) ?></p>
                </div>

                <div>
                    <h3 style="color:#e8643a; margin-bottom:20px; font-size:22px;">💬 Nội dung tin nhắn</h3>
                    <div class="message-box">
                        <?= nl2br(htmlspecialchars($detail['noidung'])) ?>
                    </div>
                </div>
            </div>

            <!-- Form phản hồi -->
            <div class="reply-box">
                <h3 style="color:#e8643a; margin-bottom:20px;">✉️ Gửi phản hồi</h3>
                <form method="POST">
                    <input type="hidden" name="reply_id" value="<?= $detail['id'] ?>">
                    <input type="hidden" name="reply_email" value="<?= htmlspecialchars($detail['email']) ?>">
                    <input type="hidden" name="reply_name" value="<?= htmlspecialchars($detail['hoten']) ?>">

                    <input type="text" name="reply_subject" value="Re: <?= htmlspecialchars($detail['tieude'] ?: 'Phản hồi liên hệ') ?>" 
                           style="width:100%; padding:16px; border:1px solid #cbd5e1; border-radius:10px; margin-bottom:18px;" required>

                    <textarea name="reply_body" rows="11" style="width:100%; padding:16px; border:1px solid #cbd5e1; border-radius:10px; resize:vertical;" 
                              required placeholder="Viết phản hồi của bạn..."></textarea>

                    <button type="submit" name="reply" style="margin-top:20px; background:#e8643a; color:white; padding:16px 36px; border:none; border-radius:10px; font-size:17px; cursor:pointer;">
                        <i class="fas fa-paper-plane"></i> Gửi phản hồi ngay
                    </button>
                </form>
            </div>
        </div>

    <?php else: ?>
        <!-- DANH SÁCH -->
        <h1 style="font-size: 32px; font-weight: 700; color: #1e2937; margin-bottom: 30px;">📬 Quản lý Tin nhắn Liên hệ</h1>

        <div class="stats-grid">
            <div class="stat-card">
                <div style="font-size:18px; color:#64748b;">Tổng tin nhắn</div>
                <div class="stat-number" style="color:#1e2937;"><?= $stats['total'] ?? 0 ?></div>
            </div>
            <div class="stat-card">
                <div style="font-size:18px; color:#64748b;">Chưa đọc</div>
                <div class="stat-number" style="color:#e8643a;"><?= $stats['unread'] ?? 0 ?></div>
            </div>
            <div class="stat-card">
                <div style="font-size:18px; color:#64748b;">Đã đọc</div>
                <div class="stat-number" style="color:#10b981;"><?= $stats['read_count'] ?? 0 ?></div>
            </div>
        </div>

        <div class="table-card">
            <?php if (empty($list)): ?>
                <p style="text-align:center; padding:120px; color:#64748b; font-size:18px;">Chưa có tin nhắn nào.</p>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Người gửi</th>
                        <th>Nội dung</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $row): ?>
                    <tr>
                        <td>
                            <div class="name"><?= htmlspecialchars($row['hoten']) ?></div>
                            <div class="email"><?= htmlspecialchars($row['email']) ?></div>
                        </td>
                        <td><?= htmlspecialchars(mb_substr($row['noidung'], 0, 95)) ?>...</td>
                        <td><?= date('d/m/Y H:i', strtotime($row['ngay_gui'])) ?></td>
                        <td><?= $row['da_doc'] ? '<span style="color:#10b981;">✓ Đã đọc</span>' : '<span style="color:#e8643a;">● Chưa đọc</span>' ?></td>
                        <td>
                            <a href="?action=view&id=<?= $row['id'] ?>" style="color:#3b82f6; font-weight:500;">Xem chi tiết</a>
                            <a href="?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Xóa tin nhắn này?')" style="color:#ef4444; margin-left:15px;">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>                                                 