<?php
session_start();

// ============================================================
//  CẤU HÌNH
// ============================================================
define('DB_HOST',    'localhost');
define('DB_NAME',    'gialai');
define('DB_USER',    'root');
define('DB_PASS',    '');
define('DB_CHARSET', 'utf8mb4');

// Tài khoản admin (đổi mật khẩu trước khi dùng thật!)


define('SITE_NAME',  'Văn Hóa Gia Lai');
define('FROM_EMAIL', 'noreply@vanhoagialai.vn');

// ============================================================
//  KẾT NỐI DATABASE
// ============================================================
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

// ============================================================
//  XỬ LÝ ACTION
// ============================================================
$action  = $_GET['action']  ?? '';
$message = '';
$msgType = '';

// --- Đăng nhập ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($_POST['username'] === ADMIN_USER && $_POST['password'] === ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_lienhe.php');
        exit;
    } else {
        $message = 'Tên đăng nhập hoặc mật khẩu không đúng!';
        $msgType = 'error';
    }
}

// --- Đăng xuất ---
if ($action === 'logout') {
    session_destroy();
    header('Location: admin_lienhe.php');
    exit;
}

// --- Yêu cầu đăng nhập ---
$isLoggedIn = !empty($_SESSION['admin_logged_in']);

if ($isLoggedIn) {
    $pdo = getDB();

    // --- Đánh dấu đã đọc khi xem chi tiết ---
    if ($action === 'view' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $pdo->prepare("UPDATE lienhe SET da_doc = 1 WHERE id = ?")->execute([$id]);
    }

    // --- Xóa tin nhắn ---
    if ($action === 'delete' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $pdo->prepare("DELETE FROM lienhe WHERE id = ?")->execute([$id]);
        header('Location: admin_lienhe.php?deleted=1');
        exit;
    }

    // --- Gửi email phản hồi ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'])) {
        $id      = (int)($_POST['reply_id'] ?? 0);
        $toEmail = trim($_POST['reply_email'] ?? '');
        $toName  = trim($_POST['reply_name']  ?? '');
        $subject = trim($_POST['reply_subject'] ?? '');
        $body    = trim($_POST['reply_body']    ?? '');

        if ($id && $toEmail && $subject && $body) {
            $headers  = "From: " . SITE_NAME . " <" . FROM_EMAIL . ">\r\n";
            $headers .= "Reply-To: " . FROM_EMAIL . "\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            $fullBody = "Xin chào {$toName},\r\n\r\n{$body}\r\n\r\n";
            $fullBody .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\r\n";
            $fullBody .= "Trân trọng,\r\nĐội ngũ " . SITE_NAME . "\r\n";
            $fullBody .= "📍 123 Đường Phan Đình Phùng, TP. Pleiku, Gia Lai\r\n";

            if (mail($toEmail, $subject, $fullBody, $headers)) {
                $pdo->prepare("UPDATE lienhe SET da_doc = 1 WHERE id = ?")->execute([$id]);
                $message = "Đã gửi email phản hồi đến {$toEmail} thành công!";
                $msgType = 'success';
            } else {
                $message = 'Gửi email thất bại. Kiểm tra cấu hình mail server.';
                $msgType = 'error';
            }
        } else {
            $message = 'Vui lòng điền đầy đủ thông tin phản hồi.';
            $msgType = 'error';
        }
    }

    // --- Lấy danh sách ---
    $filter  = $_GET['filter'] ?? 'all';
    $search  = trim($_GET['search'] ?? '');
    $page    = max(1, (int)($_GET['p'] ?? 1));
    $perPage = 10;
    $offset  = ($page - 1) * $perPage;

    $where  = '1=1';
    $params = [];
    if ($filter === 'unread') { $where .= ' AND da_doc = 0'; }
    if ($filter === 'read')   { $where .= ' AND da_doc = 1'; }
    if ($search !== '') {
        $where   .= ' AND (hoten LIKE ? OR email LIKE ? OR noidung LIKE ?)';
        $params[] = "%{$search}%";
        $params[] = "%{$search}%";
        $params[] = "%{$search}%";
    }

    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM lienhe WHERE {$where}");
    $totalStmt->execute($params);
    $total     = (int)$totalStmt->fetchColumn();
    $totalPage = max(1, (int)ceil($total / $perPage));

    $listStmt = $pdo->prepare("SELECT * FROM lienhe WHERE {$where} ORDER BY ngay_gui DESC LIMIT {$perPage} OFFSET {$offset}");
    $listStmt->execute($params);
    $list = $listStmt->fetchAll();

    // Thống kê
    $statStmt = $pdo->query("SELECT COUNT(*) AS total, SUM(da_doc=0) AS unread, SUM(da_doc=1) AS read_count FROM lienhe");
    $stats    = $statStmt->fetch();

    // Chi tiết
    $detail = null;
    if ($action === 'view' && isset($_GET['id'])) {
        $detailStmt = $pdo->prepare("SELECT * FROM lienhe WHERE id = ?");
        $detailStmt->execute([(int)$_GET['id']]);
        $detail = $detailStmt->fetch();
    }

    if (!empty($_GET['deleted'])) {
        $message = 'Đã xóa tin nhắn thành công.';
        $msgType = 'success';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin – Quản lý Liên Hệ | <?= SITE_NAME ?></title>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
:root {
    --bg:       #f0f2f5;
    --sidebar:  #1a2236;
    --sidebar2: #222d45;
    --accent:   #e8643a;
    --accent2:  #f07d55;
    --white:    #ffffff;
    --card:     #ffffff;
    --text:     #1e2d3d;
    --muted:    #7a8a9a;
    --border:   #e2e8f0;
    --success:  #22c55e;
    --danger:   #ef4444;
    --unread:   #fff7ed;
    --radius:   12px;
    --shadow:   0 2px 12px rgba(0,0,0,.08);
}
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Be Vietnam Pro', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

/* ── LOGIN ── */
.login-wrap {
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, #1a2236 0%, #2d3f5e 100%);
}
.login-card {
    background: var(--white);
    border-radius: 20px;
    padding: 48px 40px;
    width: 100%; max-width: 400px;
    box-shadow: 0 20px 60px rgba(0,0,0,.3);
    text-align: center;
}
.login-card .logo { font-size: 36px; margin-bottom: 8px; }
.login-card h2 { font-size: 22px; font-weight: 700; margin-bottom: 4px; }
.login-card p  { color: var(--muted); font-size: 14px; margin-bottom: 32px; }
.login-card input {
    width: 100%; padding: 12px 16px;
    border: 1.5px solid var(--border); border-radius: 10px;
    font-family: inherit; font-size: 15px;
    margin-bottom: 14px; outline: none; transition: border .2s;
}
.login-card input:focus { border-color: var(--accent); }
.login-card button {
    width: 100%; padding: 13px;
    background: var(--accent); color: #fff;
    border: none; border-radius: 10px;
    font-family: inherit; font-size: 16px; font-weight: 600;
    cursor: pointer; transition: background .2s;
}
.login-card button:hover { background: var(--accent2); }

/* ── LAYOUT ── */
.layout { display: flex; min-height: 100vh; }

.sidebar {
    width: 240px; flex-shrink: 0;
    background: var(--sidebar);
    display: flex; flex-direction: column;
    position: sticky; top: 0; height: 100vh;
}
.sidebar-logo {
    padding: 28px 24px 20px;
    border-bottom: 1px solid rgba(255,255,255,.08);
}
.sidebar-logo .brand { color: #fff; font-size: 16px; font-weight: 700; line-height: 1.3; }
.sidebar-logo .sub   { color: rgba(255,255,255,.4); font-size: 12px; margin-top: 2px; }
.sidebar nav { flex: 1; padding: 16px 12px; }
.nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 14px; border-radius: 8px;
    color: rgba(255,255,255,.6); font-size: 14px; font-weight: 500;
    text-decoration: none; margin-bottom: 4px; transition: all .2s;
}
.nav-item:hover, .nav-item.active {
    background: rgba(255,255,255,.08); color: #fff;
}
.nav-item .badge {
    margin-left: auto; background: var(--accent);
    color: #fff; font-size: 11px; font-weight: 700;
    padding: 2px 7px; border-radius: 20px;
}
.sidebar-foot {
    padding: 16px 12px;
    border-top: 1px solid rgba(255,255,255,.08);
}
.sidebar-foot a {
    display: flex; align-items: center; gap: 10px;
    color: rgba(255,255,255,.5); font-size: 13px;
    text-decoration: none; padding: 8px 14px; border-radius: 8px;
    transition: all .2s;
}
.sidebar-foot a:hover { color: #fff; background: rgba(255,255,255,.06); }

.main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

.topbar {
    background: var(--white);
    border-bottom: 1px solid var(--border);
    padding: 16px 28px;
    display: flex; align-items: center; justify-content: space-between;
}
.topbar h1 { font-size: 20px; font-weight: 700; }
.topbar .admin-tag {
    background: var(--sidebar); color: #fff;
    padding: 6px 14px; border-radius: 20px;
    font-size: 13px; font-weight: 500;
}

.content { padding: 24px 28px; flex: 1; overflow-y: auto; }

/* ── STATS ── */
.stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
.stat-card {
    background: var(--card); border-radius: var(--radius);
    padding: 20px 24px; box-shadow: var(--shadow);
    display: flex; align-items: center; gap: 16px;
}
.stat-icon {
    width: 48px; height: 48px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.stat-icon.total  { background: #eff6ff; color: #3b82f6; }
.stat-icon.unread { background: #fff7ed; color: var(--accent); }
.stat-icon.read   { background: #f0fdf4; color: var(--success); }
.stat-label { font-size: 12px; color: var(--muted); margin-bottom: 4px; }
.stat-value { font-size: 26px; font-weight: 700; }

/* ── TOOLBAR ── */
.toolbar {
    background: var(--card); border-radius: var(--radius);
    padding: 16px 20px; margin-bottom: 16px;
    display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
    box-shadow: var(--shadow);
}
.filter-tabs { display: flex; gap: 6px; }
.filter-tab {
    padding: 7px 16px; border-radius: 8px; font-size: 13px; font-weight: 500;
    border: 1.5px solid var(--border); background: transparent;
    color: var(--muted); cursor: pointer; text-decoration: none; transition: all .2s;
}
.filter-tab.active, .filter-tab:hover {
    background: var(--accent); color: #fff; border-color: var(--accent);
}
.search-wrap { flex: 1; min-width: 200px; position: relative; }
.search-wrap i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--muted); }
.search-wrap input {
    width: 100%; padding: 9px 12px 9px 36px;
    border: 1.5px solid var(--border); border-radius: 8px;
    font-family: inherit; font-size: 14px; outline: none; transition: border .2s;
}
.search-wrap input:focus { border-color: var(--accent); }

/* ── TABLE ── */
.table-wrap {
    background: var(--card); border-radius: var(--radius);
    box-shadow: var(--shadow); overflow: hidden;
}
table { width: 100%; border-collapse: collapse; }
th {
    background: #f8fafc; padding: 12px 16px;
    text-align: left; font-size: 12px; font-weight: 600;
    color: var(--muted); text-transform: uppercase; letter-spacing: .5px;
    border-bottom: 1px solid var(--border);
}
td { padding: 14px 16px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
tr:last-child td { border-bottom: none; }
tr.unread-row { background: var(--unread); }
tr:hover td { background: #f8fafc; }

.badge-unread {
    display: inline-block; width: 8px; height: 8px;
    background: var(--accent); border-radius: 50%; margin-right: 6px;
}
.name-cell { font-weight: 600; }
.email-cell { color: var(--muted); font-size: 13px; }
.preview { color: var(--muted); font-size: 13px; max-width: 220px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.date-cell { color: var(--muted); font-size: 13px; white-space: nowrap; }

.btn { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; border-radius: 8px; font-family: inherit; font-size: 13px; font-weight: 500; cursor: pointer; border: none; text-decoration: none; transition: all .2s; }
.btn-view   { background: #eff6ff; color: #3b82f6; }
.btn-view:hover { background: #dbeafe; }
.btn-delete { background: #fef2f2; color: var(--danger); }
.btn-delete:hover { background: #fee2e2; }
.btn-reply  { background: var(--accent); color: #fff; }
.btn-reply:hover { background: var(--accent2); }
.btn-back   { background: var(--bg); color: var(--text); }
.btn-back:hover { background: var(--border); }

/* ── PAGINATION ── */
.pagination { display: flex; justify-content: center; gap: 6px; padding: 16px; }
.page-btn {
    width: 36px; height: 36px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 500; text-decoration: none;
    border: 1.5px solid var(--border); color: var(--text); transition: all .2s;
}
.page-btn.active { background: var(--accent); color: #fff; border-color: var(--accent); }
.page-btn:hover:not(.active) { border-color: var(--accent); color: var(--accent); }

/* ── DETAIL ── */
.detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.detail-card {
    background: var(--card); border-radius: var(--radius);
    padding: 24px; box-shadow: var(--shadow);
}
.detail-card h3 { font-size: 15px; font-weight: 700; margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border); }
.detail-row { display: flex; gap: 12px; margin-bottom: 14px; font-size: 14px; }
.detail-label { color: var(--muted); width: 90px; flex-shrink: 0; padding-top: 1px; }
.detail-value { font-weight: 500; flex: 1; }
.message-box {
    background: #f8fafc; border-radius: 10px;
    padding: 16px; font-size: 14px; line-height: 1.7;
    white-space: pre-wrap; margin-top: 8px;
    border: 1px solid var(--border);
}
.reply-card { grid-column: 1 / -1; }
.form-group { margin-bottom: 16px; }
.form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: var(--muted); }
.form-group input, .form-group textarea {
    width: 100%; padding: 10px 14px;
    border: 1.5px solid var(--border); border-radius: 8px;
    font-family: inherit; font-size: 14px; outline: none; transition: border .2s;
}
.form-group input:focus, .form-group textarea:focus { border-color: var(--accent); }
.form-group textarea { min-height: 140px; resize: vertical; }

/* ── ALERT ── */
.alert {
    padding: 13px 18px; border-radius: 10px; margin-bottom: 20px;
    display: flex; align-items: center; gap: 10px; font-size: 14px; font-weight: 500;
}
.alert-success { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
.alert-error   { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

.empty-state { text-align: center; padding: 60px 20px; color: var(--muted); }
.empty-state i { font-size: 40px; margin-bottom: 12px; display: block; opacity: .4; }

.status-dot {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px;
}
.status-dot.unread { background: #fff7ed; color: var(--accent); }
.status-dot.read   { background: #f0fdf4; color: var(--success); }
</style>
</head>
<body>

<?php if (!$isLoggedIn): ?>
<!-- ════════════════ TRANG ĐĂNG NHẬP ════════════════ -->
<div class="login-wrap">
    <div class="login-card">
        <div class="logo">🏔️</div>
        <h2><?= SITE_NAME ?></h2>
        <p>Quản lý tin nhắn liên hệ</p>

        <?php if ($message): ?>
            <div class="alert alert-error" style="text-align:left; margin-bottom:20px;">
                <i class="fas fa-exclamation-circle"></i> <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="text"     name="username" placeholder="Tên đăng nhập" required autofocus>
            <input type="password" name="password" placeholder="Mật khẩu"     required>
            <button type="submit" name="login">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>
        </form>
    </div>
</div>

<?php else: ?>
<!-- ════════════════ TRANG ADMIN ════════════════ -->
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="brand">🏔️ <?= SITE_NAME ?></div>
            <div class="sub">Trang quản trị</div>
        </div>
        <nav>
            <a href="admin_lienhe.php" class="nav-item <?= (!$action || $action==='view') ? 'active' : '' ?>">
                <i class="fas fa-envelope fa-fw"></i> Tin nhắn liên hệ
                <?php if ((int)$stats['unread'] > 0): ?>
                    <span class="badge"><?= $stats['unread'] ?></span>
                <?php endif; ?>
            </a>
        </nav>
        <div class="sidebar-foot">
            <a href="?action=logout"><i class="fas fa-sign-out-alt fa-fw"></i> Đăng xuất</a>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <div class="topbar">
            <h1><?= $detail ? 'Chi tiết tin nhắn' : 'Tin nhắn liên hệ' ?></h1>
            <span class="admin-tag"><i class="fas fa-user-shield"></i> Admin</span>
        </div>

        <div class="content">

            <?php if ($message): ?>
                <div class="alert alert-<?= $msgType ?>">
                    <i class="fas fa-<?= $msgType==='success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <?php if ($detail): ?>
            <!-- ── CHI TIẾT + PHẢN HỒI ── -->
            <div style="margin-bottom:16px;">
                <a href="admin_lienhe.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </div>

            <div class="detail-grid">
                <!-- Thông tin -->
                <div class="detail-card">
                    <h3><i class="fas fa-user" style="color:var(--accent);margin-right:8px;"></i>Thông tin người gửi</h3>
                    <div class="detail-row">
                        <span class="detail-label">Họ tên</span>
                        <span class="detail-value"><?= htmlspecialchars($detail['hoten']) ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">
                            <a href="mailto:<?= htmlspecialchars($detail['email']) ?>" style="color:var(--accent);">
                                <?= htmlspecialchars($detail['email']) ?>
                            </a>
                        </span>
                    </div>
                    <?php if ($detail['sdt']): ?>
                    <div class="detail-row">
                        <span class="detail-label">Điện thoại</span>
                        <span class="detail-value"><?= htmlspecialchars($detail['sdt']) ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="detail-row">
                        <span class="detail-label">Tiêu đề</span>
                        <span class="detail-value"><?= htmlspecialchars($detail['tieude'] ?: '(Không có)') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Ngày gửi</span>
                        <span class="detail-value"><?= date('d/m/Y H:i', strtotime($detail['ngay_gui'])) ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Trạng thái</span>
                        <span class="detail-value">
                            <span class="status-dot <?= $detail['da_doc'] ? 'read' : 'unread' ?>">
                                <i class="fas fa-circle" style="font-size:7px;"></i>
                                <?= $detail['da_doc'] ? 'Đã đọc' : 'Chưa đọc' ?>
                            </span>
                        </span>
                    </div>
                </div>

                <!-- Nội dung -->
                <div class="detail-card">
                    <h3><i class="fas fa-comment-dots" style="color:var(--accent);margin-right:8px;"></i>Nội dung tin nhắn</h3>
                    <div class="message-box"><?= htmlspecialchars($detail['noidung']) ?></div>
                    <div style="margin-top:16px; display:flex; gap:10px;">
                        <a href="?action=delete&id=<?= $detail['id'] ?>"
                           class="btn btn-delete"
                           onclick="return confirm('Bạn có chắc muốn xóa tin nhắn này?')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </div>
                </div>

                <!-- Form phản hồi -->
                <div class="detail-card reply-card">
                    <h3><i class="fas fa-reply" style="color:var(--accent);margin-right:8px;"></i>Gửi email phản hồi</h3>
                    <form method="POST">
                        <input type="hidden" name="reply_id"    value="<?= $detail['id'] ?>">
                        <input type="hidden" name="reply_email" value="<?= htmlspecialchars($detail['email']) ?>">
                        <input type="hidden" name="reply_name"  value="<?= htmlspecialchars($detail['hoten']) ?>">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div class="form-group">
                                <label>Gửi đến</label>
                                <input type="text" value="<?= htmlspecialchars($detail['hoten']) ?> &lt;<?= htmlspecialchars($detail['email']) ?>&gt;" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề email *</label>
                                <input type="text" name="reply_subject"
                                       value="Re: <?= htmlspecialchars($detail['tieude'] ?: 'Phản hồi liên hệ') ?>"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung phản hồi *</label>
                            <textarea name="reply_body" required placeholder="Nhập nội dung phản hồi..."></textarea>
                        </div>
                        <button type="submit" name="reply" class="btn btn-reply">
                            <i class="fas fa-paper-plane"></i> Gửi phản hồi
                        </button>
                    </form>
                </div>
            </div>

            <?php else: ?>
            <!-- ── DANH SÁCH ── -->

            <!-- Stats -->
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-icon total"><i class="fas fa-inbox"></i></div>
                    <div>
                        <div class="stat-label">Tổng tin nhắn</div>
                        <div class="stat-value"><?= $stats['total'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon unread"><i class="fas fa-envelope"></i></div>
                    <div>
                        <div class="stat-label">Chưa đọc</div>
                        <div class="stat-value"><?= $stats['unread'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon read"><i class="fas fa-envelope-open"></i></div>
                    <div>
                        <div class="stat-label">Đã đọc</div>
                        <div class="stat-value"><?= $stats['read_count'] ?></div>
                    </div>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="toolbar">
                <div class="filter-tabs">
                    <?php foreach (['all'=>'Tất cả','unread'=>'Chưa đọc','read'=>'Đã đọc'] as $k=>$v): ?>
                        <a href="?filter=<?= $k ?>" class="filter-tab <?= $filter===$k?'active':'' ?>"><?= $v ?></a>
                    <?php endforeach; ?>
                </div>
                <form class="search-wrap" method="GET">
                    <input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Tìm theo tên, email, nội dung...">
                </form>
            </div>

            <!-- Table -->
            <div class="table-wrap">
                <?php if (empty($list)): ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        Không có tin nhắn nào.
                    </div>
                <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Người gửi</th>
                            <th>Tiêu đề / Nội dung</th>
                            <th>Ngày gửi</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $row): ?>
                        <tr class="<?= !$row['da_doc'] ? 'unread-row' : '' ?>">
                            <td style="color:var(--muted); font-size:13px;">#<?= $row['id'] ?></td>
                            <td>
                                <?php if (!$row['da_doc']): ?><span class="badge-unread"></span><?php endif; ?>
                                <span class="name-cell"><?= htmlspecialchars($row['hoten']) ?></span><br>
                                <span class="email-cell"><?= htmlspecialchars($row['email']) ?></span>
                            </td>
                            <td>
                                <div style="font-weight:500; font-size:13px; margin-bottom:2px;">
                                    <?= htmlspecialchars($row['tieude'] ?: '(Không có tiêu đề)') ?>
                                </div>
                                <div class="preview"><?= htmlspecialchars($row['noidung']) ?></div>
                            </td>
                            <td class="date-cell"><?= date('d/m/Y H:i', strtotime($row['ngay_gui'])) ?></td>
                            <td>
                                <span class="status-dot <?= $row['da_doc'] ? 'read' : 'unread' ?>">
                                    <i class="fas fa-circle" style="font-size:7px;"></i>
                                    <?= $row['da_doc'] ? 'Đã đọc' : 'Chưa đọc' ?>
                                </span>
                            </td>
                            <td>
                                <div style="display:flex; gap:6px;">
                                    <a href="?action=view&id=<?= $row['id'] ?>" class="btn btn-view">
                                        <i class="fas fa-eye"></i> Xem
                                    </a>
                                    <a href="?action=delete&id=<?= $row['id'] ?>" class="btn btn-delete"
                                       onclick="return confirm('Xóa tin nhắn này?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <?php if ($totalPage > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                        <a href="?filter=<?= $filter ?>&search=<?= urlencode($search) ?>&p=<?= $i ?>"
                           class="page-btn <?= $i===$page?'active':'' ?>"><?= $i ?></a>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
</body>
</html>
