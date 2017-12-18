<?php
	session_start();

	if(!isset($_SESSION['administrator']))
	{
		exit;
	}
	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	require_once('header.php');
	//$comment_id = $_GET['commentid'];
	
?>


	
    	<div class ="header-content home-header">
        <h1>Publish comment</h1>
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
   
	<div class="publish-comment-form">
                <div class="heading">
                    <h2>publish comment</h2>
                    <hr>
                </div>
<?php 
	$comment_id = $_GET['commentid'];  
	$article_id = $_GET['articleid'];
	//echo $comment_id;
	//echo "article id is :". $article_id;
	$query= "SELECT * FROM commentform WHERE id= $comment_id ";
	$result= mysqli_query($dbc, $query)
	or die ('error with connection');
	$row = mysqli_fetch_assoc($result);
?>
                
				<form action="#" method="POST">
					<div class="admin-input">
                    	<label>Name</label>
						<p name="name" class="form-control" id="name"> <?php echo $row['name'] ?></p>
				  </div>
					<div class="admin-input">
                    	<label>comment</label>
						<p name="comment" class="form-control" id="comment"><?php echo $row['comment'] ?></p>
                        
				  </div>
               
				<div class="btn-submit">
					<input name="publish" type="submit" class="form-control"  value="Publish">
                    
				</div>
				</form>
<?php


if(isset($_POST['publish']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	
	$name= ($_POST["name"]);
	$comment=($_POST["comment"]);
		$query1= "UPDATE commentform 
		SET publish = 1
		WHERE id = '$comment_id'";
	$result1= mysqli_query($dbc, $query1)
	or die ('error with connection');
	
	header("Location: http://localhost/test_articles.php?article=$article_id");
	 
}


?>                
		</div>
 <div class="parallax parallax-home parallax-main"> </div>

 </main>

<?php
require_once('footer1.php')
?>

<script>$("#adminArticle").addClass("active");</script> 
<?php
require_once('footer2.php');
?>
  