<?php 


	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	$userNewCount = $_POST['userNewCount']; //getting the userNewCount from jquery code that passed this date 
	
    $query0= "SELECT * FROM users  WHERE deleted = 0 LIMIT $userNewCount";//evry time btn #showMoreUsers will be clicked more users will be shown
	$result0= mysqli_query($dbc, $query0)
	or die ('error with connection');
	
	if(mysqli_num_rows($result0) >0)
	{
		 while($row = mysqli_fetch_array($result0)) // as long as there are rows of data 
	   {
		  $userid = $row['id'];
		   echo "<li ><a href='adminusers.php?id=$userid'><span class= 'strong'>Name:</span> ".$row['name']."&nbsp; &nbsp;"."<span class= 'strong'> User Name:</span> ".$row['username']."</a></li><br/>";
	   }
	}
	else { echo "There are no users";}
?>