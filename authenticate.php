<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Authenticate - Minerva</title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['email'])) {
				header('Location: http://13.66.61.179/');
			}
			$host = getenv('localhost');
			$name = getenv('DB_NAME');
			$user = getenv('DB_USER');
			$pass = getenv('DB_PASS');
			$con = mysqli_connect($host, $user, $pass, $name);
			if($con) {
				if(isset($_POST['action'])){
					$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
					$pass = md5($_POST['password']);
					if($_POST['action'] == 'Login') {
						if(empty($email) || empty($pass)) {
							header('Location: http://13.66.61.179/login.php?error="format"');
						}
						$sql = mysqli_query($con, "SELECT email, password FROM users WHERE email='$email' AND password='$pass';");
						$check = mysqli_num_rows($sql);
						if($check > 0) {
						    session_start();
							$_SESSION['email']=$email;
							header('Location: http://13.66.61.179/');
						}
						else {
							header('Location: http://13.66.61.179/login.php?error="auth"');
						}
					}
					else {
						$fname = $_POST['first'];
						$lname = $_POST['last'];
						$url = $_POST['url'];
						if(empty($email) || empty($pass) || empty($fname) || empty($lname) || empty($url)) {
							header('Location: http://13.66.61.179/register.php?error="format"');
						}
						$sql = mysqli_query($con, "INSERT INTO users (first_name, last_name, email, password, facebook_url) VALUES( '$fname', '$lname', '$email', '$pass', '$url');");
						if(!$sql) {
						    session_destroy();
							header('Location: http://13.66.61.179/register.php?error="exists"');
					    }
					    session_start();
						$_SESSION['email'] = $email;
						header('Location: http://13.66.61.179/');
					}
				}
				else {
					mysqli_close($con);
					session_destroy();
					header('Location: http://13.66.61.179');
				}
				mysqli_close($con);
			}
			else {
				echo "Error: Unable to connect to MySQL.";
				echo "Error no: " . mysqli_connect_errno();
				echo "Error: " . mysqli_connect_error();
			}
		?>
	</body>
</html>