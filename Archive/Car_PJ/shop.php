<!doctype html>
<html class="no-js" lang="zxx">

<?php
    include_once('./head.php');
?>

<body>
    <div class="wrapper">
        <!-- Main Header Area Start Here -->
        <?php
            include_once('./header.php');
            require_once('./models/products.php');
            if(isset($_GET['category'])){
                $get_id = $_GET['category'];
                $prods = Product::list_product_byCateID($get_id);
            }else{
                $prods = Product::list_product();
            }
        ?>
        <?php
            if(isset($_GET['keyword'])){
                $data = $_GET['keyword'];
                $search_input = explode('_',$data)[0];
                $category = explode('_',$data)[1];
                if($category!=0){
                    $prods = Product::list_productSearchWithCategory($search_input,$category);
                }else{
                    $prods = Product::list_productSearchWithInputOnly($search_input);
                }
            }

        ?>
        
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Shop</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <div class="main-shop-page pt-100 pb-100 ptb-sm-60">
            <div class="container">
                <!-- Row End -->
                <div class="row">
                    <!-- Sidebar Shopping Option Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="sidebar">
                            <!-- Sidebar Electronics Categorie Start -->
                            <div class="electronics mb-40">
                                <h3 class="sidebar-title">Brands</h3>
                                <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                    <ul>
                                        <?php
                                            $cates = Category::list_category();
                                            foreach($cates as $item){
                                                $temp_id = 'B'.strval($item['CateID']);
                                                ?>
                                                
                                                <li class="category-sub"><a id="<?php echo $temp_id;?>" href="shop.php#category=<?php echo $item['CateID']; ?>"  onclick="load_again('<?php echo $temp_id; ?>')" ><img width="40" src="<?php echo $item['CategoryLogo']; ?>" alt="menu-icon"><?php echo $item['CategoryName']; ?></a></li>
                                            
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <!-- category-menu-end -->
                            </div>
                            
                            <!-- Sidebar Categorie Start -->
                            <div class="electronics mb-40">
                                <h3 class="sidebar-title">Type</h3>
                                <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                    <ul>
                                        <?php
                                            $types = Type::list_type();
                                            foreach($types as $item){
                                                $type_id = 'T'.strval($item['TypeID']);
                                                ?>
                                                <li class="nav-item"><a id="<?php echo $type_id;?>" onclick="load_again('<?php echo $type_id; ?>')" class="nav-link active" href="shop.php#type=<?php echo $item['TypeID']; ?>"><?php echo $item['TypeName']?></a></li>
                                            
                                        <?php    
                                            }
                                        ?>
                                    </ul>
                                </div>
                                <!-- category-menu-end -->
                            </div>
                            
                            
                            <!-- Product Top Start -->
                            <div class="top-new mb-40">
                                <h3 class="sidebar-title">New Arrival</h3>
                                <div class="side-product-active owl-carousel">
                                    <!-- Side Item Start -->
                                    <div class="side-pro-item">
                                        <!-- Single Product Start -->
                                        <?php
                                            $new_products = Product::new_arrival_list();
                                            foreach($new_products as $item){
                                                $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
                                               
                                                echo "<div class='single-product single-product-sidebar'><div class='pro-img'><a href='product.php?product_id=".$item['ProductID']."'><img class='primary-img' src='".$item['Picture']."' alt='single-product'></a></div><div class='pro-content'><h4><a href='product.php?product_id=".$item['ProductID']."'>".$item['ProductName']."</a></h4><p><span class='price'>".$gia_sale." USD</span><del class='prev-price'>".$item['Price']." USD</del></p></div></div>";
                                            }
                                        ?>
                                        <!-- Single Product End -->                                        
                                    </div>
                                    <!-- Side Item End -->
                                </div>
                            </div>
                            <!-- Product Top End -->                            
                            <!-- Single Banner Start -->
                            <div class="col-img">
                                <a href="shop.php"><img src="https://img.pikbest.com/01/56/23/pIkbEsT0apIkbEsTekf.jpg-1.jpg!bw700" alt="slider-banner"></a>
                            </div>
                            <!-- Single Banner End -->
                        </div>
                    </div>
                    <!-- Sidebar Shopping Option End -->
                    <!-- Product Categorie List Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- Grid & List View Start -->
                        <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                            <div class="grid-list-view  mb-sm-15">
                                <ul class="nav tabs-area d-flex align-items-center">
                                    <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th">Our products</i></a></li>
                                </ul>
                            </div>
                            <!-- Toolbar Short Area Start -->
                            
                            <!-- Toolbar Short Area End -->
                        </div>
                        <!-- Grid  View End -->
                        <div class="main-categorie mb-all-40">
                            <!-- Grid Main Area End -->
                            <div class="tab-content fix">
                                <div id="grid-view" class="tab-pane fade show active">
                                    <div class="row">
                                        <?php
                                            foreach($prods as $item){
                                                $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
                                                $pro_id= 'P';
                                                $pro_id.=$item['ProductID'];
                                                echo" 
                                                    <div id='' class='col-lg-4 col-md-4 col-sm-6 col-6'>
                                                        <div  class='single-product'>
                                                            <div class='pro-img'>
                                                                <a href='product.php?product_id=".$item['ProductID']."'>
                                                                    <img class='primary-img' style='width:250px;height:150px' src='".$item['Picture']."' alt='single-product'>
                                                                </a>
                                                                
                                                            </div>
                                                            <div class='pro-content'>
                                                                <div class='pro-info'>
                                                                    <h4><a href='product.php?product_id=".$item['ProductID']."'>".$item['ProductName']."</a></h4>
                                                                    <p><span class='price'>".$gia_sale." USD</span><del class='prev-price'>".$item['Price']." usd</del></p>
                                                                    <div class='label-product l_sale'>".$item['Discount']."<span class='symbol-percent'>%</span></div>
                                                                </div>
                                                                <div class='pro-actions'>
                                                                    <div class='actions-primary'>
                                                                        <a id='".$pro_id."' onclick='set_Cart_cookies(".$item['ProductID'].")' href='#'  title='Add to Cart'> + Add To Cart</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Product Content End -->
                                                        </div>
                                                    </div>";
                                            }
                                        ?>
                                        
                                    </div>
                                    <!-- Row End -->
                                </div>
                                <!-- #grid view End -->
                                
                                <!-- #list view End -->
                                <div class="pro-pagination">
                                    <ul class="blog-pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>                                    
                                    <div class="product-pagination">
                                        <span class="grid-item-list">Showing 1 to 12 of 51 (5 Pages)</span>
                                    </div>
                                </div>
                                <!-- Product Pagination Info -->
                            </div>
                            <!-- Grid & List Main Area End -->
                        </div>
                    </div>
                    <!-- product Categorie List End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Shop Page End -->
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
    

    <!-- jquery 3.2.1 -->
    
</body>

</html>