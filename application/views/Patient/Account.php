<style>
    .bgcard {
        height: 10rem;
        background-image: url("<?= base_url('assets/images/lightteal.jpg') ?>");
        width: 100%;
        display: flex;
        justify-content: center;
        position: relative;
    }

    .profcard {
        top: 6rem;
        border: 0 !important;
        border-radius: 3px !important;
        width: 45rem;
        min-height: 27rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) !important;
    }

    .act {
        color: white !important;
        background-color: dodgerblue !important;
    }

    .upbtn {
        border: 1px solid gray;
        background-color: white;
        color: black;
        padding: 3px 10px 3px 10px;
        border-radius: 40px;
        outline: none;
        font-size: 12px;

    }

    .upbtn:hover {
        background-color: rgba(245, 245, 245);

    }

    .upbtn:active {
        transform: scale(0.98);
        box-shadow: 0px 3px 3px inset rgba(0, 0, 0, 0.15);

    }

    #perf,
    #passbtn {
        height: 40px !important;
        border: 0;
        color: black;
        outline: none;
        border-radius: 5px;
    }

    .form-control,
    .form-select,
    .btn {
        box-shadow: none !important;
    }


    .img {
        left: 0;
        right: 0;
        top: -35%;
        object-fit: cover;
        box-shadow: 0 2px 4px lightblue;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        height: 100px;
        width: 100px;
    }

    .btnupim {
        height: 100px;
        width: 100px;
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
    }

    .btnupim:hover {
        opacity: 1 !important;
    }

    .camecolor {}
</style>
<div class="cont mb-3" style="margin-top: 2.8rem">
    <div class="bgcard">
        <div class="card card-body py-0 px-0 position-absolute profcard">
            <div class="">
                <div class="row gx-0">
                    <div class="col-lg-4" style="border-right: 1px solid lightgray; height: 27rem">
                        <?php
                        $image = '';
                        if ($user['Middlename'] === "" || $user['Middlename'] === null) {
                            $middlename = "";
                        } else {
                            $middlename = $user['Middlename'][0] . '.';
                        }
                        $name = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $middlename;
                        if ($user['Profile'] === "" || $user['Profile'] === null) {
                            $image = base_url('assets/images/profile.png');
                        } else {
                            $image = base_url('uploads/Patient/Profile/' . $user['Profile']);
                        }
                        ?>

                        <div class="mt-4 pe-2">
                            <div class="d-flex justify-content-center position-relative">
                                <div id="uploadprofile" class=" btnupim d-flex h-100 align-items-center justify-content-center position-absolute">
                                    <?= cameraAdd(30, 30, 'camecolor') ?>
                                </div>
                                <img src="<?= $image ?>" id="dp" class="img rounded-circle" alt="">
                            </div>

                            <p class="text-center mt-2" style="font-size: 17px;font-weight: 500"><?= $name ?></p>
                        </div>
                        <div class="px-2">
                            <button class="act w-100" id="perf">Personal Information</button>
                        </div>
                        <div class="px-2 mt-2">
                            <button class="w-100" id="passbtn">Password</button>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="p-3">
                            <p class="fs-5" style="font-weight: 350">Personal Information</p>
                            <form action="<?= base_url('PatientAuth/changepass') ?>" method="POST" id="changepass">

                                <div class="d-flex justify-content-center showsec align-items-center">
                                    <div class="showsec mt-4" style="width: 15rem">
                                        <div class="mb-2">
                                            <label for="" style="font-size: 15px">Old Password</label>
                                            <input type="password" name="oldpass" id="oldpass" class="form-control form-control-sm rounded-0">
                                        </div>
                                        <div class="mb-2">
                                            <label for="" style="font-size: 15px">New Password</label>
                                            <input type="password" id="newpass" name="newpass" class="form-control form-control-sm rounded-0">
                                        </div>
                                        <div class="">
                                            <label for="" style="font-size: 15px">Confirm New Password</label>
                                            <input type="password" name="pass" class="form-control form-control-sm rounded-0">
                                        </div>
                                        <div class=" mt-3">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary btn-sm" type="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <form action="<?= base_url('PatientAuth/editAccount') ?>" method="POST" id="editForm" enctype="multipart/form-data">
                                <input type="file" style="opacity: 0; z-index: -3" name="profilepic" id="profilepic" class="position-absolute">
                                <input type="text" value="<?= $user['Profile'] ?>" name="prof" hidden>
                                <div class="row gx-2 gy-3 showfirst">
                                    <div class="col-lg-12">
                                        <p class="mb-0"><label for="" class="fw-bold" style="font-size: 15px">Barangay ID Number:</label> <?= $user['ID_number'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="" style="font-size: 15px">Firstname</label>
                                        <input type="text" readonly value="<?= $user['Firstname'] ?>" name="firstname" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="" style="font-size: 15px">Lastname</label>
                                        <input type="text" readonly value="<?= $user['Lastname'] ?>" name="lastname" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="" style="font-size: 15px">Middlename</label>
                                        <input type="text" readonly value="<?= $user['Middlename'] ?>" name="middlename" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Email</label>
                                        <input type="text" value="<?= $user['Email'] ?>" name="email" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Phone</label>
                                        <input type="text" onkeypress="return isNumber(event)" maxlength="11" name="contact" value="<?= $user['Contact'] ?>" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Gender</label>
                                        <select disabled class="form-select form-select-sm rounded-0" name="gender">
                                            <option value="Male" <?= ($user['Gender'] === "Male") ? "selected" : "" ?>>Male</option>
                                            <option value="Female" <?= ($user['Gender'] === "Female") ? "selected" : "" ?>>Female</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Birthday</label>
                                        <input type="text" value="<?= date('F d, Y', strtotime($user['Birthday'])) ?>" readonly name="dob" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="">Address</label>
                                        <input type="text" value="<?= $user['Address'] ?>" id="address" name="address" class="form-control form-control-sm rounded-0">
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-sm " type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fa-check-double fs-4 me-2"></i> Your password has been changed successfully</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoasts align-items-center text-white bg-dark border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fa-check-double fs-4 me-2"></i> Your account has been successfully updated</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php
if ($this->session->userdata('edit_success')) {
?>
    <script>
        $(document).ready(function() {
            $('.successtoasts').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('changepass_success')) {
?>
    <script>
        $(document).ready(function() {
            $('.successtoast').toast('show')
        })
    </script>
<?php
}
?>




<script>
    $(document).ready(() => {
        $('#uploadprofile').click(() => {
            $('#profilepic').click();

            $("#profilepic").change(() => {
                var blah = document.querySelector("#dp");
                var imgInp = document.querySelector("#profilepic");
                const [file] = imgInp.files;
                if (file) {
                    blah.src = URL.createObjectURL(file);
                }
            });
        })
        $('#changepass').validate({
            rules: {
                oldpass: {
                    required: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/checkpass') ?>",
                        type: "POST",
                        data: {
                            password: () => {
                                return $('#oldpass').val();
                            }
                        }
                    }
                },
                newpass: {
                    required: true,
                    minlength: 6,
                },
                pass: {
                    required: true,
                    minlength: 6,
                    equalTo: '#newpass'
                }
            },
            messages: {
                oldpass: {
                    required: errorMessage('Please input your old password'),
                    remote: errorMessage('Old password does not match')
                },
                newpass: {
                    required: errorMessage('Please input your new password'),
                    minlength: errorMessage('Please input at least 6 character')
                },
                pass: {
                    required: errorMessage('Please input your new password'),
                    minlength: errorMessage('Please input at least 6 character'),
                    equalTo: errorMessage('Password does not match')
                }
            }
        })
        $('#editForm').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                contact: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                email: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                address: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                dob: "required",
            },
            messages: {
                firstname: errorMessage('Firstname cannot be empty'),
                lastname: errorMessage('Lastname cannot be empty'),
                email: errorMessage('Email Address cannot be empty'),
                address: errorMessage('Address cannot be empty'),
                contact: errorMessage('Contact cannot be empty'),
                dob: errorMessage('Date of Birth cannot be empty'),
            }
        })
    })
    $(document).ready(function() {
        $('.showsec').hide()

        $('#passbtn').click(function() {
            $(this).addClass('act');
            $('#perf').removeClass('act');
            $('.showsec').show()
            $('.showfirst').hide()
            $('#uploadprofile').hide()
        })

        $('#perf').click(function() {
            $(this).addClass('act');
            $('#passbtn').removeClass('act');
            $('.showsec').hide()
            $('#uploadprofile').show()
            $('.showfirst').show()

        })
    })


    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>