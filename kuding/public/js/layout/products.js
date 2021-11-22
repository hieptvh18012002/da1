$(document).ready(function () {

    // javascript lọc giá
    $('#price').click(function (e) { 
        e.preventDefault();
        $('.box__filter__price').toggleClass('none');
    });
    // $('.body__product').click(function (e) { 
    //     e.preventDefault();
    //         console.log('dm');
    //         $('.box__filter__price').removeClass('none');
    // });  

    // javascript thêm sản phẩm yêu thích
    $(document).on('click', '.proC__love__icon i', function () {
            $(this).toggleClass('far');
            $(this).toggleClass('fas');
            $(this).toggleClass('proC__icon__color')
    });
});