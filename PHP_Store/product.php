<!doctype html>
<html class="no-js" lang="zxx">

<?php
include_once('./head.php');
?>

<body>
    
    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
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
        <?php
        include_once('./header.php');
        require_once('./models/products.php');
        require_once('./models/type.php');
        
        if (isset($_GET["product_id"])) {
            $id = $_GET["product_id"];
            $result = Product::get_product_detail($id);

            foreach ($result as $item) {
                $pro_id = 'P';
                $pro_id .= $item['ProductID'];
                $gia_sale = $item['Price'] - $item['Price'] * $item['Discount'] / 100;

                $product_info = new Product($item['ProductName'], $item['CateID'], $item['TypeID'], $item['Price'], $item['Quantity'], $item['Description'], $item['Picture'], $item['Discount']);
            }
            $types = Type::get_type($product_info->get_ProductType());
            foreach ($types as $temp) {
                $type = $temp['TypeName'];
            }
            $cates2 = Category::get_category($product_info->get_ProductCate());
            foreach ($cates2 as $temp2) {
                $cate = $temp2['CategoryName'];
                $cate_logo = $temp2['CategoryLogo'];
            }
        } else {
            //NOT DOUND 404
        }
        ?>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Breadcrumb Start -->
        <!-- <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>

                        <li class="active"><a href="product.php">Products</a></li>
                    </ul>
                </div>
            </div> -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Products</li>
            </ol>
        </div>
    </div>
    <!--content-->
    <div class="products">
        <div class="container">
            <h2>Products</h2>
            <div class="col-md-9">
                <?php
                foreach ($prods as $item) {
                    $gia_sale = $item['Price'] - $item['Price'] * $item['Discount'] / 100;
                    $pro_id = 'P';
                    $pro_id .= $item['ProductID'];
                    echo " 
                     <div id='' class='col-lg-4 col-md-4 col-sm-6 col-6'>
                        <div  class='single-product'>
                         <div class='pro-img'>
                       <a href='single.php?product_id=" . $item['ProductID'] . "'>
                        <img class='primary-img' style='width:250px;height:150px' src='" . $item['Picture'] . "' alt='single-product'>
                      </a>
                                                                
                     </div>
                     <div class='pro-content'>
                    <div class='pro-info'>
                    <h4><a href='single.php?product_id=" . $item['ProductID'] . "'>" . $item['ProductName'] . "</a></h4>
                 <p><span class='price-in1'>" . $gia_sale . " USD</span></p>
                
                 </div>
                 <div class='pro-actions'>
                 <div class='actions-primary'>
                  <a id='" . $pro_id . "' onclick='set_Cart_cookies(" . $item['ProductID'] . ")' href='#'  title='Add to Cart' > Add To Cart</a>
                       </div>
                    </div>
                    </div>
                <!-- Product Content End -->
                </div>
                </div>";
                }
                ?>

            </div>
            <div class="col-md-3 product-bottom">
                <!--categories-->
                <div class=" rsidebar span_1_of_left">
                    <h3 class="cate">Categories</h3>
                    <ul class="menu-drop">
                        <?php
                        $cates = Category::list_category();
                        foreach ($cates as $item) {
                            $temp_id = 'B' . strval($item['CateID']);
                        ?>

                            <li class="category-sub"><a id="<?php echo $temp_id; ?>" href="product.php?category=<?php echo $item['CateID']; ?>" onclick="load_again('<?php echo $temp_id; ?>')"><?php echo $item['CategoryName']; ?></a></li>

                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!--initiate accordion-->
                <script type="text/javascript">
                    $(function() {
                        var menu_ul = $('.menu-drop > li > ul'),
                            menu_a = $('.menu-drop > li > a');
                        menu_ul.hide();
                        menu_a.click(function(e) {
                            e.preventDefault();
                            if (!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true, true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true, true).slideUp('normal');
                            }
                        });

                    });
                </script>
                <!--//menu-->
                <!--seller-->
                <div class="product-bottom">
                    <h3 class="cate">Best Sellers</h3>
                    <div class="side-product-active owl-carousel">
                        <div class="side-pro-item">
                            <?php
                            $new_products = Product::new_arrival_list();
                            foreach ($new_products as $item) {
                                $gia_sale = $item['Price'] - $item['Price'] * $item['Discount'] / 100;

                                echo "<div class='single-product single-product-sidebar'>
                            <div class='pro-img'><a href='single.php?product_id=" . $item['ProductID'] . "'>
                            <img class='img-responsive' src='" . $item['Picture'] . "' alt=''>
                            <span class='discription'>" . $item['Description'] . "</span>
                            </a></div>
                            <div class='fashion-grid1'>
                                <h4 class ='best2'>
                                <a href='single.php?product_id=" . $item['ProductID'] . "'></a>
                                
                                </h4>
                            <p><span class='price-in1'>" . $gia_sale . " USD</span></p></div></div>";
                            }
                            ?>
                        </div>


                    </div>

                </div>


            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>

    <!-- Footer Area Start Here -->
    <?php include_once('./footer.php') ?>
</body>

</html>

<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function() {
        $("#slider").responsiveSlides({
            auto: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>