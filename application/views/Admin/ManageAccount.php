<style>
    .btn {
        box-shadow: none !important;
    }


    .btnw {
        border: 1px solid lightgray;
        width: 100%;
        cursor: pointer;
        background: linear-gradient(white 50%, darkblue 50%);
        background-size: 100% 200%;
        transition: .5s ease;
        background-position: 100% 200%;
        border-radius: 5px;
    }

    .btnw:hover {
        color: white;
        background-position: 100% 100%;
    }

    .btnw:active {
        transform: scale(.95);
    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card card-body mt-4" style=" box-shadow: 0 4px 4px rgba(0,0,0,0.1);width: 35rem">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-primary fw-bold">
                            <?= (($this->session->userdata('isSuperAdmin')) ? 'VIEW ACCOUNTS' : 'MANAGE ACCOUNTS') ?>

                        </p>
                        <hr>
                    </div>
                    <div class=" <?= (($this->session->userdata('isSuperAdmin')) ? 'col-lg-4' : 'col-lg-6') ?>">

                        <div class="btnw w-100 rounded-0 py-2" onclick="location.href='<?= base_url('Admin/ViewMedicalStaff') ?>'">
                            <p class="mb-0 text-center fs-1"><i class="fad fa-stethoscope"></i></p>
                            <p class="mb-0 text-center">Barangay Medical Staff</p>
                        </div>
                    </div>
                    <?php
                    if ($this->session->userdata('isSuperAdmin')) {
                    ?>
                        <div class="col-lg-4">
                            <div class="btnw w-100 rounded-0 py-2" onclick="location.href='<?= base_url('Admin/ViewAdminAccount') ?>'">
                                <p class="mb-0 text-center fs-1"><i class="fad fa-user-crown"></i></p>
                                <p class="mb-0 text-center">Barangay Health Center Admin</p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class=" <?= (($this->session->userdata('isSuperAdmin')) ? 'col-lg-4' : 'col-lg-6') ?>">
                        <div class="btnw w-100 rounded-0 py-2" onclick="location.href='<?= base_url('Admin/ViewHealthWorker') ?>'">
                            <p class="mb-0 text-center fs-1"><i class="fad fa-medkit"></i></p>
                            <p class="mb-0 text-center">Barangay Health Worker</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>