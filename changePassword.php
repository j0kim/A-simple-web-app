<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <div id="change-pass-box">
        <h1>Change Password</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="textbox">
                <input type="text" name="username" placeholder="Username">
			</div>
            <div class="textbox">
                <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password">
			</div>
			<div class="textbox">
                <input type="password" name="newpassword" autocomplete="off" placeholder="New Password">
            </div>
            <div class="textbox">
                <input type="password" name="confirmpassword" autocomplete="off" placeholder="Confirm Password">
			</div>
            <button type="submit" name="changepassword">Change Password</button>
            <a href="Dashboard.php"><button type="button">Back</button></a>
        </form>
    </div>

<?php

include_once 'connect_mysql.php';

if(isset($_POST['changepassword'])) {
    $user=$_POST['username'];
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    $sqlq = "SELECT * FROM admins WHERE UserName='$user'";
    $result=@mysqli_query($conn,$sqlq) or die(@mysqli_error($conn));
    $rows=@mysqli_fetch_array($result);
    $psw = $rows[7];
    if(!$result) { 
        echo "The username you entered is does not exist";  
    }
    else if($currentpassword!= $psw) {
        ?>
        <script>
        alert("You entered an incorrect password!!!");
        </script>
        <?php
    }
    else if ($newpassword == $confirmpassword) {
        $sql2="UPDATE admins SET Password='$newpassword' WHERE UserName='$user'";
        @mysqli_query($conn,$sql2) or die(@mysqli_error($conn));

        if($sql2) {
            ?>
            <script>
            alert("Congratulations You have successfully changed your password!");
            </script>
            <?php
        } else {
            echo "The new password and confirm new password fields must be the same";
        }
    }

    
}


?>


</body>
</html>