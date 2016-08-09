<?php
session_start();
/*
File:		index.php
Purpose:	View products
*/
require("products.php");
require("layout.php");
require ("DB/db.php");
// Initialize cart
if(!isset($_SESSION['shopping_cart'])) {
	$_SESSION['shopping_cart'] = array();
}
// Empty cart
if(isset($_GET['empty_cart'])) {
	$_SESSION['shopping_cart'] = array();
}

// **PROCESS FORM DATA**
$message = '';
// Add product to cart
if(isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];
	
	// Check for valid item
	if(!isset($products[$product_id])) {
		$message = "Invalid item!<br />";
	}
	// If item is already in cart, tell user
	else if(isset($_SESSION['shopping_cart'][$product_id])) {
		$message = "Item already in cart!<br />";
	}
	// Otherwise, add to cart
	else {
		$_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
		$_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];
		$message = "Added to cart!";
	}
}
// Update Cart
if(isset($_POST['update_cart'])) {
	$quantities = $_POST['quantity'];
	foreach($quantities as $id => $quantity) {
		if(!isset($products[$id])) {
			$message = "Invalid product!";
			break;
		}
		$_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
	}
	if(!$message) {
		$message = "Cart updated!<br />";
	}
}


// **DISPLAY PAGE**
echo $header;

echo $message;

// View a product
if(isset($_GET['view_product'])) {
	$product_id = $_GET['view_product'];
	
	if(isset($products[$product_id])) {
		// Display site links
		echo "<p>
			<a href='./index.php'>Artigiano</a> &gt; <a href='./index.php'>" . 
			$products[$product_id]['category'] . "</a></p>";
		
		
		// Display product
		echo "<p>
			<span style='font-weight:bold;'>" . $products[$product_id]['name'] . "</span><br />
			<span>" . $products[$product_id]['price'] . " lek</span><br />
			<span>" . $products[$product_id]['description'] . "</span><br />
			<p>
				<form action='./index.php?view_product=$product_id' method='post'>
					<select name='quantity'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
					<input type='hidden' name='product_id' value='$product_id' />
					<input type='submit' name='add_to_cart' value='Add to cart' />
				</form>
			</p>
		</p>";
	}
	else {
		echo "Invalid product!";
	}
}
// View cart
else if(isset($_GET['view_cart'])) {
	// Display site links
	echo "<p>
		<a href='./index.php'>Artigiano</a></p>";
	
	echo "<h3>Shporta Juaj</h3>
	<p>
		<a href='./index.php?empty_cart=1'>Empty Cart</a>
	</p>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Ju nuk keni asnje produkt ne shporte <br />";
	}
	else {
		echo "<form action='./index.php?view_cart=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='border-bottom:1px solid #000000;'>Emri</th>
					<th style='border-bottom:1px solid #000000;'>Cmimi</th>
					<th style='border-bottom:1px solid #000000;'>Kategoria</th>
					<th style='border-bottom:1px solid #000000;'>Sasia</th>
				</tr>";
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></td>
						<td style='border-bottom:1px solid #000000;'>$" . $products[$product_id]['price'] . "</td> 
						<td style='border-bottom:1px solid #000000;'>" . $products[$product_id]['category'] . "</td>
						<td style='border-bottom:1px solid #000000;'>
							<input type='text' name='quantity[$product_id]' value='" . $product['quantity'] . "' /></td>
					</tr>";
				}
			echo "</table>
			<input type='submit' name='update_cart' value='Update' />
			</form>
			<p>
				<a href='./index.php?checkout=1'>Checkout</a>
			</p>";
		
	}
}
// Checkount
else if(isset($_GET['checkout'])) {
	// Display site links
	echo "<p>
		<a href='./index.php'>DropShop</a></p>";
	
	echo "<h3>Checkout</h3>";
	
	if(empty($_SESSION['shopping_cart'])) {
		echo "Your cart is empty.<br />";
	}
	else {
		echo "<form action='./index.php?checkout=1' method='post'>
		<table style='width:500px;' cellspacing='0'>
				<tr>
					<th style='border-bottom:1px solid #000000;'>Name</th>
					<th style='border-bottom:1px solid #000000;'>Item Price</th>
					<th style='border-bottom:1px solid #000000;'>Quantity</th>
					<th style='border-bottom:1px solid #000000;'>Cost</th>
				</tr>";
				
				$total_price = 0;
				foreach($_SESSION['shopping_cart'] as $id => $product) {
					$product_id = $product['product_id'];
					
					
					$total_price += $products[$product_id]['price'] * $product['quantity'];
					echo "<tr>
						<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . 
							$products[$product_id]['name'] . "</a></td>
						<td style='border-bottom:1px solid #000000;'>$" . $products[$product_id]['price'] . "</td> 
						<td style='border-bottom:1px solid #000000;'>" . $product['quantity'] . "</td>
						<td style='border-bottom:1px solid #000000;'>$" . ($products[$product_id]['price'] * $product['quantity']) . "</td>
					</tr>";
				}
			echo "</table>
			<p>Total price: $" . $total_price . "</p>";
		
	}
}
// View all products
else {
	// Display site links
	echo "<p>
		<a href='./index.php'>Artigiano</a></p>";
	
	echo "<h3>Porosi Online</h3>";

	echo "<table style='width:500px;' cellspacing='0'>";
	echo "<tr>
		<th style='border-bottom:1px solid #000000;'>Foto</th>
		<th style='border-bottom:1px solid #000000;'>Emri</th>
		<th style='border-bottom:1px solid #000000;'>Produkti</th>
		<th style='border-bottom:1px solid #000000;'>Kategoria</th>
	</tr>";


	// Loop to display all products
	foreach($products as $id => $product) {
		echo "<tr>	
<td style='border-bottom:1px solid #000000;'><img width='150px' height='150px'src='" . $product['foto'] . "'</td>
			<td style='border-bottom:1px solid #000000;'><a href='./index.php?view_product=$id'>" . ucfirst($product['name']) . "</a></td>
			<td style='border-bottom:1px solid #000000;'>" . $product['price'] . " lek</td> 
			<td style='border-bottom:1px solid #000000;'>" . $product['category'] . "</td>
		</tr>";
	}
	echo "</table>";
}

echo $footer;

?>