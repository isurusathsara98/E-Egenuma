<html>
    <style>
       form input{
    float: left;
    margin-left: 100px;
    width: 100%;
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
  left:1430px;top:20px;
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
<title>Teacher search</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
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
       $first=$row['first'];
       $last=$row['last'];
       $email=$row['email'];
       $image=$row['image'];
       $college=$row['college'];
       $grade=$row['grade'];
       $lgrade=$row['lgrade'];
    }
    else
    {
        $error="<p>error</p>";
    }
}
if(isset($_POST['mathbio']))
{
    $mathbio=$_POST['sicsub'];

    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE advance='$mathbio' and stream='$grade'");
    ?>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("studentsearch.php?username="+val+"");
    }
</script>

    <button onclick="back()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
      <?php
      if($resultset->num_rows >0)
      {
      ?>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">Teacher  &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp  stream   &nbsp&nbsp&nbsp&nbsp   subject</p>
    <?php
    while( $row = $resultset->fetch_assoc())
   {
    $fir=$row['first'];
    $las=$row['last'];
    $username=$row['username'];
    $stream=$row['stream'];
    $subject=$row['subject'];
    $advsub=$row['advance'];  
    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encrypti= "12345678";
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $username1 = openssl_encrypt($username, $ciphering, 
$encryption_key, $options, $encrypti); 
$username1=str_replace("+","2",$username1);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM grade WHERE grade='$lgrade' and teacher='$username'");
    if($result->num_rows >0)
    {
      ?> 
      
      
      <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%; color:black;">  <a  href="teacherpreview.php?student=<?php echo "$u"?>&teacher=<?php echo "$username1"?>&val=2" style="color:white"><?php echo "$fir $las" ?></a> &nbsp <?php echo "$stream"?> &nbsp&nbsp <?php echo "$mathbio"?> &nbsp
      </p>
      <br>
      <?php
    }  
      
    }
  }
  else
  {?>
    <br><br>
    <p align="center" style="font-family:verdana; color:black; font-size: 140%;"> No teachers are available for this subject</p>

<?php
  }
}
else{
if(isset($_POST['submit']))
{
  $sub=$_POST['subject'];
  if($sub=="select")
  {
      echo "<script>alert('Please select a subject ')</script>";
      header("location:studentsearch.php?username=$u");
  }
  else if($sub=="Physical")
  {?>
  <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("studentsearch.php?username="+val+"");
    }
</script>
  <button onclick="back()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
<form method="POST" action="" >
<p align="center" style="font-family:verdana;">Grade of studying : Grade <?php echo"$lgrade"?> </p><br>

         <p align="center" style="font-family:verdana;">If you want to change the grade go to profile->account update </p><br>
         <div class="styled-select">
         <select name="set" id="cars">
         <option value="<?php $grade?>"><?php echo "$grade";?> level</option>
         </select>
         <select name="set" id="cars">
         <option value="<?php $sub?>"><?php echo "$sub";?></option>
         </select>
         <br><br>
    
    <select name="sicsub" id="subject">  
    <option value="select">Select</option>  
    <option value="mathematics">Mathematics</option>  
    <option value="chemistry">Chemistry</option>  
    <option value="physics">physics</option> 
    </select>

      </div>
    <br><br>
    <input type="SUBMIT" name="mathbio" value="Search" style="width:80px; height:50px" required/>  
    </form>
    </div>
    </div>
    </div>
    <?php
  }
  else if($sub=="Biology")
  {
    ?>
     <script>
    function backl(){
        var val = "<?php echo $u ?>";
        location.replace("studentsearch.php?username="+val+"");
    }
</script>
     
    <button onclick="backl()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
<form method="POST" action="" >
<p align="center" style="font-family:verdana;">Grade of studying : Grade <?php echo"$lgrade"?> </p><br>

         <p align="center" style="font-family:verdana;">If you want to change the grade go to profile->account update </p><br>
         <div class="styled-select">
         <select name="set" id="cars">
         <option value="<?php $grade?>"><?php echo "$grade";?> level</option>
         </select>
         <select name="set" id="cars">
         <option value="<?php $sub?>"><?php echo "$sub";?></option>
         </select>
         <br><br>
    <select name="sicsub" id="subject">  
    <option value="select">Select</option>  
    <option value="Biology">Biology</option>  
    <option value="chemistry">Chemistry</option>  
    <option value="physics">physics</option> 
    </select> 
    </div>
    <br><br>
    <input type="SUBMIT" name="mathbio" value="Search" style="width:80px; height:50px" required/>  
    </form>
    </div>
    </div>
    </div>
    <?php
  }
  else{
      
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE subject='$sub' and stream='$grade'");
    ?>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("studentsearch.php?username="+val+"");
    }
</script>
     
    <button onclick="back()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
      <br>
      <?php
      if($resultset->num_rows >0)
      {
      ?>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">Teacher  &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp  stream   &nbsp&nbsp&nbsp&nbsp   subject</p>
    <?php
    while( $row = $resultset->fetch_assoc())
   {
    $fir=$row['first'];
    $las=$row['last'];
    $username=$row['username'];
    $stream=$row['stream'];
    $subject=$row['subject'];
    $advsub=$row['advance'];   
    $ciphering = "BF-CBC"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encrypti= "12345678";
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
        $username1 = openssl_encrypt($username, $ciphering, 
    $encryption_key, $options, $encrypti); 
    $username1=str_replace("+","2",$username1);
    $result=$con->query("SELECT * FROM grade WHERE grade='$lgrade' and teacher='$username'");
    if($result->num_rows >0)
    {
      ?> 
      
      
      <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%; color:black;">  <a  href="teacherpreview.php?student=<?php echo "$u"?>&teacher=<?php echo "$username1"?>&val=2" style="color:white"><?php echo "$fir $las" ?></a> &nbsp <?php echo "$stream"?> &nbsp&nbsp <?php echo "$subject"?> &nbsp
      <?php
       if($stream=="advance")
       {?>
           
           <?php
       }
     ?>
      </p>
      <br>
      <?php
    }  
    }
  }
  else
  {?>
    <br><br>
    <p align="center" style="font-family:verdana; color:black; font-size: 140%;"> No teachers are available for this subject</p>

<?php
  }
  }
}
else
{
?>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("studenthome.php?welcome="+val+"");
    }
    function ads(){
        var val = "<?php echo $u ?>";
        location.replace("studentadvertise.php?username="+val+"");
    }
</script>
<body>
<button onclick="ads()" class="button button4" >Best teachers </button>
<button onclick="back()" class="button button3" ><-Back</button>
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
<h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
<div class="login-box1">
<div class="row">
<div class="login-left"> 

<?php
if($lgrade==NULL)
{?>
     <p align="center" style="font-family:verdana;">The studying grade is not yet updated. </p><br>
     <p align="center" style="font-family:verdana;">If you want to update the studying grade go to profile->account update </p><br>

<?php
}
   else if($grade=="primary")
    {?>
    <p align="center" style="font-family:verdana;">Grade of studying : Grade <?php echo"$lgrade"?> </p><br>

        <form method="POST" action="" >
        
         <p align="center" style="font-family:verdana;">If you want to change the grade go to profile->account update </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php $grade?>"><?php echo "$grade";?> level</option>
  
        </select>  
        <select name="subject" id="cars">  
        <option value="select">Select</option>
         <option value="Mathematics">Mathematics</option>  
         <option value="Science">Science</option>  
         <option value="English">English</option> 
         <option value="Sinhala">Sinhala</option> 
         <option value="Tamil">Tamil</option> 
         <option value="Religion">Religion</option> 
  
        </select>  
    </div>
    <br><br>
    <input type="SUBMIT" name="submit" value="Search" style="width:80px; height:50px" required/> 
             
        </form>
    </div>
    </div>
    </div>
<?php 
    }
   else if($grade=="ordinary")
    {?>
    <p align="center" style="font-family:verdana;">Grade of studying : Grade <?php echo"$lgrade"?> </p><br>

        <form method="POST" action="" >
         <p align="center" style="font-family:verdana;">If you want to change the grade go to profile->account update </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php $grade?>"><?php echo "$grade";?> level</option>
  
        </select>  
        <select name="subject" id="cars">  
         <option value="select">Select</option>
  <option value="Mathematics">Mathematics</option>  
  <option value="Science">Science</option>  
  <option value="English">English</option> 
  <option value="Sinhala">Sinhala</option> 
  <option value="Tamil">Tamil</option> 
  <option value="Religion">Religion</option> 
  <option value="History">Religion</option> 
  <option value="Geography">Geography</option> 
  <option value="Social Studies">Social studies</option> 
  <option value="Dancing">Dancing</option> 
  <option value="English literature">English Literature</option> 
  
        </select>  
    </div>
    <br><br>
    <input type="SUBMIT" name="submit" value="Search" style="width:80px; height:50px" required/> 
             
        </form>
    </div>
    </div>
    </div>
<?php 
    }
    else if($grade=="advance")
    {?>
    <p align="center" style="font-family:verdana;">Grade of studying : Grade <?php echo"$lgrade"?> </p><br>

        <form method="POST" action="" >
         <p align="center" style="font-family:verdana;">If you want to change the grade go to profile->account update </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php $grade?>"><?php echo "$grade";?> level</option>
  
        </select>  
        <select name="subject" id="cars">  
        <option value="select">Select</option>}  
        <option value="Physical">Physical Sciences</option>  
        <option value="Biology">Biological Sciences</option>  
        <option value="Arts">Arts</option> 
         <option value="Comers">Commerce</option> 
  
        </select>  
    </div>
    <br><br>
    <input type="SUBMIT" name="submit" value="Search" style="width:80px; height:50px" required/> 
             
        </form>
    </div>
    </div>
    </div>
<?php 
    }
}
}
    ?>
</body>
</html>