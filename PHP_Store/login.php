
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
        <div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Account</li>
			</ol>
		</div>
	</div>
<div class="account">
	<div class="container">
		<h2>Account</h2>
		<div class="account_grid">
			   <div class="col-md-6 login-right">
				<form action="#" method="post">

					<span>Email Address</span>
					<input type="text" name="email"> 
				
					<span>Password</span>
					<input type="password" name="password"> 
					<div class="word-in">
				  		<a class="forgot" href="#">Forgot Your Password?</a>
				 		 <input type="submit" value="Login">
				  	</div>
			    </form>
			   </div>	
			    <div class="col-md-6 login-left">
			  	 <h4>NEW CUSTOMERS</h4>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="clearfix"> </div>
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