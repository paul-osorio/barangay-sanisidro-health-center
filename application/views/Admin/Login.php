<style>
    .body {
        background: linear-gradient(180deg, #ECECEC 0%, #15499C 100%);
        height: 100vh;
    }

    .healthimg {
        object-fit: contain;
    }
</style>
<div class="body">
    <div class="d-flex justify-content-center">
        <div class="mt-4">
            <div class="card card-body rounded-0 p-0 mt-5" style="width: 25rem;box-shadow: -18px -14px 0px -3px rgba(0, 0, 0, 0.25);">
                <img src="https://wallpaperaccess.com/full/624111.jpg" height="180" style="object-fit: cover" alt="">
                <div class="p-3">
                    <div class="mt-0 mb-0">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex">
                                <div class="">
                                    <img src="<?= base_url('assets/images/sanisi.jpg') ?>" height="50" width="50" alt="">
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="m-0 fw-bold ms-2" style="color: #304B8B;line-height: 18px">
                                    BARANGAY SAN ISIDRO<br>HEALTH CENTER
                                </p>
                            </div>
                        </div>
                    </div>
                    <label class="fw-bold text-secondary">ADMIN</label>
                    <form action="<?= base_url('AdminAuth/loginauth') ?>" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" value="<?= $this->session->flashdata('username') ?>" class="form-control rounded-0" placeholder="Email">
                            <?= loginErrorMessage($this->session->flashdata('username_error'), 'User not found') ?>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control rounded-0" placeholder="Password">
                            <?= loginErrorMessage($this->session->flashdata('password_error'), 'Password do not match') ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-0 mt-3 mb-2">Log In</button>
                    </form>

                </div>


            </div>

        </div>

    </div>


</div>