<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lí giao diện</h4>
            <p class="card-description">
                Basic form elements
            </p>
           
            <form id="form_display" class="forms-sample" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="">Tên website </label>
                    <input type="text" placeholder="Nhập tên website" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Logo website </label>
                    <input type="file" class="form-control" name="logo">
                </div>
                <div class="form-group">
                    <label class="mr-3" for="special1">Giới thiệu (homepage) </label>
                    <p>Tiêu đề</p>
                    <input type="text" value="" name="title_intro" class="form-control">
                    <p>Nội dung</p>
                    <textarea class="form-control" id="local-upload" name="desc" rows="5"></textarea>

                </div>
                <div class="form-group">
                    <label for="">Quản lý url(social-footer)</label>
                    <input type="text" placeholder="url facebook" name="fb_url" class="form-control">
                    <input type="text" name="insta_url" placeholder="url instagram" class="form-control">
                    <input type="text" name="twitter_url" class="form-control" placeholder="url twitter">
                    <input type="text" name="pinterest_url" class="form-control" placeholder="url pinterest">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2" name="btn_update">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>