$("#form_categorys").validate({
    rules: {
        name_cate: {
            required : true,
            minlength : 6,
            maxlength : 26
        },
        img_cate: {
            required : true,
            accept: "image/jpeg, image/png"
        },
    },

    messages: {
        name_cate: {
            required: "Vui lòng nhập tên loại hàng !",
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
        img_cate: {
            required: "Vui lòng nhập hình ảnh !",
            accept: "Nhập ảnh dm m"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });


 $("#register_user").validate({
    rules: {
        fullname: {
            required : true,
            minlength : 6,
            maxlength : 26
        },
        email: {
            required : true,
            email: /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/
        },
        password: {
            required : true,
            minlength : 6,
            maxlength : 12
        },
        birthday: {
            required : true,
            date: true
        },
        
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập họ tên !",
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
        email: {
            required: "Vui lòng nhập email !",
            email: "Nhập đúng định dạng email"
        },
        password: {
            required: "Vui lòng nhập mật khẩu !",
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 12 ký tự"
        },
        birthday: {
            required: "Vui lòng nhập ngày sinh !",
            date: "Nhập đúng định dạng ngày",
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });