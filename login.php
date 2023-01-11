<?php
session_start();
if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "silas", "king", "test1");
    if (!$conn) {
        echo "<script type='text/javascript'>alert('Database failed');</script>";
        die('Could not connect: '.mysqli_connect_error());
    }
    $email=$_POST['email'];
    $pw=$_POST['pw'];
    $sql = "SELECT * FROM passengers WHERE email = '$email' AND password = '$pw';";
    $sql_result = mysqli_query($conn, $sql) or die('request "Could not execute SQL query" '.$sql);
    $user = mysqli_fetch_assoc($sql_result);
    if (!empty($user)) {
        $_SESSION['user_info'] = $user['email'];
        $message='Logged in successfully';
		echo("<script type='text/javascript'>alert('$message');window.location.href = 'index.html'</script>");
    } else {
        $message = 'Wrong email or password.';
		ech("<script type='text/javascript'>alert('$message');</script>");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("email");
		var atpos = EmailId.value.indexOf("@");
    	var dotpos = EmailId.value.lastIndexOf(".");
		var pw=document.getElementById("pw");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<style type="text/css">
	#loginarea{
		background-color: white;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.2);
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 40px;
	    font-family:sans-serif;
		font-size: 20px;
		color: white;
	}
	html { 
		background: url(images/bg4.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#submit	{
		border-radius: 5px;
		background-color: rgba(0,0,0,0);
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 17px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: white;
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: white;
	}
</style>
<body>
	<div id="loginarea">
        <form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
        <input type="text" id="email" size="30" maxlength="30" name="email"/>
        <input type="password" id="pw" size="30" maxlength="30" name="pw"/>
        <input type="Submit" value="Submit" name="submit" id="submit" class="button">
        </form>
    </div>
</body>
</html>
