 <footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                            <div class="news-desc text-center mb-30">
                                 <h3>Sign Up For Newsletters</h3>
                                 <p>Be the First to Know. Sign up for newsletter today</p>
                             </div>
                             <div class="newsletter-box">
                                 <form action="#">
                                      <input class="subscribe" placeholder="your email address" name="email" id="subscribe" type="text">
                                      <button type="submit" class="submit">subscribe!</button>
                                 </form>
                             </div>
                         </div>
                    </div> 
                    <!-- Signup-Newsletter End -->                   
                    <div class="row">
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Customer Service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="login.php">Sign In</a></li>
                                        <li><a href="forgot-password.php">Forgot Password</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Services</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="shop.php">Shopping</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>   
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
    
                        <!-- Single Footer Start -->
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Infomation</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                    <li></li>
                                        
                                        <li><i class="lnr lnr-map-marker"></i> Address: Cau Phu My, Quan 7.</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> mail Us: tien.nguyen.codeff@gmail.com </a></li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> mail Us: tien.nguyen.codeff@gmail.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Phone: (+84) 83 999 0271
                                        </li>
                                        <li><i class="bi bi-person-circle"></i><a href="about.php">About Us</a></li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <a href="#"><img class="img" src="img\payment\1.png" alt="payment-image"></a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">                    
                        <p>Copyright © 2018 <a target="_blank" href="#">Truemart</a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- jquery 3.2.1 -->
<script src="js\vendor\jquery-3.2.1.min.js"></script>
<!-- Countdown js -->
<script src="js\jquery.countdown.min.js"></script>
<!-- Mobile menu js -->
<script src="js\jquery.meanmenu.min.js"></script>
<!-- ScrollUp js -->
<script src="js\jquery.scrollUp.js"></script>
<!-- Nivo slider js -->
<script src="js\jquery.nivo.slider.js"></script>
<!-- Fancybox js -->
<script src="js\jquery.fancybox.min.js"></script>
<!-- Jquery nice select js -->
<script src="js\jquery.nice-select.min.js"></script>
<!-- Jquery ui price slider js -->
<script src="js\jquery-ui.min.js"></script>
<!-- Owl carousel -->
<script src="js\owl.carousel.min.js"></script>
<!-- Bootstrap popper js -->
<script src="js\popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js\bootstrap.min.js"></script>
<!-- Plugin js -->
<script src="js\plugins.js"></script>
<!-- Main activaion js -->
<script src="js\main.js"></script>
<!-- Main activaion js -->
<script src="./js/main.js"></script>

<script src="js\vendor\jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
            function set_Cart_cookies(id){
                //COOKIES NAME
                var c_name = "Cart="
                var data="";
                alert
                //COOKIES EXP
                var d = new Date();
                d.setTime(d.getTime() + (1*24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                //GET CURRENT COOKIES
                var x= document.cookie;
                if(x==""){
                        var temp = ("["+id+"_"+"1,]").toString();
                        document.cookie = c_name+temp+";"+expires;
                }else{
                        var array_temp =[];
                        var list_id_product=[];
                        var increase=0;
                        array_temp = x.split(';')[0].split('=')[1].replace('[','').replace(']','').split(',');
                        array_temp.pop();
                        for (let index = 0; index < array_temp.length; index++) {
                            list_id_product.push(array_temp[index].split('_')[0]);
                            if(array_temp[index].split('_')[0]==id){
                            var increase= parseInt(array_temp[index].split('_')[1])+1;
                                data+= id+'_'+increase+',';
                            }else{
                                data+= array_temp[index].split('_')[0]+'_'+array_temp[index].split('_')[1]+',';
                            }

                        }
                        if(!list_id_product.includes(id.toString())){
                            data+= id+'_1,';
                        }
                        

                        console.log(c_name + '['+data+"];"+expires);
                        document.cookie = c_name + '['+data+"];"+expires;
                        
                        
                        
                }

                load_cart(id);
                
                
                
            }
    </script>
    
    <!-- Main Wrapper End Here -->
    <script>
        function load_again(input_id){
            var tag =  '#'.concat(input_id);
            $(document).ready(function(){
                $(tag).click(function(e){
                    e.preventDefault();
                    $.ajax({
                    type:'POST',
                    url:'load_product.php',
                    data:{CateID:input_id},
                    success: function(response){
                        $('#grid-view').html(response);
                    }
                })
                })
            });
        }

    </script>

    <script>
        function load_cart(input_id){
            var tag =  '#P'.concat(input_id);
            
            $(document).ready(function(){
            $(tag).click(function(e){
                
                e.preventDefault();
                $.ajax({
                type:'POST',
                url: 'load_cart.php',
                data:{},
                success: function(response){
                    alert('aloz');
                    $('#cart_drop').html(response);
                }
            })
            })
            });
        }

    </script>
    

    

    <script src="https://www.paypal.com/sdk/js?client-id=AYwIxYfa7FuR17FJ6fuBvGt-m096IepDy5k0fHOKDLwIUYL38txXwudPawvjGNfMUgFxSthmG64UsEom"></script>
    
    <script>
        var items=[];
        productName= document.getElementsByClassName('productname')
        productQuantity = document.getElementsByClassName('productquantity')
        productPrice = document.getElementsByClassName('productprice')
        for(var i=0;i<productName.length;i++)
        {   
            items.push({
                name: productName[i].innerHTML,
                unit_amount: {value: parseFloat(productPrice[i].innerHTML).toFixed(2).toString(), currency_code: 'USD'},
                quantity: productQuantity[i].innerHTML,
                sku: 'haf001'
            });
            console.log(items);
        }
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $sum;?>,
                            currency_code: 'USD',
                            breakdown: {
                                item_total: {value: <?php echo $sum;?>, currency_code: 'USD'}
                            }
                        },
                        invoice_id: Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5),
                        items: items
                    }]
                });
            },
            onApprove: function(data, actions) {
                
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name).then(
                        <?php
                            
                            
                                // $cusid=$_COOKIE['User'];
                                
                                //     $data = $_COOKIE['Cart'];
                                //     $data = str_replace('[','',$data);
                                //     $data = str_replace(']','',$data);
                                //     $data = explode(',',$data);
                                //     $detail='';
                                //     foreach($data as $item){
                                //         $amount = explode('_',$item)[1];
                                //         $id = explode('_',$item)[0];
                                //         $product_detail = Product::get_product_detail($id);
                                //         foreach($product_detail as $prod){
                                //             $detail.=$prod['ProductName'];
                                //             $detail.='x';
                                //             $detail.=$amount;
                                //             $detail.='=';
                                //             $detail.=$gia_sale;
                                //             $detail.='_';
                                //         }
                                //     }
                                    
                                //     $note = $_POST['checkout-mess'];
                                //     $currentDateTime = date('Y-m-d H:i:s');
                                //     $new_order = new Order($currentDateTime,$cusid,'Paypal',$detail,$sum);
                                //     $result = $new_order->save();
                                //     if(!$result){
                                //         messagebox('Order failed.');
                                //     }else{
                                        
                                //         messagebox('Order success.');
                                //         echo '<script type="text/javascript">document.cookie = "Cart=[]; expires= d.setTime(d.getTime() +1 ).toUTCString()";</script>';
                                    
                                        
                    
                                //     }
                            ?>
                    );
                    
                });
            }
        }).render('#paypal-button-container');
    </script>

