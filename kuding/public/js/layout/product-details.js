$(document).ready(function () {
    // code javascript ảnh
    const thumbImg = document.querySelectorAll('.thunb__img');
    const ImgAttr = document.querySelectorAll('.thunb__img img');
    const imgIndex = document.querySelector('.img__right img');
    console.log(thumbImg);
    thumbImg.forEach((thumb, index) =>{
        const attr = ImgAttr[index].getAttribute("src");
        thumb.onclick = function (){
            imgIndex.setAttribute("src", attr);
        }
    })
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