<div class="card-body">
    <h4 class="card-title">Quản lí tài khoản</h4>
    <div class="" style="display: flex;">
        <a href="account?action=addAccount" class="text-light btn btn-primary">Thêm mới</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Giới tính</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1;
                foreach ($data['list_acc'] as $item) : ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?= $item['fullname'] ?></td>
                        <td><?= $item['birthday']?></td>
                        <td><?= $item['email'] ?></td>
                        <td>
                            <?php if($item['role_id'] == 1){
                                echo "Khách hàng";
                            }elseif($item['role_id'] == 2){
                                echo "Nhân viên";
                            }else{
                                echo "Quản lý";
                            }?>
                        </td>
                        <td><?= $item['gender'] == 0?"Nam":"Nữ" ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td><?= $item['updated_at'] ?></td>
                        
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