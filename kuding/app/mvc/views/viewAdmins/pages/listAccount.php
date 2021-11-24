<div class="card-body">
    <h4 class="card-title">Quản lí tài khoản</h4>
    <div class="" style="display: flex;">
        <a href="product?action=addProduct" class="text-light btn btn-primary">Thêm mới</a>
        
       
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Giá.</th>
                    <th>Ảnh</th>
                    <th>Giá giảm</th>
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
                        <td><?= $item['pr_name'] ?></td>
                        <td><?= $item['ca_name']?></td>
                        <td><?= number_format($item['price'],0,'.',',') ?>vnd</td>
                        <td><img src="./public/images/products/<?= $item['avatar'] ?>" alt=""></td>
                        <td><?= number_format($item['discount'],0,'.',',') ?>vnd</td>
                        <td><?= substr($item['description'],1,100) ?></td>
                        <td>
                            <?php if ($item['status'] == 0) : ?>
                                <label class="badge badge-danger">Hết hàng</label>
                            <?php else : ?>
                                <label class="badge badge-success">Còn hàng</label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="#update"><i class="fas fa-pen-square text-warning fa-2x "></i></a>
                            <a href="#del" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm?')"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                        </td>
                    </tr>
                <?php $n++;
                endforeach ?>

            </tbody>
        </table>
    </div>
</div>