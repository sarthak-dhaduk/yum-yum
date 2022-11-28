<?php
    $this->extend('master3');

    $this->section('abcde');
?>

          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      

                    <div class="card">
                        <h5 class="card-header">Regsitered User</h5>
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Profile Pic</th>
                                <th>Button</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                            $path = base_url() . "/public/assets/uploads/" . $userdata->profilepic;?>
                                
                            <tr>
                                <td><strong><?php echo $userdata->fullname;?></strong></td>

                                <td><?php echo $userdata->email;?></td>

                                <td><span class="badge bg-label-primary me-1"><?php echo $userdata->password;?></span></td>

                                <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller"
                                    >
                                    <img src="<?php echo $path;?>" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                                </td>

                                <td>
                                    <a class="dropdown-item" href="delete_register_table/?email=<?php echo $userdata->email;?>"
                                        ><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                                </td>
                            </tr>
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                    
                
                    </div>
                  </div>
                </div>
<?php
    $this->endSection();
?>