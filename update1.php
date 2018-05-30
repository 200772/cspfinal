<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template1.html');
        exit;   
    }
else
    {
        echo $competitionID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM trackEvents WHERE competitionID='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $competitionID = $row[0];
        $StudentName = $row[1];
        $event = $row[2];
        $year = $row[3];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['StudentName'].".";
	                    echo "<TABLE><TR><TH>Student ID</TH><TH>Student Name</TH><TH>event</TH><TH>Grade</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['competitionID']. "</TD><TD>". $row['StudentName']. "</TD><TD>". $row['event']. "</TD><TD>".$row['year'] ."</TD></TR>";
	                    echo "<form action='changeItem1.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = competitionID value=".$row['competitionID']." event='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='StudentName' event='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='eventName'>";
                        echo "<option value='100 Meter' >100 Meter</option>";
                        echo "<option value='110 & 100 Meter Hurdles' >110 & 100 Meter Hurdles</option>";
                        echo "<option value='200 Meter' >200 Meter</option>";
                        echo "<option value='300 Intermediate Hurdles' >300 Intermediate Hurdles</option>";
                        echo "<option value='400 Meter' >400 Meter</option>";
                        echo "<option value='800 Meter' >800 Meter</option>";
                        echo "<option value='1600 Meter' >1600 Meter</option>";
                        echo "<option value='3200 Meter' >3200 Meter</option>";
                        echo "<option value='4x100 Meter' >4x100 Meter</option>";
                        echo "<option value='4x200 Meter' >4x200 Meter</option>";
                        echo "<option value='4x400 Meter' >4x400 Meter</option>";
                        echo "<option value='4x800 Meter' >4x800 Meter</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='year'>";
                        echo "<option value='9' >9</option>";
                        echo "<option value='10' >10</option>";
                        echo "<option value='11' >11</option>";
                        echo "<option value='12' >12</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>