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
        border-radius: 10px;
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
                                    <div class="d-flex justify-content-center">
                                        <button class="sendmess" data-bs-toggle="modal" data-bs-target="#exampleModal">Accept</button>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button class="sendmess bg-danger" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button>
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
                                <div class="row my-5 mx-3">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <p class="mb-0 text-secondary" style="font-size: 14px">Appointment type:</p>
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
                </div>
            </div>
        </div>

        <div class="col-lg-12 d-flex justify-content-center">
            <div class="">
                <div class="card card-body border-0 app" style="border-radius: 10px; width: 43rem;">
                    <div class="p-1 " style="width: 32.5rem;border-radius: 5px;background-color: #EFF1F7">
                        <button class="bg-white px-2 py-2 btn text-primary fw-bold" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Appointment</button>
                        <button class="px-2 py-2 btn text-secondary fw-bold" style="border-radius: 5px;width: 10.5rem;font-size: 14px;">Previous Appointments</button>

                    </div>
                    <div class="card card-body border-0 mt-2 p-0" style="box-shadow: 0 4px -4px inset rgba(0,0,0,0.1);width: 95%;height: 8rem;border-radius: 10px;background-color: #EFF1F7">

                        <div class="row p-0">
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
                                            <p class="text-center f-sm text-secondary mb-0">Type</p>
                                            <p class="mb-0 text-center"><?= $apptype ?></p>
                                        </div>

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
<div class="" id="bdrop">

    <div class="popmodal p-3">
        <div class="">
            <div class="d-flex justify-content-center mt-0">
                <?= maskIcon(40, 40); ?>
            </div>
            <p class="text-center mt-1 mb-0 texttran">Other Health Condition</p>

            <div class="card card-body border-0 hsg" style="box-shadow: 0 4px 4px inset rgba(0,0,0,0.1)">
                <?php
                if ($user['healthcondition'] === null || $user['healthcondition'] === "") {
                ?>
                    <p class="text-secondary mb-0">Not stated</p>
                <?php
                } else {
                    echo $user['healthcondition'];
                }
                ?>
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
                        <button type="button" class="acp" onclick="location.href='<?= base_url('DoctorAuth/approveappointment/' . $user['ID']) ?>'">Accept</button>
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
                        <label for="" class="fs-5 ms-2 text-secondary">Decline Apppointment</label>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>

            </div>
            <form action="<?= base_url('DoctorAuth/declinereason') ?>" method="POST" id="decapp">
                <div class="bg-light rounded-3">
                    <div class="mt-3 mx-3 mb-2">
                        <label for="">Please state your reason:</label>
                        <input type="text" value="<?= $id ?>" name="ID" hidden>
                        <textarea name="reason" class="form-control" id="" style="height: 10rem"></textarea>
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
        $('#decapp').validate({
            rules: {
                reason: "required"
            },
            messages: {
                reason: errorMessage('This field is required')
            }

        })
    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }

    if ($('.Others').offset()) {
        var val = document.getElementById('Others').getBoundingClientRect();
        console.log(val.top + ', ' + val.left);
        var width = $('.Others').outerWidth();
        var height = $('.Others').outerHeight();


        $(".popmodal").css({
            top: val.top,
            left: val.left,
            position: 'absolute',
            height: height,
            width: width,
            zIndex: 999,
            backgroundColor: 'white'

        }).hide()

        $('#bdrop').addClass('hideModal')
        $('#bdrop').css({
            color: 'black'
        })


    } else {
        $('.popmodal').hide();
    }
    var scbody = window.innerWidth - $(document).width()


    $('.viewton').click(function() {
        $('.popmodal').animate({
            height: '10rem',
            width: '20rem',
            top: '10rem',
            left: 800,
            backgroundColor: 'rgba(48, 75, 139,0.4)'
        }).show()
        $('.texttran').animate({
            color: 'white'
        })
        $('#bdrop').addClass('openModal')
        $('#bdrop').removeClass('hideModal')
        $('body').css('overflow-y', 'hidden');

        $('.adj').addClass('me-4')
    })


    $('.viewton').focusout(function() {
        var pos = $('.viewton').offset()
        $('.popmodal').animate({
            top: val.top,
            left: val.left,
            height: height,
            width: width,
            backgroundColor: 'white'

        }, function() {
            $('.popmodal').hide()
        });
        $('.texttran').animate({
            color: 'black'
        })
        $('#bdrop').addClass('hideModal')
        $('#bdrop').removeClass('openModal')
        $('body').css('overflow-y', 'visible');
        $('.adj').removeClass('me-4')




    })
</script>