<?php
require_once('header.php');
?>


	
    	<div class ="header-content">
        <h1 class="white">About Me</h1>
        </div>
    </header>

<div class="parallax parallax-about  parallax-top"></div>

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
    
    <div class="parallax parallax-about parallax-menu"> </div>
<!--<div class="top-container" >-->
<main class="about-me">


  <div class="parallax parallax-about parallax-main"> </div>
</main>

<?php
require_once('footer1.php');
?>

<script>$("#about").addClass("active");</script>
<?php
require_once('footer2.php');
?>