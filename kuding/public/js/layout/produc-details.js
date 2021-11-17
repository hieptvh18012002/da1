$(document).ready(function () {
    // code javascript ảnh
    $('#img1').click(function (e) { 
        e.preventDefault();
        const srcImg = $('#img1 img').attr('src');
        $('.img__right img').attr('src', srcImg);
    });
    $('#img2').click(function (e) { 
        e.preventDefault();
        const srcImg = $('#img2 img').attr('src');
        $('.img__right img').attr('src', srcImg);
    });
    $('#img3').click(function (e) { 
        e.preventDefault();
        const srcImg = $('#img3 img').attr('src');
        $('.img__right img').attr('src', srcImg);
    });
    $('#img4').click(function (e) { 
        e.preventDefault();
        const srcImg = $('#img4 img').attr('src');
        $('.img__right img').attr('src', srcImg);
    });
    $('#img5').click(function (e) { 
        e.preventDefault();
        const srcImg = $('#img5 img').attr('src');
        $('.img__right img').attr('src', srcImg);
    });
    // code javascript tim
    $('.animate-button-wrap i').click(function (e) { 
        e.preventDefault();
        $(this).toggleClass('far');
        $(this).toggleClass('fas');
        $(this).toggleClass('favorite')
    });
    // code javascript cho product details
    $('#1').click(function (e) { 
        e.preventDefault();
        $('#2').next().removeClass('show__detail');
        $('#3').next().removeClass('show__detail');
        $('#4').next().removeClass('show__detail');
        $(this).next().toggleClass('show__detail');
    });
    $('#2').click(function (e) { 
        e.preventDefault();
        $('#1').next().removeClass('show__detail');
        $('#3').next().removeClass('show__detail');
        $('#4').next().removeClass('show__detail');
        $(this).next().toggleClass('show__detail');
    });
    $('#3').click(function (e) { 
        e.preventDefault();
        $('#1').next().removeClass('show__detail');
        $('#2').next().removeClass('show__detail');
        $('#4').next().removeClass('show__detail');
        $(this).next().toggleClass('show__detail');
    });
    $('#4').click(function (e) { 
        e.preventDefault();
        $('#1').next().removeClass('show__detail');
        $('#3').next().removeClass('show__detail');
        $('#2').next().removeClass('show__detail');
        $(this).next().toggleClass('show__detail');
    });
});