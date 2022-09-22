<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['delete-cart-submit'])) {
            $deletedRecord = $cart->deleteCart($_POST['item_id']);
        }
        
        if(isset($_POST['wishlist-submit'])) {
            $cart->saveForLater($_POST['item_id']);
        }
    }
?>
 <!-- Shopping Cart Start -->
 <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-bloo font-size-20">Shopping Cart</h5>
            <!-- Shopping Cart Item Start -->
            <div class="row">
                <div class="col-sm-8">
                <!-- Empty Cart Start -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="./assets/blog/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height: 200px;">
                        <p class="font-bloo font-size-16 text-black-50">Empty Cart</p>
                    </div>
                </div>
                <!-- Empty Cart End -->
                </div>

                <!-- Subtotal Start -->
                <div class="col-sm-4">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery</h6>
                        <div class="border-top py-4">
                            <h5 class="font-bloo font-size-20">Subtotal (2 item)&nbsp;<span class="text-danger" >$ <span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSubTotal($subTotal) : 0;  ?></span></h5>
                            <button class="btn btn-warning mt-3">Proceed to Buy</button>
                        </div>
                    </div>
                </div>
                <!-- Subtotal End -->
            </div>
            <!-- Shopping Cart Item End -->
        </div>
       </section>
       <!-- Shopping Cart End -->