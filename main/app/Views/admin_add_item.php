<?php
    $this->extend('master2');

    $this->section('abcd');
?>

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span> Add Product</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Product</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Product Details</h5>
                    <!-- Account -->
                          

                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" enctype="multipart/form-data" action="<?php echo base_url();?>/add_item" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Food Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="fn"
                            />
                            <p><?php if(isset($err)){
                                    if($err->hasError('fn')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('fn');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>

                          <div class="mb-3 col-md-5">
                            <label for="exampleFormControlSelect1" class="form-label">Category</label>
                            <select class="form-select" name="category" id="exampleFormControlSelect1" aria-label="Default select example">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="punjabi">Punjabi</option>
                            <option value="italian">Italian</option>
                            <option value="chinese">Chinese</option>
                            <option value="mexican">Mexican</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>

                            <p><?php if(isset($err)){
                                    if($err->hasError('description')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('description');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="html5-password-input" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input class="form-control" type="number" name="price" id="html5-password-input" />
                            </div>
                            <p><?php if(isset($err)){
                                    if($err->hasError('price')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('price');
                                    echo "</div>";
                                    }
                                }?></p>
                          </div>
                          
                          <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload Photo</span>
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
                  <!-- <div class="card">
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
                  </div> -->
                </div>
              </div>
            </div>
            <?php
              $this->endSection();
            ?>