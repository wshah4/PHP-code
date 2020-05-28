<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> View Database Comments </title>

	</head>

	<body> 
	
	<h1> POST </h1><br />
		<p> Dogs have fewer cone receptors than humans. Due to which they cant see as many colors as humans.</p>
		<br /><br /><hr>
		
	<h2>Database Comments</h2><br/>
	
		<?php	
		
		$comparison = array();
		define("DATABASE", "");
		define("USERNAME", "");
		define("PASSWORD", "");

		$connection = mysqli_connect(DATABASE, USERNAME, PASSWORD);
		
		if($connection){
			$selection = mysqli_select_db($connection, USERNAME);
				if($selection){
					if(isset($_POST["deleteName"])){
						echo "Comment Deleted <br/><br/>";
						deleteComment($connection, $_POST["deleteName"]);
					}else{
						$result = mysqli_query($connection, "select name, email, comment from commentLog");
							$rows = mysqli_num_rows($result);
							if($rows > 0){
								for($i = 0; $i < $rows; $i++){
									$index = $i +1;
									mysqli_data_seek($result, $i);
									$row = mysqli_fetch_row($result);
									echo "$index : ";
									echo "Name : <a href = 'mailto:$row[1]'> $row[0] </a><br />";
									echo "Comment : $row[2]<br /><hr>";
								}	
							}else{
								echo "No available Comments <br/>";
							}
					}
					
				}else{
					die("Not able to select database");
				}
		}else{
			die("Not able to connect with server");
		}
		
		function deleteComment($connection, $deleteName){
			$result = mysqli_query($connection, "select name from commentLog");
				if(mysqli_num_rows($result)>0){
					@ mysqli_query($connection, "delete from commentLog where name = '$deleteName'") or die ("Record not found, can not delete <br/>");
				}
				
				$query = mysqli_query($connection, "select name, comment from commentLog");
				$index = 1;
				while($row = mysqli_fetch_assoc($query)){
					echo "$index . "."Name : ".$row["name"]."<br />"."Comment : ".$row["comment"]."<br /><hr>";
					$index++;
				}
		}
		
		

		?>

		<br />
		<a href ="../lab4/ascendingDatabase.php"> Sort database comments A-Z </a><br />
		<a href ="../lab4/descendingDatabase.php"> Sort database comments Z-A </a><br />
		<a href ="../practice_lab/labAssignment4.shtml"> Add New Comment To Text File </a><br />
		<a href ="../lab4/database.html"> Add New Comment To Database </a><br /><br />
		
		<form action="../lab4/viewCommentsDatabase.php" method="post">
			Delete Comment by entering the users name : <input type="text" name="deleteName"> <br/><br/>
			<input type ="submit" value="Delete">

		</form>
		
	</body>

</html>


