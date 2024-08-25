<!DOCTYPE>
<html>
	
	<head>

		<meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="page.css" />

		<title> Dullys Assignment </title>
		
	</head>
	
	<body>
		
		 <nav class="navbar">
    <!-- LOGO -->
    <div class="logo">VroomVroom Quizzes</div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9868;</label>
       
         <label for="checkbox_toggle" class="x">&#9932;</label>

   
      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li>
          <a href="page1.php">Home</a>
          </li>
        
         
        
        <li class="dropmen">
          <p>Account</p>
<?php
    
session_start();

if ($_SESSION["login"] == true) {
    echo"<ul class='dropdown' >
    <li>Log Out</li>
    </ul>";
    $_SESSION["login"] = false;
} else {
  echo"<ul class='dropdown' >
   <li> <a href='login.php'>Log In</a> </li>
    </ul>";
}
?>
          </li>
 
      

      </div>
    </ul>
  </nav>
  
  <br> <br> 
		<h1 class= "welcome"><strong> WELCOME </strong></h1>
			
		<h2 class="ltp"> Login to play!</h2>
		
		<p class="loginHere">Login <a href="/Assignment/login.php">HERE</a></p>
		
	</body>
	</html>
  