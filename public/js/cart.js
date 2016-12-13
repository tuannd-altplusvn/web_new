$(document).on( "click", ".add_cart", function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var product_id = $(this).data("product");
    
    $.ajax({
        url : "/cart/add",
        type : "post", 
        dateType:"text",
        data : {
            _token:CSRF_TOKEN,
            product_id : product_id
        },
        success : function (result){
            if(result == "NO_AUTHENTICATION")
            {
                $.growl.warning({ message: "You must authenticate to shopping!" });
            } else {
                $.growl.notice({ message: "Add to cart successfully!" });
            }
        }
    });
    

    $('html, body').animate({
        scrollTop: ($(this).offset().top - 150) + 'px'
    }, 'fast');

});

// window.onbeforeunload = function() {
//     return "Bye now!";
// };
// 

$(document).on( "click", ".delete_order", function() {
    var order_id = $(this).data("order");
    var url = $('.delete-confirm').parent().attr('action').replace(/\/delete\/(.+?)$/g, '/delete/' + order_id);
    $('.delete-confirm').parent().attr('action',url);
    console.log(url);
});