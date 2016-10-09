<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Authenticate - Minerva</title>
	</head>
	<body>
		<?php
		    session_start();
			if(isset($_SESSION['email'])) {
				header('Location: http://13.66.61.179/');
				exit();
			}
			$host = getenv('localhost');
			$name = getenv('DB_NAME');
			$user = getenv('DB_USER');
			$pass = getenv('DB_PASS');
			$con = new mysqli($host, $user, $pass, $name);
			if($con) {
				if(isset($_POST['action'])){
					$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
					$pass = md5($_POST['password']);
					if($_POST['action'] == 'Login') {
						if(empty($email) || empty($pass)) {
							header('Location: http://13.66.61.179/login.php?error="format"');
							exit();
						}
						$sql = $con->query("SELECT * FROM users WHERE email='$email' AND password='$pass';");
						if ($sql->num_rows > 0) {
							$_SESSION['email']=$email;
							header('Location: http://13.66.61.179/');
							exit();
						}
						else {
							header('Location: http://13.66.61.179/login.php?error="auth"');
							exit();
						}
					}
					else {
						$fname = $_POST['first'];
						$lname = $_POST['last'];
						$url = $_POST['url'];
						if(empty($email) || empty($pass) || empty($fname) || empty($lname) || empty($url)) {
							header('Location: http://13.66.61.179/register.php?error="format"');
							exit();
						}
						$sql = $con->query("INSERT INTO users (first_name, last_name, email, password, facebook_url) VALUES( '$fname', '$lname', '$email', '$pass', '$url');");

						if(!$sql) {
							header('Location: http://13.66.61.179/register.php?error="exists"');
							exit();
					    }
						$_SESSION['email'] = $email;
						header('Location: http://13.66.61.179/');
						exit();
					}
				}
				else {
				    echo "<script>console.log('OH BOY')</script>";
					header('Location: http://13.66.61.179');
					exit();
				}
			}
			else {
				echo "Error: Unable to connect to MySQL.";
				echo "Error no: " . mysqli_connect_errno();
				echo "Error: " . mysqli_connect_error();
			}
		?>
	</body>
</html>
