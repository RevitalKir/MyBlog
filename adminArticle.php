<?php
	session_start();

	if(!isset($_SESSION['administrator']))
	{
		exit;
	}
	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	require_once('header.php');
?>


	
    	<div class ="header-content home-header">
        <h1>Admin article</h1>
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
        <h2>Choose Article to edit</h2>
    </div>
	<ul class="article-list" id="article-list">
<?php 
    $query0= "SELECT * FROM articles  WHERE deleted = 0 LIMIT 3";//choes article that are not deleted
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
	</ul>
     <div class='btn-submit'>
    	<button id="showMorearticles"> Show More Articles</button> <!-----------------------------------> 
    </div> 
    <hr>
	<div class="admin-article-form">
                <div class="heading">
                    <h2>Edit Articles</h2>
                    <hr>
                </div>
<?php 
	$id = $_GET['id'];  
	$query= "SELECT * FROM articles WHERE  id= '$id' and deleted = 0";
	$result= mysqli_query($dbc, $query)
	or die ('error with connection');
	$row = mysqli_fetch_array($result);
?>
                
				<form action="#" method="POST">
					<div class="admin-input">
                    	<label>Title</label>
						<input name="title" type="text" class="form-control" id="title" value="<?php echo $row['title'] ?>" >
				  </div>
					<div class="admin-input">
                    	<label>Author</label>
						<input name="author" type="text" class="form-control" id="author" value="<?php echo $row['author'] ?>">
				  </div>
                  <div class="admin-input">
                  		<label>Date</label>
						<input name="date"  class="form-control pick-date" id="date" value="<?php echo $row['date'] ?>">
				  </div>
                  <div class="admin-input">
                  		<label>Status</label>
						<select name="status" id="status"  >
                        	<option value="<?php echo $row['status'] ?>"> <?php echo $row['status'] ?></option>
                            <option value="draft"> Draft</option>
                            <option value="published">Published</option>
                            <option value="updated">Updated</option>
                        </select>
				  </div>
				 <div class="admin-input">
                 <label>Atricle</label>
					<textarea required name="article" rows="10" class="form-control" id="atricle"> <?php echo $row['article_text'] ?></textarea>
				</div>
                <!--<div class="admin-input">
                  		<label>Ratings</label>
						<input name="rating" type="text" class="form-control" id="rating">
				  </div>-->
				<div class="btn-submit">
					<input name="update" type="submit" class="form-control"  value="Update">
                    <input name="delete" type="submit" class="form-control"  value="Delete Article">
				</div>
				</form>
<?php


if(isset($_POST['update']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	$title= htmlspecialchars($_POST["title"]);
	$author= htmlspecialchars($_POST["author"]);
	$date= $_POST["date"];
	$status=  htmlspecialchars($_POST["status"]);
	$article= ($_POST["article"]);
		$query1= "UPDATE articles 
		SET title = '$title', author = '$author', date = '$date', status= '$status', article_text ='$article'
		WHERE id = '$id'";
	$result1= mysqli_query($dbc, $query1)
	or die ('error with connection');
	header("Refresh:0");
	
}

if(isset($_POST['delete']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	 
	$query2= "UPDATE articles 
		SET deleted = 1
		WHERE id = '$id'";
	$result2= mysqli_query($dbc, $query2)
	or die ('error with connection');
	header("Refresh:0");
	echo "the article was deleted";
	//mysqli_close($dbc);
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
  