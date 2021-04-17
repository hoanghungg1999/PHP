<?php
    require_once('./models/products.php');
    $id = substr($_POST['CateID'],-1);
    $kind = substr($_POST['CateID'],0,strlen($_POST['CateID'])-1);
    //echo $kind;
    if($kind=="B"){
        $prods = Product::list_product_byCate($id);
    }elseif($kind="T"){
        $prods = Product::list_product_byType($id);
    }
    
?>
<div class='row'>
    <?php
        foreach($prods as $item){
            $gia_sale = $item['Price']-$item['Price']*$item['Discount']/100;
            
            echo" 
                <div id='' class='col-lg-4 col-md-4 col-sm-6 col-6'>
                    <div id='single-product' class='single-product'>
                        <div class='pro-img'>
                            <a href='product.php?product_id=".$item['ProductID']."'>
                                <img class='primary-img'  style='width:250px;height:150px' src='".$item['Picture']."' alt='single-product'>
                                
                            </a>
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
                                    <a href='#' onclick='return set_Cart_cookies(".$item['ProductID'].")' title='Add to Cart'> + Add To Cart</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>";
                                            }

?>
                                        

</div>
        