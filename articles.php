<?php
  require_once('header.php');
	$article_id = $_GET['article']; //gets from query string that passed with href
	$dbc = mysqli_connect("localhost", "root", "root", "myblog")
	or die ('the connection faild'); 
	$query= "SELECT * FROM articles WHERE status ='published' and id= '$article_id'";
    $result= mysqli_query($dbc, $query)
   or die ('the query faild');
   $row = mysqli_fetch_array($result);
?>
        <div class ="header-content articles-header">
       		 <h1 class="white">Article</h1>
        </div>
    </header>
    <div class="parallax parallax-articles parallax-top"></div>
  	<div class="w3-container position-rel">
   	  <div class="registration">
        <p class="white"><?php echo $_SESSION['message'];?></p>
     </div>
  </div>
<?php 
	if(isset($_SESSION['administrator']))
	{ 
		require_once('admin_navigation.php');
	}
	else
	{
	  require_once('navigation.php');
	}
?>
    
    <div class="parallax parallax-articles parallax-menu"> </div>
	<main class="articles">	
    <!--articles from DB based on article's Id-->	
		<article>
          <div class="heading">
             <h2 ><?php echo $row['title']?> </h2>
             <br/>
            <h6>Author: <?php echo $row['author'] ?></h6>
            <p class="small">Date <?php echo " ". $row['date'] ?></p>
          	<div class ="rating">
            <!--getting avg star rating from db-->
<?php
	$query5="SELECT AVG(rating) as rating FROM rating_details WHERE article_id = '$article_id'"; //alias (as...) is given to know the name of the column from which AVG function gets the result so we could ask to display it (in $row)
	$result5= mysqli_query($dbc, $query5)
		or die ('the query faild');
	$row5= mysqli_fetch_array($result5);
?>
               <ul class="article-rating">
                  <li id ="star1" class="star"></li>
                  <li id ="star2" class="star"></li>
                  <li id ="star3" class="star"></li>
                  <li id ="star4" class="star"></li>
                  <li id ="star5" class="star"></li>
                  <li class="avg-rating" value="<?php echo round( $row5['rating']);?>" id="avg-rating"><?php echo  $row5['rating'];?></li>
              </ul>
           </div>
           <hr>
        </div><!--end of .heading-->
          
        <div class ="article">
          <p><?php echo $row['article_text']?>  </p>
        </div>
    </article>

         <div class="align-center">
<?php          
     if(isset($_SESSION['administrator']))
	 {
		  echo "<button class='btn-edit'><a href='adminArticle.php?id=$article_id'>Edit Article</a></button>";	
		echo "<button id='showComments' class='btn-edit'><a href='#unpublished-comments'>Show all Comments</a></button>";	 
	 }
?>	
</div>	 
       <div class ="rating-form">
         <div class="heading">
           <h2>Rate this Article</h2>
     	 </div>
          <form  action="#" method="POST">
			 <div class="starRating" >
              <input id="rating5" class="rating" type="radio" name="rating" value="5">
              <label for="rating5">5</label>
              <input id="rating4" class="rating"  type="radio" name="rating" value="4">
              <label for="rating4">4</label>
              <input id="rating3"  class="rating" type="radio" name="rating" value="3">
              <label for="rating3">3</label>
              <input id="rating2" class="rating" type="radio" name="rating" value="2">
              <label for="rating2">2</label>
              <input id="rating1" class="rating" type="radio" name="rating" value="1">
              <label for="rating1">1</label>
           </div>
           <div class="btn-submit btn-submit-rating">
           <!--changing the name of submit button so only this form will be submited and transferd to php-->
				<input name="rate" type="submit" class="form-control" id="submit-rating" value="Rate ">
		    </div>
		  </form>
          </div><!--end of .rating-form-->
          
<?php //rating to DB
 if(!isset($_SESSION['loged']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	echo "<h3 class='red align-center'>You must login before give rating to the article</h3>";
	
}
else
{
	$rating = $_POST['rating'];
	
	if (isset($_POST['rate'])&& $_SERVER["REQUEST_METHOD"]== "POST")
	{
		//echo ('the rating is now is'. $rating);
		$user_id= $_SESSION['user_id'];
		$query1="SELECT * FROM users WHERE id=$user_id";
		$result1= mysqli_query($dbc, $query1)
		or die ('error with connection');
		$row_id=  mysqli_fetch_array($result1);
		$user_id= $row_id['id'];
		//echo "the user is: ".$user_id. "  this is article id ". $article_id;
		$query2 = "INSERT INTO rating_details (user_id, article_id, rating)".
		"VALUE ('$user_id', '$article_id', '$rating')";
		$result2=mysqli_query($dbc, $query2)
		or die ('error with connection');
	}
}


?>    <!--comment form-->     
	<div class="comments-form">
      <div class="heading">
           <h2>Write a Comment</h2>
           <hr>
      </div>
          <form action="#" method="POST">
			  <div class="comment-input">
                <label> Name</label>
				  <input name="name" type="text" class="form-control" id="name-comment" >
		    </div>
			  <div class="comment-input">
                <label> Email</label>
				  <input name="email" type="email" class="form-control" id="email-comment" >
		    </div>
		    <div class="comment-input">
              <label> Comment</label>
			   <textarea required name="comment" rows="6" class="form-control" id="comment"></textarea>
		    </div>

			<div class="btn-submit">
				<input name="submit" type="submit" class="form-control" id="submit-comment" value="Send This Comment">
		    </div>
 <?php //posts comment to DB
	$name = htmlspecialchars($_POST['name']);
	$email=htmlspecialchars($_POST['email']);
	$comment=htmlspecialchars($_POST['comment']);
	if(isset($_POST['submit'])&& $_SERVER["REQUEST_METHOD"]== "POST")
	{
		echo (' <br/><div class="heading"><h2> Thank you '.'<span class="strong">'.$name.'</span>'. ' for sending this comment </h2></div>');
		$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
		or exit ('the connection faild');
		$query3= "INSERT INTO commentform (name, email, comment, article_id)".
		"VALUE('$name', '$email', '$comment', '$article_id')";
		$result3 = mysqli_query($dbc, $query3)
		or die ('error with connection');
		
}
?>
		  </form>
             
                
	</div><!--end of .comments-form-->
  <div class="parallax parallax-articles parallax-main"> </div>
  <div class ="posted-comments">
  
  <?php  //publication of comments that goes specific article
  $query4= "SELECT * FROM commentform WHERE publish=1 AND article_id = $article_id" ;
 // echo "the article id is ". $article_id . " and publish is" ;
  $result4= mysqli_query($dbc, $query4);
   while($row4 = mysqli_fetch_array($result4)) // as long as there are rows of data where pablish =1
  {
	  echo  '<div class="comment"><div class="posted-name">'.$row4['name']. '</div>'.
  '<div class="posted-coment">'. $row4['comment']. '</div></br></div>';
  }
  
  
  ?>
  
  </div><!--end of .posted-comments-->
  
   
  
  		  
 <?php          
     if(isset($_SESSION['administrator']))
	 { 
		  echo "<div id='unpublished-comments' class='unpublished-comments '>".
  		"<div class='heading align-center'>";
		  echo"<h2>Unpublished Comments</h2>  </div> ";
			//publication of comments that goes specific article
		  $query6= "SELECT * FROM commentform WHERE publish = 0 AND article_id = $article_id" ;
		  $result6= mysqli_query($dbc, $query6);
		   while($row6 = mysqli_fetch_array($result6)) // as long as there are rows of data where pablish =1
		  { 
			 $commentid= $row6['id'];
			  echo  '<div class="comment"><div class="posted-name">'.$row6['name']. '</div>'.
			'<div class="posted-coment">'. $row6['comment']. '</div>';
		     echo "<div class='btn-submit'>".
		   "<button id='publish'><a href='publishcomment.php?commentid=$commentid&articleid=$article_id'>Publish </a></button></div><br/></div>";
		  }
		 
	 }
?>
</div><!--end of .unpublished-comments -->
  
   <div class="parallax parallax-articles parallax-main"> </div>
</main>

<?php
mysqli_close($dbc);
require_once('footer1.php');
?>

<script>$("#articles").addClass("active");</script>
<?php
require_once('footer2.php');
?>