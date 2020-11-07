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
     .button3 {
  left:800px;top:320px;
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
    <script>
    function back(){
        location.replace("index.php");
    }
   
</script>
<button onclick="back()" class="button button3" >Home</button>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

    </head>
<body>
    
<h1>
<?php
if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    $con = NEW mysqli('localhost','root','17/Eng/099','test');
    $result=$con->query("SELECT verfied,vkey FROM account WHERE verified = 0 AND vkey='$vkey' LIMIT 1");
  
        $update = $con->query("UPDATE account SET verified = 1 WHERE vkey='$vkey' LIMIT 1");
        if($update){
            echo " Your account is verified. Please login";
        }
        else{
            echo $con->error;
        }

}
else{
    die("something went wrong");
}?>
</h1>
</body>
</html>