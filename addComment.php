<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> Add Comment to Text File </title>

	</head>

	<body> 
	
			<?php
				
				if(!empty($_POST["name"]) && !empty($_POST["email"]) &&!empty(trim($_POST["comment"]))){
					$name = $_POST["name"];
					$email = $_POST["email"];
					$comment = $_POST["comment"];
					$duplicateComment = 0;
					$filePresent = file_exists("commentLog.txt");

					if($filePresent == true){
						$fileData = file("commentLog.txt");
						$dataAmount = count($fileData);
						
						$i = 0;
						while($i < $dataAmount && $duplicateComment == 0){
							$dataField = explode("~" , $fileData[$i]);
							if(strcasecmp($name, $dataField[0])==0){
								$duplicateComment = 1;
							}
							$i ++;
						}
					}
					
					if($duplicateComment == 0){
						$newComment = $name."~".$email."~".addslashes($comment)."\n";
						$log = fopen("commentLog.txt", "a");
						$successfulWrite = fwrite($log, $newComment);
						fclose($log);
						
						if($successfulWrite > 0){
							echo "Comment was added sucessfully <br />";
							echo "Name = <a href='mailto:$email'> $name <a/><br />";
							echo "Comment = $comment <br />";
						}
						
					}else{
						echo "Comment has aready by user on this post. Unable to add new comment. <br />";
					}
					
					echo "<hr>";
					echo "<a href = '../practice_lab/labAssignment4.shtml'> Add a new comment to text file </a><br /><br />";
					echo "<a href = '../lab4/viewComments.php'> View text file comments </a><br /><br />";
					echo "<a href ='../lab4/database.html'> Add Comment to DataBase </a><br/><br/>";

				
				}else{
					echo "Please fill out the all fields";
					echo "<a href = '../practice_lab/labAssignment4.shtml'> Return to main post </a><br />";
				}
				
			?>
			
	</body>

</html>


