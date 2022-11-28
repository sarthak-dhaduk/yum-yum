<?php
    $this->extend('master');

    $this->section('abc');
?>

<div class="contact-from-section mt-150 mb-150">
		<div class="container">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h1>Register Now</h1>
					</div>
				 	
					<div class="contact-form">
						<form method="post" id="fruitkha-contact" action="<?php echo base_url();?>/updatenewPassword">
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
                            <p>
                                <input type="password" placeholder="Confirm Password" name="cpwd" id="cpwd">
                                    <p><?php if(isset($err)){
                                        if($err->hasError('cpwd')){
                                        echo "<div style='color:red'>";
                                        echo $err->getError('cpwd');
                                        echo "</div>";
                                        }
                                    }?></p>
							</p>
                            <div class="form-title">
                                <p>Back to login ?<a href="login"> Login</a></p>
                            </div>
							<p><input type="submit" value="UPDATE"></p>
                        
                        </form>
					</div>


				</div>
		</div>
	</div>

    <?php
    $this->endSection();
?>