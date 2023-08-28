<?php


function signup($name,$image,$industry,$location){

$servername = "localhost";
$username = "root";
$password = "";
$db = "Vs_Data";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 echo "Connected successfully";

//  $sql = " INSERT INTO `Vs_Data`.`auth` (
  
//     `name` ,

//     `industry` ,
//     `location`
//     )
//     VALUES ('$user', '$industry','$location')";

$sql="INSERT INTO `vs_data`.`auth` (`name`, `logo`, `industry`, `country`) VALUES ('$name', '$image', '$industry', '$location')";

    $result = false;
    
  //  echo $sql;

  

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();


}
?>

