
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>
    <?php
        echo "Home";
    ?>
</title>
<style>

body {
  background-image: url('homebackground.jpg');
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
         <li><a class="active" href="Home.php">Home</a></li>
         <li><a href="AddCustomer.php">Add New Customer</a></li>
         <li><a href="EditCustomerData.php">Edit Customer</a></li>
         <li><a href="AddStaff.php">Add New Staff</a></li>
         <li><a href="EditStaffData.php">Edit Staff Data</a></li>
         <li><a href="DeleteStaffData.php">Delete Staff Data</a></li>
    </ul>
    <br>
    <h2>Customer Info</h2>
    <br>
    <table width='120%' border=3>
        <tr>
            <th>CustomerID</th> 
            <th>Customer Name</th> 
            <th>Customer Address</th> 
            <th>Customer Phone Number</th> 
            <th>Customer Email</th>
            <th>Room Type</th> 
            <th>Room Number</th> 
            <th>Check In Date</th> 
            <th>Check Out Date</th>
            <th>Stay Period</th>
            <th>TotalPrice</th>
        </tr>
        <?php
    // Create database connection using config file
    include_once("ConnectDatabase.php");

    $databaseHost = 'localhost';
    $databaseName = 'HotelManagement';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


    $query = 'SELECT dt.CustomerID,CustomerName,CustomerAddress,CustomerPhone,CustomerEmail,RoomType,RoomNumber,CheckInDate,CheckOutDate,StayPeriod,TotalPrice 
    FROM DetailTransaction dt join HeaderTransaction ht on dt.HeaderTransactionID=ht.HeaderTransactionID join Customer cs on cs.CustomerID=dt.CustomerID join RoomType rm
    on rm.RoomTypeID=cs.RoomTypeID';
    $result = mysqli_query($mysqli, $query);

   


    if (!$query) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    while($user_data = mysqli_fetch_array($result)) {      
        echo "<tr>";
        echo "<td>".$user_data['CustomerID']."</td>";
        echo "<td>".$user_data['CustomerName']."</td>";
        echo "<td>".$user_data['CustomerAddress']."</td>";    
        echo "<td>".$user_data['CustomerPhone']."</td>";
        echo "<td>".$user_data['CustomerEmail']."</td>";
        echo "<td>".$user_data['RoomType']."</td>";
        echo "<td>".$user_data['RoomNumber']."</td>";
        echo "<td>".$user_data['CheckInDate']."</td>";
        echo "<td>".$user_data['CheckOutDate']."</td>";
        echo "<td>".$user_data['StayPeriod']."</td>";
        echo "<td>Rp. ".$user_data['TotalPrice']."</td>";
             
    }
    ?>
    </table>
    <br>
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
    <br>
    <h2>Room Type Info</h2>
    <table width='120%' border=3>
        <tr>
            <th>Room Type ID</th> 
            <th>Room Type Name</th> 
            <th>Price Per Day</th>  
        </tr>
        <?php
    // Create database connection using config file
    include_once("ConnectDatabase.php");

    $databaseHost = 'localhost';
    $databaseName = 'HotelManagement';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


    $query ='SELECT * FROM RoomType';
    $result = mysqli_query($mysqli, $query);

    if (!$query) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }

    while($user_data = mysqli_fetch_array($result)) {      
        echo "<tr>";
        echo "<td>".$user_data['RoomTypeID']."</td>";
        echo "<td>".$user_data['RoomType']."</td>";
        echo "<td>Rp. ".$user_data['RoomPrice']."</td>";            
    }
    ?>
    </table>
    <br>
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



</body>

</html>