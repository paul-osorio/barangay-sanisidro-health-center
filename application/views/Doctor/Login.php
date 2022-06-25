<style>
    body {
        overflow: hidden;
    }

    .form-control {
        box-shadow: none !important;
    }

    .lbtn {
        background-color: #2F4A8A;
        border: 0;
        border-radius: 3px;
        padding-top: 13px;
        padding-bottom: 13px;
        padding-left: 15px;
        color: white;
        font-size: 18px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .lbtn:hover {
        background-color: #243B74;
    }

    .lbtn:active {
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.25);
        transform: translateY(3px);
    }

    .imgb {
        top: 25px;
    }
</style>
<nav class="navbar navbar-light bg-white my-0 py-1 ps-0" style="z-index: 3;box-shadow: 0px 0px 9px -3px rgba(0, 0, 0, 0.25);">
    <div class="ms-4">
        <img src="<?= base_url('assets/images/logosanisi.png') ?>" height="50" width="50" alt="">

        <label style="color: #2F4A8A;" class="fw-bold">
            BARANGAY SAN ISIDRO HEALTH CENTER
        </label>
    </div>
</nav>


<div class="row g-0">
    <div class="col-lg-6 mt-2">
        <div class="d-flex justify-content-center mt-5">
            <div style="width: 20rem">
                <div class="">
                    <div class="d-flex justify-content-center">

                        <?= doctorloginIcon(80, 80) ?>
                    </div>
                    <p class="text-center text-dark fs-5">Medical Staff Login</p>

                </div>
                <form action="<?= base_url('DoctorAuth/login') ?>" method="POST" id="login">
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" class="form-control" value="<?= $this->session->flashdata('email') ?>" name="email" id="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="emailerror"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password" placeholder="name@example.com">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="passworderror">
                            <?= loginError($this->session->flashdata('password_error'), 'Wrong Password') ?>
                        </div>
                    </div>
                    <button type="submit" class="lbtn d-flex justify-content-between w-100">
                        Sign In <?= arrowright(25, 25) ?>
                    </button>
                </form>

                <p class="text-secondary text-center mt-3" style="font-size: 14px;">or login as</p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary rounded-pill btn-sm px-4" onclick="location.href='<?= base_url('P/Login') ?>'">Patient</button>
                </div>
            </div>
        </div>


    </div>
    <div class="col-lg-6">
        <div class="d-flex justify-content-center position-relative">
            <img src="<?= base_url('assets/images/Doctor_Login.png') ?>" class="imgb position-absolute" height="550" alt="">
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('DoctorAuth/checkemailLogin') ?>",
                        type: "POST",
                        data: {
                            email: () => {
                                return $('#email').val();
                            }
                        }
                    }
                },
                password: "required",
            },
            messages: {
                email: {
                    required: errorMessage('Please enter your email address'),
                    email: errorMessage('Invalid email address'),
                    remote: errorMessage('Email not found'),
                },
                password: errorMessage('Please enter your password')
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "email") {
                    $(".emailerror").html(error);
                } else if (element.attr("name") == "password") {
                    $(".passworderror").html(error);

                }
            },
        })
    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>