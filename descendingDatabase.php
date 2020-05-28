<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> Database Comments Descending </title>

	</head>

	<body> 
	
	<h1> POST </h1><br />
		<p> Dogs have fewer cone receptors than humans. Due to which they cant see as many colors as humans.</p>
		<br /><br /><hr>
		
	<h2>Database Comments Descending Order</h2><br/>
	
		<?php	
		
		define("DATABASE", "");
		define("USERNAME", "");
		define("PASSWORD", "");

		$connection = mysqli_connect(DATABASE, USERNAME, PASSWORD);
		
		if($connection){
			$selection = mysqli_select_db($connection, USERNAME);
				if($selection){
						$result = mysqli_query($connection, "select name, email, comment from commentLog order by name desc");
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
								echo "No available comments <br/><hr>";
							}
				
				}else{
					die("Not able to select database");
				}
		}else{
			die("Not able to connect with server");
		}	

		?>

		<br />
		<a href ="../lab4/ascendingDatabase.php"> Sort A-Z </a><br />
		<a href ="../lab4/descendingDatabase.php"> Sort Z-A </a><br />
		<a href ="../lab4/viewCommentsDatabase.php"> Return to view database comments </a><br /><br />
		


		</form>
		
	</body>

</html>


