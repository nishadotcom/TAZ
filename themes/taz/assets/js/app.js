//============================== Application Javascript Actions =========================

// Show Alert Message
function showAlert(msg){
    $(".alert-top").show().html(msg);
    setTimeout(function () {
        $(".alert-top").slideUp(600);
    }, 1000);
}
jQuery(document).ready(function(){
    // Auto alert message hide
    setTimeout(function () {
        $(".alert-top").slideUp(600);
    }, 1000);
    
    // Enbale the ZOOM functionality only in PRODUCT VIEW page
    // Get URL
    var url = $(location).attr('href');
    var urlParam = url.split('/').reverse()[1]; // get the URL param for product view page "product"
    if(urlParam == 'product'){
        // Product ZOOM Plugin
        $('#product-image').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
            /*constrainType:"height", 
            constrainSize:274, 
            zoomType: "lens", 
            containLensZoom: true, 
            //gallery:'gallery_01', 
            cursor: 'pointer', 
            galleryActiveClass: "active"*/
        });
    }
    
   
});