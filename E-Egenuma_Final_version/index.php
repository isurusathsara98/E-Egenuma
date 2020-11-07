<html>
<style>
body{
    background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)),url(images/index.png);
    background-size: cover;
    background-position: center;
}
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
.button1 {
    left:760px;top:10px;
    font-size: 34px;
    padding: 14px 40px;
  margin:30px 8px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button1:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}
.button2 {
    left:760px;top:210px;
    font-size: 34px;
    padding: 14px 40px;
  margin:30px 8px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(0, 48, 138);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}

.button3 {
    left:760px;top:410px;
    font-size: 34px;
    padding: 14px 48px;
  margin:30px 8px;
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

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  left:770px;top:113px;
  background-color: #f1f1f1;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content1{
  display: none;
  position: absolute;
  left:770px;top:313px;
  background-color: #f1f1f1;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content2{
  display: none;
  position: absolute;
  left:770px;top:513px;
  background-color: #f1f1f1;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: "Times New Roman";
  font-size: 24px;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content1 a {
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: "Times New Roman";
  font-size: 24px;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content2 a {
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: "Times New Roman";
  font-size: 24px;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown-content1 a:hover {background-color: #ddd;}
.dropdown-content2 a:hover {background-color: #ddd;}


.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropdown-content1 {display: block;}
.dropdown:hover .dropdown-content2 {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<head>
<h5 align="center" style="margin-top:30px; font-family:verdana; font-size: 50px; color:white;"><strong><u>WELCOME TO E-EGENUMA </u></strong></h5>
</head>
<body>

<div class="dropdown">
  <button class="button button1">Students</button>
  <div class="dropdown-content">
    <a href="studentlog.php">Login</a>
    <a href="studentreg.php">Register</a>
  </div>
</div>

<div class="dropdown">
  <button class="button button2">Teachers</button>
  <div class="dropdown-content1">
    <a href="teacherlog.php">Login</a>
    <a href="teacherreg.php">Register</a>
  </div>
</div>

<div class="dropdown">
  <button class="button button3">Parents</button>
  <div class="dropdown-content2">
    <a href="parentlog.php">Login</a>
    <a href="parentreg.php">Register</a>
  </div>
</div>
</body>
</html>