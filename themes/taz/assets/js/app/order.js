//============================== CART =========================
jQuery(document).ready(function () {
    /*$('#orderForm').on('submit', function(e){
      e.preventDefault();
      console.log('Hello');
      $.ajax({
            type: 'POST',
            url: baseURL + 'ws/shoprest/ajax-make-payment',
            data: $('#orderForm').serialize(),
            //dataType: 'json',
            success: function (response) { 
                console.log(response);
                $('#hash').val(response.hash);
                $('#txnid').val(response.txnid);
                $("#orderForm").submit();
                document.getElementById("orderForm").submit();
                //var payuForm = document.forms.payuForm;
                //payuForm.submit();
                //$('#cartCount').html(response.data.cartCount);
                //showAlert(response.msg); // Show alert message
                //$(ref).prop('disabled', true); // Disable the CART button for the current
                //return response;
            },
            error: function (xhr) {
                alert('Could not add to cart. Please try again');
                console.log(xhr.statusText);
                //return xhr.statusText;
                //xhr.status = 404
                //xhr.statusText = error
            }
        });
    });*/
    // Add to CART button click
    $('#btnOrderConfirm').click(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: baseURL + 'ws/shoprest/ajax-make-payment',
            data: $('#orderForm').serialize(),
            dataType: 'json',
            success: function (response) { 
                console.log(response);
                $('#hash').val(response.hash);
                //return false;
                //$('#txnid').val(response.txnid);
                //$("#orderForm").submit();
                //document.getElementById("orderForm").submit();
                document.payuForm.submit();
                //var payuForm = document.forms.payuForm;
                //payuForm.submit();
                //$('#cartCount').html(response.data.cartCount);
                //showAlert(response.msg); // Show alert message
                //$(ref).prop('disabled', true); // Disable the CART button for the current
                //return response;
            },
            error: function (xhr, status, error) {
                alert('Could not add to cart. Please try again');
                //var err = eval("(" + + ")");
                console.log(error);
                //return xhr.statusText;
                //xhr.status = 404
                //xhr.statusText = error
            }
        });
    });
    
    // REMOVE FROM CART / CART PAGE
    $(document).on('click', '.remove-cart-item', function(){
    //$('.remove-cart-item').click(function(){
        var cartId = $(this).attr('data-cartid');
        var url = baseURL + 'ws/shoprest/remove-cart-item';
        var ajaxData = {
            'cartId': cartId
        };
        $.ajax({
                type: 'POST',
                url: url,
                data: ajaxData,
                //dataType: 'json',
                success: function (response) { 
                    console.log(response);
                    $('.cart-content').html(response.data.cartItems);
                    $('.grandTotal').html(response.data.cartTotal);
                    showAlert(response.msg); // Show alert message
                },
                error: function (xhr) {
                    alert('Could not remove from cart. Please try again');
                    console.log(xhr.statusText);
                    //return xhr.statusText;
                    //xhr.status = 404
                    //xhr.statusText = error
                }
            });
    });

    $('#sameAsShippingAdress').click(function(){
        if($(this).prop('checked') == true){ 
            $('#orderaddress-billingname').val($('#orderaddress-name').val());
            $('#orderaddress-billingaddress').val($('#orderaddress-address').val());
            $('#orderaddress-billingcity').val($('#orderaddress-city').val());
            $('#orderaddress-billingstate').val($('#orderaddress-state').val());
            $('#orderaddress-billingcountry').val($('#orderaddress-country').val());
            $('#orderaddress-billingpincode').val($('#orderaddress-pin_code').val());
            $('#orderaddress-billingphone').val($('#orderaddress-phone').val());
        }/*else{ 
            $('#orderaddress-billingname').val('');
        }*/
    });
    
}); // END OF READY FUNCTION


// AJAX Call Method
/*function ajaxCall(method, url, ajaxData, ref) {
    $.ajax({
        type: method,
        url: url,
        data: ajaxData,
        //dataType: 'json',
        success: function (response) { 
            $('#cartCount').html(response.data.cartCount);
            showAlert(response.msg); // Show alert message
            $(ref).prop('disabled', true); // Disable the CART button for the current
            //return response;
        },
        error: function (xhr) {
            alert('error')
            return xhr.statusText;
            //xhr.status = 404
            //xhr.statusText = error
        }
    });
}*/