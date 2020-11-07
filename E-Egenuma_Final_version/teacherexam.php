<?php
$error=NULL;
if(isset($_GET['username'])){
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

}
if(isset($_GET['grade'])){
  $gra=$_GET['grade']; 
}
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
if($resultset->num_rows >0)
{
    $row=$resultset->fetch_assoc();
    $subject=$row['subject'];
    $stream=$row['stream'];
    if($stream=="advance")
    {
        $subject=$row['advance'];
    }
}
$resultset=$con->query("SELECT * FROM exam WHERE teacher='$u1' and grade='$gra'");
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

.button4 {
    left:1400px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
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
<script>
    function back(){
        var x = "<?php echo $u ?>";
        var grade = "<?php echo $gra ?>";
          location.replace("teacherstudents.php?username="+x+"&grade="+grade+"");
    }
    function add(){
        var x = "<?php echo $u ?>";
        var grade = "<?php echo $gra ?>";
        location.replace("teacheraddexam.php?username="+x+"&grade="+grade+"");
    }
  </script>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Exams of <?php echo"$subject"?> - Grade <?php echo"$gra"?></u></strong></h5>
</head>
<body>
<button onclick="back()" class="button button3" ><-Back</button>
<button onclick="add()" class="button button4" >Add exam</button>
<?php
if($examnum>0)
{ $checknum="1";
    while($checknum<=$examnum)
    {?>
        <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;"><u>Exam <?php echo"$checknum"?></u></p>
        <?php
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and grade='$gra'");
  while( $row = $resultset->fetch_assoc())
  {
    $student=$row['student'];

    $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
    $next=$result->fetch_assoc();
    $first=$next["first"];
    $last=$next["last"];

    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM exam WHERE student='$student' and examno='$checknum' and teacher='$u1' and subject='$subject'");
    while( $rows = $result->fetch_assoc())
    {
        $marks=$rows['marks'];
        ?> 
        <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">  <a  href="studentpreview.php?student=<?php echo "$student"?>&teacher=<?php echo "$u1"?>&val=1&grade=<?php echo"$gra"?>" style="color:white"><?php echo "$first $last" ?></a>  --- <?php echo"$marks"?> marks</p>
        <?php
    }
     
  }
  $checknum=$checknum+1;
}
}
else
{?>
  <div class="login-box">
  <div class="row">
  <div class="login-left"> 
  <p style="font-family:verdana;">No exams have been conducted yet </p><br>

  </div>
</div>
</div>
<?php
}
?>
</body>
</html>
