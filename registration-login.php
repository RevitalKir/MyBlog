<?php 
 if(!defined('ok')){die();} 
 ?>
<div class="w3-container position-rel">
         <div class="registration">
             <ul>
                <li><a id="login">Login</a></li>
                <li><a id="register">Register</a></li>
             </ul>
        </div>
     </div>
 
    <div id="id02" class="w3-modal">
       <div class="w3-modal-content w3-card-4  w3-animate-left" style="max-width:400px">
          <div class="w3-container"> 
            <span onclick="document.getElementById('id02').style.display='none'" 
            class="w3-button w3-display-topright">&times;</span>
            <h1>Registration Form</h1>
          </div>
          <form class="w3-container"  action="#" method="POST">
              <div class="w3-section">
              <label><b>Name</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text"   placeholder="Enter your Name" name="name" required>
              <label><b>Username</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter your Username or Email" name="usrname" required>
              <label><b>Password</b></label>
              <input class="w3-input w3-border w3-margin-bottom" id="psw1" type="password" placeholder="Enter Password" name="psw" required>
              <label><b>Repeat Password</b></label>
              <input class="w3-input w3-border" id="psw2" type="password" placeholder="Repeat Password" name="psw2" required>
              <span id="mismatchMessage" class="hidden red"> &ast; The repeated password does not match</span>
              <button id="submit-btn" class="w3-button w3-block w3-section w3-padding" name="register" type="submit">Submit Registration Form</button>
            </div>
         </form>
       </div>
   </div>
   <div class="w3-container position-rel">
         
   		<div class="validation-message"> 
   
 <?php
  $name =$_POST['name'];
  $username=$_POST['usrname'];
  $password1= $_POST['psw'];
  $password2=$_POST['psw2'];
  if(isset($_POST['register']) && $_SERVER["REQUEST_METHOD"]== "POST")
  { 
	 header('Location: '.$_SERVER['REQUEST_URI']);
	   if($password1 !== $password2) //check if entered passwords matching
  		{
	  		echo "the repeated password does not match";
  		}
 		 else // if they match ->hash the password, connect to DB and check if the username exists
	   {
		 $password = $password1;
	     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		  $dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
			or die ('the connection faild'); 
		  $query = "SELECT username FROM users WHERE username='$username'";
		  $result= mysqli_query($dbc, $query)
		  or die ('error with connection');
		  $row = mysqli_fetch_array($result);
		    if ($row!=NULL) 
		    {
			  echo "Sorry this Username already exists";
		    }
		    else // if username does not exist, inset the user into db
			{
				$query1= "INSERT INTO users (name, username, password)".
				"VALUE ('$name', '$username', '$hashed_password')";
				$result1 = mysqli_query($dbc , $query1)
				or die ('error with connection');
				mysqli_close($dbc);
			}
	  }  
  }
?>

	</div>
 </div>
     <div id="id01" class="w3-modal">
       <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:300px">
          <div class="w3-center orange"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          </div>
          <form class="w3-container" action="#" method="POST">
            <div class="w3-section">
              <button class="facebook w3-block  w3-padding" type="submit">Login with FACEBOOK</button>
              <span class="w3-center w3-block w3-section">OR</span>
              <label><b>Username</b></label>
              <input class="w3-input w3-border w3-margin-bottom" name="username" type="text" placeholder="Enter your Username or Email"  required>
              <label><b>Password</b></label>
              <input class="w3-input w3-border" type="password" name="password" placeholder="Enter Password"  required>
              <button class="w3-button w3-block w3-section w3-padding" name="logIn" type="submit">Login</button>
              <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
            </div>
          </form>
          
          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button orange">Cancel</button>
            <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
          </div>
        </div>
      </div>
      
       <div class="w3-container position-rel">
         
   		<div class="validation-message"> 
<?php
			$log_username= htmlspecialchars($_POST['username']);
			$log_password= htmlspecialchars($_POST['password']);
			if(isset($_POST['logIn']) && $_SERVER["REQUEST_METHOD"]== "POST")
			{// header('Location: '.$_SERVER['REQUEST_URI']);
				 $dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
				or die ('the connection faild'); 
				
				$query2 = "SELECT * FROM users WHERE username = '$log_username'";
				$result2 = mysqli_query($dbc,$query2);
				 
				 $row1 = mysqli_fetch_array($result2);
				 //validation user+password
				 $pass = $row1['password'];//password from db
				 $admin_user=$row1['admin'];
				
				 if ($row1==NULL) //if username doesn't exist
				 {
					echo "Sorry, Your Username or Password is invalid";
				 }
				 elseif (password_verify($log_password, $pass) && $admin_user==1)
				 {
					 $_SESSION['administrator'] = $row1['username'];
					 $_SESSION['loged'] = $row1['username'];
					 $_SESSION['user_id'] = $row1['id'];
					$_SESSION['message']= "Hello admin"." " .$row1['name'];
				 }
				  elseif (password_verify($log_password, $pass))// if password entered  match the saved password
				  { 
				  	$_SESSION['login_user'] = $row['username'];
					$_SESSION['loged'] = $row1['username'];
					$_SESSION['message']= "Welcome"." " .$row1['name'];
					$_SESSION['user_id'] = $row1['id'];
            	 }
				  else 
				 {
					echo ("Sorry, Your Username or Password is invalid");
				 }
				header("Refresh:0"); //refresh needed to make the sassion active	
		    }
		  	mysqli_close($dbc);
		  
?>
		</div>
 			</div>  