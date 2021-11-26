<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm giá trị thuộc tính sản phẩm mới</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <form action="" class="forms-sample" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="exampleInputName1">Thuộc tính</label>
                    <select name="attr" id="attr" class="form-control">
                        <?php foreach($data['attrs'] as $a):?>
                        <option  value="<?= $a['id'] ?>"><?= $a['name'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
               <div class="form-group" id="input-color">
                   <label for="">Giá trị</label>
                   <input type="color" name="color"  >
               </div>
               <div class="form-group" id="input-size" style="display: none;">
                   <label for="">Giá trị</label>
                   <input type="text" placeholder="Nhập giá trị size(S,M,L...)" name="size" class="form-control" >
               </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#attr').change(function(){
            var attr = $('#attr').val()
            if(attr == 2){
                $('#input-size').show()
                $('#input-color').hide()
            }else{
                $('#input-size').hide()
                $('#input-color').show()
            }
        })
    })
</script>