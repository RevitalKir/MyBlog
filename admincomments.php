<?php
	session_start();
 
	if(!isset($_SESSION['administrator']))
	{
		exit;
	}
	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	require_once('header.php');
	$article_id = $_GET['artid'];// articleid passed through the query string
	//$comment_id = $_GET['comid'];
?>


	
    	<div class ="header-content home-header">
        <h1>Admin Commenents</h1>
        </div>
    </header>
<!--login message for logedin users-->
<div class="parallax parallax-home  parallax-top"></div>
<div class="w3-container position-rel">
   <div class="registration">
      <p><?php echo $_SESSION['message'];?></p>
  </div>
</div>
<?php
	require_once('admin_navigation.php');
?>
    
    <div class="parallax parallax-home parallax-menu"> </div>

<main class="admin">
    <div class="heading align-center">
        <h2>Edit comments</h2>
    </div>
	<div class="comments-list">
<?php 
    $query= "SELECT * FROM  commentform  WHERE article_id=$article_id AND publish=0" ;//choes un published comments from this article
	$result= mysqli_query($dbc, $query)
	or die ('error with connection');
?>
	
		
 <?php               
	 while($row = mysqli_fetch_array($result)) // as long as there are rows of data 
   {  
   	  $commentid= $row['id'];
   	  echo	"<form action='#' method='POST' class='edit-comments-form'> "; 
	  echo "<div class='admin-comment'>";
	  echo "<label class='strong'>Name</label>".
	  "<p>". $row['name']."</p> <br/>";
	  echo "<label class='strong'>comment</label>".
	   "<p>". $row['comment']."</p> <br/>";
	 echo "<div class='btn-submit'>";
	echo  "<input name='submit' type='submit' value='Publiscch comment". $commentid."'></div>";
	echo  "</div><!--end of .admin-comment-->";
	echo "</form><hr>";
 
	if(isset($_POST['submit'])&&$_SERVER["REQUEST_METHOD"]== "POST")
	{ //$comment_id=$_GET['comid'];

		echo "the comment is " .$commentid;
			$query1= "UPDATE commentform 
			SET publish = 1
			WHERE id = '$comment_id'";
		$result1= mysqli_query($dbc, $query1)
		or die ('error with connection');
		//header("Refresh:0");
	}
	echo "<br/><br/>";
}
   
?>

		</div><!--end of .comments-list-->
 <div class="parallax parallax-home parallax-main"> </div>

 </main>

<?php
require_once('footer1.php')
?>

<script>$("#adminArticle").addClass("active");</script> 
<?php
require_once('footer2.php');
?>
  