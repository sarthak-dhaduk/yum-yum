<?php
    $this->extend('master');

    $this->section('abc');
?>

<div class="contact-from-section mt-150 mb-150">
		<div class="container">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h1>Login Here</h1>
					</div>
				 	
					<div class="contact-form">
						<form action="<?php echo base_url();?>/login_check" method="POST" id="fruitkha-contact">
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
							<p>
								<input type="password" placeholder="Password" name="pwd" id="pwd">
								<p><?php if(isset($err)){
                                    if($err->hasError('pwd')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('pwd');
                                    echo "</div>";
                                    }
                                }?></p>
							</p>
							<!-- <input type="hidden" name="token"/> -->
							<div class="form-title">
                                <p><a href="forget_password_view">Forgat Password?</a></p>
                            </div>
                            <div class="form-title">
                                <p>Don't Have any Account?<a href="register">Register</a></p>
                            </div>
							<p><input type="submit" value="LOGIN"></p>
						</form>
					</div>


				</div>
		</div>
	</div>

    <?php
    $this->endSection();
?>