$(document).ready(function () {
    $('#vocher').keydown(function () {
        $('.sub__vorcher').addClass('ys');
    });
    $('.note').click(function (e) {
        e.preventDefault();
        $('.note__input').toggleClass('vcl');
    });
    // $('.body__order__content').scroll(function () {
    //     var pos_body = $(window).scrollTop();
    //     if (pos_body > 20) {
    //         $('.body__order__right').addClass('moc-up');
    //     } else {
    //         $('.body__order__right').removeClass('moc-up');
    //     }
    // });
    // select
    $('.input__auto').click(function (e) {
        e.preventDefault();
        // $('.input__address').addClass('none');
        $('.itemAll__address').toggleClass('none');
    });
    // close address
    $('.close').click(function (e) { 
        e.preventDefault();
        $('.input__address p').empty();
        $('.input__address').addClass('none');
        $('.itemAll__address').removeClass('none');
        $('.input__auto').removeClass('none');
        $('#tinh').prop('selectedIndex',0);
        $('#huyen').prop('selectedIndex',0);
        $('#xa').prop('selectedIndex',0);
    });

});
// function innerHTML_tinh() {
//     $('.input__address').removeClass('none');
//     $('.input__auto').addClass('none');
//     const opList = document.querySelector('#tinh').value;
//     console.log(opList);
//     const spanSlec = document.querySelector('.tinhAdd')
//     spanSlec.innerText = opList + ` /`;

// }
// function innerHTML_huyen() {
//     const opList = document.querySelector('#huyen').value;
//     console.log(opList);
//     const spanSlec = document.querySelector('.huyenAdd')
//     spanSlec.innerText = opList + ` /`;

// }
// function innerHTML_xa() {
//     const opList = document.querySelector('#xa').value;
//     console.log(opList);
//     const spanSlec = document.querySelector('.xaAdd');
//     spanSlec.innerText = opList;
//     if(opList != ""){
//         $('.itemAll__address').addClass('none');
//     }
    
// }