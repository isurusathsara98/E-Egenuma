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
if(isset($_GET['val'])){
    $val=$_GET['val'];
}
if($val==1)
{
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
}
if(isset($_POST['submit']))
{
 $student=$_POST['student'];
 $ciphering = "BF-CBC"; 
 $iv_length = openssl_cipher_iv_length($ciphering); 
 $options = 0; 
 $encrypti= "12345678";
 $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
 $student = openssl_encrypt($student, $ciphering, 
$encryption_key, $options, $encrypti); 
$student=str_replace("+","2",$student);
 header("location:parentadd.php?username=$u&student=$student&val=1");
}
?>
<html>
<style>
 form input{
    float: left;
    margin-left: 100px;
    width: 10%;
    margin: 0;
    border: 0;
    border-bottom: 2px solid rgb(214, 72, 72);
    margin: 0 1%;
    padding: 10px;
    display: block;
    box-sizing: border-box;
    font-size: 16px;
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
  left:770px;top:270px;
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
  left:1170px;top:20px;
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
  left:200px;top:20px;
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
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Student progress</u></strong></h5>

</head>
<body>
<?php
 if($val==1)
{
    if(array_key_exists('add',$_POST)){
        $con = mysqli_connect('localhost','root','17/Eng/099','test');
        $resultset=$con->query("SELECT * FROM progress WHERE student='$student1' and parent='$u1' LIMIT 1");
        if($resultset->num_rows >0)
         {
             echo("<script>alert('Student is already added')</script>");
         }
         else
         {
            $insert=$con->query("INSERT INTO progress(parent,student) VALUES('$u1','$student1')");
            $con = mysqli_connect('localhost','root','17/Eng/099','test');
            $resultset=$con->query("SELECT * FROM parent WHERE username='$u1' LIMIT 1");
            if($resultset->num_rows >0)
            {
               $row=$resultset->fetch_assoc();
               $child=$row['children'];
            }
            $child=$child+1;
            $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
            $query="UPDATE parent SET children='$child' where username='$u1'";
            $query_run=mysqli_query($connection,$query);
            echo("<script>alert('Student successfully added')</script>");
         }
    }
 ?>
 <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentadd.php?username="+val+"&val=0");
    }
</script>
<button onclick="back()" class="button button3" ><-Back</button>
 <?php
 $con = mysqli_connect('localhost','root','17/Eng/099','test');
 $resultset=$con->query("SELECT * FROM account WHERE username='$student1' LIMIT 1");
 if($resultset->num_rows >0)
 {
    $row=$resultset->fetch_assoc();
    $first=$row['first'];
    $last=$row['last'];
    $college=$row['college'];
    ?>
    <form method="POST">
     <p align="center" style="font-family:verdana; color:white;
   font-size: 140%; color:black;"> Student name : <?php echo("$first $last");?> </p>
   <p align="center" style="font-family:verdana; color:white;  
   font-size: 140%; color:black;"> College : <?php echo("$college");?> </p><br>
   <input type="submit" name="add" class="button button1" value="Add student"/>
   </form>

    <?php
 }
 else
 {?>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">Account with <?php echo("$student1") ?> username was not found</p>
    <?php
 }
}
else{
?>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentstudent.php?username="+val+"");
    }
</script>
<p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">Student must have a account inorder to veiw progress</p>
<button onclick="back()" class="button button3" ><-Back</button>
<div class="login-box1">

<div class="login-left"> 
<form method="POST" action="" >
<p style="font-family:verdana;">Enter the username of the student </p>

<textarea name="student" class="form-control" row="4" cols="4" placeholder="type the username of your child" required></textarea><br>
<br>
<input type="SUBMIT" name="submit" value="submit" style="width:80px; height:50px" required/> 
</form>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>