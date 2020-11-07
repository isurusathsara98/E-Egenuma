<?php
if(isset($_GET['username']))
{
    $u=$_GET['username']; 
    $u=str_replace("2","+",$u);
    $ciphering = "BF-CBC"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encryption_iv = "12345678"; 
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
        $u1 = openssl_decrypt ($u, $ciphering, 
      $encryption_key, $options, $encryption_iv); 
   
      $u=str_replace("+","2",$u);

    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $first=$row['first'];
       $last=$row['last'];
       $subject=$row['subject'];
       $stream=$row['stream'];
       $advance=$row['advance'];
    }
}
if(isset($_GET['x']))
{
  $x=$_GET['x']; 
  if($x==1)
  {
  echo"<script>alert('Please select another grade')</script>";
  }
 
}
?>
<html>
<style>
 form input{
    float: left;
    margin-left: 100px;
    width: 100%;
    margin: 0;
    border: 0;
    border-bottom: 2px solid rgb(214, 72, 72);
    margin: 0 1%;
    padding: 10px;
    display: block;
    box-sizing: border-box;
    font-size: 16px;
 }
 .button {
  position: absolute;

  background-color: #4CAF50; /* Green */
  border: none;
  color: rgba(255, 255, 255, 0);
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: "Times New Roman";
  font-size: 24px;
  margin:8px 2px;
  transition-duration: 0.5s;
  cursor: pointer;
  border-radius: 6px;
  
}
.button3 {
  left:100px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button3:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}

.button4 {
  left:1000px;top: 400px;
  padding: 6px 10px;
  font-size: 18px;
  margin:3px 1px;
  background-color: rgba(249, 255, 255, 0.623);
  color: rgb(16, 158, 63);
  border: 2px solid #28ad4a;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button4:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #00bb64;
  color: white;
}

.button5 {
  left:1100px;top: 235px;
  padding: 6px 6px;
  font-size: 16px;
  margin:8px 1px;
  background-color: rgba(249, 255, 255, 0.623);
  color: rgb(16, 158, 63);
  border: 2px solid #28ad4a;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button5:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #00bb64;
  color: white;
}
.button6 {
  left:100px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button6:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
</style>
<head>
<title>Teacher classes</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:100px; font-family:verdana; font-size: 35px; color:white;"><strong><u>Teaching Grades</u></strong></h5>
</head>
<?php
if(isset($_POST['class']))
{
  $gra=$_POST['grade'];
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM grade WHERE teacher='$u1' and grade='$gra'");
  if($resultset->num_rows >0)
  {
   
    header("location:teachergrade.php?username=$u&x=1");
  }
  else
  {
  if($gra=="select")
  {
  
    header("location:teachergrade.php?username=$u&x=1");
  }
  else{

  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $insert=$con->query("INSERT INTO grade(grade,teacher) VALUES('$gra','$u1')");
   
  header("location:teachergrade.php?username=$u");

  }
}

}
else if(isset($_POST['cls']))
{
?>
<body>
<script>

function back(){
  var val = "<?php echo $u?>";
  location.replace("teachergrade.php?username="+val+"");
}
</script>
<button onclick="back()" class="button button6" ><-Back</button>
<div class="login-box">

  <div class="login-left"> 
  <p style="font-family:verdana;">class grades have been added yet </p><br>
  <form method="POST" action="" >
  <div class="styled-select">
  <p style="font-family:verdana;"><?php echo"$stream"?> level (If you want to change the level go to profile->Account update) </p><br>
  <?php
  if($stream=="primary")
  {
     ?>
     <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="1">Grade 1</option>
         <option value="2">Grade 2</option>
         <option value="3">Grade 3</option>
         <option value="4">Grade 4</option>
         <option value="5">Grade 5</option>
         </select>
        
     <?php
  }
  else if($stream=="ordinary")
  {
    ?>
    <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="6">Grade 6</option>
         <option value="7">Grade 7</option>
         <option value="8">Grade 8</option>
         <option value="9">Grade 9</option>
         <option value="10">Grade 10</option>
         <option value="11">Grade 11</option>
         </select>
     <?php
  }
  else if($stream=="advance")
  {
    ?>
        <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="12">Grade 12</option>
         <option value="13">Grade 13</option>
         </select>
    <?php
  }
  ?>
   </div>
   <input type="SUBMIT" class="button button4" name="class" value="Add" style="width:80px; height:50px" required/>  
   </form>
  </div>

</div>

         <?php

     
    ?>
</body>

<?php
}
else
{
?>
<body>
<script>
<?php
; 
?>
function back(){
  var val = "<?php echo $u?>";
  location.replace("teacher.php?teacherprofile="+val+"");
}
</script>
<button onclick="back()" class="button button6" ><-Back</button>
    <?php
     $con = mysqli_connect('localhost','root','17/Eng/099','test');
     $resultset=$con->query("SELECT * FROM grade WHERE teacher='$u1'");
     if($resultset->num_rows >0)
     {?>
     <div class="login-box">

  <div class="login-left"> 
  <p align="center" style="font-family:verdana;"> Teaching level : <?php echo"$stream"?> Level</p><br>
  <form method="POST" action="">
  <input type="SUBMIT" class="button button5" name="cls" value="Add class" style="width:80px; height:50px" required/>  
  </form>

       <?php
      while( $row = $resultset->fetch_assoc())
      {
        $grade=$row['grade'];
        ?>
        <p align="center" style="font-family:verdana; color:black;  font-size: 140%;"> <a  href="teacherstudents.php?username=<?php echo"$u";?>&grade=<?php echo"$grade"?>" style="color:white">Grade <?php echo"$grade"?></a></p></td>
         <?php
      }
      ?>
      </div>
</div>
</div>
      <?php
     }
     else
     {
         ?>
         <div class="login-box">
  <div class="row">
  <div class="login-left"> 
  <p style="font-family:verdana;">class grades have been added yet </p><br>
  <form method="POST" action="" >
  <div class="styled-select">
  <p style="font-family:verdana;"><?php echo"$stream"?> level (If you want to change the level go to profile->Account update) </p><br>
  <?php
  if($stream=="primary")
  {
     ?>
     <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="1">Grade 1</option>
         <option value="2">Grade 2</option>
         <option value="3">Grade 3</option>
         <option value="4">Grade 4</option>
         <option value="5">Grade 5</option>
         </select>
        
     <?php
  }
  else if($stream=="ordinary")
  {
    ?>
    <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="6">Grade 6</option>
         <option value="7">Grade 7</option>
         <option value="8">Grade 8</option>
         <option value="9">Grade 9</option>
         <option value="10">Grade 10</option>
         <option value="11">Grade 11</option>
         </select>
     <?php
  }
  else if($stream=="advance")
  {
    ?>
        <select name="grade" id="car">
         <option value="select">Select Grade</option>
         <option value="12">Grade 12</option>
         <option value="13">Grade 13</option>
         </select>
    <?php
  }
  ?>
   </div>
   <input type="SUBMIT" class="button button4" name="class" value="Add" style="width:80px; height:50px" required/>  

   </form>
  </div>
</div>


         <?php

     }
    ?>
</body>
<?php
}
?>
</html>