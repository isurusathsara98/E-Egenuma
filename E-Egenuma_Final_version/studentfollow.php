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
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
        $row=$resultset->fetch_assoc();
        $stream=$row['stream'];
        $sub=$row['subject'];
        if($stream=="advance")
        {
            $advsub=$row['advance'];
        }
    }
}
if(isset($_GET['student'])){
    $stu=$_GET['student']; 
    $stu=str_replace("2","+",$stu);
    $ciphering = "BF-CBC"; 
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0; 
      $encryption_iv = "12345678"; 
      $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
      $stu1 = openssl_decrypt ($stu, $ciphering, 
    $encryption_key, $options, $encryption_iv); 
    $stu=str_replace("+","2",$stu);
}
if(isset($_GET['test'])){
    $test=$_GET['test']; 
}
if(isset($_GET['grade'])){
    $gra=$_GET['grade']; 
}
if(isset($_POST['submit']))
{
    $message=$_POST['message'];
    if($message==NULL)
    {
        echo '<script type="text/javascript">alert("An error occured during registration")</script>';  
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $e=$row['email'];   
       $name=$row['first'];
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $es=$row['email'];   
    }
             $to=$es;
             $subject="Teacher '$name' contact you";
             $message=$message;
             $headers="From: '$e'";
             mail($to,$subject,$message,$headers);
            
            header('location:thankyou.php');
}
if($test==0)
{
$con = mysqli_connect('localhost','root','17/Eng/099','test');
if($stream=="advance")
{
$insert=$con->query("INSERT INTO following(student,teacher,subject,grade) VALUES('$stu1','$u1','$advsub','$gra')");
}
else
{
    $insert=$con->query("INSERT INTO following(student,teacher,subject,grade) VALUES('$stu1','$u1','$sub','$gra')");

}
$resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
if($resultset->num_rows >0)
    {
      $row=$resultset->fetch_assoc();
      $student=$row['students'];
    }
    $student=$student+1;
    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
    $query="UPDATE teacher SET students='$student' where username='$u1'";
    $query_run=mysqli_query($connection,$query);
header("location:studentpreview.php?teacher=$u&val=1&student=$stu&grade=$gra");
}
else if($test==1)
{
    
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $sql = "DELETE FROM following WHERE student='$stu1' and teacher='$u1'";
    if ($con->query($sql) === TRUE) {
      
      } 
      $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
if($resultset->num_rows >0)
    {
      $row=$resultset->fetch_assoc();
      $student=$row['students'];
    }
    $student=$student-1;
    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
    $query="UPDATE teacher SET students='$student' where username='$u1'";
    $query_run=mysqli_query($connection,$query);
    header("location:studentpreview.php?teacher=$u&val=1&student=$stu&grade=$gra");
}
else{
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

</style>
<head>
<title>Send message </title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
    function back(){
        var x = "<?php echo $u ?>";
        var gra = "<?php echo $gra ?>";
        location.replace("teacherstudents.php?username="+x+"&grade="+gra+"");
    }

  </script>
    <head>
    <button onclick="back()" class="button button3" ><-Back</button>
<body>
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">Send message to student</h2>
<form method="POST" action="" enctype="multipart/form-data" >
        
         
        <p style="font-family:verdana;">Please enter the message you want to send </p><br>
                <textarea name="message" class="form-control" row="35" cols="50" placeholder="message" required></textarea><br>
           <br>
            <input type="SUBMIT" name="submit" value="submit" style="width:80px; height:50px" required/> 
            
          

      </form>
      </div>
      </div>
      </div>
</body>
</html>

    <?php
}

?>