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
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM parent WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $child=$row['children'];
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
  left:780px;top:163px;
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
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Student progress</u></strong></h5>
</head>

<?php
 if($child==0)
 {?>
  <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parenthome.php?Parents_AhdF54T&welcome="+val+"&34&GFH0+");
    }
    function add(){
        var val = "<?php echo $u ?>";
        location.replace("parentadd.php?username="+val+"&val=0");
    }
</script>
    <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; font-size: 140%;">Please add your child to veiw progress</p>
    <button onclick="add()" class="button button1" >Find your child</button>
    <button onclick="back()" class="button button3" ><-Back</button>
<?php
 }
 else
 {
  $con = mysqli_connect('localhost','root','17/Eng/099','test');
  $resultset=$con->query("SELECT * FROM progress WHERE parent='$u1'");
  while( $row = $resultset->fetch_assoc())
  {
    $student=$row['student'];
    $ciphering = "BF-CBC"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encrypti= "12345678";
    $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
    $student1 = openssl_encrypt($student, $ciphering, 
   $encryption_key, $options, $encrypti); 
   $student1=str_replace("+","2",$student1);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT * FROM account WHERE username='$student' LIMIT 1");
    if($result->num_rows >0)
    {
       $rows=$result->fetch_assoc();
       $first=$rows['first'];
       $last=$rows['last'];
    }?>
    <script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("parenthome.php?Parents_AhdF54T&welcome="+val+"&34&GFH0+");
    }
    function add(){
        var val = "<?php echo $u ?>";
        location.replace("parentadd.php?username="+val+"&val=0");
    }
</script>
<form method="POST" action="" >
   <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 140%; color:black;">  <a class="a1" href="parentprogress.php?student=<?php echo $student1?>&username=<?php echo "$u"?>&val=0" style="color:white"><?php echo "$first $last" ?></a>
   &nbsp&nbsp <a href="parentprogress.php?student=<?php echo $student1?>&username=<?php echo "$u"?>&val=1"> Remove</a></p>
</form>
    <?php

  }
  ?>
  <button onclick="add()" class="button button2" >Add new student</button>
  <button onclick="back()" class="button button3" ><-Back</button>
  <?php
 }
?>
    

</html>