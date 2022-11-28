<?php
    $this->extend('master');

    $this->section('abc');
?>

<div class="contact-from-section mt-150 mb-150">
		<div class="container">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h1>Recover Now ...</h1>
					</div>
				 	
					<div class="contact-form">
						<form action="<?php echo base_url();?>/forgetpasswordaction" method="POST" id="fruitkha-contact">
							<p>
								<input type="email" placeholder="Email" name="email" id="email">
								<p><?php if(isset($err)){
                                    if($err->hasError('email')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('email');
                                    echo "</div>";
                                    }
                                }?></p>
							</p>
                            <div class="form-title">
                                <p>Back to login ?<a href="login">login</a></p>
                            </div>
							<p><input type="submit" value="Send"></p>
						</form>
					</div>


				</div>
		</div>
	</div>

    <?php
    $this->endSection();
?>