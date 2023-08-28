<?php


include 'database.php';

if(isset( $_POST['username']) and isset( $_POST['logo']) and isset( $_POST['Industry']) and isset( $_POST['country'])){

$name = $_POST['username'];
//echo $name;
$image= $_POST['logo'];
// $industry = $_POST['it'] or $_POST['med'] or $_POST['bank'] or $_POST['auto'];
$industry = $_POST['Industry'];
$location = $_POST['country'];

signup($name,$image,$industry,$location);


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VS Data</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   
</head>

<body>
 
    <div class="container">
    
    <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
            <h2>Login Form</h2><br>
            <form method="post" action="index.php">
                <div class="form-group">
                <label for="fname">Full Name</label>
                <input type="text" name = "username"placeholder="Enter your Full Name"><br><br>
                <label for="image">Logo image</label>
                <input type="file" name="logo" id="fileToUpload" accept="logo/*">
                <!-- <input type="submit" value="Upload Image" name="sukbmit"> <br><br> -->
                <label for="Industrys">Industry</label><br>
                <select name="Industry" id="Industrys">
                <option value="IT" name ="it">IT</option>
                <option value="Medical" name="med">Medical</option>
                <option value="Banking" name="bank"> Banking</option>
                <option value="Automobile" name="auto">Automobile</option>
                </select>
                <br><br>

                <!-- <label for="nname">Country</label><br>
                <input type="text" name="location" placeholder="Enter your Location"><br><br> -->
                <select id="countrySelect">
                  <option value="" name="country">Select a country</option>
                </select>
            </form>
        </div>
</div>
<div class="submit">
<!-- <input type="submit" value="Submit"> -->
<button type="submit">Submit</button>
</div>
    </div>
    <?php
}
?>
    <script>
       // Get the select element
const selectElement = document.getElementById("countrySelect");

// Fetch the list of countries from the REST Countries API
fetch("https://restcountries.com/v3.1/all")
    .then(response => response.json())
    .then(data => {
        // Loop through the data to populate the select element
        data.forEach(country => {
            const option = document.createElement("option");
            option.value = country.cca2;
            option.text = country.name.common;
            selectElement.appendChild(option);
        });
    })
    .catch(error => console.error("Error fetching countries:", error));

    </script>
</body>
</html>
