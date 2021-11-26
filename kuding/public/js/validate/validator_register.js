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
        avatar: {
            required : true,
        },
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập tên !",
            minlength: "Nhập tên tối thiếu 6 ký tự",
            maxlength: "Nhập tên tối đa 26 ký tự"
        },
        email: {
            required: "Vui lòng nhập email !",
            email: "Nhập đúng định dạng email (VD:Kooing@gmail.com)"
        },
        birthday: {
            required: "Vui lòng nhập ngày sinh !",
            email: "Nhập đúng định dạng ngày tháng!"
        },
        password: {
            required: "Vui lòng nhập mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        avatar: {
            required: "Vui lòng nhập ảnh !",
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });