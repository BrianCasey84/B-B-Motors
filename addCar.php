
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - B&amp;B Autos</title>

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

<?php
	require('includes/dbconx.php');
	
    // If form submitted, pass values
    if (isset($_REQUEST['registration'])){
		$registration = stripslashes($_REQUEST['registration']); // removes backslashes
		$imgPath = $_REQUEST['imgPath'];
		$imgPath = mysqli_real_escape_string($link,$imgPath);
		$manufacturer = stripslashes($_REQUEST['manufacturer']);
		$manufacturer = mysqli_real_escape_string($link,$manufacturer); //escapes special characters in a string
		$model = stripslashes($_REQUEST['model']);
		$model = mysqli_real_escape_string($link,$model); //escapes special characters in a string
		$colour = stripslashes($_REQUEST['colour']);
		$colour = mysqli_real_escape_string($link,$colour); 
		$year = stripslashes($_REQUEST['year']);
		$year = mysqli_real_escape_string($link,$year); 
		$type = stripslashes($_REQUEST['type']);
		$type = mysqli_real_escape_string($link,$type); 
		$doors = stripslashes($_REQUEST['doors']);
		$doors = mysqli_real_escape_string($link,$doors); 
		$cc = stripslashes($_REQUEST['cc']);
		$cc = mysqli_real_escape_string($link,$cc);
		$fuel = stripslashes($_REQUEST['fuel']);
		$fuel = mysqli_real_escape_string($link,$fuel); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($link,$email);
		$phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($link,$phone);
		
		$errors = array(); //define variable $errors as an array

		//Check mandatory fields
		
		if(!$registration){
            $errors[] = "Registration cannot be empty";
        }
		
		if(!$imgPath) {
			$errors[] = "Image cannot be empty";
		}
		
		if(!$manufacturer){
            $errors[] = "Manufacturer cannot be empty";
        }
		
		if(!$model){
            $errors[] = "Model cannot be empty";
        }
		
		if(!$year){
            $errors[] = "Year cannot be empty";
        }
		
		if(!$type){
            $errors[] = "Type cannot be empty";
        }
		
		if(!$doors){
            $errors[] = "Doors cannot be empty";
        }
		
		if(!$fuel){
            $errors[] = "Fuel cannot be empty";
        }
		
		//Check that at least phone or email are entered
		
		if(!$email && !$phone){
            $errors[] = "You must provide an email address or a phone number!";
        }
		
		//---check that registration is comprised of alphabetic or numeric characters only
		if($registration){
            if(!ctype_alnum($registration)){
                $errors[] = "Registration can only contain numbers and letters!";
            }
			$registration = strtoupper("$registration"); // Make registration uppercase
        }
		// Check registration is not already in the database
		if($registration){
            $sql = "SELECT * FROM usedcars WHERE id='".$registration."'";
            $res = mysqli_query($link,$sql) or die(mysql_error());
            if(mysqli_num_rows($res) > 0){
                $errors[] = "The registration you supplied is already in the database!";
			}
        }
		
		//check email is formatted correctly
		if($email){
            $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
            if(!preg_match($checkemail, $email)){
                $errors[] = "E-mail is not valid, must be name@server.tld!";
            }
        }
		
		//---check year
		if($year > '2017' || $year < '1960'){
            $errors[] = "Year must be greater than 1960 and less than 2017!";
        }
		
		//---check doors
		if($doors > '7' || $doors < '1'){
            $errors[] = "Number of doors must be between 1 and 7!";
        }
		
//----------------------------------End of checks ----------------------------------------
//----------------------------------If errors found display each one ---------------------

        if(count($errors) > 0){
            foreach($errors AS $error){
                echo $error . "<br>\n";
				$errorsOut = $error . "<br>";
			}
         }

		else{
        $query = "INSERT INTO usedcars (id, imgPath, manufacturer, model, colour, year, type, doors, cc, fuel, email, phone) VALUES ('$registration', '$imgPath', '$manufacturer', '$model', '$colour', '$year', '$type', '$doors', '$cc', '$fuel', '$email', '$phone')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if($result){
            echo "<div class='form'><h3>The car has been added successfully.</h3></div>";
        }
		else {
			echo "<div class='form'><h3>The car has NOT been added successfully.</h3></div>";
		}
		}
	}
?>

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
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
					<li>
						<a href="login.php">Login</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <form method="POST" action="user.php">
<input type="submit" value="Insert Another Used Car">
</form>
<br>

<form method="POST" action="index.php">
<input type="submit" value="Back to Home Page">
</form>
    
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