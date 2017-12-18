<?php
require_once('header.php');
?>

    	<div class ="header-content">
        <h1 class="projects-header">My Projects</h1>
        </div>
    </header>
<div class="parallax parallax-projects parallax-top"></div>
<div class="w3-container position-rel">
   <div class="registration">
      <p><?php echo $_SESSION['message'];?></p>
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
    
    <div class="parallax parallax-projects parallax-menu"> </div>
 
	<main class="projects">		
		<article>
          <div class="heading">
             <h2>Article One</h2>
             <hr>
          </div>
          
          <div class ="article">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, iusto, vero officia porro vel architecto voluptate expedita dolor blanditiis earum modi deserunt quod sunt optio quae ad repellendus perspiciatis eius alias molestiae amet ex ab fugiat! Ratione, suscipit eligendi vero consequatur voluptas cum quidem eum et ducimus soluta. Itaque, nemo, aliquid voluptatum numquam vero dignissimos debitis consectetur ab eos est. A, enim, ab, repellat, minima expedita architecto doloribus necessitatibus inventore nesciunt eveniet temporibus animi nulla consectetur perspiciatis vitae quo odit nobis dignissimos porro numquam hic commodi amet quod quas voluptate fuga aspernatur pariatur odio veritatis dolores laborum excepturi quasi ex.
            </p>		
            <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, enim nam quidem cumque temporibus alias minus inventore tempora natus nihil. Quidem, ducimus debitis et possimus mollitia sapiente a recusandae id repudiandae ipsam alias voluptas nostrum exercitationem tenetur aliquam tempora quisquam eos iste expedita magni deleniti necessitatibus iure molestias fuga veritatis hic dolor minus unde labore natus inventore placeat error nobis? Obcaecati ullam soluta unde facere facilis dolore distinctio ipsa ratione expedita non! Eos, molestias, impedit consequuntur fuga suscipit magni sed eligendi numquam reiciendis quidem quis nam delectus inventore ad qui! Illo, architecto non fugit illum provident delectus veniam praesentium expedita!
            </p>
         	<p>   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, quas unde possimus nulla hic facere tempora nisi architecto ipsa totam necessitatibus odit et beatae illo labore reprehenderit eos vero atque non explicabo veniam voluptate enim optio ipsam aliquam impedit quae illum! Fugiat, eveniet, recusandae, at, totam ad adipisci perspiciatis obcaecati illum doloribus voluptate quasi ex quo asperiores magnam ratione rem sapiente pariatur! Tempore recusandae veniam consequuntur deleniti alias. Impedit, magnam expedita aperiam voluptas quae modi quam. Sint, adipisci, nulla tempora ab commodi minus doloremque iste ipsam repellendus perferendis eligendi quidem sunt cumque animi libero. Veniam, nisi, earum, tenetur, nulla aspernatur eligendi doloribus distinctio iusto corrupti voluptate praesentium delectus quos natus nihil ex quibusdam cumque illum ea amet voluptatum. Soluta, sunt.
            </p>
          </div>
        </article>
<!--        <div class ="rating">
            <div class="starRating">
              <input id="rating5" type="radio" name="rating" value="5">
              <label for="rating5">5</label>
              <input id="rating4" type="radio" name="rating" value="4">
              <label for="rating4">4</label>
              <input id="rating3" type="radio" name="rating" value="3">
              <label for="rating3">3</label>
              <input id="rating2" type="radio" name="rating" value="2">
              <label for="rating2">2</label>
              <input id="rating1" type="radio" name="rating" value="1">
              <label for="rating1">1</label>
           </div>
         </div>-->
       <div class ="rating-form">
         <div class="heading">
           <h2>Rate this Article</h2>
     	 </div>
          <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
<?php
 if(!isset($_SESSION['loged']))
{
	echo "You must login before give rating to the article";
}
else
{
	$rating = $_POST['rating'];
	
	if (isset($_POST['rate'])&& $_SERVER["REQUEST_METHOD"]== "POST")
	{
		echo ('the rating is now is'. $rating);
		/*$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
		or die ('the connection faild'); 
	
		$query1 = "INSERT INTO rating_details (user_id, article_id, rating)".
		"VALUE ('', '', '$rating')";
		$result1=mysqli_query($dbc, $query1)
		or die ('error with connection');
		
		mysqli_close($dbc);*/
	}
}

?>         
          
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
            <?php 
$name = htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$comment=htmlspecialchars($_POST['comment']);
if(isset($_POST['submit'])&& $_SERVER["REQUEST_METHOD"]== "POST")
{
	echo (' <br/><div class="heading"><h2> Thank you '.'<span class="strong">'.$name.'</span>'. ' for sending this comment </h2></div>');
	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or exit ('the connection faild');
	$query= "INSERT INTO commentform (name, email, comment)".
	"VALUE('$name', '$email', '$comment')";
	
	$result = mysqli_query($dbc, $query)
	or die ('error with connection');
	mysqli_close($dbc);
	
}
?>
		  </form>
             
                
	</div><!--end of .comments-form-->
  <div class="parallax parallax-projects parallax-main"> </div>
  <div class ="posted-comments">
  
  <?php
  $query2= "SELECT * FROM commentform WHERE publish = 1";
  $result2= mysqli_query($dbc, $query2);
  //$row = mysqli_fetch_array($result2); // get a  row from the table where pablish =1

  
  while($row = mysqli_fetch_array($result2)) // as long as there are rows of data where pablish =1
  {
	  echo  '<div class="comment"><div class="posted-name">'.$row['name']. '</div>'.
  '<div class="posted-coment">'. $row['comment']. '</div></br></div>';
  }
  
  mysqli_close($dbc);
  ?>
  
  </div><!--end of .posted-comments-->
   <div class="parallax parallax-projects parallax-main"> </div>
</main>

<?php
require_once('footer1.php');
?>

<script>$("#projects").addClass("active");</script>
<?php
require_once('footer2.php');
?>