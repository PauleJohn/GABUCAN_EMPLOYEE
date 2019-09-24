<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Gender = $_POST['Gender'];
	$Department = $_POST['Department'];
	$DateEmployed  = $_POST['DateEmployed'];
	$Salary  = $_POST['Salary'];
		
	// checking empty fields
	if(empty($FirstName) || empty($LastName) || empty($Gender) || empty($Department) || empty($DateEmployed) || empty($Salary)) {
				
		if(empty($FirstName)) {
			echo "<font color='red'>FirstName field is empty.</font><br/>";
		}
		
		if(empty($LastName)) {
			echo "<font color='red'>LastName field is empty.</font><br/>";
		}
		
		if(empty($Gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		if(empty($Department)) {
			echo "<font color='red'>Department field is empty.</font><br/>";
		}
		if(empty($DateEmployed)) {
			echo "<font color='red'>DateEmployed field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>Salary field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_employees(FirstName, LastName, Gender, Department, DateEmployed, Salary) VALUES(:FirstName, :LastName, :Gender, :Department, :DateEmployed, :Salary)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':FirstName', $FirstName);
		$query->bindparam(':LastName', $LastName);
		$query->bindparam(':Gender', $Gender);
		$query->bindparam(':Department', $Department);
		$query->bindparam(':DateEmployed', $DateEmployed);
		$query->bindparam(':Salary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':FirstName' => $FirstName, ':LastName' => $LastName, ':Gender' => $Gender ':Department' => $Department, ':DateEmployed' => $DateEmployed, ':Salary' => $Salary,));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
