<?php
// cau-hoi-thuong-gap.php
$page_title = "Câu hỏi thường gặp - Gia Lai Culture";

$faqs = [
  [
    "category" => "Tài khoản",
    "icon" => "👤",
    "items" => [
      ["q" => "Tôi có cần tài khoản để xem nội dung không?", "a" => "Không. Tất cả nội dung văn hóa, du lịch trên cổng thông tin đều miễn phí và không yêu cầu đăng nhập. Tài khoản chỉ cần thiết khi bạn muốn bình luận hoặc lưu bài viết."],
      ["q" => "Tôi quên mật khẩu, phải làm sao?", "a" => "Nhấn vào 'Quên mật khẩu' ở trang đăng nhập, nhập email đã đăng ký. Hệ thống sẽ gửi link đặt lại mật khẩu trong vòng 5 phút."],
      ["q" => "Tôi có thể đổi email đăng ký không?", "a" => "Có. Vào mục 'Cài đặt tài khoản' sau khi đăng nhập, chọn 'Thông tin cá nhân' và cập nhật email mới. Cần xác nhận qua email cũ trước khi thay đổi có hiệu lực."],
    ]
  ],
  [
    "category" => "Nội dung & Bài viết",
    "icon" => "📄",
    "items" => [
      ["q" => "Tôi có thể đóng góp bài viết cho cổng thông tin không?", "a" => "Có. Chúng tôi hoan nghênh các cộng tác viên. Vui lòng gửi bài qua chức năng 'Góp ý' hoặc liên hệ trực tiếp qua email vanhoagialai@gmail.com. Ban biên tập sẽ xem xét và phản hồi trong 3-5 ngày làm việc."],
      ["q" => "Thông tin trên website có được cập nhật thường xuyên không?", "a" => "Có. Đội ngũ biên tập cập nhật nội dung hàng ngày, đặc biệt các sự kiện lễ hội, tin tức văn hóa mới nhất của tỉnh Gia Lai."],
      ["q" => "Tôi tìm không thấy thông tin về địa điểm tôi cần, phải làm sao?", "a" => "Bạn có thể gửi yêu cầu bổ sung thông tin qua mục 'Góp ý'. Chúng tôi sẽ nghiên cứu và bổ sung nội dung trong thời gian sớm nhất."],
    ]
  ],
  [
    "category" => "Bản tin & Thông báo",
    "icon" => "📬",
    "items" => [
      ["q" => "Bản tin được gửi bao lâu một lần?", "a" => "Bản tin được gửi mỗi tuần một lần vào sáng thứ Hai, tổng hợp các tin tức và sự kiện văn hóa nổi bật trong tuần."],
      ["q" => "Tôi muốn hủy nhận bản tin, làm thế nào?", "a" => "Cuộn xuống cuối bất kỳ email bản tin nào và nhấn liên kết 'Hủy đăng ký'. Yêu cầu có hiệu lực ngay lập tức."],
    ]
  ],
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
    header { background: #1a3a1f; color: #fff; padding: 16px 40px; display: flex; align-items: center; gap: 12px; }
    header h1 { font-size: 1.1rem; font-weight: 600; }
    header span { font-size: 0.8rem; color: #a8c5a0; }
    .breadcrumb { background: #fff; padding: 10px 40px; font-size: 0.85rem; color: #888; border-bottom: 1px solid #e0e0e0; }
    .breadcrumb a { color: #2a6a2e; text-decoration: none; }
    .breadcrumb a:hover { text-decoration: underline; }
    .container { max-width: 860px; margin: 40px auto; padding: 0 20px; }
    .page-title { font-size: 1.8rem; font-weight: 700; color: #1a3a1f; margin-bottom: 8px; }
    .page-subtitle { color: #666; margin-bottom: 32px; font-size: 0.95rem; }
    .category-title { font-size: 1rem; font-weight: 700; color: #1a3a1f; margin: 28px 0 12px; display: flex; align-items: center; gap: 8px; }
    .faq-item { background: #fff; border-radius: 8px; margin-bottom: 10px; box-shadow: 0 1px 4px rgba(0,0,0,0.06); overflow: hidden; }
    .faq-question { padding: 16px 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 0.95rem; color: #222; transition: background 0.2s; }
    .faq-question:hover { background: #f0f7f0; }
    .faq-answer { padding: 0 20px 16px; font-size: 0.92rem; color: #444; line-height: 1.7; border-top: 1px solid #f0f0f0; display: none; }
    .faq-answer.open { display: block; }
    .chevron { font-size: 0.8rem; color: #888; transition: transform 0.2s; }
    .chevron.open { transform: rotate(180deg); }
    .contact-cta { background: #1a3a1f; color: #fff; border-radius: 8px; padding: 28px; margin-top: 40px; text-align: center; }
    .contact-cta h3 { font-size: 1.1rem; margin-bottom: 8px; }
    .contact-cta p { color: #a8c5a0; font-size: 0.9rem; margin-bottom: 18px; }
    .contact-cta a { background: #d4a017; color: #fff; text-decoration: none; padding: 10px 28px; border-radius: 5px; font-weight: 600; font-size: 0.95rem; }
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
  <a href="/">Trang chủ</a> › <a href="/ho-tro">Hỗ trợ</a> › Câu hỏi thường gặp
</div>

<div class="container">
  <div class="page-title">Câu hỏi thường gặp</div>
  <div class="page-subtitle">Tổng hợp các câu hỏi phổ biến nhất từ người dùng. Không tìm thấy câu trả lời? Liên hệ ngay với chúng tôi.</div>

  <?php foreach ($faqs as $group): ?>
  <div class="category-title"><?= $group['icon'] ?> <?= htmlspecialchars($group['category']) ?></div>
  <?php foreach ($group['items'] as $i => $faq): ?>
  <div class="faq-item">
    <div class="faq-question" onclick="toggleFaq(this)">
      <?= htmlspecialchars($faq['q']) ?>
      <span class="chevron">▼</span>
    </div>
    <div class="faq-answer"><?= htmlspecialchars($faq['a']) ?></div>
  </div>
  <?php endforeach; ?>
  <?php endforeach; ?>

  <div class="contact-cta">
    <h3>Chưa tìm thấy câu trả lời?</h3>
    <p>Đội ngũ hỗ trợ của chúng tôi sẵn sàng giải đáp mọi thắc mắc của bạn.</p>
    <a href="lien-he.php">Liên hệ với chúng tôi</a>
  </div>
</div>

<footer>
  &copy; <?= date('Y') ?> Văn hóa Gia Lai. All rights reserved.
</footer>

<script>
function toggleFaq(el) {
  const answer = el.nextElementSibling;
  const chevron = el.querySelector('.chevron');
  answer.classList.toggle('open');
  chevron.classList.toggle('open');
}
</script>

</body>
</html>
