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
			$host = "localhost";
			$dbuser = "Sangeethanan";
			$dbpass = "2015084";
			$dbname = "webtechdb";
	
			$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
	
			if (mysqli_connect_errno()){
				echo '<h1 style="color:red;">Failed to connect to MySQL database:---->>><br/>' . mysqli_connect_error().'</h1>';
			}
		
		
			$selectquery = "SELECT * FROM cartdetail WHERE user='$user'";
			$result = mysqli_query($conn,$selectquery);
			$row = mysqli_fetch_assoc($result);
			$count = count($row);
			
			echo 'Username:'.$user.'<br/>';
			
			if($count == 0){
				echo "Your cart is empty";
			}else{
				$total = 0;
				
				$selectquery1 = "SELECT name,email,address,mobile FROM webtechusers WHERE usersUN='$user'";
				$result1 = mysqli_query($conn,$selectquery1);
				$row1 = mysqli_fetch_assoc($result1);
				echo 'Name:'.$row1['name'].'<br/>';
				echo $row1['email'].'<br/>';
				echo $row1['address'].'<br/>';
				echo $row1['mobile'].'<br/>';	
			
								
				$selectquery2 = "SELECT * FROM cartdetail WHERE user='$user'";
				$result2 = mysqli_query($conn,$selectquery2);
				while($row2 = mysqli_fetch_assoc($result)) {
					echo $row2['item'].' ';
					echo $row2['weight'].' ';
					echo $row2['price'].' ';
					echo $row2['qty'].' ';
					echo $row2['netprice'].'</br>';
					$total += $row2['netprice'];
				}
				
				echo $total; 
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