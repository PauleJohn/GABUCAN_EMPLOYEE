<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$Gender=$_POST['Gender'];
	$Department=$_POST['Department'];
	$DateEmployed=$_POST['DateEmployed'];
	$Salary=$_POST['Salary'];
	
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

	} else {	
		//updating the table
		$sql = "UPDATE tbl_employees SET FirstName=:FirstName,LastName=:LastName,Gender=:Gender,Department=:Department,DateEmployed=:DateEmployed,Salary=:Salary WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':FirstName', $FirstName);
		$query->bindparam(':LastName', $LastName);
		$query->bindparam(':Gender', $Gender);
		$query->bindparam(':Department', $Department);
		$query->bindparam(':DateEmployed', $DateEmployed);
		$query->bindparam(':Salary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':FirstName' => $FirstName, ':LastName' => $LastName, ':Gender' => $Gender ':Department' => $Department, ':DateEmployed' => $DateEmployed,) ':Salary' => $Salary,);
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_employees WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$FirstName = $row['FirstName'];
	$LastName = $row['LastName'];
	$Gender = $row['Gender'];
	$Department  = $row['Department'];
	$DateEmployed  = $row['DateEmployed'];
	$Salary = $row['Salary'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>FirstName</td>
				<td><input type="text" name="FirstName" value="<?php echo $FirstName;?>"></td>
			</tr>
			<tr> 
				<td>LastName</td>
				<td><input type="text" name="LastName" value="<?php echo $LastName;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="Gender" value="<?php echo $Gender;?>"></td>
			</tr>
			<tr> 
				<td>Department </td>
				<td><input type="text" name="Department" value="<?php echo $Department;?>"></td>
			</tr>
			<tr> 
				<td>DateEmployed</td>
				<td><input type="text" name="DateEmployed" value="<?php echo $DateEmployed;?>"></td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="Salary" value="<?php echo $Salary;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
