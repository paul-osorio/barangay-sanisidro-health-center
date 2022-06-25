<style>
    .form-control,
    .btn,
    .form-select,
    .btn-close {
        box-shadow: none !important;
    }

    .closemodbtn,
    .addmodbtn {
        border: 0;
        height: 40px;
        width: 60px;
        margin-left: 10px;
        outline: none;
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

    .twobtn {
        border: 1px solid gray;
        border-radius: 50%;
    }

    .twobtn:hover {
        transform: scale(1.05);
    }

    .twobtn:active {
        transform: scale(1);
    }

    .passeye:hover {
        color: rgba(0, 0, 0, 0.5);
    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="mb-4" style="width: 50rem">
            <div class="card card-body border" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1)">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-primary">Manage Admin Account</p>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Update Account</button>
                </div>
                <hr>
                <table id="admintable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $user) {
                        ?>
                            <tr>
                                <td><?= $user['Firstname'] ?></td>
                                <td><?= $user['Lastname'] ?></td>
                                <td><?= $user['Email'] ?></td>
                                <td><?= $user['Contact'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">

                                        <button id="editbt" data-id="<?= $user['ID'] ?>" data-contact="<?= $user['Contact'] ?>" data-email="<?= $user['Email'] ?>" data-lastname="<?= $user['Lastname'] ?>" data-firstname="<?= $user['Firstname'] ?>" class="twobtn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fad fa-pencil-alt"></i></button>
                                        <button class="twobtn ms-2 text-danger" onclick="if (confirm('Delete selected item?')){location.href='<?= base_url('AdminAuth/deleteAdminAccount/' . $user['ID']) ?>';}else{event.stopPropagation(); event.preventDefault();};"><i class="fad fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" name="firstname" id="firstn" class="form-control rounded-0" placeholder="Enter Firstname">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Lastname</label>

                        <input type="text" name="lastname" id="lastn" class="form-control rounded-0" placeholder="Enter Lastname">
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
                        <input type="text" readonly name="username" id="uname" class="form-control rounded-0" placeholder="Enter Username">
                        <button type="button" id="genid" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Username</button>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Password</label>
                        <div class="position-relative d-flex align-items-center">
                            <input type="password" readonly name="pass" id="pass" class="form-control rounded-0" placeholder="Enter Password">
                            <i class="fas fa-eye position-absolute me-2 passeye" id="passtypechange" style="right: 0; cursor: pointer"></i>
                            <!-- <i class="fas fa-eye-slash me-2 position-absolute passeye" id="hidepass" style="right: 0; cursor: pointer"></i> -->
                        </div>
                        <button type="button" id="genpass" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Password</button>

                    </div>

                </div>
                <div class="d-flex px-3 mt-2 justify-content-end mb-3">
                    <button class="closemodbtn" type="reset" id="closethis" data-bs-dismiss="modal" type="modal">Close</button>
                    <button class="addmodbtn" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex justify-content-between px-3 pt-3">
                <p class="mb-0 text-primary">Add Admin Account</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form action="<?= base_url('AdminAuth/updateAdminAcc') ?>" method="post" id="formupdate">
                <div class="row mx-2 gy-3">
                    <input type="hidden" name="uID" id="uID">
                    <div class="col-lg-6">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" id="fname" class="form-control rounded-0" placeholder="Enter Firstname">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Lastname</label>

                        <input type="text" name="lastname" id="lname" class="form-control rounded-0" placeholder="Enter Lastname">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Username</label>

                        <input type="text" name="username" id="unam" class="form-control rounded-0" placeholder="Enter Username">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Contact</label>

                        <input type="text" id="cnt" onkeypress="return isNumber(event)" name="contact" class="form-control rounded-0" placeholder="09xxxxxxxxx">
                    </div>

                </div>
                <div class="d-flex px-3 mt-2 justify-content-end mb-3">
                    <button class="closemodbtn" type="reset" id="closethis2" data-bs-dismiss="modal" type="modal">Close</button>
                    <button class="addmodbtn" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast addadmintoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> Successfully added a new admin account</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast updateadmintoast align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> Successfully updated an admin account</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast deladmintoast align-items-center text-white bg-dark border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> An admin account was successfully deleted</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->flashdata('updateadmin_success')) {
?>
    <script>
        $(document).ready(function() {
            $('.updateadmintoast').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->flashdata('addadmin_success')) {
?>
    <script>
        $(document).ready(function() {
            $('.addadmintoast').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->flashdata('deladmin_success')) {
?>
    <script>
        $(document).ready(function() {
            $('.deladmintoast').toast('show')
        })
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {

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




        $('#admintable').DataTable();
        var base_url = window.location.origin;

        function show_confirm() {
            var r = confirm("Wait! Would you like check out yahoo?");
            if (r == true) {
                location.href = base_url + '';
            } else {
                window.close();
            }
        }

        var valdte = $('#formaddmin').validate({
            rules: {
                firstname: "required",
                lastname: "required",
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
                    }

                },
                pass: {
                    required: true,
                    minlength: 6,
                },
                confirmpass: {
                    required: true,
                    minlength: 6,
                    equalTo: '#pass',
                }
            },
            messages: {
                firstname: errorMessage('Please enter a firstname'),
                lastname: errorMessage('Please enter a lastname'),
                username: {
                    required: errorMessage('Please enter a username'),
                    remote: errorMessage('Username already taken'),

                },
                contact: {
                    required: errorMessage('Please enter a contact number'),
                    remote: errorMessage('Mobile number already exists')

                },
                pass: {
                    required: errorMessage('Please enter a password'),
                    minlength: errorMessage('Atleast 6 characters'),
                },
                confirmpass: {
                    required: errorMessage('Please confirm password'),
                    minlength: errorMessage('Atleast 6 characters'),
                    equalTo: errorMessage('Password do not match'),
                }
            }
        })


        var valida = $('#formupdate').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    remote: {
                        url: "<?= base_url('AdminAuth/checkadminusername2') ?>",
                        type: "POST",
                        data: {
                            username: () => {
                                return $('#unam').val();
                            },
                            myid: () => {
                                return $('#uID').val();
                            }
                        }
                    }

                },
                contact: {
                    required: true,
                    remote: {
                        url: "<?= base_url('AdminAuth/checkadmincontact2') ?>",
                        type: "POST",
                        data: {
                            contact: () => {
                                return $('#cnt').val();
                            },
                            myid: () => {
                                return $('#uID').val();
                            }
                        }
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
                contact: {
                    required: errorMessage('Please enter a contact number'),
                    remote: errorMessage('Mobile number already exists')

                },

            }
        })

        $('#closethis2').click(function() {
            valida.resetForm();
        })


        $('#closethis').click(function() {
            valdte.resetForm();
        })

        $(document).on('click', '#editbt', function() {
            var fname = $(this).data('firstname');
            var lname = $(this).data('lastname');
            var email = $(this).data('email');
            var contact = $(this).data('contact');
            var uid = $(this).data('id');
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#unam').val(email);
            $('#cnt').val(contact);
            $('#uID').val(uid);
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    });
</script>