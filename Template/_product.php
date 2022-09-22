<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['product-submit'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
$item_id = $_GET['item_id'] ?? 1;
foreach($product->getData() as $item) :
    if($item['item_id'] == $item_id) :
?>
  
  <!-- Product Detail Start  -->
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? './assets/products/1.png' ?>" alt="product" class="img-fluid">
                <div class="row pt-4 font-size-16 font-bloo gx-2">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Buy Now</button>
                    </div>
                    <div class="col">
                    <form action="" method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                        <?php
                            if(in_array($item['item_id'], $cart->getCartId($product->getData('cart'))?? [])) {
                                echo '<button type="submit" class="btn btn-success font-size-14 form-control" disabled name="product-submit">In the cart</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-warning font-size-14 form-control" name="product-submit">Add to cart</button>';
                            }
                        ?>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-bloo font-size-20"><?php echo $item['item_name'] ?? 'Unknown'; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,543 ratings | 1000+ answered questions</a>
                </div>
                <hr class="m-0">

                <!-- Product Price Start -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Max Retail Price</td>
                        <td class="px-2"></td>
                        <td><s>162,000</s></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price</td>
                        <td class="px-2"></td>
                        <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-14">&nbsp;inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Save</td>
                        <td class="px-2"></td>
                        <td><span class="text-danger font-size-16">$162,000</span></td>
                    </tr>
                </table>

                <!-- Product Price End -->

                <!-- Policy Start -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days<br> Replacement</a>
                        </div>
                        <div class="return text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Daily Tuition<br> Delivered</a>
                        </div>
                        <div class="return text-center me-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year<br> Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- Policy End -->
                <hr>

                
                <!-- <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small><i class="fa fa-location-dot color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                    <small>Delivery by: Mar 29 - April 1</small>
                    <small>Sold by: <a href="#">Daily Electronics </a>( 4.5 out of 5 | 18,198 ratings)</small>
                </div> -->

                <!-- Order Details Start -->
                <div id="order-details" class="font-rale text-dark">
                
                    <table class="my-3">
                        <tr class="font-rale font-size-14">
                            <td><small>Deliver to Customer</td>
                            <td class="px-2"></td>
                            <td><small>424201</small></td>
                        </tr>
                        <tr class="font-rale font-size-14">
                            <td><small>Delivery by</small></td>
                            <td class="px-2"></td>
                            <td><small>Mar 29 - April 1</small></td>
                        </tr>
                        <tr class="font-rale font-size-14">
                            <td><small>Sold by</small></td>
                            <td class="px-2"></td>
                            <td><small><a href="#">Daily Electronics </a>( 4.5 out of 5 | 18,198 ratings)</small></td>
                        </tr>
                    </table>

                </div>
                <!-- Order Details End -->

                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-12">
                        <!-- Product Color Start -->
                        <div class="color my-3">
                            <div class="d-flex align-items-center">
                                <h6 class="font-bloo">Color</h6>
                                <div class="p-2 mx-2 color-yellow-bg rounded-circle"><button class="btn font-size-12"></button></div>
                                <div class="p-2 mx-2 color-primary-bg rounded-circle"><button class="btn font-size-12"></button></div>
                                <div class="p-2 mx-2 color-second-bg rounded-circle"><button class="btn font-size-12"></button></div>
                            </div>
                        </div>
                        <!-- Product Color End -->
                    </div>
                    <div class="col-lg-6 col-12">
                            <!-- Product Quantity Start -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Quantity</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-down border bg-light" data-id="product-main"><i class="fas fa-minus"></i></button>
                                <input type="text" class="qty-input border px-2 w-25 bg-light" data-id="product-main" disabled value="1" placeholder="1">
                                <button class="qty-up border bg-light" data-id="product-main"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <!-- Product Quantity End -->
                    </div>
                </div>

                <!-- RAM Start -->
                    <div class="size d-flex align-items-center my-3">
                        <h6 class="font-baloo pe-3">RAM</h6>
                        <div class="d-flex w-75">
                            <div class="font-rubik border p-2 me-2">
                                <button class="btn p-0 font-size 14">4GB</button>
                            </div>
                            <div class="font-rubik border p-2 me-2">
                                <button class="btn p-0 font-size 14">6GB</button>
                            </div>
                            <div class="font-rubik border p-2 me-2">
                                <button class="btn p-0 font-size 14">8GB</button>
                            </div>
                        </div>
                    </div>
                <!-- RAM End -->
                

                
                
            </div>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto a earum laborum ipsa pariatur nobis, perspiciatis perferendis quos praesentium nulla odit repudiandae dolor cupiditate officiis deleniti quo sapiente, reiciendis reprehenderit.</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto a earum laborum ipsa pariatur nobis, perspiciatis perferendis quos praesentium nulla odit repudiandae dolor cupiditate officiis deleniti quo sapiente, reiciendis reprehenderit.</p>
            </div>
        </div>
    </div>
</section>
<!-- Product Detail End  -->
<?php
    endif;
    endforeach; 
?>