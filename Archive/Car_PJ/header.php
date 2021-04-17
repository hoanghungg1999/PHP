
    <?php
        require_once('./models/categories.php');
        require_once('./models/products.php');
        require_once('./models/type.php');
        require_once('./models/login_class.php');
        function messagebox($message) {
            echo "<script>alert('$message');</script>";
        }

        if(isset($_POST['btnSearch'])){
            $input_data =  $_POST['search'];
            $cate =  $_POST['categorySearch'];
            header("Location: ./shop.php?keyword=".$input_data."_".$cate."");
            
        }
    ?>
    

    
        <header>
            <!-- Header Middle Start Here -->
            <div class="header-middle ptb-15">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="index.php">
                                    <img src="img\logo\car_logo.png" width='200' height='125' alt="logo-image">
                                </a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="categorySearch">
                                            <option value="0">All categories</option>
                                            <?php
                                                $cates = Category::list_category();
                                                foreach($cates as $item){
                                                    echo "<img width='40'src='".$item['CategoryLogo']."' alt='menu-icon'><option value='".$item['CateID']."'>".$item['CategoryName']."</option>";                        
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="text" name="search" placeholder="You're looking for...">
                                    <button id='btn_SEARCH' name="btnSearch"><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul id='cart_drop' class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    
                                            <li>
                                                <?php
                                                    if(isset($_GET['remove'])){
                                                        $rm_id = $_GET['remove'];
                                                       
                                                        $data = $_COOKIE['Cart'];
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
                                                        echo "<script type='text/javascript'>document.cookie = 'Cart=".$new_ck."; expires= d.setTime(d.getTime() + (7*24*60*60*1000) ).toUTCString()';</script>";
                                                    }

                                                    if(isset($_COOKIE['Cart'])) {
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
                                                                    <div >
                                                                        <h6>
                                                                            <a href='product.php?product_id=".$prod['ProductID']."'>".$prod['ProductName']."</a>
                                                                        </h6>
                                                                        <span >".$gia_sale." USD</span>
                                                                    </div>
                                                                    <a class='del-icone' href='?remove=".$prod['ProductID']."'><i class='ion-close'></i></a>
                                                                </div>";
                                                            }
                                                        }
                                                    }else{
                                                        ?>
                                                    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">0</span><span>cart</span></span></a>
                                                    <ul class="ht-dropdown cart-box-width" id ="cart_cookies">
                                                <?php    
                                                    }
                                                ?>
                                                <!-- Cart Box End -->
                                                <!-- Cart Footer Inner Start -->
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
                                        </ul>
                                    </li>
                                    <?php
                                        if(isset($_GET['logout'])){
                                            $temp ='';
                                            echo "<script type='text/javascript'>document.cookie = 'User=".$temp."; expires= d.setTime(d.getTime() + 1 ).toUTCString()';</script>";
                                            header('Location: ./index.php');
                                        }
                                        ?>
                                    <?php
                                        if(isset($_COOKIE['User']) and $_COOKIE['User']!='') {
                                            $data = $_COOKIE['User'];
                                            $result = Admin_Login::get_admin_info($data);
                                            foreach($result as $info){

                                                $href= "";
                                                if($info['Level']!=0){
                                                    $href = "SB_Admin/dashboard.php?id=".$info['ID']."";
                                                }else{
                                                    $href="login.php";
                                                }
                                            
                                            ?>
                                            <li><a href=<?php echo $href;?>><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Welcome back</strong> </span><span><?php echo $info['HoTen']; ?></span></span></a>
                                            <li><a href="?logout=0"><i class="fa-sign-out"></i><span class="my-cart"><span> <strong>Logout</strong> </span></a>
                                    
                                    <?php
                                        }
                                        }else{
                                            ?>
                                            <li><a href="login.php"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Sign in</strong> Or</span><span> Join Our Site</span></span></a>
                                            <?php

                                        }
                                        
                                    ?>


                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
                <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                         <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                            <span class="categorie-title">Shop by Categories</span>
                        </div>                       
                        <div class="col-xl-9 col-lg-8 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li><a href="shop.php">shop<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="cart.php">cart</a></li>
                                            <li><a href="checkout.php">checkout</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                                        <!-- Home Version Dropdown Start -->
                                        <ul class="ht-dropdown dropdown-style-two">
                                            <li><a href="contact.php">contact us</a></li>
                                            <li><a href="register.php">register</a></li>
                                            <li><a href="login.php">sign in</a></li>
                                            <li><a href="forgot-password.php">forgot password</a></li>
                                        </ul>
                                        <!-- Home Version Dropdown End -->
                                    </li>
                                    <li><a href="about.php">About us</a></li>
                                    <li><a href="contact.php">contact us</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="shop.php">shop</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="product.php">product details</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="single-blog.html">blog details</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="#">pages</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="register.php">register</a></li>
                                                <li><a href="login.php">sign in</a></li>
                                                <li><a href="forgot-password.php">forgot password</a></li>
                                                
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="about.php">about us</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">Shop by Categories</span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                <?php
                                        foreach($cates as $item){
                                            echo "<li class='has-sub'><a href='#' ><span><img width='40'src='".$item['CategoryLogo']."' alt='menu-icon'></span>".$item['CategoryName']."</a></li>";                        
                                        }
                                ?>
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
    