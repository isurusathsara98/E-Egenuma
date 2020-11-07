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
       $courses=$row['courses'];
       $grade=$row['lgrade'];
    }
    else
    {
        $error="<p>error</p>";
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
.button11 {
  left:770px;top:220px;
  background-color: rgba(184, 233, 50, 0.616);
  font-size: 22px;
  margin:8px 2px;
  padding: 14px 25px;
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button11:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
</style>
<head>
<script>
    function test(){
        var val = "<?php echo $u ?>";
        location.replace("updatebio.php?username="+val+"");
    }
    function update(){
        var val = "<?php echo $u ?>";
        location.replace("studentupdate.php?username="+val+"");
    }
    function Home(){
        var val = "<?php echo $u ?>";
        location.replace("studenthome.php?welcome="+val+"");
    }
    function courses(){
        var val = "<?php echo $u ?>";
        location.replace("studentcourse.php?username="+val+"");
    }
</script>
 <title>Welcome student</title>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="teachers" >
<button onclick="location.href ='logout.php'" class="button button5">Logout</button>
<h2 align="center">Hello <?php echo $first ?> <?php echo $last ?> </h2>
<h2 align="center" >Welcome to your profile</h2>
<h3 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width=200px; height:200px; margin-top:10px; padding:10px;">'; ?></h3>

<br><br>
<h4 align="center"> Student name : <?php echo $first ?> <?php echo $last ?></h4>
<br>
<h4 align="center"> Learning Grade: <?php echo $grade ?></h4>
<br/>
<h4 align="center"> Number of courses followed : <?php echo"$courses";?></h4>

     

<button onclick="update()" class="button button2">Account update</button>

<button onclick="courses()" class="button button6">Following courses</button>
<button onclick="Home()" class="button button11">Home</button>

</div>
    

</body>


</html>