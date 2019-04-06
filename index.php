<?php
session_start(); // Starts the Session
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="login-box">
		<h1> Admin Login </h1>
		<form name="loginform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="textbox">
				<input type="text" name="username" placeholder="username">
			</div>
			<div class="textbox">
				<input type="password" id="Password" name="pass">
			</div>
			<button class="btn" type="submit" name="submit">Login</button>
		</form>
	</div>

	<?php
	
if(isset($_POST['submit'])) {
    // Step 1: Get Form Data from the Application Layer	
	$U=$_POST['username'];
	$P=$_POST['pass'];
	
    // Secure the Password by Encryption
    $PW=md5($P);	
    $PW1=sha1($PW);	
    $PW2=crypt($PW1,"iuea");		
	
    // connect to MySQL Server
    include_once 'connect_mysql.php';

    // Query the admins database for username and password
    $SQL="SELECT COUNT(*) FROM admins WHERE UserName='$U' && Password='$P'";
    $Result=@mysqli_query($conn,$SQL) or die(@mysqli_error($conn));

    $rows=@mysqli_fetch_array($Result);
    $No_Accounts=$rows[0];

    if($No_Accounts > 0) {
        $SQL2="SELECT AdminID,FirstName,LastName FROM admins 
        WHERE UserName='$U'";
        $Result2=@mysqli_query($conn,$SQL2) or die(@mysqli_error($conn));
        $rows2=@mysqli_fetch_array($Result2);
        $SID=$rows2[0];
        $SFN=$rows2[1];
        $SLN=$rows2[2];
        $Name=$SFN."&nbsp".$SLN;

        // Register the Session Variables
        $_SESSION['User']=$SID;
        $_SESSION['SName']=$Name;

        header("Location:Dashboard.php"); // redirect to Dashboard
    }
    else {
        ?>
        <script>
        alert("INVALID UserName and/or Password !!!");
        </script>
        <?php
    }
    
    // Step 6: close the Connection
    @mysqli_close($conn);
}

?>


</body>
</html>