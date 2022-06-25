<style>
    .backbtn2 {
        background-color: #E4F1FB;
        height: 2.5rem;
        width: 2.5rem;
        border-radius: 50%;
        border: 0;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        position: absolute;
    }

    .backbtn2:hover {
        background-color: #DAEDFB;
    }

    .backbtn2:active {
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.25);
        transform: translateY(2px);
    }

    .sBtn {
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25) !important;
    }

    .sBtn:hover {
        background-color: #4915BC !important;

    }

    .sBtn:active {
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.25) !important;
        transform: translateY(2px);

    }
</style>

<div class="contd" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card card-body border-0" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);width: 40rem">
                <div class="position-relative">
                    <button class="backbtn2"><?= backarrow2(25, 25) ?></button>
                    <div class="text-center">
                        <label class="fs-5" style="color: #304B8B">Reminder</label>
                    </div>
                </div>

                <h6 class="mt-5 fw-bold text-secondary">PERSONAL INFORMATION</h6>
                <div class="row gx-3 gy-2">
                    <div class="col-lg-4">
                        <label for="">Lastname:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Firstname:</label>
                        <input type="text" class="form-control form-control-sm " disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middlename:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Gender:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Age:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Patient #:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <hr class="mb-0">
                    <div class="col-lg-8">
                        <label for="">Doctor's name:</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Date Today/label>
                            <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Type of Checkup:</label>
                        <select name="" class="form-select form-select-sm" id="">
                            <option value="">ewan</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Date:</label>
                        <input type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Time:</label>
                        <input type="time" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="">
                    <button class="btn sBtn text-white rounded-pill float-end mt-4" style="background-color: #651FFF"><?= calendar(25, 25, "me-2") ?>Set Reminder</button>
                </div>


                <hr>

                <div class="mt-0 mb-0">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex">
                            <div class="">
                                <?= healthIcon(50, 50) ?>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="m-0 fw-bold" style="color: #304B8B;line-height: 18px">
                                BARANGAY<br>HEALTH CENTER
                            </p>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>