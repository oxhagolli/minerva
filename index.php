<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="assets/style/style.css">
		<!-- Overrides -->
		<style>
			body {
				background-color: #FFF;
			}
			.sidebar li a {
				padding: 0;
			}
		</style>
		<title>Minerva</title>
	</head>
	<body>
	    <?php
	        session_start();
            if(!isset($_SESSION['email'])) {
                header('Location: http://13.66.61.179/login.php');
            }
        ?>
		<ul class="sidebar" style="background-color: white; padding: 0; margin: 0; text-align: center; border-right: 1px solid #ccc; height: 100vh; position: absolute;">
			<div style="padding-top: 55px" align="center">
				<!-- First Character from the database goes here -->
				<i class="color-circle black"><?php echo $_SESSION['first'][0]; ?></i>
			</div>
			<li><h3><?php echo $_SESSION['first']; ?></h3></li>
			<li><h3><?php echo $_SESSION['last']; ?></h3></li>
			<li><a href="mailto:email" class="black-hover"><h3><?php echo $_SESSION['email']; ?></h3></a></li>
			<li><a href="<?php echo $_SESSION['url']; ?>" class="black-hover"><h3>Facebook Profile</h3></a></li>
			<li><button type="navigate" onclick="window.location = 'entry.php'" class="btn black m-top" style="border: 0;">New Entry</button></li>
			<li><button type="submit" onclick="window.location = 'logout.php'" class="btn black m-top" style="border: 0;">Logout</button></li>

		</ul>
		<ul class="navbar" style="background-color: white; padding: 0; text-align: center; border-bottom: 1px solid #ccc; width: 100vw; position: absolute">
			<!-- THIS IS WHERE YOU PUT PEOPLE WHO SCORED SIMILARLY BASED OFF OF SCORE AND CONTENT -->
			<li><img src="header.png" class="p-left" style="position: absolute; left: 0px; top: 0px; width: 125px;"><h3 class="p-right" style="position: absolute; right: 0px; top: 0px;">Welcome <i><?php echo $_SESSION['first']; ?></i></h3></li>
		</ul>

		<div class="section group" style="position: absolute; right: 0px; padding-top: 75px;">
			<a href="entry.php/id=?WHATEVERTHEIDIS">
				<div class="col c-1-1 padding-center m-right" style="border: 1px solid #ccc; width: 1190px;">
					<h3 style="padding-left: 10px;"><strong>10/8/2016</strong> -- THIS IS WHERE YOU WOULD PUT THE KEYWORD SUMMARY</h3>
				</div><br/>
			</a>
			<a href="entry.php/id=?WHATEVERTHEIDIS">
				<div class="col c-1-1 padding-center m-right" style="border: 1px solid #ccc; width: 1190px;">
					<h3 style="padding-left: 10px;"><strong>10/7/2016</strong> -- THIS IS WHERE YOU WOULD PUT THE KEYWORD SUMMARY</h3>
				</div>
			</a>
		</div>
	</body>
</html>