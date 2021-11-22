<div class="card-body">
    <h4 class="card-title">Danh sách sản phẩm</h4>
    <div class="btn btn-primary">
        <a href="product?action=addProduct" class="text-light">Thêm mới</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Giá.</th>
                    <th>Ảnh</th>
                    <th>Giá giảm</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Mô tả</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1;
                foreach ($data['list_pro'] as $item) : ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['price'] ?></td>
                        <td><img src="./public/images/products/<?= $data['avatar'] ?>" alt=""></td>
                        <td><?= $data['discount'] ?></td>
                        <td>màu</td>
                        <td>size</td>
                        <td><?= $data['description'] ?></td>
                        <td><label class="badge badge-danger"><?php if ($data['status'] == 1) {
                                                                    echo "Còn hàng";
                                                                }
                                                                echo "Hết hàng"; ?></label></td>
                        <td>
                            <a href="#update"><i class="fas fa-pen-square text-warning "></i></a>
                            <a href="#del"><i class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                <?php $n++;
                endforeach ?>

            </tbody>
        </table>
    </div>
</div>