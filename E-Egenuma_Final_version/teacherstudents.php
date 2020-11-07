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

}if(isset($_GET['grade'])){
  $grade=$_GET['grade'];
 
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
.button2 {
  left:1400px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button0 {
  left:1250px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button0:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button4 {
  left:240px;top:20px;
  background-color: rgba(184, 233, 50, 0.616);
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
  left:100px;top:120px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button5:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
 </style>
<script>
function back(){
  var val = "<?php echo $u ?>";
  location.replace("teachergrade.php?username="+val+"");
}
function exam(){
  var val = "<?php echo $u ?>";
  var gra = "<?php echo $grade?>";
  location.replace("teacherexam.php?username="+val+"&grade="+gra+"");
}
function notify(){
  var $back = "<?php echo $u ?>";
  var $stu = 4;
  var test=3;
  var gra = "<?php echo $grade?>";
  location.replace("teacherfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&lgrade="+gra+"");
}
function upload(){
        var val = "<?php echo $u ?>";
        var grade = "<?php echo $grade ?>";
        location.replace("teacherupload.php?username="+val+"&grade="+grade+"");
    }
    function video(){
        var val = "<?php echo $u ?>";
        var grade = "<?php echo $grade ?>";
        location.replace("egenumastream/video.php?number=teacher&teacher="+val+"&grade="+grade+"");
    }
</script>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<button onclick="video()" class="button button5">Classroom</button>
<button onclick="upload()" class="button button4">Upload</button>
<button onclick="back()" class="button button3" ><-Back</button>
<button onclick="exam()" class="button button2" >Exam marks</button>
<button onclick="notify()" class="button button0" >Notify<br>students</button>
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 300%; color:white;"><strong><u>Students - Grade <?php echo"$grade"?></u></strong></h5>
<?php
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and grade='$grade'");
  if($resultset->num_rows >0)
    {
  while( $row = $resultset->fetch_assoc())
  {
    $student=$row['student'];
    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encrypti= "12345678";
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $student1 = openssl_encrypt($student, $ciphering, 
$encryption_key, $options, $encrypti); 
$student1=str_replace("+","2",$student1);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
    $next=$result->fetch_assoc();
    $first=$next["first"];
    $last=$next["last"];
      ?> 
      <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">  <a  href="studentpreview.php?student=<?php echo "$student1"?>&teacher=<?php echo "$u"?>&val=1&grade=<?php echo"$grade"?>" style="color:white"><?php echo "$first $last" ?></a></p>
      <br>
      <?php
  }
}
else
{?>
  <div class="login-box">
  <div class="row">
  <div class="login-left"> 
  <p style="font-family:verdana;">No students have followed yet </p><br>

  </div>
</div>
</div>
<?php
}
?>
</body>
</html>