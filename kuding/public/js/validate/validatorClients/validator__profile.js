$("#form_profile").validate({
    rules: {
      fullname: {
        required : true,
        minlength : 5,
        maxlength : 25
      },
      email: {
        required : true,
        email: /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/
      },
      birthday: {
        required : true,
        date : true
      }
    },

    messages: {
        fullname: {
            required: "Vui lòng nhập tên !",
            minlength: "Nhập tên tối thiếu 5 ký tự",
            maxlength: "Nhập tên tối đa 25 ký tự"
        },
        email: {
            required: "Vui lòng nhập email !",
            email: "Nhập đúng định dạng email (VD:Kooing@gmail.com)"
        },
        birthday: {
            required: "Vui lòng nhập ngày sinh !",
            date: "Nhập đúng định dạng ngày tháng !"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });
 
 $("#form_pass").validate({
    rules: {
        password: {
            required : true,
            minlength : 6,
            maxlength : 12
        },
        password_new: {
            required : true,
            minlength : 6,
            maxlength : 12
        },
        password_comfim: {
            required : true,
            minlength : 6,
            maxlength : 12
        },
    },

    messages: {
        password: {
            required: "Vui lòng nhập mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        password_new: {
            required: "Vui lòng nhập mật khẩu mới !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
        password_comfim: {
            required: "Vui lòng xác nhận mật khẩu !",
            minlength: "Nhập mật khẩu tối thiếu 6 ký tự",
            maxlength: "Nhập mật khẩu tối đa 12 ký tự"
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });
