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
if(isset($_GET['val'])){
  $val=$_GET['val']; 
}
if(isset($_GET['lgrade'])){
  $lgrade=$_GET['lgrade']; 
}
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
if($resultset->num_rows >0)
    {
        $row=$resultset->fetch_assoc();
        $course=$row["courses"];
    }
if(isset($_POST['submit']))
{
    $message=$_POST['message'];
    if($message==NULL)
    {
        echo '<script type="text/javascript">alert("Enter a message")</script>';  
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $e=$row['email'];   
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $es=$row['email'];   
    }
             $to=$e;
             $subject="Student $es contact you";
             $message=$message;
             $headers="From: '$es'";
             mail($to,$subject,$message,$headers);
             header("location:teacherpreview.php?teacher=$u&student=$stu&grade=$lgrade&val=$val");
}
if(isset($_POST['submits']))
{
    $message=$_POST['message'];
    if($message==NULL)
    {
        echo '<script type="text/javascript">alert("Enter a message")</script>';  
    }
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1'");
    if($resultset->num_rows >0)
    {
        $rows=$resultset->fetch_assoc();
        $email=$rows['email'];
        $first=$rows['first'];
        $subject=$rows['subject'];
        $stream=$rows['stream']; 
        if($stream=="advance")
        {
          $subject=$rows['advance'];
        }
    }

    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and grade='$lgrade'");
    while( $row = $resultset->fetch_assoc())
    {
        $student=$row['student'];
        $con = mysqli_connect('localhost','root','17/Eng/099','test');
        $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
        if($result->num_rows >0)
       {
        $row=$result->fetch_assoc();
        $es=$row['email'];
      }
      $to=$es;
      $subject="Teacher $first of subject $subject";
      $message=$message;
      $headers="From: '$email'";
      mail($to,$subject,$message,$headers);
      header("location:teacherstudents.php?username=$u&grade=$lgrade");
    }
}
if($test==0)
{
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
if($resultset->num_rows >0)
    {
      $row=$resultset->fetch_assoc();
      $student=$row['students'];
      $subject=$row['subject'];
      $stream=$row['stream'];
      $advance=$row['advance'];
    }
    if($stream=="advance")
    {
$insert=$con->query("INSERT INTO following(student,teacher,subject,grade) VALUES('$stu1','$u1','$advance','$lgrade')");
    }
    else
    {
        $insert=$con->query("INSERT INTO following(student,teacher,subject,grade) VALUES('$stu1','$u1','$subject','$lgrade')");
    }
    $student=$student+1;
    $course=$course+1;
    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
    $query="UPDATE teacher SET students='$student' where username='$u1'";
    $query_run=mysqli_query($connection,$query);
    $query="UPDATE account SET courses='$course' where username='$stu1'";
    $query_run=mysqli_query($connection,$query);
header("location:teacherpreview.php?teacher=$u&student=$stu&val=$val");
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
    $course=$course-1;
    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
    $query="UPDATE teacher SET students='$student' where username='$u1'";
    $query_run=mysqli_query($connection,$query);
    $query="UPDATE account SET courses='$course' where username='$stu1'";
    $query_run=mysqli_query($connection,$query);
    header("location:teacherpreview.php?teacher=$u&student=$stu&val=$val");
}

else if($test==3)
{
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
        
        <script>
    function back(){
        var x = "<?php echo $u ?>";
        var gra = "<?php echo $lgrade ?>";
        location.replace("teacherstudents.php?username="+x+"&grade="+gra+"");
    }

  </script>
    <head>
    <button onclick="back()" class="button button3" ><-Back</button>
    <title>Send message </title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div class="login-box">
    <div class="row">
    <div class="login-left"> 
    <h2 align="center">Send message</h2>
    <form method="POST" action="" enctype="multipart/form-data" >
            
             
            <p style="font-family:verdana;">Please enter the message you want to send </p><br>
                    <textarea name="message" class="form-control" row="35" cols="50" placeholder="message" required></textarea><br>
               <br>
                <input type="SUBMIT" name="submits" value="submit" style="width:80px; height:50px" required/> 
                
              
    
          </form>
          </div>
          </div>
          </div>
    </body>
    </html>
    
        <?php
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
         <script>
    function back(){
        var x = "<?php echo $u ?>";
        var val = "<?php echo $stu ?>";
          var v="<?php echo $val ?>";
          location.replace("teacherpreview.php?teacher="+x+"&student="+val+"&val="+v+"");
    }

  </script>
<head>
<title>Send message </title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<button onclick="back()" class="button button3" ><-Back</button>
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">Send message</h2>
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