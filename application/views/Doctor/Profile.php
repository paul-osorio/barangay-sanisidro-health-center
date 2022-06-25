<style>
    .cmn-toggle {
        position: absolute;
        margin-left: -9999px;
        visibility: hidden;
    }

    .cmn-toggle+label {
        display: block;
        position: relative;
        cursor: pointer;
        outline: none;
        user-select: none;
    }

    input.cmn-toggle-round+label {
        padding: 2px;
        width: 50px;
        height: 30px;
        background-color: #dddddd;
        border-radius: 60px;
    }

    input.cmn-toggle-round+label:before,
    input.cmn-toggle-round+label:after {
        display: block;
        position: absolute;
        top: 1px;
        left: 1px;
        bottom: 1px;
        content: "";
    }

    input.cmn-toggle-round+label:before {
        right: 1px;
        background-color: #f1f1f1;
        border-radius: 60px;
        transition: background 0.4s;
    }

    input.cmn-toggle-round+label:after {
        width: 28px;
        background-color: #fff;
        border-radius: 100%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        transition: margin 0.4s;
    }

    input.cmn-toggle-round:checked+label:before {
        background-color: blue;
    }

    input.cmn-toggle-round:checked+label:after {
        margin-left: 20px;
    }

    tr>td {
        padding-bottom: 1em;
    }

    .righttxt {
        font-size: 14px;
    }

    .form-control,
    .btn,
    .form-select {
        box-shadow: none !important;
    }
</style>
<form action="<?= base_url('DoctorAuth/changeSchedule') ?>" method="POST">
    <input type="hidden" name='doctorID' value="<?= $user['ID'] ?>">
    <div class="conta" style="margin-top: 3.5rem">
        <div class="row mx-5">
            <div class="col-lg-4">
                <div class="card card-body" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1);border-radius: 10px;">
                    <div class="d-flex justify-content-center">
                        <img style="border-radius: 50%;object-fit: cover" class="border" src="<?= base_url('uploads/Doctor/' . $user['Picture']) ?>" height="150" width="150" alt="">
                    </div>
                    <p class="m-0 text-center fs-5">
                        <?= $user['Firstname'] . ' ' . $user['Middlename'] . ' ' . $user['Lastname'] ?>
                    </p>
                    <hr>
                    <table>
                        <colgroup>
                            <col span="1" style="width: 50%;">
                            <col span="1" style="width: 50%;">
                        </colgroup>
                        <tr>
                            <td class="righttxt">Medical Specialties:</td>
                            <td>

                                <span class=""><?= ucfirst($user['Medical']) ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="righttxt">Gender:</td>
                            <td>

                                <span class=""><?= $user['Gender'] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="righttxt">Mobile number:</td>
                            <td>
                                <span class=""><?= $user['Contact'] ?></span>
                            </td>

                        </tr>
                        <tr>

                            <td colspan="2">
                                <div class="d-flex justify-content-center w-100">
                                    <img src="<?= base_url('uploads/Signature/' . $user['signature']) ?>" height="70" alt="">
                                </div>
                            </td>
                        </tr>



                    </table>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-body" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1);border-radius: 10px;">
                    <p style="font-size: 20px" class="mb-0 text-secondary">Set Availability</p>
                    <hr>
                    <?php
                    $arrtime = array('8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM');
                    $res = $this->db->query('SELECT * FROM doctor_schedule WHERE doctorID=' . $user['ID'])->row_array();
                    ?>
                    <table>
                        <tr>
                            <td>Monday</td>
                            <td>
                                <div class="switch">
                                    <input id="monday" name="monday" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox" <?= ((arraymaker($res['monday'])[0] === "no") ? '' : 'checked') ?>>
                                    <label for="monday"></label>
                                </div>
                            </td>
                            <td>
                                <select name="mondayfrom" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['monday'])[1] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-center">to</td>
                            <td>
                                <select name="mondayto" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['monday'])[2] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>
                                <div class="switch">
                                    <input id="tuesday" name="tuesday" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox" <?= ((arraymaker($res['tuesday'])[0]  === "no") ? '' : 'checked') ?>>
                                    <label for="tuesday"></label>
                                </div>
                            </td>
                            <td>
                                <select name="tuesdayfrom" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['tuesday'])[1] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-center">to</td>
                            <td>
                                <select name="tuesdayto" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['tuesday'])[2] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>
                                <div class="switch">
                                    <input id="wednesday" name="wednesday" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox" <?= ((arraymaker($res['wednesday'])[0]  === "no") ? '' : 'checked') ?>>
                                    <label for="wednesday"></label>
                                </div>
                            </td>
                            <td>
                                <select name="wednesdayfrom" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['wednesday'])[1] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-center">to</td>
                            <td>
                                <select name="wednesdayto" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['wednesday'])[2] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>
                                <div class="switch">
                                    <input id="thursday" name="thursday" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox" <?= ((arraymaker($res['thursday'])[0]  === "no") ? '' : 'checked') ?>>
                                    <label for="thursday"></label>
                                </div>
                            </td>
                            <td>
                                <select name="thursdayfrom" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['thursday'])[1] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-center">to</td>
                            <td>
                                <select name="thursdayto" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['thursday'])[2] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>
                                <div class="switch">
                                    <input id="friday" name="friday" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox" <?= ((arraymaker($res['friday'])[0] === "no") ? '' : 'checked') ?>>
                                    <label for="friday"></label>
                                </div>
                            </td>
                            <td>
                                <select name="fridayfrom" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['friday'])[1] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>

                            <td class="text-center">to</td>
                            <td>
                                <select name="fridayto" id="" class="form-select">
                                    <?php
                                    for ($i = 0; $i < count($arrtime); $i++) {
                                    ?>
                                        <option value="<?= $arrtime[$i] ?>" <?= (arraymaker($res['friday'])[2] === $arrtime[$i]) ? 'selected' : ''  ?>><?= $arrtime[$i] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary rounded-pill w-25" type="submit">Save</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast refertoast align-items-center text-white bg-primary border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fa-check-double me-2 fs-3"></i> Your schedule has been updated successfully</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('change_succ')) {
?>
    <script>
        $(document).ready(function() {
            $('.refertoast').toast('show')
        })
    </script>
<?php
}
?>




<!-- <style>
    table {
        border-collapse: separate;
        border-spacing: 0 1em;
    }

    .btn {
        box-shadow: none !important;
    }

    .righttxt {
        vertical-align: top;
        font-weight: bold;
    }

    .form-control {
        box-shadow: none !important;
    }
</style>

<div class="conta" style="margin-top: 3.5rem">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card card-body" style="width: 40rem">
                <div class="d-flex justify-content-center">
                    <img style="border-radius: 50%;object-fit: cover" class="border" src="<?= base_url('uploads/Doctor/' . $user['Picture']) ?>" height="150" width="150" alt="">
                </div>
                <p class="m-0 text-center fs-5">
                    <?= $user['Firstname'] . ' ' . $user['Middlename'] . ' ' . $user['Lastname'] ?>
                </p>
                <hr>
                <table style="margin: 0 5rem 0 5rem">
                    <colgroup>
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 60%;">
                    </colgroup>
                    <tr>
                        <td class="righttxt">Medical Specialties:</td>
                        <td>

                            <span class=""><?= $user['Medical'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="righttxt">Gender:</td>
                        <td>

                            <span class=""><?= $user['Gender'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="righttxt">Mobile number:</td>
                        <td>
                            <span class=""><?= $user['Contact'] ?></span>
                        </td>

                    </tr>

                    <tr>
                        <td class="righttxt">Schedule:</td>
                        <td>
                            <span class=""><?= ($user['schedule'] === "morning") ? 'Morning (8:00 - 12:00)' : 'Afternoon (1:00 - 5:00)' ?></span>
                        </td>

                    </tr>


                    <tr>
                        <td class="righttxt">Bio:</td>
                        <td>
                            <div class="hideable">
                                <?php
                                if ($user['Bio'] === null || $user['Bio'] === "") {
                                ?>
                                    <button class="openedit btn px-3 btn-secondary btn-sm rounded-pill"><i class="fa-solid fa-plus"></i> Add Bio</button>
                                <?php
                                } else {
                                ?>
                                    <p class="hideable mb-0"><?= $user['Bio'] ?></p>
                                    <button class="openedit btn px-3 btn-dark py-0 btn-sm rounded-pill"><i class="fa-solid fa-pen-to-square"></i> Edit Bio</button>

                                <?php
                                }
                                ?>
                            </div>
                            <form action="<?= base_url('DoctorAuth/addbio') ?>" class="editable" method="POST">
                                <textarea name="bio" id="" class="form-control" cols="30" rows="10"><?= $user['Bio'] ?></textarea>
                                <button type="submit" class="btn px-3 btn-success py-0 btn-sm rounded-pill"><i class="fa-solid fa-floppy-disk"></i> Save Bio</button>

                            </form>
                        </td>

                    </tr>


                </table>

                <hr>
            </div>
        </div>
    </div>
</div>

<script>
    $('.editable').hide();
    $('.openedit').click(() => {
        $('.editable').show();
        $('.hideable').hide()

    })
</script> -->