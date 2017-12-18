<?php
require_once('header.php');
?>
   	<div class ="header-content home-header">
        <h1>Revital Kirov Blog</h1>
   	</div>
</header>

    <div class="parallax parallax-home  parallax-top"></div>
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
    
    <div class="parallax parallax-home parallax-menu"> </div>
<?php    
	$dbc = mysqli_connect("localhost", "root", "root", "myblog")
		or die ('the connection faild'); 
	$query= "SELECT * FROM articles WHERE status ='published'";
   $result= mysqli_query($dbc, $query)
   	or die ('the query faild');
?>	
<main class="show-cases">
<!--<img src="img/word-clock2.png"-->
<?php
	//display of all published articles
	while($row = mysqli_fetch_array($result))
	{
      $row1 = mysqli_fetch_array($result);
	  $article_text = $row['article_text'];
	  $article_text1 = $row1['article_text'];
	/*substr() cuts the string after the first occurence(which finds the strpos() function) of wraping text into new lines when it reaches a specific length (wordwrap() function) */
	 $str= substr($article_text, 0, strpos(wordwrap($article_text, 83), "\n")) . '...'; 
	 $str1= substr($article_text1, 0, strpos(wordwrap($article_text1, 83), "\n")) . '...';
	 echo"<div class ='row row1'>
		<div class='items'>
		  <div class='content-img'>".
			"<img src='".$row['img']."' alt='' />
		  </div>".
		  "<div class='content-text'>".
			"<h3 >".$row['title']."</h3>".
		    "<p>".$str."</p>".
			"<div class ='btn-group'>".
				"<button><a href='articles.php?article=".$row['id']."'>learn more</a></button> <!--query string-->
			</div>    
		  </div><!--end of .content-text-->
	    </div><!--end of .items-->";
	 echo "<div class='items'>
		 <div class='content-img'>".
			"<img src='".$row1['img']."' alt='' />
		  </div>".
		"<div class='content-text'>".
			"<h3 >".$row1['title']."</h3>".
		    "<p >".$str1."</p>".
			"<div class ='btn-group'>".
				"<button><a href='articles.php?article=".$row1['id']."'>learn more</a></button>
			</div>       
		 </div>
	   </div><!--end of .item-->".
	"</div> <!--end of .row-->";
  }
  mysqli_close($dbc);
?>
 	<div class="parallax parallax-home parallax-main"> </div>
 </main>

<?php
require_once('footer1.php')
?>

<script>$("#home").addClass("active");</script>
<?php
require_once('footer2.php');
?>