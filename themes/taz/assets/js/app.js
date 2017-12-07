//============================== Application Javascript Actions =========================

// Show Alert Message
function showAlert(msg){
    $(".alert-top").show().html(msg);
    setTimeout(function () {
        $(".alert-top").slideUp(600);
    }, 5000);
}
jQuery(document).ready(function(){
    // Auto alert message hide
    setTimeout(function () {
        $(".alert-top").slideUp(600);
    }, 5000);
});