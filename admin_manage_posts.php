<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Khóa bảo mật Admin
if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header("Location: index.php");
    exit();
}

include 'db.php';
include 'header.php';

// Lấy danh sách bài viết từ database
$sql = "SELECT * FROM cultural_posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container" style="margin-top: 50px; margin-bottom: 50px; font-family: 'Roboto', sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #1b4d3e;"><i class="fa-solid fa-list-check"></i> Quản Lý Danh Sách Bài Viết</h2>
        <a href="admin_add_post.php" style="background: #2e7d32; color: white; padding: 10px 15px; border-radius: 4px; text-decoration: none; font-weight: bold;">
            <i class="fa-solid fa-plus"></i> Thêm bài viết mới
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #1b4d3e; color: white; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd; width: 60px;">ID</th>
                <th style="padding: 12px; border: 1px solid #ddd; width: 100px;">Hình ảnh</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Tiêu đề bài viết</th>
                <th style="padding: 12px; border: 1px solid #ddd; width: 180px;">Danh mục</th>
                <th style="padding: 12px; border: 1px solid #ddd; width: 160px; text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['id']; ?></td>
                    <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                        <img src="images/<?php echo !empty($row['image']) ? $row['image'] : 'default.jpg'; ?>" style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px;">
                    </td>
                    <td style="padding: 12px; border: 1px solid #ddd; font-weight: 50px; color: #333;"><?php echo htmlspecialchars($row['title']); ?></td>
                    <td style="padding: 12px; border: 1px solid #ddd; color: #666; font-size: 14px;"><?php echo htmlspecialchars($row['category']); ?></td>
                    <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                        <a href="admin_edit_post.php?id=<?php echo $row['id']; ?>" style="color: white; background: #0288d1; padding: 6px 10px; border-radius: 4px; text-decoration: none; margin-right: 5px; font-size: 13px;">
                            <i class="fa-solid fa-pen-to-square"></i> Sửa
                        </a>
                        <a href="admin_delete_post.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không? Hành động này không thể hoàn tác!');" style="color: white; background: #d32f2f; padding: 6px 10px; border-radius: 4px; text-decoration: none; font-size: 13px;">
                            <i class="fa-solid fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='5' style='padding: 20px; text-align: center; color: #888;'>Chưa có bài viết nào trong hệ thống.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>