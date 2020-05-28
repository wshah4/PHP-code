<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> View Text File Comments </title>

	</head>

	<body> 
	
	<h1> POST </h1><br />
		<p> Dogs have fewer cone receptors than humans. Due to which they cant see as many colors as humans.</p>
		<br /><br /><hr>
		
	<h2>Text File Comments</h2><br/>
	
		<?php	
		
			function deleteLine($fileName, $lineNum){
					
				$lineNumber = $lineNum - 1;
				$list = file("commentLog.txt");
									
				unset($list[$lineNumber]);
				array_values($list);
				
				$log = fopen("commentLog.txt", "w+");
					foreach($list as $line){
						fwrite($log, $line);
					}
					
				$successful = fclose($log);

				$newList = file("commentLog.txt");
				$count = count($newList);
				$numberMarker = 1;

				for($i = 0; $i < $count; $i++){
					$data = explode("~", $newList[$i]);
						echo "$numberMarker : ";
						echo " Name: <a href='mailto:$data[1]'> $data[0] </a><br />";
						echo "Comment: $data[2] <br />";
					$numberMarker ++;
					echo "<hr>";
						
				}	
			}	

			if(file_exists("commentLog.txt") && !filesize("commentLog.txt")== 0){
						
				if(isset($_POST["deleteNumber"])){
					deleteLine("commentLog.txt", $_POST["deleteNumber"]);
				}else{
					$list = file("commentLog.txt");
					$count = count($list);
					
					echo "<hr>";
					$numberMarker = 1;
					for($i = 0; $i < $count; $i++){
						$data = explode("~", $list[$i]);
							echo "$numberMarker : ";
							echo " Name: <a href='mailto:$data[1]'> $data[0] </a><br />";
							echo "Comment: $data[2] <br />";
						$numberMarker ++;
						echo "<hr>";
							
					}	
				}
		

			}else{
				echo "No Comments Exist to Show. <br />";
			}


			

		?>

		<br />
		<a href ="../lab4/ascending.php"> Sort A-Z </a><br />
		<a href ="../lab4/descending.php"> Sort Z-A </a><br />
		<a href ="../practice_lab/labAssignment4.shtml"> Add new text file comment </a><br /><br />
		<a href ='../lab4/database.html'> Add Comment to DataBase </a><br/><br/>
		
		<form action="../lab4/viewComments.php" method="post">
			Delete Comment Number : <input type="text" name="deleteNumber"> <br/><br/>
			<input type ="submit" value="Delete">

		</form>
		
	</body>

</html>


