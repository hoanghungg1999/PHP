<!DOCTYPE html>
<html lang="en">
    <?php
        include_once('./head.php');
    ?>
<body>
    <div class="wrapper">
           
        <?php
                require_once(__DIR__."/models/products.php");
                include_once('./header.php');
        ?>
        <!-- Categorie Menu & Slider Area Start Here -->
        <div class="main-page-banner pb-50 off-white-bg">
            <div class="container">
                <div class="row">
                    <!-- Vertical Menu Start Here -->
                    <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                        <div class="vertical-menu mb-all-30">
                            <nav>
                                <ul class="vertical-menu-list">
                                    <?php
                                        # Lấy Categỏy
                                        foreach($cates as $item){
                                            ?>
                                            <li class="has-sub"><a href="shop.php?category=<?php echo $item['CateID']; ?>" onclick="load_again('<?php echo $temp_id; ?>')" ><span><img width='40'  src="<?php echo $item['CategoryLogo']; ?>" alt='menu-icon'></span><?php echo $item['CategoryName']; ?></a></li>                   
                                    <?php
                                        }
                                    ?>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Vertical Menu End Here -->
                    <!-- Slider Area Start Here -->
                    <div class="col-xl-9 col-lg-8 slider_box">
                        <div class="slider-wrapper theme-default">
                            <!-- Slider Background  Image Start-->
                            <div id="slider" class="nivoSlider">
                                <a href="shop.php"><img src="img\slider\bmw.jpg" data-thumb="img/slider/bmw.jpg" alt="" title="#htmlcaption"></a>
                                <a href="shop.php"><img src="img\slider\ford.jpg" data-thumb="img/slider/ford.jpg" alt="" title="#htmlcaption2"></a>
                                <a href="shop.php"><img src="img\slider\porsche.jpg" data-thumb="img/slider/porsche.jpg" alt="" title="#htmlcaption2"></a>
                            </div>
                            <!-- Slider Background  Image Start-->
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Hot Deal Products Start Here -->

        <div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
            <div class="container">
                <!-- Product Title Start -->
                <div class="post-title pb-30">
                    <h2>hot deals discount up to 20% </h2>
                </div>

                <!---------- LẤY SẢN PHẨM TRONG DB CHỖ NẾU CÓ DISCOUNT -->
                <!-- Product Title End -->
                <!-- Hot Deal Product Activation Start -->
                <div class="hot-deal-active owl-carousel">
                
                    <?php
                        $saleProducts = Product::list_sale_product();       
                        foreach($saleProducts as $item){
                            $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
                            $pro_id= 'P';
                            $pro_id.=$item['ProductID'];
                            echo "
                            <div class='single-product'>
                                <div class='pro-img'>
                                    <a href='product.php?product_id=".$item['ProductID']."'>
                                        <img class='primary-img' style='width:300px;height:168px' src='".$item['Picture']."' alt='single-product'>
                                        
                                    </a>
                                    <div class='countdown' data-countdown='2021/04/30'></div>
                                    <a href='#' class='quick_view' data-toggle='modal' data-target='#myModal' title='Quick View'><i class='lnr lnr-magnifier'></i></a>
                                </div>
                                <div class='pro-content'>
                                    <div class='pro-info'>
                                        <h4><a href='product.php?product_id=".$item['ProductID']."'>".$item['ProductName']."</a></h4>
                                        <p><span class='price'>".$gia_sale." USD</span><del class='prev-price'>".$item['Price']." USD</del></p>
                                        <div class='label-product l_sale'>".$item['Discount']."<span class='symbol-percent'>%</span></div>
                                    </div>
                                    <div class='pro-actions'>
                                        <div class='actions-primary'>
                                            <a href='' id='".$pro_id."' onclick='set_Cart_cookies(".$item['ProductID'].")' title='Add to Cart'> + Add To Cart</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
                </div>

            </div>
            <!-- Container End -->
        </div>
        <!-- Arrivals Products Area Start Here -->
        <div class="arrivals-product pb-85 pb-sm-45">
            <div class="container">
                <div class="main-product-tab-area">
                    <div class="tab-menu mb-25">
                        <div class="section-ttitle">
                            <h2>Our Arrival Product  </h2>
                        </div>

                    </div> 

                    <!-- Tab Contetn Start -->
                    <div id="tab_content" class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-lg-5 order-2 order-lg-1">
                                    <div class="banner-site-box mt-10">
                                        <div class="col-img">
                                            <a href="shop.php"><img src="https://img.pikbest.com/01/56/23/pIkbEsT0apIkbEsTekf.jpg-1.jpg!bw700" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 order-1 order-lg-2">
                                    <!-- Arrivals Product Activation Start Here -->
                                    <div class="electronics-pro-active2 owl-carousel">
                                         <?php
                                            $prods = Product::list_product_limit();
                                            for($i=1 ; $i<count($prods);$i++){
                                                if($i%2==0){
                                                    $gia_sale1 = $prods[$i-2]['Price']-$prods[$i-2]['Price']*$prods[$i-2]['Discount']/100;
                                                    $pro_id1= 'P';
                                                    $pro_id1.=$prods[$i-2]['ProductID'];

                                                    $pro_id2= 'P';
                                                    $pro_id2.=$prods[$i-1]['ProductID'];
                                                    $gia_sale2 = $prods[$i-1]['Price']-$prods[$i-1]['Price']*$prods[$i-1]['Discount']/100;
                                                    
                                                    echo "
                                                        <div class='double-product'>
                                                            <div class='single-product'>
                                                                <div class='pro-img'>
                                                                    <a href='product.php?product_id=".$prods[$i-2]['ProductID']."'>
                                                                        <img class='primary-im' style='width:200px;height:115px' src='".$prods[$i-2]['Picture']."' alt='single-product'>
                                                                    </a>
                                                                </div>
                                                                <div class='pro-content'>
                                                                    <div class='pro-info'>
                                                                        <h4><a href='product.php?product_id=".$prods[$i-2]['ProductID']."'>".$prods[$i-2]['ProductName']."</a></h4>
                                                                        <p><span class='price'>".$gia_sale1." USD </span><del class='prev-price'>".$prods[$i-2]['Price']." USD</del></p>
                                                                        <div class='label-product l_sale'>".$prods[$i-2]['Discount']."<span class='symbol-percent'>%</span></div>
                                                                    </div>
                                                                    <div class='pro-actions'>
                                                                        <div class='actions-primary'>
                                                                            <a href='' id='".$pro_id1."' onclick='set_Cart_cookies(".$prods[$i-2]['ProductID'].")' title='Add to Cart'> + Add To Cart</a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <span class='sticker-new'>new</span>
                                                            </div>
                                                    
                                                            <div class='single-product'>
                                                                <div class='pro-img'>
                                                                    <a href='product.php?product_id=".$prods[$i-1]['ProductID']."'>
                                                                        <img class='primary-im' style='width:200px;height:115px' src='".$prods[$i-1]['Picture']."' alt='single-product'>
                                                                    </a>
                                                                </div>
                                                                <div class='pro-content'>
                                                                    <div class='pro-info'>
                                                                        <h4><a href='product.php?product_id=".$prods[$i-1]['ProductID']."'>".$prods[$i-1]['ProductName']."</a></h4>
                                                                        <p><span class='price'>".$gia_sale2." USD</span><del class='prev-price'>".$prods[$i-1]['Price']." USD</del></p>
                                                                        <div class='label-product l_sale'>".$prods[$i-1]['Discount']."<span class='symbol-percent'>%</span></div>
                                                                    </div>
                                                                    <div class='pro-actions'>
                                                                        <div class='actions-primary'>
                                                                            <a href='#' id='".$pro_id2."' onclick='set_Cart_cookies(".$prods[$i-1]['ProductID'].")' title='Add to Cart'> + Add To Cart</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class='sticker-new'>new</span>
                                                            </div>
                                                        </div>
                                                    ";

                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content End -->
                </div>
                <!-- main-product-tab-area-->
            </div>
            <!-- Container End -->
        </div>
        <!-- Arrivals Products Area End Here -->
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
    </div>

    <?php
        include_once('./footer.php');
        ?>
    
    
</body>


</html>