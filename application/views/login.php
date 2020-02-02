<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">

</head>

<body>
	<section id="intro">
		<div class="intro-container wow fadeIn">
			<div class="col-md-5">
				<form action="<?= base_url('login') ?>" class="login-form" method="POST">
					<h2>Login</h2>

					<div class="txtb">
						<input name="email" type="email" required>
						<span data-placeholder="Email"></span>
					</div>

					<div class="txtb">
						<input name="password" type="password" required>
						<span data-placeholder="Password"></span>
					</div>

					<input type="submit" class="logbtn" value="login">

					<div class="bottom-text">
						Don't have account? <a href="#">Sign Up</a>
					</div>


				</form>
			</div>
		</div>
	</section>
	<script src="<?= base_url(); ?>assets/js/login.js"></script>


</body>

</html>
