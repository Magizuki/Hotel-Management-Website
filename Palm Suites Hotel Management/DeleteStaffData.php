<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
        echo "Delete Staff Data";
    ?>
    </title>
    <style>
     body {
  background-image: url('deletestaff.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #ff6600;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #ffb380;
}

.active {
  background-color: #4CAF50;
}
table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}
    tr:nth-child(odd){background-color: #bfbfbf}

    th {
        background-color: #e67300;
        color: white;
    }
h1{
    font-size: 500%;
    font-family:impact;
    color:#ffdf80;
    text-align:center;
}
h2{
    font-family:georgia;
    text-align:center;
    font-size: 300%;
    color:#ffc61a;
}
    </style>
</head>
<body bgcolor="#ffc266">
<h1>Palm Suites Hotel</h1>
<br>
<ul>
         <li><a href="Home.php">Home</a></li>
         <li><a href="AddCustomer.php">Add New Customer</a></li>
         <li><a href="EditCustomerData.php">Edit Customer</a></li>
         <li><a href="AddStaff.php">Add New Staff</a></li>
         <li><a href="EditStaffData.php">Edit Staff Data</a></li>
         <li><a class="active"  href="DeleteStaffData.php">Delete Staff Data</a></li>
</ul>
<br>
<h2>Staff Info</h2>
<br>
<table width='120%' border=3>
        <tr>
            <th>StaffID</th> 
            <th>Staff Name</th> 
            <th>Staff Address</th> 
            <th>Staff Phone Number</th> 
            <th>Staff Email</th>
            <th>Staff Gender</th> 
            <th>Staff Job</th> 
            <th>Staff Salary ( Per Month )</th> 
            <th>Staff Age</th>
        </tr>
    <?php
    // Create database connection using config file
    include_once("ConnectDatabase.php");

    $databaseHost = 'localhost';
    $databaseName = 'HotelManagement';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


    $query = 'SELECT Staff.StaffID,StaffName,StaffAddress,StaffPhone,StaffEmail,StaffGender,JobName,StaffSalary,StaffAge FROM Staff join job on Staff.JobID=Job.JobID ORDER BY Staff.StaffID ';
    $result = mysqli_query($mysqli, $query);
    if (!$query) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    while($user_data = mysqli_fetch_array($result)) {      
        echo "<tr>";
        echo "<td>".$user_data['StaffID']."</td>";
        echo "<td>".$user_data['StaffName']."</td>";
        echo "<td>".$user_data['StaffAddress']."</td>";    
        echo "<td>".$user_data['StaffPhone']."</td>";
        echo "<td>".$user_data['StaffEmail']."</td>";
        echo "<td>".$user_data['StaffGender']."</td>";
        echo "<td>".$user_data['JobName']."</td>";
        echo "<td>Rp. ".$user_data['StaffSalary']."</td>";
        echo "<td>".$user_data['StaffAge']."</td>";
             
    }
    ?>
    </table>
    <br>
    <h2> Delete Staff Data </h2>
    <form action="DeleteStaffData.php" method="POST">
        <th>StaffID :</th> 
        <input type="text" name="StaffID">
        <td><button type="submit" onclick="alert('Staff Deleted successfully')">Delete Staff Data</button></td>
    </form>
    <?php

$databaseHost = 'localhost';
$databaseName = 'HotelManagement';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (mysqli_connect_errno()) {
    die("Failed to connect to db: " . mysqli_connect_error());
  }


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
    $StaffID = $_POST['StaffID'];
   

    // include database connection file
    include "ConnectDatabase.php";

    $query1 = "Delete FROM Staff Where StaffID='$StaffID' ";
    $result1 = mysqli_query($mysqli, $query1);
    mysqli_close($mysqli);
   
}
?>


</body>
</html>