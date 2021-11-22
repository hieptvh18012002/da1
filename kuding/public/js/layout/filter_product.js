$(document).ready(function() {
  

   
    // input range
    $('#price_range').slider({
        range: true,
        min: 500000,
        max: 50000000,
        values: [500000, 50000000],
        step: 500000,
        stop: function(event, ui) {
            $('#price_show').html('Từ :' + ui.values[0] + '-' + ui.values[1])
            $('#hidden_minimum_price').val(ui.values[0])
            $('#hidden_maximum_price').val(ui.values[1])

        }
    })
});