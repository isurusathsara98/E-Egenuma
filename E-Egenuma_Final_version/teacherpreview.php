<?php
$error=NULL;
if(isset($_GET['teacher'])){
    $u=$_GET['teacher'];
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
       $image=$row['image'];
       $bio=$row['bio'];
       $subject=$row['subject'];
       $stream=$row['stream'];
       $students=$row['students'];
       if($stream=="advance")
       {
         $adsub=$row['advance'];
       }
    }
    else
    {
        $error="<p>error</p>";
    }
}
if(isset($_GET['val'])){
    $val=$_GET['val'];
    ?>
    <?php
}
if($val==1)
{
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
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
    if($result->num_rows >0)
    {
      $row=$result->fetch_assoc();
      $lgrade=$row['lgrade'];   

    }
    $resultset=$con->query("SELECT * FROM following WHERE student='$stu1' AND teacher='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
      $row=$resultset->fetch_assoc();
      $id=$row['id'];
      $sub=1;     
    }
    else{
       $sub=0;
    }
}
}
else
{
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
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
    if($result->num_rows >0)
    {
      $row=$result->fetch_assoc();
      $lgrade=$row['lgrade'];   

    }
    $resultset=$con->query("SELECT * FROM following WHERE student='$stu1' AND teacher='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
      $row=$resultset->fetch_assoc();
      $id=$row['id'];
      $sub=1;     
    }
    else{
       $sub=0;
    }
}
if(isset($_GET['username'])){
  $username=$_GET['username'];
  $username=str_replace("2","+",$username);

    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = "12345678"; 
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $username1 = openssl_decrypt ($username, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $username=str_replace("+","2",$username);
}

}

?>
<html>

<script>
    function back(){
        var val = "<?php echo $stu ?>";
        var x = "<?php echo $val ?>";
        
        if(x==1)
        {
        location.replace("studentcourse.php?username="+val+"");
        }
        else if(x==2){
          location.replace("studentsearch.php?username="+val+"");
        }
       
    }
    function preview()
    {
        alert('You are in preview mode') ;       
    }
    function follow(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var lgrade = "<?php echo $lgrade ?>";
      var val= "<?php echo $val ?>";
      var test=0;
        location.replace("teacherfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&lgrade="+lgrade+"&val="+val+"");
        alert('You followed the teacher');
    }
    function unfollow(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var val= "<?php echo $val ?>";
      var test=1;
        location.replace("teacherfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&val="+val+"");
        alert('You unfollowed the teacher');
    }
    function contact(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var val= "<?php echo $val ?>";
      var test=2;
      location.replace("teacherfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&val="+val+"");
    }
</script>
    <head>
    
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
  left:1250px;top: 300px;
  background-color: rgba(184, 233, 50, 0.616);
  padding: 14px 25px;
  font-size: 28px;
  margin:8px 2px;
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
   
    <title>Profile </title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
>
    </head>
    <body>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
    <div class="preview">
    <div class="row">
  <div class="column">
  <h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:150px; margin-top:10px; margin-left:250px; padding:20px; border-radius: 50%;">'; ?></h3>
</div>
</div>
<div class="biodata">
<div class="biotext">
  <br>
    <p style="font-family:verdana; color:white; font-size:120%; text-align:left;" align="left"><?php echo "$bio"?></p>
</div>
</div>
<br>

<h3 style="color:white; text-align:center;">  Name : <?php echo "$first $last"?></h3>
<h3 style="color:white; text-align:center;"> No of Students following : <?php echo "$students"?> Students</h3>
<h3 style="color:white; text-align:center;"> Subject : <?php if($stream=="advance"){echo "$adsub";}else{ echo "$subject";}?></h3>
<?php
 $con = mysqli_connect('localhost','root','17/Eng/099','test');
 $resul=$con->query("SELECT * FROM grade WHERE teacher='$u1'");
 if($resul->num_rows >0)
 {
   ?>
   <h3 style="color:white; text-align:center;">Teaching Grades : 
   <?php 
   while( $row = $resul->fetch_assoc())
   {
        $gra= $row['grade'];
       
   }
   ?>
   
   </h3>

   <?php
 }
?>
  <button onclick="back()" class="button button3" ><-Back</button>

<?php
if($sub==0)
{
  ?>
<button onclick="follow()" class="button button4" >Follow</button>
<?php
}
else
{
  ?>
<button onclick="unfollow()" class="button button4" >UnFollow</button>
<?php
}?>
<h1><?php echo "$val";?></h1>

<button onclick="more()" class="button button5" >More details</button>


<button onclick="contact()" class="button button6" >Contact<br>Teacher</button>

</div>
    </body>
</html>