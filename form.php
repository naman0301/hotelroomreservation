<?php
	$name = $_REQUEST['name'];
	$email= $_REQUEST['email'];
	$checkin = date('Y-m-d', strtotime($_REQUEST['checkin']));
	$checkout = date('Y-m-d', strtotime($_REQUEST['checkout']));
	$rooms= $_REQUEST['number'];
	$adults= $_REQUEST['number1'];
	$childrens= $_REQUEST['number2'];
	
	// Authentic details are hidden due to security reasons 

	$servername = "localhost";
	$username = "********";
	$database = "**********";
	$password = "********";

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
	   die("Connection failed: " . mysqli_connect_error());
	}

$sql = "insert into Form(FULLNAME,EMAIL,ROOMS,ADULTS,CHILDRENS,CHECKIN,CHECKOUT)
				values('$name','$email','$rooms','$adults','$childrens','$checkin','$checkout')";
	// echo "<br>SQL generated: $sql" . "<br>\n";

	if(mysqli_query($conn, $sql)){
	   echo "\nRecord created, Booking Confirm!!";
	}else{
	   echo "\nFailure to create record, " . mysqli_error($conn);
	}

$sql1 = "select * from Form";

	$result = mysqli_query($conn,$sql1);

echo "<h1>Form DataBase</h1>";
		echo "<table border = 1>";
		$heading = "<tr><th>FULLNAME</th><th>EMAIL</th><th>ROOMS</th><th>ADULTS</th><th>CHILDRENS</th><th>CHECKIN</th><th>CHECKOUT</th></tr>";
		echo $heading;
	if(mysqli_num_rows($result) > 0){

		while($row = mysqli_fetch_assoc($result)){
			$data = sprintf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%d</td><td>%s</td><td>%s</td></tr>\n",$row['FULLNAME'],$row['EMAIL'],$row['ROOMS'],$row['ADULTS'],$row['CHILDRENS'],$row['CHECKIN'],$row['CHECKOUT']);
			echo $data;
		}	
		echo "</table>";
	}else{
		echo "No rows retreived";
	}

	echo "<br>\n";
	mysqli_close($conn);
?>

