
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
        <div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact</li>
			</ol>
		</div>
	</div>
<div class="contact">
			<div class="container">
				<h3>Contact</h3>
				
				<div class="contact-grids">
					<div class="contact-form">
							<form action="#" method="post">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Name</span>
										<input type="text" name="name">
									</div>
									<div class="col-md-4 in-contact">
										<span>Email</span>
										<input type="text" name="email" >
									</div>
									<div class="col-md-4 in-contact">
										<span>Phonenumber</span>
										<input type="text" name="phonenumber">
									</div>
									<div class="clearfix"> </div>
								</div>
							
								<div class="contact-bottom-top">
									<span>Message</span>
									<textarea  name="message"> </textarea>								
									</div>
								<input type="submit" value="Send">
							</form>
						</div>
				<div class="address">
					<div class=" address-more">
						<h2>Address</h2>
						<div class="col-md-4 address-grid">
							<i class="glyphicon glyphicon-map-marker"></i>
							<div class="address1">
								<p>Lorem ipsum dolor</p>
								<p>TL 19034-88974</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 address-grid ">
							<i class="glyphicon glyphicon-phone"></i>
							<div class="address1">
								<p>+885699655</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-4 address-grid ">
							<i class="glyphicon glyphicon-envelope"></i>
							<div class="address1">
								<p><a href="mailto:@example.com"> @example.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--//content-->
<!--map-->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279847.2716062404!2d145.46948275!3d-36.60289065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad4314b7e18954f%3A0x5a4efce2be829534!2sVictoria%2C+Australia!5e0!3m2!1sen!2sin!4v1443674224626" width="100%" height="" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
        <?php
            include_once('./footer.php');
        ?>
    </div>
</body>
</html>

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
