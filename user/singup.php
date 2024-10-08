<!DOCTYPE html>
<html lang="en">
<?php 
include('./validation/signup_validation.php');
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for your customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
											<?php if (isset($errors['name'])): ?>
												<small style="color:red;"><?= $errors['name']; ?></small>
											<?php endif; ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Phone</label>
											<input class="form-control form-control-lg" type="text" name="phone" placeholder="Phone" />
											<?php if (isset($errors['phone'])): ?>
												<small style="color:red;"><?= $errors['phone']; ?></small>
											<?php endif; ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
											<?php if (isset($errors['email'])): ?>
												<small style="color:red;"><?= $errors['email']; ?></small>
											<?php endif; ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
											<?php if (isset($errors['password'])): ?>
												<small style="color:red;"><?= $errors['password']; ?></small>
											<?php endif; ?>
										</div>
										<div class="text-center mt-3">
											<button type="submit" name="submit" class="btn btn-lg btn-primary">Sign up</button>
											<div class="form-group">
												<label class="form-check-label"><a href="resend-otp.php">Resend OTP</a></label>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="../assets/js/app.js"></script>
</body>
</html>
