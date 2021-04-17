
<!DOCTYPE html>
<html lang="en">
    <?php
        include_once('./head.php');
        require_once(__DIR__.'/models/contact_us.php');
        
    ?>
<body>
    <div class="wrapper">
        <?php
            include_once('./header.php');
            if(isset($_POST['btn_send'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                if(strlen($name)<1){
                    messagebox('Please enter your name.');
                }elseif(strlen($email)<1){
                    messagebox('Please enter your email.');
                }elseif(strlen($message)<1){
                    messagebox('Please enter your message.');
                }else{
                    $register_cus = new ContactUs($name,$email,$message);
                    $result = $register_cus->insert_contact();
                    if(!$result){
                        header('Location: contact.php?failure');
                        messagebox('Error happen.');
                    }else{
                        header('Location: contact.php?inserted');
                        messagebox('Contact have been save.');
                    }
                }
            }
        ?>
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Contact Email Area Start -->
        <div class="contact-area ptb-100 ptb-sm-60">
            <div class="container">
                <h3 class="mb-20">Contact Us</h3>
                <p class="text-capitalize mb-20">If you have any questions or problems need support please fill this form</p>
                <form id="contact-form" class="contact-form" action="" method="post">
                    <div class="address-wrapper row">
                        <div class="col-md-12">
                            <div class="address-fname">
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-email">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="address-textarea">
                                <textarea name="message" class="form-control" placeholder="Write your message"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="form-message">
                    <div class="footer-content mail-content clearfix">
                        <div class="send-email float-md-right">
                            <input value="Submit" class="return-customer-btn" name="btn_send" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Email Area End -->      
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>We guarantee our price is good for you.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Time Saving</h6>
                            <span>We bring you important infomation you interest for saving yout precious time.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe & Warranty</h6>
                            <span>We guarantee your automobile always in The best condition.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>With over 30 years on car business we is your best choice.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Support you any time.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_once('./footer.php');
        ?>
    </div>
</body>
</html>