<?php
	session_start();

	if(!isset($_SESSION['administrator']))
	{
		exit;
	}
	$dbc= mysqli_connect('localhost', 'root', 'root', 'myblog')
	or die ('the connection faild');
	
	require_once('header.php');
?>


	
    	<div class ="header-content home-header">
        <h1>Admin Users</h1>
        </div>
    </header>
<!--login message for logedin users-->
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
    <div class="heading align-center">
        <h2>Choose User to Edit</h2>
    </div>
	<ul class="users-list" id="users-list">
<?php 
    $query0= "SELECT * FROM users  WHERE deleted = 0 LIMIT 4";//choes users that are not deleted
	$result0= mysqli_query($dbc, $query0)
	or die ('error with connection');
	//
	if(mysqli_num_rows($result0) >0)
	{
		 while($row = mysqli_fetch_array($result0)) // as long as there are rows of data 
	   {
		  $userid = $row['id'];
		   echo "<li ><a href='adminusers.php?id=$userid'><span class= 'strong'>Name:</span> ".$row['name']."&nbsp; &nbsp;"."<span class= 'strong'> User Name:</span> ".$row['username']."</a></li><br/>";
	   }
	}
	else { echo "There are no users";}
?>
	</ul>
    <div class='btn-submit'>
    	<button id="showMoreUsers"> Show More Usegrs</button> <!-----------------------------------> 
    </div>   
    <hr>
	<div class="admin-users-form">
                <div class="heading">
                    <h2>Edit User</h2>
                    <hr>
                </div>
<?php 
	$id = $_GET['id'];  
	$query= "SELECT * FROM users WHERE  id= '$id' and deleted = 0";
	$result= mysqli_query($dbc, $query)
	or die ('error with connection');
	$row = mysqli_fetch_array($result);
?>
                
				<form action="#" method="POST">
					<div class="admin-input">
                    	<label>Name</label>
						<input name="name" type="text" id="Name" value="<?php echo $row['name'] ?>" >
				  </div>
					<div class="admin-input">
                    	<label>UserName</label>
						<input name="username" type="text" class="form-control" id="userName" value="<?php echo $row['username'] ?>">
				  </div>
                  <div class="admin-input">
                  		<label>Make Admin</label>
						<input name="admin"  id="admin" value="<?php echo $row['admin'] ?>">
				  </div>
                  <div class="admin-input">
                  		<label>Deleted</label>
						<input name="deleted"  id="deleted" value="<?php echo $row['deleted'] ?>">
				  </div>
				 <div class="btn-submit">
					<input name="update" type="submit" class="form-control"  value="Update">
                    <input name="delete" type="submit" class="form-control"  value="Delete User">
				</div>
				</form>
<?php


if(isset($_POST['update']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	$name= htmlspecialchars($_POST["name"]);
	$username= htmlspecialchars($_POST["username"]);
	$admin= $_POST["admin"];
	$deleted=  htmlspecialchars($_POST["deleted"]);
	$query1= "UPDATE users 
		SET name = '$name', username = '$username', admin = '$admin', deleted= '$deleted'
		WHERE id = '$id'";
	$result1= mysqli_query($dbc, $query1)
	or die ('error with connection');
	header("Refresh:0");
	
}

if(isset($_POST['delete']) && $_SERVER["REQUEST_METHOD"]== "POST")
{
	 
	$query2= "UPDATE users 
		SET deleted = 1
		WHERE id = '$id'";
	$result2= mysqli_query($dbc, $query2)
	or die ('error with connection');
	header("Refresh:0");
	echo "the article was deleted";
	mysqli_close($dbc);
}
?>                
		</div>
 <div class="parallax parallax-home parallax-main"> </div>

 </main>

<?php
require_once('footer1.php')
?>

<script>$("#adminusers").addClass("active");</script> 
<?php
require_once('footer2.php');
?>
  