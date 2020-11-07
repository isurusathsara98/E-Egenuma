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

$examnum=$examnum+1;

if(isset($_POST['submit']))
{
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1'");
  while( $row = $resultset->fetch_assoc())
  {
    $student=$row['student'];
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
    $next=$result->fetch_assoc();
    $first=$next["first"];
    $last=$next["last"];
    $mar=$_POST["$student"];
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $fileName = $_FILES["$first"]['name'];
		$tmpName  = $_FILES["$first"]['tmp_name'];
    $fileSize = $_FILES["$first"]['size'];
    $fileType = $_FILES["$first"]['type'];

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
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $insert=$con->query("INSERT INTO exam(examno,teacher,student,marks,subject,grade,paper,fname) VALUES('$examnum','$u1','$student','$mar','$subject','$gra','$content','$fileName')");
        }
  }
  $connection = mysqli_connect('localhost','root','17/Eng/099');
  $db=mysqli_select_db($connection,'test');
  $query="UPDATE teacher SET exam='$examnum' where username='$u1'";
  $query_run=mysqli_query($connection,$query);
  echo"<script>alert('Marks added successfully')</script>";
  header("location:teacherexam.php?username=$u&grade=$gra&fgd9sdfse=&7523*df$");
}
?>
<html>
<style>
        input{
            box-shadow:1px 1px 2px 1px;
            width:50px;       
        }
        input.i1{
            box-shadow:1px 1px 2px 1px;
            width:100px;       
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
        var grade = "<?php echo $gra?>";
          location.replace("teacherexam.php?username="+x+"&grade="+grade+"&fgd93p=sdfHDw23*df$");
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
<p align="center" style="font-family:verdana; color:white; font-size: 140%;">Exam <?php echo"$examnum"?></p>
<?php
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and grade='$gra'");
  ?>

<div class="login-box">

  <form method="POST" action="" enctype="multipart/form-data">
  <table border="0" align="center" cellpadding="5">
  <?php
  while( $row = $resultset->fetch_assoc())
  {
    $student=$row['student'];
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
    $next=$result->fetch_assoc();
    $first=$next["first"];
    $last=$next["last"];
      ?> 
      <tr>
      <td align="right">
      <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 130%;">  <a  href="studentpreview.php?student=<?php echo "$student"?>&teacher=<?php echo "$u"?>&val=1&grade=<?php echo"$gra"?>" style="color:white"><?php echo "$first $last" ?></a></p></td>
      <td>&nbsp&nbsp&nbsp&nbsp<input type="TEXT" name="<?php echo"$student"?>" placeholder="marks" required/><td>
      <td align="center"><input type="file" name="<?php echo"$first"?>" id="FILE" required/></td>
      <tr>
      <?php
  }
?>
<tr>
                 <td colspan="2" align="center"><input type="SUBMIT" class="i1" name="submit" value="submit marks" required/></td> 
             </tr>
</table>

</form>


</div>
</body>
</html>