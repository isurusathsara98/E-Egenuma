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
    $u1 = openssl_decrypt ($u, $ciphering, 
    $encryption_key, $options, $encryption_iv); 
    $u=str_replace("+","2",$u);

}
if(isset($_GET['val'])){
    $val=$_GET['val'];
    ?>
    <?php
}
if(isset($_GET['grade'])){
  $gra=$_GET['grade'];

}
if(isset($_GET['student'])){
    $stu=$_GET['student'];
    $stu=str_replace("2","+",$stu);
    $ciphering = "BF-CBC"; 
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0; 
      $encryption_iv = "12345678"; 
      $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
      $stu1 = openssl_decrypt ($stu, $ciphering, 
    $encryption_key, $options, $encryption_iv); 
    $stu=str_replace("+","2",$stu);
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $resultset=$con->query("SELECT * FROM account WHERE username='$stu1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $first=$row['first'];
       $last=$row['last'];
       $image=$row['image'];
       $college=$row['college'];
       $grade="6";
    }
}
$con = mysqli_connect('localhost','root','17/Eng/099','test');
$resultset=$con->query("SELECT * FROM following WHERE teacher='$u1' and student='$stu1' LIMIT 1");
if($resultset->num_rows >0)
{ $sub=1;}
else{
    $sub=0;
}
?>
<html>

<script>
    function back(){
        var val = "<?php echo $u ?>";
        var x = "<?php echo $val ?>";
        var gra = "<?php echo $gra?>";
        if(x==1)
        {
        location.replace("teacherstudents.php?username="+val+"&grade="+gra+"");
        }
        else{
          location.replace("teacher.php?username="+val+"");
        }
    }
    function subscribed(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var gra = "<?php echo $gra?>";
      var test=0;
        location.replace("studentfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&grade="+gra+"");
        alert('You have added the student to your course');
    }
    function remove(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var gra = "<?php echo $gra?>";
      var test=1;
        location.replace("studentfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&grade="+gra+"");
        alert('You have removed this student from class');
    }
    function contact(){
      var $back = "<?php echo $u ?>";
      var $stu = "<?php echo $stu ?>";
      var test=2;
      var gra = "<?php echo $gra?>";
      location.replace("studentfollow.php?username="+$back+"&student="+$stu+"&test="+test+"&grade="+gra+"");

    }
</script>
    <head>
    
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

.button4 {
  left:1250px;top: 300px;
  background-color: rgba(184, 233, 50, 0.616);
  padding: 14px 25px;
  font-size: 28px;
  margin:8px 2px;
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button4:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button5 {
    left:1250px;top: 390px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  font-size: 28px;
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button5:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button6 {
    left:1250px;top: 480px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  font-size: 28px;
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button6:hover {
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
  <h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:200px; margin-top:10px; margin-left:250px; padding:20px; border-radius: 50%;">'; ?></h3>
</div>
</div>
<div class="biodata">
<h3 style="color:white; text-align:center;">  Name : <?php echo "$first $last"?></h3>
<h3 style="color:white; text-align:center;"> College : <?php echo "$college"?> </h3>
<h3 style="color:white; text-align:center;"> Education level : <?php echo "$grade"?></h3>
<div class="biotext">
</div><div>

<button onclick="back()" class="button button3" ><-Back</button>
<?php
if($val==0)
{?>
<button onclick="preview()" class="button button4" >Follow</button>
<?php
}
else if($sub==0)
{
  ?>
<button onclick="subscribed()" class="button button4" >Undo</button>
<?php
}
else
{
  ?>
<button onclick="remove()" class="button button4" >Remove student</button>
<?php
}?>


<button onclick="contact()" class="button button6" >Contact<br>Student</button>
</div>
    </body>
</html>