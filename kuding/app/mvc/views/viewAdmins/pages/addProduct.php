<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm sản phẩm mới</h4>
            <p class="card-description">
                Thêm sản phẩm mới vào kho hàng
            </p>
            <?php if (!empty($data['msg'])) : ?>
                <div class="msg bg-success text-light" style="padding: 7px;">
                    <?php echo $data['msg']; ?>
                </div>
            <?php endif; ?>
            <form action="" class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Tên </label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="cate" class="">Loại sản phẩm</label>
                    <select id="cate" name="category" class="form-control">
                        <?php foreach ($data['list_cate'] as $item) : ?>
                            <option value="<?= $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Giá sản phẩm">
                </div>
                <div class="form-group" style="display:flex; column-gap:30px; align-items:center;">
                    <label for="">Màu sản phẩm</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="color[]" value="xanh">
                            Xanh
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="color[]" value="do">
                            Đỏ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="color[]" value="tim">
                            Tím
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="color[]" value="vang">
                            Vàng
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="color[]" value="den">
                            Đen
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Màu mới </label>
                    <input type="text" name="color_new" class="form-control" id="" placeholder="Màu mới">
                </div>
                <div class="form-group" style="display:flex; column-gap:30px; align-items:center;">
                    <label for="">Kích cỡ</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="size[]" value="m">
                            M
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="size[]" value="l">
                            L
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="size[]" value="xl">
                            XL
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="size[]" value="2xl">
                            XXL
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" name="size[]" value="3xl">
                            XXXL
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="avatar" class="form-control" id="upload" onchange="previewImg()">
                    <?php if (!empty($data['errImg'])) : ?>
                        <div class="text-danger">
                            <?php echo $data['errImg']  ?>
                        </div>
                    <?php endif; ?>
                    <div id="displayImg" class="" style="width: 200px;">

                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả thông tin sản phẩm</label>
                    <textarea class="form-control" id="exampleTextarea1" name="desc" rows="4"></textarea>
                </div>
                <button type="submit" name="btn_add" class="btn btn-primary mr-2">Thêm</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>