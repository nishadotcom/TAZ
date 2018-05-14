//============================== CART =========================
jQuery(document).ready(function () {
    // Add / Remove User Favorite
    $('#categoryPriceFilter').click(function (event) {
        //event.preventDefault();
        var categoryId = $('#categoryId').val();
        var priceMin = $('#priceMin').val();
        var priceMax = $('#priceMax').val();
        if (categoryId) {
            $(this).toggleClass("userFavorited");
            var userFavoriteClassValue = $(this).hasClass( "userFavorited" );
            var action = '';
            if(userFavoriteClassValue == true){
                action = 'add-user-favorite';
            }else{
                action = 'remove-user-favorite';
            }
            console.log(action);
            var url = baseURL + 'ws/shoprest/ajax-category-products-filter';
            var ajaxData = {
                'categoryId': categoryId,
                'min' : priceMin,
                'max' : priceMax
            };
            //ajaxCall('POST', url, ajaxData, this); // AJAX Call 
            $.ajax({
                type: 'POST',
                url: url,
                data: ajaxData,
                //dataType: 'json',
                success: function (response) {
                    if(response.result){
                        $('.productListSingle').html(response.data.content);
                    }
                },
                error: function (xhr) {
                    alert('error')
                    return xhr.statusText;
                    //xhr.status = 404
                    //xhr.statusText = error
                }
            });
        } else {
            showAlert("Error occured. Please contact administrator");
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