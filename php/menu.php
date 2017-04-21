<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			if(isset($_SESSION['user'])){
				$menu =	'<li><a href="http://localhost/pearson/php/logout.php">Logout</a></li>'.
						'<li><a href="http://localhost/pearson/php/cart.php">Cart</a></li>';
			}else{
				$menu =	'<li><a href="http://localhost/pearson/php/register.php">Register</a></li>'.
					'<li><a href="http://localhost/pearson/php/login.php">Log in</a></li>'.
					'<li><a href="http://localhost/pearson/php/cart.php">Cart</a></li>';	
			}
				echo $menu;
		?>
	</body>
</html>