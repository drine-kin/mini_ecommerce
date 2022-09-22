<?php
$product_shuffle = $product->getData();
shuffle($product_shuffle);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['top-sale-submit'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<!-- Top Sale Start -->
<section id="top-sale">
            <div class="container py-5">
                <h4 class="font-rubik font-size-20">Top Sale</h4>
                <hr>
                <!-- Top Sale OwlCarousel Start -->
                <div class="owl-carousel owl-theme">
                    <?php foreach($product_shuffle as $item) : ?>
                    <div class="item py-2">
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
                                        if(in_array($item['item_id'], $cart->getCartId($product->getData('cart'))?? [])) {
                                            echo '<button type="submit" class="btn btn-success font-size-12" disabled name="top-sale-submit">In the cart</button>';
                                        } else {
                                            echo '<button type="submit" class="btn btn-warning font-size-12" name="top-sale-submit">Add to cart</button>';
                                        }
                                    ?>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Top Sale OwlCarousel End -->
            </div>
        </section>
    <!-- Top Sale End -->