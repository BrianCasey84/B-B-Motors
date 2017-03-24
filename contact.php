<?php
		$errName = "";
		$errEmail = "";
		$errNumber = "";
		$errMessage = "";
		$result = "";
	if (isset($_POST["submit"])) {	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$message = $_POST['message'];
		
		$from = 'contactform@bbautos.ie';
		$to = 'bbautos@gmail.com';
		$email_headers = "From: FROM $name <contactform@bbautos.ie>";
		$subject = 'Message from Website Contact Form';
		$body = "From: $name\n Email: $email\n Number: $number\n Message:\n $message";
		
				
		//Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		//Check if email has been entered and validate if so
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if number has been entered
		if (!$_POST['number']) {
			$errNumber = 'Please enter your phone number';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		
		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errNumber && !$errMessage) {
			if (mail ($to, $subject, $body, $email_headers, $from)) {
				$result= '<div class="alert alert-success">Thank You! We will be in touch</div>';
			} else {
				$result= '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
				print_r(error_get_last());
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact - B&amp;B Autos</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<script type="text/javascript">
		function goToAnchor() {
			location.href = "contact.php#bottom";
		}
	</script>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">B&amp;B Autos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    
    	<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>B&amp;B Autos</strong>
                    </h2>
                    <hr>
                </div>
                
    <div class="col-md-8">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.911893540137!2d-7.13767649080396!3d52.24498396653122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4842db4199688be1%3A0xb2a84996e9a0d681!2sR680%2C+Waterford%2C+Ireland!5e0!3m2!1sen!2sus!4v1490371177413" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                	<p><strong>Location:</strong> We are located on the Cork Road, Waterford City, Co. Waterford.</p>
                    <p><strong>Phone:</strong>
                        051-123456
                    </p>
                    <p><strong>Email:</strong>
                        <a href="mailto:bbautos@gmail.com">bbautos@gmail.com</a>
                    </p>
                   
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    
    	<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact Form</h2>
                    <hr>
                    <p><strong>For Further Information Please Fill Out the Contact Form Below:</strong></p>
                    <form role="form" method="post" action="">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name">
                                <?php echo "<p class='text-danger'>$errName</p>";?>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com">
                                <?php echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" id="number" name="number" placeholder="Your Number Here">
                                <?php echo "<p class='text-danger'>$errNumber</p>";?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" rows="6" id="message" name="message" placeholder="Your Message Here"></textarea>
                                <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button id="submit" name="submit" type="submit" class="btn btn-default" value="Send" onClick="goToAnchor()">Submit</button>
                            </div>
                            <div class="form-group">
                            	<div class="col-sm-10 col-sm-offset-2">
                                	<?php echo $result; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
		<a name="bottom"></a>
            <div class="row">
                <div class="col-lg-12">
                    <center><p>Copyright &copy; B&amp;B Autos 2017</p></center>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

