<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sửa thông sản phẩm</h4>
            <p class="card-description">
                Chỉnh sửa thông tin sản phẩm
            </p>
            <?php if (!empty($data['msg'])) : ?>
                <div class="msg bg-success text-light" style="padding: 7px;">
                    <?php echo $data['msg']; ?>
                </div>
            <?php endif; ?>
            <form action="" class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Tên </label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?= $data['pros']['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="cate" class="">Loại sản phẩm</label>
                    <select id="cate" name="category" class="form-control">
                        <?php foreach ($data['list_cate'] as $item) : ?>
                            <?php if ($data['pros']['cate_id'] == $item['id']) : ?>
                                <option selected value="<?= $item['id'] ?>"><?php echo $item['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" id="price" value="<?= $data['pros']['price'] ?>">
                </div>
                <div class="form-group" style="display:flex; column-gap:30px; align-items:center;">
                    <label for="">Màu sản phẩm</label>
                    <?php foreach ($data['color_values'] as $item) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" name="color[]" value="<?= $item['id'] ?>">
                                <?= $item['value'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <label for="">Màu mới </label>
                    <input type="text" name="color_new" class="form-control" id="" placeholder="Màu mới">
                </div>
                <div class="form-group" style="display:flex; column-gap:30px; align-items:center;">
                    <label for="">Kích cỡ</label>
                    <?php foreach ($data['size_values'] as $item) : ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" name="size[]" value="<?= $item['id'] ?>">
                                <?= $item['value'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <div class="" style="width: 300px;height:200px;">
                        <img src="./public/images/products/<?= $data['pros']['avatar'] ?>" width="100%" height="100%" alt="" style="object-fit: cover;">
                    </div>
                    <!-- new img -->
                    <label for="">Tải lên ảnh mới</label>
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
                    <label for="local-upload">Mô tả thông tin sản phẩm</label>
                    <textarea class="form-control" id="local-upload" name="desc" rows="4"><?= $data['pros']['description'] ?></textarea>
                </div>
                <button type="submit" name="btn_update" class="btn btn-primary mr-2">Cập nhật</button>
                <a href="product" class="btn btn-light">Danh sách</a>
            </form>
        </div>
    </div>
</div>