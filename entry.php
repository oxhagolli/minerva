<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="assets/style/style.css">
		<!-- Overrides -->
		<style>
			html {
				overflow-y: hidden; 
				overflow-x: hidden;
			}
			body {
				background-color: #FFF;
			}
		</style>
		<title>PUT "ENTRY " + DATE OF ENTRY</title>
		<!-- Quill Dependancys. For the editor -->
		<!-- Theme included stylesheets -->
		<link href="http://cdn.quilljs.com/1.0.6/quill.snow.css" rel="stylesheet">
		<link href="http://cdn.quilljs.com/1.0.6/quill.bubble.css" rel="stylesheet">

		<!-- Core build with no theme, formatting, non-essential modules -->
		<link href="http://cdn.quilljs.com/1.0.6/quill.core.css" rel="stylesheet">
		<script src="http://cdn.quilljs.com/1.0.6/quill.core.js" type="text/javascript"></script>
	</head>
	<body>
	<form>
		<navbar style="padding-top: 25px; ">
			<ul class="sidebar" style="position: fixed; background-color: white; padding: 0; text-align: center;">
				<div class="p-top" align="center"> 
					<!-- THIS IS WHERE THE SCORE OF YOUR JOURNAL ENTRY GOES -->
					<i class="color-circle black">55</i>
				</div>
				<!-- THIS IS WHERE YOU PUT PEOPLE WHO SCORED SIMILARLY BASED OFF OF SCORE AND CONTENT -->
				<li><button type="submit" class="btn black m-top" style="border: 0;">Submit</button></li>
				<li><button type="back" onclick="window.location = 'index.php'" class="btn black m-top" style="border: 0;">Back</button></li>
			</ul>
		</navbar>	
		<input name="about" type="hidden">
		<div id="editor" style="margin-left: 15%;height: 100vh;">
			<!-- FILL IN THE CONTENT IF IT ISN'T A NEW JOURNAL ENTRY -->
		</div>
	</form>
	<!-- Main Quill library -->
	<script src="http://cdn.quilljs.com/1.0.6/quill.js" type="text/javascript"></script>
	<script src="http://cdn.quilljs.com/1.0.6/quill.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script>
		var toolbarOptions = [
		  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
		  ['blockquote', 'code-block'],

		  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
		  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
		  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
		  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
		  [{ 'direction': 'rtl' }],                         // text direction

		  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
		  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

		  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
		  [{ 'font': [] }],
		  [{ 'align': [] }],

		  ['clean'],                                        // remove formatting button
		];
		var quill = new Quill('#editor', {
		  modules: {
		    toolbar: toolbarOptions
		  },
		  theme: 'snow'
		});

		var form = document.querySelector('form');
		form.onsubmit = function() {
		  // Populate hidden form on submit
		  var about = document.querySelector('input[name=about]');
		  about.value = JSON.stringify(quill.getContents());
		  
		  console.log(about.value);

		  return false;
		};
	</script>
	<?php
        if($_GET['id'] === 1) {
            echo = "<script>quill.setContents('First off let me address some of the issues other people have been having. When people are saying they are upset that it wont fit all the way around their huge TVs, thats because you are making the square to big... If you want the lights to be across the top, bottom, and both sides then you wont want to put the lights all the way to the edge of the TV, you will need to bring them closer to the center of the TV. Personally I kept the light about 4 inches from the edge of the TV and was able to cover both sides and across the top completely. This is working just fine for me with no dark spots around the TV whatsoever. Another problem people are having is the strand not sticking to the TV. One of two things is happening: 1. they are trying to stick it onto a dust covered TV or 2. they did what I did and peeled off both the backing and the sticky strip. I went to peel off the backing for the sticky material and realized it wasnt sticking to my TV but the backing was catching the hairs on my arms and pulling it. I looked closer and the sticky material was pulling off of the light strand just as easily as I would imagine the backing should come off the sticky material. I placed the sticky material back onto the light strand and pulled off just the backing this time. It was so sticky that if you placed it in the wrong spot you would have to try pretty hard to pull it back off just to move it.')</script>";
        }
        if($_GET['id'] === 2) {
            echo = '<script>quill.setContents('')</script>';
        }
        if($_GET['id'] === 3) {
            echo = '<script>quill.setContents('')</script>';
        }
        if($_GET['id'] === 4) {
            echo = '<script>quill.setContents('')</script>';
        }
    ?>
</body>
</html>
