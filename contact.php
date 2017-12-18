<?php
require_once('header.php');
?>

    	<div class ="header-content contact-header">
        <h1>Contact Me</h1>
        </div>
    </header>
<div class="parallax parallax-contact parallax-top"></div>

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
   <div class="contact-container"> 
    <div class="parallax parallax-contact parallax-menu"> </div>
  
	<main class="contact-me">		
	
			<div class="contact-form">
                <div class="heading">
                    <h2>Write me a Message</h2>
                    <hr>
                </div>
         
                
				<form action="contact-to-db.php" method="POST">
					<div class="contact-input">
						<input name="name" type="text" class="form-control" id="name" placeholder="  Name" value ="<?php echo $user_name; ?>">
				  </div>
					<div class="contact-input">
						<input name="email" type="email" class="form-control" id="email" placeholder="  E-mail" value="<?php echo $user_email;?>">
				  </div>
                  <div class="contact-input">
						<input name="phone" type="text" class="form-control" id="phone" placeholder="  Phone" value ="<?php echo $user_phone;?>">
				  </div>
				 <div class="contact-input">
					<textarea required name="message" rows="6" class="form-control" id="message" placeholder="  Write Your Message Here" "<?php echo $user_message;?>"></textarea>
				</div>
				<div class="btn-submit">
					<input name="submit" type="submit" class="form-control" id="submit" value="Send This Message">
				</div>
				</form>
                
	

		</div>
 <div class="parallax parallax-contact parallax-main"> </div>
</main>
</div> <!--end of contact container-->
<?php
require_once('footer1.php');
?>

<script>$("#contact").addClass("active");</script>
<?php
require_once('footer2.php');
?>