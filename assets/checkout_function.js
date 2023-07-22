$(document).ready(function (){

    $("#placeOrderBtn").click(function(){
        var orders_id = [];
        var payment_method;
        var totalprice = $('input#totalprice').val();
        var quantity = [];
        var size = [];
        var item_id = [];

        $('input[name="code_checkboxes"]').each(function (i) {
            orders_id[i] = $(this).val();
        });

        $('input[name="quan_checkboxes"]').each(function (i) {
            quantity[i] = $(this).val();
        });

        $('input[name="size_checkboxes"]').each(function (i) {
            size[i] = $(this).val();
        });

        $('input[name="id_checkboxes"]').each(function (i) {
            item_id[i] = $(this).val();
        });

        payment_method = $('input[name="payment_chk"]:checked').val();

        gcashRef = $('#inputGcashRef').val();

        if (payment_method == "GCash" && (isNaN(gcashRef) || gcashRef % 1 !== 0)) {
            alert(gcashRef + " is not an integer");
        } else if (payment_method == "GCash" && gcashRef.length != 13) {
            if (gcashRef.length == 0) {
                alert("GCash reference number required");
            } else {
                alert("Please enter correct gcash reference number");
            }
        } else if (payment_method === undefined || payment_method === '' || payment_method === null) {
            alert("Select a payment method!");
        } else {

            $.ajax({
                method: "POST",
                url: "includes/checkout.inc.php",
                data: {
                    "orders_id": orders_id,
                    "payment_method": payment_method,
                    "totalprice": totalprice,
                    "item_id": item_id,
                    "quantity": quantity,
                    "gcashRef": gcashRef
                },
                success: function (response) {
                    window.location.href = "successful_checkout.php";
                    // console.log(response);
                },
                error: function (response) {
                    alert(response);
                }
            });
        }
    });
});

