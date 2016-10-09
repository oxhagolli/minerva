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
		quill.setContents({"ops":[{"attributes":{"underline":true},},{"attributes":{"header":1},"insert":"\n"},{"insert":"\n
		<?php
		    if ($_GET['id'] == 1) {
		        echo "ONE";
		    }
		    elseif ($_GET['id'] == 2) {
		        echo "TWO";
		    }
		    elseif ($_GET['id'] == 3) {
		        echo "THREE";
		    }
		    elseif ($_GET['id'] == 4) {
		        echo "FOUR";
		    }
		?>
		\n"}]});

		var form = document.querySelector('form');
		form.onsubmit = function() {
		  // Populate hidden form on submit
		  var about = document.querySelector('input[name=about]');
		  about.value = JSON.stringify(quill.getContents());
		  
		  console.log(about.value);

		  return false;
		};
	</script>
</body>
</html>
