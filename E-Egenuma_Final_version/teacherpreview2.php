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
    $u2 = openssl_decrypt ($u, $ciphering, 
  $encryption_key, $options, $encryption_iv); 
  $u=str_replace("+","2",$u);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM teacher WHERE username='$u2' LIMIT 1");
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
if(isset($_GET['username'])){
    $u1=$_GET['username'];
}

?>
<html>

<script>
    function back(){
        var u1 = "<?php echo $u1 ?>";
        location.replace("parentsearch.php?username="+u1+"");
    }
</script>
    <head>
    <button onclick="back()" class="button button3" ><-Back</button>
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
  <h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:150px; margin-top:10px; margin-left:180px; padding:20px; border-radius: 50%;">'; ?></h3>
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
 $resul=$con->query("SELECT * FROM grade WHERE teacher='$u2'");
 if($resul->num_rows >0)
 {
   ?>
   <h3 style="color:white; text-align:center;">Teaching Grades : 
   <?php 
   while( $row = $resul->fetch_assoc())
   {
        $gra= $row['grade'];
        echo"$gra ";
   }
   ?>
   
   </h3>

   <?php
 }
?>
</div>
    </body>
</html>