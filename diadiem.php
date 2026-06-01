<?php 
if (file_exists('header.php')) {
    include('header.php');
} else {
    echo "<div style='color:red; padding:20px; background:#ffe6e6;'>⚠️ Chưa có file header.php</div>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Địa Điểm Du Lịch - Gia Lai Culture</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<!-- Thêm dòng này ngay sau các link CSS khác -->
<link href="css/diadiem.css" rel="stylesheet">
</head>
<body>

<!-- ===================== HERO ===================== -->
<section class="hero-banner">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-pattern"></div>
    <div class="hero-bokeh" id="bokehWrap"></div>

    <div class="container-fluid hero-content">
        <div class="hero-badge">
            <i class="fas fa-map-marker-alt"></i>
            Miền Trung · Việt Nam
        </div>
        <h1 class="hero-title">
            Khám Phá <em>Gia Lai</em><br>
            Từ Rừng Núi Đến Biển Khơi
        </h1>
        <p class="hero-desc">
            Tỉnh Gia Lai trải dài từ cao nguyên hùng vĩ với cồng chiêng, thác nước, rừng nguyên sinh đến bờ biển duyên hải xanh ngọc với đầm phá, ghềnh đá và cảng cá sầm uất.
        </p>
        <div class="hero-cta-row">
            <a href="#destinations" class="btn-hero-main">
                <i class="fas fa-compass"></i> Khám phá ngay
            </a>
            <a href="#tips" class="btn-hero-ghost">
                <i class="fas fa-lightbulb"></i> Mẹo du lịch
            </a>
        </div>
    </div>

    <div class="hero-stats-bar">
        <div class="stat-item">
            <span class="stat-num">15,511</span>
            <span class="stat-label">km² diện tích</span>
        </div>
        <div class="stat-item">
            <span class="stat-num">1,500<small style="font-size:.8em">m</small></span>
            <span class="stat-label">cao nguyên trung bình</span>
        </div>
        <div class="stat-item">
            <span class="stat-num">38</span>
            <span class="stat-label">dân tộc cùng chung sống</span>
        </div>
        <div class="stat-item">
            <span class="stat-num">12+</span>
            <span class="stat-label">địa điểm nổi bật</span>
        </div>
    </div>
</section>

<!-- ===================== FILTER BAR ===================== -->
<div class="filter-bar-wrap" id="filterBar">
    <div class="container">
        <div class="filter-bar">
            <button class="filter-btn active" data-cat="all">
                <i class="fas fa-th-large"></i> Tất Cả
                <span class="filter-count" id="cnt-all">12</span>
            </button>
            <button class="filter-btn" data-cat="ho-nuoc">
                <i class="fas fa-water"></i> Hồ & Sông
            </button>
            <button class="filter-btn" data-cat="thac-nuoc">
                <i class="fas fa-tint"></i> Thác Nước
            </button>
            <button class="filter-btn" data-cat="thien-nhien">
                <i class="fas fa-tree"></i> Thiên Nhiên
            </button>
            <button class="filter-btn" data-cat="van-hoa">
                <i class="fas fa-drum"></i> Văn Hoá
            </button>
            <button class="filter-btn" data-cat="lich-su">
                <i class="fas fa-landmark"></i> Lịch Sử
            </button>
            <button class="filter-btn" data-cat="bien-dao">
                <i class="fas fa-umbrella-beach"></i> Biển & Đầm
            </button>
        </div>
    </div>
</div>

<!-- ===================== DANH SÁCH ĐỊA ĐIỂM ===================== -->
<section class="destinations-section" id="destinations">
    <div class="container">
        <div class="section-header">
            <p class="section-eyebrow">Điểm đến nổi bật</p>
            <h2 class="section-title">Những Địa Danh Không Thể Bỏ Qua</h2>
            <div class="section-line"></div>
        </div>

        <div class="row g-4" id="destGrid">

            <!-- BIỂN HỒ T'NÚH -->
            <div class="col-md-8 dest-item" data-cat="ho-nuoc">
                <div class="dest-card featured h-100">
                    <div class="card-img-wrap">
                        <img src="img/bienho.png" alt="Biển Hồ T'Núh">
                        <div class="card-badge featured-badge"><i class="fas fa-crown"></i> Nổi Bật Nhất</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Biển Hồ T'Núh (Biển Hồ Chè)</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> TP. Pleiku, Gia Lai &nbsp;|&nbsp; Cách trung tâm ~7 km</div>
                        <p class="card-desc">Mặt hồ rộng hơn 230 ha nằm trong miệng núi lửa cổ đại, được mệnh danh là "đôi mắt Pleiku". Nước hồ xanh biếc bốn mùa, bao quanh bởi rừng thông và đồi chè xanh mướt.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-water"></i> Hồ Núi Lửa</span>
                            <span class="feature-tag"><i class="fas fa-tree"></i> Rừng Thông</span>
                            <span class="feature-tag"><i class="fas fa-camera"></i> Check-in Đẹp</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> Mở cửa: 6:00 – 18:00</span>
                            <a href="https://maps.google.com/?q=Bien+Ho+TNuh+Pleiku+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- THÁC PHU CƯỜNG -->
            <div class="col-md-4 dest-item" data-cat="thac-nuoc">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/thacphucuong.jpg" alt="Thác Phú Cường">
                        <div class="card-badge regular">Thác Nước</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Thác Phú Cường</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Chư Sê, Gia Lai</div>
                        <p class="card-desc">Thác Phú Cường là một trong những thác nước hùng vĩ nhất Gia Lai với độ cao 45 mét, dòng nước trắng xóa đổ xuống từ vách đá bazan đen huyền bí giữa rừng nguyên sinh xanh tươi.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-tint"></i> Thác 45m</span>
                            <span class="feature-tag"><i class="fas fa-leaf"></i> Rừng Nguyên Sinh</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-road"></i> ~80 km từ Pleiku</span>
                            <a href="https://maps.google.com/?q=Thac+Phu+Cuong+Chu+Se+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BẢO TÀNG TỈNH GIA LAI -->
            <div class="col-md-4 dest-item" data-cat="lich-su">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/baotang.jpg" alt="Bảo Tàng Gia Lai">
                        <div class="card-badge regular">Lịch Sử</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Bảo Tàng Tỉnh Gia Lai</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> TP. Pleiku, Gia Lai</div>
                        <p class="card-desc">Kho tàng văn hóa quý giá của vùng đất cao nguyên, lưu giữ hàng nghìn hiện vật về văn hóa dân tộc Bahnar, Jrai cùng di tích lịch sử kháng chiến hào hùng.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-drum"></i> Cồng Chiêng</span>
                            <span class="feature-tag"><i class="fas fa-landmark"></i> Hiện Vật Cổ</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> T2–CN: 7:30–17:00</span>
                            <a href="https://maps.google.com/?q=Bao+tang+Gia+Lai+Pleiku" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LÀNG PLEI ƠP -->
            <div class="col-md-4 dest-item" data-cat="van-hoa">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/langplei.jpg" alt="Làng Plei Ơp">
                        <div class="card-badge regular">Văn Hoá</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Làng Văn Hoá Du Lịch Plei Ơp</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Pleiku, Gia Lai</div>
                        <p class="card-desc">Ngôi làng của người Jrai gần 100 năm tuổi giữa lòng phố núi Pleiku, vẫn lưu giữ nhà rông, cồng chiêng, dệt thổ cẩm và các lễ hội dân gian đặc sắc.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-home"></i> Nhà Rông</span>
                            <span class="feature-tag"><i class="fas fa-tshirt"></i> Thổ Cẩm</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-road"></i> Trung tâm Pleiku</span>
                            <a href="https://maps.google.com/?q=Lang+van+hoa+Plei+Op+Pleiku+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ĐỒN ĐIỀN CHÈ BIỂN HỒ -->
            <div class="col-md-4 dest-item" data-cat="thien-nhien">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/doiche.jpg" alt="Đồi Chè Biển Hồ">
                        <div class="card-badge regular">Thiên Nhiên</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Đồn Điền Chè Biển Hồ</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> TP. Pleiku, Gia Lai</div>
                        <p class="card-desc">Những triền đồi chè xanh mướt bên Biển Hồ T'Núh thơ mộng. Buổi sáng sương mù bao phủ tạo khung cảnh huyền ảo, lãng mạn bậc nhất Gia Lai.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-seedling"></i> Đồi Chè</span>
                            <span class="feature-tag"><i class="fas fa-camera"></i> Chụp Ảnh</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> Đẹp nhất 6:00–8:00</span>
                            <a href="https://maps.google.com/?q=Don+dien+che+Bien+Ho+Pleiku+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VƯỜN QUỐC GIA KON KA KINH -->
            <div class="col-md-8 dest-item" data-cat="thien-nhien">
                <div class="dest-card featured h-100">
                    <div class="card-img-wrap">
                        <img src="img/kakinh.jpg" alt="Vườn Quốc Gia Kon Ka Kinh">
                        <div class="card-badge regular">Thiên Nhiên</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Vườn Quốc Gia Kon Ka Kinh</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Mang Yang – Kbang, Gia Lai</div>
                        <p class="card-desc">Khu Dự trữ Sinh quyển ASEAN với hơn 41.000 ha rừng nguyên sinh phong phú. Thiên đường trekking và khám phá hệ sinh thái đa dạng bậc nhất Tây Nguyên, nổi tiếng với voọc chà vá chân xám và đỉnh núi hùng vĩ 1.748m.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-paw"></i> Đa Dạng Sinh Học</span>
                            <span class="feature-tag"><i class="fas fa-hiking"></i> Trekking</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-road"></i> ~70 km từ Pleiku</span>
                            <a href="https://maps.google.com/?q=Vuon+quoc+gia+Kon+Ka+Kinh+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QUẢNG TRƯỜNG ĐẠI ĐOÀN KẾT -->
            <div class="col-md-4 dest-item" data-cat="van-hoa">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/anhbac.jpg" alt="Quảng Trường Đại Đoàn Kết">
                        <div class="card-badge regular">Văn Hoá</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Quảng Trường Đại Đoàn Kết</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> TP. Pleiku, Gia Lai</div>
                        <p class="card-desc">Quảng trường lớn nhất Tây Nguyên với tượng đài Bác Hồ cùng các dân tộc Tây Nguyên – tượng đồng Chủ tịch Hồ Chí Minh lớn nhất Việt Nam. Đài phun nước lung linh về đêm.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-drum"></i> Lễ Hội Lớn</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> Mở cửa cả ngày</span>
                            <a href="https://maps.google.com/?q=Quang+truong+Dai+Doan+Ket+Pleiku+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KỲ CO -->
            <div class="col-md-8 dest-item" data-cat="bien-dao">
                <div class="dest-card featured h-100">
                    <div class="card-img-wrap">
                        <img src="img/kyco.jpg" alt="Kỳ Co">
                        <div class="card-badge featured-badge"><i class="fas fa-crown"></i> Viên Ngọc Duyên Hải</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Bãi Biển Kỳ Co</h3>
                        <div class="card-location">
                            <i class="fas fa-map-marker-alt"></i> Nhơn Lý, Quy Nhơn &nbsp;|&nbsp; Cách trung tâm ~25 km
                        </div>
                        <p class="card-desc">'Maldives của Việt Nam' với nước biển xanh ngọc trong vắt, bãi cát trắng mịn và vách đá granit hùng vĩ. Điểm đến lý tưởng để lặn biển, check-in và chiêm ngưỡng vẻ đẹp hoang sơ của vùng duyên hải.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-water"></i> Nước Xanh Ngọc</span>
                            <span class="feature-tag"><i class="fas fa-umbrella-beach"></i> Bãi Cát Trắng</span>
                            <span class="feature-tag"><i class="fas fa-swimmer"></i> Lặn Ngắm San Hô</span>
                            <span class="feature-tag"><i class="fas fa-ship"></i> Tàu Cao Tốc</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> Mùa đẹp: Tháng 3–8</span>
                            <a href="https://maps.google.com/?q=Ky+Co+Quy+Nhon+Gia+Lai" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ĐẦM THỊ NẠI -->
            <div class="col-md-4 dest-item" data-cat="bien-dao">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/thinai.jpg" alt="Đầm Thị Nại">
                        <div class="card-badge regular">Biển & Đầm</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Đầm Thị Nại</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Quy Nhơn, Bình Định</div>
                        <p class="card-desc">Đầm nước mặn lớn nhất miền Trung với diện tích hơn 5.000 ha — nơi sinh sống của hàng trăm loài chim nước, rừng ngập mặn xanh tươi và nghề nuôi trồng thủy sản truyền thống.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-feather"></i> Chim Nước</span>
                            <span class="feature-tag"><i class="fas fa-leaf"></i> Rừng Ngập Mặn</span>
                            <span class="feature-tag"><i class="fas fa-anchor"></i> Thuyền Tham Quan</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-road"></i> Trung tâm Quy Nhơn</span>
                            <a href="https://maps.google.com/?q=Dam+Thi+Nai+Quy+Nhon" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EO GIÓ -->
            <div class="col-md-4 dest-item" data-cat="bien-dao">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/eogio.jpg" alt="Eo Gió">
                        <div class="card-badge regular">Biển & Đầm</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Eo Gió</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Nhơn Lý, Quy Nhơn</div>
                        <p class="card-desc">Ghềnh đá granit kỳ vĩ hướng ra biển Đông, nơi gió lộng quanh năm tạo nên cảnh quan hoang sơ hùng tráng.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-wind"></i> Ghềnh Đá Granit</span>
                            <span class="feature-tag"><i class="fas fa-sun"></i> Bình Minh Đẹp</span>
                            <span class="feature-tag"><i class="fas fa-camera"></i> Săn Ảnh</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-road"></i> ~22 km từ Quy Nhơn</span>
                            <a href="https://maps.google.com/?q=Eo+Gio+Nhon+Ly+Quy+Nhon" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- THÁP ĐÔI -->
            <div class="col-md-4 dest-item" data-cat="lich-su">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/thapdoi.jpg" alt="Tháp Đôi Quy Nhơn">
                        <div class="card-badge regular">Lịch Sử</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Tháp Đôi Quy Nhơn</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Quy Nhơn, Bình Định</div>
                        <p class="card-desc">Cụm tháp Chăm Pa được xây dựng từ thế kỷ XII, kiến trúc gạch nung độc đáo còn nguyên vẹn giữa lòng thành phố biển.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-monument"></i> Chăm Pa TK XII</span>
                            <span class="feature-tag"><i class="fas fa-landmark"></i> Di Tích Quốc Gia</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> T2–CN: 7:00–17:30</span>
                            <a href="https://maps.google.com/?q=Thap+Doi+Quy+Nhon" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BÃI BIỂN QUY NHƠN -->
            <div class="col-md-4 dest-item" data-cat="bien-dao">
                <div class="dest-card h-100">
                    <div class="card-img-wrap">
                        <img src="img/bienqnhon.jpg" alt="Bãi Biển Quy Nhơn">
                        <div class="card-badge regular">Biển & Đầm</div>
                        <div class="card-save"><i class="far fa-bookmark"></i></div>
                    </div>
                    <div class="card-body-custom">
                        <h3 class="card-name">Bãi Biển Quy Nhơn</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Quy Nhơn, Bình Định</div>
                        <p class="card-desc">Dải bãi biển cong dài hơn 4km ôm trọn vịnh Quy Nhơn — bãi cát vàng mịn, sóng êm, nước trong xanh.</p>
                        <div class="card-features">
                            <span class="feature-tag"><i class="fas fa-umbrella-beach"></i> Bãi Cát Dài 4km</span>
                            <span class="feature-tag"><i class="fas fa-volleyball-ball"></i> Thể Thao Biển</span>
                            <span class="feature-tag"><i class="fas fa-utensils"></i> Hải Sản Tươi</span>
                        </div>
                        <div class="card-footer-custom">
                            <span class="card-distance"><i class="fas fa-clock"></i> Trung tâm Quy Nhơn</span>
                            <a href="https://maps.google.com/?q=Bai+bien+Quy+Nhon" target="_blank" class="btn-open-map">
                                <i class="fas fa-map-marked-alt"></i> Chỉ Đường
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /row -->
    </div>
</section>

<!-- ===================== MẸO DU LỊCH ===================== -->
<section class="tips-section" id="tips">
    <div class="tips-bg-pattern"></div>
    <div class="container position-relative">
        <div class="section-header mb-5">
            <p class="section-eyebrow" style="color: var(--gold);">Kinh nghiệm</p>
            <h2 class="section-title" style="color: white;">Mẹo Khi Đến Gia Lai</h2>
            <div class="section-line" style="background: linear-gradient(90deg, var(--gold), #2ecc71);"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="tip-card">
                    <div class="tip-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h5 class="tip-title">Thời Điểm Lý Tưởng</h5>
                    <p class="tip-text">Tháng 11 – 4 (mùa khô) là thời điểm đẹp nhất để khám phá Gia Lai.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="tip-card">
                    <div class="tip-icon"><i class="fas fa-car"></i></div>
                    <h5 class="tip-title">Di Chuyển</h5>
                    <p class="tip-text">Thuê xe máy hoặc ô tô tự lái là lựa chọn tốt nhất để linh hoạt khám phá.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="tip-card">
                    <div class="tip-icon"><i class="fas fa-tshirt"></i></div>
                    <h5 class="tip-title">Trang Phục</h5>
                    <p class="tip-text">Mang áo khoác nhẹ và giày trekking nếu đi rừng núi cao nguyên.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="tip-card">
                    <div class="tip-icon"><i class="fas fa-utensils"></i></div>
                    <h5 class="tip-title">Ẩm Thực</h5>
                    <p class="tip-text">Phở khô Gia Lai, gà nướng Tây Nguyên, hải sản tươi ở vùng biển Quy Nhơn.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Bokeh particles
(function(){
    const wrap = document.getElementById('bokehWrap');
    const sizes = [80,120,160,200,100,140];
    const positions = [[10,20],[30,60],[70,15],[85,70],[50,40],[20,80],[65,55]];
    positions.forEach(([x,y], i) => {
        const d = document.createElement('div');
        d.className = 'bokeh-dot';
        const s = sizes[i % sizes.length];
        d.style.cssText = `width:${s}px;height:${s}px;left:${x}%;top:${y}%;animation-duration:${7+i*1.5}s;animation-delay:${i*.8}s`;
        wrap.appendChild(d);
    });
})();

// ── Sticky filter shadow
const filterBar = document.getElementById('filterBar');
window.addEventListener('scroll', () => {
    filterBar.classList.toggle('scrolled', window.scrollY > 80);
}, { passive: true });

// ── Filter logic
const filterBtns = document.querySelectorAll('.filter-btn');
const destItems  = document.querySelectorAll('.dest-item');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const cat = btn.dataset.cat;
        destItems.forEach(item => {
            const match = cat === 'all' || item.dataset.cat === cat;
            item.classList.toggle('hidden', !match);
        });
    });
});

// ── Save / bookmark toggle
document.querySelectorAll('.card-save').forEach(btn => {
    btn.addEventListener('click', e => {
        e.stopPropagation();
        btn.classList.toggle('saved');
        const icon = btn.querySelector('i');
        icon.className = btn.classList.contains('saved') ? 'fas fa-bookmark' : 'far fa-bookmark';
    });
});

// ── Scroll reveal for cards
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
            observer.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.dest-item').forEach((el, i) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(28px)';
    el.style.transition = `opacity .5s ${i * 0.06}s ease, transform .5s ${i * 0.06}s ease`;
    observer.observe(el);
});
</script>

</body>
</html>
