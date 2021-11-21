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
                    <label for="cate">Loại sản phẩm</label>
                   <select name="category" id="cate">
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
                    <select name="color" id="color">
                        <option value="0">Xanh </option>
                        <option value="2">Đỏ </option>
                        <option value="1">Tím </option>
                    </select>
                    <input type="number" class="form-control" id="price" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Kích cỡ</label>
                    <input type="checkbox" name="size" class="form-check-{primary}"> S
                    <input type="checkbox" name="size" class="form-check-{primary}"> M
                </div>
                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="imgPro[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Tải lên</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity1">City</label>
                    <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Textarea</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>