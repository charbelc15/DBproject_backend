<?php
//$serverName = "localhost";
//$username = "root";
//$password="";
//$databaseName = "tutoringservice";
//$conn = mysqli_connect($serverName,$username,$password,$databaseName);

//$rec_Text = $_POST['text'];
//$query = "INSERT INTO telmiz (email) VALUES ('$rec_Text')";


//if(mysqli_query($conn,$query)){
//    echo "Data has been inserted sucessfully";
//}
//else{
//    echo "$conn->connect_error";
//}
?>

<?php

    //to check response navigate to localhost/react-backend

    //in HTML
    //1 action and method    in form            <form action="connect.php" method="post">
    //2 NAME   in input         <input type="text"  class="form-control" id="firstName" name="firstName" />

    //1
	$studentID=$_POST['studentID'];
	$firstName =  $_POST['firstName'];
	$lastName =  $_POST['lastName'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phoneExtenstion = null;
	$phoneNb = $_POST['phone'];
	$age = $_POST['age'];
	$username = $_POST['username'];
	$pass = $_POST['password'];



	// Database connection
	$conn = new mysqli('localhost','root','','tutoringservice'); //2
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        //3
		$stmt = $conn->prepare("insert into student(studentID, firstName, lastName, address, email, phoneExtenstion, phoneNb, age, username, pass)
        
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"); //4
        echo($firstName);
		
		//5
		$stmt->bind_param("issssssiss",$studentID, $firstName, $lastName, $address, $email, $phoneExtenstion, $phoneNb, $age, $username, $pass); //5 !!TYPES !!CANNOT BE CONSTANTS
		$execval = $stmt->execute();
		echo $execval;
		echo "    Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

