<main class="body__like">
    <div class="title__like">
        <p>Các mặt hàng yêu thích của bạn!</p>
    </div>
    <div class="content__like">
        <?php if(isset($_SESSION['favorite']) && (count($_SESSION['favorite'])>0)):?>
        <section class="like__Allitem">
            <?php foreach ($_SESSION['favorite'] as $item) : ?>
                <form action="cartClient" class="like__item" method="POST">
                    <a href="productDetail?action=viewDetail&id=<?= $item['id'] ?>" class="like__img">
                        <img src="public/images/products/<?= $item['avatar'] ?>" alt="" width="100%">
                    </a>
                    <div class="like__name">
                        <p><?= $item['name'] ?></p>
                    </div>
                    <div class="like__price" <p><?= number_format($item['price'], 0, ',') ?>d</p>
                    </div>
                    <div class="like__filters">
                        <div class="like__filter__color">
                            <select class="filter__select" name="color">
                                <option value="" disabled selected>Chọn màu sắc</option>
                                <?php foreach ($item['color_name'] as $i) : ?>
                                    <?php foreach ($i as $c) : ?>
                                        <option value="<?= $c['id'] ?>"><?= $c['value'] ?></option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="like__filter__color">
                            <select class="filter__select" name="size">
                                <option value="" disabled selected>Chọn size</option>
                                <?php foreach ($item['size_name'] as $i) : ?>
                                    <?php foreach ($i as $c) : ?>
                                        <option value="<?= $c['id'] ?>"><?= $c['value'] ?></option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="like__filter__color">
                            <input type="number" name="quantity" class="filter__select" value="1" name="" id="">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        </div>

                    </div>
                    <a href="productFavoriteClient?action=del&id=<?= $item['id'] ?>" onclick="showError();" class="like__close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div onclick="showSuccess();" class="like__addCart">
                        <button type="submit" name="action">Thêm vào giỏ hàng</button>
                    </div>
                </form>
            <?php endforeach; ?>


            <div class="itemm"></div>
            <div class="itemm"></div>
            <div class="itemm"></div>
            <div class="itemm"></div>

        </section>
        <?php endif; ?>
    </div>
    <div id="toast">
    </div>
</main>