<?php 

	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	$articleNewCount = $_POST['articleNewCount']; //getting the articleNewCount from jquery code that passed this date 
    $query0= "SELECT * FROM articles  WHERE deleted = 0 LIMIT $articleNewCount";
	$result0= mysqli_query($dbc, $query0)
	or die ('error with connection');
	
	if(mysqli_num_rows($result0) >0)
	{
		 while($row = mysqli_fetch_array($result0)) // as long as there are rows of data 
	   {
		  $articleid = $row['id'];
		   echo "<li ><a href='adminArticle.php?id=$articleid'>".$row['title']."</a></li><br/>";
	   }
	}
	else { echo "There are no articles";}
?>