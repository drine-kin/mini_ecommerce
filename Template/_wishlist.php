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
                    <?php
                        foreach($product->getData('wishlist') as $item) :
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
                                 <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-end" >Delete</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                    <button type="submit" class="btn font-baloo text-danger" name="cart-submit">Add to Cart</button>
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

            
            </div>
            <!-- Shopping Cart Item End -->
        </div>
       </section>
       <!-- Shopping Cart End -->