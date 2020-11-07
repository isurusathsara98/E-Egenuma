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
       $age=$row['age'];
       $stream=$row['stream'];
       $subject=$row['subject'];
       $advance=$row['advance'];
       if($advance==NULL)
       {
           $advance="select";
       }
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
    $firstn=$_POST['f'];
    $lastn=$_POST['l'];
    $agen=$_POST['a'];
    if($subject=="Arts"||$subject=="Comers")
    {
    $sub=$_POST['sub'];
    }
    else if($subject=="Physical")
    {
        $sub=$_POST['mathssub'];
    }
    else if($subject=="Biology")
    {
        $sub=$_POST['biosub'];
    }
    else
    {
        $sub=NULL;
    }
    if($firstn==NULL)
    {
        $firstn=$first;
    }
    if($lastn==NULL)
    {
        $lastn=$last;
    }
    if($agen==NULL)
    {
        $agen=$age;
    }
    if($biodata==NULL)
    {
        $biodata=$bio;
    }
 
    if($sub=="select")
    {
    echo "<script>alert('please select the stream subject')</script>";
    }
    else{
    $query="UPDATE teacher SET first='$firstn',last='$lastn',age='$agen',bio='$biodata',advance='$sub' where username='$u1'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        echo '<script type="text/javascript">alert("data updated")</script>';
        header("location:teacher.php?teacherprofile=$u&fgd93p=sdfHDw23*df$");
    }
    else
    {
        echo '<script type="text/javascript">alert("error")</script>';
    }
}
    
}
?>
<script>
    function test(){
        var val = "<?php echo $u ?>";
        location.replace("updatebio.php?username="+val+"&fgd93p=sdfHDw23*df$");
    }
    function update(){
        var val = "<?php echo $u ?>";
        location.replace("updateteacher.php?username="+val+"&fgd93p=sdfHDw23*df$");
    }
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("teacher.php?teacherprofile="+val+"&fgd93p=sdfHDw23*df$");
    }
</script>
<html>
    <style>
        input{
            box-shadow:1px 1px 2px 1px;
            width:40px;  
        }
    </style>
    <head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="styles.css">
 
    </head>
    <body>
        <script> alert("If any of the details does not require updating keep them blanked")</script>
    <button onclick="back()" class="button button3" ><-Back</button>
    <div class="container">
<div class="login-box">
<div class="row">
<div class="login-left"> 
<h2 align="center">Account Update</h2>
     <form method="POST" action="" enctype="multipart/form-data" >
         
     <table border="0" align="center" cellpadding="6">
         <tr>
                 <td align="right">First name : </td>
                 <td><input type="TEXT" name="f" placeholder="<?php echo $first?>" /></td>
             </tr>
             <tr>
                 <td align="right">Last name : </td>
                 <td><input type="TEXT" name="l" placeholder="<?php echo $last?>" /></td>
             </tr>
            
             <tr>
                 <td align="right">Age : </td>
                 <td><input type="date" name="a" placeholder="<?php echo $age?>" /></td>
             </tr>
             <?php 
               if($subject=="Arts"||$subject=="Comers")
               {?>
                 <tr>
                 <td align="right"> <?php echo "$subject"?> Stream subject : </td>
                 <td><input type="TEXT" name="sub" placeholder="Enter subject" required/></td>
             </tr>
             <?php
               }
               else if($subject=="Physical")
               {?>
                <tr>
                <td align="right"> <?php echo "$subject"?> science Stream subject : </td>
                <td>
                <select name="mathssub" id="subject">  
                  <option value="<?php echo"$advance"?>"><?php echo"$advance"?></option>  
                  <option value="mathematics">Mathematics</option>  
                  <option value="chemistry">Chemistry</option>  
                  <option value="physics">physics</option> 
                  </select> 
                </td>
            </tr>
            <?php
               }
               else if($subject=="Biology")
               {
                ?>
                <tr>
                <td align="right"> <?php echo "$subject"?> science Stream subject : </td>
                <td>
                <select name="biosub" id="subject">  
                  <option value="select">Select</option>  
                  <option value="Biology">Biology</option>  
                  <option value="chemistry">Chemistry</option>  
                  <option value="physics">physics</option> 
                  </select> 
                </td>
            </tr>
            <?php
               }
             ?>
    </table>
    <br>
             Description about yourself : <br>
                 <textarea name="biod" class="form-control" row="35" cols="50" placeholder="<?php if($bio==NULL){echo"Your discription is empty";}else{echo "$bio";}?>" ></textarea><br>
            <br>
             <input type="SUBMIT" name="submit" value="submit" required/> 
             
       

       </form>
       <?php
       if($stream=="advance")
       {
        ?>
        <button onclick="test()" class="button button9">Change area of teaching</button>
       <?php
       }
       else
       {
           ?>
            <button onclick="test()" class="button button8">Change area of teaching</button>
           <?php
       }
       ?>
      
</div>
</div>
</div>
<div>
    </body>
</html>