<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm tin tức mới</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <?php if(isset($data['msg'])){
                echo $data['msg'];
            }?>
            <form id="form_news" class="forms-sample" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="exampleInputName1">Tiêu đề </label>
                    <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>File upload</label>
                    <input name="img_cate" type="file" class="form-control file-upload-info" placeholder="Upload Image">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea class="form-control" id="" name="shortdesc" rows="3"><?= save_value('shortdesc') ?></textarea>
                </div>
                <div class="form-group">
                    <label for="local-upload">Chi tiết nội dung</label>
                    <textarea class="form-control" id="local-upload" name="desc" rows="4"><?= save_value('desc') ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>