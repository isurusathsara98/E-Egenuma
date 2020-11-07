<?php
$error=NULL;
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
if(isset($_GET['examno'])){
   $examno=$_GET['examno']; 
}
if(isset($_GET['fname'])){
    $fname=$_GET['fname']; 
    echo"$fname";
 }
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM exam WHERE student='$student1' and examno='$examno'");
if($resultset->num_rows >0)
{
   $row=$resultset->fetch_assoc();
   $file=$row['paper'];
   $name=$row['fname'];
}
header("Content-Disposition: attachment; filename=" . $name );
echo $file;

?>
