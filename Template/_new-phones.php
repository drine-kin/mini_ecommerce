<?php
    shuffle($product_shuffle);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['new-phones-submit'])) {
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
 
 <!-- New Phones Start -->
 <section id="new-phones">
            <div class="container py-5">
                <h4 class="font-rubik font-size-20">New Phones</h4>
                <hr>
                <!-- New Phones OwlCarousel Start -->
                <div class="owl-carousel owl-theme">
                <?php
                shuffle($product_shuffle);
                foreach($product_shuffle as $item) : ?>
                    <div class="item py-2 bg-light">
                        <div class="product font-rale">
                            <a href="product.php?item_id=<?php echo $item['item_id']; ?>"><img src="<?php echo $item['item_image'] ?? './assets/products/1.png' ?>" alt="product 1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? 'Unknown' ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                    if(in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" class="btn btn-success font-size-12" disabled name="new-phones-submit">In the cart</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-warning font-size-12" name="new-phones-submit">Add to cart</button>';
                                    }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- New Phones OwlCarousel End -->
            </div>
        </section>
        <!-- New Phones End -->