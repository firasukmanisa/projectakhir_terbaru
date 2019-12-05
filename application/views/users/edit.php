                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('message'); ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800"><?= $title2; ?></h1>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="<?= base_url('user/editprofile'); ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <!--picture-->
                                <div class="form-group row">
                                    <div class="col-sm-2">Picture</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['foto_profil']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto_profil" name="foto_profil">
                                                    <label class="custom-file-label" for="image">Choose File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Full Name" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <hr>
                                <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
                                <br>
                                <div class="form-group row">
                                    <label for="password1" class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password2" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Change Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password3" class="col-sm-2 col-form-label">Re-type Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password3" name="password3" placeholder="Re-type Password">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Edit Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->