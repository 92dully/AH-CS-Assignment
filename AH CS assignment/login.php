<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="navbar.css" />
        <link rel="stylesheet" href="login.css" />
  <style>

      </style>
  <title>Dully Login</title>
  
  
</head>

<body>
  
  <nav class="navbar">
    <!-- LOGO (Name of quiz) -->
    <div class="logo">VroomVroom Quizzes</div>

    <!-- NAVIGATION MENU (hamburger) -->
    <ul class="nav-links">

      <!-- USING CHECKBOX METHOD -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9868;</label>
       
         <label for="checkbox_toggle" class="x">&#9932;</label>

   
      <!-- NAVIGATION MENU OPTIONS -->
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
  
  <?php
    
session_start();

// SETTING LOGIN TO FALSE AS DEFALT
$_SESSION["login"] = false;

if ($_SESSION["login"] == true) {
    header("Location:http://abdullahahmad.azurewebsites.net/Assignment/quizchoice.html");
    exit;
} 
?>

    <!-- LOGIN FORM -->

    <form action="login2.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="n" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="p" required>

        <button type="submit">Submit</button>
    </form>
    
    <br> 
   
       <!-- NEW ACCOUINT BUTTON TO SHOW FORM -->
   
<div style="text-align:center">
      <button type="button"  class="newaccbtn" onClick="document.getElementById('newform').style.display='block'" > Creat a new account!</button>
</div>
<br>

    <!-- NEW ACCOUNT FORM -->
      <form id="newform" action="login2.php" method="POST" style="display:none" class="newacc">
        <label for="name">Name:</label>
        <input type="text" id="name" name="n" required><br>
        
        <label for="age">Age:</label>
        <lable class="minage"> Over 12 only</lable>
        <input type="number" id="age" name="a" required min="12"><br>
        
        <label for="password">Create Password:</label>
        <input type="password" id="password" name="p" required>

        <button type="submit">Submit</button>
    </form>


    
</body>

</html>