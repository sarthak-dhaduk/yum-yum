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
						<h1>Menu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-100">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".punjabi">Punjabi</li>
                            <li data-filter=".italian">Italian</li>
                            <li data-filter=".chinese">Chinese</li>
							<li data-filter=".mexican">Mexican</li>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
			<?php
            foreach ($userdata as $u) {
                $path = base_url() . "/public/assets/uploads/" . $u['photo'];?>
				<div class="col-lg-4 col-md-6 text-center <?php echo $u['category'];?>">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product?item=<?php echo $u['item_name'];?>"><img src="<?php echo $path;?>" alt=""></a>
						</div>
						<h3><?php echo $u['item_name'];?></h3>
						<p class="product-price"><span>Per Item</span>MRP : <?php echo $u['price'];?></p>
						<a href="cart_u?item=<?php echo $u['item_name'];?>&name=<?php echo $name;?>&email=<?php echo $email;?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="col-lg-4 col-md-6 text-center berry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center lemon">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-4.jpg" alt=""></a>
						</div>
						<h3>Avocado</h3>
						<p class="product-price"><span>Per Kg</span> 50$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-5.jpg" alt=""></a>
						</div>
						<h3>Green Apple</h3>
						<p class="product-price"><span>Per Kg</span> 45$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-6.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 80$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> -->
			</div>

		</div>
	</div>
	<!-- end products -->

	<?php
    $this->endSection();
?>