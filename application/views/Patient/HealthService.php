<style>
    .cardimg {
        background-image: url("<?= base_url('assets/images/pastel3.jpg') ?>");
        background-size: cover;
    }

    .cardimg1 {
        background-image: url("<?= base_url('assets/images/sunny.jpg') ?>");
        background-size: cover;
    }

    .cardimg2 {
        background-image: url("<?= base_url('assets/images/dunno.jpg') ?>");
        background-size: cover;
    }

    .form-control,
    .form-select,
    .btn,
    .btn-close,
    .page-link {
        box-shadow: none !important;
    }

    th {
        border-bottom: 1px solid lightgray !important;
    }

    td {
        height: 40px;
        vertical-align: middle;
    }

    .ell {
        width: 25px;
        height: 25px;
        background-color: rgba(0, 0, 0, 0.10);
        border-radius: 50%;
        cursor: pointer;
    }

    .ell:hover {
        background-color: rgba(0, 0, 0, 0.20);
    }

    .ell:active {
        transform: scale(0.95);
    }

    .histcard {
        border-radius: 10px !important;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.10) !important;

    }

    .histbtn {
        border: 2px solid white;
        background-color: white;
        border-radius: 0;
        outline: none;

    }

    .histbtn:not(.active):hover {
        border-bottom: 2px solid lightblue;
    }

    .active {
        border-bottom: 2px solid blue;
        color: blue;

    }

    #histTable td:first-child {
        margin-left: 10px !important;
    }

    #histTable td:not(:first-child),
    th:not(:first-child) {
        text-align: center;
    }

    .kebbtn {
        color: rgba(0, 0, 0, 0.8);
        font-size: 20px;
        text-align: center;
        /* width: 30px; */
        border-radius: 50%;
        padding: 1.5px 5px 1.5px 5px;
        background-color: lightgray;
    }

    .bgannouncement {
        background-image: url("<?= base_url('assets/images/imann.jpg') ?>");
        height: 8rem;
        background-size: 25rem;
        background-position: 200%;
        background-repeat: no-repeat;
        display: flex;
        justify-content: space-between;
        /* filter: brightness(90%) */
        background-color: #F5F5F5;
    }

    .announcement_title {
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
        background-color: #673ab7;
        padding-top: 20px;
        color: white;
        font-size: 18px;
    }

    .btnserv {
        border: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 5px 10px 5px 10px;
        margin-left: 5px;
        outline: none;
    }

    .inactiveserv {
        background-color: #311b92;
        color: white;
    }

    .activeserv {
        background-color: white;
    }

    .accordion-button {
        box-shadow: none !important;

    }

    .inactiveserv:hover {
        filter: brightness(110%);
    }
</style>

<div class="cont" style="margin-top: 3.5rem">
    <div class="mx-5">
        <div class="">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <?php
                    $message = $this->session->flashdata('insert_success');
                    if ($message) {

                    ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible fade show py-2 complete" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i>You have successfully set an appointment.
                                <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php
                    }
                    if ($user['Profile'] === null || $user['Profile'] === "") {
                    ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning alert-dismissible fade show py-2 complete" role="alert">
                                <i class="fa-solid fa-user me-2 changecol"></i> Complete your profile by uploading a photo of you. <a href="<?= base_url('P/Account') ?>">Click here</a>
                                <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                    <div class="row gx-3 gy-3">
                        <div class="col-lg-4 col-md-4">
                            <div class="card cardimg1  card-body border-0" style="border-radius: 10px; box-shadow: 0 4px 4px rgba(0,0,0,0.10)">

                                <div class="d-flex justify-content-center">
                                    <?= pediaIcon(60, 60) ?>
                                </div>
                                <label class="text-center text-dark mt-2 fw-bold">FOR PEDIA</label>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-dark px-5 btn-sm mt-2 rounded-pill" onclick="location.href='<?= base_url('P/ForPedia') ?>'">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card cardimg card-body border-0" style="border-radius: 10px; box-shadow: 0 4px 4px rgba(0,0,0,0.10)">
                                <div class="d-flex justify-content-center">
                                    <?= myselfIcon(60, 60) ?>
                                </div>
                                <label class="text-center text-dark mt-2 fw-bold">FOR MYSELF</label>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-dark px-5 btn-sm mt-2 rounded-pill" onclick="location.href='<?= base_url('P/ForMyself') ?>'">Select</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card cardimg2 card-body border-0" style="border-radius: 10px; box-shadow: 0 4px 4px rgba(0,0,0,0.10)">
                                <div class="d-flex justify-content-center">
                                    <?= othersIcon(60, 60) ?>
                                </div>
                                <label class="text-center text-dark mt-2 fw-bold">FOR OTHERS</label>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-dark px-5 btn-sm mt-2 rounded-pill" onclick="location.href='<?= base_url('P/ForOthers') ?>'">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-body mt-3 border-0 histcard px-0">
                        <div class="d-flex justify-content-between">
                            <p class="ms-3  fs-5">Appointments</p>
                            <a href="javascript:void(0)" class="ms-3 me-3 text-decoration-none" id="viewanna">View Announcement</a>
                        </div>
                        <div class="d-flex ms-2">
                            <button class="histbtn active me-2" id="pendingbtn">Pending (<span id="pencount"></span>)</button>
                            <button class="histbtn me-2" id="approvebtn">Approved (<span id="appcount"></span>)</button>
                            <button class="histbtn text-success" id="completebtn">Completed (<span id="comcount"></span>)</button>
                            <button class="histbtn text-danger" id="declinebtn">Declined (<span id="declinecount"></span>)</button>
                            <button class="histbtn text-secondary" id="referbtn">Referral (<span id="refercount"></span>)</button>
                            <button class="histbtn text-dark" id="canbtn">Cancelled (<span id="cancount"></span>)</button>
                        </div>
                        <hr>
                        <div class="px-3">
                            <div class="card card-body rounded-0">
                                <table id="histTable" class="table" style="width:100%">
                                    <colgroup>
                                        <col span="1" style="width: 18%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 5%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th hidden></th>
                                            <th style="text-indent: 15px">Name</th>
                                            <th style="text-align: center">Date</th>
                                            <th style="text-align: center">Time</th>
                                            <th style="text-align: center">Patient type</th>
                                            <th style="text-align: center">Appointment type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" style="">

        <div class="bg-white" style="border-radius: 10px;">
            <div class="announcement_title position-relative modal-content border-0 rounded-0">
                <p class="text-center fs-5">📣 Important Announcement</p>
                <div class="d-flex ">
                    <button class="btnserv activeserv openserv">Services</button>
                    <button class="btnserv inactiveserv docsched">Doctor's Schedule</button>
                </div>
                <button type="button" style="top: 10px; right: 10px;" class="position-absolute btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="card card-body border-0 modal-content">
                <div class="accordion serviceslist" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fad fa-syringe me-2 "></i>AVAILABLE VACCINES FOR PEDIA
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="px-2">
                                    <ul>

                                        <?php
                                        $pedia = $this->db->query('SELECT * FROM immunization');
                                        if ($pedia->num_rows() > 0) {
                                            foreach ($pedia->result_array() as $data) {
                                                echo '<li>' . $data['Name'] . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fad fa-tooth me-2"></i> AVAILABLE DENTAL SERVICES
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>

                                    <?php
                                    $dental = $this->db->query('SELECT * FROM dental');
                                    if ($dental->num_rows() > 0) {
                                        foreach ($dental->result_array() as $data) {
                                            echo '<li>' . $data['Name'] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fad fa-baby-carriage me-2"></i> AVAILABLE PRENATAL SERVICES
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>

                                    <?php
                                    $prenatal = $this->db->query('SELECT * FROM prenatal');
                                    if ($prenatal->num_rows() > 0) {
                                        foreach ($prenatal->result_array() as $data) {
                                            echo '<li>' . $data['Name'] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion doclist" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button">
                                <i class="fad fa-notes-medical me-2 "></i> DOCTOR SCHEDULES
                            </button>
                        </h2>
                        <div id="asfasf" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#asfas">
                            <div class="accordion-body">
                                <div class="px-2 mt-2 rounded">
                                    <?php

                                    ?>
                                    <p class="fw-bold fs-5 mb-0">MIDWIFE</p>
                                    <div>
                                        <?php
                                        $selectdocmidwife = $this->db->query('SELECT * FROM doctor WHERE Medical="midwife"');
                                        foreach ($selectdocmidwife->result_array() as $data) {
                                            $fullname = 'Dr. ' . $data['Lastname'] . ', ' . $data['Firstname'] . ' ' . $data['Middlename'];
                                            $selectsched = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $data['ID']);
                                        ?>

                                            <div class="d-flex mb-2 align-items-center">
                                                <img src="<?= base_url('uploads/Doctor/' . $data['Picture']) ?>" class="rounded-circle" height="40" width="40" alt="">
                                                <p class="mb-0 fs-5 ms-2"><?= $fullname ?></p>
                                            </div>
                                            <table class="table border">



                                                <?php
                                                foreach ($selectsched->result_array() as $dt) {
                                                ?>
                                                    <tr class="<?= (arraymaker($dt['monday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Monday</td>
                                                        <td><?= arraymaker($dt['monday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>
                                                        <td><?= arraymaker($dt['monday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['tuesday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Tuesday</td>
                                                        <td><?= arraymaker($dt['tuesday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['tuesday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['wednesday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Wednesday</td>
                                                        <td><?= arraymaker($dt['wednesday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['wednesday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['thursday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Thursday</td>
                                                        <td><?= arraymaker($dt['thursday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['thursday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['friday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Friday</td>
                                                        <td><?= arraymaker($dt['friday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['friday'])[2] ?></td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </table>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <p class="fw-bold fs-5 mb-0">DENTIST</p>
                                    <div>
                                        <?php
                                        $selectdocdental = $this->db->query('SELECT * FROM doctor WHERE Medical="dentist"');
                                        foreach ($selectdocdental->result_array() as $data) {
                                            $fullname = 'Dr. ' . $data['Lastname'] . ', ' . $data['Firstname'] . ' ' . $data['Middlename'];
                                            $selectsched = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $data['ID']);
                                        ?>
                                            <div class="d-flex mb-2 align-items-center">
                                                <img src="<?= base_url('uploads/Doctor/' . $data['Picture']) ?>" class="rounded-circle" height="40" width="40" alt="">
                                                <p class="mb-0 fs-5 ms-2"><?= $fullname ?></p>
                                            </div>
                                            <?php
                                            foreach ($selectsched->result_array() as $dt) {
                                            ?>
                                                <table class="table border">
                                                    <tr class="<?= (arraymaker($dt['monday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Monday</td>
                                                        <td><?= arraymaker($dt['monday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>
                                                        <td><?= arraymaker($dt['monday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['tuesday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Tuesday</td>
                                                        <td><?= arraymaker($dt['tuesday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['tuesday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['wednesday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Wednesday</td>
                                                        <td><?= arraymaker($dt['wednesday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['wednesday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['thursday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Thursday</td>
                                                        <td><?= arraymaker($dt['thursday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['thursday'])[2] ?></td>
                                                    </tr>
                                                    <tr class="<?= (arraymaker($dt['friday'])[0] === "no") ? 'd-none' : '' ?>">
                                                        <td>Friday</td>
                                                        <td><?= arraymaker($dt['friday'])[1] ?></td>
                                                        <td class="fw-bold">to</td>

                                                        <td><?= arraymaker($dt['friday'])[2] ?></td>
                                                    </tr>
                                                </table>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <p class="text-center mt-2" style="font-size: 14px">For emergency you can walk-in to our center located at <i><b>Sitio Tanag, Barangay San Isidro, Rodriguez Rizal</b></i> or you can call us <i><b>09222839099</b></i></p>

            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('.doclist').hide();


        $('.openserv').click(function() {
            $('.serviceslist').show();
            $('.doclist').hide();
            $(this).addClass('activeserv').removeClass('inactiveserv');
            $('.docsched').removeClass('activeserv').addClass('inactiveserv');
        })

        $('.docsched').click(function() {
            $('.serviceslist').hide();
            $('.doclist').show();
            $(this).addClass('activeserv').removeClass('inactiveserv');
            $('.openserv').removeClass('activeserv').addClass('inactiveserv');
        })



        // $('#dns').click(function() {
        //     if ($(this).is(':checked')) {
        //         localStorage.setItem('dnstr', 'true');
        //     } else {
        //         localStorage.removeItem('dnstr');
        //     }
        // })

        $('#viewanna').click(function() {
            $('#announcementModal').modal('show');

        })

        // $(window).on('load', function() {
        //     if (localStorage.getItem('dnstr')) {
        //         $('#dns').prop("checked", true);

        //     } else {
        //         $('#announcementModal').modal('show');
        //         $('#dns').prop("checked", false);


        //     }
        // });







        displayTable('pending')
        var base_url = window.location.origin;
        $('#approvebtn').click(function() {
            $(this).addClass('active')
            $('#completebtn').removeClass('active')
            $('#pendingbtn').removeClass('active')
            $('#declinebtn').removeClass('active')
            $('#referbtn').removeClass('active')

            displayTable('approve')

        })
        $('#completebtn').click(function() {
            $(this).addClass('active')
            $('#approvebtn').removeClass('active')
            $('#pendingbtn').removeClass('active')
            $('#declinebtn').removeClass('active')
            $('#referbtn').removeClass('active')
            $('#canbtn').removeClass('active')


            displayTable('complete')

        })
        $('#pendingbtn').click(function() {
            $(this).addClass('active')
            $('#approvebtn').removeClass('active')
            $('#completebtn').removeClass('active')
            $('#declinebtn').removeClass('active')
            $('#referbtn').removeClass('active')
            $('#canbtn').removeClass('active')


            displayTable('pending')

        })
        $('#declinebtn').click(function() {
            $(this).addClass('active')
            $('#approvebtn').removeClass('active')
            $('#completebtn').removeClass('active')
            $('#pendingbtn').removeClass('active')
            $('#referbtn').removeClass('active')
            $('#canbtn').removeClass('active')

            displayTable('declined')

        })
        $('#referbtn').click(function() {
            $(this).addClass('active')
            $('#approvebtn').removeClass('active')
            $('#completebtn').removeClass('active')
            $('#pendingbtn').removeClass('active')
            $('#declinebtn').removeClass('active')
            $('#canbtn').removeClass('active')
            displayTable('referred')

        })
        $('#canbtn').click(function() {
            $(this).addClass('active')
            $('#approvebtn').removeClass('active')
            $('#completebtn').removeClass('active')
            $('#pendingbtn').removeClass('active')
            $('#declinebtn').removeClass('active')
            $('#referbtn').removeClass('active')
            displayTable('cancel')

        })


        setInterval(countapp('#pencount', 'pending'), 500)
        setInterval(countapp('#appcount', 'approve'), 500)
        setInterval(countapp('#comcount', 'complete'), 500)
        setInterval(countapp('#declinecount', 'declined'), 500)
        setInterval(countapp('#refercount', 'referred'), 500)
        setInterval(countapp('#cancount', 'cancel'), 500)

        function countapp(idname, status) {
            $.ajax({
                url: '<?= base_url('AjaxRequest/countAppointment') ?>',
                method: "POST",
                data: {
                    status: status,
                },
                success: function(data) {
                    $(idname).text(data)
                }
            })
        }




        function displayTable(status) {

            $('#histTable').DataTable({
                "serverSide": false,
                destroy: true,
                "ajax": {
                    "url": "<?= base_url('AjaxRequest/patientAppointmentAjax') ?>",
                    "type": "POST",
                    // dataType: 'json',
                    data: {
                        status: status
                    }

                },
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }],
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "time"
                    },
                    {
                        "data": "patientType"
                    },
                    {
                        "data": "appType"
                    }, {
                        sortable: false,
                        "render": function(data, type, full, meta) {
                            return '<a href="' + base_url + '/P/ViewAppointment/' + full.id + '" class="kebbtn"><i class="fa-solid fa-ellipsis"></i></a>';
                        }
                    },
                ],
                "order": [
                    [0, 'desc']
                ]
            });
        }

    })
</script>



<!-- <div class="card card-body mt-3 border-0" style="border-radius: 10px;box-shadow: 0 4px 4px rgba(0,0,0,0.10)">
                        <div class="card card-body py-2 bg-light border-0 mb-2" style="border-radius: 10px">
                            <label style="color: #005AE8" class="fw-bold">APPOINTMENT HISTORY</label>
                        </div>
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-indent: 15px">Name</th>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Time</th>
                                    <th style="text-align: center">Patient type</th>
                                    <th style="text-align: center">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($app as $data) {
                                switch ($data['app_time']) {
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
                                switch ($data['type']) {
                                    case 'pedia':
                                        $type = 'For Pedia';
                                        break;
                                    case 'myself':
                                        $type = 'For Myself';
                                        break;
                                    case 'others':
                                        $type = 'For Others';
                                        break;
                                    default:
                                        $time = "wrong time";
                                }
                                switch ($data['status']) {
                                    case 'pending':
                                        $statclass = 'text-danger';
                                        $stats = 'Pending';
                                        break;
                                    case 'approve':
                                        $statclass = 'text-success';
                                        $stats = 'Approve';

                                        break;
                                    case 'completed':
                                        $statclass = 'text-primary';
                                        $stats = 'Completed';
                                        break;
                                    default:
                                        $time = "wrong time";
                                }
                                $fullname = $data['lastname'] . ', ' . $data['firstname'] . ' ' . $data['middlename'];
                            ?>
                                    <tr>
                                        <td style="text-indent: 15px"><?= $fullname ?></td>
                                        <td style="text-align: center"><?= date('M d, Y', strtotime($data['app_date']));  ?></td>
                                        <td style="text-align: center"><?= $time ?></td>
                                        <td style="text-align: center"><?= $type ?></td>
                                        <td style="text-align: center" class="<?= $statclass ?>"><?= $stats ?></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <div class="ell d-flex justify-content-center align-items-center">
                                                <i class="far fa-ellipsis-h"></i>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                            }
                                ?>


                            </tbody>
                        </table>
                    </div> -->