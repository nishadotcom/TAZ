//============================== CART =========================
jQuery(document).ready(function () {
    // Add to CART button click
    $('.userFavorite').click(function (event) {
        //event.preventDefault();
        var productId = $(this).attr('data-product-id');
        var userId = $(this).attr('data-user-id');
        if (userLoggedin) {
            $(this).toggleClass("userFavorited");
            var userFavoriteClassValue = $(this).hasClass( "userFavorited" );
            var action = '';
            if(userFavoriteClassValue == true){
                action = 'add-user-favorite';
            }else{
                action = 'remove-user-favorite';
            }
            console.log(action);
            var url = baseURL + 'ws/shoprest/'+action;
            var ajaxData = {
                'productId': productId,
                'userId' : userId
            };
            ajaxCall('POST', url, ajaxData, this); // AJAX Call 
        } else {
            console.log(userLoggedin);
            alert('Not Allowed');
            return false;
        }
    });
});


// AJAX Call Method
function ajaxCall(method, url, ajaxData, ref) {
    $.ajax({
        type: method,
        url: url,
        data: ajaxData,
        //dataType: 'json',
        success: function (response) {
            showAlert(response.msg); // Show alert message
            $(ref).prop('disabled', true); // Disable the CART button for the current
            return response;
        },
        error: function (xhr) {
            alert('error')
            return xhr.statusText;
            //xhr.status = 404
            //xhr.statusText = error
        }
    });
}