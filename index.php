<p?php session_start(); if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; } ?>
    </p>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản Lý Thống Kê</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/style/manege.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Modak&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Modak&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
            rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <div class="top-container">
                <div id="block-menu">
                    <ul id="list-link">
                        <li><a href="index.php" title="Home"> TRANG CHỦ</a></li>
                        <div class="menu-item">
                            <button class="dropdown-btn"> <span>Sản phẩm &#9660;</span></button>
                            <div class="dropdown-content">
                                <a href="product.html" style="font-size: 16px;">Quản lý sản phẩm</a>
                                <a href="#" style="font-size: 16px;">Thống kê sản phẩm </a>
                            </div>
                        </div>
                        <img src="assets/images/logo.png" width="140px" height="100px">
                        <li><a href="statis-product.html" title="Testimonial">THỐNG KÊ</a></li>
                        <div class="menu-item">
                            <button class="dropdown-btn"> <span>TÀI KHOẢN &#9660;</span></button>
                            <div class="dropdown-content">
                                <a href="#" style="font-size: 16px;">Thông tin tài khoản</a>
                                <a href="logout.php" style="font-size: 16px;">Đăng Xuất </a>
                                <a href="#" style="font-size: 16px;">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="logo-container">
                <h1>CHÀO MỪNG BẠN ĐÃ ĐẾN VỚI TRANG QUẢN LÝ</h1>
            </div>
        </div>

        <div class="container-product">
            <div class="text-introduce">
                <h1>
                    ꧁༺ GIỚI THIỆU VỀ CHÚNG TÔI ༻꧂<br>

                    <p style="line-height: 1.2">Chúng tôi là những thương hiệu uy tín hàng đầu,
                        đảm bảo chất lượng sản <br>phẩm về mỹ phẩm
                        chăm sóc da tốt nhất Việt Nam. Được nhiều khách hàng trên khắp đất nước tin tưởng.
                    </p>
                </h1>

                <div id="block-list-features">
                    <div class="col-features">
                        <button class="list-icon-features">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                        <h3>An toàn</h3>
                        <p>Sản phẩm đạt chất lượng cao,đảm bảo an toàn cho làn da của bạn. Đã được cắc chuyên gia công
                            nhận.
                        </p>
                    </div>
                    <div class="col-features">
                        <button class="list-icon-features">
                            <i class="fa-solid fa-infinity"></i>
                        </button>
                        <h3>Đa dạng</h3>
                        <p>Đa dạng các loại mặt hàng, cung cáp nhiều sản phẩm tuỳ vào nhu cầu của từng người</p>
                    </div>
                    <div class="col-features">
                        <button class="list-icon-features">
                            <i class="fa-brands fa-phoenix-framework"></i>
                        </button>
                        <h3>Tầm nhìn</h3>
                        <p>Phổ biến sản phẩm đến toàn quốc, giảm giá các mặt hàng sâu và xa hơn nữa là đưa sản phẩm ra
                            thế giới</p>
                    </div>
                    <div class="col-features">
                        <div class="list-icon-features ">
                            <i class="fa-solid fa-hand-holding-dollar" style="padding-top:18px"></i>
                        </div>
                        <h3>Giá thành</h3>
                        <p>Chất lượng là như vậy nhưng sản phẩm của chúng tôi lại có giá khá bình dân đó cũng chính là
                            điểm
                            mạnh</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-product">
            <div class="products">
                <div class="text-product">
                    <h1>Một số sản phẩm nổi bật࿐</h1>
                </div>
                <div class="featured-products">
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/chanel.png" alt="Sản phẩm 1" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Chanel Bleu De Chanel Parfum</h2>
                            <p class="product-price">Giá: 1.200.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>

                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/gucci.png" alt="Sản phẩm 2" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Gucci Guilty Black Pour Homme</h2>
                            <p class="product-price">Giá: 2.300.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/kelvin.png" alt="Sản phẩm 3" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Calvin Klein Obsession</h2>
                            <p class="product-price">Giá: 900.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                </div>
                <hr style="height: 9px; width:1110px; margin: 0 auto">

                <div class="featured-products">
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/dior rouger.png" alt="Sản phẩm 1" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Son Dior Rouge Dior Lipstick Limited Edition</h2>
                            <p class="product-price">Giá: 1.340.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/Gucci Rouger.png" alt="Sản phẩm 2" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Son Gucci Rouge À Lèvres Voile 508 Diana Amber</h2>
                            <p class="product-price">Giá: 1.480.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/YSL Rourge.png" alt="Sản phẩm 3" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Son YSL Rouge Pur Couture The Slim</h2>
                            <p class="product-price">Giá: 1.850.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                </div>
                <hr style="height: 9px; width:1110px; margin: 0 auto">

                <div class="featured-products">
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/Phấn 1.png" alt="Sản phẩm 1" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Clio Pro Eye Palette 12 Autumn Breeze In Seoul Forest</h2>
                            <p class="product-price">Giá: 450.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>

                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/phấn 2.png" alt="Sản phẩm 2" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">3CE Multi Eye Color Palette – Plot Twist</h2>
                            <p class="product-price">Giá: 710.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="assets/images/phấn 3.png" alt="Sản phẩm 3" />
                        </div>
                        <div class="product-details">
                            <h2 class="product-name">Black Rouge Colordation Mood Palette MO01 Brickdation</h2>
                            <p class="product-price">Giá: 510.000₫</p>
                            <button class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <footer>
                <div class="contact">
                    <div class="logo-footer">
                        <img src="assets/images/logo.png" alt="">
                    </div>
                    <div class="local">
                        <h1>Liên hệ với chúng tôi: </h1>
                        <h1 > <span>MANEGER STORE </span> cửa hàng chuyên phân phối mỹ phẩm hàng
                            đầu Việt Nam</h1>
                        <h1>Địa chỉ: Đa phúc, Dương kinh, Quảng Luận Hải phòng</h1>
                        <h1>SĐT: 0384552916</h1>
                        <h1>Email: anhitchamchi@gmail.com</h1>
                    </div>
                    <div class="Email">
                        <h1>Đăng kí để nhận tin mới nhất về chúng tôi</h1>
                        <input type="text" placeholder="Email">
                    </div>
                </div>
            </footer>
        </div>
        <script src="assets/js/manege.js"></script>
    </body>

    </html>