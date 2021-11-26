<header>

    <div class="header-top swiper mySwiper">
        <div class="swiper-wrapper">
            <a href="#" class="swiper-slide slider-top1">Covid-19 </a>
            <a href="#" class="swiper-slide slider-top2">Vận chuyển nhanh chóng và tin cậy 🚛</a>
        </div>
    </div>
    <!-- end header-top -->
    <div class="header-main">
        <div class="box-header-main">
            <div class="box-header-main__start">
                <div class="bars">
                    <div class="menu__bars">
                        <div class="btn__burger"></div>
                    </div>
                </div>
                <a href="index" class="logo">
                    <img src="public/images/layout/logo-main.png" alt="" class="logo-img">
                </a>
            </div>
            <div class="search">
                <form action="" class="form-search" method="GET">
                    <div class="pop-input">
                        <select name="filter-cate" id="" class="filter-cate">
                            <option value=""><a href="">Phụ kiện</a></option>
                            <option value="">Nam</option>
                            <option value="">Nữ</option>
                            <option value="">Trẻ em</option>
                        </select>
                        <input type="search" name="keyword" placeholder="Tìm kiếm" required>
                    </div>
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="user-options">
                <div class="search-rp"></div>

                <?php if (isset($_SESSION['customer'])) : ?>
                    <div class="profile pt-4 pb-4">
                        <span class="title-pop-user">Hồ sơ<i class="fa fa-angle-down ml-2" aria-hidden="true"></i></span>
                        <div class="pop-profile">
                            <a href="account?action=viewProfileClient">Bảng điều khiển</a>
                            <a href="#">Đơn hàng</a>
                            <a href="#">Tài khoản</a>
                            <a href="account?action=logoutClient" onclick="return confirm('Bạn chắc chắn muốn đăng xuất')">Đăng xuất</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="account pt-4 pb-4" id="popup-user" data-toggle="modal" data-target="#box-login-register">
                        <span class="title-pop-user">Đăng nhập / Đăng ký</span>
                    </div>
                <?php endif; ?>
                <!-- pops up login -->
                <div class="modal fade " role="dialog" id="box-login-register" style="z-index: 100;">
                    <div class="modal-dialog">
                        <div class="modal-content box-content-user mt-5">
                            <div class="modal-header" style="border:none;padding-bottom:0;">
                                <button type="button" class="close" data-dismiss="modal" style="outline:none;">&times;</button>
                            </div>

                            <div class="modal-body box-user">
                                <div class="title">
                                    <span class="title-sign_in">Đăng nhập</span>
                                    <span class="title-register">Đăng ký</span>
                                </div>
                                <div class="welcome">
                                    Chào mừng bạn!
                                </div>
                                <form action="account?action=loginClient" method="POST" name="form-login" class="p-5" id="login_user">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Nhập email" value="<?= isset($_COOKIE['emailClient']) ? $_COOKIE['emailClient'] : '' ?>" class=" email" id="email_login" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Nhập mật khẩu" class="password" value="<?= isset($_COOKIE['passwordClient']) ? $_COOKIE['passwordClient'] : '' ?>" id="password_login">
                                    </div>
                                    <div class="pretty p-default mb-4 mt-4">
                                        <input type="checkbox" <?= isset($_COOKIE['emailClient']) ? 'checked' : '' ?> id="remember" name="remember" />
                                        <div class="state">
                                            <label>Nhớ thông tin</label>
                                        </div>
                                    </div>
                                    <div class="errLogin text-danger pb-2">

                                    </div>
                                    <button type="submit" class="col-md-12 btn btn-secondary p-2" id="btn_login_client">Đăng
                                        nhập</button>
                                    <div class="forgot-pass text-center m-3">
                                        <a href="#remember">Bạn quên mật khẩu?</a>
                                    </div>
                                    <div class="err" style="color:red;">

                                    </div>
                                </form>
                                <!-- register -->
                                <form action="" method="POST" enctype="multipart/form-data" name="form-register" id="register_user" class="p-5">
                                    <div class="form-group">
                                        <input type="text" id="fullname" placeholder="Tên đầy đủ" class="fullname">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="email" placeholder="Nhập email" class=" email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Nhập mật khẩu" class=" password">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="birthday" placeholder="Ngày sinh của bạn" class="password">
                                    </div>
                                    <div class="gender col-md-12 mb-4 mt-4">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" value="0" id="gender" type="radio" name="gender">
                                            <label for="gender" class="form-check-label mr-4">
                                                Nam
                                            </label>
                                            <input class="form-check-input" id="gender2" type="radio" name="gender">
                                            <label for="gender2" class="form-check-label">
                                                Nữ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar"> Ảnh đại diện
                                        </label>
                                        <input type="file" name="avatar" id="" class="form-control pb-2">
                                    </div>
                                    <button type="submit" class="col-md-12 btn btn-secondary p-2" id="btn_register">Tạo tài khoản</button>
                                    <div class="forgot-pass text-center m-3">
                                        <p>Bạn chắc chắn rằng sẽ đồng ý với những điều khoản của chúng tôi!</p>
                                    </div>
                                    <div class="err" style="color:red;">

                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer" style="display:block;">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal login-->
                <a href="#lang" class="lang pt-4 pb-4">
                    <img src="public/images/layout/vietnam.png" alt="">
                </a>
                <div class="box-favorite-pro pt-4 pb-4">
                    <a href="product?action=viewFavorite" class="favorite-pro">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </a>
                    <div class="notifi">1</div>
                </div>
                <div class="box-cart pt-4 pb-4">
                    <a href="cart" class="cart">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                    <div class="notifi">2</div>
                    <!-- start popup-cart -->
                    <div class="pop-cart">
                        <div class="pop-cart__top">
                            <div class="left">
                                <div class=""> <i class="fa fa-shopping-bag " aria-hidden="true"></i></div>
                            </div>
                            <div class="right">
                                <span class="total">Tổng tiền:</span>
                                <span>500.000đ</span>
                            </div>
                        </div>
                        <div class="pop-cart__main row p-3">
                            <div class="col-3 col-md-3">
                                <img src="public/images/products/5cde3d230e25839dd691992b2d3e183ebe69e199.jpg" alt="" width="100%">
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="pro-name mb-2">Quần jeans Hàn Xẻng!</div>
                                <div class="desc">
                                    Đen | Size M | SL 1
                                </div>
                            </div>
                            <div class="col-3 col-md-3 cart-option">
                                <div class="pro-price mb-5">500.000đ</div>
                                <a href="#" class="text-danger">Hủy bỏ</a>
                            </div>
                        </div>
                        <div class="pop-cart__bottom">
                            <a href="cart?action=checkout" class="text-white bg-secondary">Thanh toán</a>
                            <a href="cart" class="">Vào giỏ hàng</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <ul class="sub-nav m-0">
                <li><a href="product.html">#SPOTLIGHT</a></li>
                <li><a href="product?action=viewListProduct">Nam</a></li>
                <li><a href="">Nữ</a></li>
                <li><a href="">Chăm sóc da</a></li>
                <li><a href="">Trẻ em</a></li>
                <li><a href="">Làm sạch</a></li>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="view_admin">
                        <a href="admin">Vào trang quản trị<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <li><a href="">#KOODING</a></li>
            </ul>
        </div>

    </div>
    <!-- end header-main -->

</header>