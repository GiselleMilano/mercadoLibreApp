<?php include("auth.php"); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<title>Product list</title>
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
							<a class="nav-link active" aria-current="page" href="index.php">Product List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="order_list.php">Order List</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="create_product.php">Create Product</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				</br>
				<?php
					$apiInstanceRest = new Meli\Api\RestClientApi();
					
					$result = $apiInstanceRest->resourceGet("users/".$_SESSION["user_id"]."/items/search", $_SESSION["TOKEN"]);
					
					$itemList = json_decode($result[0])->results;
					
					foreach($itemList as $itemID){
						$result = $apiInstanceRest->resourceGet('items/' . $itemID, $_SESSION["TOKEN"]);
						$item = json_decode($result[0]);
						?>
						<div class="card mb-3">
							<div class="row g-0">
								<div class="col-md-2">
									<img src="http://mlu-s2-p.mlstatic.com/968521-MLU20805195516_072016-O.jpg" style="height:150px" class="img-fluid rounded-start">
								</div>
								<div class="col-md-10">
									<div class="card-body row" style="margin-top:40px">
										<div class="col-4"><label><?php print($item->title);?></label></div>
										<div class="col-2"><label>$ <?php print($item->price);?></label></div>
										<div class="col-2"><label><?php print($item->available_quantity);?> u.</label></div>
										<div class="col-3"><a class="btn btn-outline-secondary" href="<?php print($item->permalink)?>">See Product</a></div>
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