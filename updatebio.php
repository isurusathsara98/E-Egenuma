<?php
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
    }
    else
    {
        $error="<p>error</p>";
    }
}

if(isset($_POST['submit']))
{
    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
    $biodata=$_POST['biod'];

    $query="UPDATE teacher SET bio='$biodata' where username='$u1'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
       // echo '<script type="text/javascript">alert("data updated")</script>';
       $con = mysqli_connect('localhost','root','17/Eng/099','test');
       $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");
        if($resultset->num_rows >0)
        {
           $row=$resultset->fetch_assoc();
           $stream1=$row['stream'];
           $subject1=$row['subject'];
        
           
           if($subject1==NULL)
           {
            echo '<script type="text/javascript">alert("You have to select the area you teach from the list ")</script>';
            
           }
           else{
            header("location:teacher.php?teacherprofile=$u");}
        }
     
    }
    else
    {
        echo '<script type="text/javascript">alert("error")</script>';
    }

   
   
}
?>
<script>

    function back(){
        var val = "<?php echo $u ?>";
        location.replace("teacher.php?teacherprofile="+val+"");
    }
</script>
<html>
    <style>
        input{
            box-shadow:1px 1px 2px 1px;

       
        }
    </style>
    <head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="styles.css">
 
    </head>
    <body>
    <button onclick="back()" class="button button3">Back</button>
    <div class="container">
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">About you</h2>
    
    
<?php



if(isset($_POST['add']))
{
    $selection=$_POST['set'];
    

    $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');

    
    if($selection=="Select")
    {
        echo '<script type="text/javascript">alert("Please select the area you teach")</script>';
        ?>
<form method="POST" action="" >
<p style="font-family:verdana;">Please select your area of experties</p>
<select name="set" id="cars">  
  <option value="Select">Select</option>}  
  <option value="primary">Primary</option>  
  <option value="ordinary">Ordinary Level</option>  
  <option value="advance">Advance Level</option> 
</select>   
<br>
<input type="SUBMIT" name="add" value="add" style="width:50px; height:30px" required/> 

    </form>

<br><br>
<?php
    }
    else{
        $query="UPDATE teacher SET stream='$selection' where username='$u1'";
        $query_run=mysqli_query($connection,$query);
        ?>
         
         <form method="POST" action="" >
         <p style="font-family:verdana;">Select the subject you teach </p><br>
<select name="set" id="cars">  
  <option value="<?php $selection?>"><?php echo "$selection";?></option>}  
  
</select>   
<?php

if($selection=="primary")
{
    ?>   
<select name="subjects" id="subject">  
  <option value="select">Select</option>}  
  <option value="Mathematics">Mathematics</option>  
  <option value="Science">Science</option>  
  <option value="English">English</option> 
  <option value="Sinhala">Sinhala</option> 
  <option value="Tamil">Tamil</option> 
  <option value="Religion">Religion</option> 
</select> 
<br>
<?php
    
}
else if($selection=="ordinary")
{
    ?>   
<select name="subjects" id="subject">  
  <option value="select">Select</option>}  
  <option value="Mathematics">Mathematics</option>  
  <option value="Science">Science</option>  
  <option value="English">English</option> 
  <option value="Sinhala">Sinhala</option> 
  <option value="Tamil">Tamil</option> 
  <option value="Religion">Religion</option> 
  <option value="History">Religion</option> 
  <option value="Geography">Geography</option> 
  <option value="Social Studies">Social studies</option> 
  <option value="Dancing">Dancing</option> 
  <option value="English literature">English Literature</option> 
</select> 
<br>
<?php
}
else if($selection=="advance")
{
    ?>   
<select name="subjects" id="subject">  
  <option value="select">Select</option>}  
  <option value="Physical">Physical Sciences</option>  
  <option value="Biology">Biological Sciences</option>  
  <option value="Arts">Arts</option> 
  <option value="Comers">Commerce</option> 
 
</select> 
<br>
<?php
}

?>
<input type="SUBMIT" name="catch" value="add" style="width:50px; height:30px" required/> 

    </form>
        <?php
        

    }
}
else if(!isset($_POST['catch']))
{
?>
<p style="font-family:verdana;">Please select your area of experties</p>
<form method="POST" action="" >
<select name="set" id="cars">  
  <option value="Select">Select</option>}  
  <option value="primary">Primary</option>  
  <option value="ordinary">ordinary level</option>  
  <option value="advance">Advance Level</option> 
</select>   
<br>
<input type="SUBMIT" name="add" value="add" style="width:50px; height:30px" required/> 

</form>

<br><br>
<?php
}
if(isset($_POST['catch']))
        { 
            $con = mysqli_connect('localhost','root','17/Eng/099','test');
            $resultset=$con->query("SELECT * FROM teacher WHERE username='$u1' LIMIT 1");

            if($resultset->num_rows >0)
           {
              $row=$resultset->fetch_assoc();
              $stream=$row['stream'];
           }
           $subject=$_POST['subjects'];
         
                 
           
        if($subject!="select")
        {
            $connection = mysqli_connect('localhost','root','17/Eng/099');
    $db=mysqli_select_db($connection,'test');
            $query="UPDATE teacher SET subject='$subject' where username='$u1'";
        $query_run=mysqli_query($connection,$query);
            ?>
            
            <form method="POST" action="" >
        <select name="set" id="cars">  
        <option value="<?php $stream?>"><?php echo "$stream";?></option>}  
        </select>   
        <?php
               if($stream=="primary")
               {
    
                ?>   
                <select name="subjects" id="subject">  
                  <option value="<?php $subject?>"><?php echo"$subject"?></option>}  
                  <option value="Mathematics">Mathematics</option>  
                  <option value="Science">Science</option>  
                  <option value="English">English</option> 
                  <option value="Sinhala">Sinhala</option> 
                  <option value="Tamil">Tamil</option> 
                  <option value="Religion">Religion</option> 
                </select> 
                <br>
                <?php
               }
               else if($stream=="ordinary")
               {
    
                ?>   
                <select name="subjects" id="subject">  
                <option value="<?php $subject?>"><?php echo"$subject"?></option>}  
                  <option value="Mathematics">Mathematics</option>  
                  <option value="Science">Science</option>  
                  <option value="English">English</option> 
                  <option value="Sinhala">Sinhala</option> 
                  <option value="Tamil">Tamil</option> 
                  <option value="Religion">Religion</option> 
                  <option value="History">Religion</option> 
                  <option value="Geography">Geography</option> 
                  <option value="Social Studies">Social studies</option> 
                  <option value="Dancing">Dancing</option> 
                  <option value="English literature">English Literature</option> 
                </select> 
                <br>
                <?php
               }
               else if($stream=="advance")
                   {

                      ?>   
                      <select name="subjects" id="subject">  
                      <option value="<?php $subject?>"><?php echo"$subject"?></option>}   
                           <option value="Pysical">Physical Sciences</option>  
                           <option value="Biology">Biological Sciences</option>  
                           <option value="Arts">Arts</option> 
                            <option value="Comers">Commerce</option> 
        
                          </select> 
                       <br>
                       
                     
                       <?php
                   }
           ?>

               <button onclick="reset()" class="button button4" >change</button>
               </form>
          <?php
        }
        else{
            echo '<script type="text/javascript">alert("Please select the subject")</script>';
            ?>
    <form method="POST" action="" >
    <p style="font-family:verdana;">Please select the subject</p>
    <select name="set" id="cars">  
      <option value="Select">Select</option>}  
      <option value="primary">Primary</option>  
      <option value="ordinary">Ordinary Level</option>  
      <option value="advance">Advance Level</option> 
    </select>   
    <br><br>
    <input type="SUBMIT" name="add" value="add" style="width:50px; height:30px" required/> 
    
        </form>
    
    <br><br>
    <?php
        }
        }

?>
 <form method="POST" action="" enctype="multipart/form-data" >
        
         
         <p style="font-family:verdana;">This discribtion will be displayed to anyone who views your profile </p><br>
                 <textarea name="biod" class="form-control" row="35" cols="50" placeholder="Describe your self" required></textarea><br>
            <br>
             <input type="SUBMIT" name="submit" value="submit" style="width:80px; height:50px" required/> 
             
           

       </form>
</div>
</div>
</div>
<div>
    </body>
</html>