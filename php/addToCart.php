<!DOCTYPE html>
<html>
	<head>
  <title>Pearson CakeShop</title>
  <link rel="shortcut icon" type="image/png" href="../../images/logo/logo.png">
  <meta name="description" content="Website for Cake Shop" >
  <meta name="keywords" content="Pearson CakeShop,CakeShop,Pearson Cake">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
      <div id="content">	  
		<?php
		session_start();
		
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			$pname = $_POST['pname'];
			$kg = $_POST['kg'];
			$price = $_POST['price'];
			$text = $_POST['qty'];
			$netprice = $price*$text;
		
			echo $user.'<br/>';
			echo $pname.'<br/>';
			echo $kg.'<br/>';
			echo 'Rs.'.$price.'.00<br/>';
			echo $text.'<br/>';
			echo 'Rs.'.$netprice.'.00<br/>';
		
		
			$host = "localhost";
			$dbuser = "Sangeethanan";
			$dbpass = "2015084";
			$dbname = "webtechdb";
	
			$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
			if (mysqli_connect_errno()){
				echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
			}
		
		
			$selectquery = "SELECT * FROM cartdetail WHERE user='$user' AND item='$pname'";
			$result = mysqli_query($conn,$selectquery);
			$row = mysqli_fetch_assoc($result);
			$count = count($row);
	
			if($count != 0 || $count == 1){
				$updatequery ="UPDATE cartdetail SET price='$price',qty='$text',netprice='$netprice' WHERE user='$user'".
							" AND item='$pname'";
				mysqli_query($conn,$updatequery);
			}else{
				$insertquery = "INSERT INTO cartdetail (user,item,weight,price,qty,netprice) VALUES".
					" ('$user','$pname','$kg','$price','$text','$netprice')";
				mysqli_query($conn,$insertquery);
			}
			
		}else{
			echo '<h1>You Need To Login First</h1>';	
		}
		?>       
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