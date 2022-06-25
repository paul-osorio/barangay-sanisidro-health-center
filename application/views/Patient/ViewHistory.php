<?php
$fullname = $user['lastname'] . ', ' . $user['firstname'] . ' ' . $user['middlename'];
$userID = $user['patient_ID'];
$res = $this->db->query('SELECT * FROM patient WHERE ID=' . $userID);
$data = $res->row_array();
$fullname2 = $data['Lastname'] . ', ' . $data['Firstname'] . ' ' . $data['Middlename'];


if ($user['type'] === "pedia") {
    $apptype = 'For Pedia';
    $col = 'col-lg-6';
    $col2 = 'col-lg-6';
    $object = false;
    $icon = pediaIcon(60, 60);

    $image = '
    <div class="pd d-flex justify-content-center align-items-center">
    <div class="">
       ' . pediaIcon(55, 55) . '
    </div>
    </div>
    ';
} elseif ($user['type'] === "myself") {
    $apptype = 'For Myself';
    $col = 'col-lg-5';
    $col2 = 'col-lg-7';
    $object = true;
    if ($data['Profile'] === "" || $data['Profile'] === null) {
        $burl = base_url('assets/images/profile.png');
    } else {
        $burl = base_url('uploads/Patient/Profile/' . $data['Profile']);
    }
    $image = '<img src="' . $burl . '" class="pd" alt="">';
} elseif ($user['type'] === "others") {
    $apptype = 'For Others';
    $col = 'col-lg-6';
    $col2 = 'col-lg-6';
    $object = false;
    $icon = othersIcon(60, 60);
    $image = '
    <div class="pd d-flex justify-content-center align-items-center">
    <div class="">
       ' . othersIcon(55, 55) . '
    </div>
    </div>
    ';
}
$refform = $this->db->query('SELECT * FROM referral_form WHERE appointmentID=' . $user['ID'])->row_array();;


switch ($user['app_time']) {
    case 830:
        $time = "8:30 AM";
        break;
    case 930:
        $time = "9:30 AM";
        break;
    case 1030:
        $time = "10:30 AM";
        break;
    case 1130:
        $time = "11:30 AM";
        break;
    case 130:
        $time = "1:30 PM";
        break;
    case 230:
        $time = "2:30 PM";
        break;
    case 330:
        $time = "3:30 PM";
        break;
    case 430:
        $time = "4:30 PM";
        break;
    default:
        $time = "wrong time";
}



?>


<style>
    .pd {
        height: 90px;
        width: 90px;
        border: 1px solid lightgray;
        border-radius: 50%;
        object-fit: cover;
    }

    .sendmess {
        width: 12rem;
        border: 0;
        background-color: #255ED6;
        height: 40px;
        color: white;
        border-radius: 8px;
        bottom: 15px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        outline: none;
    }

    .markcomplete {
        width: 12rem;
        border: 0;
        background-color: #4CAF50 !important;
        height: 35px;
        color: white;
        border-radius: 8px;
        bottom: 15px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        outline: none;
    }

    .markcomplete:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2);
    }

    .sendmess:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2);
    }

    .tcolor {
        font-size: 15px;
    }

    .sympcard label {
        cursor: pointer;
        font-size: 14px !important;
        margin-top: 2rem;
    }

    .symIcon {
        position: absolute;
        top: 0;
    }



    .rr {
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 2;
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2) !important;


    }

    .rr::-webkit-scrollbar {
        width: 3px;
        background-color: lightgray;
        border-radius: 10px;
        right: -10px;
    }

    .rr::-webkit-scrollbar-thumb {
        background-color: gray;
        border-radius: 10px;

    }

    .cc {
        height: 6rem;
        text-align: center;
    }


    .carright {
        color: #AEEBE4;
    }

    .ll {
        border-right: 2px solid dodgerblue !important;
        height: 8rem;
    }

    .f-sm {
        font-size: 14px;
    }

    .circ {
        height: 30px;
        width: 30px;
        background-color: white;
        border: 2px solid dodgerblue;
        border-radius: 50%;
        left: -40px;
        top: 22px;
    }

    .xmr {
        color: gray !important;
        cursor: pointer;
    }

    .hcard::-webkit-scrollbar {
        width: 3px;
        background-color: lightgray;
    }

    .hcard::-webkit-scrollbar-thumb {
        background-color: gray;
    }

    .dental {
        background-image: url("<?= base_url('assets/images/teeth.jpg') ?>");
        background-size: cover;
        background-position: 20%;
        height: 7rem;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }

    .txt1 {
        text-shadow: 2px 4px darkblue;
    }

    .dentaltxt {
        border-radius: 5px;
        padding: 5px;
        -webkit-backdrop-filter: blur(5px);
        /* backdrop-filter: blur(2px); */

        background: rgba(0, 0, 0, 0.2);
        height: 100%;
        cursor: pointer;
    }

    .app,
    .rap {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }

    .addnotebtn {
        color: #255ED6;
        font-weight: 500;
        cursor: pointer;
    }

    .addnotebtn:hover {
        color: blue;
    }

    .addnotebtn:active {
        font-size: 15px;
    }

    #prevcard {
        scroll-snap-type: y mandatory;

    }

    #prevelement {
        scroll-margin: 10px;
        scroll-snap-align: start;
        scroll-snap-stop: normal;
    }

    .btn {
        box-shadow: none !important;
    }

    #prevcard {}

    .acp,
    .cls {
        border: 0;
        padding: 10px 15px 10px 15px;
        border-radius: 5px;
    }

    .acp:hover,
    .cls:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .acp:active,
    .cls:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2);
    }

    .acp {
        background-color: #d32f2f;
        color: white;
    }

    .decacp,
    .deccls {
        border: 0;
        padding: 10px 15px 10px 15px;
        border-radius: 5px;
    }

    .decacp:hover,
    .deccls:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .decacp:active,
    .deccls:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2);
    }

    .decacp {
        background-color: dodgerblue;
        color: white;
    }

    .form-control {
        box-shadow: none !important;
    }

    .addrem:hover {
        transform: scale(1.05);
    }

    .addrem:active {
        transform: scale(1);
    }

    .setappbtn {
        position: relative;
        z-index: 10;

    }

    .setappbtn:hover.setappbtn:after {
        content: attr(data-tooltip);
        position: absolute;
        width: 10rem;
        /* background-color: rgba(0, 0, 0, 0.8);
         */
        background: rgba(0, 150, 150, 0.8);
        /* box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
        filter: blur(10px); */
        backdrop-filter: blur(10px);
        margin-left: 5px;
        color: white;
        border-radius: 5px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="cont position-relative" style="overflow-x: hidden;margin-top: 4rem">
    <?php
    switch ($user['status']) {
        case 'pending':
            $txtcl = 'text-danger';
            break;
        case 'approve':
            $txtcl = 'text-primary';
            break;
        case 'complete':
            $txtcl = 'text-success';
            break;
        case 'declined':
            $txtcl = 'text-danger';
            break;
        case 'referred':
            $txtcl = 'text-secondary';
            break;
        default:
            $txtcl = 'text-dark';
    }
    ?>
    <!-- <div class="ms-4 fw-bold <?= $txtcl ?>"> <?= strtoupper($user['status']) ?></div> -->

    <div class="row gx-0 me-3">
        <div class="<?= ($user['status'] === "declined") ? 'col-lg-8' : 'col-lg-12' ?>">
            <div class="row gx-4 gy-3 mx-3 mb-4 adj">

                <div class="col-lg-12 <?= ($user['status'] === "declined") ? '' : 'd-flex justify-content-center' ?>">
                    <div class="">

                        <div class="card card-body border-0 p-0 rap" style="width: 43rem;border-radius: 10px">

                            <div class="row g-0">


                                <div class="<?= $col ?> detail d-flex align-items-center justify-content-center" style="border-right: 1px solid #E5E5E5">

                                    <div class="">
                                        <?php
                                        if ($object) {
                                        ?>
                                            <div class="d-flex justify-content-center">
                                                <?= $image ?>
                                            </div>
                                            <p class="mb-0 fs-5 text-center"><?= $fullname ?></p>
                                            <p class="text-center text-secondary mb-1" style="font-size: 14px"><?= $data['Email'] ?></p>
                                            <p class="text-center text-secondary" style="font-size: 14px"><?= $data['Contact'] ?></p>


                                            <?php

                                            if ($user['status'] === 'referred') {
                                            ?>
                                                <button class="btn btn-secondary w-100" onclick="location.href='<?= base_url('Patient/referral_form/' . $refform['ID']) ?>'"><i class="fad fa-arrow-alt-to-bottom"></i>Download Referral Form</button>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($user['status'] === 'pending' || $user['status'] === 'approve') {
                                            ?>
                                                <button class="btn btn-danger w-100 fcancel" data-apptype="<?= $user['app_type'] ?>" data-type="<?= $user['type'] ?>" data-pid="<?= $user['patient_ID'] ?>" data-uid="<?= $user['ID'] ?>" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="fas fa-align-slash"></i> Cancel Appointment</button>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        } else {
                                        ?>
                                            <div class=" row mb-5 mt-5 mx-3">

                                                <div class="col-lg-8">
                                                    <p class="mb-0 text-secondary fw-bold" style="font-size: 14px">Account detail:</p>

                                                    <div class="">
                                                        <p class="mb-0 text-secondary" style="font-size: 14px">Name:</p>
                                                        <p class="tcolor text-dark "><?= $fullname2  ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <?= $icon ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-0 text-secondary" style="font-size: 14px">Email:</p>
                                                        <p class="tcolor"><?= $data['Email']  ?></p>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Gender</p>
                                                    <p class="tcolor"><?= $user['gender'] ?></p>
                                                </div>

                                                <div class="col-lg-6">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Phone number</p>
                                                    <p class="tcolor"><?= $data['Contact'] ?></p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Address</p>
                                                    <p class="tcolor"><?= $data['Address'] ?></p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <?php
                                                    if ($user['status'] === 'referred') {
                                                    ?>
                                                        <button class="btn btn-secondary w-100" onclick="location.href='<?= base_url('Patient/referral_form/' . $refform['ID']) ?>'"><i class="fad fa-arrow-alt-to-bottom"></i> Download Referral Form</button>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($user['status'] === 'pending' || $user['status'] === 'approve') {
                                                    ?>
                                                        <button class="btn btn-danger w-100 fcancel1" data-apptype="<?= $user['app_type'] ?>" data-type="<?= $user['type'] ?>" data-pid="<?= $user['patient_ID'] ?>" data-uid="<?= $user['ID'] ?>" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="fas fa-align-slash"></i> Cancel Appointment</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="<?= $col2 ?>">
                                    <?php
                                    if ($object) {
                                    ?>
                                        <div class="row my-4 mx-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3 fw-bold  fs-5  text-center  <?= $txtcl ?>"> <?= strtoupper($user['status']) ?></div>

                                                <div class="col-lg-6">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Patient type:</p>
                                                    <p class="tcolor text-primary"><?= $apptype  ?></p>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Gender</p>
                                                <p class="tcolor"><?= $user['gender'] ?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Birthday</p>
                                                <p class="tcolor"><?= date('M d, Y', strtotime($user['birthday'])); ?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Phone number</p>
                                                <p class="tcolor"><?= $data['Contact'] ?></p>
                                            </div>
                                            <div class="col-lg-12">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Address</p>
                                                <p class="tcolor"><?= $data['Address'] ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="row my-4 mx-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3 fw-bold fs-5  text-center <?= $txtcl ?>"> <?= strtoupper($user['status']) ?></div>

                                                <p class="mb-0 text-secondary fw-bold" style="font-size: 14px">Patient Info:</p>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Patient type:
                                                        <label class="tcolor text-primary ms-2"><?= $apptype  ?></label>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mt-2">
                                                    <p class="mb-0 text-secondary" style="font-size: 14px">Name:</p>
                                                    <p class="tcolor text-dark fs-5"><?= $fullname  ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Gender</p>
                                                <p class="tcolor"><?= $user['gender'] ?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Birthday</p>
                                                <p class="tcolor"><?= date('M d, Y', strtotime($user['birthday'])); ?></p>
                                            </div>



                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 <?= ($user['status'] === "declined") ? '' : 'd-flex justify-content-center' ?>">
                    <div class="">
                        <div class="card card-body border-0 app" style="border-radius: 10px; width: 43rem;">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="bg-white text-primary fw-bold mb-0" id="currapp" style="border-radius: 5px;width: 10.5rem;font-size: 18px;">Appointment</p>
                                <?php

                                if ($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') {
                                    if ($user['newapp'] === "Yes") {
                                ?>
                                        <button class="btn addrem setappbtn" data-tooltip="View Appointment" onclick="location.href='<?= base_url('P/ViewSetAppointment/' . $user['docid']) ?>'"><?= calendarReminder(25, 25) ?></button>

                                    <?php
                                    } else {
                                    ?>

                                        <button class="btn addrem setappbtn" data-tooltip="No personal appointment yet"><?= calendarReminder(25, 25) ?></button>

                                <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="card card-body border-0 mt-2 p-0" style="box-shadow: 0 4px -4px inset rgba(0,0,0,0.1);height: 8rem;border-radius: 10px;background-color: #EFF1F7">

                                <div class="row p-0" id="currcard">
                                    <div class="col-lg-1 ll ">

                                    </div>
                                    <div class="col-lg-11 px-4 d-flex align-items-center">
                                        <div class="card card-body bg-white border-0 position-relative" style="border-radius: 10px;">

                                            <div class="row g-0 px-0" style="">
                                                <div class="<?= (($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') ? 'col-lg-3' : 'col-lg-4') ?> px-0 d-flex justify-content-center align-items-center" style="border-right: 1px solid lightgray">
                                                    <p for="" class="fs-5 mb-0"><?= date('d M \'y', strtotime($user['app_date'])) ?></p>
                                                </div>
                                                <div class="<?= (($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') ? 'col-lg-3' : 'col-lg-4') ?>" style="border-right: 1px solid lightgray">
                                                    <div class="d-flex align-items-center h-100 justify-content-center">
                                                        <div class="">
                                                            <p class="text-center f-sm text-secondary mb-0">Time</p>
                                                            <p class="mb-0 text-center"><?= $time ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="<?= (($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') ? 'col-lg-3' : 'col-lg-4') ?>" style="<?= (($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') ? 'border-right: 1px solid lightgray' : '') ?>">
                                                    <div class="d-flex align-items-center h-100 justify-content-center">
                                                        <div class="">
                                                            <p class="text-center f-sm text-secondary mb-0">Type</p>
                                                            <p class="mb-0 text-center text-success"><?= ucfirst($user['app_type']) ?></p>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-outline-success btn-sm rounded-pill" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#servicesModal">View Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($user['status'] != 'pending' && $user['status'] != 'declined' && $user['status'] != 'cancel' && $user['status'] != 'referred') {
                                                ?>
                                                    <div class="col-lg-3">
                                                        <div class="d-flex h-100 justify-content-center align-items-center">

                                                            <label for="" class="addnotebtn" data-bs-toggle="modal" data-bs-target="#addNote"><?= (($user['note'] !== "" || $user['note'] !== null) ? 'View Note' : 'No Note') ?></label>

                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="circ position-absolute"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php
        if ($user['status'] === "declined") {
        ?>
            <div class="col-lg-4">

                <div class="card card-body border-0" style="border-radius: 10px;box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);">
                    <?php
                    $fetchreason = $this->db->query('SELECT * FROM appointment_declined WHERE appointmentID=' . $user['ID']);
                    foreach ($fetchreason->result_array() as $data) {
                    ?>
                        <div class="d-flex justify-content-between">
                            <p class="text-danger">Declined reason:</p>
                            <p><?= date('M d, Y', strtotime($data['decline_date'])) ?></p>
                        </div>

                        <?php
                        $decarr = $data['reason'];
                        $decarrval = explode(',', $decarr);
                        for ($i = 0; $i < count($decarrval); $i++) {


                        ?>
                            <div class="card card-body mb-2">
                                <?php
                                if ($decarrval[$i] === "Others") {
                                    echo 'hey';
                                }
                                echo $decarrval[$i];
                                ?>
                            </div>
                        <?php

                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fad fa-sticky-note fs-5 text-primary"></i>
                        <label for="" class="fs-5 ms-2 text-secondary">Note</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 mx-3 mb-2">
                    <textarea name="note" class="form-control bg-white" readonly id="" style="height: 15rem"><?= $user['note'] ?></textarea>
                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fad fa-comment-alt-medical fs-5 text-primary"></i>
                        <label for="" class="fs-5 ms-2 text-secondary"><?= ucfirst($user['app_type']) ?> Services</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 mx-3 mb-2">
                    <div class="row gx-2">

                        <?php
                        $arr = $user['app_desc'];
                        $arrayval = explode(',', $arr);
                        for ($i = 0; $i < count($arrayval); $i++) {
                        ?>
                            <div class="col-lg-6">
                                <div style="border-radius: 10px;" class="card card-body text-center bg-white text-dark">
                                    <span class=""><?= $arrayval[$i] ?></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="checkic p-2">
                            <i class="fas fa-exclamation-circle fs-4 text-danger"></i>
                        </div>
                        <label for="" class="fs-5 ms-2 text-secondary">Cancel Appointment</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 ms-3">
                    <div class=" d-flex justify-content-center ms-4">
                        <p>Are you sure you want to cancel this appointment?</p>
                    </div>
                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                        <form action="<?= base_url('PatientAuth/cancelapp') ?>" method="POST">
                            <input type="hidden" name="userid" id="userid5">
                            <input type="hidden" name="patientid" id="patientid5">
                            <input type="hidden" name="type" id="type5">
                            <input type="hidden" name="apptype" id="apptype5">
                            <button class="cls" type="button" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="acp">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- onclick="location.href='<?= base_url('PatientAuth/cancelapp/' . $user['ID']) . '/' . $user['patient_ID'] . '/' . $user['type'] . '/' . $user['app_type'] ?>'" -->






<script>
    $(document).ready(function() {

        $('.fcancel').click(function() {
            var uid = $(this).data('uid');
            var pid = $(this).data('pid');
            var type = $(this).data('type');
            var apptype = $(this).data('apptype');

            $('#userid5').val(uid);
            $('#patientid5').val(pid);
            $('#type5').val(type);
            $('#apptype5').val(apptype);


        })

        $('.fcancel1').click(function() {
            var uid = $(this).data('uid');
            var pid = $(this).data('pid');
            var type = $(this).data('type');
            var apptype = $(this).data('apptype');

            $('#userid5').val(uid);
            $('#patientid5').val(pid);
            $('#type5').val(type);
            $('#apptype5').val(apptype);


        })




        $('.viewnt').click(function() {
            var note = $(this).closest('.clos').find('#prevnt').val();
            if (note === "") {
                $('#mprevnt').val('No notes indicated')

            } else {
                $('#mprevnt').val(note)

            }
        })

        $('#prevcard').hide();

        $('#currapp').click(function() {
            $('#currcard').show();
            $('#prevcard').hide();

            $('#prevapp')
                .removeClass('bg-white text-primary')
                .addClass('text-secondary');
            $(this)
                .addClass('bg-white text-primary')
                .removeClass('text-secondary');
        })

        $('#prevapp').click(function() {
            $('#currcard').hide();
            $('#prevcard').show();

            $('#currapp')
                .removeClass('bg-white text-primary')
                .addClass('text-secondary');
            $(this)
                .addClass('bg-white text-primary')
                .removeClass('text-secondary');
        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    })
</script>