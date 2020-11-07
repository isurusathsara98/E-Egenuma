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
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $grade=$row['lgrade'];
    }
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
}
if(isset($_GET['subject'])){
    $subject=$_GET['subject']; 
    $subject=str_replace("2","+",$subject);
    $subject1 = openssl_decrypt ($subject, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $subject=str_replace("+","2",$subject);
}
if(isset($_GET['val'])){
    $val=$_GET['val']; 
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
  left:130px;top:20px;
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
</style>
<?php
   if($val==0)
   {?>
     <script>
    function back(){
        var val = "<?php echo $u ?>";
        var x= "<?php echo $teacher ?>";
        var sub= "<?php echo $subject ?>";
        location.replace("studentexams.php?student="+val+"&teacher="+x+"&subject="+sub+"&val=1");
    }
</script>
    <button onclick="back()" class="button button3" ><-Back</button>
   <?php
   }
   else if($val==1)
   {
    ?>
    <script>
   function back(){
       var val = "<?php echo $ty ?>";
       location.replace("parent.php?username="+val+"");
   }
</script>
   <button onclick="back()" class="button button3" ><-Back</button>
  <?php
   }?>
<head>
<title>Exams</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:40px; font-family:verdana; font-size: 10px; color:white;"><strong><u>Assignments of <?php echo"$subject"?></u></strong></h5>
</head>
<body>

    <?php
$con = mysqli_connect('localhost','root','17/Eng/099','test');
   $resultset=$con->query("SELECT * FROM upload WHERE teacher='$teacher1' and grade='$grade'");
   if($resultset->num_rows >0)
   {?>
   <table border="0" align="center" cellpadding="0">
  <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">Material/Document </p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Upload date</p></td>
  </tr>
   <?php
   while( $row = $resultset->fetch_assoc())
   {
       $fname=$row['fname'];
       $date=$row['date'];
       ?>
    <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;"> <a href="studentassignment.php?fname=<?php echo $fname?>&username=<?php echo "$teacher"?>" style="color:white"><?php echo"$fname"?></a></p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp&nbsp&nbsp  <?php echo"$date" ?></p></td>
  </tr>
       <?php
   }
   ?>
   </table>
   <?php
}
else
{
    ?>
         <p align="center" style="margin-top:60px; font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;"> No material have been upload yet</p>
       <?php
}
    ?>
</body>
</html>