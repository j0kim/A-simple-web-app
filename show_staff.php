<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<h1>Staff Table</h1>
 
<?php

include ('connect_mysql.php');

$sqlget = "SELECT * FROM staff";
$sqldata = mysqli_query($conn, $sqlget) or 
die ('Error getting data from database');

echo "<table cellspacing='20'>";
echo "<tr><th>StaffId</th><th>FirstName</th><th>LastName</th><th>Gender</th><th>Contact</th><th>Email</th></tr>";

// Loop through all the data in the database
while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $row['StaffId'];
    echo "</td><td>";
    echo $row['FirstName'];
    echo "</td><td>";
    echo $row['LastName'];
    echo "</td><td>";
    echo $row['Gender'];
    echo "</td><td>";
    echo $row['Contact'];
    echo "</td><td>";
    echo $row['Email'];
    echo "</td></tr>";
}

echo "</table>";

?>

    <p class="back-to-dashboard"><a href="Dashboard.php">Back to dashboard</a></p>
</body>
</html>