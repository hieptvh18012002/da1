<main class="body__order">
        <form id="checkout" class="body__order__content">
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
                        <input name="fullname" type="text">

                    </div>

                    <div class="address">
                        <label for="">Địa chỉ</label>
                        <label for="xa" class="error" style="display: none; margin: 5px 0px !important;"></label>
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
                                <div class="itemAll__address">
                                    <div class="select__address">
                                        <div class="item__address tinh" >
                                            <select name="tinh" id="tinh">
                                                <option value="" disabled selected>Chọn tỉnh</option>
                                                <?php foreach($data['list_province'] as $item):?>
                                                    <option value="<?= $item['provinceid'] ?>"><?= $item['name'] ?></option>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="item__address">
                                            <select name="huyen" id="huyen">
                                                <option value="" selected disabled>Chưa chọn tỉnh</option>
                                            </select>
                                        </div>
                                        <div class="item__address" >
                                            <select name="xa" class="xa" id="village">
                                                <option value="" selected disabled>Chưa chọn quận huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
    
                    </div>

                    <div class="address" >
                        <label for="">Địa chỉ cụ thể</label>
                        <textarea name="address_spec" id="" cols="30" rows="3" class=""
                            style="border:1px solid #d7d7d7;border-radius: 5px;"></textarea>

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
                        <div class="order__bottom__item">
                            <img src="public/images/layout/2604268e6bc21dd71f467ac400ece543e4c0830c.jpg" alt=""
                                width="70px">
                            <div class="order__info">
                                <div class="order__name">
                                    <p>Envy Look All Season Skirt</p>
                                </div>
                                <div class="order__text">
                                    <p>Xanh lè</p>
                                    <p>|</p>
                                    <p>Size L</p>
                                    <p>|</p>
                                    <p>Qty 2</p>
                                    <p>|</p>
                                    <p>$69,69</p>
                                </div>
                            </div>
                        </div>

                        <div class="order__bottom__item">
                            <img src="public/images/layout/5009036461f72d96a25e3a496dfa964bd51f97f2.jpg" alt=""
                                width="60px">
                            <div class="order__info">
                                <div class="order__name">
                                    <p>Envy Look All Season Skirt</p>
                                </div>
                                <div class="order__text">
                                    <p>Xanh lè</p>
                                    <p>|</p>
                                    <p>Size L</p>
                                    <p>|</p>
                                    <p>Qty 2</p>
                                    <p>|</p>
                                    <p>$69,69</p>
                                </div>
                            </div>
                        </div>
                        <div class="order__chage">
                            <a href="" class="text-primary">Chỉnh sửa giỏ hàng</a>
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
                                <button type="submit">Apply</button>
                            </div>
                        </div>
                        <div class="content__subtotal">
                            <span>Tổng giá:</span>
                            <p>$69,69</p>
                        </div>
                        <div class="content__subtotal">
                            <span>Phí chuyển hàng:</span>
                            <p>$69</p>
                        </div>
                        <div class="contnet__all">
                            <span>Toàn bộ:</span>
                            <p>$69, 6969</p>
                        </div>
                        <div class="content__note">
                            <div id="note" class="note">
                                <p><i class="fas fa-plus"></i> Thêm ghi chú vào đơn hàng này</p>
                            </div>
                            <div id="input_note" class="note__input">
                                <input type="text" placeholder="Lưu ý của khách hàng">
                            </div>
                        </div>
                        <div class="content__ok">
                            <div class="pretty p-default">
                                <input type="checkbox" name="agree" checked/>
                                <div class="state p-info">
                                    <label>Tôi chấp nhận các Điều khoản và Chính sách Bảo mật.</label>
                                </div>
                            </div>
                            <label for="agree" class="error" style="display: none;"></label>
                        </div>
                        <div class="content__submitAll">
                            <button type="submit">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- gửi value address -->
    <script>
        $(document).ready(function(){
            $('#tinh').change(function() {
                var provinceId = $(this).val();
                $.ajax({
                    url: "cartClient?action=checkout",
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
                    url: "cartClient?action=checkout",
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