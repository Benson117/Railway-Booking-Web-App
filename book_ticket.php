<?php
session_start();
    if (empty($_SESSION['user_info'])) {
        echo "<script type='text/javascript'>alert('Please login before proceeding further!');window.location.href = 'login.php';</script>";
    }
$conn = mysqli_connect("localhost", "silas", "king", "test1");
if (!$conn) {
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $trains=$_POST['trains'];
    $sql = "SELECT t_no FROM trains WHERE t_name = '$trains'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $email=$_SESSION['user_info'];
    $query="UPDATE passengers SET t_no='$row[t_no]' WHERE email='$email';";
    if (mysqli_query($conn, $query)) {
        $message = "Ticket booked successfully";
    } else {
        $message="Transaction failed";
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<style type="text/css">

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;		
			}
		}
	</script>
	<link rel="stylesheet" href="./css/book.css">
	<link rel="shortcut icon" href="./images/icon.jpg" type="image/x-icon">
	<link rel="stylesheet" href="./css/main.css">
    <script src="./js/main.js" async defer></script>
</head>
<body>
	<nav id="navigation_bar">
        <div id="inner">
            <div class="nav">Home</div>
            <div class="nav">Purchase Ticket</div>
            <div class="nav">Trips</div>
            <div class="nav">About</div>
        </div>
    </nav>
	<div id="booktkt">
		<h1 id="journeytext">Choose your journey</h1><br/><br/>
		<form method="post" name="journeyform" onsubmit="return validate()">
			<select id="trains" name="trains" required>
				<option selected disabled>-------------------Select trains here----------------------</option>
				<option value="rajdhani" >Rajdhani Express - Mumbai Central to Delhi</option>
				<option value="duronto" >Duronto Express - Mumbai Central to Ernakulum</option>
				<option value="geetanjali">Geetanjali Express - CST to Kolkata</option>
				<option value="garibrath" >Garib Rath - Udaipur to Jammu Tawi</option>
				<option value="mysoreexp" >Mysore Express - Talguppa to Mysore Jn</option>
			</select>
			<input type="submit" name="submit" id="submit" class="button" />
		</form>
	</div>
</body>
</html>
