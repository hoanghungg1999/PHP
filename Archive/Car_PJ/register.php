
<!DOCTYPE html>
<html lang="en">
<?php
    include_once('./head.php');
    require_once(__DIR__."/models/login_class.php")
?>
<body>
    
    <div class="wrapper">
        <?php
            include_once('./header.php');
            if(isset($_POST['btn_submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $pass_1 = $_POST['password'];
                $pass_2 = $_POST['password_1'];
                if(strlen($name)<1){
                    messagebox('Please enter your name.');
                }elseif(strlen($email)<1){
                    messagebox('Please enter your email.');
                }elseif(strlen($address)<1){
                    messagebox('Please enter your address.');
                }elseif(strlen($phone)<1){
                    messagebox('Please enter your phonenumber.');
                }elseif(strlen($pass_1)<1 || strlen($pass_2)<1){
                    messagebox('Please enter your password');
                }elseif(strlen($pass_1)<8){
                    messagebox('Password too short !\nPassword must between 8 and 30.');
                }elseif(strlen($pass_1)>30){
                    messagebox('Password too long !\nPassword must between 8 and 30.');
                }elseif(strcmp($pass_1,$pass_2)!=0){
                    messagebox('Password not match !');
                }else{
                    $register_cus = new Admin_Login($name,$email,$address,$phone,$pass_1);
                    $result = $register_cus->insert_customer();
                    if(!$result){
                        header('Location: register.php?failure');
                        messagebox('Register failed.');
                    }else{
                        header('Location: register.php?inserted');
                        messagebox('Register success.');
                    }
                }
            }
        ?>
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
       <!-- Register Account Start -->
        <div class="register-account ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="register-title">
                            <h3 class="mb-10">REGISTER ACCOUNT</h3>
                            <p class="mb-10">If you already have an account please back to login at the login page.</p>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-register"  method="POST" >
                            <fieldset>
                                <legend>Your Personal Details</legend>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Enter your name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="f-name" name="name" placeholder="Enter your name">
                                    </div>
                                </div>
                               
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter your email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter you email">
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter your address</label>
                                    <div class="col-md-10">
                                        <input type="name" class="form-control" id="address" name="address" placeholder="Enter you address">
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="number"><span class="require">*</span>Phone number</label>
                                    <div class="col-md-10">
                                        <input type="tel" class="form-control" id="number" name="phone" placeholder="Phone number">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Your Password</legend>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Password:</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group d-md-flex align-items-md-center">
                                    <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Confirm Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" id="pwd-confirm" name="password_1" placeholder="Confirm password">
                                    </div>
                                </div>
                            </fieldset>
                            
                            <div class="terms">
                                <div class="float-md-right">
                                    
                                    <input type="submit" value="Continue" name="btn_submit" class="return-customer-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
<?php
    include_once('./footer.php');
?>

</body>
</html>