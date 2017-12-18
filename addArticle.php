<?php
session_start();
if(!isset($_SESSION['administrator']))
{
	exit;
}
require_once('header.php');

?>
      <div class ="header-content home-header">
        <h1>Add an article</h1>
      </div>
  </header>

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
  <div class="admin-article-form">
        <div class="heading">
            <h2>Add Articles</h2>
            <hr>
        </div>

          <form action="#" method="POST">
              <div class="admin-input">
                  <label>Title</label>
                  <input name="title" type="text" class="form-control" id="title" >
            </div>
              <div class="admin-input">
                  <label>Author</label>
                  <input name="author" type="text" class="form-control" id="author">
            </div>
            <div class="admin-input">
                  <label>Date</label>
                  <input name="date"  class="form-control pick-date" id="date">
            </div>
            <div class="admin-input">
                  <label>Status</label>
                  <select name="status" id="status">
                      <option value="draft"> Draft</option>
                      <option value="published">Published</option>
                      <option value="updated">Updated</option>
                  </select>
            </div>
           <div class="admin-input">
           <label>Atricle</label>
              <textarea required name="article" rows="10" class="form-control" id="atricle"> </textarea>
          </div>
          <!--<div class="admin-input">
                  <label>Ratings</label>
                  <input name="rating" type="text" class="form-control" id="rating">
            </div>-->
          <div class="btn-submit">
              <input name="submit" type="submit" class="form-control" id="submit" value="Update">
          </div>
       </form>
<?php


  if($_SERVER["REQUEST_METHOD"]== "POST")
  {
	  $title= htmlspecialchars($_POST["title"]);
	  $author= htmlspecialchars($_POST["author"]);
	  $date= $_POST["date"];
	  $status=  htmlspecialchars($_POST["status"]);
	  $article=  htmlspecialchars($_POST["article"]);
	  $dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	  or die ('the connection faild'); 
	  $query= "INSERT INTO articles (title, author, date, status, article_text)".
	  "VALUE('$title','$author', '$date', '$status', '$article')";
	  $result= mysqli_query($dbc, $query)
	  or die ('error with connection');
	  
	  mysqli_close($dbc);
  }
?>                
    </div><!--end of .admin-article-form -->
    <div class="parallax parallax-home parallax-main"> </div>

 </main>

<?php
require_once('footer1.php')
?>

<script>$("#addArticle").addClass("active");</script> 
<?php
require_once('footer2.php');
?>
 