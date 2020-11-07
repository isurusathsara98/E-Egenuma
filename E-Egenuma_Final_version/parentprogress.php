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
    
}
if(isset($_GET['val'])){
    $val=$_GET['val'];
    
}
if($val==1)
{
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $sql = "DELETE FROM progress WHERE student='$student1' and parent='$u1'";
    if ($con->query($sql) === TRUE) {
      
      } 
      $resultset=$con->query("SELECT * FROM parent WHERE username='$u1' LIMIT 1");
      if($resultset->num_rows >0)
          {
            $row=$resultset->fetch_assoc();
            $children=$row['children'];
          }
          $children=$children-1;
          $connection = mysqli_connect('localhost','root','17/Eng/099');
          $db=mysqli_select_db($connection,'test');
          $query="UPDATE parent SET children='$children' where username='$u1'";
          $query_run=mysqli_query($connection,$query);
          header("location:parentstudent.php?username=$u");
}
else if($val==0)
{
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$student1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $first=$row['first'];
       $last=$row['last'];
       $image=$row['image'];
       $college=$row['college'];
       $course=$row['courses'];
       $grade=$row['lgrade'];
    }
    ?>
    <html>
    <style>
a.a1:link {
  background-color: yellow;
  padding: 4px 8px;
}

a.a1:visited {
  background-color: cyan;
  padding: 4px 8px;
}

a.a1:hover {
  background-color: lightgreen;
}

a.a1:active {
  background-color: hotpink;
} 
a.a2:link, a.a2:visited {
  background-color: #f44336;
  color: white;
  padding: 4px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.a2:hover, a.a2:active {
  background-color: red;
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
.button1 {
  left:1130px;top:163px;
  background-color: rgba(184, 233, 50, 0.616);
  font-size: 18px;
  margin:8px 2px;
  padding: 8px 20px;
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
</style>
    <head>
    <title>Your child progress</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
    </head>
    <body>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentstudent.php?username="+val+"");
    }
</script>
    <button onclick="back()" class="button button3" ><-Back</button>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:200px; margin-top:70px; margin-left:40px; padding:20px; border-radius: 50%;">'; ?></p>
    <div class="contain">
    <p align="center" style="font-family:verdana; color:white;  text-transform:uppercase;
   font-size: 140%; color:black;"> Name : <?php echo"$first $last"?><br>College : <?php echo"$college"?><br>No of courses : <?php echo"$course"?><br> Grade : <?php echo"$grade"?></p>
<br> 
<p align="center" style="font-family:verdana; color:white; 
   font-size: 140%; color:black;"> Studying subjects</p>
     <?php
     if($course>0)
     {
        $con = mysqli_connect('localhost','root','17/Eng/099','test');
        $resultset=$con->query("SELECT * FROM following WHERE student='$student1'");
        while( $row = $resultset->fetch_assoc())
        {
            $teacher=$row['teacher'];
            $subject=$row['subject'];
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
            ?>
             <p align="center" style="font-family:verdana; color:white; 
   font-size: 140%; color:black;"><a  href="studentexams.php?student=<?php echo $student?>&teacher=<?php echo "$teacher1"?>&val=2&username=<?php echo "$u"?>&subject=<?php echo "$subject1"?>" style="color:white"> <?php echo "$subject" ?></a> teached by <a  href="teacherpreview.php?student=<?php echo $student?>&teacher=<?php echo "$teacher1"?>&val=3&username=<?php echo "$u"?>" style="color:white"><?php echo "$first $last" ?></a> </p>
            <?php
        }
     }
     ?>
</div>    
</body>
    </html>
    <?php
}
?>