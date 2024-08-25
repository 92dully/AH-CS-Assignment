
<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link rel="stylesheet" href="navbar.css" />
        <!--<link rel="stylesheet" href="quiz.css" />-->

        <title>Quiz Result</title>
        </head>
        
        <style>
            
            h1, p{
                display: flex;
                justify-content: center;
            }
            </style>
        
    <body>
        
         <nav class="navbar">
    <!-- LOGO -->
    <div class="logo">VroomVroom Quizzes</div>
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
              //  echo"connection succesful";
            }else{
                //echo"bad connection";
            }
            
            $iq1 = $_POST["q1"];
            $iq2 = $_POST["q2"];
            $iq3 = $_POST["q3"];
            $iq4 = $_POST["q4"];
            $iq5 = $_POST["q5"];
            $iq6 = $_POST["q6"];
            $iq7 = $_POST["q7"];
            $iq8 = $_POST["q8"];
            $iq9 = $_POST["q9"];
            $iq10 = $_POST["q10"];
              
/*
1 Henry Ford c3
2 Manchester c4
3 Saturn c1
4 Lexus c3
5 Aston Martin c1
6 Germany c4
7 Seoul c1
8 Karl Benz c2
9 Skoda c3
10 Germany c1
*/
           // echo $iq1;
            $score = 0;
            
           if ($iq1 == "c3"){
               $score += 1;
           }
           if ($iq2 == "c4"){
               $score += 1;
           }
            if ($iq3 == "c1"){
               $score += 1;
           }
            if ($iq4 == "c3"){
               $score += 1;
           }
            if ($iq5 == "c1"){
               $score += 1;
           }
            if ($iq6 == "c4"){
               $score += 1;
           }
            if ($iq7 == "c1"){
               $score += 1;
           }
            if ($iq8 == "c2"){
               $score += 1;
           }
            if ($iq9 == "c3"){
               $score += 1;
           }
            if ($iq10 == "c1"){
               $score += 1;
           }

//echo $score;
session_start();

//echo $_SESSION['Name'];
$iname =  $_SESSION['Name'];
            $sql0= "SELECT `quiz score` FROM `user` WHERE Name = '$iname'";
            $prevresult = mysqli_query($conn,$sql0);
            $prevscore = mysqli_fetch_array($prevresult)['quiz score'];
            //echo "hi ".mysqli_fetch_array($prevresult)['quiz score'];

             $sql = "UPDATE `user` SET `quiz score`=$score WHERE Name = '$iname'";
             //echo $sql0;

            $result = mysqli_query($conn,$sql);
            
            echo "<h1 style='font-size: 25px;' > $iname, you scored: <br></h1><h1> $score points</h1><br>";
            
            if (mysqli_num_rows($prevresult) == 0) {
                //no old score
            }else{
                 echo "<p> Your previous high score was $prevscore</p> ";
                 
             if ($prevscore > $score){
                    
                   echo "<p>You didn't beat your old high score</p>"; 
                   
                }else if ($prevscore == $score){
                    
                    echo "<p>You matched your old score</p>"; 
                }else{
                    echo "<p>Congratulations! You got a new high score</p>"; 
                    
                }

            }
            
            
            
            
?>
  </body>
  
  </html>
