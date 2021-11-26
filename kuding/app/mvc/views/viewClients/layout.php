<!DOCTYPE html>
<html lang="en">

<head>
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- jq-ui -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- custom checkbox -->
    <link rel="stylesheet" href="public/css/lib/checkboxes.min.css">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- css boostrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="public/css/style_layout.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời trang Hàn Quốc/Trang chủ</title>
</head>

<body>
    <div class="wrapper">
        <?php include_once "./app/mvc/views/viewClients/partials/__header.php"; ?>

        <!-- end header -->
        <?php include_once "./app/mvc/views/viewClients/pages/" . $data['page'] . ".php"; ?>

        <!-- footer -->
        <?php include_once "./app/mvc/views/viewClients/partials/__footer.php"; ?>

    </div>


    <!-- jqr ui-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- js boostrap 4 -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <!-- js -->
    <script src="./public/js/layout/main.js"></script>
    <script src="./public/js/layout/backtop.js"></script>
    <script src="./public/js/layout/popupLogin.js"></script>
    <!-- pro -->
    <script src="./public/js/layout/products.js"></script>
    <script src="./public/js/layout/filter_product.js"></script>
    <script src="./public/js/layout/checkout.js"></script>
    <script src="./public/js/layout/product-details.js"></script>
    <script src="./public/js/layout/profile.js"></script>
    <!-- <script src="./public/js/layout/client.js"></script> -->
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="public/js/layout/slide_lib.js"></script>
    <script>
        $(document).ready(function() {
            $('#login_user').submit(function(e) {
                e.preventDefault();
                var action = 'loginClient';
                var email = $('#email_login').val();
                var password = $('#password_login').val();
                var remember = $('#remember')
                if(remember.prop("checked") == true){
                    remember = "check";
                }else{
                    remember = "null";
                }
                if(email == '' || password == ''){
                    $('.errLogin').html('Nhập đầy đủ thông tin');
                    return false;
                }else{
                    $("#loading_spinner").css({"display":"block"});
                    $.ajax({
                        url:"account",
                        method:"GET",
                        data:{
                            action: action,
                            email:email,
                            mk:password,
                            remember:remember
                        },
                        success: function(data){
                            $('.errLogin').html(data)
                            }
                       
                    })
                }
            })
            // handle register
            $('#register_user').submit(function(e){
                
            })
        })
    </script>

</body>

</html>