<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, 
				initial-scale=1" />
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



	<title>Employee Details</title>
	<style>
		body {
			background-color: #92a8d1;
		}
	</style>
	<style>
		form {
			text-align: justify;
		}
	</style>
</head>

<body>


	<div class="container my-5 mx-auto">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<?php if (!empty($_GET['error'])) {
							echo $_GET['error'], '<br/>';
						} ?>

						<!-- //<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> -->
						<form action="./includes/index-submit.php" method="post">
							<div class="form-group mb-2">
								<label for="name"> Name </label>
								<input type="text" id="name" name="name" class="form-control"
									placeholder="Enter First Name...">
								<!-- <?php echo $nameErr; ?> -->
								<?php if (!empty($_GET['nameErr'])) {
									echo $_GET['nameErr'];
								} ?>
							</div>
							<div class="form-group mb-2">
								<label for="email"> Email</label>
								<input type="email" name="email" id="email" class="form-control"
									placeholder="Enter E-mail.....">
								<?php if (!empty($_GET['emailErr'])) {
									echo $_GET['emailErr'];
								} ?>
							</div>
							<div class="form-group mb-2">
								<label for="phone">Phone Number</label>
								<input type="text" id="phone_" class="form-control" name="phone">
								<!-- <?php echo $phoneErr; ?> -->
								<?php if (!empty($_GET['phoneNumberErr'])) {
									echo $_GET['phoneNumberErr'];
								} ?>
							</div>

							<div class="form-group mb-2">
								<label for="address">Address</label>
								<textarea type="address" id="address" class="form-control" name="address"></textarea>

							</div>

							<div class="form-group mb-2">
								<label for="place">Place</label>
								<input type="place" id="place" class="form-control" name="place">
								<?php if (!empty($_GET['phoneErr'])) {
									echo $_GET['phoneErr'];
								} ?>
							</div>


							<div class="form-group mb-2">
								<input type="radio" id="terms">
								<label for="terms"> I agree to the Terms of Use</label>
							</div>
							<div class="form-group mb-2">
								<button type="submit" class="btn btn-primary btn-lg ">Submit</button>
								<button type="button" class="btn btn-primary btn-lg ">cancel</button>
							</div>
						</form>
					</div>

				</div>

			</div>
		</div>

</body>

</html>