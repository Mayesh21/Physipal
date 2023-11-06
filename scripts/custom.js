$(document).ready(function () {


    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('. product_data').find('. input-qty').val();
        // alert(qty);
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(' . product_data ').find(' . input-qty').val(value);
        }
    });


    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('. product_data').find('. input-qty').val();
        // alert(qty);
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(' . product_data ').find(' . input-qty').val(value);
        }
    });

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();
        var qty = $(this).closest('. product_data').find('. input-qty').val();
        var pro_id = $(this).val();
        alert(pro_id);
    });
});  