<?php
	session_start();
	session_id();
	
	$host = "localhost";
	$dbuser = "Sangeethanan";
	$dbpass = "2015084";
	$dbname = "webtechdb";
	
	//$conn = mysql_connect($host,$dbuser,$dbpass);
	//$conn = new PDO('mysql:host=localhost;dbname=webtechdb;charset=utf8mb4', $dbuser, $dbpass);
	$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
	if (mysqli_connect_errno()){
  		echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
	}else{
		echo '<h1 style="color:green;">Connection to the server is successful.....</h1>';
	}
	
	
	if(isset($_POST['u']) && isset($_POST['p'])){
		$user = $_POST['u'];
		$pass = $_POST['p'];
		
		$query = "SELECT * FROM webtechusers WHERE usersUN='$user' AND usersPW='$pass' ";
		//$rows = mysqli_query($query);
		//$result = $conn->prepare($query);
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$count = count($row);
		
		if($count != 0){
			$_SESSION['user'] = $user;
			$_SESSION['id'] = session_id();
			$msg = '<h1 style="color:green;">Successful Session</h1>'.header("refresh:10;url=../html/main/index.html"); 
		}else{
			$msg = '<h1 style="color:red;">Invalid Username Or Password</h1>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
  <title>Pearson CakeShop</title>
  <link rel="shortcut icon" type="image/png" href="../../images/logo/logo.png">
  <meta name="description" content="Website for Cake Shop" >
  <meta name="keywords" content="Pearson CakeShop,CakeShop,Pearson Cake">
  <link rel="stylesheet" type="text/css" href="../../style/style.css" />
  <script src="../js/banner.js"></script>   
</head>

<body>
  <div id="main">
      <div id="menubar">
        <ul id="menu">
		<img src = "../images/logo/logo2.png">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="../html/main/index.html">Home</a></li>
          <li><a href="../html/main/about_us.html">About Us</a></li>
		  <li><a href="../html/main/cake.html">Cakes</a></li>
          <li><a href="../html/main/cv.html">Meet Our Staff</a></li>
          <li><a href="../html/main/quiz.html">Quiz</a></li>
          <li><a href="../html/main/contact.html">Contact Us</a></li>
        </ul>
		</div>
		<div>
		<ul id = "log">
		<li><a href="register.php">Register</a></li>
		<li><a href="login.php">Log in</a></li>
		<li><a href="cart.php">Cart</a></li>
        </ul>
		</div>
		</div>
	<div id="header">
	<img src = "../images/banner/banner1.png" id="banner">
	</div>
	 </div>
    <div id="content_header"></div>
    <div id="site_content">
    	<div class="sidebar">
	<div id = "trans">
		<img src = "../images/transition_image/image1.jpg" id="image">
		</div>
	</div>
      <div id="content">
	  <p></P><p></P><p></P><p></P>
<center>	  
		<?php
			$login = '<h1>Login Form</h1><form action = '.$_SERVER['PHP_SELF'].' method=post>'.'<div class="form_settings">'
			.'<table><tr><td><input class="contact" style="border:1px solid #99994d" type="text" name="u" placeholder="Username"' 		            .'required="required"></td></tr>'
			.'<tr><td><input class="contact" style="border:1px solid #99994d" type="password" name="p" placeholder="Password"' 		            .'required="required"></td></tr>'
       	    .'<tr><td colspan="2"><button type="submit" style="border:1px solid #99994d" class="submit">Let me in..</button></td>'	
			.'</tr></table></form></div>';
            	
				
			if(!isset($_SESSION['user'])){
				echo $login;
			}
			if(isset($msg)){
				echo $msg;
			}
		?>
        </center>
		</div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="../html/main/index.html">Home</a>| <a href="../html/main/about_us.html">About Us</a>| <a href="../html/main/cake.html">Cakes</a>| <a href="cv.html">Meet Our Staff| <a href="../html/main/quiz.html">Quiz</a>| <a href="../html/main/contact.html">Contact Us</a></a></p>
      <p>Copyright &copy Pearson Cake Shop</p>
    </div>
  </div>
</body>
</html>