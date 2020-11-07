<?php
$error=NULL;
if(isset($_GET['teacherprofile'])){
    $u=$_GET['teacherprofile'];
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
       $advance=$row['advance'];
    }
    else
    {
        $error="<p>error</p>";
    }
}
?>
<html>
<style>
      .buttonx {
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
.button81 {
  left:100px;top: 20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button81:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
</style>
<head>
<script>
<?php

?>
    function test(){
        var val = "<?php echo $u ?>";
        location.replace("updatebio.php?username="+val+"&fgd93p=sdfHDw23*df$");
    }
    function update(){
        var val = "<?php echo $u ?>";
        location.replace("updateteacher.php?username="+val+"&fgd93p=sdfHDw23*df$");
    }
    function student(){
        var val = "<?php echo $u ?>";
        location.replace("teachergrade.php?username="+val+"&fgd93p=sdfHDw23*df$");
    }
    function home(){
        var val = "<?php echo $u ?>";
        location.replace("teacherhome.php?welcome="+val+"&fgd93p=sdfHDw23*df$");
    }
    
</script>
 <title>Welcome Teacher</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<button onclick="home()" class="buttonx button81">Home</button>
<div class="teachers" >
<button onclick="location.href ='logout.php'" class="button button5">Logout</button>
<h2 align="center">Hello <?php echo $first ?></h2>
<h2 align="center" >Welcome to your profile</h2>
<h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:200px; margin-top:10px; padding:10px;">'; ?></h3>

<h3 align="center" style="font-family:verdana;" >
<?php
  if($subject!=NULL)
  {?>
      <button onclick="update()" class="button button2">Account update</button>

<?php
  }
  if($bio==NULL)
  {
      echo "<script> alert('please complete profile details') </script>";
      echo "Your bio is empty";
      ?>
      <button onclick="test()" class="buttin button1" >Click here to add your describtion</button>
      <?php
  }
  else{
      echo "$bio"; ?> 

      <br><br>
      <?php
      if($subject==NULL){
        echo "Your subject details are empty";
        ?>
        <button onclick="test()" class="buttin button1" >Click here to add your subject details</button>
        <?php
      }
      else{
          ?>
         <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 60%; color:black;">The stream of you choose to teach : <?php echo "$stream"?></p>
          <?php
          if($stream=="advance")
          {
              if($advance==NULL)
              {?>
                        <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 60%; color:black;">The subject you choose to teach : <?php echo "$subject"?></p>

                  <?php
              }
               else{?>
                             <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 60%; color:black;">The Subject of you choose to teach : <?php echo "$advance"?></p>

            <?php
               }
          }
          else
          {
              ?>
                       <p align="center" style="font-family:verdana; color:white; text-transform:uppercase; 
   font-size: 60%; color:black;">The Subject you choose to teach : <?php echo "$subject"?></p>
              <?php
          }
          ?>

          <?php
      }
  }
  

?></h3>
    <br>
    <br>

     



<button onclick="student()" class="button button7">Students</button>

</div>
    

</body>


</html>