<style>
    .ul li {
        margin-left: 5rem;
        /*see me */
    }

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

<div class="d-flex justify-content-center mb-5" style="">

    <div style="width: 50rem">
        <div class="card card-body border-0 mt-4">
            <p class="mb-0 fw-bold">Appointment List</p>
            <hr>
            <table class="table" id="walkintb" style="width: 100%">
                <thead class="table-secondary">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $user = $this->db->query('SELECT * FROM doctor_appointment');
                    foreach ($user->result_array() as $user) {

                        switch ($user['app_time']) {
                            case 800:
                                $time = '8:00 AM';
                                break;
                            case 900:
                                $time = '9:00 AM';
                                break;
                            case 1000:
                                $time = '10:00 AM';
                                break;
                            case 1100:
                                $time = '11:00 AM';
                                break;
                            case 100:
                                $time = '1:00 PM';
                                break;
                            case 200:
                                $time = '2:00 PM';
                                break;
                            case 300:
                                $time = '3:00 PM';
                                break;
                            case 400:
                                $time = '4:00 PM';
                                break;
                        }
                        $fullname = $user['lastname'] . ', ' . $user['firstname'] . ' ' . $user['middlename'];
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= ucfirst($user['appointmentType']) ?></td>
                            <td><?= $user['app_date'] ?></td>
                            <td><?= $time ?></td>
                            <td>
                                <button data-bday="<?= $user['birthday'] ?>" data-apptype="<?= ucfirst($user['appointmentType']) ?>" data-ptype="<?= 'For ' . ucfirst($user['patientType']) ?>" data-gender="<?= $user['gender'] ?>" data-fullname="<?= $fullname ?>" data-appdate="<?= $user['app_date'] ?>" data-apptime="<?= $user['app_time'] ?>" class="btn btn-primary btn-sm w-100 viewdt" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>


            </table>
        </div>

    </div>
</div>
<!-- <?= date('F d, Y', strtotime($appoint['birthday'])); ?> -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card card-body" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1)">

                <div class="row">
                    <div class="col-lg-4 position-relative">
                        <div class="position-relative">
                            <div class="position-absolute w-100 h-100" style="z-index: 10"></div>
                            <div id="datepick" class="w-100"></div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-body">
                            <p class=" fw-bold" style="font-size: 14px">Patient Details</p>
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="mb-0 fw-bold" style="font-size: 14px">Name:</p>
                                    <p id="fname"></p>
                                </div>

                                <div class="col-lg-4">
                                    <p class="mb-0 fw-bold" style="font-size: 14px">Gender:</p>
                                    <p id="gnd"></p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="mb-0 fw-bold" style="font-size: 14px">Birthday:</p>
                                    <p id="bday"></p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="mb-0 fw-bold" style="font-size: 14px">Patient type:</p>
                                    <p class="text-primary" id="ptype"></p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="mb-0 fw-bold" style="font-size: 14px">Appointment type:</p>
                                    <p class="text-success" id="aptype"></p>
                                </div>

                            </div>
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

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var date;

        $(document).on('click', '.viewdt', function() {
            var apptime = $(this).data('apptime')
            var appdate = $(this).data('appdate')
            var fullname = $(this).data('fullname')
            var gender = $(this).data('gender')
            var ptype = $(this).data('ptype')
            var apptype = $(this).data('apptype')
            var bday = $(this).data('bday')

            $('#fname').text(fullname)
            $('#gnd').text(gender)
            $('#ptype').text(ptype)
            $('#aptype').text(apptype)
            $('#bday').text(bday)

            $('#datepick').datepicker({
                minDate: 1,
                beforeShowDay: $.datepicker.noWeekends,
                defaultDate: appdate
            })

            $(".rtime[value=" + apptime + "]").attr('checked', true);

        })



        // $('#datepick').datepicker({
        //     minDate: 1,
        //     beforeShowDay: $.datepicker.noWeekends,
        //     defaultDate: $('#thisDate').val()
        // })


    })



    $(document).ready(function() {
        var table = $('#walkintb').DataTable();

    });
</script>