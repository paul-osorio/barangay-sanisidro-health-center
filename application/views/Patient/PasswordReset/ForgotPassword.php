<style>
    .bgFP {
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;


    }

    .fpcard {
        height: 30rem;
        width: 50rem;
        border: 1px solid darkblue;
        box-shadow: 0 4px 14px rgba(0, 0, 139, 0.5);
    }

    .fpbackground {
        background-image: url("<?= base_url('assets/images/resetpass.jpg') ?>");
        background-size: 30rem;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
        background-position: 50%;
        background-color: none;

    }

    .form-control,
    .btn {
        box-shadow: none !important;
    }
</style>

<div class="bgFP">
    <div class="">
        <div class="fpcard">
            <div class="row g-0 h-100">
                <div class="col-lg-6 h-100">
                    <div class="fpbackground">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class=" w-75">
                            <form action="<?= base_url('AjaxRequest/changepass') ?>" method="POST" id="emailforgot">
                                <p class="fs-2 fw-bold" style="line-height: 45px">Enter your<br> New Password</p>
                                <input type="text" value="<?= $linkID ?>" name="linkid" hidden>
                                <input type="text" value="<?= $email ?>" name="email" hidden>
                                <input name="password" id="password" type="password" class="form-control bg-light mb-2" placeholder="New Password">
                                <input name="confirm_password" type="password" class="form-control bg-light" placeholder="Confirm Password">
                                <?= (($this->session->flashdata('passwordmatch')) ? 'Password does not match' : '') ?>

                                <button class="btn btn-primary w-100 mt-3" type="submit" name="change">Change</button>
                                <button class="btn btn-white w-100 btn-sm" type="button">Go back to login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#emailforgot').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                }
            },
            messages: {
                password: {
                    required: errorMessage('Please enter your new password'),
                    minlength: errorMessage('At least 6 characters'),

                },
                confirm_password: {
                    required: errorMessage('Please enter your new password'),
                    minlength: errorMessage('At least 6 characters'),
                    equalTo: errorMessage('Password do not match')

                }
            }
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    })
</script>