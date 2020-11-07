<?php
$error=NULL;
if(isset($_POST['submit'])){
    $con= NEW mysqli('localhost','root','17/Eng/099','test');
    $u=$con->real_escape_string($_POST['u']);
    $p=$con->real_escape_string($_POST['p']);
    $p=md5($p);

    $resultset=$con->query("SELECT * FROM account WHERE username='$u' AND password='$p' LIMIT 1");
    if($resultset->num_rows !=0)
    {
       $row=$resultset->fetch_assoc();
       $verified=$row['verified'];
       $email=$row['email'];
       $date=$row['createdate'];
     
       if($verified==1)
       {
        $ciphering = "BF-CBC"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $encrypti= "12345678";
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
        $u = openssl_encrypt($u, $ciphering, 
    $encryption_key, $options, $encrypti); 
    $u=str_replace("+","2",$u);
   
        header("location:studenthome.php?welcome=$u");
       }
       else{
           $error="THIS ACCOUNT IS NOT YET VERIFIED.Email has been sent to $email on $date";
       }
    }
    else{

        $error = "Username or password is incorrect";
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

.button0 {
  left:230px;top:20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button0:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
</style>
<script>
    function back(){
        location.replace("index.php");
    }
</script>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<button onclick="back()" class="button button0" ><-Back</button>

<div class="container">
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">Student Login</h2>
    <form method="POST" action="">
    <table border="0" align="center" cellpadding="5">
    <tr>
    <td align="right">Username</td>
    <td><input type="TEXT" name="u" required/></td>
    </tr>

    <tr>
    <td align="right">Password</td>
    <td><input type="PASSWORD" name="p" required/></td>
    </tr>

    <tr>
     <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Login" required/></td> 
    </tr>
    </table>
    </form>
    </div>
  </div>
  </div>
  </div>
  <h1>
    <center>
    <?php echo $error; ?>
    </center></h1>
</body>
</html>
