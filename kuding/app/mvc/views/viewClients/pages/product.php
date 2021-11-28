<main class="body__product">
    <div class="product__header">
        <div class="proH__title">
            <p><?= $data['title'] ?></p>
        </div>
        <div class="proH__text1">
            <p>(17.709 mặt hàng)</p>
        </div>
        <div class="proH__text2">
            <p>Bạn đang tìm kiếm chiếc váy hoàn hảo phù hợp với mọi thứ hay chiếc váy dễ thương nhất lấy cảm
                hứng từ
                KOODING</p>
        </div>
    </div>
    <div class="product__content">
        <div class="proC__fist">
            <div class="proC__title">
                <p>Chọn mua những gì phù hợp với bạn</p>
            </div>
            <div id="paging1" class="proC__paging">
                <nav class="pages">
                    <li class="pageLeft"><i class="far fa-chevron-left"></i></li>
                    <li class="number__paging">
                        <span class="numB numB__active">1</span>
                        <span class="numB">2</span>
                        <span class="numB">3</span>
                        <span>...</span>
                        <span class="numB">100</span>
                    </li>
                    <li class="pageRight"><i class="far fa-chevron-right"></i></li>
                </nav>
            </div>
        </div>


        <div class="proC__filters">
            <form class="form__filter">
                <div class="select__branch">
                    <select class="op__branch" name="" id="">
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                    </select>
                </div>
                <div class="select__price">
                    <div id="price" class="filter__title">
                        <p>Giá</p>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="box__filter__price none">
                        <!-- khi ng dùng thay đổi value input hidden -> show khoảng giá dưới trên range -->
                        <input type="hidden" id="hidden_minimum_price" value="0">
                        <input type="hidden" id="hidden_maximum_price" value="50000000">
                        <p id="price_show">Từ 10 nghìn đến 20 triệu</p>
                        <div class="price_range" id="price_range">

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="proC__show">
            <div class="proC__allItem">
                



                <div class="product__fake"></div>
                <div class="product__fake"></div>
                <div class="product__fake"></div>
                <div class="product__fake"></div>
            </div>

            <!-- end copy -->
            <div class="proC__fist2">
                <div id="paging2" class="proC__paging">
                    <nav class="pages">
                        <li class="pageLeft"><i class="far fa-chevron-left"></i></li>
                        <li class="number__paging">
                            <span class="numB numB__active">1</span>
                            <span class="numB">2</span>
                            <span class="numB">3</span>
                            <span>...</span>
                            <span class="numB">100</span>
                        </li>
                        <li class="pageRight"><i class="far fa-chevron-right"></i></li>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</main>