<style>
    .profile {
        height: 100px;
        width: 100px;
        object-fit: cover;
        border: 5px solid white;
        border-radius: 50%;
        bottom: -50px;
    }

    .cardprof {
        border: 1px solid lightgray;
        background-color: white;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);

    }

    .cardprof:hover {
        box-shadow: 0 4px 4px rgba(50, 0, 250, 0.4);

    }

    .topcol {
        background-image: url("<?= base_url('assets/images/bgpaper.jpg') ?>");
        background-size: cover;
        height: 6rem;
    }

    #viewall {
        border: 0;
        background-color: rgba(140, 0, 255);
        padding: 5px 10px 5px 10px;
        color: white;
        font-size: 14px;
    }


    #viewarchive {
        border: 0;
        background-color: rgba(20, 100, 255);
        padding: 5px 10px 5px 10px;
        color: white;
        font-size: 14px;
    }

    #viewarchive:hover {
        box-shadow: 0 4px 2px rgba(0, 0, 0, 0.2);
    }

    #viewarchive:active {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);

        transform: scale(0.98);
    }

    #viewmain {
        border: 0;
        background-color: rgba(20, 120, 55);
        padding: 5px 10px 5px 10px;
        color: white;
        font-size: 14px;
    }

    #viewmain:hover {
        box-shadow: 0 4px 2px rgba(0, 0, 0, 0.2);
    }

    #viewmain:active {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);

        transform: scale(0.98);
    }



    #viewall:hover {
        box-shadow: 0 4px 2px rgba(0, 0, 0, 0.2);
    }

    #viewall:active {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);

        transform: scale(0.98);
    }

    .cardtitle {
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
    }


    .delic:hover,
    .editic:hover,
    .urlic:hover {
        transform: scale(1.05);
        cursor: pointer;
    }


    .delic,
    .editic,
    .urlic {
        text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);

    }

    .delic:active,
    .editic:active,
    .urlic:active {
        transform: scale(0.95);
    }

    .btcancel,
    .btdelete,
    .btsuccess {
        color: white;
        outline: 0;
        border: 0;
        border-radius: 5px;
        height: 35px;
        width: 80px;
    }

    .btcancel {
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
    }

    .btcancel:hover {
        background-color: rgba(0, 0, 0, 0.5);

    }

    .btcancel:active {
        transform: scale(0.97);
    }

    .btdelete {
        background-color: rgba(255, 50, 0);
    }

    .btsuccess {
        background-color: rgba(55, 150, 0);

    }

    .radiobtn {
        opacity: 0;
        position: absolute;
    }

    .radiolbl {
        border: 1px solid gray;
        width: 100%;
        padding: 10px 0 10px 10px;
        cursor: pointer;
        position: relative;

    }

    .radiolbl:after {
        font-family: "Font Awesome 5 Pro";
        content: "\f111";
        position: absolute;
        right: 10px;
    }

    .radiobtn:checked~.radiolbl {
        background-color: darkblue;
        color: white;

    }

    .radiobtn:checked~.radiolbl:after {
        content: "\f058";


    }

    .form-control,
    .btn,
    .btn-close {
        box-shadow: none !important;
    }
</style>
<div class="conta" style="margin-top: 3.5rem">

    <div class="row mx-5">
        <div class="col-lg-12">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('Admin/ManageAccount') ?>">View Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Medical Staff Accounts</li>
                    </ol>
                </nav>
                <div class="d-flex">
                    <button id="viewmain" class="me-2">Active</button>

                    <button id="viewarchive" class="me-2">Archived</button>
                    <?php
                    if (!$this->session->userdata('isSuperAdmin')) {
                    ?>
                        <button id="viewall" class="me-2" onclick="location.href='<?= base_url('Admin/AddAccounts') ?>'">Add New Account</button>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="" id="mcard">
                <div class="row gy-3">
                    <?php
                    $resact = $this->db->query('SELECT * FROM doctor WHERE status="active" ORDER BY ID DESC');
                    if ($resact->num_rows() > 0) {
                    ?>
                        <div class="col-lg-12">
                            <p class="mb-0 text-secondary"> Showing active medical staff account</p>
                        </div>
                        <?php
                        foreach ($resact->result_array() as $med) {
                            $fullname = $med['Lastname'] . ', ' . $med['Firstname'] . ' ' . $med['Middlename'];
                            switch ($med['Medical']) {
                                case 'midwife':
                                    $txtcolor = '#CC8899';
                                    break;
                                case 'dentist':
                                    $txtcolor = '#26580F';
                                    break;
                                case 'nurse':
                                    $txtcolor = '#017C8F';
                                    break;
                                default:
                                    $txtcolor = '#017C8F';
                            }

                        ?>
                            <div class="col-lg-4">

                                <div class="cardprof">
                                    <div class="topcol d-flex justify-content-center position-relative">
                                        <img class="profile position-absolute" src="<?= base_url('uploads/Doctor/' . $med['Picture']) ?>" alt="">
                                    </div>
                                    <div class="mt-5">
                                        <p class="mb-0 text-center"><?= $fullname ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Email'] ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Contact'] ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Gender'] ?></p>

                                        <div class="d-flex justify-content-center my-2">
                                            <div class="px-3 rounded-pill" style="background-color:<?= $txtcolor ?>">
                                                <p class="text-center mb-0" style="color: white;font-size: 14px"><?= ucfirst($med['Medical']) ?></p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between  px-3 pb-3 pt-2 clos">
                                            <div class="">
                                                <?php
                                                $scheddoc = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $med['ID'])->row_array();
                                                if (!$this->session->userdata('isSuperAdmin')) {
                                                ?>
                                                    <input type="text" value="<?= $med['ID'] ?>" id="medid" hidden>
                                                    <input type="text" value="<?= $med['Firstname'] ?>" id="fname" hidden>
                                                    <input type="text" value="<?= $med['Lastname'] ?>" id="lname" hidden>
                                                    <input type="text" value="<?= $med['Middlename'] ?>" id="mname" hidden>
                                                    <input type="text" value="<?= $med['Email'] ?>" id="eml" hidden>
                                                    <input type="text" value="<?= $med['Contact'] ?>" id="cnt" hidden>
                                                    <input type="text" value="<?= $med['Medical'] ?>" id="mdc" hidden>
                                                    <i class="fad fa-user-edit fs-5 me-1 editic" style="color: #1a237e" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                                    <i class="fas fa-file-archive fs-5 delic" style="color: #b71c1c" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                                                <?php } ?>
                                            </div>
                                            <div class="">
                                                <button data-bs-toggle="modal" data-bs-target="#schedModal" data-monday="<?= arraymaker($scheddoc['monday'])[0] ?>" data-mfrom="<?= arraymaker($scheddoc['monday'])[1] ?>" data-mto="<?= arraymaker($scheddoc['monday'])[2] ?>" data-tuesday="<?= arraymaker($scheddoc['tuesday'])[0] ?>" data-tfrom="<?= arraymaker($scheddoc['tuesday'])[1] ?>" data-tto="<?= arraymaker($scheddoc['tuesday'])[2] ?>" data-wednesday="<?= arraymaker($scheddoc['wednesday'])[0] ?>" data-wfrom="<?= arraymaker($scheddoc['wednesday'])[1] ?>" data-wto="<?= arraymaker($scheddoc['wednesday'])[2] ?>" data-thursday="<?= arraymaker($scheddoc['thursday'])[0] ?>" data-thfrom="<?= arraymaker($scheddoc['thursday'])[1] ?>" data-thto="<?= arraymaker($scheddoc['thursday'])[2] ?>" data-friday="<?= arraymaker($scheddoc['friday'])[0] ?>" data-ffrom="<?= arraymaker($scheddoc['friday'])[1] ?>" data-fto="<?= arraymaker($scheddoc['friday'])[2] ?>" id="viewsched" class="btn btn-secondary btn-sm">View Schedule</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <p class="text-center mt-5 mb-0 display-3"><i class="fad text-secondary fa-file-minus"></i></p>
                        <p class="text-center text-secondary">No Active Account</p>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="" id="archivecard">
                <div class="row gy-3">
                    <?php

                    $resarch = $this->db->query('SELECT * FROM doctor WHERE status="archive" ORDER BY ID DESC');
                    if ($resarch->num_rows() > 0) {
                    ?>
                        <div class="col-lg-12">
                            <p class="mb-0 text-secondary"> Showing archived medical staff account</p>
                        </div>
                        <?php
                        foreach ($resarch->result_array() as $med) {
                            $fullname = $med['Lastname'] . ', ' . $med['Firstname'] . ' ' . $med['Middlename'];
                            switch ($med['Medical']) {
                                case 'midwife':
                                    $txtcolor = '#CC8899';
                                    break;
                                case 'dentist':
                                    $txtcolor = '#26580F';
                                    break;
                                case 'nurse':
                                    $txtcolor = '#017C8F';
                                    break;
                                default:
                                    $txtcolor = '#017C8F';
                            }
                        ?>
                            <div class="col-lg-4">

                                <div class="cardprof">
                                    <div class="topcol d-flex justify-content-center position-relative">
                                        <img class="profile position-absolute" src="<?= base_url('uploads/Doctor/' . $med['Picture']) ?>" alt="">
                                    </div>
                                    <div class="mt-5">
                                        <p class="mb-0 text-center"><?= $fullname ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Email'] ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Contact'] ?></p>
                                        <p class="mb-0 text-secondary text-center" style="font-size: 14px"><?= $med['Gender'] ?></p>

                                        <div class="d-flex justify-content-center my-2">
                                            <div class="px-3 rounded-pill" style="background-color:<?= $txtcolor ?>">
                                                <p class="text-center mb-0" style="color: white;font-size: 14px"><?= ucfirst($med['Medical']) ?></p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between  px-3 pb-3 pt-2 clos">
                                            <div class="">
                                                <?php
                                                $scheddoc = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $med['ID'])->row_array();
                                                if (!$this->session->userdata('isSuperAdmin')) {
                                                ?>
                                                    <input type="text" value="<?= $med['ID'] ?>" id="medid" hidden>
                                                    <input type="text" value="<?= $med['Firstname'] ?>" id="fname" hidden>
                                                    <input type="text" value="<?= $med['Lastname'] ?>" id="lname" hidden>
                                                    <input type="text" value="<?= $med['Middlename'] ?>" id="mname" hidden>
                                                    <input type="text" value="<?= $med['Email'] ?>" id="eml" hidden>
                                                    <input type="text" value="<?= $med['Contact'] ?>" id="cnt" hidden>
                                                    <input type="text" value="<?= $med['Medical'] ?>" id="mdc" hidden>
                                                    <i class="fas fa-box-up text-dark fs-4 urlic" data-bs-toggle="modal" data-bs-target="#unarchiveModal"></i>
                                                <?php } ?>
                                            </div>
                                            <!-- <div class="">
                                                <button data-bs-toggle="modal" data-bs-target="#schedModal" data-monday="<?= arraymaker($scheddoc['monday'])[0] ?>" data-mfrom="<?= arraymaker($scheddoc['monday'])[1] ?>" data-mto="<?= arraymaker($scheddoc['monday'])[2] ?>" data-tuesday="<?= arraymaker($scheddoc['tuesday'])[0] ?>" data-tfrom="<?= arraymaker($scheddoc['tuesday'])[1] ?>" data-tto="<?= arraymaker($scheddoc['tuesday'])[2] ?>" data-wednesday="<?= arraymaker($scheddoc['wednesday'])[0] ?>" data-wfrom="<?= arraymaker($scheddoc['tuesday'])[1] ?>" data-wto="<?= arraymaker($scheddoc['tuesday'])[2] ?>" data-thursday="<?= arraymaker($scheddoc['thursday'])[0] ?>" data-thfrom="<?= arraymaker($scheddoc['tuesday'])[1] ?>" data-thto="<?= arraymaker($scheddoc['tuesday'])[2] ?>" data-friday="<?= arraymaker($scheddoc['friday'])[0] ?>" data-ffrom="<?= arraymaker($scheddoc['tuesday'])[1] ?>" data-fto="<?= arraymaker($scheddoc['tuesday'])[2] ?>" id="viewsched" class="btn btn-secondary btn-sm">View Schedule</button>
                                            </div> -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <p class="text-center mt-5 mb-0 display-3"><i class="fad text-secondary fa-file-minus"></i></p>
                        <p class="text-center text-secondary">No Archive Account</p>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0">
            <div class="p-2 d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="d-flex justify-content-center">
                <i class="fad fa-file-archive " style="font-size: 70px"></i>
            </div>
            <p class="mb-1 text-center fs-5 text-secondary">Are you sure?</p>
            <div class="px-3">
                <p class="text-center text-secondary" style="font-size: 14px">Do you want to move this account to archive?</p>
            </div>
            <form action="<?= base_url('AdminAuth/deletedoc') ?>" method="POST">
                <input type="text" id="ID" name="ID" hidden>
                <input type="hidden" name="docname" id="dname">
                <div class="d-flex justify-content-center pb-4 mt-2">
                    <button class="btcancel" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btdelete ms-2" type="submit">Move</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="unarchiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0">
            <div class="p-2 d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="d-flex justify-content-center">
                <i class="fad fa-box-up" style="font-size: 70px"></i>
            </div>
            <p class="mb-1 text-center fs-5 text-secondary">Are you sure?</p>
            <div class="px-3">
                <p class="text-center text-secondary" style="font-size: 14px">Do you want to move this account to active?</p>
            </div>
            <form action="<?= base_url('AdminAuth/activedoc') ?>" method="POST">
                <input type="text" id="arcID" name="ID" hidden>
                <input type="hidden" name="docname" id="ddname">
                <div class="d-flex justify-content-center pb-4 mt-2">
                    <button class="btcancel" type="button" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btsuccess ms-2" type="submit">Move</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="px-3 pt-2 d-flex justify-content-between align-items-center">
                <p class="text-dark mb-0">Edit Account</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <hr class="">
            <form action="<?= base_url('AdminAuth/updateDoctor') ?>" method="POST" id="formupdate">
                <input type="text" name="thisid" hidden id="thisid">

                <div class="px-3">
                    <div class="row gx-1 gy-2">
                        <div class="col-lg-4">
                            <label for="">Firstname</label>
                            <input type="text" id="firstname" onkeydown="return alphaOnly(event)" name="firstname" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-4">
                            <label for="">Lastname</label>
                            <input type="text" id="lastname" onkeydown="return alphaOnly(event)" name="lastname" class="form-control form-control-sm">

                        </div>
                        <div class="col-lg-4">
                            <label for="">Middlename</label>
                            <input type="text" id="middlename" onkeydown="return alphaOnly(event)" name="middlename" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="text" id="email" name="email" class="form-control form-control-sm">
                        </div>

                        <div class="col-lg-6">
                            <label for="">Contact Number</label>
                            <input type="text" id="contact" onkeypress="return isNumber(event)" maxlength="11" name="contact" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative d-flex align-items-center">
                                <input type="password" name="password" id="pass1" class="form-control form-control-sm" placeholder="Enter Password">
                                <i class="fas fa-eye position-absolute me-2 passeye" id="passtypechange1" style="right: 0; cursor: pointer"></i>
                            </div>
                            <button type="button" id="genpass1" class="btn-sm btn btn-secondary rounded-0 w-100">Generate New Password</button>
                            <div class="passerror"></div>
                        </div>
                        <div class="col-lg-12">
                            <hr class="mt-0">
                            <p class="mb-0">Medical Specialties</p>
                            <div class="row mt-0">
                                <div class="col-lg-4">
                                    <input type="radio" id="midwife" class="radiobtn" value="midwife" name="medspec">
                                    <label for="midwife" class="radiolbl">
                                        Midwife
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" id="dentist" class="radiobtn" value="dentist" name="medspec">
                                    <label for="dentist" class="radiolbl">
                                        Dentist
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" id="nurse" class="radiobtn" value="nurse" name="medspec">
                                    <label for="nurse" class="radiolbl">
                                        Nurse
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="px-3 pt-3 pb-3 d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm pe-3" type="submit"><i class="fad fa-save me-2"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="schedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="p-3 d-flex justify-content-between">
                <p class="mb-0 fw-bold">SCHEDULE</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="" id="schedtb">

            </div>
            <div class="">
                <label for="" class="fw-bold ms-3">Legend:</label>
                <div class="d-flex mx-3 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas text-success fa-check-square me-2"></i>
                        <label for="">Available</label>
                    </div>
                    <div class="d-flex align-items-center ms-5">
                        <i class="fas text-secondary fa-square me-2"></i>
                        <label for="">Not Available</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast succtoast align-items-center text-white bg-success border-0 rounded-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fad fs-5 fa-check-double me-2"></i> <label>You successfully added a medical staff account</label>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast succarchive align-items-center text-white border-0 rounded-0" style="background-color: #263238" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fad fa-archive me-2 fs-5"></i> <label>Successfully moved an account to archive</label>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast succunarchive align-items-center text-white border-0 rounded-0" style="background-color: #01579b" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fad fa-check-circle me-2 fs-5"></i> <label>Successfully moved an account to active</label>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast succupd align-items-center text-white border-0 rounded-0" style="background-color: #01579b" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fad fa-check-circle me-2 fs-5"></i> <label>Successfully updated an account</label>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>


<?php
if ($this->session->userdata('success_update')) {
?>
    <script>
        $(document).ready(function() {
            $('.succupd').toast('show')
        })
    </script>
<?php
}
?>

<?php
if ($this->session->userdata('success_unarchive')) {
?>
    <script>
        $(document).ready(function() {
            $('.succunarchive').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('success_archive')) {
?>
    <script>
        $(document).ready(function() {
            $('.succarchive').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('successaccount')) {
?>
    <script>
        $(document).ready(function() {
            $('.succtoast').toast('show')
        })
    </script>
<?php
}
?>
<!-- viewsched -->
<script>
    $(document).ready(function() {

        $('#formupdate').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true,
                },
                contact: {
                    required: true,
                    maxlength: 11,
                    minlength: 11,
                },

            },
            messages: {
                firstname: errorMessage('Please enter a firstname'),
                lastname: errorMessage('Please enter a lastname'),
                email: {
                    required: errorMessage('Please enter an email address'),
                    email: errorMessage('Invalid email address')
                },
                contact: {
                    required: errorMessage('Please enter contact number'),
                    maxlength: errorMessage('Please enter 11 digit number'),
                    minlength: errorMessage('Please enter 11 digit number'),
                }
            }
        })







        $('#genpass1').click(function() {
            $('#pass1').val(Math.random().toString(36).slice(-8))
            $('#passtypechange1').show();

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




        $('#archivecard').hide()

        $('#viewarchive').click(function() {
            $('#archivecard').show()
            $('#mcard').hide()

        })
        $('#viewmain').click(function() {
            $('#archivecard').hide()
            $('#mcard').show()

        })

        $(document).on('click', '#viewsched', function() {
            var monday = $(this).data('monday');
            var mfrom = $(this).data('mfrom');
            var mto = $(this).data('mto');

            var tuesday = $(this).data('tuesday');
            var tfrom = $(this).data('tfrom');
            var tto = $(this).data('tto');

            var wednesday = $(this).data('wednesday');
            var wfrom = $(this).data('wfrom');
            var wto = $(this).data('wto');

            var thursday = $(this).data('thursday');
            var thfrom = $(this).data('thfrom');
            var thto = $(this).data('thto');

            var friday = $(this).data('friday');
            var ffrom = $(this).data('ffrom');
            var fto = $(this).data('fto');

            const sched = [
                ['Monday', monday, mfrom, mto],
                ['Tuesday', tuesday, tfrom, tto],
                ['Wednesday', wednesday, wfrom, wto],
                ['Thursday', thursday, thfrom, thto],
                ['Friday', friday, ffrom, fto]
            ];

            console.log(sched.length)
            var output = "<div class='px-3'>";

            output += '<table class="table table-striped border w-100">';
            for (var i = 0; i < sched.length; i++) {
                output += '<tr>';
                output += '<td>' + sched[i][0] + '</td>';
                output += '<td class="fs-5">' + ((sched[i][1] === "yes") ? '<i class="fas text-success fa-check-square"></i>' : '<i class="fas text-secondary fa-square"></i>') + '</td>';
                output += '<td>' + sched[i][2] + '</td>';
                output += '<td>' + sched[i][3] + '</td>';
                output += '</tr>';

            }
            output += '</table>';
            output += '</div>';

            $('#schedtb').html(output);








        })
    })


    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 12px"><i class="fas fa-exclamation-square"></i> ' + message + '</label>';
    }



    $('.delic').click(function() {
        var id = $(this).closest('.clos').find('#medid').val();
        var fname = $(this).closest('.clos').find('#fname').val();
        var lname = $(this).closest('.clos').find('#lname').val();
        var mname = $(this).closest('.clos').find('#mname').val();
        $('#ID').val(id);
        $('#dname').val(fname + ' ' + mname + ' ' + lname);
    })

    $('.urlic').click(function() {
        var id = $(this).closest('.clos').find('#medid').val();
        var fname = $(this).closest('.clos').find('#fname').val();
        var lname = $(this).closest('.clos').find('#lname').val();
        var mname = $(this).closest('.clos').find('#mname').val();
        $('#arcID').val(id);
        $('#ddname').val(fname + ' ' + mname + ' ' + lname);
    })

    $('.editic').click(function() {
        var fname = $(this).closest('.clos').find('#fname').val();
        var lname = $(this).closest('.clos').find('#lname').val();
        var mname = $(this).closest('.clos').find('#mname').val();
        var eml = $(this).closest('.clos').find('#eml').val();
        var cnt = $(this).closest('.clos').find('#cnt').val();
        var mdc = $(this).closest('.clos').find('#mdc').val();
        var id = $(this).closest('.clos').find('#medid').val();


        $('#firstname').val(fname)
        $('#lastname').val(lname)
        $('#middlename').val(mname)
        $('#email').val(eml)
        $('#contact').val(cnt)
        $('#thisid').val(id)
        $('input:radio[name="medspec"]').filter('[value="' + mdc + '"]').attr('checked', true);
    })
</script>