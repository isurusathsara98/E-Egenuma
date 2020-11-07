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
    $resultset=$con->query("SELECT * FROM account WHERE username='$u1' LIMIT 1");
    if($resultset->num_rows >0)
    {
       $row=$resultset->fetch_assoc();
       $first=$row['first'];
       $last=$row['last'];
       $email=$row['email'];
       $image=$row['image'];
       $college=$row['college'];
       $grade=$row['grade'];
       $lgrade=$row['lgrade'];
       if($lgrade==NULL)
       {
           $lgrade="select";
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
    $firstn=$_POST['f'];
    $lastn=$_POST['l'];
    $collegen=$_POST['a'];
    $graden=$_POST['grade'];
    $lgraden=$_POST['lgrade'];
    if($firstn==NULL)
    {
        $firstn=$first;
    }
    if($lastn==NULL)
    {
        $lastn=$last;
    }
    if($collegen==NULL)
    {
        $collegen=$college;
    }
    if($graden==NULL)
    {
        echo '<script type="text/javascript">alert("Please select the grades you are in")</script>';
    }
   else if($lgraden=="select")
    {
        echo '<script type="text/javascript">alert("Please select the studying grade ")</script>';
    }
    else if($graden=="advance" && $lgraden<12)
    {
        
        echo '<script type="text/javascript">alert("The grade level and studying year you choose does not match")</script>';
        
    }
    else if($graden=="primary" && $lgraden>5)
    {
        
        echo '<script type="text/javascript">alert("The grade level and studying year you choose does not match")</script>';
        
    }
    else if($graden=="ordinary" && $lgraden>12 ||$graden=="ordinary" && $lgraden<5)
    {
  
        echo '<script type="text/javascript">alert("The grade level and studying year you choose does not match")</script>';
    }
    else
    {

    $query="UPDATE account SET first='$firstn',last='$lastn',college='$collegen',grade='$graden',lgrade='$lgraden' where username='$u1'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        echo '<script type="text/javascript">alert("data updated")</script>';
        header("location:student.php?username=$u");
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
        location.replace("updatebio.php?username="+val+"");
    }
    function update(){
        var val = "<?php echo $u ?>";
        location.replace("updateteacher.php?username="+val+"");
    }
    function back(){
        var val = "<?php echo $u ?>";
        location.replace("student.php?username="+val+"");
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
                 <td align="right">College : </td>
                 <td><input type="TEXT" name="a" placeholder="<?php echo $college?>" /></td>
             </tr>
             <tr>
             <td align="right">Grade :  </td>
             <td>
             <select name="grade" id="cars">
             <option value="<?php echo"$grade"; ?>"><?php echo"$grade"; ?></option>
                   <option value="primary">primary</option>
                   <option value="ordinary">Ordinary level</option>
                   <option value="advance">Advance level</option>
                   
            </select></td></tr>

            <tr>
             <td align="right">Studying year :  </td>
             <td>
             <select name="lgrade" id="grade">
             <option value="<?php echo"$lgrade"?>"><?php echo"$lgrade"?></option>
                   <option value="1">Grade 1</option>
                   <option value="2">Grade 2</option>
                   <option value="3">Grade 3</option>
                   <option value="4">Grade 4</option>
                   <option value="5">Grade 5</option>
                   <option value="6">Grade 6</option>
                   <option value="7">Grade 7</option>
                   <option value="8">Grade 8</option>
                   <option value="9">Grade 9</option>
                   <option value="10">Grade 10</option>
                   <option value="11">Grade 11</option>
                   <option value="12">Grade 12</option>
                   <option value="13">Grade 13</option>
 
            </select></td></tr>
    </table>
              <br>
              <br>
             <input type="SUBMIT" name="submit" value="submit" required/> 
             
       

       </form>
       
      
</div>
</div>
</div>
<div>
    </body>
</html>