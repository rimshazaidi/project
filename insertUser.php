<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Phone</th>
		<th>Education</th>
		<th>Date of Birth</th>
		<th>Gender</th>
		<th>Education</th>
		<th>Hobbies</th>
		<th>URL</th>
		<th>Hobbies</th>
		<th>Address</th>

	</tr>
</table>
</body>
</html>
<?php
$link = mysqli_connect("localhost", "root", "", "ahwc"); 
$sql = "SELECT * FROM users";
$result = $conn-> mysqli_query($link, $sql);

?>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "ahwc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		echo $nameErr;
		exit();
		}
		if(empty($_POST["email"])){
		$emailErr = "Email is required";
		echo $emailErr;
		exit();
		}
	  	// Attempt insert query execution
	  	$code  = (rand(1000,10000));
	  	//here write the data from index.php values 
		$sql = "INSERT INTO users (code,name, email, phone, password,education,dateof,url,description) VALUES ($code, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."',
		'".$_POST['password']."','".$_POST['education']."','".$_POST['dateof']."','".$_POST['url']."','".$_POST['description']."')";
		if(mysqli_query($link, $sql)){
		    echo "Records inserted successfully.";
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

	$sql = "SELECT * FROM users";	 
}

 
// Close connection
mysqli_close($link);
?>