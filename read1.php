<?php
//read1.php
require_once 'login.php';
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM trackEvents WHERE event='" . $_POST['eventName'] . "'";
$result = $conn->query($sql);

$competitionID = $row[0];
$studentName = $row[1];
$event = $row[2];
$year = $row[3];
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here is the roster for "." ". $_POST['eventName']."</H2>");

if ($result->num_rows > 0)
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>Competition ID</TH><TH>Student Name</TH><TH>Grade</TH></TR>";
	while($row = $result->fetch_assoc())
		{
			echo "<TR>";
			echo "<TD>".$row['competitionID']. "</TD><TD>".$row['studentName']. "</TD><TD>".$row['year'] ."</TD>";
			echo "<TD><form action= 'update1.php' method = 'post'>";
			echo "<button name = 'update'   type = 'submit' value =".$row['competitionID'].">Edit</button></FORM>";
			echo "<TD><form action= 'delete1.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['competitionID'].">Delete</button></FORM>";
			echo "</TR>";
		}
	echo "</TABLE>";
	}
	else{
		echo "<br> 0 results";
		}
echo"<br><form action= 'update1.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
echo '</body>';
?>