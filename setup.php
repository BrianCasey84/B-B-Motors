<?php
include_once("includes/dbconx.php");

$tbl_usedCars = "CREATE TABLE IF NOT EXISTS usedcars (
              id VARCHAR(16) NOT NULL,
			  imgPath VARCHAR (30) NOT NULL,
			  manufacturer VARCHAR(30) NOT NULL,
			  model VARCHAR(30) NOT NULL,
			  colour VARCHAR(30) NOT NULL,
			  year VARCHAR(30) NOT NULL,
			  type ENUM('saloon','estate','coupe','hatchback', '7-seater') NOT NULL,
			  doors INT(11) NOT NULL,
			  cc VARCHAR(30) NOT NULL,
			  fuel ENUM('petrol','diesel','gas','electric') NOT NULL,
			  email VARCHAR(255) NOT NULL,
			  phone VARCHAR(30) NOT NULL,
              PRIMARY KEY (id)
             )";
$query = mysqli_query($link, $tbl_usedCars);
if ($query === TRUE) {
	echo "<h3>used car table created OK :) </h3>"; 
} else {
	echo "<h3>used car table NOT created :( </h3>"; 
}