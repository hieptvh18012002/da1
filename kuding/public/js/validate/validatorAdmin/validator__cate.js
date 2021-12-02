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
            valiEmail : true
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
        phone: {
            required : true,
            number: true,
            minlength: 10,
            maxlength: 11,
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
        phone: {
            required : "Vui lòng nhập số điện thoại",
            number: "Số điện thoại phải là số",
            minlength: "Số điện thoại ít nhất 10 số",
            maxlength: "Số điện thoại nhiều nhất nhất 11 số",
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
            minlength : 1,
            maxlength : 26
        }
    },

    messages: {
        value: {
            required: "Vui lòng nhập thuộc tính sản phẩm !",
            minlength: "Nhập tối thiếu 1 ký tự",
            maxlength: "Nhập tối đa 26 ký tự"
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });


  // form add tin tức
  $("#form_news").validate({
    rules: {
        title: {
            required : true,
            minlength : 10,
        },
        img_cate: {
            required : true,
        },
        shortdesc: {
            required : true,
            minlength : 10,
        },
        desc: {
            required : true,
        }
    },

    messages: {
        title: {
            required: "Vui lòng nhập tiêu đề !",
            minlength: "Tiêu đề quá ngắn",
        },
        img_cate: {
            required: "Vui lòng nhập ảnh cho tin tức !",
        },
        shortdesc: {
            required: "Vui lòng nhập mô tả ngắn !",
            minlength: "Nhập tối thiếu 10 ký tự",
        },
        desc: {
            required: "Vui lòng nhập thuộc tính sản phẩm !",
        },
    },
    submitHandler: function(form) {
      form.submit();
    }
 });

  // form add vourcher
  $("#form_vourcher").validate({
    rules: {
        name_vour: {
            required : true,
            minlength : 10
        },
        code: {
            required : true,
            minlength : 6,
            vourcher :true
        },
        quantity: {
            required: true,
            number: true
        },
        expired_date:{
            required: true,
            date: true,
            nghiadz: true
        },
        sale: {
            required : true,
        }
    },

    messages: {
        name_vour: {
            required: "Vui lòng nhập tên mã giảm giá !",
            minlength: "Tên giảm  quá ngắn",
        },
        code: {
            required: "Vui lòng nhập mã code !",
            minlength: "Mã code tối thiểu 6 ký tự",
        },
        quantity:{
            required: "Vui lòng nhập số lượng",
            number: "Vui lòng nhập chữ số",
            min: "Vui lòng nhập giá trị lớn hơn 0"
        },
        sale: {
            required: "Vui lòng nhập mệnh giá !",
            maxlength: "Vui lòng nhập giá trị từ 1% -> 99%"
        },
        expired_date:{
            required: "Vui lòng nhập ngày hết hạn",
            date: "Vui lòng nhập định dạng ngày tháng"
        }
    },
    submitHandler: function(form) {
      form.submit();
    }
 });

 $.validator.addMethod("valiEmail", function (value, element) {
    return this.optional(element) || /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(value);
}, "Nhập đúng định dạng email (VD: Kooding@gmail.com)");

$.validator.addMethod("vourcher", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])[A-Za-z\d]{6,}$/.test(value);
}, "Vui lòng nhập Vourcher không chứa ký tự đặc biệt");

var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
// const dateNow = new date();
$.validator.addMethod("nghiadz", function (value, element) {
    if(value <= date){
        return false
    }
    return true
    

}, "Vui lòng nhập ngày lớn hơn hiện tại !");

$("#driveaway").change(function() {
    var selectedCountry = $(this). children("option:selected"). val();  
    if(selectedCountry == "y"){
        $("#driveamount").prop('maxlength', "2");
    }
    else if(selectedCountry == "n"){           
        $("#driveamount").removeAttr("maxlength", "2");
    }
});

// $("#driveaway").change(function() {
//     const selectedCountry = $(this). children("option:selected").val();
//     if(selectedCountry == n){
//         $("#driveamount").removeAttr("maxlength");
//     }
// });

