<style>
    .viewBtn {
        background-color: rgba(0, 0, 0, 0.20);
        border: 0;
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        width: 100%;
        cursor: pointer;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.70)
    }

    .chckicon {
        fill: dodgerblue;
    }

    .form-control,
    .form-select,
    .page-link,
    .btn-close {
        box-shadow: none !important;
    }

    .page-link:hover {
        background-color: dodgerblue !important;
    }

    .viewBtn:hover {
        background-color: rgba(0, 0, 0, 0.30);

    }

    .checkBtn:hover {
        background-color: #155ABA;
    }

    .viewBtn:active,
    .checkBtn:active {
        box-shadow: inset 0px 3px 3px rgba(0, 0, 0, 0.25);
        transform: translateY(2px);
    }

    .checkBtn {
        background-color: #1260CC;
        border: 0;
        border-radius: 50px;
        padding: 0 15px 0 15px;
        margin-right: 5px;
        color: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

    }

    .dataTables_filter,
    .dataTables_info {
        display: none;
    }

    td {
        background-color: white !important;
        height: 50px;
        vertical-align: middle;
        border-bottom: 0;
    }



    th {
        border-bottom: 2px solid #818BC0 !important;
        text-align: start;
        font-size: 15px;
        text-align: center;
        color: rgba(0, 0, 0, 0.60);
    }

    #searchtb {
        width: 20rem;
        border: 0;
        outline: none;
        background-color: #F7F8FC;
        border-radius: 5px;
        text-indent: 40px;
        height: 40px;
    }

    #searchtb::-webkit-input-placeholder {}

    .dataTable>thead>tr>th[class*="sort"]::after {
        display: none
    }

    .dataTable>thead>tr>th[class*="sort"]::before {
        display: none
    }

    .srchicon {
        left: 10px;
        font-size: 20px;
        color: gray;
        vertical-align: middle;
    }

    #sortBy {
        width: 8rem;
        border: 0;
        outline: none;
        background-color: #F7F8FC;
        border-radius: 5px;
        height: 40px;
        cursor: pointer;
    }

    #filtr {
        width: 8rem;
        border: 0;
        outline: none;
        background-color: #F7F8FC;
        border-radius: 5px;
        height: 40px;
        cursor: pointer;
    }

    tr:nth-child(2n+1)>td {
        background-color: #F7F8FC !important;
    }

    .daycount {
        color: gray;
        font-size: 12px;
    }

    .fn {
        text-align: start !important;
        text-indent: 50px;
    }

    #searchtb:focus {
        box-shadow: 0 2px 4px rgba(0, 25, 255, 0.20) !important;
        transition: .2s;
    }

    .card {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.10) !important;
    }

    .res {
        border: none !important;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        background-color: darkkhaki;
        color: white;
        outline: none;
    }

    .res:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.10) !important;
    }
</style>

<div class="contd" style="margin-top: 4.5rem">
    <div class="row mx-3 mb-4 ">
        <div class="col-lg-12">

            <div class="card card-body border-0 px-4" style="border-radius: 10px;">
                <h5 style="color:#304B8B" class="fw-bold">Appointments</h5>
                <hr class="my-1">
                <div class="d-flex justify-content-between mt-2">
                    <div class="d-flex align-items-center position-relative">
                        <input type="text" id="searchtb" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass position-absolute srchicon"></i>
                    </div>

                    <div class="d-flex">
                        <button class="res">Reset</button>
                        <select id="filtr" class="form-select me-2">
                            <option value="0" selected disabled>Filtr by</option>
                            <option value="For Pedia">For Pedia</option>
                            <option value="For Myself">For Myself</option>
                            <option value="For Others">For Others</option>
                        </select>
                        <select id="sortBy" class="form-select">
                            <option value="0" selected disabled>Sort by</option>
                            <option value="Name">Name</option>
                            <option value="Date">Date</option>
                            <option value="Time">Time</option>
                            <option value="Type">Patient Type</option>
                            <option value="AppType">Appointment Type</option>
                        </select>
                    </div>
                </div>


                <table id="appointmentTable" class="table" style="width:100%">
                    <colgroup>
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 5%;">


                    </colgroup>
                    <thead>
                        <tr class="text-center">
                            <th hidden>ID</th>
                            <th class="fn">Name</th>
                            <th>Gender</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient Type</th>
                            <th>Type</th>
                            <th class="px-0">Action</th>
                            <th hidden>time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($patient as $user) {
                            $midname = (($user['middlename'] === "" || $user['middlename'] === null) ? '' : $user['middlename'][0] . '.');
                            $time = '';
                            if ($user['app_time'] === '830') {
                                $time = '8:30 am';
                                $time1 = 1;
                            } elseif ($user['app_time'] === '930') {
                                $time = '9:30 am';
                                $time1 = 2;
                            } elseif ($user['app_time'] === '1030') {
                                $time = '10:30 am';
                                $time1 = 3;
                            } elseif ($user['app_time'] === '1130') {
                                $time = '11:30 am';
                                $time1 = 4;
                            } elseif ($user['app_time'] === '130') {
                                $time = '1:30 pm';
                                $time1 = 5;
                            } elseif ($user['app_time'] === '230') {
                                $time = '2:30 pm';
                                $time1 = 6;
                            } elseif ($user['app_time'] === '330') {
                                $time = '3:30 pm';
                                $time1 = 7;
                            } elseif ($user['app_time'] === '430') {
                                $time = '4:30 pm';
                                $time1 = 8;
                            }
                            $now = date('d');
                            $your_date = date('d', strtotime($user['app_date']));
                            $datediff = $your_date - $now;




                        ?>
                            <tr>
                                <td hidden><?= $user['ID'] ?></td>
                                <td class="fn"><?= $user['lastname'] . ', ' . $user['firstname'] . ' ' . $midname ?></td>
                                <td class="d-flex align-items-center justify-content-center">

                                    <label>
                                        <?= $user['gender']  ?>
                                    </label>

                                </td>
                                <td class="">
                                    <div class="d-flex justify-content-center">
                                        <div class="">
                                            <label for="" class="d-block"><?= date("m-d-Y", strtotime($user['app_date'])) ?></label>
                                            <label for="" class="d-block daycount">in <?= $datediff ?> days</label>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><?= $time ?></td>

                                <td class="text-center"><?= 'For ' . ucfirst($user['type']) ?></td>
                                <td class="text-primary"><?= ucfirst($user['app_type']) ?></td>
                                <td class="px-0">

                                    <div class="viewBtn py-1 px-2 d-flex justify-content-center" onclick="location.href='<?= base_url('D/ViewAppointment/' . $user['ID']) ?>'">
                                        <?= viewIcon(23, 23) ?> <span class="ms-2 text-center">View</span>
                                    </div>
                                </td>
                                <td hidden><?= $time1 ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content border-0 rounded-0">
            <div class="d-flex justify-content-center mt-2">
                <?= checkIcon(50, 50, 'chckicon') ?>
            </div>
            <p class="text-center fs-5 text-secondary mb-0">Approve Appointment</p>
            <p class="text-center mt-2">Are you sure you want to approve this appointment?</p>
            <form action="<?= base_url('DoctorAuth/approveappointment') ?>" method="POST">
                <input type="text" id="modalpatientID" hidden name="patientID">
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-danger rounded-0 w-100 py-2">Cancel</button>
                    <button type="submit" class="btn btn-outline-primary rounded-0 w-100" id="approve">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast apptoast align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully approve an appointment</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast declinetoast align-items-center text-white bg-danger border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully declined an appointment</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast refertoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully send a referral form</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('referralsuccess')) {
?>
    <script>
        $(document).ready(function() {
            $('.refertoast').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('declinesuccess')) {
?>
    <script>
        $(document).ready(function() {
            $('.declinetoast').toast('show')
        })
    </script>
<?php
}
?>
<!-- declinesuccess -->
<?php
if ($this->session->userdata('success')) {
?>
    <script>
        $(document).ready(function() {
            $('.apptoast').toast('show')
        })
    </script>
<?php
}
?>


<script>
    $('.openmod').click(function() {
        var ID = $(this).closest(".clos").find("#patientID").val();
        $('#modalpatientID').val(ID)
    })

    $(document).ready(function() {


        var oTable = $('#appointmentTable').DataTable({
            "bLengthChange": false,
            "aaSorting": []

        });


        $("#sortBy").change(function() {
            var val = $(this).val();

            if (val === "Name") {
                oTable.order([1, 'asc']).draw();
            } else if (val === "Date") {
                oTable.order([3, 'asc']).draw();
            } else if (val === "Type") {
                oTable.order([5, 'asc']).draw();
            } else if (val === "Time") {
                oTable.order([7, 'asc']).draw();
            } else if (val === "AppType") {
                oTable.order([6, 'asc']).draw();
            }
        })
        $('#searchtb').keyup(function() {
            oTable.search($(this).val()).draw();
        })
        $('#filtr').change(function() {
            if ($(this).val() === "All")
                oTable.search().draw();


            oTable.search($(this).val()).draw();
        })
        $('.res').click(function() {
            oTable.search('').draw();
            $('#filtr').val(0)
            $('#sortBy').val(0);
            oTable.order([0, 'desc']).draw();

        })
    })
</script>