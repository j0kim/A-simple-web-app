<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <div id="register-box">
        <h1>Register staff</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="staffForm">
            <table cellspacing="20" id="reg-staff-table">
                <tr>
                <td><label for="staffId">Staff ID</label></td>
                <td><input type="text" id="staffId" name="staffId" required="required"></td>
                </tr>
                <tr>
                <td><label for="first_name">First Name</label></td>
                <td><input type="text" id="first_name" name="firstname" required="required"></td>
                </tr>
                <tr>
                <td><label for="last_name">Last Name</label></td>
                <td><input type="text" id="last_name" name="lastname" required="required"></td>
                </tr>
                <tr>
                <td><label for="gender">Gender</label></td>
                <td><select id="gender" name="gender">
                <option>===Select===</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
                </td>
                </tr>
                <tr>
                <td><label for="contact">Contact</label></td>
                <td><input type="tel" id="contact" name="contact" required="required"></td>
                </tr>
                <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" required="required"></td>
                </tr>
            </table>
            <button class="btn" type="submit" name="registerstaff" value="Register">Register</button>
        </form>
    </div>

    <p class="back-to-dashboard"><a href="Dashboard.php">Back to dashboard</a></p>


<?php

include_once 'connect_mysql.php';
if(isset($_POST['registerstaff'])) {
// Get form data from the web page
$staffId=$_POST['staffId'];
$fname=$_POST['firstname'];  
$lname=$_POST['lastname'];  
$gender=$_POST['gender'];    
$contact=$_POST['contact']; 
$email=$_POST['email']; 

// Store data into the visitors database
$sql = "INSERT INTO staff (StaffId, FirstName, LastName, Gender, Contact, Email)
VALUES ('$staffId', '$fname', '$lname', '$gender' , '$contact', '$email')";
  
// Execute the query and check whether it's successfull
if(mysqli_query($conn, $sql)) { echo "New record created successfully"; } 
else { echo "Error"; }
}
?>

</body>
</html>