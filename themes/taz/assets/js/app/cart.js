//============================== CART =========================
jQuery(document).ready(function () {
    // Add to CART button click
    $('.add_to_cart').click(function (event) {
        //event.preventDefault();
        var productId = $(this).attr('data-product-id');
        var userId = $(this).attr('data-user-id');
        if (userLoggedin) {
            var url = baseURL + 'ws/shoprest/addto-cart';
            var ajaxData = {
                'productId': productId,
                'userId' : userId
            };
            //ajaxCall('POST', url, ajaxData, this); // AJAX Call
            var ref = this;
            $.ajax({
                type: 'POST',
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
                    alert('Could not add to cart. Please try again');
                    console.log(xhr.statusText);
                    //return xhr.statusText;
                    //xhr.status = 404
                    //xhr.statusText = error
                }
            });
        } else {
            console.log(userLoggedin);
            alert('Not Allowed. Please login');
            return false;
        }
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