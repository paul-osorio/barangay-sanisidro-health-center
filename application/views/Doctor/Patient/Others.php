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

    .xMain {
        position: absolute;
        top: 0;
        right: 0;
    }

    .xBtn1:hover,
    .xBtn2:hover {
        cursor: pointer;
        transform: scale(1.1);
    }

    .xBtn1:active,
    .xBtn2:active {
        cursor: pointer;
        transform: scale(1);
    }
</style>

<div class="contd" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card card-body border-0" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);width: 40rem">

                <div class="position-relative">
                    <button class="backbtn2" onclick="location.href='<?= base_url('D/Patient') ?>'"><?= backarrow2(25, 25) ?></button>
                    <div class="text-center">
                        <?= othersIcon(70, 70) ?><br>
                        <label style="color:#304B8B" class="fw-bold fs-5 mt-2">For Others</label>
                    </div>
                    <div class="xMain">
                        <label class="xBtn1"><?= calendarReminder(25, 25) ?></label>
                        <label class="xBtn2 ms-2"><?= message(25, 25) ?></label>
                    </div>
                </div>

                <h6 class="mt-3 fw-bold text-secondary">PERSONAL INFORMATION</h6>
                <div class="row g-3">
                    <div class="col-lg-4">
                        <label for="">Lastname</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $user['lastname'] ?>" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Firstname</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $user['firstname'] ?>" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middlename</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $user['middlename'] ?>" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Gender</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $user['gender'] ?>" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Date of Birth</label>
                        <input type="text" class="form-control form-control-sm" value="<?= $user['birthday'] ?>" readonly>
                    </div>
                </div>

                <hr>
                <h6 class="fw-bold text-secondary">HEALTH CONDITION</h6>
                <textarea name="" class="form-control" readonly id="" cols="30"><?= $user['healthcondition'] ?></textarea>

                <div class="mt-3 mb-0">
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