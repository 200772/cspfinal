<HTML>
    <HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")	//Check it is coming from a form
    {
        require_once 'login.php';				//mysql credentials

	    //delcare PHP variables
	    $competitionID = $_POST["competitionID"];
	    $studentName = $_POST["studentName"];			//The values in the $_POST must match the names given from the HTML document
	    $eventName = $_POST["eventName"];
	    $year = $_POST["year"];
	    
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if ($mysqli->connect_error) 
            {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	        }   
        if ($_POST['studentName']!= "")
            {
                
	
		$statement = $mysqli->prepare("UPDATE trackEvents SET studentName= ?, event=?, year=? WHERE competitionID = ?"); //prepare sql insert query - thank you(https://stackoverflow.com/questions/6514649/php-mysql-bind-param-how-to-prepare-statement-for-update-query)
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssss', $studentName, $eventName, $year, $competitionID); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br("You have sucessfully updated "." ". $studentName . "'s information to be;\r\n event " . $eventName." & in ". $year . "th year", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}
                
            }
    }
echo "<br><form action= 'update1.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form></body>";
?>