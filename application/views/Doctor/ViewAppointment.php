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
        width: 100%;
        border: 0;
        background-color: #255ED6;
        height: 40px;
        color: white;
        border-radius: 5px;
        bottom: 15px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        outline: none;
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

    .viewton {
        border: 0;
        background-color: lightgray;
        border-radius: 50px;
        font-size: 13px;
        color: rgba(0, 0, 0, 0.7);
        width: 100px;
        outline: 0;
    }

    .viewton:active {
        box-shadow: 0 2px 2px inset rgba(0, 0, 0, 0.2) !important;
    }

    .viewton:hover {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }

    .popmodal {
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
        z-index: 10;
        opacity: 1;
        border-radius: 10px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .openModal:after {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        content: '';
        z-index: 99;
        height: 100rem;
        overflow-y: hidden !important;

    }




    .hideModal:after {
        display: none;

    }

    .carright {
        color: #AEEBE4;
    }

    .form-check-input {
        box-shadow: none !important;
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

    .btn {
        box-shadow: none !important;
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

    .viewnt {
        color: #255ED6;
        font-weight: 500;
        cursor: pointer;
    }

    .viewnt:hover {
        color: blue;
    }

    .viewnt:active {
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

    .messTooltip {
        position: relative;
        cursor: pointer;
    }

    .messTooltip:active {
        transform: scale(0.95);
    }


    .messTooltip:hover.messTooltip:after {
        content: 'Send Message';
        position: absolute;
        width: 8rem;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        top: 10%;
        left: 110%;
        border-radius: 5px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-size: 16px;

    }
</style>

<div class="contd position-relative" style="margin-top: 4rem">

    <div class="row gx-4 gy-3 mx-3 mb-4 adj">

        <div class="col-lg-12 d-flex justify-content-center">
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
                                    <div class="d-flex w-100">
                                        <div class="w-100">
                                            <button class="sendmess" data-bs-toggle="modal" data-bs-target="#exampleModal">Accept</button>
                                        </div>
                                        <div class="w-100 ms-2">
                                            <button class="sendmess bg-danger" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button>
                                        </div>
                                    </div>

                                    <div class="w-100 mt-2">
                                        <button class="sendmess bg-success" data-bs-toggle="modal" data-bs-target="#referalModal"><i class="fad fa-notes-medical"></i> Refer</button>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <div class="row my-5 mx-3">

                                        <div class="col-lg-8">
                                            <p class="mb-0 text-secondary fw-bold" style="font-size: 14px">Account user detail:</p>

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
                                <div class="d-flex justify-content-end ">
                                    <span class="messTooltip  me-3 mt-3 fs-4 ">
                                        <i class="fad fa-envelope" data-tooltip="Send Message" style="color: blue;cursor: pointer" onclick="location.href='<?= base_url('DoctorChat/makemessage/' . $user['patient_ID']) ?>'"></i>
                                    </span>
                                </div>
                                <div class="row mb-5 mt-3 mx-3">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p class="mb-0 text-secondary" style="font-size: 14px">Patient type:</p>
                                                <p class="tcolor text-primary mb-0"><?= $apptype  ?></p>
                                            </div>

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
                                <div class="d-flex justify-content-end">
                                    <span class="messTooltip  me-3 mt-3 fs-4 ">

                                        <i class="fad fa-envelope" data-tooltip="Send Message" style="color: blue;cursor: pointer" onclick="location.href='<?= base_url('DoctorChat/makemessage/' . $user['patient_ID']) ?>'"></i>
                                    </span>
                                </div>
                                <div class="row mb-5 mt-3  mx-3">
                                    <div class="col-lg-12">
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
                                    <div class="col-lg-12">
                                        <div class="d-flex w-100">
                                            <div class="w-100">
                                                <button class="sendmess" data-bs-toggle="modal" data-bs-target="#exampleModal">Accept</button>
                                            </div>
                                            <div class="w-100 ms-2">
                                                <button class="sendmess bg-danger" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button>
                                            </div>
                                        </div>
                                        <?php
                                        if ($user['app_type'] !== "immunization") {
                                        ?>
                                            <div class="w-100 mt-2">
                                                <button class="sendmess bg-success" data-bs-toggle="modal" data-bs-target="#referalModal"><i class="fad fa-notes-medical"></i> Refer</button>
                                            </div>
                                        <?php } ?>

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

        <div class="col-lg-12 d-flex justify-content-center">
            <div class="">
                <div class="card card-body border-0 app" style="border-radius: 10px; width: 43rem;">
                    <div class="p-1 " style="width: 32.5rem;border-radius: 5px;background-color: #EFF1F7">
                        <button class="bg-white px-2 py-2 btn text-primary fw-bold" id="currapp" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Appointment</button>
                        <button class="px-2 py-2 btn text-secondary fw-bold" id="prevapp" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Previous Appointments</button>

                    </div>
                    <div class="card card-body border-0 mt-2 p-0" style="box-shadow: 0 4px -4px inset rgba(0,0,0,0.1);height: 8rem;border-radius: 10px;background-color: #EFF1F7">

                        <div class="row p-0" id="currcard">
                            <div class="col-lg-1 ll ">

                            </div>
                            <div class="col-lg-11 px-4 d-flex align-items-center">
                                <div class="card card-body bg-white border-0 position-relative" style="border-radius: 10px;">

                                    <div class="row g-0 px-0" style="">
                                        <div class="col-lg-4 px-0 d-flex justify-content-center align-items-center" style="border-right: 1px solid lightgray">
                                            <p for="" class="fs-5 mb-0"><?= date('d M \'y', strtotime($user['app_date'])) ?></p>
                                        </div>
                                        <div class="col-lg-4" style="border-right: 1px solid lightgray">
                                            <p class="text-center f-sm text-secondary mb-0">Time</p>
                                            <p class="mb-0 text-center"><?= $time ?></p>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="d-flex align-items-center h-100 justify-content-center">
                                                <div class="">
                                                    <p class="text-center f-sm text-secondary mb-0">Type</p>
                                                    <p class="mb-0 text-center text-success"><?= ucfirst($user['app_type']) ?></p>
                                                    <button data-service="<?= $user['app_desc'] ?>" class="btn btn-outline-success btn-sm rounded-pill" id="mainservicesbtn" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#servicesModal">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="circ position-absolute"></div>
                                </div>
                            </div>
                        </div>


                        <div class="" id="prevcard" style="overflow-y:auto;overflow-x: hidden">

                            <?php
                            if ($app->num_rows() > 0) {
                                foreach ($app->result_array() as $app) {
                                    if ($app['type'] === "pedia") {
                                        $apptype1 = 'For Pedia';
                                    } elseif ($app['type'] === "myself") {
                                        $apptype1 = 'For Myself';
                                    } elseif ($app['type'] === "others") {
                                        $apptype1 = 'For Others';
                                    }

                            ?>
                                    <div class="row p-0" id="prevelement">
                                        <div class="col-lg-1 ll ">

                                        </div>
                                        <div class="col-lg-11 px-4 d-flex align-items-center">
                                            <div class="card card-body bg-white border-0 position-relative" style="border-radius: 10px;">

                                                <div class="row g-0 px-0" style="">
                                                    <div class="col-lg-3 px-0 d-flex justify-content-center align-items-center" style="border-right: 1px solid lightgray">
                                                        <p for="" class="fs-5 mb-0"><?= date('d M \'y', strtotime($app['app_date'])) ?></p>
                                                    </div>
                                                    <div class="col-lg-3" style="border-right: 1px solid lightgray">
                                                        <p class="text-center f-sm text-secondary mb-0">Time</p>
                                                        <p class="mb-0 text-center"><?= apptime($app['app_time']) ?></p>
                                                    </div>
                                                    <div class="col-lg-3" style="border-right: 1px solid lightgray">
                                                        <div class="d-flex align-items-center h-100 justify-content-center">
                                                            <div class="">
                                                                <p class="text-center f-sm text-secondary mb-0">Type</p>
                                                                <p class="mb-0 text-center text-success"><?= ucfirst($user['app_type']) ?></p>
                                                                <button data-service="<?= $app['app_desc'] ?>" class="btn btn-outline-success btn-sm rounded-pill" id="prevappservice" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#servicesModal">View Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="h-100 d-flex justify-content-center align-items-center clos">
                                                            <textarea name="" cols="30" rows="10" hidden id="prevnt"><?= $app['note'] ?></textarea>

                                                            <label for="" class="viewnt" data-bs-toggle="modal" data-bs-target="#viewNote">View Note</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="circ position-absolute">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="d-flex justify-content-center align-items-center h-100 w-100">
                                    <div class="text-secondary">
                                        <p class="mb-0 mt-4 text-center fs-2"><i class="fal fa-calendar-minus"></i></p>
                                        <p class="text-center">No Previous Appointment</p>
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

    </div>
</div>

<style>
    .checkic {
        background-color: rgba(0, 0, 0, 0.05);
        width: 40px;
        border-radius: 50%;

    }

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

    .btn-close {
        box-shadow: none !important;
    }

    .acp {
        background-color: #FFBF00;
        color: white;
    }

    .decacp {
        background-color: #F71441;
        color: white;
    }

    .form-control {
        box-shadow: none !important;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="checkic p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 12l5 5l10 -10" />
                                <path d="M2 12l5 5m5 -5l5 -5" />
                            </svg>
                        </div>
                        <label for="" class="fs-5 ms-2 text-secondary">Accept Appointment</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 ms-3">
                    <div class=" d-flex justify-content-center ms-4">
                        <p>Are you sure you want to accept this appointment?</p>
                    </div>
                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                        <button class="cls" type="button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="acp" onclick="location.href='<?= base_url('DoctorAuth/approveappointment/' . $user['ID'] . '/' . $user['patient_ID']) ?>'">Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="referalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-notes-medical fs-5 text-primary"></i>
                        <label for="" class="fs-5 ms-2 text-secondary">Send Referral Form</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <form action="<?= base_url('DoctorAuth/referralForm') ?>" method="POST" id="referalForm">

                <input type="hidden" name="ID" value="<?= $user['ID'] ?>">
                <input type="hidden" name="patientid" value="<?= $user['patient_ID'] ?>">
                <div class="bg-light rounded-3 px-3 py-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-start mb-2">
                                <label for="" class="w-50">Patient Name:</label>
                                <div class="w-100">
                                    <input type="text" readonly name="name" value="<?= $fullname ?>" class="bg-white border-0 border-bottom form-control rounded-0 form-control-sm">
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-2">
                                <label for="" class="w-50">Patient Contact:</label>
                                <div class="w-100">

                                    <input type="text" readonly name="contact" value="<?= $data['Contact'] ?>" class="bg-white border-0 border-bottom form-control rounded-0 form-control-sm">
                                </div>

                            </div>
                            <div class="d-flex align-items-start mb-2">
                                <label for="" class="w-50">Patient Address:</label>
                                <div class="w-100">

                                    <input type="text" name="address" readonly value="<?= $data['Address'] ?>" class="bg-white border-0 border-bottom form-control rounded-0 form-control-sm">
                                </div>

                            </div>
                            <div class="">
                                <label for="" class="w-50">Reason For Referral:</label>
                                <?php
                                if ($user['app_type'] === "prenatal") {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Genetic Screening" name="referralreason[]" id="reason1">
                                                <label class="form-check-label" for="reason1">
                                                    Genetic Screening
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="First Trimester" name="referralreason[]" id="reason2">
                                                <label class="form-check-label" for="reason2">
                                                    First Trimester
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Second Trimester" name="referralreason[]" id="reason3">
                                                <label class="form-check-label" for="reason3">
                                                    Second Trimester
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Ultrasound" name="referralreason[]" id="reason4">
                                                <label class="form-check-label" for="reason4">
                                                    Ultrasound
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Others" name="referralreason[]" id="reason5">
                                                <label class="form-check-label" for="reason5">
                                                    Others
                                                    <textarea name="others" id="referalotherstext" cols="30" rows="3" class="form-control"></textarea>
                                                </label>
                                            </div>


                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Amniocentesis" name="referralreason[]" id="reason6">
                                                <label class="form-check-label" for="reason6">
                                                    Amniocentesis
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Chorionic Villus Sampling" name="referralreason[]" id="reason7">
                                                <label class="form-check-label" for="reason7">
                                                    Chorionic Villus Sampling
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Fetal Monitoring" name="referralreason[]" id="reason8">
                                                <label class="form-check-label" for="reason8">
                                                    Fetal Monitoring
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Glucose" name="referralreason[]" id="reason9">
                                                <label class="form-check-label" for="reason9">
                                                    Glucose
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Group B Strep Culture" name="referralreason[]" id="reason10">
                                                <label class="form-check-label" for="reason10">
                                                    Group B Strep Culture
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="referralerrror"></div>
                                        </div>
                                    </div>
                                <?php
                                } else if ($user['app_type'] === "dental") {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Tuberculosis: Montoux Test" name="referralreason[]" id="reason1">
                                                <label class="form-check-label" for="reason1">
                                                    Tuberculosis: Montoux Test
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="AIDS: ELISA, Western Blot Test" name="referralreason[]" id="reason2">
                                                <label class="form-check-label" for="reason2">
                                                    AIDS: ELISA, Western Blot Test
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Syphilis: Kahn Test, VDRL, TPI, FTA-ABS" name="referralreason[]" id="reason3">
                                                <label class="form-check-label" for="reason3">
                                                    Syphilis: Kahn Test, VDRL, TPI, FTA-ABS
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Others" name="referralreason[]" id="reason5">
                                                <label class="form-check-label" for="reason5">
                                                    Others
                                                    <textarea name="others" id="referalotherstext" cols="30" rows="3" class="form-control"></textarea>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Diptheria: Schicks Test, Elek's test" name="referralreason[]" id="reason4">
                                                <label class="form-check-label" for="reason4">
                                                    Diptheria: Schicks Test, Elek's test
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Scarlet fever: Dick test, Scultz-Charlton test" name="referralreason[]" id="reason4">
                                                <label class="form-check-label" for="reason4">
                                                    Scarlet fever: Dick test, Scultz-Charlton test
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Rickettsial infection: Weil-Felix test" name="referralreason[]" id="reason4">
                                                <label class="form-check-label" for="reason4">
                                                    Rickettsial infection: Weil-Felix test
                                                </label>
                                            </div>


                                        </div>
                                        <div class="col-lg-12">
                                            <div class="referralerrror"></div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- <textarea name="" class="form-control rounded-0" id="" cols="30" rows="5"></textarea> -->
                            </div>
                            <div class="mt-3 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=" modal fade" id="viewNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fad fa-sticky-note fs-5 text-primary"></i>
                        <label for="" class="fs-5 ms-2 text-secondary">Previous Note</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 mx-3 mb-2">
                    <textarea name="note" class="form-control mb-3 bg-white" readonly id="mprevnt" style="height: 15rem;resize: none"></textarea>
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
                <div class="mt-3 mx-3 mb-2" id="servarray">
                    <!-- <div class="row gx-2">

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
                        </div> -->

                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fad fa-times-hexagon text-danger fs-5"></i>
                        <label for="" class="fs-5 ms-2 text-secondary">Decline Appointment</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <form action="<?= base_url('DoctorAuth/declinereason') ?>" method="POST" id="decapp">
                <div class="bg-light rounded-3">
                    <div class="mt-3 mx-3 mb-2">
                        <br>
                        <input type="text" value="<?= $id ?>" name="ID" hidden>
                        <input type="text" value="<?= $user['patient_ID'] ?>" name="patientid" hidden>

                        <?php
                        if ($user['app_type'] === "dental") {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Doctor's not available" id="doctorcheck">
                                <label class="form-check-label" for="doctorcheck">
                                    Doctor's not available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Equipment's not available" id="equipmentcheck">
                                <label class="form-check-label" for="equipmentcheck">
                                    Equipment's not available
                                </label>
                            </div>
                        <?php
                        } elseif ($user['app_type'] === "prenatal") {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Laboratories are not available" id="labcheck">
                                <label class="form-check-label" for="labcheck">
                                    Laboratories are not available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Vaccines out of stock" id="vaccinecheck">
                                <label class="form-check-label" for="vaccinecheck">
                                    Vaccines out of stock
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Equipments not available" id="equipmentcheck">
                                <label class="form-check-label" for="equipmentcheck">
                                    Equipments not available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Midwife not available" id="midwifecheck">
                                <label class="form-check-label" for="midwifecheck">
                                    Midwife not available
                                </label>
                            </div>
                        <?php
                        } elseif ($user['app_type'] === "immunization") {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reason[]" value="Vaccines out of stock" id="vaccinecheck">
                                <label class="form-check-label" for="vaccinecheck">
                                    Vaccines out of stock
                                </label>
                            </div>


                        <?php
                        }
                        ?>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Others" name="reason[]" id="othercheck">
                            <label class="form-check-label" for="othercheck">
                                Others
                                <textarea name="others" id="otherstext" class="w-100 form-control" id="" cols="30" rows="2"></textarea>
                            </label>
                        </div>

                        <div class="reasonerror"></div>
                    </div>
                    <div class="pb-3 pe-3 d-flex justify-content-end">
                        <div class="">
                            <button class="deccls" type="button" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="decacp">Decline</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#reform').hide();
        $(document).on('click', '#prevappservice', function() {
            var services = $(this).data('service').split(',');
            var output = '<div class="row gx-2">'
            for (var i = 0; i < services.length; i++) {
                output += '<div class="col-lg-6">'
                output += '<div style="border-radius: 10px;" class="card card-body text-center bg-white text-dark">'
                output += '<span class="">' + services[i] + '</span>'
                output += '</div>'
                output += '</div>'
            }
            output += '</div>';
            $('#servarray').html(output);
        })

        $('#mainservicesbtn').click(function() {
            var services = $(this).data('service').split(',');
            var output = '<div class="row gx-2">'
            for (var i = 0; i < services.length; i++) {
                output += '<div class="col-lg-6">'
                output += '<div style="border-radius: 10px;" class="card card-body text-center bg-white text-dark">'
                output += '<span class="">' + services[i] + '</span>'
                output += '</div>'
                output += '</div>'
            }
            output += '</div>';
            $('#servarray').html(output);
        })


        $('#referralcheck').click(function() {
            if ($(this).is(':checked')) {
                $('#reform').show();

            } else {
                $('#reform').hide();

            }
        })


        var referalForm = $('#referalForm').validate({
            rules: {
                name: "required",
                contact: "required",
                address: "required",
                'referralreason[]': "required",
                others: {
                    required: function() {
                        if ($('#reason5').is(':checked')) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }

            },
            messages: {
                name: errorMessage('Name field is required'),
                contact: errorMessage('Contact field is required'),
                address: errorMessage('Address field is required'),
                'referralreason[]': errorMessage('Please select referral reason'),
                others: errorMessage('Please fill others field'),
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "referralreason[]") {
                    $(".referralerrror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },
        })

        $('#referalotherstext').hide();
        $('#reason5').click(function() {
            if ($(this).is(':checked')) {
                $('#referalotherstext').show();
            } else {
                $('#referalotherstext').hide();
                referalForm.resetForm();

            }

        });




        var deca = $('#decapp').validate({
            ignore: [],
            rules: {
                'reason[]': "required",
                others: {
                    required: function() {
                        if ($('#othercheck').is(':checked'))
                            return true;

                        return false;
                    }
                }
            },
            messages: {
                'reason[]': errorMessage('Please select a reason'),
                others: {
                    required: errorMessage('Please fill the <b>Others</b> field')
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "reason[]") {
                    $(".reasonerror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },

        })





        $('#otherstext').hide();
        $('#othercheck').click(function() {
            if ($(this).is(':checked')) {
                $('#otherstext').show();
            } else {
                $('#otherstext').hide();
                deca.resetForm();

            }

        });



        $('.viewnt').click(function() {
            var note = $(this).closest('.clos').find('#prevnt').val();

            if (note === "") {
                $('#mprevnt').val('No note indicated')

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