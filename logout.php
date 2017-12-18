<?php 
 if(!defined('ok')){die();} 
 ?>
<div class="w3-container position-rel">
         <div class="registration">
             <form action="#" method="POST">
             <button id="logout-btn" class="logout" name="logout" type="submit">Logout</button>
             </form>
        </div>
     </div>
 <?php
 if(isset($_POST['logout']) && $_SERVER["REQUEST_METHOD"]== "POST")
 {
	session_destroy();
	header("Location: index.php");
	require_once ('registration-login.php');
 }
 ?>