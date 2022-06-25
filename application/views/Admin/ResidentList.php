<style>
    .form-control,
    .form-select,
    .btn,
    .btn-close {
        box-shadow: none !important;
    }

    th {
        border-bottom: 1px solid lightgray !important;
    }

    td {
        height: 40px;
        vertical-align: middle;
    }

    .tbtn {
        height: 30px;
        width: 30px;
        border: none !important;
        background-color: lightgray;
        color: darkslategray;
    }

    .tbtn:hover {
        background-color: #bababa;

    }

    .tbtn:active {
        transform: scale(0.9);
    }

    .addBtn {
        background-color: #6CC372;
        border: 0;
        border-radius: 3px;
        padding: 5px 7px 5px 7px;
        color: white;
        font-size: 14px;
    }

    .addBtn:hover {
        background-color: #62AC67;
    }

    .addBtn:active {
        transform: scale(0.98);

    }

    .btn-lgreen {
        background-color: #3ABA6F !important;
        color: white;
        border: none;
    }

    .btn-lgreen:active {
        transform: scale(0.98);

    }

    .btn-lgreen:hover {
        background-color: #36A666 !important;
    }

    .fc {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-radius: 0 !important;
    }

    .lbl {
        font-size: 14px;
        color: gray;
    }

    #example th,
    tr {
        margin-left: 15px;
    }

    .regbtn {
        background-color: white;
        border: 0;
        border-bottom: 2px solid white;

        outline: none !important;


    }

    .active {
        border-bottom: 2px solid blue;
        color: blue;
    }

    .regbtn:hover:not(.active) {
        border-bottom: 2px solid lightgray !important;
    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="row mx-3">
        <div class="col-lg-12">
            <div class="card card-body" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">


                <div class="d-flex justify-content-between">
                    <p class="mb-0 fw-bold" style="vertical-align: middle;color: #651FFF">RESIDENTS LIST</p>

                    <?php
                    $totalresident = $this->db->query('SELECT * FROM residents_list');
                    ?>
                    <p class="mb-0"><span class="" style="font-size:14px">Total resident as of 2022:</span> <span><?= $totalresident->num_rows() ?></span></p>
                    <?php
                    if (!$this->session->userdata('isSuperAdmin')) {
                    ?>
                        <button class="imbtn btn btn-sm btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#importModal">Import Residents List</button>
                    <?php } else {
                    } ?>
                </div>
                <div class="d-flex">
                    <button class="regbtn active" id="regbtn">Registered</button>
                    <button class="regbtn ms-3" id="notregbtn">Not Registered</button>
                    <button class="regbtn ms-3" id="allbtn">All Residents</button>



                </div>
                <hr class="mt-2">
                <div id="regrestable">
                    <table id="regTable" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th></th>

                                <th>ID #</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact #</th>
                            </tr>
                        </thead>

                    </table>
                </div>
                <div id="hideresTable">
                    <table id="residentlisttable" class="table" style="width:100%">
                        <colgroup>
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 30%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Middlename</th>
                                <th>Year</th>

                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user as $user) {
                                $name = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'];
                            ?>
                                <tr>
                                    <td><?= $user['ID_number'] ?></td>
                                    <td><?= $user['Firstname'] ?></td>
                                    <td><?= $user['Lastname'] ?></td>
                                    <td><?= $user['Middlename'] ?></td>
                                    <td><?= $user['Year'] ?></td>
                                    <td><?= $user['Address'] ?></td>


                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="allresTable">
                    <table id="alllisttable" class="table" style="width:100%">
                        <colgroup>
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 16%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 30%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>ID #</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Middlename</th>
                                <th>Year</th>

                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resall = $this->db->query('SELECT * FROM residents_list')->result_array();
                            foreach ($resall as $user) {
                                $name = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'];
                            ?>
                                <tr>
                                    <td><?= $user['ID_number'] ?></td>
                                    <td><?= $user['Firstname'] ?></td>
                                    <td><?= $user['Lastname'] ?></td>
                                    <td><?= $user['Middlename'] ?></td>
                                    <td><?= $user['Year'] ?></td>
                                    <td><?= $user['Address'] ?></td>


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
</div>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0 border-0">
            <div class="p-3">
                <form action="<?= base_url('AjaxRequest/upload') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-2 d-flex justify-content-between">
                        <label for="" class="">Import Resident List</label>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <input type="file" name="csv" accept=".xlsx, .xls," required class="form-control mb-2 form-control-sm">
                    <button type="submit" class="btn w-100 btn-primary rounded-0" name="submit" id="hidesubcsv">IMPORT</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully import residents list</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast errortoast align-items-center text-white bg-danger border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i> The file your try to import is invalid</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('error_import')) {
?>
    <script>
        $(document).ready(function() {
            $('.errortoast').toast('show')
        })
    </script>
<?php
}
?>
<?php
if ($this->session->userdata('success_import')) {
?>
    <script>
        $(document).ready(function() {
            $('.successtoast').toast('show')
        })
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {
        $('#hideresTable').hide();
        $('#allresTable').hide();

        $('#residentlisttable').DataTable();
        $('#alllisttable').DataTable();
        // $('#regTable').DataTable();



        $('#regbtn').click(function() {
            $(this).addClass('active');
            $('#notregbtn').removeClass('active');
            $('#allbtn').removeClass('active');
            $('#allresTable').hide();

            $('#hideresTable').hide();
            $('#regrestable').show();
        })

        $('#allbtn').click(function() {
            $(this).addClass('active');
            $('#notregbtn').removeClass('active');
            $('#regbtn').removeClass('active');
            $('#hideresTable').hide();
            $('#regrestable').hide();
            $('#allresTable').show();
        })


        $('#notregbtn').click(function() {
            $(this).addClass('active');
            $('#allbtn').removeClass('active');
            $('#allresTable').hide();

            $('#regbtn').removeClass('active');
            $('#hideresTable').show();
            $('#regrestable').hide();

        })
    })

    function format(d) {
        // `d` is the original data object for the row
        return '<div class="mt-2 card card-body" style="border-radius: 10px;box-shadow: 0 4px 4px rgba(0,150,150,0.2)">' +
            '<div class="row gx-2">' +
            '<div class="col-lg-1">' +
            '<div class="text-center">' +
            '<img src="' + d.profile + '" style="border-radius: 50%;border: 3px solid white;outline: 1px solid green; object-fit: cover"height="80" width="80" alt="">' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-4">' +
            '<p class="mt-2 ms-2 mb-0" style="font-size: 19px">' + d.name + '</p>' +
            '<p class=" ms-2 mb-0" style="font-size: 15px;">' + d.gender + '</p>' +
            '<p class=" ms-2 mb-0" style="font-size: 15px;">ID number: ' + d.idnumber + '</p>' +
            '<p class=" ms-2 mb-0" style="font-size: 15px;">Created At: ' + d.created_at + '</p>' +

            '</div>' +
            '<div class="col-lg-7">' +
            '<table style="width: 100%;font-size: 15px;">' +
            '<colgroup>' +
            '<col span="1" style="width: 20%;">' +
            '<col span="1" style="width: 80%;">' +
            '</colgroup>' +
            '<tr >' +
            '<td class="fw-bold" style="height: 10px;">' +
            'Email:' +
            '</td>' +
            '<td style="height: 10px;" ><p class="mb-0 text-darl">' + d.email + '</p></td>' +
            '</tr><tr>' +
            '<td class="fw-bold"  style="height: 10px;">Contact:</td>' +
            '<td  style="height: 10px;"><p class="mb-0 text-darl">' + d.contact + '</p></td></tr>' +
            '<tr>' +
            '<td class="fw-bold">Address:</td>' +
            '<td class="text-dark">' + d.address + '</td>' +
            '</tr>' +
            '</table>' +


            '</div>' +
            '</div>' +
            '</div>';
    }

    $(document).ready(function() {
        var table = $('#regTable').DataTable({
            "ajax": "<?= base_url('AjaxRequest/adminRegisteredList') ?>",
            "columns": [{
                    "className": 'dt-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "idnumber"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "contact"
                },

            ],
            "order": [
                [1, 'asc']
            ]
        });

        $('#regTable tbody').on('click', 'td.dt-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    });
</script>









<!-- <style>
    .form-control,
    .form-select,
    .btn,
    .btn-close {
        box-shadow: none !important;
    }

    th {
        border-bottom: 1px solid lightgray !important;
    }

    td {
        height: 40px;
        vertical-align: middle;
    }

    .tbtn {
        height: 30px;
        width: 30px;
        border: none !important;
        background-color: lightgray;
        color: darkslategray;
    }

    .tbtn:hover {
        background-color: #bababa;

    }

    .tbtn:active {
        transform: scale(0.9);
    }

    .addBtn {
        background-color: #6CC372;
        border: 0;
        border-radius: 3px;
        padding: 5px 7px 5px 7px;
        color: white;
        font-size: 14px;
    }

    .addBtn:hover {
        background-color: #62AC67;
    }

    .addBtn:active {
        transform: scale(0.98);

    }

    .btn-lgreen {
        background-color: #3ABA6F !important;
        color: white;
        border: none;
    }

    .btn-lgreen:active {
        transform: scale(0.98);

    }

    .btn-lgreen:hover {
        background-color: #36A666 !important;
    }

    .fc {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-radius: 0 !important;
    }

    .lbl {
        font-size: 14px;
        color: gray;
    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="row mx-3">
        <div class="col-lg-12">
            <?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show py-2 complete" role="alert">
                        <i class="fa-solid fa-check-double me-2"></i> You have successfully added a resident.</a>
                        <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
            }

            if ($this->session->flashdata('success_delete')) {
            ?>
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show py-2 complete" role="alert">
                        <i class="fa-solid fa-check-double me-2"></i> You have successfully remove a resident.</a>
                        <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
            }
            if ($this->session->flashdata('success_update')) {
            ?>
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissible fade show py-2 complete" role="alert">
                        <i class="fa-solid fa-check-double me-2"></i> You have successfully updated a resident.</a>
                        <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="card card-body" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">

                <div class="d-flex justify-content-between">
                    <p class="mb-0 fw-bold" style="vertical-align: middle;color: #651FFF">RESIDENTS LIST</p>
                    <button class="addBtn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-plus"></i> Add Resident</button>
                </div>
                <hr class="mt-2">
                <table id="example" class="table" style="width:100%">
                    <colgroup>
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 30%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Middlename</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($user as $user) {
                            $name = $user['Lastname'] . ', ' . $user['Firstname'] . ' ' . $user['Middlename'];
                        ?>
                            <tr>
                                <td><?= $user['ID_number'] ?></td>
                                <td><?= $user['Firstname'] ?></td>
                                <td><?= $user['Lastname'] ?></td>
                                <td><?= $user['Middlename'] ?></td>
                                <td><?= $user['Address'] ?></td>

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

<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <form action="<?= base_url('AdminAuth/addResident') ?>" method="POST" id="formadd">

                <div class="modal-header py-2 text-white" style="background-color: #3ABA6F">
                    <h5 class="modal-title" id="exampleModalLabel">Add Resident</h5>
                    <button type="reset" class="btn-close btn-close-white closethis" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row gx-2 gy-3">
                        <div class="col-lg-4">
                            <label class="lbl">Firstname</label>
                            <input type="text" name="firstname" class="fc form-control form-control-sm">
                        </div>
                        <div class="col-lg-4">
                            <label class="lbl">Lastname</label>

                            <input type="text" name="lastname" class="fc form-control form-control-sm">

                        </div>
                        <div class="col-lg-4">
                            <label class="lbl">Middlename</label>
                            <input type="text" name="middlename" class="fc form-control form-control-sm">
                        </div>
                        <div class="col-lg-12">
                            <label class="lbl">Address</label>
                            <input type="text" name="address" class="fc form-control form-control-sm">
                        </div>
                        <div class="col-lg-6">
                            <label class="lbl">ID Number</label>
                            <input type="text" onkeypress="return isNumber(event)" name="idnumber" class="fc form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3 pe-3">
                    <div class="">
                        <button type="reset" class="btn btn-sm px-4 closethis" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-lgreen btn-sm px-5 rounded-pill">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $('.editbtn').click(function() {
        var firstname = $(this).closest(".clos").find("#tFirstname").val();
        var lastname = $(this).closest(".clos").find("#tLastname").val();
        var middlename = $(this).closest(".clos").find("#tMiddlename").val();
        var address = $(this).closest(".clos").find("#tAddress").val();
        var idnumber = $(this).closest(".clos").find("#tidnumber").val();
        var id = $(this).closest(".clos").find("#tID").val();

        $('#efirstname').val(firstname)
        $('#elastname').val(lastname)
        $('#emiddlename').val(middlename)
        $('#eaddress').val(address)
        $('#eidnumber').text(idnumber)
        $('#eID').val(id)

    })


    $(document).ready(function() {
        $('#example').DataTable();


        var formadd = $('#formadd').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                address: "required",
                idnumber: "required"
            },
            messages: {
                firstname: errorMessage('Enter firstname'),
                lastname: errorMessage('Enter lastname'),
                address: errorMessage('Please enter address'),
                idnumber: errorMessage('Please enter ID number'),
            }
        })
        var formupdate = $('#formupdate').validate({
            rules: {
                firstname: "required",
                lastname: "required",
                address: "required",
            },
            messages: {
                firstname: errorMessage('Enter firstname'),
                lastname: errorMessage('Enter lastname'),
                address: errorMessage('Please enter address'),
            }
        })
        $(".cloesthis").click(function() {
            formupdate.resetForm();
        });
        $(".closethis").click(function() {
            $("label.error").hide();
            $('.error').removeClass('error')
        });
    });

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script> -->