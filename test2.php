<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM whichEvents WHERE eventName='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $studentName = $row[0];
        $eventName = $row[1];
        $age = $row[2];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['eventName'].".";
	                    echo "<TABLE><TR><TH>studentName</TH><TH>eventName</TH><TH>age</TH>";
                        echo "<TR>";
	                    echo "<TD>".$row['studentName']. "</TD><TD>". $row['eventName']. "</TD><TD>". $row['age']. "</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = studentName value=".$row['studentName']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='lastName' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='eventName'>";
                        echo "<option value='Driver' >driver</option>";
                        echo "<option value='3 wood' >3 wood</option>";
                        echo "<option value='4 iron' >4 iron</option>";
                        echo "<option value='5 iron' >5 iron</option>";
                        echo "<option value='6 iron' >6 iron</option>";
                        echo "<option value='7 iron' >7 iron</option>";
                        echo "<option value='8 iron' >8 iron</option>";
                        echo "<option value='9 iron' >9 iron</option>";
                        echo "<option value='pitching wedge >pitching wedge</option>";
                        echo "<option value='putter' >putter</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='age'>";
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