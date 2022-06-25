<style>
    .ui-datepicker {
        width: 100%;

    }

    .ui-datepicker-prev span,
    .ui-datepicker-next span {
        background-image: none !important;
    }

    .ui-datepicker .ui-datepicker-prev-hover,
    .ui-datepicker .ui-datepicker-next-hover {
        border-radius: 50% !important;
        cursor: pointer;
        background-color: white !important;
    }


    .ui-datepicker-prev:before,
    .ui-datepicker-next:before {
        font-family: FontAwesome;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        font-weight: normal;
        align-items: center;
        justify-content: center;
    }


    .ui-datepicker .ui-datepicker-header {
        background-color: white !important;
        border: none !important;
    }



    .ui-datepicker .ui-datepicker-title {
        font-weight: 500;
    }

    .ui-datepicker table {
        width: 100%;
        font-size: .9em;
        border-collapse: collapse;
        margin: 0 0 .4em;
    }

    .ui-datepicker th {
        color: gray !important;
        font-weight: 400;
    }

    .ui-datepicker td {
        border: 0;
        padding: 1px;
    }

    .ui-datepicker td span,
    .ui-datepicker td a {
        border: 0 !important;
        text-align: center;
        height: 35px;
        width: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white !important;
        color: black !important;
        border-radius: 50%;
    }

    .ui-datepicker td a:hover {
        background-color: rgba(0, 0, 0, 0.05) !important;
    }

    .ui-datepicker td a:visited {
        border: 1px solid gray !important;
    }

    .ui-datepicker-current-day .ui-state-active {
        background-color: green !important;
        color: white !important;
    }

    .ui-datepicker-current-day .ui-state-active:hover {
        background-color: green !important;
        color: white !important;
    }



    .radiobtn {
        position: absolute;
        opacity: 0;
    }

    .radiolbl {
        border: 1px solid gray;
        width: 100%;
        height: 2.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 5px;

    }

    .radiobtn:checked~.radiolbl {
        border: 2px solid rgba(50, 150, 0);
        color: rgba(50, 150, 0);
        ;
    }

    .radioicon {
        opacity: 0;
        position: absolute;
        right: -8px;
        top: -8px;
        border-radius: 50%;
        height: 20px;
        color: rgba(50, 150, 0);
    }

    .radiobtn:checked~.radiolbl>.radioicon {
        opacity: 1;
    }

    .disableton {
        border: 1px solid lightgray;
        color: lightgray;
    }


    .setbtn:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2) !important;
    }

    .setbtn {
        height: 40px;
        border: 0;
        background-color: #1261A0;
        color: white;
        border-radius: 5px;
        outline: none;
    }
</style>
<div class="contd" style="margin-top: 4.5rem">
    <div class="mx-5 gx-0">
        <form action="<?= base_url('DoctorAuth/insertdoctorapp') ?>" method="POST" id="setappform">



            <div class="card card-body" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1)">

                <div class="row">
                    <div class="col-lg-4 position-relative">
                        <div class="position-relative">
                            <div class="position-absolute w-100 h-100" style="z-index: 10"></div>
                            <div id="datepick" class="w-100"></div>
                        </div>
                        <div class="dateerror"></div>


                    </div>
                    <div class="col-lg-8">
                        <div class="card card-body">

                            <?php
                            if ($appoint['patientType'] === 'pedia' || $appoint['patientType'] === 'others') {
                                $fullname = $appoint['lastname'] . ', ' . $appoint['firstname'] . ' ' . $appoint['middlename'];

                            ?>
                                <p class=" fw-bold" style="font-size: 14px">Patient Details</p>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Name:</p>
                                        <p><?= $fullname ?></p>
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Gender:</p>
                                        <p><?= $appoint['gender'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Birthday:</p>
                                        <p><?= date('F d, Y', strtotime($appoint['birthday'])); ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Patient type:</p>
                                        <p class="text-primary"><?= ucfirst($appoint['patientType']) ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Appointment type:</p>
                                        <p class="text-success"><?= ucfirst($appoint['appointmentType']) ?></p>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                $user_result = $this->db->query('SELECT * FROM patient WHERE ID=' . $appoint['patientID']);
                                $useraccount = $user_result->row_array();
                                $userfullname =  $useraccount['Lastname'] . ', ' . $useraccount['Firstname'] . ' ' . $useraccount['Middlename'];
                                ?>
                                <p class="text-secondary fw-bold" style="font-size: 14px">User Account Details</p>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Name:</p>
                                        <p><?= $userfullname ?></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Gender:</p>
                                        <p><?= $useraccount['Gender'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Email:</p>
                                        <p style="font-size: 1vw"><?= $useraccount['Email'] ?></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Mobile Number:</p>
                                        <p><?= $useraccount['Contact'] ?></p>
                                    </div>
                                </div>
                            <?php
                            } else {
                                $fullname = $appoint['lastname'] . ', ' . $appoint['firstname'] . ' ' . $appoint['middlename'];
                                $user_result = $this->db->query('SELECT * FROM patient WHERE ID=' . $appoint['patientID']);
                                $useraccount = $user_result->row_array();
                            ?>
                                <p class=" fw-bold" style="font-size: 14px">Patient Details</p>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Name:</p>
                                        <p><?= $fullname ?></p>
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Gender:</p>
                                        <p><?= $appoint['gender'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Birthday:</p>
                                        <p><?= date('F d, Y', strtotime($appoint['birthday'])); ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Patient type:</p>
                                        <p class="text-primary"><?= ucfirst($appoint['patientType']) ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Appointment type:</p>
                                        <p class="text-success"><?= ucfirst($appoint['appointmentType']) ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Email:</p>
                                        <p class="" style="font-size: 1vw"><?= $useraccount['Email'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-0 fw-bold" style="font-size: 14px">Mobile Number:</p>
                                        <p class="" style="font-size: 1vw"><?= $useraccount['Contact'] ?></p>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>





                            <hr>
                            <div class="row gy-2 position-relative">
                                <div class="position-absolute h-100" id="activateradio" style="z-index: 3"></div>

                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e800" name="etime" value="800" class="radiobtn rtime">

                                        <label for="e800" data-value="800" class="radiolbl position-relative etime">
                                            8:00 AM
                                            <div class="bg-white radioicon">
                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e900" value="900" name="etime" class="radiobtn rtime">

                                        <label for="e900" data-value="900" class="radiolbl position-relative etime">
                                            9:00 AM
                                            <div class="bg-white radioicon">
                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e1000" value="1000" name="etime" class="radiobtn rtime">

                                        <label for="e1000" data-value="1000" class="radiolbl position-relative etime">
                                            10:00 AM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e1100" value="1100" name="etime" class="radiobtn rtime">

                                        <label for="e1100" data-value="1100" class="radiolbl position-relative etime">
                                            11:00 AM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e100" value="100" name="etime" class="radiobtn rtime">

                                        <label for="e100" data-value="100" class="radiolbl position-relative etime">
                                            1:00 PM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e200" value="200" name="etime" class="radiobtn rtime">

                                        <label for="e200" data-value="200" class="radiolbl position-relative etime">
                                            2:00 PM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e300" value="300" name="etime" class="radiobtn rtime">

                                        <label for="e300" data-value="300" class="radiolbl position-relative etime">
                                            3:00 PM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="position-relative">
                                        <input type="radio" id="e400" value="400" name="etime" class=" radiobtn rtime">

                                        <label for="e400" data-value="400" class="radiolbl position-relative etime">
                                            4:00 PM
                                            <div class="bg-white radioicon">

                                                <i class="fa-solid fa-circle-check "></i>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="timeerror"></div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<input type="text" value="<?= $appoint['app_time'] ?>" id="thisTime" hidden>
<input type="text" value="<?= $appoint['app_date'] ?>" id="thisDate" hidden>
<script>
    $(document).ready(function() {

        $(".rtime[value=" + $('#thisTime').val() + "]").attr('checked', true);


        $('#apptime').datepicker("setDate", new Date());
        $('#datepick').datepicker({
            minDate: 1,
            beforeShowDay: $.datepicker.noWeekends,
            defaultDate: $('#thisDate').val()


        })


        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 14px"><i class="fas fa-exclamation-square"></i> ' + message + '</label>';
        }
    })
</script>