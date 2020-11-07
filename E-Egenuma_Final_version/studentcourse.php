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
.button1 {
  left:770px;top:220px;
  background-color: rgba(184, 233, 50, 0.616);
  font-size: 22px;
  margin:8px 2px;
  padding: 14px 25px;
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}

.button2 {
  left:1370px;top:20px;
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


.button4 {
  left:130px;top:20px;
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
</style>
<head>
<title>Courses</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Courses</u></strong></h5>
</head>
<body>
<?php
   $con = mysqli_connect('localhost','root','17/Eng/099','test');
   $resultset=$con->query("SELECT * FROM following WHERE student='$u1' and grade='$grade'");
   if($resultset->num_rows >0)
   {

   while( $row = $resultset->fetch_assoc())
   {
      $subject=$row['subject'];
      $teacher=$row['teacher'];
      $ciphering = "BF-CBC"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encrypti= "12345678";
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
        $teacher1 = openssl_encrypt($teacher, $ciphering, 
    $encryption_key, $options, $encrypti); 
    $teacher1=str_replace("+","2",$teacher1);
    $subject1 = openssl_encrypt($subject, $ciphering, 
    $encryption_key, $options, $encrypti); 
    $subject1=str_replace("+","2",$subject1);

      $con = mysqli_connect('localhost','root','17/Eng/099','test');
      $result=$con->query("SELECT * FROM teacher WHERE username='$teacher' LIMIT 1");
      if($result->num_rows >0)
      {
         $rows=$result->fetch_assoc();
         $first=$rows['first'];
         $last=$rows['last'];
      }
      ?>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("student.php?username="+val+"");
    }
   
</script>
<button onclick="back()" class="button button3" ><-Back</button>
   <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;"><a  href="studentexams.php?student=<?php echo $u?>&teacher=<?php echo "$teacher1"?>&val=1&subject=<?php echo "$subject1"?>" style="color:white"> <?php echo "$subject" ?></a> teached by <a  href="teacherpreview.php?student=<?php echo $u?>&teacher=<?php echo "$teacher1"?>&val=1" style="color:white"><?php echo "$first $last" ?></a> </p>
    <?php
   }
  }
  else{
    ?>
    <script>
       function back1(){
      var val = "<?php echo $u ?>";
      location.replace("student.php?username="+val+"");
       }
    </script>
    
  <button onclick="back1()" class="button button4" ><-Back</button>
  <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;"> Not yet  Registered to a course</p>
  <?php
  }
?> 
</body>
</html>