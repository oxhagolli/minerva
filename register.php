<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Register - Minerva</title>
		<link rel="stylesheet" type="text/css" href="assets/style/style.css">
		<!-- Overrides -->
		<style>
			body {
				background-color: #FFF;
			}
			.padding-center {
				padding-top: 20vh;
			}
		</style>
	</head>
	<body>
		<?php
            if(isset($_SESSION['email'])) {
                header('Location: http://13.66.61.179/');
            }
        ?>
        <img src="header.png" class="p-left" style="width: 125px; top: 0px; left: 0px;">
		<div class="section group">
			<div class="col c-1-1 padding-center" align="center">
                <form action="authenticate.php" method="post">
				    <h1>Register</h1>
                    <input type="text" name="first" placeholder="First Name" class="textbox round m-bottom m-16">
                    <input type="text" name="last" placeholder="Last Name" class="textbox round m-bottom m-16">
                    <input type="text" name="email" placeholder="Email" class="textbox round m-bottom m-16">
                    <input type="text" name="url" placeholder="Facebook Profile URL" class="textbox round m-bottom m-16">
                    <input type="text" name="pass" placeholder="Password" class="textbox round m-bottom m-16">
                    <input type="submit" name="action" value="Register" class="btn black m-top" style="border: 0;">
                    <a href="login.html" class="btn black m-top" style="border: 0;">Login</a>
                </form>
                <?php
                    if (isset($_GET['error'])){
                        echo "<p style='color:red;text-align:center;'>An error occurred while registering.</p>";
                    }
                ?>
			</div>
		</div>
	</body>
</html>
