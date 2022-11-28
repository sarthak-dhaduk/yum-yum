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
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>If you have any type of querys let us know <br>and we are trying to resolve it...</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post" id="fruitkha-contact" action="<?php echo base_url();?>/contact_us">
							<p>
								<input type="text" readonly value="<?php echo $name ?>" name="name" id="name">
								<input type="email" readonly value="<?php echo $email ?>" name="email" id="email">
							</p>
							<p>
								<input type="tel" placeholder="Phone" name="phone" id="phone" required>
								<input type="text" placeholder="Subject" name="subject" id="subject" required>
							</p>
							<p><textarea name="description" id="message" cols="30" rows="10" placeholder="Message" required></textarea></p>
							<!-- <input type="hidden" name="token" value="FsWga4&@f6aw" /> -->
							<?php
							if(isset($_SESSION['username']) && isset($_SESSION['uname'])){?>
							<p><input type="submit" value="Submit"></p>
							<?php } ?>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>R.K. University <br> Rajkot, Gujrat. <br> India</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +91 111 222 3333 <br> Email: sarthakdhaduk@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->

	<?php
    $this->endSection();
?>