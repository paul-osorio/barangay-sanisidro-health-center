<style>
    .lblback {
        color: darkgrey;
    }

    .lblback:hover {
        color: gray;
        cursor: pointer;
    }

    .lblback:active {
        transform: translateX(-3px)
    }

    .newprof {
        background-image: linear-gradient(to right, #005AE8, dodgerblue);
        border: 0;
        color: white;
        padding: 10px 20px 10px 20px;
        border-radius: 50px;
        outline: none;
    }

    .newprof .plusrot {
        transform: rotate(-90deg);
        transition: 1s;

    }

    .newprof:hover .plusrot {
        transform: rotate(90deg);
        transition: 1s;
    }

    .btn {
        box-shadow: none !important;
    }

    .newprof:active {
        transform: scale(0.95);
        box-shadow: 0px 4px 4px inset rgba(0, 0, 0, 0.20);

    }

    .titlemd {
        font-size: 18px;
    }

    .closemd {
        height: 30px;
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background-color: lightgray;
        color: gray;
        cursor: pointer;
    }

    .closemd:hover {
        background-color: rgba(0, 0, 0, 0.30);
        color: rgba(255, 255, 255)
    }

    .closemd:active {
        transform: scale(0.90);
    }

    .inpt {
        width: 100%;
        height: 40px;
        border-radius: 5px;
        border: 0;
        outline: none;
        text-indent: 5px;
    }

    .inpt:focus {
        border-width: 1px;
        border-style: solid;
        border-image: linear-gradient(to right, dodgerblue, orchid) 1;
    }



    .lm {
        background-color: white;
        border: 0;
        height: 30px;
    }

    .lm:hover .ellmenu {
        color: gray;
    }

    .lm:focus .ellmenu {
        color: gray;
    }


    .profcard:hover {
        cursor: pointer;
        box-shadow: 0 4px 4px rgba(0, 100, 255, 0.20);
    }

    .profcard:active {
        cursor: pointer;
        box-shadow: 0 2px 2px rgba(0, 100, 255, 0.20);
        transform: translateY(2px);
    }

    .keb {
        top: 5%;
        right: 2%;
        z-index: 99;
    }

    .btnst {
        border: 0;
        background-color: white;
        font-size: 12px;
        outline: none;

    }

    .btnst:hover {
        background-color: rgba(0, 0, 0, 0.05);

    }


    .btnfloat {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.10);
        border: 1px solid lightgray;
        width: 5rem;
        background-color: white;
        z-index: 99;
        right: -30px;
        transform: scale(0);
        transition: .2s;
        top: 0;
    }

    .newprof:disabled {
        background-image: linear-gradient(to right, #A5A5A5, #A5A5A5);
        color: lightgray;
        transition: none !important;
    }
</style>
<div class="cont" style="margin-top: 3.5rem">
    <div class="row mx-3">
        <div class="col-lg-12">
            <?php
            if ($this->session->flashdata('edit_success')) {
            ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show py-2 complete" role="alert">
                        <i class="fa-solid fa-check me-2 changecol"></i> A profile has been successfully updated.
                        <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="card card-body border-0" style="border-radius: 10px; box-shadow: 0 4px 4px rgba(0,0,0,0.10)">
                <div class="d-flex justify-content-between">
                    <label class="lblback fs-5" onclick="location.href='<?= base_url('P/HealthService') ?>'"><i class="fad fa-arrow-left"></i></label>
                    <label class="fs-5" style="color: #005AE8"><?= othersIcon(25, 25) ?>FOR OTHERS</label>
                    <label for=""></label>
                </div>
                <div class="row gy-3 mt-3">
                    <?php
                    foreach ($profile as $user) {
                        $today = date("Y/m/d");
                        $diff = date_diff(date_create($user['Birthday']), date_create($today));
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="position-relative">
                                <div class="card card-body profcard" onclick="location.href='<?= base_url('P/ForOthers2/' . $user['ID']) ?>'">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <div class="">
                                                <label for="" style="cursor: pointer" class="d-block"><?= $user['Firstname'] . ' ' . $user['Middlename'] . ' ' . $user['Lastname'] ?></label>
                                                <label for="" style="cursor: pointer" class="d-block">Age: <?= $diff->format('%y') ?></label>
                                                <label for="" style="cursor: pointer" class="d-block">Gender: <?= $user['Gender'] ?></label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="position-absolute keb">
                                    <div class="position-relative clos">
                                        <input type="text" value="<?= $user['Firstname'] ?>" id="fname" hidden>
                                        <input type="text" value="<?= $user['Lastname'] ?>" id="lname" hidden>
                                        <input type="text" value="<?= $user['Middlename'] ?>" id="mname" hidden>
                                        <input type="text" value="<?= $user['Gender'] ?>" id="gnder" hidden>
                                        <input type="text" value="<?= $user['Birthday'] ?>" id="bday" hidden>
                                        <input type="text" value="<?= $user['ID'] ?>" id="myd" hidden>


                                        <button class="lm"><i class="fa-solid fa-ellipsis-vertical ellmenu"></i></button>
                                        <div class="position-absolute btnfloat">
                                            <button class="btnst w-100 btned" data-bs-toggle="modal" data-bs-target="#editModal">Edit Details</button>
                                            <button class="text-danger btnst w-100" onclick="location.href='<?= base_url('PatientAuth/deleteotheruser/' . $user['ID'] . '/' . $user['Type']) ?>'">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                </div>

                <div class="mt-2">
                    <?php
                    $uid = $this->session->userdata('patient_id');

                    $res = $this->db->query('SELECT * FROM otheraccount WHERE PatientID=' . $uid . ' AND Type="others"');

                    ?>
                    <button class="newprof" data-bs-toggle="modal" data-bs-target="#exampleModal" <?= ($res->num_rows() >= 5) ? 'disabled' : '' ?>><i class="plusrot fas fa-plus"></i> Add New Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0" style="background-color: rgba(245,245,245)">
            <div class="p-3 d-flex justify-content-between">
                <label class="titlemd">Add New Profile</label>
                <label class="closemd" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></label>
            </div>
            <form action="<?= base_url('PatientAuth/addprofile') ?>" method="POST" id="addprofileform">
                <div class="modal-body">
                    <div class="row gx-2 gy-3">
                        <input type="text" value="others" name="type" hidden>
                        <div class="col-lg-4">
                            <input type="text" onkeydown="return alphaOnly(event)" name="firstname" id="fnameadd" placeholder="Firstname" class="inpt">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" onkeydown="return alphaOnly(event)" name="middlename" placeholder="Middlename" class="inpt">

                        </div>
                        <div class="col-lg-4">
                            <input type="text" onkeydown="return alphaOnly(event)" name="lastname" id="lnameadd" placeholder="Lastname" class="inpt">
                        </div>

                        <div class="col-lg-6">
                            <input type="text" name="birthday" id="pbday" placeholder="Date of Birth" class="inpt">

                        </div>
                        <div class="col-lg-6">
                            <select name="gender" id="" class="inpt">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill border-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill border-0">Add Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0" style="background-color: rgba(245,245,245)">
            <div class="p-3 d-flex justify-content-between">
                <label class="titlemd">Update Profile</label>
                <label class="closemd" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></label>
            </div>
            <form action="<?= base_url('PatientAuth/updateprofile') ?>" method="POST" id="updateformprofile">
                <div class="modal-body">
                    <div class="row gx-2 gy-3">
                        <input type="text" name="type" value="others" hidden>

                        <input type="text" name="id" id="mmyd" hidden>
                        <div class="col-lg-4">
                            <input type="text" name="firstname" onkeydown="return alphaOnly(event)" id="ffname" placeholder="Firstname" class="inpt">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="middlename" onkeydown="return alphaOnly(event)" id="mmname" placeholder="Middlename" class="inpt">

                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="lastname" onkeydown="return alphaOnly(event)" id="llname" placeholder="Lastname" class="inpt">
                        </div>

                        <div class="col-lg-6">
                            <input type="text" name="birthday" id="bbday" placeholder="Date of Birth" class="inpt">

                        </div>
                        <div class="col-lg-6">
                            <select name="gender" id="ggnder" class="inpt">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill border-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill border-0">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast delsucc align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully delete a pedia profile</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->flashdata('deletesuccess')) {
?>
    <script>
        $(document).ready(function() {
            $('.delsucc').toast('show')
        })
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {
        $('#pbday').datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            yearRange: "-90:+0"


        });
        $('#bbday').datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            yearRange: "-90:+0"

        });



        var addform = $('#addprofileform').validate({
            ignore: [],
            rules: {
                firstname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                lastname: {
                    required: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/otherprofile') ?>",
                        type: "POST",
                        data: {
                            fname: () => {
                                return $('#fnameadd').val();
                            },
                            lname: () => {
                                return $('#lnameadd').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }


                },
                birthday: "required",
                gender: "required",

            },
            messages: {
                firstname: errorMessage('Please type a firstname'),
                lastname: {
                    required: errorMessage('Please type a lastname'),
                    remote: errorMessage('Profile already exists'),
                },
                birthday: errorMessage('Please select a birthday'),
                gender: errorMessage('Please select a gender'),
            }
        })
        var upform = $('#updateformprofile').validate({
            ignore: [],
            rules: {
                firstname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                lastname: {
                    required: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/pediaprofile') ?>",
                        type: "POST",
                        data: {
                            fname: () => {
                                return $('#ffname').val();
                            },
                            lname: () => {
                                return $('#llname').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                birthday: "required",
                gender: "required",

            },
            messages: {
                firstname: errorMessage('Please type a firstname'),
                lastname: {
                    required: errorMessage('Please type a lastname'),
                    remote: errorMessage('Profile already exists'),
                },
                birthday: errorMessage('Please select a birthday'),
                gender: errorMessage('Please select a gender'),
            }
        })

        $('.newprof').click(function() {
            addform.resetForm();
            $("#addprofileform")[0].reset();
        })
        $('.btned').click(function() {
            upform.resetForm();
        })


    })



















    $('.lm').click(function() {
        $(this).closest(".clos").find(".btnfloat").css({
            transform: 'scale(1)',
            transition: '.2s',
            top: '100%',
        });

    })
    $('.btned').click(function() {
        var firstname = $(this).closest(".clos").find("#fname").val();
        var lastname = $(this).closest(".clos").find("#lname").val();
        var middlename = $(this).closest(".clos").find("#mname").val();
        var gender = $(this).closest(".clos").find("#gnder").val();
        var birthday = $(this).closest(".clos").find("#bday").val();
        var myd = $(this).closest(".clos").find("#myd").val();

        $('#ffname').val(firstname)
        $('#mmname').val(middlename)
        $('#llname').val(lastname)
        $('#bbday').val(birthday)
        $('#ggnder').val(gender)
        $('#mmyd').val(myd)


    })
    $(document).mouseup(function(e) {



        var container = $(".btnfloat");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.css({
                transform: 'scale(0)',
                transition: '.2s',
                top: '0',
            });
        }
    });

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>