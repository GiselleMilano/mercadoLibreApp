<?php include("auth.php"); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<title>Create product</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Product List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="order_list.php">Order List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="create_product.php">Create Product</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-4"></div>
			<form method="POST" action="add_product.php" class="col-4">
				</br>
				<div class="row g-3 align-items-center">
					<div class="col-2">
						<label class="col-form-label">Title</label>
					</div>
					<div class="col-auto">
						<input type="text" name="title" class="form-control">
					</div>
				</div>
				</br>
				<div class="row g-3 align-items-center">
					<div class="col-2">
						<label class="col-form-label">Cost</label>
					</div>
					<div class="col-auto">
						<input type="number" name="cost" value=350 class="form-control">
					</div>
				</div>
				</br>
				<div class="row g-3 align-items-center">
					<div class="col-2">
						<label class="col-form-label">Amount</label>
					</div>
					<div class="col-auto">
						<input type="number" name="amount" value=1 class="form-control">
					</div>
				</div>
				</br>
				<button type="submit" class="btn btn-primary pull-right">Publish</button>
			</form>
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>