<?php 
 if(!defined('ok')){die();} 
 ?>
</header>
<div class="top-container" >
<nav class="top-navigation desktop-nav" >
        <ul class="top-menu">
          <li ><a id="home" href="index.php">Home</a></li>
          <li><a id="about" href="about.php">About</a></li>
          <li><a id="contact" href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <nav class= "mobile-nav"> <!--will be visible on small screens-->
            <!--hamburger menu icon-->
          	<div class ="hamburger-btn"> <i class="fa fa-bars" aria-hidden="true"></i> MENU</div>
          
          <div class ="toggleMenu">
        	<ul>
            <li id="home"><a href = "index.php" >Home</a> </li><!--element to open the dropdown menu can be also a <button>, <a> or <p> -->
            <li><a href ="about.php" >About</a></li>
            <li ><a href ="contact.php" >Contact</a></li>
           </ul>
        </div>      
      </nav>
            
      