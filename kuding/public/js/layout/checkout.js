$(document).ready(function () {
    $('#vocher').keydown(function () { 
        $('.sub__vorcher').addClass('ys');
    });
    $('.note').click(function (e) { 
        e.preventDefault();
        $('.note__input').toggleClass('vcl');
    });
    // $(window).scroll(function () { 
    //     var pos_body = $(window).scrollTop();
    //     // console.log(pos_body);
    //     if(pos_body>20){
    //         $('.body__order__right').addClass('moc-up');
    //     }else{
    //         $('.body__order__right').removeClass('moc-up');
    //     }
    // });
});