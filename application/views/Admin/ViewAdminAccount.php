<style>
    .btnad {
        border: 2px solid white;
        background-color: white;
    }

    .btnad:hover:not(.activebtn) {
        border-bottom: 2px solid lightgray;
    }

    .activebtn {
        border-bottom: 2px solid blue;
        color: blue;
    }

    .btn,
    .form-select,
    .form-control {
        box-shadow: none !important;
    }

    .closemodbtn,
    .addmodbtn {
        border: 0;
        height: 40px;
        margin-left: 10px;
        outline: none;
    }

    .addmodbtn:hover,
    .closemodbtn:hover {
        filter: brightness(95%);
    }

    .closemodbtn:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.1);
        border: 1px solid dod
    }

    .addmodbtn:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.1);
    }

    .addmodbtn {
        background-color: blue;
        color: white;

    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="row mx-5" style="width: 50rem">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('Admin/ManageAccount') ?>">View Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Accounts</li>
                    </ol>
                </nav>

                <div class="card card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <button class="btnad activebtn" id="curbt">Current Admin</button>
                            <button class="btnad ms-2" id="arcbtn">Archive</button>
                            <button class="btnad ms-2" id="histbtn">History</button>
                        </div>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replaceModal">New Account</button>
                    </div>

                    <hr>

                    <div class="currentad">
                        <table id="currendadmin" class="table table-striped" style="width:100%">
                            <colgroup>
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 5%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th class="text-center">Username</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user as $user) {
                                    $name = ucfirst($user['Lastname']) . ', ' . ucfirst($user['Firstname']) . ' ' . ucfirst($user['Middlename']);
                                ?>
                                    <tr>
                                        <td style="vertical-align: middle"><?= $name ?></td>
                                        <td style="vertical-align: middle"><?= $user['Email'] ?></td>
                                        <td style="vertical-align: middle"><?= $user['Contact'] ?></td>
                                        <td style="vertical-align: middle" class="text-center"><?= $user['Username'] ?></td>
                                        <td style="vertical-align: middle" class="clos">
                                            <button data-pass="<?= $user['Password'] ?>" data-aid="<?= $user['ID'] ?>" class="btn  btn-warning btn-sm rounded-pill" id="opchange" data-bs-toggle="modal" data-bs-target="#changepassModal"><i class="fa-solid fa-key"></i></button>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="archivead">
                        <table id="archiveadmin" class="table table-striped" style="width:100%">
                            <colgroup>
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 20%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th class="text-center">Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user2 as $use) {
                                    $name = ucfirst($use['Lastname']) . ', ' . ucfirst($use['Firstname']) . ' ' . ucfirst($use['Middlename']);
                                ?>
                                    <tr>
                                        <td style="vertical-align: middle"><?= $name ?></td>
                                        <td style="vertical-align: middle"><?= $use['Email'] ?></td>
                                        <td style="vertical-align: middle"><?= $use['Contact'] ?></td>
                                        <td style="vertical-align: middle" class="text-center"><?= $use['Username'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="historyad">
                        <table id="historyadmin" class="table table-striped" style="width:100%">
                            <colgroup>
                                <col span="1" style="width: 30%;">
                                <col span="1" style="width: 50%;">
                                <col span="1" style="width: 15%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $his = $this->db->query('SELECT * FROM admin_history')->result_array();
                                foreach ($his as $use) {
                                ?>
                                    <tr>
                                        <td style="vertical-align: middle"><?= $use['Name'] ?></td>
                                        <td style="vertical-align: middle"><?= $use['Action'] ?></td>
                                        <td style="vertical-align: middle"><?= date('F d, Y g:i a', strtotime($use['Action_date'])) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changepassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('AdminAuth/changeadminpass') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="ID" id="aid">
                    <div class="position-relative d-flex align-items-center">
                        <input required type="password" name="pass" id="pass1" class="form-control rounded-0" placeholder="Enter Password">
                        <i class="fas fa-eye position-absolute me-2 passeye" id="passtypechange1" style="right: 0; cursor: pointer"></i>
                    </div>
                    <div class="passerror"></div>
                    <button type="button" id="genpass1" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Password</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn rounded-0 btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0 btn-sm">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="replaceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex justify-content-between px-3 pt-3">
                <p class="mb-0 text-primary">Add Admin Account</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form action="<?= base_url('AdminAuth/addAdminAccount') ?>" method="post" id="formaddmin">
                <div class="row mx-2 gy-3">
                    <div class="col-lg-6">
                        <label for="">Firstname</label>
                        <input type="text" onkeydown="return alphaOnly(event)" name="firstname" id="firstn" class="form-control rounded-0" placeholder="Enter Firstname">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Lastname</label>

                        <input type="text" onkeydown="return alphaOnly(event)" name="lastname" id="lastn" class="form-control rounded-0" placeholder="Enter Lastname">
                    </div>

                    <div class="col-lg-6">
                        <label for="">Email</label>
                        <input type="text" id="email" name="email" class="form-control rounded-0" placeholder="example@email.com">

                    </div>
                    <div class="col-lg-6">
                        <label for="">Contact</label>
                        <input type="text" id="contact" onkeypress="return isNumber(event)" name="contact" class="form-control rounded-0" placeholder="09xxxxxxxxx">

                    </div>
                    <div class="col-lg-6">
                        <label for="">Username</label>
                        <input type="text" name="username" id="uname" class="form-control rounded-0" placeholder="Enter Username">
                        <button type="button" id="genid" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Username</button>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Password</label>
                        <div class="position-relative d-flex align-items-center">
                            <input type="password" name="pass" id="pass" class="form-control rounded-0" placeholder="Enter Password">
                            <i class="fas fa-eye position-absolute me-2 passeye" id="passtypechange" style="right: 0; cursor: pointer"></i>
                        </div>
                        <div class="passerror"></div>
                        <button type="button" id="genpass" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Password</button>

                    </div>

                </div>
                <div class="d-flex px-3 mt-2 justify-content-end mb-3">
                    <button class="closemodbtn" type="reset" id="closethis" data-bs-dismiss="modal" type="modal">Close</button>
                    <button class="addmodbtn" type="submit">Change</button>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fs-4 fa-check-double me-2"></i> Successfully change admin password.</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoasts align-items-center text-white bg-dark border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fs-4 fa-check-double me-2"></i> Account successfully updated.</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('addadmin_success')) {
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
if ($this->session->userdata('deladmin_success')) {
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
    $(document).ready(function() {


        $('#opchange').click(function() {
            var aid = $(this).data('aid');
            $('#aid').val(aid);
            $('#pass1').val($(this).data('pass'))
        })

        $('#formaddmin').submit(function() {
            if ($(this).valid()) {
                var c = confirm("Upon adding new account, the previous account will be moved to archive. Are you sure you want to continue?");
                return c; //you can just return c because it will be true or false
            }

        });

        $('.archivead').hide();
        $('.historyad').hide();

        $('#arcbtn').click(function() {
            $(this).addClass('activebtn');
            $('#curbt').removeClass('activebtn');
            $('#histbtn').removeClass('activebtn');

            $('.archivead').show();
            $('.currentad').hide();
            $('.historyad').hide();


        })
        $('#histbtn').click(function() {
            $(this).addClass('activebtn');
            $('#curbt').removeClass('activebtn');
            $('#arcbtn').removeClass('activebtn');
            $('.archivead').hide();
            $('.currentad').hide();
            $('.historyad').show();

        })

        $('#curbt').click(function() {
            $(this).addClass('activebtn');
            $('#histbtn').removeClass('activebtn');

            $('#arcbtn').removeClass('activebtn');
            $('.archivead').hide();
            $('.currentad').show();
            $('.historyad').hide();



        })

        var passtype1 = document.getElementById("pass1");
        $('#passtypechange1').click(function() {
            if (passtype1.type === "password") {
                $(this).removeClass('fas fa-eye');
                $(this).addClass('fas fa-eye-slash');
                passtype1.type = "text";
            } else {
                passtype1.type = "password";
                $(this).removeClass('fas fa-eye-slash');
                $(this).addClass('fas fa-eye');
            }
        });


        var passtype = document.getElementById("pass");
        $('#passtypechange').hide();
        $('#passtypechange').click(function() {
            if (passtype.type === "password") {
                $(this).removeClass('fas fa-eye');
                $(this).addClass('fas fa-eye-slash');
                passtype.type = "text";
            } else {
                passtype.type = "password";
                $(this).removeClass('fas fa-eye-slash');
                $(this).addClass('fas fa-eye');
            }
        });

        $('#genpass1').click(function() {
            $('#pass1').val(Math.random().toString(36).slice(-8))
            $('#passtypechange1').show();

        })

        $('#genpass').click(function() {
            $('#pass').val(Math.random().toString(36).slice(-8))
            $('#passtypechange').show();

        })
        $('#genid').click(function() {
            $('#uname').val(genid().split(' ').join('') + Math.floor(Math.random() * 90 + 10))
        })

        function genid() {
            var
                fname = document.getElementById('firstn').value,
                lname = document.getElementById('lastn').value,
                alias = (fname.substring(0, 1) + lname).toLowerCase();

            return alias;
        }

        var valdte = $('#formaddmin').validate({
            rules: {
                firstname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                lastname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                username: {
                    required: true,
                    remote: {
                        url: "<?= base_url('AdminAuth/checkadminusername') ?>",
                        type: "POST",
                        data: {
                            username: () => {
                                return $('#uname').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                email: {
                    required: true,
                    email: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                contact: {
                    required: true,
                    remote: {
                        url: "<?= base_url('AdminAuth/checkadmincontact') ?>",
                        type: "POST",
                        data: {
                            contact: () => {
                                return $('#contact').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                pass: {
                    required: true,
                    minlength: 6,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                }
            },
            messages: {
                firstname: errorMessage('Please enter a firstname'),
                lastname: errorMessage('Please enter a lastname'),
                username: {
                    required: errorMessage('Please enter a username'),
                    remote: errorMessage('Username already taken'),

                },
                email: {
                    required: errorMessage('Please enter an email'),
                    email: errorMessage('Invalid email address')
                },
                contact: {
                    required: errorMessage('Please enter a contact number'),
                    remote: errorMessage('Mobile number already exists')

                },
                pass: {
                    required: errorMessage('Please enter a password'),
                    minlength: errorMessage('Atleast 6 characters'),
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "pass") {
                    $(".passerror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }

        $('#currendadmin').DataTable();
        $('#archiveadmin').DataTable();
        $('#historyadmin').DataTable();

    });
</script>