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
$u=str_replace("2","+",$u);
}
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$s="select * from advertise where username = '$u1'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if(isset($_POST['submit']))
{
    $loc=$_POST['loc'];
    $image_info = @getimagesize($_FILES['image']['tmp_name']);
    if($image_info == false)
    {        }
    else{
        $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    }
    if($image_info == false)
    {
        $error="<p>choosen image error</p>";
    }
    else
    {
        $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $insert=$con->query("INSERT INTO advertise(username,image,location) VALUES('$u1','$file','$loc')");
    header("location:teacheradvertise.php?username=$u");
    }
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
.button3 {
  left:230px;top:20px;
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
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("teacherhome.php?welcome="+val+"&fgd93p=sdfHDw23*df$");
    }
</script>
<button onclick="back()" class="button button3" ><-Back</button>
<title>Teacher advertisments</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<img src="images/font.png"  style="width:350px;height:60px; position: absolute;left:690px;top: 10px;">

</head>
<?php
if($num>=3)
{?>
<body>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
<p align="center" style="font-family:verdana;"> The maximum amount of advertisments have been published</p><br>
</div>
</div>
</div>
</body>
<?php  
}
else
{
?>
<body>
<div class="login-box1">
<div class="row">
<div class="login-left"> 
<h2 align="center">Advertisement</h2>
     <form method="POST" action="" enctype="multipart/form-data">
        
     <table border="0" align="center" cellpadding="5">
     <tr>
             <td align="right">Location : </td>
             <td>         <div class="styled-select">
             <select name="loc" id="subject">  
    <option value="select">Select</option>  
    <option value="all">All</option>
    <option value="kalutara">Kalutara</option>   
    <option value="colombo">Colombo</option>   
    <option value="gampaha">Gampaha</option>   
    <option value="galle">Galle</option>  
    <option value="matara">Matara</option>   
    <option value="Hambantota">Hambantota</option>   
    <option value="anuradhapura">Anuradhapura</option>
    <option value="polonnaruwa">Polonnaruwa</option>
    <option value="nuwara">Nuwara</option>
    <option value="kurunegala">Kurunegala</option>
    <option value="puthalama">Puthalama</option>
    </select>
    </div>
    </td>  
             </tr>
      <table>
<br>
            <p align="center" style="font-family:verdana; color:red"> Upload an image of the Advertisement </p><br>

            <table border="0" align="center" cellpadding="5">
             <tr> 
           
                 <td align="right"> Advertisement  </td>
              
              <td> <input type="file" name="image" id="image" required/></td>
           
               </tr>
             <tr>
                 <td colspan="2" align="center">  <br><br><input type="SUBMIT" name="submit" value="upload" required/></td> 
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
</body>
</body>
<?php
}?>
</html>