<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<script type ="text/javascript" src = "CustomerFormRev.js"></script>
    <title>
    <?php
        echo "Edit Customer Data";
    ?>
    </title>
    <style>
     body {
  background-image: url('editcustomerbackground.jpg');
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
         <li><a class="active" href="EditCustomerData.php">Edit Customer</a></li>
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

    <h2>List Transaction ID </h2>
    <table width='120%' border=3>
        <tr>
            <th>Transaction ID</th> 
        </tr>
    
        <?php
        
            // Create database connection using config file
            include_once("ConnectDatabase.php");

            $databaseHost = 'localhost';
            $databaseName = 'HotelManagement';
            $databaseUsername = 'root';
            $databasePassword = '';

             $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


            $query ='SELECT HeaderTransactionID FROM HeaderTransaction';
            $result = mysqli_query($mysqli, $query);

            if (!$query) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }

            while($user_data = mysqli_fetch_array($result)) {      
                echo "<tr>";
                echo "<td>".$user_data['HeaderTransactionID']."</td>";
                    
            }
        
        ?>

    </table>

    <br>
<h2>Edit Customer Data</h2>
<form id="form1" action ="EditCustomerData.php" onsubmit="return validateform();" method="POST">
<table width="55%" border="0">
    <tr>
        <td> Customer ID Before Update ( CU[0-9][0-9][0-9] ) </td>
        <td><input type="text" name="CustomerID1"></td>
    </tr>
    <tr>
        <td> Customer ID After Update ( CU[0-9][0-9][0-9] ) </td>
        <td><input type="text" name="CustomerID2"></td>
    </tr>
    <tr>
        <td> Customer Name </td>
        <td><input type="text" name="CustomerName"></td>
    </tr>
    <tr>
        <td> Customer Address</td>
        <td><input type="text" name="CustomerAddress" id="alamat"></td>
    </tr>
    <tr>
        <td> Customer Phone</td>
        <td><input type="text" name="CustomerPhone" id="phone"></td>
    </tr>
    <tr>
        <td> Customer Email</td>
        <td><input type="text" name="CustomerEmail" id="email"></td>
    </tr>
    <tr>
        <td> Type Room ID (RT[0-9][0-9][0-9])</td>
        <td><input type="text" name="TypeRoomID"></td>
    </tr>
    <tr>
        <td> Room Number</td>
        <td><input type="text" name="RoomNumber" id="roomnumber"></td>
    </tr>
    <tr>
        <td> CheckIn Date (Year-Month-Day) </td>
        <td><input type="text" name="CheckInDate"></td>
    </tr>
    <tr>
        <td> CheckOut Date (Year-Month-Day) </td>
        <td><input type="text" name="CheckOutDate"></td>
    </tr>
    <tr>
        <td>Stay Period (Day) </td>
        <td><input type="text" name="StayPeriod"></td>
    </tr>
    <tr>
        <td> Total Price (Rupiah) </td>
        <td><input type="text" name="TotalPrice"></td>
    </tr>
    <tr>
        <td> TransactionID Before Update(TR[0-9][0-9][0-9])</td>
        <td><input type="text" name="TransactionID1"></td>
    </tr>
    <tr>
        <td> TransactionID After Update(TR[0-9][0-9][0-9])</td>
        <td><input type="text" name="TransactionID2"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Edit Customer Data">
        </td>
        <td><label id="lblError" style="color: red"></label></td>
    </tr> 
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
    $CustomerID1 = $_POST['CustomerID1'];
    $CustomerID2 = $_POST['CustomerID2'];
    $CustomerName = $_POST['CustomerName'];
    $CustomerAddress = $_POST['CustomerAddress'];
    $CustomerPhone = $_POST['CustomerPhone'];
    $CustomerEmail = $_POST['CustomerEmail'];
    $TypeRoomID = $_POST['TypeRoomID'];
    $CheckInDate = $_POST['CheckInDate'];
    $CheckOutDate= $_POST['CheckOutDate'];
    $StayPeriod = $_POST['StayPeriod'];
    $TotalPrice = $_POST['TotalPrice'];
    $TransactionID1 = $_POST['TransactionID1'];
    $TransactionID2 = $_POST['TransactionID2'];
    $RoomNumber = $_POST['RoomNumber'];

    // include database connection file
    include "ConnectDatabase.php";

    
    $query1 = "update headertransaction set HeaderTransactionID='$TransactionID2',CheckInDate='$CheckInDate',CheckOutDate='$CheckOutDate',StayPeriod='$StayPeriod',TotalPrice='$TotalPrice',StaffID='ST004' where HeaderTransactionID='$TransactionID1' ";
    $query2 = "update customer set CustomerID='$CustomerID2',CustomerName='$CustomerName',CustomerAddress='$CustomerAddress',CustomerPhone='$CustomerPhone',CustomerEmail='$CustomerEmail',RoomTypeID='$TypeRoomID',RoomNumber='$RoomNumber' where CustomerID='$CustomerID1' ";
    $query3 = "update detailtransaction set CustomerID='$CustomerID2',HeaderTransactionID='$TransactionID2' where CustomerID='$CustomerID1' And HeaderTransactionID='$TransactionID1' ";
    $result1 = mysqli_query($mysqli, $query2);
    $result2 = mysqli_query($mysqli, $query3);
    $result3 = mysqli_query($mysqli, $query1);
    mysqli_close($mysqli);
   
    
    
}
?>

</body>
</html>

