<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Login - Minerva</title>
		<link rel="stylesheet" type="text/css" href="assets/style/style.css" />
		<!-- Overrides -->
		<style>
			body {
				background-color: #FFF;
			}
			.padding-center {
				padding-top: 25vh;
			}
		</style>
	</head>
	<body>
		<?php
		    session_start();
			if(isset($_SESSION['email'])) {
				header('Location: http://13.66.61.179/');
		    }
		?>
		<img src="header.png" class="p-left" style="width: 125px; top: 0px; left: 0px;">
		<div class="section group">
			<div class="col c-1-1 padding-center" align="center">
				<form action="authenticate.php" method="post">
					<h1>Login</h1>
					<input type="text" name="email" placeholder="Email" class="textbox round m-bottom m-16" />
					<input type="text" name="password" placeholder="Password" class="textbox round m-bottom m-16" />
					<input type="submit" name="action" value="Login" class="btn black m-top" style="border: 0;" />
					<a href="register.php" class="btn black m-top" style="border: 0;">Register</a>
				</form>
                <?php
                    if (isset($_GET['error'])){
                        echo "<p style='color:red;text-align:center;'>An error occurred while logging in.</p>";
                    }
                ?>
			</div>
		</div>
	</body>
</html>
