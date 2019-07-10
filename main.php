
<!DOCTYPE html>
<html>
<head>
	<title>Compare Price</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		// define variables and set to empty values
		$amount1 = $price1 = $amount2 = $price2 = "";
		$amountPerBaht1 = $amountPerBath2 = 0;
		$status1 = $status2 = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$amount1 = test_input($_POST["amount1"]);
			$price1 = test_input($_POST["price1"]);
			$amount2 = test_input($_POST["amount2"]);
			$price2 = test_input($_POST["price2"]);
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$amountPerBaht1 = $amount1/$price1;
		$amountPerBaht2 = $amount2/$price2;
		if ($amountPerBaht1 > $amountPerBaht2) {
			$status1 = "CHEAP";
			$status2 = "EXPENSIVE";
		} elseif ($amountPerBaht1 < $amountPerBaht2) {
			$status1 = "EXPENSIVE";
			$status2 = "CHEAP";
		} else {
			$status1 = "Same price";
			$status2 = "Same price";
		}	
		
	?>
	



	<div>
		<h1 class="ml-3">Compare Items Prices</h1>
	</div>
	<div>
		<form class="form-group ml-3 mr-3">
			<div class="form-group">
				<label><h3>ITEM 1</h3></label>
				<div>
					<div class="input-group mb-2">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Amount : </span>
					  </div>
					  <input type="text" name="amount1" class="form-control" placeholder="Amount" aria-label="Amount">
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Price : </span>
					  </div>
					  <input type="text" name="price1" class="form-control" placeholder="<?php echo $status1; ?>" aria-label="Price">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label><h3>ITEM 2</h3></label>
				<div>
					<div class="input-group mb-2">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Amount : </span>
					  </div>
					  <input type="text" name="amount2" class="form-control" placeholder="Amount" aria-label="Amount">
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">Price : </span>
					  </div>
					  <input type="text" name="price2" class="form-control" placeholder="<?php echo $status2; ?>" aria-label="Price">
					</div>
				</div>
			</div>
			<div class="form-group">
				<a href="index.html">
					<button class="btn btn-danger" type="button">RESET</button>
				</a>
			</div>

		</form>
	</div>

</body>
</html>

