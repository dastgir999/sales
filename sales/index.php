<?php

// Database connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marks_sheet";

try{
	// Create a connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	  echo "Error in connection:".$e->getMessage();
}

// Write the SQL Query to calculate the sum
$sql = "SELECT SUM(amount) AS total_amount FROM sales";
//Execute the query
$stmt = $conn->prepare($sql);
$stmt->execute();
//Fetch the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		*{
			margin:0;
			padding:0px;
			box-sizing: border-box;
			font-family: sans-serif;
		}

		.container{
			display: flex;
			width:100%;
			height:100vh;
			background: whitesmoke;
			justify-content: center;
			align-items: center;
		}
		.total{
			width:250px;
			height:250px;
			border-radius:50%;
			background:red;
			color:white;
			font-weight: bold;
			justify-content: center;
			align-items: center;
			line-height:250px;
			border:10px solid yellow;
		}
	</style>
	<title>Sales</title>
</head>
<body>
	<div class="container">
	<div class="total">
	<?php
echo "Total Sales Amount:".$result['total_amount'];?>
</div>

</div>

</body>
</html>


<?php
// Close the connection
$conn = null;







?>


