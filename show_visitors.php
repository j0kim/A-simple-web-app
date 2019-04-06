<?php
session_start(); // Starts the Session
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show visitors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <div id="search-box">
        <h1>Find Visitors</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <p><input id="searchInput" type="text" name="search" placeholder="Search"></p>
            <button class="btn" type="submit" name="Search" value="Search">Search</button>
            <button class="btn" type="submit" name="showAll" value="show_all">Show All</button>
        </form>
        
    </div>

    <?php

include ('connect_mysql.php');

// $fname = $_GET['search'];

// Code to show all the visitors in the database
if(isset($_POST["showAll"])) {
    $sqlget = "SELECT * FROM visitors";
    $sqldata = mysqli_query($conn, $sqlget) or 
    die ('Error getting data from database');

    echo "<table cellspacing='20'>";
    echo "<tr><th>FirstName</th><th>LastName</th><th>Gender</th><th>Contact</th><th>IDType</th><th>IDNumber</th><th>Reason</th><th>Residence</th><th>VisitDate</th><th>VisitTimeIN</th><th>VisitTimeOUT</th></tr>";

    // Loop through all the data in the database
    while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
        echo "<tr><td>";
        echo $row['FirstName'];
        echo "</td><td>";
        echo $row['LastName'];
        echo "</td><td>";
        echo $row['Gender'];
        echo "</td><td>";
        echo $row['Contact'];
        echo "</td><td>";
        echo $row['IDType'];
        echo "</td><td>";
        echo $row['IDNumber'];
        echo "</td><td>";
        echo $row['Reason'];
        echo "</td><td>";
        echo $row['Residence'];
        echo "</td><td>";
        echo $row['VisitDate'];
        echo "</td><td>";
        echo $row['VisitTimeIN'];
        echo "</td><td>";
        echo $row['VisitTimeOUT'];
        echo "</td></tr>";
    }

echo "</table>";

}

if(isset($_POST["Search"])) {

    $search_value=$_POST['search'];

    $sql="SELECT * FROM visitors where FirstName like '%$search_value%' OR 
    LastName like '%$search_value%' OR Residence like '%$search_value%' OR
    Reason like '%$search_value%' OR Contact like '%$search_value%'";
    $sqldata = mysqli_query($conn, $sql) or 
    die ('Error getting data from database');

    echo "<table cellspacing='20'>";
    echo "<tr><th>FirstName</th><th>LastName</th><th>Gender</th><th>Contact</th><th>IDType</th><th>IDNumber</th><th>Reason</th><th>Residence</th><th>VisitDate</th><th>VisitTimeIN</th><th>VisitTimeOUT</th></tr>";

    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        echo "<tr><td>";
        echo $row['FirstName'];
        echo "</td><td>";
        echo $row['LastName'];
        echo "</td><td>";
        echo $row['Gender'];
        echo "</td><td>";
        echo $row['Contact'];
        echo "</td><td>";
        echo $row['IDType'];
        echo "</td><td>";
        echo $row['IDNumber'];
        echo "</td><td>";
        echo $row['Reason'];
        echo "</td><td>";
        echo $row['Residence'];
        echo "</td><td>";
        echo $row['VisitDate'];
        echo "</td><td>";
        echo $row['VisitTimeIN'];
        echo "</td><td>";
        echo $row['VisitTimeOUT'];
        echo "</td></tr>";
    }   
        
    echo "</table>";    
}



?>
    <p class="back-to-dashboard"><a href="Dashboard.php">Back to dashboard</a></p>

</body>
</html>