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
       $first=$row['first'];
       $last=$row['last'];
       $email=$row['email'];
       $subject=$row['subject'];
       $stream=$row['stream'];
       if($stream=="advance")
       {
        $advance=$row['advance'];
       }
    }
}
if(isset($_GET['grade'])){
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
.button1 {
  left:740px;top:270px;
  background-color: rgba(184, 233, 50, 0.616);
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
  left:760px;top:370px;
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
  left:100px;top:20px;
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
div.welcome{
    width:600px;
    height:90px;
    background-color: rgb(101, 209, 255);
    margin-left: 550px;
    margin-top: 0px;
}
div.welcome1{
    width:580px;
    height:90px;
    background-color: rgb(187, 201, 207);
    margin-left: 10px;
    margin-top: 0px;
}
    </style>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Upload material for students - Grade <?php echo"$grade"?></u></strong></h5>
</head>
<?php
if(isset($_POST['doc'])){
    $today=date("Y-m-d");
    $message=$_POST['message'];
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $fileName = $_FILES['myfile']['name'];
		$tmpName  = $_FILES['myfile']['tmp_name'];
		$fileSize = $_FILES['myfile']['size'];
        $fileType = $_FILES['myfile']['type'];
       
        $fp = fopen($tmpName, 'r');
		$content = fread($fp, $fileSize);
		$content = addslashes($content);
		fclose($fp);
		
		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
        if($fileSize>1000000)
        {
            ?>
            <script>alert('File size should be less than 1 mb')</script>
            <?php
        }
        else
        {
         $message="$message Download the doucment here - http://localhost/userreg/studentassignment.php?username=$u&fname=$fileName";
         $insert=$con->query("INSERT INTO upload(teacher,fname,file,date,grade) VALUES('$u1','$fileName','$content','$today','$grade')");

           $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and grade='$grade'");
    while( $row = $resultset->fetch_assoc())
    {
        $student=$row['student'];
        $subject=$row['subject'];
        $con = mysqli_connect('localhost','root','17/Eng/099','test');
        $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
        if($result->num_rows >0)
       {
        $row=$result->fetch_assoc();
        $es=$row['email'];
      }
      $to=$es;
      $subject="New assignment added subject=$subject";
      $message=$message;
      $headers="From: '$email'";
      mail($to,$subject,$message,$headers);
    }
}
    
}
if(isset($_POST['submit'])){
    ?>
     <script>
    function back(){
        var val = "<?php echo $u ?>";
        var grade = "<?php echo $grade?>";
        location.replace("teacherupload.php?username="+val+"&grade="+grade+"");
    }
</script>
<button onclick="back()" class="button button3" ><-Back</button>
    <div class="login-box">
<div class="row">
<div class="login-left"> 
<p align="center" style="font-family:verdana;"> UPLOAD YOUR DOCUMENT  </p><br>
<form method="POST" action="" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="5">
<tr>
              
              <td align="center"><input type="file" name="myfile" id="FILE" required/></td>
           
               </tr>
             <tr>
          
             <tr>
                 <td align="center">
             <p style="font-family:verdana;">Description of the document for students<br> Message will be emailed to students</p><br>
                <textarea name="message" class="form-control" row="35" cols="50" placeholder="message" required></textarea><br>
</td>
             </tr>
             <tr>
                 <td colspan="2" align="center"><br><input type="SUBMIT"  name="doc" value="Upload" required/></td> 
             </tr>
</table>
<center>
       <h3>
           <?php

              echo $error;           
           ?></h3>
       </center>
</form>
</div>
</div>
</div>
<?php
}
else if(isset($_POST['submits'])){
    ?>
     <script>
    function back(){
        var val = "<?php echo $u ?>";
        var grade = "<?php echo $grade?>";
        location.replace("teacherupload.php?username="+val+"&grade="+grade+"");
    }
</script>
<button onclick="back()" class="button button3" ><-Back</button>
    <div class="login-box">
<div class="row">
<div class="login-left"> 
<p align="center" style="font-family:verdana;"> UPLOAD YOUR DOCUMENT  </p><br>
<form method="POST" action="" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="5">
<tr>
              
              <td align="center"><input type="file" name="myfile" id="FILE" required/></td>
           
               </tr>
             <tr>
          
             <tr>
                 <td align="center">
             <p style="font-family:verdana;">Description of the document for students<br> Message will be emailed to students</p><br>
                <textarea name="message" class="form-control" row="35" cols="50" placeholder="message" required></textarea><br>
</td>
             </tr>
             <tr>
                 <td colspan="2" align="center"><br><input type="SUBMIT"  name="doc" value="Upload" required/></td> 
             </tr>
</table>
<center>
       <h3>
           <?php

              echo $error;           
           ?></h3>
       </center>
</form>
</div>
</div>
</div>
<?php
    
}
else
{
?>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        var grade = "<?php echo $grade?>";
        location.replace("teacherstudents.php?username="+val+"&grade="+grade+"");
    }
</script>
<button onclick="back()" class="button button3" ><-Back</button>
<body>
<div class="welcome">
    <div class="welcome1">
    <h4 align="center">Upload your documents and videos of subject materials.<br>Notifications will be send to students automatically</h4>
    </div>
</div>
<form method="POST" action="" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="5">
<tr>
                 <td colspan="2" align="center"><input type="SUBMIT" class="button button1" name="submit" value="Upload document" required/></td> 
             </tr>
         </table>
</form>
<form method="POST" action="" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="5">
<tr>
                 <td colspan="2" align="center"><input type="SUBMIT" class="button button2" name="submits" value="Upload video" required/></td> 
             </tr>
         </table>
</form>
</body>

<?php
}
?>
</html>