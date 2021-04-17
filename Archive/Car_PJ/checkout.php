<!doctype html>
<html class="no-js" lang="zxx">
<?php
    include_once('./head.php');
?>

<body>
    <div class="wrapper">
        <?php
            include_once('./header.php');
            require_once('./models/orderdetail.php');
            if(isset($_COOKIE['User'])){
                $cusid=$_COOKIE['User'];
                if(isset($_POST['btn_cod'])){
                    $data = $_COOKIE['Cart'];
                    $data = str_replace('[','',$data);
                    $data = str_replace(']','',$data);
                    $data = explode(',',$data);
                    $detail='';
                    foreach($data as $item){
                        $amount = explode('_',$item)[1];
                        $id = explode('_',$item)[0];
                        $product_detail = Product::get_product_detail($id);
                        foreach($product_detail as $prod){
                            $detail.=$prod['ProductName'];
                            $detail.='x';
                            $detail.=$amount;
                            $detail.='=';
                            $detail.=$gia_sale;
                            $detail.='_';
                        }
                    }
                    
                    $note = $_POST['checkout-mess'];
                    $currentDateTime = date('Y-m-d H:i:s');
                    $new_order = new Order($currentDateTime,$cusid,$note,$detail,$sum);
                    $result = $new_order->save();
                    if(!$result){
                        messagebox('Order failed.');
                    }else{
                        
                        messagebox('Order success.');
                        echo '<script type="text/javascript">document.cookie = "Cart=[]; expires= d.setTime(d.getTime() +1 ).toUTCString()";</script>';
                       
                        
    
                    }
                }
            }else{

                header('Location: ./login.php');
            }
            
        ?>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-100 pt-15 pb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form mb-sm-40">
                            <h3>Billing Details</h3>
                            <form action="#" method="post">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" name="checkout-mess" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </>
                            </form>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-name"> Amount</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_COOKIE['Cart'])) {
                                                $data = $_COOKIE['Cart'];
                                                $data = str_replace('[','',$data);
                                                $data = str_replace(']','',$data);
                                                $data = explode(',',$data);
                                                $sum = 0;
                                                
                                                foreach($data as $item){
                                                    $amount = explode('_',$item)[1];
                                                    $id = explode('_',$item)[0];
                                                    $product_detail = Product::get_product_detail($id);
                                                    foreach($product_detail as $prod){
                                                        
                                                        
                                                        $gia_sale = ($prod['Price']-$prod['Price']*$prod['Discount']/100)*$amount;
                                                        $sum+=$gia_sale;
            

                                                        echo "
                                                            <tr>
                                                                <td class='productname'>".$prod['ProductName']."</td>
                                                                <td class='productquantity'>".$amount."</td>
                                                                <td >
                                                                    <span class='productprice'>".$gia_sale." USD</span>
                                                                </td>
                                                            </tr>
                                                        ";
                                                        
                                                            }
                                                        }
                                                    }
                                            $order_detail.=$detail;
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <th></th>
                                            <td><span class="total amount"><?php echo $sum;?> USD</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <form action="" method="post">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h5 class="mb-0">
                                                <input type="submit" value="Cash On Delivery" name='btn_cod' aria-expanded="true" class="btn btn-link">
                                            </h5>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-header" id="headingthree">
                                            <h5 class="mb-0">
                                                <div id="paypal-button-container"></div>
                                            </h5>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
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
        <!-- Footer Area End Here -->
        
        <!-- Quick View Content End -->
    </div>
</body>

</html>