<?php
$error = NULL;

if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost','root','17/Eng/099','test');
    $f=$_POST['f'];
    $l=$_POST['l'];
    $u=$_POST['u'];
    $p=$_POST['p'];
    $p2=$_POST['p2'];
    $e=$_POST['e'];
    $a=$_POST['a'];
    $image_info = @getimagesize($_FILES['image']['tmp_name']);

    $s="select * from teacher where username = '$u'";

    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    if($image_info == false)
    {        }
    else{
        $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    }
   
    if(strlen($u)<5)
    {
        $error="<p>your username is short</p>";
    }
    elseif($num>=1)
    {
        $error="<p>Username already exits</p>";
    }
    elseif($p != $p2){
        $error="<p>passwords doesn't match</p>";
    }
    elseif($image_info == false)
    {
        $error="<p>choosen image error</p>";
    }
    else{
       
        $f=$con->real_escape_string($f);
        $l=$con->real_escape_string($l);
        $u=$con->real_escape_string($u);
        $p=$con->real_escape_string($p);
        $p2=$con->real_escape_string($p2);
        $e=$con->real_escape_string($e);
        $a=$con->real_escape_string($a);
      
       

        $vkey=md5(time().$u);
        $p=md5($p);
        $insert=$con->query("INSERT INTO teacher(first,last,username,password,email,vkey,age,image) VALUES('$f','$l','$u','$p','$e','$vkey','$a','$file')");
        if($insert){
             $to=$e;
             $subject="Email verification";
             $message="<a href='http://localhost/userreg/teacherverify.php?vkey=$vkey'>RegisterAccount</a>";
             $headers='From: isurusathsara183@gmail.com';
             mail($to,$subject,$message,$headers);
            
            header('location:thankyou.php');
        }
        else{
            echo $con->error;
        }
    }
    echo '<script type="text/javascript">alert("An error occured during registration")</script>';  
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
<title>Registration form</title>
    </head>
    <body>
    <button onclick="back()" class="button button0" ><-Back</button>

    <div class="container">
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">Teachers Login</h2>
     <form method="POST" action="" enctype="multipart/form-data">
         
         <table border="0" align="center" cellpadding="5">
         <tr>
                 <td align="right">First name : </td>
                 <td><input type="TEXT" name="f" required/></td>
             </tr>
             <tr>
                 <td align="right">Last name : </td>
                 <td><input type="TEXT" name="l" required/></td>
             </tr>
             <tr>
                 <td align="right">Username : </td>
                 <td><input type="TEXT" name="u" required/></td>
             </tr>

             <tr>
                 <td align="right">Password : </td>
                 <td><input type="PASSWORD" name="p" required/></td>
             </tr>
         
             <tr>
                 <td align="right">REPEAT PASSWORD : </td>
                 <td><input type="PASSWORD" name="p2" required/></td>
             </tr>
             <tr>
                 <td align="right">Birthday : </td>
                 <td><input type="date" name="a" required/></td>
             </tr>
             <tr>
                 <td align="right">Email Address : </td>
                 <td><input type="EMAIL" name="e" required/></td>
             </tr>
             <tr>
                 <td align="right">Choose a profile picture  </td>
              
              <td><input type="file" name="image" id="image" required/></td>
           
               </tr>
             <tr>
                 <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Register" required/></td> 
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
</div>
       
    </body>
</html>