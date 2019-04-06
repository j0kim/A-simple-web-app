<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visitor Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
    <div id="register-box">
    <h1>Register Visitor</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table cellspacing="20">
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
            <td><label for="contact">Contact</label></td></td>
            <td><input type="tel" id="contact" name="contact" required="required"></td>
            </tr>
            <tr>
            <td><label for="idType">ID Type</label></td>
            <td><select id="idRype" name="idType">
            <option>===Select===</option>
            <option value="national_id">National ID</option>
            <option value="passport">Passport</option>
            <option value="driving_permit">Driving-Permit</option>
            </select>
            </td>
            </tr>
            <tr>
            <td><label for="id_number">ID Number</label></td>
            <td><input type="text" id="id_number" name="idNum" required="required"></td>
            </tr>
            <tr>
            <td><label for="reason">Reason</label></td>
            <td><input type="text" id="reason" name="reason" required="required"></td>
            </tr>
            <tr>
            <td><label for="residence">Residence</label></td>
            <td><input type="text" id="residence" name="residence" placeholder="Enter city" required="required"></td>
            </tr>
            <tr>
            <td><label for="visit_date">Visit Date</label></td>
            <td><input type="date" id="visit_date" name="visitDate" required="required"></td>
            </tr>
            <tr>
            <td><label for="visit_time_in">Visit Time IN</label></td>
            <td><input type="time" id="visit_time_IN" name="visitTimeIn"></td>
            </tr>
            <tr>
            <td><label for="visit_time_in">Visit Time OUT</label></td>
            <td><input type="time" id="visit_time_OUT" name="visitTimeOut"></td>
            </tr>
            
        </table>

        <button type="submit" class="btn" name="registerVisitor">Register</button>   
    </form>
    </div>

    <p class="back-to-dashboard"><a href="Dashboard.php">Back to dashboard</a></p>


<?php
include_once 'connect_mysql.php';

if (isset($_POST['registerVisitor'])) {
    // Get form data from the web page
    $fname=$_POST['firstname'];  
    $lname=$_POST['lastname'];  
    $gender=$_POST['gender'];    
    $contact=$_POST['contact']; 
    $idType=$_POST['idType']; 
    $idNum=$_POST['idNum'];  
    $reason=$_POST['reason'];  
    $residence=$_POST['residence'];    
    $visitDate=$_POST['visitDate']; 
    $timeIn=$_POST['visitTimeIn']; 
    $timeOut=$_POST['visitTimeOut'];

    // Store data into the visitors database
    $sql = "INSERT INTO visitors (FirstName, LastName, Gender, Contact, IdType, IDNumber, 
    Reason, Residence, VisitDate, VisitTimeIN, VisitTimeOUT)
    VALUES ('$fname', '$lname',' $gender' , '$contact', '$idType', '$idNum', '$reason', 
    '$residence', '$visitDate', '$timeIn', '$timeOut' )";
    
    // Execute the query and check whether it's successfull
    if(mysqli_query($conn, $sql)) { echo "New record created successfully"; } 
    else { echo "Error creating record"; }
    }

?>

</body>
</html>