$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            // type: "method",
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                qty: qty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    $(".inc-btn").click(function (e) {
        e.preventDefault();

        // var inc_value = $(".qty-input").val();
        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $(".qty-input").val(value);
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $(".dec-btn").click(function (e) {
        e.preventDefault();

        // var dec_value = $(".qty-input").val();
        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 0) {
            value--;
            // $(".qty-input").val(value);
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(".delete-item").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: { product_id: product_id },
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success");
            },
        });
    });
});
