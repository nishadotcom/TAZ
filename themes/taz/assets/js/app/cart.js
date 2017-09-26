//============================== CART =========================
jQuery(document).ready(function(){
	// Add to CART button click
	$('.add_to_cart').click(function(event){ 
		//event.preventDefault();
		var productId	= $(this).attr('data-product-id');
		var userId 	= $(this).attr('data-user-id');
		if(userId == 'guest'){

		}else{
			var ajaxUrl		= baseURL+'ws/cartrest/create';
			var ajax_data	= {
				'productId' : productId,
				//'userId' : userId
			};
			var ajaxAddtoCart = ajaxCall();
			$.ajax({
				type: 'GET',
				url: ajaxUrl, 
				data: ajax_data,
				dataType: 'json',
				success: function(response){
		        	console.log(response);
		    	},
		    	error: function(xhr){
		    		return xhr.statusText;
		    		//xhr.status = 404
		    		//xhr.statusText = error
		    	}
			});
			//console.log(ajaxAddtoCart);
		}
	});
});


// AJAX Call Method
function ajaxCall(method,url,ajaxData){
	$.ajax({
		type: method,
		url: url, 
		data: ajaxData,
		//dataType: 'json',
		success: function(response){
        	return response;
    	},
    	error: function(xhr){
    		return xhr.statusText;
    		//xhr.status = 404
    		//xhr.statusText = error
    	}
	});
}