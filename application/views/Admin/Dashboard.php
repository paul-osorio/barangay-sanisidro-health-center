<style>
    .btn,
    .form-control,
    .btn-close {
        box-shadow: none !important;
    }

    .wavy1 {
        background-image: url("<?= base_url('assets/images/wavy1.jpg') ?>");
        background-size: cover;
        background-position: 50% 50%;

    }

    .wavy2 {
        background-image: url("<?= base_url('assets/images/wavy2.jpg') ?>");
        background-size: cover;
        background-position: 50% 50%;

    }

    .wavy3 {
        background-image: url("<?= base_url('assets/images/wavy3.jpg') ?>");
        background-size: cover;
        background-position: 50% 50%;

    }

    .nbtn:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .nbtn:active {
        transform: scale(1);
    }

    .immcard {
        height: 16rem;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .immcard::-webkit-scrollbar {
        width: 3px;
        background-color: lightgray;
    }

    .immcard::-webkit-scrollbar-thumb {
        background-color: gray;
    }

    .btcancel,
    .btadd {
        height: 45px;
        border: none;
        outline: none;
    }

    .btcancel {
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
    }

    .btadd {
        background-color: rgba(0, 80, 255);
        color: white;
    }
</style>

<div class="conta" style="margin-top: 5rem">
    <div class="mx-5">
        <div class=" row mx-5 mb-4 gx-3 gy-3">

            <div class="col-lg-3">
                <div class="card card-body border-0 rounded-0 wavy1">
                    <div class="d-flex justify-content-between">
                        <p class="display-4 mb-0  text-white"><?= $countres ?></p>
                        <p class="mb-0 display-6 text-white"><i class="fad fa-home"></i></p>

                    </div>

                    <p class="fs-5 text-white">Total Unregistered Residents</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body border-0 rounded-0 wavy2">
                    <div class="d-flex justify-content-between">
                        <p class="display-4 mb-0 text-white"><?= $countreg ?></p>
                        <p class="display-6 mb-0 text-white"><i class="fad fa-user-friends"></i></p>
                    </div>
                    <p class="fs-5 text-white">Total Registered Residents</p>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="card card-body border-0 rounded-0 wavy3">
                    <div class="d-flex justify-content-between">
                        <p class="display-4 mb-0 text-white"><?= $countdoc ?></p>
                        <p class="display-6 mb-0 text-white"><i class="fad fa-user-md"></i></p>
                    </div>
                    <p class="fs-5 text-white">Total Barangay <br> Medical Staff</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body border-0 rounded-0 wavy3">
                    <div class="d-flex justify-content-between">
                        <p class="display-4 mb-0 text-white"><?= $counthelth ?></p>
                        <p class="display-6 mb-0 text-white"><i class="fad fa-medkit"></i></p>
                    </div>
                    <p class="fs-5 text-white">Total Barangay <br> Health Worker</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body px-0" style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="bg-light mb-2 mx-3 py-2 px-2">
                        <p class="mb-0" style="color: #651FFF">Available Immunization</p>
                        <?php
                        if (!$this->session->userdata('isSuperAdmin')) {
                        ?>
                            <button class="btn btn-sm btn-primary rounded-pill" id="immunopenmodal" data-bs-toggle="modal" data-bs-target="#addVaccs"><i class="fas fa-plus-hexagon"></i> Import Vaccine</button>
                        <?php } ?>
                    </div>
                    <div class="immcard">
                        <div class="row gy-3 ms-2 me-1">
                            <?php
                            $immunores = $this->db->query('SELECT * FROM immunization');
                            if ($immunores->num_rows() > 0) {

                                foreach ($immunores->result_array() as $data) {
                            ?>
                                    <div class="col-lg-12">
                                        <div class="card card-body" style="">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0"><?= $data['Name'] ?></p>
                                                <div class="d-flex">
                                                    <?php
                                                    if (!$this->session->userdata('isSuperAdmin')) {
                                                    ?>
                                                        <i class="fad nbtn fa-trash-alt ms-2 text-danger" onclick="location.href='<?= base_url('AdminAuth/delvacc/' . $data['ID'] . '/' . 'immunization') ?>'"></i>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <p class="mb-0" style="font-size: 14px"><?= $data['Description'] ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <p class="text-center">No Services Imported</p>
                            <?php
                            }

                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-body px-0" style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="bg-light mb-2 mx-3 py-2 px-2 ">
                        <p class="mb-0" style="color: #651FFF">Dental Services</p>
                        <?php
                        if (!$this->session->userdata('isSuperAdmin')) {
                        ?>
                            <button class="btn btn-sm btn-primary rounded-pill" id="dentalpenmodal" data-bs-toggle="modal" data-bs-target="#addVaccs"><i class="fas fa-plus-hexagon"></i> Import Services</button>
                        <?php } ?>
                    </div>
                    <div class="immcard">
                        <div class="row gy-3 ms-2 me-1">
                            <?php
                            $dentalres = $this->db->query('SELECT * FROM dental');
                            if ($dentalres->num_rows() > 0) {

                                foreach ($dentalres->result_array() as $data) {
                            ?>
                                    <div class="col-lg-12">
                                        <div class="card card-body" style="">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0"><?= $data['Name'] ?></p>
                                                <div class="d-flex">
                                                    <?php
                                                    if (!$this->session->userdata('isSuperAdmin')) {
                                                    ?>
                                                        <i class="fad nbtn fa-trash-alt ms-2 text-danger" onclick="location.href='<?= base_url('AdminAuth/delvacc/' . $data['ID'] . '/' . 'dental') ?>'"></i>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <p class="mb-0" style="font-size: 14px"><?= $data['Description'] ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <p class="text-center">No Services Imported</p>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-body px-0" style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);">
                    <div class="bg-light mb-2 mx-3 py-2 px-2 ">
                        <p class="mb-0" style="color: #651FFF">Prenatal Services</p>
                        <?php
                        if (!$this->session->userdata('isSuperAdmin')) {
                        ?>
                            <button class="btn btn-sm btn-primary rounded-pill" id="preopenmodal" data-bs-toggle="modal" data-bs-target="#addVaccs"><i class="fas fa-plus-hexagon"></i> Import Services</button>
                        <?php } ?>
                    </div>
                    <div class="immcard">
                        <div class="row gy-3 ms-2 me-1">
                            <?php
                            $prenres = $this->db->query('SELECT * FROM prenatal');
                            if ($prenres->num_rows() > 0) {

                                foreach ($prenres->result_array() as $data) {
                            ?>
                                    <div class="col-lg-12">
                                        <div class="card card-body" style="">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0"><?= $data['Name'] ?></p>
                                                <div class="d-flex">
                                                    <?php
                                                    if (!$this->session->userdata('isSuperAdmin')) {
                                                    ?>
                                                        <i class="fad nbtn fa-trash-alt ms-2 text-danger" onclick="location.href='<?= base_url('AdminAuth/delvacc/' . $data['ID'] . '/' . 'prenatal') ?>'"></i>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <p class="mb-0" style="font-size: 14px"><?= $data['Description'] ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <p class="text-center">No Services Imported</p>
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


<div class="modal fade" id="addVaccs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 23rem">
        <div class="modal-content rounded-0">

            <div class="d-flex justify-content-between px-3 pt-2">
                <p class="mb-0 text-primary" id="modaladdtitle"></p>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <hr class="my-2">
            <form action="<?= base_url('AjaxRequest/updateServices') ?>" enctype="multipart/form-data" method="POST" id="formadd">
                <div class="px-3 pt-2 pb-3">
                    <input type="hidden" id="servicetype" name="services">
                    <input type="file" name="csv" accept=".xlsx, .xls," required class="form-control mb-2">
                </div>
                <div class="d-flex">
                    <button type="button" class="w-100 btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="w-100 btn btn-primary rounded-0">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> You successfully import services list</a>
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


        $('#immunopenmodal').click(function() {
            $('#modaladdtitle').text('Import Vaccine List')
            $('#servicetype').val('immunization')
        })

        $('#dentalpenmodal').click(function() {
            $('#modaladdtitle').text('Import Dental Services List')
            $('#servicetype').val('dental')
        })


        $('#preopenmodal').click(function() {
            $('#modaladdtitle').text('Import Prenatal Services List')
            $('#servicetype').val('prenatal')
        })







        $('#formadd').validate({
            rules: {
                vaccname: "required",
                vaccdescription: "required",
            },
            messages: {
                vaccname: errorMessage('Please enter a vaccine name'),
                vaccdescription: errorMessage('Please enter a description')
            }
        })
    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' + message + '</label>';
    }
</script>