<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm sản tài khoản</h4>
            <p class="card-description">
                Thêm tài khoản tào lao cho vui
            </p>
            <form action="" method="POST" enctype="multipart/form-data" name="form-register" id="register_user" class="p-5">
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Tên đầy đủ" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" placeholder="Nhập email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu" class="form-control">
                </div>
                <div class="gender col-md-12 mb-4 mt-4">
                    <p><label for="">Vai trò</label></p>
                    <div class="form-check-inline">
                        <input class="form-check-input" value="0" id="role" type="radio" name="role" checked>
                        <label for="role" class="form-check-label mr-4">
                            Khách hàng
                        </label>
                        <input class="form-check-input" id="role1" type="radio" name="role">
                        <label for="role1" class="form-check-label mr-4">
                            Nhân viên
                        </label>
                        <input class="form-check-input" id="role3" type="radio" name="role">
                        <label for="role3" class="form-check-label">
                            Admin quản trị
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input type="date"  name="birthday" id="birthday" placeholder="Ngày sinh của bạn" class="form-control" >
                </div>
                <div class="gender col-md-12 mb-4 mt-4">
                    <label for="">Giới tính</label>
                    <div class="form-check-inline">
                        <input class="form-check-input" value="0" id="gender" type="radio" name="gender" checked>
                        <label for="gender" class="form-check-label mr-4">
                            Nam
                        </label>
                        <input class="form-check-input" id="gender2" type="radio" name="gender">
                        <label for="gender2" class="form-check-label">
                            Nữ
                        </label>
                    </div>
                </div>
               
                <button type="submit" name="btn_add" class="btn btn-primary mr-2">Thêm</button>
                <button class="btn btn-light">Danh sách</button>

            </form>
        </div>
    </div>
</div>