<style>
    body {
        overflow: hidden;
    }

    .imgb {
        left: 15px;
    }

    .lbtn {
        background-color: #2F4A8A;
        border: 0;
        border-radius: 3px;
        padding-top: 8px;
        padding-bottom: 8px;
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

    .form-control,
    .form-select {
        box-shadow: none !important;
    }

    .scrollable::-webkit-scrollbar {
        width: 5px;
        background-color: lightgray;
    }

    .scrollable::-webkit-scrollbar-thumb {
        background-color: gray;

    }
</style>

<nav class="navbar navbar-light bg-white my-0 py-1 ps-0" style="z-index: 3;box-shadow: 0px 0px 9px -3px rgba(0, 0, 0, 0.25);">
    <div class="ms-4">
        <?= healthIcon1(50, 50) ?>
        <label style="color: #2F4A8A;" class="fw-bold">
            BARANGAY SAN ISIDRO HEALTH CENTER
        </label>
    </div>
</nav>
<form action="<?= base_url('PatientAuth/register') ?>" id="register" method="POST" enctype="multipart/form-data">
    <div class="row g-0">
        <div class="col-lg-7">
            <div class="d-flex justify-content-center position-relative">
                <img src="<?= base_url('assets/images/Patient_Register.png') ?>" class="imgb position-absolute" height="540" alt="">
            </div>
        </div>
        <div class="col-lg-5 px-3">
            <div class="scrollable" style="overflow:auto; height: 35rem">
                <div class="row g-2 me-4 mb-2">
                    <h5 class="mt-5">SIGN UP</h5>
                    <div class="col-lg-12">
                        <input type="hidden" name="numberid" id="idnumber1">
                        <label for="">Barangay ID Number</label>
                        <input type="text" name="idnumber" maxlength="6" id="idnumber" onkeypress="return isNumber(event)" class="w-50 form-control form-control-sm">
                        <div class="erroridnumber"></div>
                    </div>

                    <div class="col-lg-4">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middlename</label>
                        <input type="text" name="middlename" id="middlename" class="form-control form-control-sm" readonly>
                    </div>

                    <div class="col-lg-8">
                        <label for="">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control form-control-sm">
                    </div>

                    <div class="col-lg-4">
                        <label for="">Date of Birth</label>
                        <input type="text" id="dob" name="dob" placeholder="Date of Birth" class="form-control form-control-sm">
                    </div>

                    <div class="col-lg-8">
                        <label for="">Mobile No.</label>
                        <input type="text" name="mobile" maxlength="11" onkeypress="return isNumber(event)" id="mobile" class="form-control form-control-sm">
                    </div>

                    <div class="col-lg-4">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-select form-select-sm">
                            <option value="" selected disabled>Choose a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <label for="">Address</label>
                        <input type="text" name="address" id="address" class="form-control  form-control-sm" readonly>
                    </div>

                    <div class="col-lg-6">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control form-control-sm">
                    </div>

                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between mt-2">
                            <p>Already have an account? <a href="<?= base_url('P/Login') ?>" class="text-decoration-none">Sign In</a></p>
                            <button type="submit" class="lbtn d-flex justify-content-between" style="width: 10rem">
                                Sign Up <?= arrowright(25, 25) ?>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(() => {
        $('#dob').datepicker({
            maxDate: 0,
            changeMonth: true,
            changeYear: true,
            yearRange: "-70:-18"

        })

        $('#idnumber').keyup(function() {
            $('#idnumber1').val($(this).val());
        })

        $('#register').validate({
            ignore: [],
            rules: {
                numberid: {
                    remote: {
                        url: "<?= base_url('PatientAuth/checkidexist') ?>",
                        type: "POST",
                        data: {
                            id: function(data) {
                                return $('#idnumber1').val()
                            }
                        }
                    }
                },
                idnumber: {
                    required: true,
                    minlength: 6,
                    remote: {
                        url: "<?= base_url('PatientAuth/checkAccount') ?>",
                        type: "post",
                        data: {
                            id: function(data) {
                                return $('#idnumber').val()
                            }
                        }
                    },
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/checkemail') ?>",
                        type: "post",
                        data: {
                            email: function() {
                                return $('#email').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }


                },
                dob: "required",
                mobile: {
                    required: true,
                    minlength: 11,
                    maxlength: 11,
                    number: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/checkmobile') ?>",
                        type: "post",
                        data: {
                            mobile: () => {
                                return $('#mobile').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                gender: "required",
                password: {
                    required: true,
                    minlength: 6,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                confirmPassword: {
                    required: true,
                    minlength: 6,
                    equalTo: '#password',
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
            },
            messages: {
                numberid: {
                    remote: errorMessage('ID number does not exist'),
                    // check: errorMessage('ID number does not exist')
                },
                idnumber: {
                    required: errorMessage('Please enter your ID number'),
                    minlength: errorMessage('Please input 6 digit number'),
                    remote: errorMessage('This resident is already registered'),
                    // check: errorMessage('ID number does not exist')
                },
                email: {
                    required: errorMessage('Please enter your email address'),
                    email: errorMessage('Invalid email address'),
                    remote: errorMessage('Email already exists')
                },
                dob: errorMessage('Enter your date of birth'),
                mobile: {
                    required: errorMessage('Please enter your mobile number'),
                    minlength: errorMessage('Please enter a valid number'),
                    maxlength: errorMessage('Please enter a valid number'),
                    number: errorMessage('Please enter a valid number'),
                    remote: errorMessage('Mobile number already exists')

                },
                gender: errorMessage('Please select a gender'),
                password: {
                    required: errorMessage('Please enter a password'),
                    minlength: errorMessage('At least 6 characters long'),
                },
                confirmPassword: {
                    required: errorMessage('Please confirm your password'),
                    minlength: errorMessage('At least 6 characters long'),
                    equalTo: errorMessage('Password do not match')
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "numberid") {
                    $('.erroridnumber').html(error);
                } else if (element.attr('name') == "idnumber") {
                    $('.erroridnumber').html(error);
                } else {
                    error.insertAfter(element);
                }
            },
        })

        $('#idnumber').keyup(function() {
            if ($(this).val() !== "") {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('PatientAuth/fillRegister') ?>",
                    data: {
                        idnumber: $(this).val()
                    },
                    success: function(res) {
                        if (res === 'false') {
                            $('#firstname').val("")
                            $('#lastname').val("")
                            $('#middlename').val("")
                            $('#address').val("")
                        }
                        var user = JSON.parse(res);
                        $('#firstname').val(user.firstname)
                        $('#lastname').val(user.lastname)
                        $('#middlename').val(user.middlename)
                        $('#address').val(user.address)
                    }
                })
            } else {
                $('#firstname').val("")
                $('#lastname').val("")
                $('#middlename').val("")
                $('#address').val("")
            }
        })
    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>