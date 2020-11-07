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
if(isset($_GET['fname'])){
   $fname=$_GET['fname']; 
}
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM upload WHERE teacher='$u1' and fname='$fname'");
if($resultset->num_rows >0)
{
   $row=$resultset->fetch_assoc();
   $file=$row['file'];
   $name=$row['fname'];
   $tec=$row['teacher'];
}
header("Content-Disposition: attachment; filename=" . $name );
echo $file;
exit;
?>
