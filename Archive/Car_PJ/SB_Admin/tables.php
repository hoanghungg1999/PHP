<?php
    include_once('./admin_header.php');
    if(isset($_GET['id'])){
        $manage = substr($_GET['id'],0,-1);
        if($manage=='permission'){
            require_once(__DIR__.'/../models/login_class.php');
            $title = "Give Permission Who Can View Your Manage Page";
            $labels = array('ID','HoTen','Email','DiaChi','SDT','Level','Action');
            $result = Admin_Login::get_all_login_able($id);
            $add_btn = "<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal0'>Add</button>";
        }elseif($manage=='product'){
            require_once(__DIR__.'/../models/products.php');
            require_once(__DIR__.'/../models/categories.php');
            require_once(__DIR__.'/../models/type.php');
            $title = "Manage Your Product";
            $labels = array('ID','Name','Category','Type','Price','Quantity','Discount','Action');
            $result = Product::list_manage_product();
            $add_btn = "<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal0'>Add</button>";
        }elseif($manage=='category'){
            require_once(__DIR__.'/../models/categories.php');
            $title = "Manage Your Categories";
            $labels = array('ID','Name','Description','Logo','Action');
            $result = Category::list_category();
            $add_btn = "<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal0'>Add</button>";
        }elseif($manage=='type'){
            require_once(__DIR__.'/../models/type.php');
            $title = "Manage Your Type";
            $labels = array('ID','Name','Description','Action');
            $result = Type::list_type();
            $add_btn = "<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal0'>Add</button>";
        }elseif($manage=='customer'){
            require_once(__DIR__.'/../models/login_class.php');
            $title = "Manage Your Customer";
            $labels = array('ID','Name','Email','Address','Phonenumber','Action');
            $result = Admin_Login::list_customer();
            $add_btn = "<button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal0'>Add</button>";
        }elseif($manage=='contact'){
            require_once(__DIR__.'/../models/contact_us.php');
            $title = "Manage Your Contact";
            $labels = array('ID','Name','Email','Message','Action');
            $result = ContactUs::list_contact();
            $add_btn = "";
        }elseif($manage=='order'){
            require_once(__DIR__.'/../models/orderdetail.php');
            $title = "Manage Your Order";
            $labels = array('OrderID','OrderDate','CustomerID','Note','Detail','Total');
            $result = Order::list_order();
            $add_btn = "";
        }
        //Order
    }
    function load_dd($id){
        messagebox($id);
    }
?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php echo $add_btn ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php
                                                foreach($labels as $label){
                                                    echo "<th>$label</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   

                                        <?php
                                            foreach($result as $data){
                                                if($manage=='permission'){
                                                    echo "
                                                    <tr>
                                                        <td>".$data['ID']."</td>
                                                        <td>".$data['HoTen']."</td>
                                                        <td>".$data['Email']."</td>
                                                        <td>".$data['DiaChi']."</td>
                                                        <td>".$data['SDT']."</td>
                                                        <td>".$data['Level']."</td>
                                                        <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['ID']."'>Edit</button></td>
                                                    </tr>
                                                ";
                                                }elseif($manage=='product'){
                                                    echo "
                                                        <tr>
                                                            <td>".$data['ProductID']."</td>
                                                            <td>".$data['ProductName']."</td>
                                                            <td>".$data['CateID']."</td>
                                                            <td>".$data['TypeID']."</td>
                                                            <td>".$data['Price']."</td>
                                                            <td>".$data['Quantity']."</td>
                                                            <td>".$data['Discount']."%</td>
                                                            <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['ProductID']."'  >Edit</button></td>
                                                        </tr>
                                                    ";
                                                    
                                                }elseif($manage=='category'){
                                                    echo "
                                                        <tr>
                                                            <td>".$data['CateID']."</td>
                                                            <td>".$data['CategoryName']."</td>
                                                            <td>".$data['Description']."</td>
                                                            <td><img src='".$data['CategoryLogo']."' width='50px' alt=''></td>
                                                            <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['CateID']."'  >Edit</button></td>
                                                        </tr>
                                                    ";
                                                    
                                                }elseif($manage=='type'){
                                                    echo "
                                                        <tr>
                                                            <td>".$data['TypeID']."</td>
                                                            <td>".$data['TypeName']."</td>
                                                            <td>".$data['TypeDescription']."</td>
                                                            <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['TypeID']."'  >Edit</button></td>
                                                        </tr>
                                                    ";
                                                    
                                                }elseif($manage=='customer'){
                                                    echo "
                                                        <tr>
                                                            <td>".$data['ID']."</td>
                                                            <td>".$data['HoTen']."</td>
                                                            <td>".$data['Email']."</td>
                                                            <td>".$data['DiaChi']."</td>
                                                            <td>".$data['SDT']."</td>
                                                            <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['ID']."'  >Edit</button></td>
                                                        </tr>
                                                    ";
                                                    
                                                }elseif($manage=='contact'){
                                                    echo "
                                                        <tr>
                                                            <td>".$data['ContactID']."</td>
                                                            <td>".$data['Name']."</td>
                                                            <td>".$data['Email']."</td>
                                                            <td>".$data['Message']."</td>
                                                            <td><button class='btn btn-info btn-lg' data-toggle='modal' data-target='#ProductModal".$data['ContactID']."'  >Edit</button></td>
                                                        </tr>
                                                    ";
                                                    
                                                }elseif($manage=='order'){
                                                    $order_detail="";
                                                    foreach(explode('_',$data['OrderDetail']) as $detail){
                                                        $order_detail.=$detail;
                                                        $order_detail.='</br>';
                                                    }
                                                    echo "
                                                        <tr>
                                                            <td>".$data['OrderID']."</td>
                                                            <td>".$data['OrderDate']."</td>
                                                            <td>".$data['CustomerID']."</td>
                                                            <td>".$data['Note']."</td>
                                                            <td>".$order_detail."</td>
                                                            <td>".$data['Total']."</td>
                                                            
                                                        </tr>
                                                    ";
                                                    
                                                }
                                                
                                            }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
   
    <a class="scroll-to-top rounded" href="#page-top">  
        <i class="fas fa-angle-up"></i>
    </a>
    
<?php
    include_once('./admin_footer.php');
?>