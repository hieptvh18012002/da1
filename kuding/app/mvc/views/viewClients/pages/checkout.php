<main class="body__order">
    <form id="checkout" class="body__order__content" method="POST">
        <div class="body__order__left">
            <div class="order__left__title">
                <h3>1. Địa chỉ giao hàng</h3>
            </div>
            <div class="form__address">
                <div class="address">
                    <div class="nation">
                        <p>Quốc gia của bạn</p>
                        <div class="vn">
                            <img src="public/images/layout/vn.svg" alt="">
                            <span>Việt Nam</span>
                        </div>
                    </div>
                </div>
                <div class="address">
                    <label for="">Họ tên</label>
                    <input name="fullname" type="text" name="fullname" value="<?= isset($_SESSION['customer']) ? $_SESSION['customer']['fullname'] : '' ?>">

                </div>

                <div class="address">
                    <label for="">Địa chỉ</label>
                    <div class="input__auto">
                        <input name="fakeInput" type="text" placeholder="Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã" disabled>
                    </div>
                    <div class="auto__address">

                        <div class="select__allAdd">
                            <div class="input__address none ">
                                <p class="tinhAdd"></p>
                                <p class="huyenAdd"></p>
                                <p class="xaAdd"></p>
                                <div class="close">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="itemAll__address ">
                                <div class="select__address">
                                    <div class="item__address tinh">
                                        <select onchange="innerHTML_tinh()" name="tinh" id="tinh">
                                            <option value="" disabled selected>Chọn tỉnh</option>
                                            <?php foreach ($data['list_province'] as $item) : ?>
                                                <option value="<?= $item['provinceid'] ?>"><?= $item['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="item__address">
                                        <select onchange="innerHTML_huyen()" name="huyen" id="huyen">
                                            <option value="" selected disabled>Chưa chọn tỉnh</option>
                                        </select>
                                    </div>
                                    <div class="item__address">
                                        <select onchange="innerHTML_xa()" name="xa" class="xa" id="village">
                                            <option value="" selected disabled>Chưa chọn quận huyện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <label for="village" class="error" style="display: none;"></label>
                </div>

                <div class="address">
                    <label for="">Địa chỉ cụ thể</label>
                    <textarea name="address_spec" id="" cols="30" rows="3" class="" style="border:1px solid #d7d7d7;border-radius: 5px;"></textarea>

                </div>
                <div class="address">
                    <label for="">Số điện thoại</label>
                    <input name="phone" type="text">

                </div>
            </div>
            <div class="order__bottom">
                <div class="order__bottom__title">
                    <h3>2. Mặt hàng thanh toán</h3>
                </div>
                <div class="order__bottom__content">

                    <?php $total = 0;
                    foreach ($_SESSION['cart'] as $item) : $tt = $item['price'] * $item['quantity'] ?>
                        <div class="order__bottom__item">
                            <img src="public/images/products/<?= $item['avatar'] ?>" alt="" width="70px">
                            <div class="order__info">
                                <div class="order__name">
                                    <p><?= $item['name'] ?></p>
                                </div>
                                <div class="order__text">
                                    <p><?= attr_value_select_id($item['color']) ?></p>
                                    <p>|</p>
                                    <p>Size <?= attr_value_select_id($item['size']) ?></p>
                                    <p>|</p>
                                    <p>Qty <?= $item['quantity'] ?></p>
                                    <p>|</p>
                                    <p><?= number_format($item['price'] * $item['quantity'], 0, ',') ?>đ</p>
                                </div>
                            </div>
                        </div>
                    <?php $total += $tt;
                    endforeach; ?>
                    <input type="hidden" name="total_price" value="<?= $total-30000 ?>">

                    <div class="order__chage">
                        <a href="cartClient" class="text-primary">Chỉnh sửa giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body__order__right">
            <div class="order__right__content">
                <div class="right__content__title">
                    <h3>Tóm tắt nhanh</h3>
                </div>
                <div class="right__content__body">
                    <div class="content__input--vocher" style="border:1px solid #d7d7d7;border-radius: 5px;">
                        <input id="vocher" type="text" placeholder="Nhập phiếu giảm giá">
                        <div class="sub__vorcher">
                            <button type="button">Apply</button>
                        </div>
                    </div>
                    <div class="content__subtotal">
                        <span>Tổng giá:</span>
                        <p><?= number_format($total,0,',') ?>đ</p>
                    </div>
                    <div class="content__subtotal">
                        <span>Phí chuyển hàng:</span>
                        <p>30.000đ</p>
                    </div>
                    <div class="contnet__all">
                        <span>Toàn bộ: <?= number_format($total-30000,0,',') ?>đ</span>
                        <p></p>
                    </div>
                    <div class="content__note">
                        <div id="note" class="note">
                            <p><i class="fas fa-plus"></i> Thêm ghi chú vào đơn hàng này</p>
                        </div>
                        <div id="input_note" class="note__input">
                            <input type="text" name="note" placeholder="Lưu ý của khách hàng">
                        </div>
                    </div>
                    <div class="content__ok">
                        <div class="pretty p-default">
                            <input type="checkbox" name="agree" checked />
                            <div class="state p-info">
                                <label>Tôi chấp nhận các Điều khoản và Chính sách Bảo mật.</label>
                            </div>
                        </div>
                        <a class="ml-4 text-primary" href="checkoutClient?action=viewdieukhoan">Điều khoản và Chính sách Bảo mật.</a>
                        <label for="agree" class="error" style="display: none;"></label>
                    </div>
                    <div class="content__submitAll">
                        <button type="submit" name="btn_order">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<!-- gửi value address -->
<script>
    $(document).ready(function() {
        $('#tinh').change(function() {
            var provinceId = $(this).val();
            $.ajax({
                url: "checkoutClient?action=checkout",
                method: "GET",
                // mặc định dữ liệu luân chuyễn dưới dạng đối tg, nếu gửi DOM thì cho = fasle
                data: {
                    provinceId: provinceId
                },
                // nếu gửi và xử lí thành công thì đổ data vào div filter_data
                success: function(data) {
                    $('#huyen').html(data)
                }
            })
        })
        // lấy xã phưuogfn từ quận huyện
        $('#huyen').change(function() {
            // lấy id quận huyện
            var districtId = $(this).val();
            $.ajax({
                url: "checkoutClient?action=checkout",
                method: "GET",
                data: {
                    districtId: districtId
                },
                // nếu gửi và xử lí thành công thì đổ data vào div filter_data
                success: function(data) {
                    $('.xa').html(data)
                }
            })
        })
    })
</script>