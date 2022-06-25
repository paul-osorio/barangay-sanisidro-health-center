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
        background-image: url("<?= base_url('assets/images/forgotpass.jpg') ?>");
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
                            <form action="<?= base_url('AjaxRequest/emailcorrect') ?>" method="POST" id="emailforgot">
                                <p class="fs-2 mb-0 fw-bold" style="line-height: 45px">Forgot <br> Your Password?</p>
                                <p style="font-size: 12.7px;color:gray">Enter the email address associated with your account and we'll send you a link to reset your password</p>
                                <input name="email" id="emailadd" type="text" class="form-control bg-light" placeholder="Email">
                                <button class="btn btn-primary w-100 mt-3" type="submit">Continue</button>
                                <button class="btn btn-white w-100 btn-sm" type="button" onclick="location.href='<?= base_url('P/Login') ?>'">Go back to login</button>
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
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: '<?= base_url('AjaxRequest/emailscan') ?>',
                        method: "POST",
                        data: {
                            email: () => {
                                return $('#emailadd').val()
                            }
                        }
                    }
                }
            },
            messages: {
                email: {
                    required: errorMessage('Please enter your email address'),
                    email: errorMessage('Invalid Email Address'),
                    remote: errorMessage('Email not found'),
                }
            }
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    })
</script>