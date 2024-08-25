<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link rel="stylesheet" href="navbar.css" />
        <link rel="stylesheet" href="login2.css" />

        <title> Start Quiz</title>
        </head>
        
    <body>
        
         <nav class="navbar">
    <!-- LOGO/NAME OF QUIZ -->
    <div class="logo">VroomVroom Quizzes</div>

    <!-- NAVIGATION MENU (HAMBURGER) -->
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

// SETTING ACCOUNT OPTION IN NAV BAR TO LOGIN/LOGOUT CORRECTLY

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
            // Assign connection paramaters to variables
            $dbserver = ""; // dbconnect.php will assign this value
            $dbuser = ""; // dbconnect.php will assign this value
            $dbpass = ""; // dbconnect.php will assign this value
            $dbname = "assignment";
            
            include "dbconnect.php"; // inclue dbconnect script to get values from Azure
            
            session_start();
            
        //Connect to DB
            $conn = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
            if ($conn) {
               // echo"connection succesful";
            }else{
                //echo"bad connection";
            }
            
            $iage = "";
            //store values POSTED from the form         
            $iname = $_POST["n"];
            $iage = $_POST["a"];
            $ipass = $_POST["p"];
         
         //echo "working before if ";
         // METHOD TO DETECT IF USER IS LOGGIN IN OR CREATING AN ACCOUNT
            if ($iage == "") {
                //generate sql query with values
                //   $sql = "INSERT INTO user VALUES ('$iname','$iage','$ipass')";
                $sql = "SELECT * FROM user WHERE Name = '$iname' AND Password = '$ipass'";
       // echo"<br>$sql";
                $result="";
                //run the query
                $result = mysqli_query($conn,$sql);
                
                // echo "<br>this is the result: ".mysqli_fetch_array($result)['Name'];
                
                if (mysqli_num_rows($result) == 0) {
                    echo "Incorrect name or passworrd";
                    echo "<p><a href='login.php'>Go Back</a> and try again</p>";
                    } else {
                    $_SESSION["login"] = true;
                       // echo "<br>sign in succesful ";
                    }
    

    
               }else{ 
                    //echo "<br>creat new account is active ";
                    
                    $sql1 = "SELECT Name FROM user WHERE Name = '$iname'";
                    $namecheck = mysqli_query($conn,$sql1);
                    
                    //cheack if username already isxists
                    
                    if (mysqli_num_rows($namecheck) == 0){
                        
                          $sql = "INSERT INTO `user`(`Name`, `Age`, `Password`) VALUES ('$iname','$iage','$ipass')";
                    
                         // echo"<br>$sql";
                    $result = mysqli_query($conn,$sql);
                    
                    $_SESSION["login"] = true;
                       // echo "<br>sign in succesful ";
                        
                        
                    }else{
                    
                    
                    echo "<p>this username already exists, if this is you please <a href='login.php'>Go Back</a> and login</p>";
                    }
              }

            //close connection
            mysqli_close($conn);   
            
            // MAKING SURE USER IS LOGGED IN 
            
           if ($_SESSION["login"] == false){
               echo "<p> ERROR login un-succsesful <a href='login.php'>Go Back</a> and try again</p>";
           } else {
               echo "<h5> Login Succesful </h5>";
               echo "<h6>Welcome $iname</h6> ";
               $_SESSION["Name"] = $iname;
           }
            
        ?>
        <br>
        <br>
        <div style="text-align:center">
        <a href="quiz.html" target="_blank">
    <!-- BUTTON TO START QUIZ -->
    <button>Start Quiz</button>
</a>
</div>
        <!--<p> end reached </p>-->
        
    </body>
</html>