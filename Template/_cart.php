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
                    <?php
                        foreach($product->getData('cart') as $item) :
                            $cartItem = $product->getProduct($item['item_id']);
                            $subTotal[] = array_map(function($item){
                    ?>
                    <!-- Cart Item Start -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'; ?>" style="height: 120px;" alt="cart 1" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-bloo font-size-20"><?php echo $item['item_name'] ?? 'Unknown'; ?></h5>
                            <small>by <?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                            <!-- Product Rating Start -->
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-rale font-size-14">20, 534 ratings</a>
                            </div>
                            <!-- Product Rating End -->

                            <!-- Product Quantity Start -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex font-rale w-25">
                                    <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-minus"></i></button>
                                    <input type="text" class="qty-input border px-2 w-25 bg-light w-100 text-center" data-id="<?php echo $item['item_id'] ?? 0; ?>" disabled value="1" placeholder="1">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-plus"></i></button>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-end" >Delete</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                                </form>
                                
                            </div>
                            <!-- Product Quantity End -->
                        </div>

                        <div class="col sm-2 text-end">
                            <div class="font-size-20 text-danger font-baloo">
                                $<span class="product-price" data-id="<?php echo $item['item_id'] ?? 0; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Cart Item End -->
                    <?php 
                        return $item['item_price'];
                        }, $cartItem);
                        endforeach; 
                        //print_r($subTotal);
                    ?>
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