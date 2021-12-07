<main class="body__index">
    <?php if (isset($_GET['msg'])) : ?>
        <div class="alert alert-success"><?= $_GET['msg'] ?></div>
    <?php endif; ?>
    <div class="banner single-item">
        <?php foreach ($data['cate_banner'] as $item) : ?>
            <a href="productClient?action=list&filtercate=<?= $item['id'] ?>" class="banner-item">
                <div class="banner_imgBox">
                    <img src="public/images/categories/<?= $item['avatar'] ?>" alt="" width="100%">
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <!-- end banner -->
    <div class="category-banner">
        <?php foreach ($data['cate_banner'] as $item) : ?>
            <a href="productClient?action=list&filtercate=<?= $item['id'] ?>" class="box-cate">
                <?= $item['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
    <!-- end category-banner -->
    <div class="theme-hot">
        <?php foreach ($data['pro_special'] as $item) : ?>
            <div class="theme-hot__item">
                <div class="box-img">
                    <img src="public/images/products/<?= $item['avatar'] ?>" alt="">
                </div>
                <div class="theme-hot__title mt-3">
                    <?= $item['name'] ?>
                </div>
                <span>Bộ sưu tập hàng cao cấp</span>
                <a href="productDetail?action=viewDetail&id=<?= $item['id'] ?>" class="btn-theme">Khám phá ngay</a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- end theme hot -->
    <div class="product-news">
        <div class="product-news__title mb-3">
            <div class="title-text">
                mới: 100+ sản phẩm mới hàng ngày
            </div>
            <div class="toggle-filter " style="display: flex;align-items: center;">
                <span class="pb-2 pr-3">Nam</span>
                <div class="ckbx-style-8">
                    <input type="checkbox" id="filter_new" value="0" name="ckbx-style-8">
                    <label for="filter_new"></label>
                </div>
                <span class="pb-2 pl-4">Nữ</span>
            </div>
        </div>
        <div class="slick__slider">
            <div class="pro-news-slider responsive">
                <?php foreach ($data['pro_top10'] as $item) : ?>
                    <a href="productDetail?action=viewDetail&id=<?= $item['id'] ?>" class="pro-news-item">
                        <img src="public/images/products/<?= $item['avatar'] ?>" alt="">
                        <div class="">
                            <div class="pro-name bg-white pt-2 text-center">
                                <?= $item['name'] ?>
                            </div>
                            <div class="pro-des bg-white">
                                <span> <?= substr($item['description'], 0, 15) ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>


                <!-- <div class="slick-prev btn-prev"></div>
                            <div class="slick-next btn-next"></div> -->
            </div>
        </div>
    </div>
    <!-- end pro-news -->
    <!--  -->
    <div class="news-main">
        <div class="col-news left">
            <?php foreach ($data['news_special'] as $item) : ?>
                <div class="news-item mb-4">
                    <a href="" class="box-img">
                        <div class="box_newsImg">
                            <!-- <img src="public/images/layout/188906b2571586bae5d3dd009b56647f019b6145.jpg" alt=""> -->
                            <img src="./public/images/upload/<?= $item['image'] ?>" alt="">
                        </div>

                    </a>
                    <div class="pro-name">
                        <?= $item['title'] ?>
                    </div>
                    <span><?= $item['shortdesc'] ?></span>
                    <a href="newsClient?action=viewDetail&id=<?= $item['id'] ?>" class="btn-discover mt-2">
                        KHÁM PHÁ
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-news right">
            <div class="news-item">
                <a href="" class="box-img">
                    <div class="box_newsImg">
                        <!-- <img src="public/images/layout/261d0a0ba82f5e1c2b6b03fb85b850b687c0e93f.jpg" alt=""> -->
                        <img src="./public/images/upload/<?= $data['news_special2']['image'] ?>" alt="">
                    </div>

                </a>
                <div class="pro-name">
                    <?= $data['news_special2']['title'] ?>
                </div>
                <span><?= $data['news_special2']['shortdesc'] ?></span>
                <a href="newsClient?action=viewDetail&id=<?= $item['id'] ?>" class="btn-discover mt-2">
                    KHÁM PHÁ
                </a>
            </div>
        </div>
    </div>
    <!-- end new-main -->
    <div class="product-news trending">
        <div class="product-news__title mb-3">
            <div class="title-text">
                Đang là xu hướng
            </div>
            <div class="toggle-filter " style="display: flex;align-items: center;">
                <span class="pb-2 pr-3">Nam</span>
                <div class="ckbx-style-8">
                    <input type="checkbox" id="trending" value="0" name="ckbx-style-8">
                    <label for="trending"></label>
                </div>
                <span class="pb-2 pl-4">Nữ</span>
            </div>
        </div>
        <div class="slick__slider">
            <div class="pro-news-slider responsive">
                <?php foreach ($data['pro_topview'] as $item) : ?>
                    <a href="productDetail?action=viewDetail&id=<?= $item['id'] ?>" class="pro-news-item">
                        <img src="public/images/products/<?= $item['avatar'] ?>" alt="">
                        <div class="pro-name bg-white pt-2 text-center">
                            <?= $item['name'] ?>
                        </div>
                        <div class="pro-des bg-white">
                            <?= substr($item['description'], 0, 15) ?>
                        </div>
                    </a>
                <?php endforeach; ?>

                <!-- <div class="slick-prev btn-prev"></div>
                            <div class="slick-next btn-next"></div> -->
            </div>
        </div>
    </div>
    <!-- end trending -->
    <div class="about-us">
        <div class="title text-center">
            <h5><?= $data['display']['title_intro'] ?></h5>
        </div>
        <div id="times" class="btn__times">+</div>
        <div id="minus" class="btn__minus none">-</div>
        <div class="background__overlay"></div>
        <div class="site__intro show1">
            <p>Chào mừng đến với KOODING.com, thị trường toàn cầu trực tuyến hàng đầu. Mục tiêu của chúng tôi là
                để mọi người không chỉ kết nối trên toàn cầu thông qua tình yêu của họ về phong cách Hàn Quốc,
                mà còn để cung cấp truy cập nhanh đến mới nhất thời trang phụ nữ Hàn Quốc , thời trang nam Hàn
                Quốc , và Hàn Quốc vẻ đẹp sản phẩm và thương hiệu trên toàn thế giới với chi phí thấp nhất và
                với không rắc rối vận chuyển trên toàn thế giới. Trên tất cả, chúng tôi cố gắng cung cấp cho
                cộng đồng KOODING những sản phẩm cao cấp được tìm thấy tại các cửa hàng Hàn Quốc với giá cả phải
                chăng nhất.</p>
            <p>KOODING cung cấp những mặt hàng quần áo châu Á trực tuyến tốt nhất và là nơi có thể mua sắm bất
                cứ thứ gì liên quan đến thời trang Hàn Quốc. Từ thời trang đường phố đến quần áo hàng hiệu cao
                cấp, chúng tôi giúp việc mua sắm trực tuyến của người Hàn Quốc trở nên dễ dàng hơn bao giờ hết.
                Tại đây, bạn có thể tìm thấy mọi thứ, từ áo hoodie và áo nỉ thoải mái, những chiếc váy đáng yêu,
                áo khoác và áo len cổ lọ sành điệu và ấm áp, cùng những chiếc quần jean và quần âu mới yêu thích
                của bạn. Chúng tôi mang các thương hiệu quần áo Hàn Quốc đích thực như Chuu , NANING9 ,
                Cherrykoko , BASIC HOUSE , MIND BRIDGE , OPEN THE DOOR , REDHOMME , v.v. Bất kể phong cách ưa
                thích của bạn là gì, bạn chắc chắn có thể tìm thấy trang phục mơ ước của mình với những bộ quần
                áo đến từ Hàn Quốc này.</p>
            <p>KOODING không chỉ là một cửa hàng thời trang trực tuyến của Hàn Quốc; trên thực tế, chúng tôi
                không chỉ là quần áo theo phong cách Hàn Quốc và còn cung cấp những sản phẩm làm đẹp tuyệt vời
                nhất , album K-pop , đồ trang sức và phụ kiện hoàn thiện và bổ sung cho mọi khía cạnh trong lối
                sống của bạn.</p>
            <p>Chúng tôi mỹ phẩm Hàn Quốc , trang điểm , và chăm sóc da sản phẩm cho phép bạn đặt khuôn mặt tốt
                nhất của bạn về phía trước. Các thương hiệu như SNP , Ariul , RiRe , Evercell by Chaum , XYZ và
                MILLION RED là nhà sản xuất công thức cải tiến trong trang điểm và chăm sóc da sử dụng những gì
                tốt nhất trong bí quyết làm đẹp của Hàn Quốc. Ở đây, bạn có thể mua sắm mặt nạ tấm mặt , chất
                tẩy rửa , toner , huyết thanh , kem lên mặt , Hàn Quốc phong cách sắc thái màu môi , đệm hiệp
                ước, và mọi thứ khác bạn cần để có được vẻ ngoài trang điểm tự nhiên, hoàn thành quy trình chăm
                sóc da 10 bước , duyệt theo loại da của bạn hoặc điều trị các vấn đề về da của bạn .</p>
            <p>Hãy đến để tìm ra nơi cuộc sống của bạn đưa bạn đến tại KOODING! Vui lòng duyệt qua trang web của
                chúng tôi và xem các phong cách thời trang Hàn Quốc mới nhất và tuyệt vời nhất từ ​​cửa hàng
                thời trang trực tuyến yêu thích mới của bạn. Với khả năng phục vụ hơn 100 quốc gia, chúng tôi
                đảm bảo bạn sẽ có trải nghiệm mua sắm dễ dàng.</p>
        </div>
    </div>

    <!-- end album ,slider 3 -->

    <div class="slider-album pb-4">
        <div class="slide-title text-center pt-4 pb-2 text-light">
            <h3>#<?= $data['display']['web_name'] ?></h3>
            <p>Chia sẽ khoảnh khắc của bạn với KOODING TRÊN <i class="fab fa-instagram text-light" aria-hidden="true"></i> hoặc <i class="fab fa-twitter text-light" aria-hidden="true"></i>

            </p>
        </div>
        <div class="slick__slider">
            <div class="slider-album__content pb-3">
                <a href="albumClient#lg=1&slide=0" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 282
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/1.jpg" alt="">
                    </div>

                </a>
                <a href="albumClient#lg=1&slide=2" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 228
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/3.jpg" alt="">
                    </div>

                </a>
                <a href="albumClient#lg=1&slide=3" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 18
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/4.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=11" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 338
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/12.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=1" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 48
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/2.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=8" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 298
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/15.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=15" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 280
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/17.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=17" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 28
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/19.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=16" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 21
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/18.jpg" alt="">
                    </div>
                </a>
                <a href="albumClient#lg=1&slide=10" class="album_link">
                    <div class="album__overlay">
                        <div class="album__overlay_icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="album__overlay_tim">
                            ♥ 58
                        </div>
                    </div>
                    <div class="slider_album_boxImg">
                        <img src="./public/images/album/11.jpg" alt="">
                    </div>
                </a>
            </div>
        </div>
        <a href="albumClient" class="album-button ">
            Xem thư viện
        </a>
    </div>
    <!-- end slide album -->
    <div class="press-bar">
        <a href="">
            <img src="public/images/layout/soompi.png" alt="">
        </a>
        <a href="">
            <img src="public/images/layout/buzzfeed.png" alt="">
        </a>
        <a href="">
            <img src="public/images/layout/klog.png" alt="">
        </a>
        <a href="">
            <img src="public/images/layout/chinabrands.png" alt="">
        </a>
    </div>
    <!-- end press -->
</main>
<!-- end main -->