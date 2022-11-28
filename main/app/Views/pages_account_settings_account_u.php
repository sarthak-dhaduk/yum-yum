<?php
    $this->extend('master3');

    $this->section('abcde');
?>

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Account</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                          <?php
                            $path = base_url() . "/public/assets/uploads/" . $userdata->profilepic;
                            ?>
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="<?= $path  ?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" enctype="multipart/form-data" action="<?php echo base_url();?>/editProfile" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="fn1"
                              value="<?php echo $userdata->fullname;?>"
                              
                            />
                            <p><?php if(isset($err)){
                                    if($err->hasError('fn1')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('fn1');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $userdata->email;?>"
        
                            />
                            <p><?php if(isset($err)){
                                    if($err->hasError('email')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('email');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="html5-password-input" class="col-md-2 col-form-label">New Password</label>
                            <div class="col-md-10">
                              <input class="form-control" type="password" name="pwd" id="html5-password-input" />
                            </div>
                            <p><?php if(isset($err)){
                                    if($err->hasError('pwd')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('pwd');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="html5-password-input" class="col-md-2 col-form-label">Conform Password</label>
                            <div class="col-md-10">
                              <input class="form-control" type="password" name="cpwd" id="html5-password-input" />
                            </div>
                            <p><?php if(isset($err)){
                                    if($err->hasError('cpwd')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('cpwd');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>
                          <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              name="pic"
                            />
                            <p><?php if(isset($err)){
                                    if($err->hasError('pic')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('pic');
                                    echo "</div>";
                                    }
                                }?></p>
                          </label>

                          <p class="text-muted mb-0">Allowed JPG,JPEG or PNG. Max size of 800K</p>
                        </div>

                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
              $this->endSection();
            ?>