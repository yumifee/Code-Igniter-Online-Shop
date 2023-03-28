// File: public/js/custom.js
function addToCart(id) {
    $.ajax({
        url: '<?php echo base_url("cart/add/") ?>' + id,
        method: 'GET',
        success: function(response) {
            $('#cart-count').html(response);
        }
    });
}
