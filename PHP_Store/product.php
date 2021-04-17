<!doctype html>
<html class="no-js" lang="zxx">

<?php
    include_once('./head.php');
?>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <?php
            include_once('./header.php');
            require_once('./models/products.php');
            require_once('./models/type.php');
            
            if (isset($_GET["product_id"])) {
                $id = $_GET["product_id"];
                $result = Product::get_product_detail($id);
                
                foreach($result as $item){
                    $pro_id= 'P';
                    $pro_id.=$item['ProductID'];
                    $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
                    
                    $product_info = new Product($item['ProductName'],$item['CateID'],$item['TypeID'],$item['Price'],$item['Quantity'],$item['Description'],$item['Picture'],$item['Discount']);
                }
                $types = Type::get_type($product_info->get_ProductType());
                foreach($types as $temp){
                    $type=$temp['TypeName'];
                }
                $cates2 = Category::get_category($product_info->get_ProductCate());
                foreach($cates2 as $temp2){
                    $cate=$temp2['CategoryName'];
                    $cate_logo = $temp2['CategoryLogo'];
                }
            }else{
                //NOT DOUND 404
            }
        ?>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li class="active"><a href="product.php">Products</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Product Thumbnail Start -->
        <div class="main-product-thumbnail ptb-100 ptb-sm-60">
            <div class="container">
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        <div class="col-lg-5 mb-all-40">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content">
                                <div id="thumb1" class="tab-pane fade show active">
                                    <a data-fancybox="images" href="<?php echo $product_info->get_ProductPic() ?>"><img src="<?php echo $product_info->get_ProductPic() ?>" alt="product-view"></a>
                                </div>
                                
                            </div>
                            <!-- Thumbnail Large Image End -->
                           
                            <!-- Thumbnail image end -->
                        </div>
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                                <h3 class="product-header"><?php echo $product_info->get_ProductName() ?></h3>
                                <div class="rating-summary fix mtb-10">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="rating-feedback">
                                        <a href="#">(1 review)</a>
                                        <a href="#">add to your review</a>
                                    </div>
                                </div>
                                <div class="pro-price mtb-30">
                                    <p class="d-flex align-items-center"><span class="prev-price"><?php echo $item['Price']; ?> USD</span><span class="price"><?php echo $gia_sale; ?> USD</span><span class="saving-price">save <?php echo $product_info->get_ProductDiscount() ?>%</span></p>
                                </div>
                                <p class="mb-20 pro-desc-details">Brand: <?php echo "$cate <span><img width='40' src='".$cate_logo."';" ?>/></span></p>
                                <p class="mb-20 pro-desc-details">Type: <?php echo $type; ?></p>
                                
                                
                                <div class="box-quantity d-flex hot-product2">
                                    
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href='#' id='<?php echo $pro_id; ?>' onclick='return set_Cart_cookies(<?php echo $item["ProductID"]; ?>)' title="" data-original-title="Add to Cart"> + Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-ref mt-20">
                                    <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                                </div>
                               
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail End -->
        <!-- Product Thumbnail Description Start -->
        <div class="thumnail-desc pb-100 pb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#dtail">Product Details</a></li>
                            <li><a data-toggle="tab" href="#review">Reviews</a></li>
                        </ul>
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content border-default">
                            <div id="dtail" class="tab-pane fade show active">
                                <p><?php echo $product_info->get_ProducDesc() ?></p>
                            </div>
                            <div id="review" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div id="fb-root">

                                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                                </div>
                                

                                <!-- Reviews End -->
                            </div>
                        </div>
                        <!-- Product Thumbnail Tab Content End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail Description End -->
        <!-- Realted Products Start Here -->
        <div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
            <div class="container">
               <!-- Product Title Start -->
               <div class="post-title pb-30">
                   <h2>Realted Products</h2>
               </div>
               
               <!-- Product Title End -->
                <!-- Hot Deal Product Activation Start -->
                <div class="hot-deal-active owl-carousel">
                <?php
                        $saleProducts = Product::list_related_product_by_type($product_info->get_ProductType());       
                        foreach($saleProducts as $item){
                            $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
                            
                            echo "
                            <div class='single-product'>
                                <div class='pro-img'>
                                    <a href='product.html'>
                                        <img class='primary-img' src='".$item['Picture']."' alt='single-product'>
                                        <img class='secondary-img' src='".$item['Picture']."' alt='single-product'>
                                    </a>
                                    <div class='countdown' data-countdown='2021/04/01'></div>
                                    <a href='#' class='quick_view' data-toggle='modal' data-target='#myModal' title='Quick View'><i class='lnr lnr-magnifier'></i></a>
                                </div>
                                <div class='pro-content'>
                                    <div class='pro-info'>
                                        <h4><a href='product.html'>".$item['ProductName']."</a></h4>
                                        <p><span class='price'>".$gia_sale." USD</span><del class='prev-price'>".$item['Price']." USD</del></p>
                                        <div class='label-product l_sale'>".$item['Discount']."<span class='symbol-percent'>%</span></div>
                                    </div>
                                    <div class='pro-actions'>
                                        <div class='actions-primary'>
                                            <a href='cart.html' title='Add to Cart'> + Add To Cart</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            ";
                           
                        }
                    ?>
                </div>                
                <!-- Hot Deal Product Active End -->

            </div>
            <!-- Container End -->
        </div>
        <!-- Realated Products End Here -->
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
        
        <!-- Footer Area Start Here -->
        <?php include_once('./footer.php') ?>
</body>

</html>