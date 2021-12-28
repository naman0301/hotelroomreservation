<?php
	$name = $_REQUEST['name'];
	$email= $_REQUEST['email'];
	$checkin = $_REQUEST['checkin'];
	printf("<b>Check-in Date:</b> %s || ",$checkin);
	$checkout = $_REQUEST['checkout'];
	printf("<b>Check-out Date:</b> %s || ",$checkout);
	$rooms= $_REQUEST['number'];
	$adults= $_REQUEST['number1'];
	$childrens= $_REQUEST['number2'];
	
	$servername = "localhost";
	$username = "n01392496";
	$database = "n01392496_a";
	$password = "n01392496";

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
	   die("Connection failed: " . mysqli_connect_error());
	}

$sql = "insert into Form(FULLNAME,EMAIL,ROOMS,ADULTS,CHILDRENS)
				values('$name','$email','$rooms','$adults','$childrens')";
	// echo "<br>SQL generated: $sql" . "<br>\n";

	if(mysqli_query($conn, $sql)){
	   echo "\nRecord created";
	}else{
	   echo "\nFailure to create record" . mysqli_error($conn);
	}
$sql1 = "select * from Form";

	$result = mysqli_query($conn,$sql1);

echo "<h1>Form DataBase</h1>";
		echo "<table border = 1>";
		$heading = "<tr><th>FULLNAME</th><th>EMAIL</th><th>ROOMS</th><th>ADULTS</th><th>CHILDRENS</th></tr>";
		echo $heading;
	if(mysqli_num_rows($result) > 0){

		while($row = mysqli_fetch_assoc($result)){
			$data = sprintf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%d</td></tr>\n",$row['FULLNAME'],$row['EMAIL'],$row['ROOMS'],$row['ADULTS'],$row['CHILDRENS']);
			echo $data;
		}	
		echo "</table>";
	}else{
		echo "No rows retreived";
	}

	echo "<br>\n";

	mysqli_close($conn);
?>
<h3> Booking Confirmed</h3>
