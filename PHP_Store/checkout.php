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
        if (isset($_COOKIE['User'])) {
            $cusid = $_COOKIE['User'];
            if (isset($_POST['btn_cod'])) {
                $data = $_COOKIE['Cart'];
                $data = str_replace('[', '', $data);
                $data = str_replace(']', '', $data);
                $data = explode(',', $data);
                $detail = '';
                foreach ($data as $item) {
                    $amount = explode('_', $item)[1];
                    $id = explode('_', $item)[0];
                    $product_detail = Product::get_product_detail($id);
                    foreach ($product_detail as $prod) {
                        $detail .= $prod['ProductName'];
                        $detail .= 'x';
                        $detail .= $amount;
                        $detail .= '=';
                        $detail .= $gia_sale;
                        $detail .= '_';
                    }
                }

                $note = $_POST['checkout-mess'];
                $currentDateTime = date('Y-m-d H:i:s');
                $new_order = new Order($currentDateTime, $cusid, $note, $detail, $sum);
                $result = $new_order->save();
                if (!$result) {
                    messagebox('Order failed.');
                } else {

                    messagebox('Order success.');
                    echo '<script type="text/javascript">document.cookie = "Cart=[]; expires= d.setTime(d.getTime() +1 ).toUTCString()";</script>';
                }
            }
        } else {

            header('Location: ./login.php');
        }

        ?>

        <!-- Breadcrumb Start -->
        <div class="clearfix"> </div>
        <!---pop-up-box---->
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <!---//pop-up-box---->
        <div id="small-dialog" class="mfp-hide">
            <div class="search-top">
                <div class="login">
                    <form action="#" method="post">
                        <input type="submit" value="">
                        <input type="text" name="search" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">

                    </form>
                </div>
                <p> Shopping</p>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

            });
        </script>
        <!---->
    </div>
    </div>
    </div>
    <!--//header-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
    </div>
    <!---->
    <div class="container">
        <div class="check-out">
            <h2>Checkout</h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Delivery details</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                <?php
                if (isset($_GET['remove'])) {
                    $rm_id = $_GET['remove'];

                    $data = $_COOKIE['Cart'];
                    echo $data;
                    $data = str_replace('[', '', $data);
                    $data = str_replace(']', '', $data);
                    $data = explode(',', $data);
                    $new_data = "";
                    foreach ($data as $item) {
                        $amount = explode('_', $item)[1];
                        $id = explode('_', $item)[0];
                        if ($id != "") {
                            if ($id != $rm_id) {
                                $new_data .= $id;
                                $new_data .= '_';
                                $new_data .= $amount;
                                $new_data .= ',';
                            }
                        }
                    }
                    $new_ck = '[';
                    $new_ck .= $new_data;
                    $new_ck .= ']';

                    setcookie('Cart', $new_ck);
                    echo "<script type='text/javascript'>document.cookie = 'Cart=" . $new_ck . "; expires= d.setTime(d.getTime() + (7*24*60*60*1000) ).toUTCString()';</script>";
                }
                if (isset($_COOKIE['Cart'])) {
                    $data = $_COOKIE['Cart'];
                    $data = str_replace('[', '', $data);
                    $data = str_replace(']', '', $data);
                    $data = explode(',', $data);
                    $sum = 0;

                    $detail = '';
                    foreach ($data as $item) {
                        $amount = explode('_', $item)[1];
                        $id = explode('_', $item)[0];
                        $product_detail = Product::get_product_detail($id);
                        foreach ($product_detail as $prod) {

                            $gia_sale_temp = ($prod['Price'] - $prod['Price'] * $prod['Discount'] / 100) * $amount;
                            $gia_sale = ($prod['Price'] - $prod['Price'] * $prod['Discount'] / 100);
                            $sum += $gia_sale_temp;


                            echo "

                                <tr>
                                <td class='product-thumbnail'>
                                    <a href='#'><img src='" . $prod['Picture'] . "' alt='cart-image'></a>
                                    </td>
                                    <td class='product-name'><a href='#'>" . $prod['ProductName'] . "</a></td>
                                    <td class='product-price'><span class='amount'>" . $gia_sale . " USD</span></td>
                                     <td class='product-quantity'><span >" . $amount . " </span></td>
                                    <td class='product-subtotal'>" . $gia_sale_temp * $amount . " USD</td>
                                     <td class='product-remove'> <a href='?remove=" . $prod['ProductID'] . "'><i class='fa fa-times' aria-hidden='true'></i></a></td>
                                                        
                                                        ";
                        }
                    }
                }
                $order_detail .= $detail;
                ?>
            </table>
            <div class="row">
                <!-- Cart Button Start -->
                <div class="col-md-8 col-sm-12">
                    <div class="buttons-cart">
                        <input type="submit" value="Update Cart">
                        <a href="./product.php">Continue Shopping</a>
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