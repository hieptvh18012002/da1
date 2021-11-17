$(document).ready(function () {

    // javascript lọc sản phẩm
    $('#filter__price').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        $('#fill__cate').removeClass('show__cate');
        $('#fill__income').removeClass('show__cate');
        $('#fill__brand').removeClass('show__cate');
        $('#fill__price').toggleClass('show__cate');
        $('#filter__price i').toggleClass('abc');
    });
    $('#filter__cate').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        $('#fill__income').removeClass('show__cate');
        $('#fill__brand').removeClass('show__cate');
        $('#fill__price').removeClass('show__cate');
        $('#fill__cate').toggleClass('show__cate');
        $('#filter__cate i').toggleClass('abc');
    });
    $('#filter__income').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        $('#fill__brand').removeClass('show__cate');
        $('#fill__price').removeClass('show__cate');
        $('#fill__cate').removeClass('show__cate');
        $('#fill__income').toggleClass('show__cate');
        $('#filter__income i').toggleClass('abc');
    });
    $('#filter__brand').click(function (e) { 
        e.preventDefault();
        e.stopPropagation();
        $('#fill__price').removeClass('show__cate');
        $('#fill__cate').removeClass('show__cate');
        $('#fill__income').removeClass('show__cate');
        $('#fill__brand').toggleClass('show__cate');
        $('#filter__brand i').toggleClass('abc');
    });
    $('main.body__product').click(function (e) { 
        e.preventDefault();
        if($('show__cate')){
            $('.filter__cate .cate__body').removeClass('show__cate');
            $('.boxF__cate i').removeClass('abc');
        }
        
    });

    // javascript thêm sản phẩm yêu thích
    $(document).on('click', '.proC__love__icon i', function () {
            $(this).toggleClass('far');
            $(this).toggleClass('fas');
            $(this).toggleClass('proC__icon__color')
    });
});