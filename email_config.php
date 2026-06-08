<?php
// ============================================================
//  CẤU HÌNH GMAIL - PHPMailer
//  Đặt file này cùng thư mục với các file PHP khác
// ============================================================

// ── Thông tin Gmail của bạn ──────────────────────────────
define('MAIL_HOST',     'smtp.gmail.com');
define('MAIL_PORT',     587);
define('MAIL_USERNAME', 'your_email@gmail.com');   // ← Gmail của bạn
define('MAIL_PASSWORD', 'xxxx xxxx xxxx xxxx');    // ← App Password (16 ký tự)
define('MAIL_FROM',     'your_email@gmail.com');   // ← Giống MAIL_USERNAME
define('MAIL_FROM_NAME','Văn Hóa Gia Lai');

// ── Hàm gửi email dùng chung ─────────────────────────────
/**
 * Gửi email qua Gmail SMTP
 *
 * @param string $toEmail   Email người nhận
 * @param string $toName    Tên người nhận
 * @param string $subject   Tiêu đề
 * @param string $body      Nội dung (plain text)
 * @param string $replyTo   Email reply-to (tuỳ chọn)
 * @return bool
 */
function sendMail(string $toEmail, string $toName, string $subject, string $body, string $replyTo = ''): bool {
    // Đường dẫn tới PHPMailer (đặt thư mục PHPMailer cùng cấp)
    $base = __DIR__ . '/PHPMailer/src/';
    require_once $base . 'Exception.php';
    require_once $base . 'PHPMailer.php';
    require_once $base . 'SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host       = MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = MAIL_USERNAME;
        $mail->Password   = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = MAIL_PORT;
        $mail->CharSet    = 'UTF-8';

        // Người gửi
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        if ($replyTo) {
            $mail->addReplyTo($replyTo);
        }

        // Người nhận
        $mail->addAddress($toEmail, $toName);

        // Nội dung
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;

    } catch (\Exception $e) {
        error_log('[PHPMailer Error] ' . $mail->ErrorInfo);
        return false;
    }
}