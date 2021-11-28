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


 // form add products
 $("#add_products").validate({
    rules: {
        name: {
            required : true,
            minlength : 6,
            maxlength : 26
        },
        price: {
            required : true,
        },
        avatar: {
            required : true
        },
        'avatars[]': {
            required : true,
        },
        'color[]': {
            required : true,
        },
        'size[]': {
            required : true,
        },
        desc: {
            required : true,
        }
        
    },

    messages: {
        name: {
            required: "Vui lòng nhập tên sản phẩm !",
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
        price: {
            required: "Vui lòng nhập giá sản phẩm !",
        },
        avatar: {
            required: "Vui lòng nhập ảnh !"
        },
        'avatars[]': {
            required: "Vui lòng nhập ảnh chi tiết !",
        },
        'color[]':{
            required: "Vui lòng màu cho sản phẩm !",
        },
        'size[]':{
            required: "Vui lòng kích cỡ cho sản phẩm !",
        },
        desc: {
            required: "Vui lòng nhập mô tả sản phẩm !"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });

 // form add products
 $("#update_products").validate({
    rules: {
        name: {
            required : true,
            minlength : 6,
            maxlength : 26
        },
        price: {
            required : true,
        },
        'color[]': {
            required : true,
        },
        'size[]': {
            required : true,
        },
        color_new: {
            minlength : 6,
            maxlength : 26
        }
        
    },

    messages: {
        name: {
            required: "Vui lòng nhập tên sản phẩm !",
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
        price: {
            required: "Vui lòng nhập giá sản phẩm !",
        },
        'color[]':{
            required: "Vui lòng màu cho sản phẩm !",
        },
        'size[]':{
            required: "Vui lòng kích cỡ cho sản phẩm !",
        },
        color_new: {
            minlength: "Nhập tối thiếu 6 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });


 // form add thuộc tính
 $("#add_arb").validate({
    rules: {
        value: {
            required : true,
            minlength : 2,
            maxlength : 26
        }
    },

    messages: {
        value: {
            required: "Vui lòng nhập thuộc tính sản phẩm !",
            minlength: "Nhập tối thiếu 2 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });
