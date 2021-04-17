<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php
        include_once('./head.php');
    ?>
</head>

<body>
    
    <div class="wrapper">
       <!-- Banner Popup Start -->
        <?php
            include_once('./header.php');
        ?>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="cart.php">Cart</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Cart Main Area Start -->
        <div class="cart-main-area ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <!-- Form Start -->
                        <form action="#">
                            <!-- Table Content Start -->
                            <div class="table-content table-responsive mb-45">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['remove'])){
                                                $rm_id = $_GET['remove'];
                                               
                                                $data = $_COOKIE['Cart'];
                                                echo $data;
                                                $data = str_replace('[','',$data);
                                                $data = str_replace(']','',$data);
                                                $data = explode(',',$data);
                                                $new_data="";
                                                foreach($data as $item){
                                                    $amount = explode('_',$item)[1];
                                                    $id = explode('_',$item)[0];
                                                    if($id!=""){
                                                        if($id!=$rm_id){
                                                            $new_data.= $id;
                                                            $new_data.= '_';
                                                            $new_data.= $amount;
                                                            $new_data.= ',';
    
                                                        }
                                                    }
                                                    
                                                   
                                                }
                                                $new_ck = '[';
                                                $new_ck .= $new_data;
                                                $new_ck .= ']';
                                                
                                                setcookie('Cart',$new_ck);
                                                echo "<script type='text/javascript'>document.cookie = 'Cart=".$new_ck."; expires= d.setTime(d.getTime() + (7*24*60*60*1000) ).toUTCString()';</script>";
                                            }
                                            if(isset($_COOKIE['Cart'])) {
                                                $data = $_COOKIE['Cart'];
                                                $data = str_replace('[','',$data);
                                                $data = str_replace(']','',$data);
                                                $data = explode(',',$data);
                                                $sum = 0;
                                                
                                                $detail='';
                                                foreach($data as $item){
                                                    $amount = explode('_',$item)[1];
                                                    $id = explode('_',$item)[0];
                                                    $product_detail = Product::get_product_detail($id);
                                                    foreach($product_detail as $prod){
                                                        
                                                        $gia_sale_temp = ($prod['Price']-$prod['Price']*$prod['Discount']/100)*$amount;
                                                        $gia_sale = ($prod['Price']-$prod['Price']*$prod['Discount']/100);
                                                        $sum+=$gia_sale_temp;
                                                        
                                                        
                                                        echo "

                                                        <tr>
                                                        <td class='product-thumbnail'>
                                                            <a href='#'><img src='".$prod['Picture']."' alt='cart-image'></a>
                                                        </td>
                                                        <td class='product-name'><a href='#'>".$prod['ProductName']."</a></td>
                                                        <td class='product-price'><span class='amount'>".$gia_sale." USD</span></td>
                                                        <td class='product-quantity'><span >".$amount." </span></td>
                                                        <td class='product-subtotal'>".$gia_sale_temp*$amount." USD</td>
                                                        <td class='product-remove'> <a href='?remove=".$prod['ProductID']."'><i class='fa fa-times' aria-hidden='true'></i></a></td>
                                                        
                                                        ";
                                                        
                                                            }
                                                        }
                                                    }
                                            $order_detail.=$detail;
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Content Start -->
                            <div class="row">
                               <!-- Cart Button Start -->
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart">
                                        <a href="./shop.php">Continue Shopping</a>
                                    </div>
                                </div>
                                <!-- Cart Button Start -->
                                <!-- Cart Totals Start -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="cart_totals float-md-right text-md-right">
                                        <h2>Cart Totals</h2>
                                        <br>
                                        <table class="float-md-right">
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount"><?php echo $sum; ?> USD</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="./login.php">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Totals End -->
                            </div>
                            <!-- Row End -->
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
                 <!-- Row End -->
            </div>
        </div>
        <!-- Cart Main Area End -->
        <!-- Support Area Start Here -->
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>We guarantee our price is good for you.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Time Saving</h6>
                            <span>We bring you important infomation you interest for saving yout precious time.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe & Warranty</h6>
                            <span>We guarantee your automobile always in The best condition.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>With over 30 years on car business we is your best choice.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Support you any time.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php 
        include_once('./footer.php');
    ?>
        <!-- Quick View Content End -->
    </div>
</body>

</html>