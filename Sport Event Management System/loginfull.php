<?php
	// you have already learned about session
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'sportevent');
	if(mysqli_connect_error())
	{
		echo "<p>Error in connection to database.</p>";
		exit();
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// checks whether logout button is clicked or not
		if(isset($_POST["logout"]))
		{
			// below code is used to destroy all the session
			session_destroy();
			// below code is used to redirect users to codescracker.php page
			header("location: log.php");
			// below code is used to skip executing the remaining code
			// after this
			exit();
		}
		
		$customer_email = $_POST["customer_email"];
		$customer_email = filter_login_input($customer_email);
		$customer_password = $_POST["customer_password"];
		$customer_password = filter_login_input($customer_password);
		$qry = "select * from addusertable where email='$customer_email' and pass='$customer_password'";
		$res = $conn->query($qry);
		if(mysqli_num_rows($res)>0)
		{
			header("Location:afterlogin.php");
			echo "<script> alert('LOGIN SUCCESSFUL');</script>";
		}
		else 
		{
			$loginCheck = "No";
		}
	}
	function filter_login_input($loginData)
	{
		$loginData = trim($loginData);
		$loginData = stripslashes($loginData);
		$loginData = htmlspecialchars($loginData);
		return $loginData;
	}
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
	<title>LOGIN PAGE</title>
	<script>
	function checkBeforeLogin()
	{
		if(document.loginForm.username.value=="")
		{
			alert("Enter Username");
			document.loginForm.username.focus();
			return false;
		}
		if(document.loginForm.password.value=="")
		{
			alert("Enter Your Password");
			document.loginForm.password.focus();
			return false;
		} 
		return true;
	}
	</script>
</head>
<body> 

<?php
	if(isset($_SESSION['login']))
	{
		echo "<p>You are successfully logged in.</p>";
		echo "<p>Now you can access the admin page.</p>";
		echo "<form method=\"post\">";
		echo "<input type=\"submit\" name=\"logout\" value=\"LogOut\">";
		echo "</form>";
		exit();
	}
?>
	
    <div class="login">
	<h1>LOGIN HERE</h1>
    <form method="post">
    	<input type="text" name="customer_email" placeholder="email" required="required" />
        <input type="password" name="customer_password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>
</body>
</html>