<?php include("auth.php"); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<title>Order list</title>
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
							<a class="nav-link active" href="order_list.php">Order List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="create_product.php">Create Product</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		</br>
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
			<?php
				$apiInstanceRest = new Meli\Api\RestClientApi();
						
				$result = $apiInstanceRest->resourceGet("orders/search?seller=" . $_SESSION["user_id"], $_SESSION["TOKEN"]);
				$orders = json_decode($result[0])->results;
				
				foreach ($orders as $order) {
					?>
					<div class="card mb-3">
						<div class="row g-0">
							<div class="col-3" style="margin:auto">
								<img src="http://mlu-s2-p.mlstatic.com/968521-MLU20805195516_072016-O.jpg" class="img-fluid rounded-start" style="height:150px; width:150px">
							</div>
							<div class="col-md-9">
								<div class="card-body row">
									<label class="col-12"><strong><?php print($order->payments[0]->reason);?></strong></label>
									</br>
									<label class="col-12"><?php print("Cost: $" . $order->payments[0]->transaction_amount);?></label>
									</br>
									<label class="col-12"><?php print("Quantity: " . $order->order_items[0]->quantity . "u.");?></label>
									</br>
									<label class="col-12"><?php print("Buyer: " . $order->buyer->nickname);?></label>
									</br>
									<label class="col-12"><?php print("Order id: " . $order->payments[0]->order_id);?></label>
									</br>
									<label class="col-12"><?php print("Status: " . $order->status);?></label>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			?>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>