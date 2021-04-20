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
        <!-- <div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div> -->
<!--content-->


<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Single</li>
			</ol>
		</div>
	</div>
<div class="single">

<div class="container">
<div class="col-md-9">
	<div class="col-md-5 grid">		
		<div class="flexslider">
            <div id="thumb1" class="tab-pane fade show active">
                <a data-fancybox="images" href="<?php echo $product_info->get_ProductPic() ?>"><img src="<?php echo $product_info->get_ProductPic() ?>" alt="product-view"></a>
            </div>

			  <!-- <ul class="slides">
			    <li data-thumb="images/si.jpg">
			        <div class="thumb-image"> <img src="images/si.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="images/si1.jpg">
			         <div class="thumb-image"> <img src="images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="images/si2.jpg">
			       <div class="thumb-image"> <img src="images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>  -->
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
						<div class="single-para simpleCart_shelfItem">
                        <h3 class="product-header"><?php echo $product_info->get_ProductName() ?></h3>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
							<div class="star-on">
								<ul>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
									<li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
								</ul>
								<div class="review">
									<a href="#"> 3 reviews </a>/
									<a href="#">  Write a review</a>
								</div>
							<div class="clearfix"> </div>
                            <p class="mb-20 pro-desc-details">Brand: <?php echo "$cate <span><img width='40' src='".$CategoryName."';" ?>/></span></p>
							</div>
							
								<label  class="add-to item_price"><?php echo $item["price"]; ?>$</label>
							
							<div class="available">
								<h6>Available Options :</h6>
								<ul>
									
								<li>Size:<select>
									<option>Large</option>
									<option>Medium</option>
									<option>small</option>
									<option>Large</option>
									<option>small</option>
								</select></li>
								<li>Cost:
										<select>
										<option>U.S.Dollar</option>
										<option>Euro</option>
									</select></li>
							</ul>
						</div>
                        <div class="box-quantity d-flex hot-product2">
                                    
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href='#' id='<?php echo $pro_id; ?>' onclick='return set_Cart_cookies(<?php echo $item["ProductID"]; ?>)' title="" data-original-title="Add to Cart"> Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
						</div>
					</div>
			<div class="clearfix"> </div>
			<div class="content-top1">
				<div class="col-md-4 col-md4">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.html">
							<img class="img-responsive" src="images/pi6.png" alt="" />
						</a>
						<h3><a href="single.html">Trouser</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
					</div>
				</div>	
			<div class="col-md-4 col-md4">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.html">
							<img class="img-responsive" src="images/pi7.png" alt="" />
						</a>
						<h3><a href="single.html">Jeans</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
						
					</div>
				</div>	
			<div class="col-md-4 col-md4">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="single.html">
							<img class="img-responsive" src="images/pi.png" alt="" />
						</a>
						<h3><a href="single.html">Palazoo</a></h3>
						<div class="price">
								<h5 class="item_price">$300</h5>
								<a href="#" class="item_add">Add To Cart</a>
								<div class="clearfix"> </div>
						</div>
						
					</div>
				</div>	
			
			<div class="clearfix"> </div>
			</div>		
</div>
<!----->
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

<!--//seller-->
<!--tag-->
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
        
        <!-- Footer Area Start Here -->
        <?php include_once('./footer.php') ?>
</body>

<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/responsiveslides.min.js"></script>
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
</html>

