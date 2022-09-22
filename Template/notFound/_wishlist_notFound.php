<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['delete-cart-submit'])) {
            $deletedRecord = $cart->deleteCart($_POST['item_id'], 'wishlist');
        }
        
        if(isset($_POST['cart-submit'])) {
            $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
        }
    }

   
?>
 <!-- Shopping Cart Start -->
 <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-bloo font-size-20">Wishlist</h5>
            <!-- Shopping Cart Item Start -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-12 text-center py-2">
                            <img src="./assets/blog/empty_cart.png" alt="Empty Wishlist" class="img-fluid" style="height: 200px;">
                            <p class="font-bloo font-size-16 text-black-50">Empty Wishlist</p>
                        </div>
                    </div>
                </div>

            
            </div>
            <!-- Shopping Cart Item End -->
        </div>
       </section>
       <!-- Shopping Cart End -->