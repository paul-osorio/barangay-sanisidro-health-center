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
    $image = '<img src="' . base_url('uploads/Patient/Profile/' . $data['Profile']) . '" class="pd" alt="">';
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
        background-color: rgba(55, 155, 0);
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
    }

    .setappbtn:hover.setappbtn:after {
        content: attr(data-tooltip);
        position: absolute;
        width: 10rem;
        background-color: rgba(0, 0, 0, 0.8);
        margin-left: 5px;
        color: white;
        border-radius: 5px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
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

                                    <?php
                                    if ($user['status'] !== 'complete') {
                                    ?>
                                        <div class="d-flex justify-content-center mt-2">
                                            <button class="sendmess bg-primary" onclick="location.href='<?= base_url('DoctorChat/makemessage/' . $user['patient_ID']) ?>'"><i class="fas fa-comment-alt"></i> Message</button>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2">
                                            <button class="markcomplete bg-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mark As Complete</button>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                <?php
                                } else {
                                ?>
                                    <div class=" row my-5 mx-3">

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
                                        <?php
                                        if ($user['status'] !== 'complete') {
                                        ?>
                                            <div class="d-flex justify-content-center mt-2">
                                                <button class="sendmess bg-primary" onclick="location.href='<?= base_url('DoctorChat/makemessage/' . $user['patient_ID']) ?>'"><i class="fas fa-comment-alt"></i> Message</button>
                                            </div>
                                            <div class="d-flex justify-content-center mt-2">
                                                <button class="markcomplete bg-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mark As Complete</button>
                                            </div>
                                        <?php } ?>

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
                                <div class="row my-5 mx-3">
                                    <div class="col-lg-12">
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
                                <div class="row my-5 mx-3">
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
                                    <div class="col-lg-6">
                                        <p class="mb-0 text-secondary" style="font-size: 14px">Phone number</p>
                                        <p class="tcolor"><?= $data['Contact'] ?></p>
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
                    <div class="d-flex justify-content-between">
                        <div class="p-1 " style="border-radius: 5px;background-color: #EFF1F7">
                            <button class="bg-white px-2 py-2 btn text-primary fw-bold" id="currapp" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Appointment</button>
                            <button class="px-2 py-2 btn text-secondary fw-bold" id="prevapp" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Previous Appointments</button>
                        </div>
                        <?php
                        if ($user['status'] !== 'complete') {

                            if ($user['newapp'] === "Yes") {
                        ?>
                                <button class="btn addrem setappbtn" data-tooltip="View Appointment" onclick="location.href='<?= base_url('D/ViewSetAppointment/' . $user['docid']) ?>'"><?= calendarReminder(25, 25) ?></button>

                            <?php
                            } else {
                            ?>

                                <button class="btn addrem setappbtn" onclick="location.href='<?= base_url('D/SetAppointment/' . $user['ID']) ?>'" data-tooltip="Set Appointment"><?= calendarReminder(25, 25) ?></button>

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
                                        <div class="col-lg-3 px-0 d-flex justify-content-center align-items-center" style="border-right: 1px solid lightgray">
                                            <p for="" class="fs-5 mb-0"><?= date('d M \'y', strtotime($user['app_date'])) ?></p>
                                        </div>
                                        <div class="col-lg-3" style="border-right: 1px solid lightgray">
                                            <p class="text-center f-sm text-secondary mb-0">Time</p>
                                            <p class="mb-0 text-center"><?= $time ?></p>
                                        </div>
                                        <div class="col-lg-3" style="border-right: 1px solid lightgray">
                                            <div class="d-flex align-items-center h-100 justify-content-center">
                                                <div class="">
                                                    <p class="text-center f-sm text-secondary mb-0">Type</p>
                                                    <p class="mb-0 text-center text-success"><?= ucfirst($user['app_type']) ?></p>
                                                    <button data-service="<?= $user['app_desc'] ?>" class="btn btn-outline-success btn-sm rounded-pill" id="mainservicesbtn" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#servicesModal">View Details</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="d-flex h-100 justify-content-center align-items-center">
                                                <label for="" class="addnotebtn" data-bs-toggle="modal" data-bs-target="#addNote"><?= (($user['note'] != "" || $user['note'] != null || $user['status'] === "complete") ? 'View Note' : 'Add Note') ?></label>
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
                                                                <p class="mb-0 text-center text-success"><?= ucfirst($app['app_type']) ?></p>
                                                                <button data-service="<?= $app['app_desc'] ?>" class="btn btn-outline-success btn-sm rounded-pill" id="prevappservice" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#servicesModal">View Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="h-100 d-flex justify-content-center align-items-center clos">
                                                            <textarea name="" cols="30" rows="10" hidden id="prevnt"><?= $app['note'] ?></textarea>
                                                            <label for="" class="addnotebtn viewnt" id="" data-bs-toggle="modal" data-bs-target="#viewNote">View Note</label>

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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="checkic p-2">
                            <i class="fad fa-badge-check fs-1 text-success"></i>
                        </div>
                        <label for="" class="fs-5 ms-2 text-secondary">Mark As Complete</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <div class="bg-light rounded-3">
                <div class="mt-3 ms-3">
                    <div class=" d-flex justify-content-center ms-4">
                        <p>Are you sure you want to mark this apppointment as complete?</p>
                    </div>
                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                        <button class="cls" type="button" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="acp" onclick="location.href='<?= base_url('DoctorAuth/completeappointment/' . $user['ID']) . '/' . $user['patient_ID'] ?>'">Complete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content border-0 ">
            <div class="px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fad fa-sticky-note fs-5 text-primary"></i>
                        <label for="" class="fs-5 ms-2 text-secondary"><?= (($user['status'] != 'complete') ? 'Add Note' : 'View Note') ?></label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <form action="<?= base_url('DoctorAuth/addnote') ?>" method="POST" id="notebook">
                <div class="bg-light rounded-3">

                    <div class="mt-3 mx-3 mb-2">
                        <input type="text" value="<?= $user['ID'] ?>" hidden name="ID">
                        <textarea name="note" class="bg-white form-control" id="" style="height: 15rem" <?= ($user['status'] != 'complete') ? '' : 'readonly' ?>><?php
                                                                                                                                                                    if ($user['status'] === "complete") {
                                                                                                                                                                        if ($user['note'] === "" || $user['note'] === null) {
                                                                                                                                                                            echo 'No notes indicated';
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $user['note'];
                                                                                                                                                                        }
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $user['note'];
                                                                                                                                                                    }
                                                                                                                                                                    ?></textarea>
                    </div>

                    <div class="pb-3 pe-3 d-flex justify-content-end">
                        <?php
                        if ($user['status'] != 'complete') {
                        ?>

                            <div class="">
                                <button class="deccls" type="button" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="decacp"><?= (($user['note'] != "" || $user['note'] != null) ? 'Edit Note' : 'Add Note') ?></button>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                </div>
                <div class="pb-3 pe-3 d-flex justify-content-end">
                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast newnotetoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fad fa-pencil me-2"></i> New note has been added to this patient.</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->flashdata('addnotesuccess')) {
?>
    <script>
        $(document).ready(function() {
            $('.newnotetoast').toast('show')
        })
    </script>
<?php
}
?>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast setmeetsuccess align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully set a meet up appointment</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('successnewapp')) {
?>
    <script>
        $(document).ready(function() {
            $('.setmeetsuccess').toast('show')
        })
    </script>
<?php
}
?>




<script>
    $(document).ready(function() {

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

        $('#notebook').validate({
            rules: {
                note: "required"
            },
            messages: {
                note: errorMessage('This field is required')
            }

        })

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
        }
    })
</script>