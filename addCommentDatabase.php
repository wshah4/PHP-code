<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
		<title> Add Comment Database </title>

	</head>

	<body> 
	
			<?php
				
				if(!empty($_POST["name"]) && !empty($_POST["email"]) &&!empty(trim($_POST["comment"]))){
					
					define("DATABASE", "");
					define("USERNAME", "");
					define("PASSWORD", "");

					
					
					$connection = mysqli_connect(DATABASE, USERNAME, PASSWORD);
					
					$name = $_POST["name"];
					$email = $_POST["email"];
					$comment = $_POST["comment"];
					$duplicateComment = 0;
					
					
					if($connection){
						$selection = mysqli_select_db($connection, USERNAME);
							if($selection){
							
								$result = mysqli_query($connection, "Select commentId from commentLog where name = '$name'");
								$rows = mysqli_num_rows($result);
															
								if($rows > 0){
									echo "Comment has aready been made by user on this post. Unable to add new comment. <br />";
								}else{
									if(mysqli_query($connection, "Insert into commentLog (name, email, comment) Values ('$name', '$email', '$comment')")){
										echo "Comment added Successfuly <br/>";
									}else{
										echo "Comment could not be added <br />";
									}
								}
								
								
								
							}else{
								die ("database selection unsuccessfull <br />");
							}
						
					}else{
						die("Connection was not successful");
					}
					
					
					
					
					echo "<hr>";
					echo "<a href = '../lab4/database.html'> Add a new comment to Database</a><br />";
					echo "<a href = '../lab4/viewCommentsDatabase.php'> View Comments from Database</a><br />";
					echo "<a href = '../practice_lab/labAssignment4.shtml'> Add comment to text file </a><br />";

				
				}else{
					echo "Please fill out the all fields <br />";
					echo "<a href = '../lab4/database.html'> Return to main post </a><br />";
				}
				
			?>
			
	</body>

</html>


