<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm danh mã giảm giá mới</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <form id="form_categorys" class="forms-sample" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="exampleInputName1">Tên mã</label>
                    <input name="name_cate" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Loại giảm</label>
                  <select name="cate_code" id="">
                      <option value="">Giảm theo %</option>
                      <option value="">Giảm tiền trực tiếp</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Mã code</label>
                    <input name="code" type="text" class="form-control" id="exampleInputName1" placeholder="code(ABCDEF)...">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Mệnh giá giảm</label>
                    <input name="name_cate" type="number" class="form-control" id="exampleInputName1" placeholder="Giá giảm">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>