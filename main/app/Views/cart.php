<?php
    $this->extend('master');

    $this->section('abc');
?>
	<?php
    $session=\Config\Services::session();
    $name = $session->getTempdata('username');
    $email = $session->getTempdata('uname');
    $roll = $session->getTempdata('roll');
?>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<!-- <th class="product-image">Product Image</th> -->
									<th class="product-name">Name</th>
									<th class="product-price">Single Item Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total Price</th>
									<th class="product-name">Category</th>
									<th class="product-total"></th>
								</tr>
							</thead>
							<tbody>
							<?php
							foreach ($userdata as $u) {
								if($u['fullname'] == $name && $u['email'] == $email){
							?>
								<tr class="table-body-row">
									<!-- <td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td> -->
									<td class="product-name"><?php echo $u['item_name'];?></td>
									<td class="product-price"><?php echo $u['one_item_price'];?></td>
									<td class="product-quantity"><input type="number" readonly value="1"></td>
									<td class="product-remove"><?php echo $u['price'];?></td>
									<td class="product-name"><?php echo $u['catagory'];?></td>
									<td class="product-total"><a href="delete_from_cart?fullname=<?php echo $name;?>&email=<?php echo $email;?>&item_name=<?php echo $u['item_name'];?>"><i class="far fa-window-close"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="buy_from_cart?fullname=<?php echo $name;?>&email=<?php echo $email;?>&item_name=<?php echo $u['item_name'];?>&one_price=<?php echo $u['one_item_price'];?>&quantity=1&price=<?php echo $u['price'];?>&catagory=<?php echo $u['catagory'];?>"><i class="fas fa-shopping-cart"></a></td>
								</tr>
								<?php }
								} ?>
							</tbody>
						</table>
					</div>
				</div>

				<!-- <div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart" class="boxed-btn">Update Cart</a>
							<a href="#" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<?php
    $this->endSection();
?>