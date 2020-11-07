<?php
if(isset($_GET['student'])){
    $student=$_GET['student'];
    $student=str_replace("2","+",$student);
    $ciphering = "BF-CBC"; 
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0; 
      $encryption_iv = "12345678"; 
      $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
      $student1 = openssl_decrypt ($student, $ciphering, 
    $encryption_key, $options, $encryption_iv); 
    $student=str_replace("+","2",$student);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$student1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $grade=$row['lgrade'];
    }
    ?>
    <?php
}
if(isset($_GET['teacher'])){
    $teacher=$_GET['teacher'];
    $teacher=str_replace("2","+",$teacher);
    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = "12345678"; 
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $teacher1 = openssl_decrypt ($teacher, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $teacher=str_replace("+","2",$teacher);
    ?>
    <?php
}
if(isset($_GET['subject'])){
    $subject=$_GET['subject'];
    $subject=str_replace("2","+",$subject);
    $subject1 = openssl_decrypt ($subject, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $subject=str_replace("+","2",$subject);
    ?>
    <?php
}
if(isset($_GET['val'])){
    $val=$_GET['val'];
    ?>
    <?php
}
if($val==2)
{
    if(isset($_GET['username'])){
        $username=$_GET['username'];
        
    $username=str_replace("2","+",$username);

    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = "12345678"; 
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $username1 = openssl_decrypt ($username, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $username=str_replace("+","2",$username);
        ?>
        <?php
    }
}
?>
<html>
<style>
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
.button8 {
  left:100px;top: 120px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button8:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button4 {
  left:1250px;top: 300px;
  background-color: rgba(184, 233, 50, 0.616);
  padding: 14px 25px;
  font-size: 28px;
  margin:8px 2px;
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button4:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button5 {
    left:1250px;top: 390px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  font-size: 28px;
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button5:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button6 {
    left:1250px;top: 480px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  font-size: 28px;
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button6:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}
.bar-container {
  width: 100%;
  height: 20px;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}


        </style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Exams</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Exams of <?php echo"$subject1"?></u></strong></h5>
</head>
<body>
<?php
$resultset=$con->query("SELECT * FROM exam WHERE teacher='$teacher1' and grade='$grade'");
if($resultset->num_rows >0)
{
  while( $row = $resultset->fetch_assoc())
  {
    $examnum=$row['examno'];
  }
}
else
{
  $examnum=0;
}
?>
            <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;">Number of Exams Conducted - <?php echo"$examnum"?> </p>
<?php
    if($val==2)
    {
        ?>
  <script>
    function backt(){
        var val = "<?php echo $student ?>";
        var x = "<?php echo $username ?>";
          location.replace("parentprogress.php?username="+x+"&student="+val+"&val=0"); 
    }
    
  </script>
  <button onclick="backt()" class="button button3" ><-Back</button>
  <?php
    }
    else if($val==1)
    {
      ?>
  <script>
    function back(){
        var val = "<?php echo $student ?>";
          location.replace("studentcourse.php?username="+val+"");
        
    }
    function upload(){
        var val = "<?php echo $student ?>";
        var x = "<?php echo $teacher ?>";
        var sub= "<?php echo $subject ?>";
          location.replace("studentmaterial.php?teacher="+x+"&username="+val+"&subject="+sub+"&val=0");   
    }
  </script>
  <button onclick="back()" class="button button3" ><-Back</button>
  <button onclick="upload()" class="button button8" >Uploaded<br> material</button>
  <?php
    }
    else
    {
        ?>
  <script>
    function back(){
        var val = "<?php echo $stu ?>";
        var x = "<?php echo $username ?>";
      
          location.replace("parentprogress.php?username="+x+"&student="+val+"&val=0");
        
    }
  </script>
  <button onclick="back()" class="button button3" ><-Back</button>
  <?php
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
        $resultset=$con->query("SELECT * FROM exam WHERE student='$student1' and teacher='$teacher1' and subject='$subject1' and grade='$grade'");
        if($resultset->num_rows >0)
      {

        while( $row = $resultset->fetch_assoc())
        {
            $mark=$row['marks'];
            $examno=$row['examno'];
            ?>

            <?php
        
        if($val==2)
        {         
        ?>
          <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;"> <a  href="examstats.php?username=<?php echo"$username"?>&val=2&student=<?php echo"$student"?>&teacher=<?php echo"$teacher"?>&subject=<?php echo"$subject"?>&examno=<?php echo"$examno"?>" style="color:white">Exam no <?php echo"$examno";?></a>: <?php echo"$mark";?>  marks </p>
   <?php
        }
        else{
          ?>
          <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
          font-size: 140%; color:black;"> <a  href="examstats.php?val=1&student=<?php echo"$student"?>&teacher=<?php echo"$teacher"?>&subject=<?php echo"$subject"?>&examno=<?php echo"$examno"?>" style="color:white">Exam no <?php echo"$examno";?></a>: <?php echo"$mark";?>  marks </p>
       <?php
        }
      }
      ?>
          <div class="container">
<div class="login-box">
<br><br>
  <?php
    $x=90;
  $result=$con->query("SELECT * FROM exam WHERE student='$student1' and teacher='$teacher1' and subject='$subject1' and grade='$grade'");
  while( $rows = $result->fetch_assoc())
  {
    $mark=$rows['marks'];
    $examno=$rows['examno'];

  ?>
  <div class="side">
    <div>Exam <?php echo"$examno"?></div>
  </div>
  <style>
  .bar-<?php echo"$mark"?> {width: <?php echo"$mark"?>%; height: 20px; background-color: #4CAF50;}
  </style>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-<?php echo"$mark"?>"></div>
    </div>
  </div>
  <div class="side right">
    <div> &nbsp&nbsp&nbsp&nbsp<?php echo"$mark"?><br></div>
  </div>
  <?php
  $x=$x-20;

  
}
  ?></div></div>
  <?php
      }
      else
      {?>
         <p align="center" style="font-family:verdana; color:white;
   font-size: 140%; color:black;"> No exams marks are offered to you yet</p>
       <?php
      }
    ?>

</body>
</html>