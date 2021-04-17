<?php
    messagebox('load_cart');
    if(isset($_COOKIE['Cart'])) {
        messagebox('alo');
        $data = $_COOKIE['Cart'];
        $data = str_replace('[','',$data);
        $data = str_replace(']','',$data);
        $data = explode(',',$data);
        $sum = 0;
        ?>
        <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro"><?php echo count($data)-1; ?></span><span>cart</span></span></a>
            <ul class="ht-dropdown cart-box-width" id ="cart_cookies">
            <?php
            foreach($data as $item){
                $amount = explode('_',$item)[1];
                $id = explode('_',$item)[0];
                $product_detail = Product::get_product_detail($id);
                foreach($product_detail as $prod){
                    $gia_sale= ($prod['Price']-$prod['Price']*$prod['Discount']/100)*$amount;
                    $sum+=$gia_sale;
                    echo "<div class='single-cart-box'>
                    <div class='cart-img'>
                        <a href='product.php?product_id=".$prod['ProductID']."'><img src='".$prod['Picture']."' alt='cart-image'></a>
                        <span class='pro-quantity'>".$amount."</span>
                        </div>
                        <div>
                            <h6><a href='product.php?product_id=".$prod['ProductID']."'>".$prod['ProductName']."</a></h6>
                            <span >".$gia_sale." USD</span>
                        </div>
                        <a class='del-icone' href='#'><i class='ion-close'></i></a>
                    </div>";
                }
            }
            
        }
        ?>
        <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Total <span><?php echo $sum; ?> USD</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="login.php">Checkout</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>