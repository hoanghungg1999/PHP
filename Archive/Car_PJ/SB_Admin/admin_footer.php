<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; The Car Company 2021</span>
        </div>
    </div>
</footer>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Modernizer js -->  
    <script src="../js\vendor\modernizr-3.5.0.min.js"></script>
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <!-- Product Modal -->
    
    <?php
    



    foreach($result as $data){
        if($manage=='permission'){
            $btn_edit = 'btn_edit';
            $btn_edit.=$data['ID'];
            $btn_delete = 'btn_delete';
            $btn_delete.=$data['ID'];
            if(isset($_POST[$btn_edit])){
                $id = $data['ID'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $lv = $_POST['level'];
                $update_per = new Admin_Login($name,$email,$address,$phone,'');
                $result = $update_per->update_permission($id,$lv);
                if(!$result){
                    messagebox('Update failed.');
                }else{
                    messagebox('Update success.');
                }

                // $test = $name.='_';
                // $test.=$email.='_';
                // $test.=$address.='_';
                // $test.=$phone.='_';
                // $test.=$lv;
                // messagebox($test);
            }else{
                if(isset($_POST[$btn_delete])){
                    $id = $data['ID'];
                    $result = Admin_Login::delete_permission($id);
                    if(!$result){
                        messagebox('Delete failed.');
                    }else{
                        messagebox('Delete success.');
                    }
                }
            }
            
            ?>
            <div class="main-product-thumbnail quick-thumb-content">
                <div class="container">
                    <div class="modal fade" id="ProductModal<?php echo $data['ID'];?>">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">User Detail</h3>
                                            <form class="form-register"  method="POST" >
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="f-name">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="f-name" name="name" value="<?php echo $data['HoTen']; ?>" placeholder="<?php echo $data['HoTen']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" id="email" name="email" value="<?php echo $data['Email']; ?>" placeholder="<?php echo $data['Email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="address" name="address" value="<?php echo $data['DiaChi']; ?>" placeholder="<?php echo $data['DiaChi']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Phone</label>
                                                    <div class="col-md-10">
                                                        <input type="number"  id="phone" name="phone" value="<?php echo $data['SDT']; ?>" placeholder="<?php echo $data['SDT']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Level</label>
                                                    <div class="col-md-10">
                                                        <input class="quantity mr-40" type="number" min="0" id="level" name="level" value="<?php echo $data['Level']; ?>" placeholder="<?php echo $data['Level']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row d-flex">
                                                    <input type="submit" name="btn_edit<?php echo $data['ID'];?>" class="add-cart" value="Edit"></input>
                                                </div>
                                                <div class="row d-flex">
                                                    <input type="submit" name="btn_delete<?php echo $data['ID'];?>" class="add-cart" value="Delete"></input>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }elseif($manage=='customer'){
                $btn_edit = 'btn_edit';
                $btn_edit.=$data['ID'];
                $btn_delete = 'btn_delete';
                $btn_delete.=$data['ID'];
                if(isset($_POST[$btn_edit])){
                    $id = $data['ID'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $lv = $_POST['level'];
                    $update_per = new Admin_Login($name,$email,$address,$phone,'');
                    $result = $update_per->update_permission($id,$lv);
                    if(!$result){
                        messagebox('Update failed.');
                    }else{
                        messagebox('Update success.');
                    }

                    // $test = $name.='_';
                    // $test.=$email.='_';
                    // $test.=$address.='_';
                    // $test.=$phone.='_';
                    // $test.=$lv;
                    // messagebox($test);
                }else{
                    if(isset($_POST[$btn_delete])){
                        $id = $data['ID'];
                        $result = Admin_Login::delete_permission($id);
                        if(!$result){
                            messagebox('Delete failed.');
                        }else{
                            messagebox('Delete success.');
                        }
                    }
                }
                
                ?>
                <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal<?php echo $data['ID'];?>">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-6 col-sm-7">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">User Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name" value="<?php echo $data['HoTen']; ?>" placeholder="<?php echo $data['HoTen']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Email</label>
                                                        <div class="col-md-10">
                                                            <input type="email" id="email" name="email" value="<?php echo $data['Email']; ?>" placeholder="<?php echo $data['Email']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Address</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="address" name="address" value="<?php echo $data['DiaChi']; ?>" placeholder="<?php echo $data['DiaChi']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Phone</label>
                                                        <div class="col-md-10">
                                                            <input type="number"  id="phone" name="phone" value="<?php echo $data['SDT']; ?>" placeholder="<?php echo $data['SDT']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Level</label>
                                                        <div class="col-md-10">
                                                            <input class="quantity mr-40" type="number" min="0" id="level" name="level" value="<?php echo $data['Level']; ?>" placeholder="<?php echo $data['Level']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_edit<?php echo $data['ID'];?>" class="add-cart" value="Edit"></input>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_delete<?php echo $data['ID'];?>" class="add-cart" value="Delete"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        
            }elseif($manage=='contact'){
                $btn_edit = 'btn_edit';
                $btn_edit.=$data['ContactID'];
                $btn_delete = 'btn_delete';
                $btn_delete.=$data['ContactID'];
                if(isset($_POST[$btn_edit])){
                    $id = $data['ContactID'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $result = ContactUs::update_contact($id,$name,$email,$message);
                    if(!$result){
                        messagebox('Update failed.');
                    }else{
                        messagebox('Update success.');
                    }

                }else{
                    if(isset($_POST[$btn_delete])){
                        $id = $data['ContactID'];
                        $result = ContactUs::delete_contact($id);
                        if(!$result){
                            messagebox('Delete failed.');
                        }else{
                            messagebox('Delete success.');
                        }
                    }
                }
                
                ?>
                <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal<?php echo $data['ContactID'];?>">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-6 col-sm-7">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">Contact Customer Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name" value="<?php echo $data['Name']; ?>" placeholder="<?php echo $data['HoTen']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Email</label>
                                                        <div class="col-md-10">
                                                            <input type="email" id="email" name="email" value="<?php echo $data['Email']; ?>" placeholder="<?php echo $data['Email']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Message</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="address" name="message" value="<?php echo $data['Message']; ?>" placeholder="<?php echo $data['DiaChi']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_edit<?php echo $data['ContactID'];?>" class="add-cart" value="Edit"></input>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_delete<?php echo $data['ContactID'];?>" class="add-cart" value="Delete"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            }elseif($manage=='product'){
                $btn_edit = 'btn_edit';
                $btn_edit.=$data['ProductID'];
                $btn_delete = 'btn_delete';
                $btn_delete.=$data['ProductID'];
                if(isset($_POST[$btn_edit])){
                    $id = $data['ProductID'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $discount = $_POST['discount'];
                    $desc = $_POST['desc'];
                    $picture = $_POST['picture'];
                    $category = $_POST['category'];
                    $type_edit = $_POST['type'];
                    $update_prod = new Product($name,$category,$type_edit,$price,$quantity,$desc,$picture,$discount);
                    $result = $update_prod->update_prod($id);
                    if(!$result){
                        messagebox('Update failed.');
                    }else{
                        messagebox('Update success.');
                    }
                    

                }else{
                    if(isset($_POST[$btn_delete])){
                        $id = $data['ProductID'];
                        $result = Product::delete_product($id);
                        if(!$result){
                            messagebox('Delete failed.');
                        }else{
                            messagebox('Delete success.');
                        }
                    }
                }
            ?>
            <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal<?php echo $data['ProductID'];?>">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">Product Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name" value="<?php echo $data['ProductName']; ?>" placeholder="<?php echo $data['ProductName']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Price</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="price" name="price" value="<?php echo $data['Price']; ?>" placeholder="<?php echo $data['Price']; ?> USD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Quantity</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="quantity" name="quantity" value="<?php echo $data['Quantity']; ?>" placeholder="<?php echo $data['Quantity']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Discount</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="discount" name="discount" value="<?php echo $data['Discount']; ?>" placeholder="<?php echo $data['Discount']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Description</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="desc" name="desc" value="<?php echo strval($data['Description']); ?>" placeholder="<?php echo $data['Description']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Image Link</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="picture" name="picture" value="<?php echo $data['Picture']; ?>" placeholder="<?php echo $data['Picture']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="lbltitle">
                                                            <label class="control-label col-md-2" >Category</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select name="category">
                                                                
                                                                <?php
                                                                    $cates = Category::list_category();
                                                                    foreach($cates as $item){
                                                                        if($item['CateID']==$data['CateID']){
                                                                            echo "<option value=".$item['CateID']." selected>".$item['CategoryName']."</option>";
                                                                        }else{
                                                                            echo "<option value=".$item['CateID'].">".$item['CategoryName']."</option>";
                                                                        }
                                                                        
                                                                    }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="lbltitle">
                                                            <label class="control-label col-md-2" >Type</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select name="type">
                                                                <?php
                                                                    $cates = Type::list_type();
                                                                    foreach($cates as $item){
                                                                        if($item['TypeID']==$data['TypeID']){
                                                                            echo "<option value=".$item['TypeID']." selected>".$item['TypeName']."</option>";
                                                                        }else{
                                                                            echo "<option value=".$item['TypeID'].">".$item['TypeName']."</option>";
                                                                        }
                                                                        
                                                                    }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_edit<?php echo $data['ProductID'];?>" class="add-cart" value="Edit"></input>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_delete<?php echo $data['ProductID'];?>" class="add-cart" value="Delete"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        
            }elseif($manage=='type'){
                $btn_edit = 'btn_edit';
                $btn_edit.=$data['TypeID'];
                $btn_delete = 'btn_delete';
                $btn_delete.=$data['TypeID'];
                if(isset($_POST[$btn_edit])){
                    $id = $data['TypeID'];
                    $name = $_POST['name'];
                    $desc = $_POST['desc'];
                    $result = Type::update_type($id,$name,$desc);
                    if(!$result){
                        messagebox('Update failed.');
                    }else{
                        messagebox('Update success.');
                    }

                }else{
                    if(isset($_POST[$btn_delete])){
                        $id = $data['TypeID'];
                        $result = Type::delete_type($id);
                        if(!$result){
                            messagebox('Delete failed.');
                        }else{
                            messagebox('Delete success.');
                        }
                    }
                }
            
                ?>
                <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal<?php echo $data['TypeID'];?>">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-6 col-sm-7">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">Type Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name" value="<?php echo $data['TypeName']; ?>" placeholder="<?php echo $data['TypeName']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Description</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="desc" name="desc" value="<?php echo $data['TypeDescription']; ?>" placeholder="<?php echo $data['TypeDescription']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_edit<?php echo $data['TypeID'];?>" class="add-cart" value="Edit"></input>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_delete<?php echo $data['TypeID'];?>" class="add-cart" value="Delete"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }elseif($manage=='category'){
                    $btn_edit = 'btn_edit';
                    $btn_edit.=$data['CateID'];
                    $btn_delete = 'btn_delete';
                    $btn_delete.=$data['CateID'];
                    if(isset($_POST[$btn_edit])){
                        $id = $data['CateID'];
                        $name = $_POST['name'];
                        $desc = $_POST['desc'];
                        $logo = $_POST['logo'];
                        $result = Category::update_category($id,$name,$desc,$logo);
                        if(!$result){
                            messagebox('Update failed.');
                        }else{
                            messagebox('Update success.');
                        }

                    }else{
                        if(isset($_POST[$btn_delete])){
                            $id = $data['CateID'];
                            $result = Category::delete_category($id);
                            if(!$result){
                                messagebox('Delete failed.');
                            }else{
                                messagebox('Delete success.');
                            }
                        }
                    }
                    
                    ?>
                    <div class="main-product-thumbnail quick-thumb-content">
                        <div class="container">
                            <div class="modal fade" id="ProductModal<?php echo $data['CateID'];?>">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-6 col-sm-7">
                                                <div class="thubnail-desc fix mt-sm-40">
                                                    <h3 class="product-header">Category Detail</h3>
                                                    <form class="form-register"  method="POST" >
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="f-name">Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="f-name" name="name" value="<?php echo $data['CategoryName']; ?>" placeholder="<?php echo $data['CategoryName']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="email">Description</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="desc" name="desc" value="<?php echo $data['Description']; ?>" placeholder="<?php echo $data['Description']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="email">Logo Link</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="logo" name="logo" value="<?php echo $data['CategoryLogo']; ?>" placeholder="<?php echo $data['CategoryLogo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex">
                                                            <input type="submit" name="btn_edit<?php echo $data['CateID'];?>" class="add-cart" value="Edit"></input>
                                                        </div>
                                                        <div class="row d-flex">
                                                            <input type="submit" name="btn_delete<?php echo $data['CateID'];?>" class="add-cart" value="Delete"></input>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
    }
?>
<?php
    if($manage=='permission'){
            if(isset($_POST['btn_create'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pass = $_POST['password'];
                $phone = $_POST['phone'];
                $add_per = new Admin_Login($name,$email,$address,$phone,$pass);
                $result = $add_per->insert_customer();
                if(!$result){
                    messagebox('Create failed.');
                }else{
                    messagebox('Create success.');
                }
            }
            
            ?>
            <div class="main-product-thumbnail quick-thumb-content">
                <div class="container">
                    <div class="modal fade" id="ProductModal0">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">User Detail</h3>
                                            <form class="form-register"  method="POST" >
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="f-name">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="f-name" name="name" placeholder="Enter name here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" id="email" name="email" placeholder="Enter email here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="address" name="address" placeholder="Enter address here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password"  id="password" name="password" placeholder="Enter password here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Phone</label>
                                                    <div class="col-md-10">
                                                        <input type="number"  id="phone" name="phone" placeholder="Enter phonenumber here">
                                                    </div>
                                                </div>
                                                
                                                <div class="row d-flex">
                                                    <input type="submit" name="btn_create" class="add-cart" value="Create"></input>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }elseif($manage=='customer'){
                if(isset($_POST['btn_create'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pass = $_POST['password'];
                $phone = $_POST['phone'];
                $add_per = new Admin_Login($name,$email,$address,$phone,$pass);
                $result = $add_per->insert_customer();
                if(!$result){
                    messagebox('Create failed.');
                }else{
                    messagebox('Create success.');
                }
            }
            ?>
            <div class="main-product-thumbnail quick-thumb-content">
                <div class="container">
                    <div class="modal fade" id="ProductModal0">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">User Detail</h3>
                                            <form class="form-register"  method="POST" >
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="f-name">Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="f-name" name="name" placeholder="Enter name here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" id="email" name="email" placeholder="Enter email here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Address</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="address" name="address" placeholder="Enter address here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Password</label>
                                                    <div class="col-md-10">
                                                        <input type="text"  id="password" name="password" placeholder="Enter password here">
                                                    </div>
                                                </div>
                                                <div class="form-group d-md-flex align-items-md-center">
                                                    <label class="control-label col-md-2" for="email">Phone</label>
                                                    <div class="col-md-10">
                                                        <input type="number"  id="phone" name="phone" placeholder="Enter phonenumber here">
                                                    </div>
                                                </div>
                                                <div class="row d-flex">
                                                    <input type="submit" name="btn_create" class="add-cart" value="Create"></input>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            }elseif($manage=='product'){
                
                if(isset($_POST['btn_create'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $discount = $_POST['discount'];
                    $desc = $_POST['desc'];
                    $picture = $_POST['picture'];
                    $category = $_POST['category'];
                    $type_edit = $_POST['type'];
                    $update_prod = new Product($name,$category,$type_edit,$price,$quantity,$desc,$picture,$discount);
                    $result = $update_prod->save();
                    if(!$result){
                        messagebox('Create failed.');
                    }else{
                        messagebox('Create success.');
                    }
                    

                }
            ?>
            <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal0">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">Product Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name" placeholder="Enter name here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Price</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="price" name="price" placeholder="Enter price in USD here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Quantity</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Discount</label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="discount" name="discount"  placeholder="Enter Discount Here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Description</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="desc" name="desc"  placeholder="Enter desciption here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" >Image Link</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="quantity" name="picture"  placeholder="Enter image link">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="lbltitle">
                                                            <label class="control-label col-md-2" >Category</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select name="category">
                                                                <?php
                                                                    $cates = Category::list_category();
                                                                    echo "<option value='' selected>Select something</option>";
                                                                    foreach($cates as $item){
                                                                            echo "<option value=".$item['CateID'].">".$item['CategoryName']."</option>";
                                                                        
                                                                    }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="lbltitle">
                                                            <label class="control-label col-md-2" >Type</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select name="type">
                                                                <?php
                                                                    $cates = Type::list_type();
                                                                    echo "<option value='' selected>Select something</option>";
                                                                    foreach($cates as $item){
                                                                        echo "<option value=".$item['TypeID'].">".$item['TypeName']."</option>";
                                                                    }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_create" class="add-cart" value="Create"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        
            }elseif($manage=='type'){
                if(isset($_POST['btn_create'])){
                    $name = $_POST['name_new'];
                    $desc = $_POST['desc_new'];
                    $new_type = new Type($name,$desc);
                    $result =  $new_type->save();
                    if(!$result){
                        messagebox('Create failed.');
                    }else{
                        messagebox('Create success.');
                    }

                }
            
                ?>
                <div class="main-product-thumbnail quick-thumb-content">
                    <div class="container">
                        <div class="modal fade" id="ProductModal0">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-6 col-sm-7">
                                            <div class="thubnail-desc fix mt-sm-40">
                                                <h3 class="product-header">Type Detail</h3>
                                                <form class="form-register"  method="POST" >
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="f-name">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="f-name" name="name_new" placeholder="Enter name here">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="email">Description</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="desc" name="desc_new" placeholder="Enter description here">
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <input type="submit" name="btn_create" class="add-cart" value="Create"></input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                }elseif($manage=='category'){
                    
                    if(isset($_POST['btn_create'])){
                        $name = $_POST['name'];
                        $desc = $_POST['desc'];
                        $logo = $_POST['logo'];
                        $new_category = new Category($name,$desc,$logo);
                        $result = $new_category->save();
                        if(!$result){
                            messagebox('Create failed.');
                        }else{
                            messagebox('Create success.');
                        }

                    }
                    ?>
                    <div class="main-product-thumbnail quick-thumb-content">
                        <div class="container">
                            <div class="modal fade" id="ProductModal0">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-6 col-sm-7">
                                                <div class="thubnail-desc fix mt-sm-40">
                                                    <h3 class="product-header">Category Detail</h3>
                                                    <form class="form-register"  method="POST" >
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="f-name">Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="f-name" name="name"  placeholder="Enter name here">
                                                            </div>
                                                        </div>
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="email">Description</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="desc" name="desc"  placeholder="Enter description here">
                                                            </div>
                                                        </div>
                                                        <div class="form-group d-md-flex align-items-md-center">
                                                            <label class="control-label col-md-2" for="email">Logo Link</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="logo" name="logo"  placeholder="Enter logo link here">
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex">
                                                            <input type="submit" name="btn_create" class="add-cart" value="Create"></input>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
    



</body>

</html>