<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Back - B&amp;B Autos</title>

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
                <a class="navbar-brand" href="index.php">B&amp;B Autos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
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

    <!-- Page Content -->
    <div class="container">

      <div class="form">
          <p>Welcome <?php echo $_SESSION['username']; ?>!</p>

			<h1>Add Car</h1>
<form name="addCar" action="addCar.php" method="post">
<label>Registration Number: </label><br>
<input type="text" name="registration" placeholder="Registration Number" required /><br /><br />
<label>Path to Image: </label><br>
<input type="text" name="imgPath" placeholder="e.g. img/carName" required /><br /><br />
<label>Price:</label><br>
<input type="number" name="price" placeholder="Car Price" required /><br /><br />
<label>Manufactuer: </label><br>
<select name="manufacturer" required>
  <option value="audi">Audi</option>
  <option value="ford">Ford</option>
  <option value="skoda">Skoda</option>
  <option value="toyota">Toyota</option>
  <option value="volkswagen">Volkswagen</option>
  <option value="Opel">Opel</option>
  <option value="other">Other</option>
</select><br /><br />
<label>Model: </label><br>
<input type="text" name="model" placeholder="model" required /><br /><br />
<label>Colour: </label><br>
<input type="text" name="colour" placeholder="Colour" required /><br /><br />
<label>Year: </label><br>
<input type="text" name="year" placeholder="Year" required /><br /><br />
<label>Type: </label><br>
<input type="radio" name="type" value="hatchback"> Hatchback
  <input type="radio" name="type" value="saloon"> Saloon
  <input type="radio" name="type" value="estate"> Estate
  <input type="radio" name="type" value="coupe"> Coupe
  <input type="radio" name="type" value="7-seater"> 7-seater<br /><br />
  
  <label>Number of doors: </label><br>
<input type="text" name="doors" placeholder="Number of doors" required /><br /><br />
<label>CC of engine: </label><br>
<input type="text" name="cc" placeholder="CC of engine" /><br /><br />
<label>Fuel type: </label><br>
<input type="radio" name="fuel" value="petrol"> Petrol
  <input type="radio" name="fuel" value="diesel"> Diesel
  <input type="radio" name="fuel" value="gas"> Gas
  <input type="radio" name="fuel" value="electric"> Electric<br /><br />

<label>Description:</label><br>
<input type="text" name="description" placeholder="Car Description" required /><br /><br /> 
<label>Email Address: </label><br>
<input type="email" name="email" placeholder="Email" /><br /><br />
<label>Phone number: </label><br>
<input type="tel" name="phone" placeholder="Phone number" /><br /><br />

<input type="submit" name="submit" value="Add Car" /><br /><br />
</form>
<br /><br />

            <a href="logout.php">Logout</a>
      </div>

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
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
