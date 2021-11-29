<main class="body__details">
    <div class="product-page pt-4">
        <div class="subnav-trail">
            <a href="#">Phụ nữ</a>
            <span class="divider">/</span>
            <a href="#">Quần áo</a>
            <span class="divider">/</span>
            <a href="#">Áo sơ mi</a>
            <span class="divider">/</span>
            <a href="#">Đồ họa tiết</a>
            <span class="divider">/</span>
            <a href="#">Jade View Print Cotton Sweatshit</a>
        </div>

    </div>
    <div class="product-display">
        <div class="pd-content">
            <div class="pd-image">
                <!-- chứa slider và hình ảnh chi tiết -->
                <div class="pd-image__left">
                    <div class="img__scroll">
                        <?php foreach ($data['list_img'] as $item) : ?>
                            <button id="img1" class="thunb__img">
                                <img src="public/images/products/<?= $item['url'] ?>" alt="">
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="pd-image__right">
                    <div class="img__right">
                        <img src="public/images/products/<?= $data['pros']['avatar'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="pd-info">
                <!-- chứa thông tin chi tiết sp -->
                <form class="pd__right" action="#">
                    <div class="pd-info-head">
                        <div class="pd-brand-sub"><span class="pd-brand-name"><a href="/mind-bridge/b/252">Brand:</a></span></div>
                        <div class="pd-name"><?= $data['pros']['name'] ?></div>
                    </div>
                    <div class="pd-price ">
                        <div id="price-observer">
                            <div class="default-price"><span class="currency lc"></span><span class="number"><?= number_format($data['pros']['price']) ?>vnd</span></div>
                        </div>
                        <div class="pd-sku">
                            <p>SKU# MNB0001599</p>
                        </div>
                    </div>
                    <div class="pd-processing-time" data-nosnippet="">
                        <div class="rewards-wrap"><a href="#">Sign up</a> to earn <span class="rewards-currency">$</span><span class="rewards-amount-total">2.36</span>
                            in rewards on this item!</div>
                        Usually ships in <span>2 - 5</span> business days.
                    </div>
                    <div class="pd-color">
                        <label for="color">Chọn màu sắc</label> <br>
                        <select border-opacity-50 name="color" id="color">
                            <option value="" selected> Chọn màu sắc </option>
                            <option value="red">Kem</option>
                            <option value="green">Xanh</option>
                        </select>
                    </div>
                    <div class="pd-color">
                        <div class="size">Kích cỡ</div>
                        <select border-opacity-50 name="size" id="size">
                            <option value="" selected> Chọn kích cỡ</option>
                            <option value="red">55</option>
                            <option value="green">66</option>
                        </select> <br>
                        <a class="size-info" href="#">Tôi nên lấy kích cỡ nào?</a>
                    </div>
                    <div class="pd-color">
                        <div class="quantity">Số lượng</div>
                        <select border-opacity-50 name="quantity" id="quantity">
                            <option value="" selected aria-label="size 3 select example"> 1</option>

                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>
                    <div class="fav-forms-wrap">
                        <div class="animate-button-wrap pd-buttons">
                            <button type="button" id="checkout_0" class="pd-checkout animate black loader  " onclick="return analyticsCartTrackingCode('MNB0001599', '', 'KGE Sleeve Woven Patch Knit', 'Mind Bridge', 'Crewneck', 118.99, 0, 'add')">Add
                                to Bag</button>
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                    <div class="body__content__detail">
                        <div class="content__detail__info">
                            <div id="1" class="info__title">
                                <p>Thông tin chi tiết</p>
                                <div class="info__icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="info__body">
                                <p>Mô tả</p>
                                <span><?= $data['pros']['description'] ?></span>
                            </div>
                        </div>
                        <div class="content__detail__info">
                            <div id="2" class="info__title">
                                <p>Kích thước & phù hợp</p>
                                <div class="info__icon">
                                    <i class="fas fa-plus minus"></i>
                                </div>
                            </div>
                            <div class="info__body">
                                <p>Chất liệu vải</p>
                                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus itaque sed
                                    maiores praesentium aliquam explicabo ipsum eius dolores facere ea!</span>
                            </div>
                        </div>
                        <div class="content__detail__info">
                            <div id="3" class="info__title">
                                <p>Vật chuyển và trả hàng</p>
                                <div class="info__icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="info__body">
                                <p>Chất liệu vải</p>
                                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus itaque sed
                                    maiores praesentium aliquam explicabo ipsum eius dolores facere ea!</span>
                            </div>
                        </div>
                        <div class="content__detail__info">
                            <div id="4" class="info__title">
                                <p>Giới thiệu Kooding</p>
                                <div class="info__icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="info__body">
                                <p>Chất liệu vải</p>
                                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus itaque sed
                                    maiores praesentium aliquam explicabo ipsum eius dolores facere ea!</span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="box__slider__ct">
            <p class="vclll">Bạn cũng có thể thích</p class="vclll">
            <div class="slider-album__content">
                <!-- slider ảnh sp liên quan -->
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>
                <div class="image-item">
                    <img width="165px" src="public/images/products/4f97afecd5a5104022f8be901e47642a0fea2ce8.jpg" alt="">
                    <p>chuu Romatic Stripes Knit</p>
                    <span><b>$36.99</b></span>
                </div>


            </div>
        </div>
        <div class="sp-title">
            <p class="vclll">Bình luận của khách hàng</p>
            <div class="form__comment">
                <?php if (isset($_SESSION['customer']) || isset($_SESSION['admin'])) : ?>
                    <div class="form__top" style="display:flex; align-items:center;">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="input__comment">
                                <div class="avatar__comment">
                                    <img src="./public/images/products/ong1.jpg" alt="" width="100%">
                                </div>
                                <div class="input__keys">
                                    <input type="text" name="content" placeholder="Bình luận của bạn">
                                    <div class="input__image">
                                        <input type="file" name="image" value="📁">
                                    </div>
                                    <div class="sub__comment">
                                        <button name="btn_cmt" type="submit"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php if (!empty($data['errCmt'])) : ?>
                            <div class="errCmt text-danger ml-5">
                                <?php echo $data['errCmt']; ?>
                                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($data['errImg'])) : ?>
                            <div class="errCmt text-danger ml-5">
                                <?php echo $data['errImg']; ?>
                                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="form__content">
                    <div class="comment__itemAll">
                        <?php foreach ($data['list_cmt'] as $item) : ?>
                            <div class="item__comment">
                                <div class="item__ava">
                                    <img src="./public/images/products/ong1.jpg" alt="" width="100%">
                                </div>
                                <div class="item__right">
                                    <div class="item__name">
                                        <p><?= $item['fullname'] ?></p>
                                    </div>
                                    <div class="item__time">
                                        <i><?= $item['created_at'] ?></i>
                                    </div>
                                    <div class="item__nd">
                                        <p><?= $item['content'] ?></p>
                                    </div>
                                    <div class="item__img">
                                        <img src="./public/images/upload/<?= $item['image'] ?>" alt="" width="100%">
                                    </div>
                                    <div class="item__more">
                                        <?php if(isset($_SESSION['admin'])):?>
                                        <a href="comment?action=del&cmt_id=<?= $item['id'] ?>&pro_id=<?= $data['pros']['id'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <p class="vclll">Hình ảnh chi tiết</p>
            <div class="full-images">
                <div class="full__box__img">
                    <?php foreach ($data['list_img'] as $item) : ?>
                        <div class="pd__item__img">
                            <img src="./public/images/products/<?= $item['url'] ?>" alt="" width="100%">
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
</main>
<!-- end main -->