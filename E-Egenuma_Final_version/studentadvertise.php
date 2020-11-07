<?php
if(isset($_GET['username']))
{
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
$resultset=$con->query("SELECT * FROM account WHERE username='$u1' LIMIT 1");
if($resultset->num_rows >0)
{
   $row=$resultset->fetch_assoc();
   $loc=$row['location'];
}
else
{
    $error="<p>error</p>";
}
if(isset($_POST['submit']))
{
  $loc=$_POST['loc'];
}
?>
<html>
<style>
   div.welcome{
    width:420px;
    height:80px;
    background-color: rgb(196, 236, 252);
    margin-left: 670px;
    margin-top: 0px;
}
div.welcometx{
    width:400px;
    height:80px;
    background-color: rgb(139, 243, 234);
    margin-left: 10px;
    margin-top: 1px;
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
.button4 {
  left:1100px;top: 130px;
  padding: 10px 14px;
  font-size: 14px;
  margin:10px 6px;
  background-color: rgba(249, 255, 255, 0.623);
  color: rgb(16, 158, 63);
  border: 2px solid #28ad4a;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button4:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #00bb64;
  color: white;
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
<script>
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("studentsearch.php?username="+val+"");
    }
</script>
 <title>Welcome student</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<button onclick="back()" class="button button3" ><-Back</button>
<img src="images/font.png"  style="width:450px;height:70px; position: absolute;left:630px;top: 10px;">
<h5 align="center" style="margin-top:90px; font-family:verdana; font-size: 30px; color:white;"><strong><u>Find more teachers</u></strong></h5>
</head>
<body>
<div class="welcome">
<div class="welcometx">
     <form method="POST" action="" enctype="multipart/form-data">
     <table border="0" align="center" cellpadding="5">
     <tr>
             <td align="right">Showing teachers in  </td>
             <td>         <div class="styled-select">
             <select name="loc" id="subject">  
    <option value="<?php echo"$loc"?>"><?php echo"$loc"?></option>  
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
             <tr>
                 <td colspan="2" align="center">  <br><br><input type="SUBMIT" class="button button4" name="submit" value="Search" required/></td> 
             </tr>
             </table>
</form>
</div>
</div>


<div class="login-box2">

<div class="login-left"> 

             <?php
             $con = mysqli_connect('localhost','root','17/Eng/099','test');
             $resultset=$con->query("SELECT * FROM advertise WHERE location='$loc'");
             if($resultset->num_rows >0)
             {
              while( $row = $resultset->fetch_assoc())
              { 
                $image=$row['image'];
                $name=$row['username'];
                $ciphering = "BF-CBC"; 
                $iv_length = openssl_cipher_iv_length($ciphering); 
                $options = 0; 
                $encrypti= "12345678";
                $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
                $name1 = openssl_encrypt($name, $ciphering, 
            $encryption_key, $options, $encrypti); 
            $name1=str_replace("+","2",$name1);
           ?>
           <p align="center" style="font-family:verdana; color:white;  font-size: 140%; color:black;">Teachers Username : <?php echo"$name"?> <a  href="teacherpreview.php?student=<?php echo "$u"?>&teacher=<?php echo "$name1"?>&val=2" style="color:white">(View Profile)</a></p>
             <h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=500px; height:500px; margin-top:10px; padding:10px;">'; ?></h3>
          <br>
          <?php
              }
             }
             else
             {
              ?>
              <p> No details available on <?php echo"$loc" ?> area</p>
              <?php
             }
             ?>
             </div>
</div>
</div>

 
</body>
</html>