<main class="body__acc">
    <div class="body__acc__header">
        <div class="body__acc__fist">
            <div class="body__acc__title">
                <div class="acc__title__fist active">
                    <p>Bảng điều khiển</p>
                </div>
                <div class="acc__title__fist ">
                    <p>Đơn hàng</p>
                </div>
                <div class="acc__title__fist">
                    <p>Thông tin</p>
                </div>
                <div class="acc__title__text mt-3">
                    <p>Chào mừng bạn trở lại Nghĩa</p>
                </div>
            </div>
            <div class="body__acc__menu">
                <div class="acc__show__menu" onclick="menu();">
                    <div class="show__menu__title">
                        <p>Bảng Điều Khiển</p>
                    </div>
                    <div class="show__menu__icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>
                <nav class="acc__allmenu show__menu">
                    <div id="1" class="acc__menu__item active">
                        <a href="">Bảng điều khiển</a>
                    </div>
                    <div id="2" class="acc__menu__item">
                        <a href="">Đơn hàng</a>
                    </div>
                    <div id="3" class="acc__menu__item">
                        <a href="">Thông tin tài khoản</a>
                    </div>
                    <div class="acc__line"></div>
                </nav>
            </div>
        </div>
    </div>
    <div class="body__acc__content">
        <div class="acc__tab__menu active">
            <h1>Nghĩa</h1>
        </div>
        <div class="acc__tab__menu">
            <div class="acc__menu__content">
                <div class="acc__donhang">
                    <div class="acc__DH__title">
                        <p>Lịch sử đơn hàng</p>
                    </div>
                    <div class="acc__DH__content">
                        <div class="DH__content__title">
                            <p>Không tìm thấy đơn hàng</p>
                        </div>
                        <div class="DH__content__body">
                            <img src="public/images/layout/empty-orders.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="acc__tab__menu">
            <div class="acc__menu__content">
                <div class="acc__donhang">
                    <div class="acc__DH__title">
                        <p>Thông tin tài khoản của bạn</p>
                    </div>
                    <div class="acc__DH__content1">
                        <div class="DH__title">
                            <p>Đăng nhập xã hội: </p>
                            <img src="public/images/layout/fb-logo-col.svg" alt="" class="">
                        </div>
                        <div class="DH__form">
                            <form action="" method="POST">
                                <div class="DH__form1">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="fullname" value="<?= $_SESSION['customer']['fullname'] ?>">
                                </div>
                                <!-- <div class="DH__form1">
                                    <label for="">Tên hiển thị <i>* Để nhận xét và nhận xét sản phẩm.</i></label>
                                    <input type="text" value="Trương Nghĩa">
                            
                                </div> -->
                                <div class="DH__form1">
                                    <label for="">E-mail <i>* Nơi bạn nhận được thông tin đặt hàng.</i></label>
                                    <input type="text" value="<?= $_SESSION['customer']['email'] ?>">
                                    
                                </div>
                                <div class="DH__form1">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" value="<?= $_SESSION['customer']['birthday'] ?>">
                                </div>
                                <div class="DH__form2">
                                    <label class="sex__text" for="">Giới tính</label>
                                    <div class="DH__checkBox">
                                        <div class="pretty p-default">
                                            <input type="radio" id="nam" name="gender" />
                                            <div class="state p-info">
                                                <label for="nam">Nam</label>
                                            </div>
                                        </div>
                                        <div class="pretty p-default">
                                            <input type="radio" id="nu" name="gender"/>
                                            <div class="state p-info">
                                                <label for="nu">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="DH__submit">
                                    <button type="submit">Lưu thông tin của tôi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="acc__donhang">
                    <div id="changePass" class="acc__DH__title">
                        <p>Thay đổi mật khẩu tài khoản</p> <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    <div id="show" class="acc__DH__content1 none">
                        <div class="DH__form">
                            <form action="" method="post">
                                <div class="DH__form1">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="text">
                                </div>
                                <div class="DH__form1">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="text">
                                </div>
                                <div class="DH__form1">
                                    <label for="">Xác nhận mật khẩu</label>
                                    <input type="text">
                                </div>
                                <div class="DH__submit">
                                    <button type="submit">Cập nhật mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>