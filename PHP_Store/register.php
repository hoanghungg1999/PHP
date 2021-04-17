<!DOCTYPE html>
<html lang="en">
<?php
include_once('./head.php');
require_once(__DIR__ . "/models/login_class.php")
?>

<body>

    <div class="wrapper">
        <?php
        include_once('./header.php');
        if (isset($_POST['btn_submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            // $phone = $_POST['phone'];
            $pass_1 = $_POST['password'];
            $pass_2 = $_POST['password_1'];
            if (strlen($name) < 1) {
                messagebox('Please enter your name.');
            } elseif (strlen($email) < 1) {
                messagebox('Please enter your email.');
            } elseif (strlen($address) < 1) {
                messagebox('Please enter your address.');
            // } elseif (strlen($phone) < 1) {
                // messagebox('Please enter your phonenumber.');
            } elseif (strlen($pass_1) < 1 || strlen($pass_2) < 1) {
                messagebox('Please enter your password');
            } elseif (strlen($pass_1) < 8) {
                messagebox('Password too short !\nPassword must between 8 and 30.');
            } elseif (strlen($pass_1) > 30) {
                messagebox('Password too long !\nPassword must between 8 and 30.');
            } elseif (strcmp($pass_1, $pass_2) != 0) {
                messagebox('Password not match !');
            } else {
                $register_cus = new Admin_Login($name, $email,$email, $address, $pass_1);
                $result = $register_cus->insert_customer();
                if (!$result) {
                    header('Location: register.php?failure');
                    messagebox('Register failed.');
                } else {
                    header('Location: register.php?inserted');
                    messagebox('Register success.');
                }
            }
        }
        ?>
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
                    <li><a href="./index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="container">
        <div class="register">
            <h2>Register</h2>
            <form  method="post">
                <div class="col-md-6  register-top-grid">

                    <div class="mation">
                        <span>Your Name</span>
                        <input type="text" id="name" name="name">

                        <span>Email Address</span>
                        <input type="text" id="email" name="email">

                        <span>Address</span>
                        <input type="text" id="address" name="address">

                     
                    </div>
                    <!-- <div class="clearfix"> </div>
                    <a class="news-letter" href="#">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
                    </a> -->
                </div>
                <div class=" col-md-6 register-bottom-grid">
                    <div class="mation">
                        <span>Password</span>
                        <input type="password" id="password" name="password">
                        <span>Confirm Password</span>
                        <input type="password" id="password_1" name="password_1">
                    </div>
                </div>
                <div class="clearfix"> </div>
                
                    <input type="submit" name="btn_submit" value="Register">
                    <div class="clearfix">
            </form>

            <!-- <div class="register-but">
                <form action="#" method="post">
                    <input type="submit" name="btn_submit" value="Register">
                    <div class="clearfix"> </div>
                </form>
            </div> -->
        </div>
    </div>
    <!-- Container End -->
    </div>
    <?php
    include_once('./footer.php');
    ?>

</body>

</html>