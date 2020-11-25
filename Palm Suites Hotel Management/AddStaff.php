<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'HotelManagement';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type ="text/javascript" src = "StaffForm.js"></script>
<Title>
    <?php
        echo "Add New Staff";
    ?>
</Title>
<style>
    body {
  background-image: url('addstaffbackground.jpg');
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
         <li><a class="active" href="AddStaff.php">Add New Staff</a></li>
         <li><a href="EditStaffData.php">Edit Staff Data</a></li>
         <li><a href="DeleteStaffData.php">Delete Staff Data</a></li>
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
<h2>Job Position Info</h2>
    <table width='120%' border=3>
        <tr>
            <th>Job ID</th> 
            <th>Job Position</th> 
        </tr>
        <?php
    // Create database connection using config file
    include_once("ConnectDatabase.php");

    $databaseHost = 'localhost';
    $databaseName = 'HotelManagement';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


    $query ='SELECT * FROM Job';
    $result = mysqli_query($mysqli, $query);

    if (!$query) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    while($user_data = mysqli_fetch_array($result)) {      
        echo "<tr>";
        echo "<td>".$user_data['JobID']."</td>";
        echo "<td>".$user_data['JobName']."</td>";           
    }
    ?>
    </table>
<br>
<h2>Add New Staff</h2>
<form id="form1" action ="AddStaff.php" method="POST" onsubmit="return validateform();">
<table width="35%" border="0">
    <tr>
        <td> Staff ID ( ST[0-9][0-9][0-9] ) </td>
        <td><input type="text" name="StaffID"></td>
    </tr>
    <tr>
        <td> Staff Name </td>
        <td><input type="text" name="StaffName"></td>
    </tr>
    <tr>
        <td> Staff Address</td>
        <td><input type="text" name="StaffAddress" id="alamat"></td>
    </tr>
    <tr>
        <td> Staff Phone</td>
        <td><input type="text" name="StaffPhone" id="phone"></td>
    </tr>
    <tr>
        <td> Staff Email</td>
        <td><input type="text" name="StaffEmail" id="email"></td>
    </tr>
    <tr>
        <td> Staff Gender</td>
        <td>
            <select name="StaffGender" id="gender">
            <option value="">-Pilih Gender-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>           
            </select>
        </td>
    </tr>
    <tr>
        <td> Job Id (JB[0-9][0-9][0-9])</td>
        <td><input type="text" name="JobID"></td>
    </tr>
    <tr>
        <td> Staff Salary ( Per Month ) </td>
        <td><input type="text" name="StaffSalary"></td>
    </tr>
    <tr>
        <td>Staff Age</td>
        <td><input type="text" name="StaffAge" id="age"></td>
    </tr>
    <tr>
    <td>
        <input type="submit" value="Add New Staff" >
    </td>
    <td><label id="lblError" style="color: red"></label></td>
</table>
 

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
    $StaffName = $_POST['StaffName'];
    $StaffAddress = $_POST['StaffAddress'];
    $StaffPhone = $_POST['StaffPhone'];
    $StaffEmail = $_POST['StaffEmail'];
    $StaffGender = $_POST['StaffGender'];
    $JobID= $_POST['JobID'];
    $StaffSalary = $_POST['StaffSalary'];
    $StaffAge = $_POST['StaffAge'];

    // include database connection file
    include "ConnectDatabase.php";

    $query1 = "insert into staff values ('$StaffID','$StaffName','$StaffSalary','$StaffAddress','$StaffPhone','$StaffEmail','$StaffGender','$StaffAge','$JobID')";
    $result1 = mysqli_query($mysqli, $query1);
    mysqli_close($mysqli);
   
    
    
}
?>


</body>
</html>

