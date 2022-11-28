<?php
    $this->extend('master');

    $this->section('abc');
?>
<?php
    $session=\Config\Services::session();
    $name = $session->getTempdata('username');
    $email = $session->getTempdata('uname');
    $roll = $session->getTempdata('roll');
	$counter=0;
?>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<?php
                	$path = base_url() . "/public/assets/uploads/" . $userdata->photo;?>
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo $path;?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $userdata->item_name;?></h3>
						<p class="single-product-pricing"><span>Per Item</span> RS : <?php echo $userdata ->price;?></p>
						<p><?php echo $userdata->description?></p>
						<div class="single-product-form">
						<p><strong>Categories: </strong> <?php echo $userdata->category;?> </p>
						<br>
						<p><strong style="color: RED;">Order Cancellation : </strong> If you want to cancel your order then you must have to contact us through website contact section within 10 minutes after 10 minutes order is not cancellable. </p>
						<br>
						<?php
							if(isset($_SESSION['username']) && isset($_SESSION['uname'])){?>
							<form method="post" action="<?php echo base_url();?>/buy_from_item">
								<p>
									<p>UserName : &nbsp;&nbsp;&nbsp;<input type="text" readonly value="<?php echo $name;?>" name="fn"></p>
									<p>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" readonly value="<?php echo $email;?>" name="em" ></p>
									<p>Food Name :&nbsp;&nbsp;<input type="text" readonly value="<?php echo $userdata->item_name;?>" name="in" ></p>
									<p>Category : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" readonly value="<?php echo $userdata->category;?>" name="ca" ></p>
									<p>Quantity : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" value="1" name="qt" min="1"  max="9" ></p>
									<p>One Item RS: <input type="number" readonly value="<?php echo $userdata ->price;?>" name="oip"></p>
									<input type="submit" value="Buy">
								</p>
							</form>
							<?php }
							?>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="single-article-section">
					<div class="comments-list-wrap">
						<h3 class="comment-count-title">Comments</h3>
						<div class="comment-list">
							<!-- <div class="single-comment-body">
								<div class="comment-user-avater">
									<img src="assets/img/avaters/avatar1.png" alt="">
								</div>
								<div class="comment-text-body">
									<h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
									<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
								</div>
								<div class="single-comment-body child">
									<div class="comment-user-avater">
										<img src="assets/img/avaters/avatar3.png" alt="">
									</div>
									<div class="comment-text-body">
										<h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
										<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
									</div>
								</div>
							</div> -->
							<?php
            foreach ($review as $u) {
                ?>
							<div class="single-comment-body">
								<!-- <div class="comment-user-avater">
									<img src="assets/img/avaters/avatar2.png" alt="">
								</div> -->
								<div class="comment-text-body">
									<h4><?php echo $u['fullname'];?>&nbsp;&nbsp;&nbsp;<a href="single-product?item=<?php echo $u['item_name'];?>"><?php echo $u['item_name'];?></a>&nbsp;&nbsp;<span class="comment-date"> Rating : <?php echo $u['rating'];?></span></h4>
									<p><?php echo $u['description'];?></p>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
		
					<div class="comment-template">
						<h4>Leave a comment</h4>
						<p>If you have a comment dont feel hesitate to send us your opinion.</p>
						<form method="post" action="<?php echo base_url();?>/give_review">

							<p>
								<input type="text" readonly name="fn" value="<?php echo $name;?>">
								<input type="email" readonly name="em" value="<?php echo $email;?>">
							</p>

							<p>
								<input type="text" readonly name="in" value="<?php echo $userdata->item_name;?>">
								&nbsp;&nbsp;&nbsp;<input type="number" value="0" name="ratting" min="0" max="5">
							</p>
							<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message" required></textarea></p>
							<?php
							if(isset($_SESSION['username']) && isset($_SESSION['uname'])){?>
							<p><input type="submit" value="Submit"></p>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				
			<?php
            foreach ($userdata_sp as $u) {
				if($counter == 3){
					break;
				}else{
					$counter=$counter+1;
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
				<?php } } ?>
								
				<!-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- end more products -->


	<?php
    $this->endSection();
?>