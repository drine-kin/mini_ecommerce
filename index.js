$(document).ready(function() {
    // banner carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1,
    });

    // top sale carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // isotope filter
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });

    // new phones carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // blogs own carousel
    $('#latest-blogs .owl-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })

    // product quantity 
    let $increase_quantity = $('.qty .qty-up');
    let $decrease_quantity = $('.qty .qty-down');
    //let $input = $('.qty .qty-input');
    let $deal_price = $("#deal-price");

    //click on quantity
    $increase_quantity.click(function(e) {
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

        // change product price using ajax api call
        $.ajax({url: "Template/ajax.php", type: 'post', data: {itemid: $(this).data("id")}, success: function(result) {
            let obj = JSON.parse(result);
            let item_price = obj[0]["item_price"];

            if($input.val()>=1 && $input.val() <= 9){
                $input.val(function(i, oldVal) {
                    return ++oldVal;
                })

                 //increase price of product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }

           

        }});
        
        
    });

    $decrease_quantity.click(function(e) {
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

        $.ajax({url: "Template/ajax.php", type: 'post', data: {itemid: $(this).data("id")}, success: function(result) {
            let obj = JSON.parse(result);
            let item_price = obj[0]["item_price"];

            if($input.val()>1){
                $input.val(function(i, oldVal) {
                    return --oldVal;
                })

                
                //decrease price of product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }


        }});
       
    });

});