<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Baumans' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Black Han Sans' rel='stylesheet'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link href='https://fonts.googleapis.com/css?family=Be Vietnam' rel='stylesheet'>
<style>
ul {
  list-style-type: none;
  padding:0;
  margin:0;
  background-color: #333;
  
  overflow: hidden;
  top:0;
  width:100%;
}

li {
  float: left;
}

li a {
  
  display: inline-block;
  color: white;
  text-align: center;
  padding: 7px 25px;
  text-decoration: none;
}

li a:hover  {
    background-color: Moccasin;
   color:black;
}
.dropdown:hover .dropbtn{background-color: Moccasin;
   color:black;
   }

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}



h1{
    margin-top:100px;
 text-align:center;
  font-family: "Sofia";
  font-size: 48px;
}
h2{
    text-align:center;   
}
body {
  margin:0;
  background-color:lightgreen;
  font-family:'Be Vietnam';
}
p{
    margin-left:150px;
   font-size: 34px; 
}
form{
    margin:auto;
    padding:20px 250px;
    text-align:center; 
}
input[type=text],input[type=password] {
  border: 2px solid grey;
   background-color: #3CBC8D;
  color: white;
  border-radius: 4px;
}
input[type=text],input[type=password]:focus {
  border: 3px solid #555;
}
input[type=submit]{

border: 2px solid grey;
  border-radius: 4px;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #3CBC8D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border: 2px solid grey;
   border-radius: 4px;
   margin-left:700px;
}
#b1{ background-color: #3CBC8D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border: 2px solid grey;
   border-radius: 4px;
   align:center;
   margin-left:700px;
   display:none;
   }
   
select {
display:block;
  
  margin:auto;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}

@media screen and (max-width:800px) {
li{width:100%;
text-align:center;
}
li a{width:91%}
h1 {
    margin-top:200px;
 text-align:center;
  font-family: "Sofia";
  font-size:35px;
  }
}

</style>
</head>
<body>
<ul>
  <li><a href="gather-home.php" >Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">sign-up</a>
    <div class="dropdown-content">
      <a href="gather-customer-sign.php">customer</a>
      <a href="#">employee</a>
      <a href="gather-manager-sign.php">manager</a>
    </div>
  </li>
  <li><a href="gather-contact.htm">Contact</a></li>
  <li><a href="gather-about.htm">About</a></li>
</ul>

<h1><span style='font-size:10vw;'>&#9940;</span> gather blocker <span style='font-size:10vw;'>&#129298;</span></h1>
<h2 style='font-family:Baumans'>"go out when it's safe" !</h2>

<button id="b1" onclick="document.location='gather-home.php'">return-home </button>











</body>
</html>



<?php


$username_err = $password_err = "";
$get_user = $_POST['user-name'];
$get_pas = $_POST['password'];
$get_auto = $_POST['duty'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gather-blocker";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `user-name`, `password` FROM `managers` WHERE `user-name` = '$get_user'";
$sql2 = "SELECT `user-name`, `password` FROM `customers` WHERE `user-name` = '$get_user'";
$sql3 = "SELECT `id`, `user-name`, `password` FROM `workers` WHERE `user-name`='$get_user' ";



if($get_auto=='client'){
	$result = mysqli_query($conn, $sql2);
	 if (mysqli_num_rows($result) == 1) {
		 
		  $row = mysqli_fetch_assoc($result); 
		  if($row["user-name"]==$get_user){
		     echo " user name ok<br>";
			 
			 if($row["password"]==$get_pas){
			    echo " password ok <br>";
			 }
			 else {echo "wrong password  <br>";}
			 
		  }
		  else{echo "wrong user name <br>";}
	   }
	
	
}

elseif($get_auto=='Manager'){
	$result = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($result) == 1) {
		 
		  $row = mysqli_fetch_assoc($result); 
		  if($row["user-name"]==$get_user){
		     echo "user name ok<br>";
			 
			 if($row["password"]==$get_pas){
			    echo "password ok <br>";
				header("Location:gather-app.php");
			 }
			 else {echo "wrong password  <br>";}
			 
		  }
		  else{echo "wrong user name <br>";}
	   }
	
	}
	
	elseif($get_auto=='Worker'){
	$result = mysqli_query($conn, $sql3);
	 if (mysqli_num_rows($result) == 1) {
		 
		  $row = mysqli_fetch_assoc($result); 
		  if($row["user-name"]==$get_user){
		     echo "user name ok<br>";
			 
			 if($row["password"]==$get_pas){
			    echo "password ok <br>";
				header("Location:gather-app.php");
			 }
			 else {echo "wrong password  <br>";}
			 
		  }
		  else{echo "wrong user name <br>";}
	   }
	
	}
	
	
	
?>




