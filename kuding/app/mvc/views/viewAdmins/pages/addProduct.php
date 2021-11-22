<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm sản phẩm mới</h4>
            <p class="card-description">
                Thêm sản phẩm mới vào kho hàng
            </p>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1">Tên </label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="cate" class="">Loại sản phẩm</label>
                    <select name="category" id="cate" class="form-control">
                        <option value="" disabled selected>Chọn loại sản phẩm</option>
                        <option value="0">Thời trang nữ</option>
                        <option value="0">Thời trang nam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" id="price" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="price">Màu</label>
                    <select name="color" id="color" class="form-control">
                        <option value="0">Xanh </option>
                        <option value="2">Đỏ </option>
                        <option value="1">Tím </option>
                    </select>
                    <br>
                    <p>Hoặc nhập màu tùy chọn</p>
                    <input type="text" class="form-control" id="price" placeholder="Nhập màu mới" name="new_color">
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
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả thông tin sản phẩm</label>
                    <textarea class="form-control" id="exampleTextarea1" name="desc" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>