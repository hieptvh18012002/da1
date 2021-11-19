$(document).ready(function () {
    $('#times').click(function (e) { 
        e.preventDefault();
        $('.site__intro').removeClass('show1');
        $('.background__overlay').addClass('none');
        $('.btn__times').addClass('none');
        $('.btn__minus').removeClass('none');
    });
    $('#minus').click(function (e) { 
        e.preventDefault();
        $('.btn__times').removeClass('none');
        $('.btn__minus').addClass('none');
        $('.site__intro').addClass('show1');
        $('.background__overlay').removeClass('none');
    });
});