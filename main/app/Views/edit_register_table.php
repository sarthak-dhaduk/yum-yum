<?php
    $this->extend('master2');

    $this->section('abcd');
?>

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>

              <div class="row">

                <div class="col-xl-12">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Edit Profile </h5>
                    <div class="card-body">

                    <form id="formAccountSettings" enctype="multipart/form-data" action="<?php echo base_url();?>/single_user_u" method="POST">

                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">User Name</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="name" value="<?php echo $userdata->fullname;?>" id="html5-text-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-email-input" class="col-md-2 col-form-label">Old Email</label>
                        <div class="col-md-10">
                          <input class="form-control" type="email" name="o_email" readonly value="<?php echo $userdata->email;?>" id="html5-email-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-email-input" class="col-md-2 col-form-label">New Email</label>
                        <div class="col-md-10">
                          <input class="form-control" type="email" name="email" value="<?php echo $userdata->email;?>" id="html5-email-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-password-input" class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                          <input class="form-control" type="password" name="pwd" value="<?php echo $userdata->password;?>" id="html5-password-input" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-password-input" class="col-md-2 col-form-label">Conform Password</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="cpwd" value="<?php echo $userdata->password;?>" id="html5-password-input" />
                        </div>
                      </div>
                      
                      <div class="mb-3 row">
                        <label for="html5-time-input" class="col-md-2 col-form-label">Profile</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="formFile" name="pic" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </div>
                      </div>
                    
                    </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <?php
              $this->endSection();
            ?>