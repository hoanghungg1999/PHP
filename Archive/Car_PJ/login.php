
<!DOCTYPE html>
<html lang="en">
<?php
    include_once('./head.php');
    
?>


<body>
    <div class="wrapper">
        <?php
            include_once('./header.php');
            require_once('./models/login_class.php');
            if(isset($_POST['btn_login'])){
                $username = $_POST['email'];
                $password = $_POST['pass'];
               
                
                $data = Admin_Login::login($username,$password);
                
                if(count($data)==0){
                    messagebox("Check your login infomation again !");
                }else{
                    foreach($data as $item){
                        
                        if($item['Level'] != 0){
                            //echo $item['Level'];
                            echo  "<script>
                                    var id = ".$item['ID'].";
                                    var c_name ='User='
                                    var d = new Date();
                                    d.setTime(d.getTime() + (1*24*60*60*1000));
                                    var expiresdate = 'expires='+ d.toUTCString();
                                    var txt = 'User='+id+';expires='+expiresdate;
                                    document.cookie = c_name + id+';'+expiresdate
                                </script>";
                                // foreach ($_COOKIE as $key=>$val)
                                // {
                                //   echo $key.' is '.$val."<br>\n";
                                // }
                            
                           
                            echo "<script type='text/javascript'> document.location = './SB_Admin/dashboard.php?id=".$item['ID']."'; </script>";
                        }else{
                            echo  "<script>
                                    var id = ".$item['ID'].";
                                    var c_name ='User='
                                    var d = new Date();
                                    d.setTime(d.getTime() + (1*24*60*60*1000));
                                    var expiresdate = 'expires='+ d.toUTCString();
                                    var txt = 'User='+id+';expires='+expiresdate;
                                    document.cookie = c_name + id+';'+expiresdate
                                </script>";
                            echo "<script type='text/javascript'> document.location = './checkout.php?id=".$item['ID']."'; </script>";
                        }
                        
                    }
                }
                
                
            }
        ?>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        
                        <li class="active"><a href="login.php">Sign In</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- LogIn Page Start -->
        <div class="log-in ptb-100 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <!-- New Customer Start -->
                    <div class="col-md-6">
                        <div class="well mb-sm-30">
                            <div class="new-customer">
                                <h3 class="custom-title">new customer</h3>
                                <p class="mtb-10"><strong>Register</strong></p>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                                <a class="customer-btn" href="register.php">continue</a>
                            </div>
                        </div>
                    </div>
                    <!-- New Customer End -->
                    <!-- Returning Customer Start -->
                    <div class="col-md-6">
                        <div class="well">
                            <div class="return-customer">
                                <h3 class="mb-10 custom-title">Already have account</h3>
                                <p class="mb-10"><strong>Welcome back. Please fill below form to continue. </strong></p>
                                <form action="login.php" method="POST">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Enter your email address..." id="input-email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" placeholder="Password" id="input-password" class="form-control">
                                    </div>
                                    <p class="lost-password"><a href="forgot-password.php">Forgot password?</a></p>
                                    <input type="submit" value="Login" name='btn_login' class="return-customer-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->
        
       
    </div>
    <?php
            include_once("./footer.php");
    ?>
</body>

</html>