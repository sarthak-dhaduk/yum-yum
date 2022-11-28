<?php
    $this->extend('master2');

    $this->section('abcd');
?>

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Details /</span> Edit Item</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Product</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Edit Details</h5>
                    <!-- Account -->
                          

                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" action="<?php echo base_url();?>/edit_admin_orderd_item" method="POST">
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Old Fullname</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="firstName"
                                  readonly
                                  value="<?php echo $userdata->fullname;?>"
                                  name="ofn"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">New Fullname</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="firstName"
                                  value="<?php echo $userdata->fullname;?>"
                                  name="nfn"
                                />
                                <p><?php if(isset($err)){
                                    if($err->hasError('nfn')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('nfn');
                                    echo "</div>";
                                    }
                                }?></p>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Old Email</label>
                                <input
                                  class="form-control"
                                  type="email"
                                  id="firstName"
                                  readonly
                                  value="<?php echo $userdata->email;?>"
                                  name="oem"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">New Email</label>
                                <input
                                  class="form-control"
                                  type="email"
                                  id="firstName"
                                  value="<?php echo $userdata->email;?>"
                                  name="nem"
                                />
                                <p><?php if(isset($err)){
                                    if($err->hasError('nem')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('nem');
                                    echo "</div>";
                                    }
                                }?></p>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Old Food Name</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="firstName"
                                  readonly
                                  value="<?php echo $userdata->item_name;?>"
                                  name="oin"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">New Food Name</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="firstName"
                                  value="<?php echo $userdata->item_name;?>"
                                  name="nin"
                                />
                                <p><?php if(isset($err)){
                                    if($err->hasError('nin')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('nin');
                                    echo "</div>";
                                    }
                                }?></p>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Old Quantity</label>
                                <input
                                  class="form-control"
                                  type="number"
                                  id="firstName"
                                  readonly
                                  value="<?php echo $userdata->quantity;?>"
                                  name="oqt"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">New Quantity</label>
                                <input
                                  class="form-control"
                                  type="number"
                                  id="firstName"
                                  value="<?php echo $userdata->quantity;?>"
                                  name="nqt"
                                />
                                <p><?php if(isset($err)){
                                    if($err->hasError('nqt')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('nqt');
                                    echo "</div>";
                                    }
                                }?></p>
                            </div>

                            <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Old Price</label>
                            <input
                              class="form-control"
                              type="number"
                              id="firstName"
                              readonly
                              value="<?php echo $userdata->price;?>"
                              name="op"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">New One item price</label>
                                <input
                                  class="form-control"
                                  type="number"
                                  id="firstName"
                                  value="<?php echo $userdata->one_item_price;?>"
                                  name="noip"
                                />
                                <p><?php if(isset($err)){
                                    if($err->hasError('noip')){
                                    echo "<div style='color:red'>";
                                    echo $err->getError('noip');
                                    echo "</div>";
                                    }
                                }?></p>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Old One item price</label>
                                <input
                                  class="form-control"
                                  type="number"
                                  id="firstName"
                                  readonly
                                  value="<?php echo $userdata->one_item_price;?>"
                                  name="ooip"
                                />
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