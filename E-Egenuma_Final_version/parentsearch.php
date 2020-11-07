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

    </style>

<head>
<title>Teacher search</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
if(isset($_GET['username'])){
    $u=$_GET['username'];
}
if(isset($_GET['cat']))
{
    echo "<script>alert('Please select a educational level ')</script>";
}
if(isset($_GET['t']))
{
    echo "<script>alert('Please select a subject ')</script>";
}
if(isset($_POST['mathbio']))
{
    $mathbio=$_POST['sicsub'];
    $grade=$_POST['set1'];

    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE advance='$mathbio' and stream='$grade'");
    ?>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentsearch.php?username="+val+"");
    }
</script>
     
    <button onclick="back()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
      <table border="1" align="center" cellpadding="0">


    <?php
    if($resultset->num_rows >0)
    {?>
      <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">Teacher</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Stream</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Subject</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Grade</p></td>

  </tr>
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
      ?>      
      <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;"><a  href="teacherpreview2.php?username=<?php echo "$u"?>&teacher=<?php echo "$username1"?>" style="color:white"><?php echo "$fir $las" ?></a></p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp <?php echo "$stream"?></p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp <?php echo "$mathbio"?></p></td>

     
     
     
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp 
      <?php
      $res=$con->query("SELECT * FROM grade WHERE teacher='$username'");
      if($res->num_rows >0)
      {
          while($rows = $res->fetch_assoc())
          {
            $gra=$rows['grade'];
            echo "$gra ";
          }
      }
      ?>
      </p></td>
</tr>
     
      </p>
      <br>
      <?php
    }
}
else{
    ?>
     <br><br>
    <p align="center" style="font-family:verdana; color:black; font-size: 140%;"> No teachers are available for this subject</p>

    <?php
}
    
}

elseif(isset($_POST['submit']))
{
  $sub=$_POST['subject'];
  $grade=$_POST['set'];
  
  if($sub=="select")
  {
      header("location:parentsearch.php?username=$u&t=1");
  }
  else if($sub=="Physical")
  {?>
  <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentsearch.php?username="+val+"");
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
         <p align="center" style="font-family:verdana;">Selected Educational Level - <?php echo"$grade"?> </p><br>
         <div class="styled-select">
         <select name="set1" id="cars">
         <option value="<?php echo"$grade"?>"><?php echo "$grade";?> level</option>
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
        location.replace("parentsearch.php?username="+val+"");
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
<p align="center" style="font-family:verdana;">Selected Educational Level - <?php echo"$grade"?> </p><br>
         <div class="styled-select">
         <select name="set1" id="cars">
         <option value="<?php echo"$grade"?>"><?php echo "$grade";?> level</option>
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
        location.replace("parentsearch.php?username="+val+"");
    }
</script>
     
    <button onclick="back()" class="button button3" ><-Back</button>
    <img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
      <img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
      <h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
      <br>
      <table border="1" align="center" cellpadding="0">
      <?php
    if($resultset->num_rows >0)
    {?>
      <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">Teacher</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Stream</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Subject</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp Grade</p></td>

  </tr>
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
      ?> 
      
      
      <tr>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp<a  href="teacherpreview2.php?username=<?php echo "$u"?>&teacher=<?php echo "$username1"?>&val=1" style="color:white"><?php echo "$fir $las" ?></a>&nbsp&nbsp</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp <?php echo "$stream"?>&nbsp&nbsp</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp <?php echo "$subject"?>&nbsp&nbsp</p></td>
  <td><p align="center" style="margin-top:50px;font-family:verdana; color:white; font-size: 140%;">&nbsp&nbsp 
      <?php
      $res=$con->query("SELECT * FROM grade WHERE teacher='$username'");
      if($res->num_rows >0)
      {
          while($rows = $res->fetch_assoc())
          {
            $gra=$rows['grade'];
            echo "$gra ";
          }
      }
      ?>
      </p></td>
</tr>
      <?php
        if($stream=="advance")
        {?>
            <?php echo "($advsub)"?>
            <?php
        }
      ?>
      </p>
      <br>
      <?php
    }
}
else{
    ?>
     <br><br>
    <p align="center" style="font-family:verdana; color:black; font-size: 140%;"> No teachers are available for this subject</p>

    <?php
}

  }
}
elseif(isset($_POST['submited']))
{
    $grade=$_POST['grade'];
    
?>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parentsearch.php?username="+val+"");
    }
</script>
<body>
<button onclick="back()" class="button button3" ><-Back</button>
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
<h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
    
<?php
if($grade=="select")
{
    
      header("location:parentsearch.php?username=$u&cat=1");
}
    elseif($grade=="primary")
    {?>
        <form method="POST" action="" >
        <p align="center" style="font-family:verdana;">Selected Educational Level - <?php echo"$grade"?> </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php echo"$grade"?>"><?php echo "$grade";?> level</option>
  
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
        <form method="POST" action="" >
        <p align="center" style="font-family:verdana;">Selected Educational Level - <?php echo"$grade"?> </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php echo"$grade"?>"><?php echo "$grade";?> level</option>
  
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
        <form method="POST" action="" >
        <p align="center" style="font-family:verdana;">Selected Educational Level - <?php echo"$grade"?> </p><br>
         <div class="styled-select">
         <select name="set" id="cars">  
         <option value="<?php echo"$grade"?>"><?php echo "$grade";?> level</option>
  
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
else
{
    ?>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parenthome.php?parent_account_&welcome="+val+"");
    }
</script>
<body>
<button onclick="back()" class="button button3" ><-Back</button>
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<img src="images/search.png"  style="width:500px;height:40px; position: absolute;left:600px;top: 85px;">
<h5 align="center" style="margin-top:133px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Search Teachers</u></strong></h5>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
<form method="POST" action="" >
         <p align="center" style="font-family:verdana;">Please select the level of Teachers you want to search </p><br>
         <div class="styled-select">  
        <select name="grade" id="cars">  
        <option value="select">Select</option>
         <option value="primary">Primary Level</option>  
         <option value="ordinary">Ordinary Level</option>  
         <option value="advance">Advance Level</option>  
        </select>  
    </div>
    <br><br>
    <input type="SUBMIT" name="submited" value="Search" style="width:80px; height:50px" required/> 
             
        </form>
    </div>
    </div>
    </div>
<?php
}

    ?>
</body>
</html>