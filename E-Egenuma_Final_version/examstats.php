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
if(isset($_GET['examno'])){
    $examno=$_GET['examno'];
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
        </style>
<head>
<title>Exams statics</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Exam <?php echo"$examno"?> of <?php echo"$subject1"?></u></strong></h5>
</head>
<body> 

<script>
  <?php
  if($val==1)
  {
  ?>
    function back(){
        var val = "<?php echo $student ?>";
        var x = "<?php echo $teacher ?>";
        var sub = "<?php echo $subject ?>";
          location.replace("studentexams.php?student="+val+"&teacher="+x+"&val=1&subject="+sub+"");
        
    }
    <?php
  }
  else
  {?>
  function back(){
        var val = "<?php echo $student ?>";
        var x = "<?php echo $teacher ?>";
        var sub = "<?php echo $subject ?>";
        var u="<?php echo $username?>";
          location.replace("studentexams.php?username="+u+"&student="+val+"&teacher="+x+"&subject="+sub+"&val=2");
        
    }
<?php
  }
  ?>

  </script>
  
  <button onclick="back()" class="button button3" ><-Back</button>
<div class="login-box2">

<div class="login-left"> 
    <?php 
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT MAX(marks),COUNT(marks),AVG(marks) FROM exam WHERE teacher='$teacher1' and subject='$subject1' and grade='$grade' and examno='$examno'");
    if($resultset->num_rows >0)
    {
        $row=$resultset->fetch_assoc();
        $mark=$row['MAX(marks)'];
        $mark1=$row['COUNT(marks)'];
        $mark2=$row['AVG(marks)'];
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM exam WHERE student='$student1' and teacher='$teacher1' and subject='$subject1' and grade='$grade'");
    if($resultset->num_rows >0)
    {
        $row=$resultset->fetch_assoc();
        $fname=$row['fname'];
    }
    ?>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;">Highest marks obtained for the test : <?php echo"$mark"?> marks <br><br>
   Average marks obtained for the test : <?php echo"$mark2"?> marks <br><br>
   Number of students sat for the exam : <?php echo"$mark1"?> marks <br><br>
   <p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;"> <a href="studentpaper.php?student=<?php echo $student?>&examno=<?php echo "$examno"?>&fname=<?php echo"$fname"?>" style="color:white">Get the paper</a></p>
      
</p>
</div>
</div>

 
</body>