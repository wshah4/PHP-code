<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> Main Post </title>

	</head>

	<body> 
	
	<?php
		
		$ascending = file("commentLog.txt");
		sort($ascending);
		print_r($ascending);echo "<br /><br />";
		
		$index = 1;
		$count = count($ascending);
		for($i = 0; $i < $count ; $i++){
			$data = explode("~", $ascending[$i]);
			echo "$index : ";
			echo " Name: <a href='mailto:$data[1]'> $data[0] </a><br />";
			echo "Comment: $data[2] <br />";
			echo "<hr>";
			$index ++;
		}
	?>
	
	<br/>
	<a href = "../lab4/viewComments.php"> Return to Comment Log </a><br />
	<a href = "../practice_lab/labAssignment4.shtml"> Add a new Comment </a>

	</body>

</html>


