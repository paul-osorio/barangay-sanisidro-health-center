<style>
    .bbtn {
        padding-top: 2rem;
        padding-bottom: 2rem;
        border: 0;
        background-color: #651FFF;
        color: white;
        font-size: 20px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        outline: none;
    }

    .bbtn:hover {
        background-color: #5B20DD;
    }

    .bbtn:active,
    .rbtn:active {
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.25);
        transform: translateY(2px);

    }

    .rbtn {
        border: none;
        color: white;
        background-color: #005AE8;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-top: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .rbtn:hover {
        background-color: #0A4FBB;

    }

    .btn-outline-primary:hover {
        background-color: #005AE8 !important;
        color: white !important;
    }

    .btn-outline-primary {
        border-color: #005AE8 !important;
        color: #005AE8 !important;
    }

    @-webkit-keyframes rotating {
        from {
            -webkit-transform: rotate(0deg);
        }

        to {
            -webkit-transform: rotate(360deg);
        }
    }

    .rotating {
        -webkit-animation: rotating 2s linear infinite;
        top: 19px;
        left: 30px;
    }
</style>
<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="mt-5">
            <div class="" style="width: 35rem">
                <?php
                if ($this->session->userdata('response')) {
                ?>
                    <div class="alert alert-primary py-2" role="alert">
                        <i class="fas fa-check"></i> Success restoring database.
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="card card-body border-0" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);width: 35rem">
                <label class="text-violet mb-2 fw-bold">BACKUP FILES</label>

                <button class="bbtn" onclick="window.location='<?= base_url('AdminAuth/backup') ?>'"><i class="fa-solid fa-database me-2"></i>BACKUP</button>
                <hr>
                <form action="<?= base_url('AdminAuth/restore') ?>" method="POST" id="formrest" enctype="multipart/form-data">

                    <label class="text-violet mb-2 fw-bold">RESTORE FILES</label>
                    <input type="file" name="database" class="form-control rounded-0" id="db">
                    <button class="rbtn mb-2 w-100" type="button">Restore</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 22rem">
                            <div class="modal-content rounded-3 border-0 p-3">
                                <div class="row gx-0">
                                    <div class="col-lg-4 position-relative d-flex justify-content-center align-items-center">
                                        <i class="fad fa-database text-primary  display-2"></i>
                                        <i class="fas rotating text-white fa-redo ms-3 position-absolute"></i>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="mt-2 text-dark">Are you sure you want to restore all data?</p>
                                        <div class="d-flex justify-content-end">
                                            <div class="d-flex w-50">
                                                <button class="btn btn-outline-primary w-100 btn-sm" type="submit" name="import">Yes</button>
                                                <button class="btn btn-outline-danger w-100 ms-2 btn-sm" type="button" data-bs-dismiss="modal" aria-label="Close">No</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#formrest').validate({
            rules: {
                database: {
                    required: true,
                    extension: "sql"
                }
            },
            messages: {
                database: {
                    required: "<span class='text-danger'>Please select data file to restore</span>",
                    extension: "<span class='text-danger'>File extension should end in .sql</span>",

                }
            }
        });
        $('.rbtn').click(function() {
            $('#formrest').valid()
            if ($('#formrest').valid()) {
                $('#exampleModal').modal('show');

            }


        })
    })
</script>