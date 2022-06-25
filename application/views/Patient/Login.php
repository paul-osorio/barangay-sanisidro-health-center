<style>
    body {
        overflow: hidden;
    }

    .form-control {
        box-shadow: none !important;
    }

    .lbtn {
        background-color: #2F4A8A;
        border: 0;
        border-radius: 3px;
        padding-top: 13px;
        padding-bottom: 13px;
        padding-left: 15px;
        color: white;
        font-size: 18px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .lbtn:hover {
        background-color: #243B74;
    }

    .lbtn:active {
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.25);
        transform: translateY(3px);
    }

    .imgb {
        top: -50px;
    }

    .fpass {
        text-decoration: none;
        font-size: 14px;
        color: gray;
    }

    .bgannouncement {
        background-image: url("<?= base_url('assets/images/imann.jpg') ?>");
        height: 8rem;
        background-size: 25rem;
        background-position: 50%;
        background-repeat: no-repeat;
        display: flex;
        justify-content: space-between;
        /* filter: brightness(90%) */
        background-color: #F5F5F5;
    }


    .btn-close {
        box-shadow: none !important;
    }

    .annscroll::-webkit-scrollbar {
        width: 5px;
        background-color: lightgray;
    }

    .annscroll::-webkit-scrollbar-thumb {
        width: 5px;
        background-color: gray;
        border-radius: 50px;
    }

    .announcement_title {
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
        background-color: #5e35b1;
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

    .inactiveserv:hover {
        filter: brightness(110%);
    }

    .activeserv {
        background-color: white;
    }

    .accordion-button {
        box-shadow: none !important;

    }
</style>
<nav class="navbar navbar-light bg-white my-0 py-1 ps-0" style="z-index: 3;box-shadow: 0px 0px 9px -3px rgba(0, 0, 0, 0.25);">
    <div class="d-flex justify-content-between w-100 align-items-center">
        <div class="ms-4">
            <img src="<?= base_url('assets/images/logosanisi.png') ?>" height="50" width="50" alt="">

            <label style="color: #2F4A8A;" class="fw-bold">
                BARANGAY SAN ISIDRO HEALTH CENTER

            </label>
        </div>
        <div class="d-flex">
            <div class="me-2 pe-2" style="border-right: 1px solid gray">
                <a href="javascript:void(0)" id="viewanna">View Announcement</a>
            </div>
            <div class="me-3">
                Emergency? Directly contact us: <span class="text-primary" id="brgycontactnum" style="cursor: pointer">+639222839099</span>
            </div>
        </div>
    </div>
</nav>

<div class="row g-0">
    <div class="col-lg-6">
        <div class="d-flex justify-content-center align-items-center" style="height: 85vh">
            <div style=" width: 20rem">
                <div class="">
                    <div class="d-flex justify-content-center">

                        <?= patientloginIcon(80, 80) ?>
                    </div>
                    <p class="text-center text-dark fs-5">Patient Login</p>

                </div>
                <form action="<?= base_url('PatientAuth/login') ?>" id="login" method="POST">
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" value="<?= $this->session->flashdata('email') ?>" name="email" id="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="emailerror"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="name@example.com">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="passworderror">
                            <?= loginError($this->session->flashdata('password_error'), 'Wrong Password') ?>

                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('P/ForgotPasswordEmail') ?>" class="mb-0 fpass">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="lbtn d-flex justify-content-between w-100">
                        Sign In <?= arrowright(25, 25) ?>
                    </button>
                    <p class="text-center mb-0">Don't have an account? <a href="<?= base_url('P/Register') ?>" class="link-primary text-decoration-none">Sign Up</a></p>
                    <hr class="mb-1">
                    <p class="text-secondary text-center" style="font-size: 14px;">or login as</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-4" onclick="location.href='<?= base_url('D/Login') ?>'">Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="d-flex justify-content-center position-relative">
            <img src="<?= base_url('assets/images/Patient_Login.png') ?>" class="imgb position-absolute" height="700" alt="">
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
                <div class="form-check ms-2" style="cursor: pointer">
                    <input class="form-check-input" style="cursor: pointer" type="checkbox" value="" id="dns">
                    <label class="form-check-label" style="cursor: pointer" for="dns">
                        Do not show this again
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- <div class=" modal fade" id="announcementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="">
                        <div class="modal-content border-0">
                            <div class="bgannouncement px-2 pt-2 rounded shadow">
                                <div class="annheadimg"></div>
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="pb-2 annscroll" style="height: 30rem; overflow-y: auto">
                                <div class="row gx-0">
                                    <div class="col-lg-6" style="border-right: 1px solid gray;">
                                        <div class="p-2" style="background-color: #FFAB00">
                                            <p class=" mb-0 fw-bold text-white ms-2" style="font-size: 19px"><i class="fas fa-syringe"></i> AVAILABLE VACCINES FOR PEDIA</p>
                                        </div>
                                        <div class="px-2 mt-2">
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
                                        <div class="p-2 " style="background-color: #AA00FF">
                                            <p class=" mb-0 text-white  fw-bold ms-2" style="font-size: 19px"><i class="fas fa-tooth"></i> AVAILABLE DENTAL SERVICES</p>
                                        </div>
                                        <div class="px-2 mt-2">
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

                                        <div class="p-2 " style="background-color: #F50057">
                                            <p class="mb-0 text-white  fw-bold ms-2" style="font-size: 19px"><i class="fas fa-baby-carriage"></i> AVAILABLE PRENATAL SERVICES</p>
                                        </div>
                                        <div class="px-2 mt-2">
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
                                    <div class="col-lg-6">

                                        <div class="p-2 " style="background-color: #304FFE">
                                            <p class=" mb-0 text-white fw-bold ms-2" style="font-size: 19px"><i class="fas fa-notes-medical"></i> DOCTOR SCHEDULES</p>
                                        </div>
                                        <div class="px-2 mt-2 rounded">
                                            <?php

                                            ?>
                                            <ul>
                                                <li class="fw-bold">MIDWIFE</li>
                                                <div>
                                                    <?php
                                                    $selectdocmidwife = $this->db->query('SELECT * FROM doctor WHERE Medical="midwife"');
                                                    foreach ($selectdocmidwife->result_array() as $data) {
                                                        $fullname = 'Dr. ' . $data['Lastname'] . ', ' . $data['Firstname'] . ' ' . $data['Middlename'];
                                                        $selectsched = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $data['ID']);
                                                    ?>
                                                        <p class="fw-bold"><?= $fullname ?></p>
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
                                                <li class="fw-bold">DENTIST</li>
                                                <div>
                                                    <?php
                                                    $selectdocdental = $this->db->query('SELECT * FROM doctor WHERE Medical="dentist"');
                                                    foreach ($selectdocdental->result_array() as $data) {
                                                        $fullname = 'Dr. ' . $data['Lastname'] . ', ' . $data['Firstname'] . ' ' . $data['Middlename'];
                                                        $selectsched = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $data['ID']);
                                                    ?>
                                                        <p class="fw-bold"><?= $fullname ?></p>
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
                                            </ul>

                                            <hr>

                                            <p class="text-center">For emergency you can walk-in to our center located at 'Sitio Tanag, Barangay San Isidro, Rodriguez Rizal' or you can call us +639222839099</p>
                                            <div class="form-check" style="cursor: pointer">
                                                <input class="form-check-input" style="cursor: pointer" type="checkbox" value="" id="dns">
                                                <label class="form-check-label" style="cursor: pointer" for="dns">
                                                    Do not show this again
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->








<script>
    $('#dns').click(function() {
        if ($(this).is(':checked')) {
            localStorage.setItem('dnst', 'true');
        } else {
            localStorage.removeItem('dnst');

        }
    })
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




    $('#viewanna').click(function() {
        $('#announcementModal').modal('show');

    })


    $('#brgycontactnum').click(function() {
        copyText('+639222839099');
    })
    $(window).on('load', function() {
        if (localStorage.getItem('dnst')) {
            $('#dns').prop("checked", true);

        } else {
            $('#announcementModal').modal('show');
            $('#dns').prop("checked", false);


        }
    });



    function copyText(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $(document).ready(() => {


        $('#login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/checkemailLogin') ?>",
                        type: "POST",
                        data: {
                            email: () => {
                                return $('#email').val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    remote: {
                        url: "<?= base_url('PatientAuth/noreloadlogin') ?>",
                        type: "POST",
                        data: {
                            email: () => {
                                return $('#email').val();
                            },
                            password: () => {
                                return $('#password').val();
                            }
                        }
                    }
                }
            },
            messages: {
                email: {
                    required: errorMessage('Please enter your email address'),
                    email: errorMessage('Invalid email address'),
                    remote: errorMessage('Email not found'),
                },
                password: {
                    required: errorMessage('Please enter your password'),
                    remote: errorMessage('Password do not match')
                }

            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "email") {
                    $(".emailerror").html(error);
                } else if (element.attr("name") == "password") {
                    $(".passworderror").html(error);

                }
            },
        })
    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>