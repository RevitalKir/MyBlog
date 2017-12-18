<?php
require_once('header.php');
?>


	
    	<div class ="header-content contact-header">
        <h1>Contact Me</h1>
        </div>
    </header>
<div class="parallax parallax-contact parallax-top"></div>

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
   <div class="contact-to-db-container"> 
    <div class="parallax parallax-contact parallax-menu"> </div>
  
	<main class="contact-me">		
	
			<!--<div class="contact-form">-->
<?php
$user_name =htmlspecialchars($_POST['name']);
$user_email=htmlspecialchars($_POST['email']);
$user_phone =htmlspecialchars($_POST['phone']);
$user_message = htmlspecialchars($_POST['message']);

	echo (' <br/><div class="heading"><h2> Thank you '.'<span class="strong">'.$user_name.'</span>'. ' for sending the message </h2></div>');



/*********** MAKING CONNECTION TO DB AND INSERTING INFO **********/

//1. creat the connection to "myblog" DB

$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
or die ('the connection faild'); //if the connection sucssesful this message will not apear (as the 1st staitment is true
//query the DB to creat a new entry.

//2. make the query to insert into contactform table - to all the columns
$query = "INSERT INTO contactform (name, email, phone, message)".
"VALUE ('$user_name', '$user_email', '$user_phone', '$user_message')";

//3.  use mysqli_query() function to transfer the query to our DB.

$result=mysqli_query($dbc, $query)
or die('error with connection');

//4. close the connection to DB
mysqli_close($dbc);
?>
			
               

</div>		<!--end of contact-form-->
 <div class="parallax parallax-contact parallax-main"> </div>
</main>
</div> <!--end of contact container-->
<?php
require_once('footer1.php');
?>


<?php
require_once('footer2.php');
?>