<style>
    .lblback {
        color: darkgrey;
    }

    .lblback:hover {
        color: gray;
        cursor: pointer;
    }

    .lblback:active {
        transform: translateX(-3px)
    }

    .form-control,
    .btn,
    .form-select {
        box-shadow: none !important;
    }

    .immuno {
        background-image: url("<?= base_url('assets/images/immuno.jpg') ?>");
        background-size: cover;

        height: 7rem;
    }

    .dental {
        background-image: url("<?= base_url('assets/images/teeth.jpg') ?>");
        background-size: cover;

        height: 7rem;
    }

    .immunodis {
        background-image: url("<?= base_url('assets/images/immuno.jpg') ?>");
        background-size: cover;

        height: 7rem;
    }

    .dentaldis {
        background-image: url("<?= base_url('assets/images/teeth.jpg') ?>");
        background-size: cover;

        height: 7rem;
    }

    .immunotxt {
        border-radius: 5px;
        padding: 5px;
        -webkit-backdrop-filter: blur(5px);
        /* backdrop-filter: blur(2px); */

        background: rgba(0, 0, 0, 0.3);
        height: 100%;
        cursor: pointer;
    }

    .txt1 {
        text-shadow: 2px 4px orangered;
    }

    .txt2 {
        text-shadow: 2px 4px dodgerblue;
    }

    .nextbtn1 {
        padding: 5px 25px 5px 25px;
        border: 0;
        background-image: linear-gradient(to right, black, black);
        color: white;
    }

    .immuno:hover,
    .dental:hover {
        box-shadow: 0 0px 2px 3px rgba(0, 255, 0, 0.5);
        border-radius: 5px;

    }


    @keyframes bounce {
        0% {
            transform: scale(1);
            box-shadow: 0 0px 2px 3px rgba(0, 255, 0, 0.5);

        }

        50% {
            transform: scale(1.03);


        }

        100% {
            transform: scale(1);
            box-shadow: 0 0px 2px 3px rgba(0, 55, 255, 0.5);

        }
    }

    .firstcard,
    .secondcard {
        height: 27.5rem;
    }

    .buttons {
        bottom: 5px;
        right: 5px;
    }

    .nextbtn2 {
        padding: 5px 25px 5px 25px;
        border: 0;
        background-image: linear-gradient(to right, black, black);
        color: white;
    }

    .prevbtn,
    .prevbtn1 {
        padding: 5px 25px 5px 25px;
        border: 0;
        background-color: white;
    }

    .checkm,
    .checka {
        right: 10px;
        top: 10px;
        font-size: 27px;
        color: rgba(0, 55, 255);
    }

    #immuno:checked~.immuno,
    #dental:checked~.dental {
        border-radius: 5px;
        animation: bounce .5s forwards;
    }

    .mainc {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.10)
    }

    .ui-datepicker-header {
        background-color: #616eff;
    }

    .ui-datepicker {
        width: 100%;
        border: 0 !important;
    }

    .ui-datepicker-title {
        color: white;
        font-size: 18px;

    }

    .ui-widget-content .ui-state-default {
        border: 0px;
        border-radius: 50px;
        text-align: center;
        background: #fff;
        font-weight: normal;
        color: #000;
        height: 50px;
    }

    .ui-widget-content .ui-state-default:hover {
        border: 0px;
        text-align: center;
        background: rgba(0, 255, 0, 0.50);
        font-weight: normal;
        color: black;
    }

    .ui-widget-content .ui-state-default:active {
        background: rgba(0, 150, 0, 0.50);
        box-shadow: 0px 4px 4px inset rgba(0, 0, 0, 0.20);



    }

    .ui-widget-content .ui-state-active {
        border: 0px;
        background: rgba(0, 255, 0, 0.50);
        color: black;
        box-shadow: 0px 4px 4px inset rgba(0, 0, 0, 0.20);

    }

    .ui-datepicker-year {
        display: none;
    }

    .ui-datepicker-month {
        text-transform: capitalize !important;
    }



    .ui-datepicker .ui-datepicker-prev,
    .ui-datepicker .ui-datepicker-next {
        position: absolute;
        top: 2px;
        width: 1.8em;
        height: 2.2em;
    }

    #e830:checked~.d830,
    #e930:checked~.d930,
    #e1030:checked~.d1030,
    #e1130:checked~.d1130,
    #e130:checked~.d130,
    #e230:checked~.d230,
    #e330:checked~.d330,
    #e430:checked~.d430 {
        background-color: rgba(0, 255, 0, 0.50);
        transform: scale(0.94);
        transition: .3s;
        box-shadow: 0px 4px 4px inset rgba(0, 0, 0, 0.20);

    }

    .time {
        padding: 10px;
        width: 100%;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.10);
        margin-bottom: 20px;
        cursor: pointer;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.25);
        transition: .3s;

    }

    .timedisabled {
        background-color: rgba(200, 100, 100, 0.2);

        color: gray;
        cursor: default;
    }

    input[type="radio"] {
        visibility: hidden;
        position: absolute;
    }

    .imcheckcard {
        border: 1px solid lightgray;
        padding: 20px 25px 20px 25px;
        width: 100%;
        cursor: pointer;
        border-radius: 10px;
        min-height: 5.3rem;

        background: linear-gradient(white 50%, #E16F00 50%);
        background-size: 100% 200%;
        transition: background .5s ease;
        background-position: 100% 200%;


    }

    .imcheckcard:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.20);

    }

    .imcheck {
        display: none;
    }


    #customcb1,
    #customcb,
    #customcbd1,
    #customcbd {
        position: absolute;
        right: 15px;
        top: 16px;

    }





    .imcheck:checked~.imcheckcard {
        color: white;
        transition: .5s ease;
        background-position: 100% 100%;

    }



    .moreinf {
        font-size: 14px;
    }
</style>

<form action="<?= base_url('PatientAuth/addappointment') ?>" method="POST" id="mainform">


    <div class="cont" style="margin-top: 5rem">
        <input type="text" name="app_type" id="apptype" hidden>
        <input type="text" name="firstname" value="<?= $user['Firstname'] ?>" hidden>
        <input type="text" name="lastname" value="<?= $user['Lastname'] ?>" hidden>
        <input type="text" name="middlename" value="<?= $user['Middlename'] ?>" hidden>
        <input type="text" name="dob" value="<?= $user['Birthday'] ?>" hidden>
        <input type="text" name="gender" value="<?= $user['Gender'] ?>" hidden>
        <input type="text" name="vaccine" id="vaccinelist" hidden>
        <input type="text" id="datebox" name="date" style="opacity: 0" class="position-absolute">
        <input type="text" id="timetime" name="schedtime" hidden>
        <input type="text" value="pedia" name="profiletype" hidden>



        <div class="row mx-3">
            <div class="col-lg-12">
                <div class="card card-body border-0 mainc" style="border-radius: 10px">
                    <!-- TITLE -->
                    <div class="d-flex justify-content-between">
                        <label class="lblback fs-5" onclick="location.href='<?= base_url('P/ForPedia') ?>'"><i class="fad fa-arrow-left"></i></label>

                        <div class="d-flex align-items-center">
                            <?= pediaIcon(25, 25) ?>
                            <p class="fs-5 ms-1 text-primary mb-0">FOR PEDIA</p>
                        </div>
                        <div class=""></div>
                    </div>
                    <!-- TITLE -->
                    <div class="firstcard">
                        <!-- PEDIA DETAILS -->
                        <div class="row mt-2 gy-3">
                            <div class="col-lg-12">
                                <p class="mb-0 text-secondary fw-bold fs-5">Personal Information</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" value="<?= $user['Firstname'] ?>" placeholder="Firstname" readonly>
                                    <label for="floatingPassword">Firstname</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" value="<?= $user['Middlename'] ?>" placeholder="Middlename" readonly>
                                    <label for="floatingPassword">Middlename</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" value="<?= $user['Lastname'] ?>" placeholder="Lastname" readonly>
                                    <label for="floatingPassword">Lastname</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" value="<?= date('d M Y', strtotime($user['Birthday'])) ?>" placeholder="Date of Birth" readonly>
                                    <label for="floatingPassword">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" value="<?= $user['Gender'] ?>" placeholder="Gender" readonly>
                                    <label for="floatingPassword">Gender</label>
                                </div>
                            </div>
                        </div>
                        <!-- PEDIA DETAILS -->

                        <!-- CHOOSE CHECKUP TYPE -->
                        <div class="mt-3">
                            <p class="text-secondary fs-5 fw-bold">Choose Appointment Type</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    $dataarr1 = array(
                                        'id' => $user['ID'],
                                        'lastname' => $user['Lastname'],
                                        'firstname' => $user['Firstname'],
                                        'apptype' => 'immunization',
                                        'type' => 'pedia',

                                    );
                                    $res1 = $this->Patient_model->otherExist($dataarr1);
                                    if ($res1->num_rows() > 0) {
                                    ?>
                                        <div class="position-relative">

                                            <input type="radio" name="type" id="" value="" class="position-absolute symcheck d-block mb-2 form-check-input">
                                            <label for="immuno" class="immunodis w-100  position-relative">
                                                <i class="fas fa-badge-check position-absolute checka"></i>

                                                <div class="immunotxt d-flex ">
                                                    <p class="txt1 fw-bold text-white fs-1 mb-0 px-3 ">IMMUNIZATION</p>
                                                </div>
                                            </label>
                                        </div>
                                        <label for="" class="text-danger">This profile has pending immunization appointment. Cancel the appointment to set a new one.</label>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="position-relative">

                                            <input type="radio" name="type" id="immuno" value="immunization" class="position-absolute symcheck d-block mb-2 form-check-input">
                                            <label for="immuno" class="immuno w-100  position-relative">
                                                <i class="fas fa-badge-check position-absolute checka"></i>

                                                <div class="immunotxt d-flex ">
                                                    <p class="txt1 fw-bold text-white fs-1 mb-0 px-3 ">IMMUNIZATION</p>
                                                </div>
                                            </label>
                                        </div>
                                    <?php
                                    } ?>

                                </div>
                                <div class="col-lg-6">
                                    <?php
                                    $dataarr = array(
                                        'id' => $user['ID'],
                                        'lastname' => $user['Lastname'],
                                        'firstname' => $user['Firstname'],
                                        'apptype' => 'dental',
                                        'type' => 'pedia',

                                    );
                                    $res = $this->Patient_model->otherExist($dataarr);
                                    if ($res->num_rows() > 0) {
                                    ?>
                                        <div class="position-relative">

                                            <input type="radio" name="type" id="" value="" class="position-absolute symcheck d-block mb-2 form-check-input">

                                            <label for="dental" class="dentaldis w-100  position-relative">
                                                <i class="fas fa-badge-check position-absolute checkm"></i>

                                                <div class="immunotxt d-flex ">
                                                    <p class="text-white txt2 fs-1 mb-0 px-3 fw-bold">DENTAL</p>
                                                </div>
                                            </label>
                                        </div>
                                        <label for="" class="text-danger">This profile has pending dental appointment. Cancel the appointment to set a new one.</label>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="position-relative">

                                            <input type="radio" name="type" id="dental" value="dental" class="position-absolute symcheck d-block mb-2 form-check-input">

                                            <label for="dental" class="dental w-100  position-relative">
                                                <i class="fas fa-badge-check position-absolute checkm"></i>

                                                <div class="immunotxt d-flex ">
                                                    <p class="text-white txt2 fs-1 mb-0 px-3 fw-bold">DENTAL</p>
                                                </div>
                                            </label>
                                        </div>
                                    <?php
                                    } ?>


                                </div>
                            </div>
                            <span class="text-danger position-absolute apperror"><i class="fad fa-exclamation-square"></i> Please select an appointment type</span>

                        </div>
                        <!-- CHOOSE CHECKUP TYPE -->

                        <!-- next button -->
                        <div class="mt-4 d-flex buttons justify-content-end">
                            <button class="nextbtn1 rounded" type="button">NEXT</button>
                        </div>
                        <!-- next button -->
                    </div>

                    <div class="secondcard position-relative">


                        <div class="immunonext mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <p class="text-secondary fs-5 fw-bold mb-0">Select Immunization</p>
                                <label class="text-danger ms-3" style="font-size: 14px" id="vaccerror"><i class="fas fa-exclamation-square"></i> Please select vaccination type</label>
                            </div>
                            <div class="" style="overflow-y: auto; height: 20rem;overflow-x: hidden">
                                <div class="row gy-2">

                                    <?php
                                    foreach ($immuno as $immune) {
                                    ?>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center checkcard">
                                                <input type="radio" id="im<?= $immune['ID'] ?>" value="<?= $immune['Name'] ?>" name="imm" class="position-absolute imcheck">
                                                <label for="im<?= $immune['ID'] ?>" id="customcb"><i class="far fa-circle text-secondary"></i></label>
                                                <label for="im<?= $immune['ID'] ?>" id="customcb1" class="d-none"><i class="fas text-white fa-check-circle"></i></label>
                                                <label for="im<?= $immune['ID'] ?>" class="imcheckcard">
                                                    <span class="fw-bold"><?= $immune['Name'] ?></span>
                                                    <div class=" moreinf" id="moreinfo">
                                                        <?= $immune['Description'] ?>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>


                        </div>
                        <div class="dentalnext mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <p class="text-secondary fs-5 fw-bold mb-0">Select Dental Services</p>
                                <label class="text-danger ms-3" style="font-size: 14px" id="dentalerror"><i class="fas fa-exclamation-square"></i> Please select dental service</label>
                            </div>
                            <div class="" style="overflow-y: auto; height: 20rem;overflow-x: hidden">

                                <div class="row gy-2">
                                    <?php
                                    $dentalres = $this->db->query('SELECT * FROM dental');
                                    foreach ($dentalres->result_array() as $data) {
                                    ?>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center checkcard">
                                                <input type="checkbox" id="dental<?= $data['ID'] ?>" value="<?= $data['Name'] ?>" name="imm" class="position-absolute imcheck">
                                                <label for="dental<?= $data['ID'] ?>" id="customcbd"><i class="far fa-circle text-secondary"></i></label>
                                                <label for="dental<?= $data['ID'] ?>" id="customcbd1" class="d-none"><i class="fas text-white fa-check-circle"></i></label>
                                                <label for="dental<?= $data['ID'] ?>" class="imcheckcard">
                                                    <span class="fw-bold"><?= $data['Name'] ?></span>
                                                    <div class=" moreinf" id="moreinfo">
                                                        <?= $data['Description'] ?>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>


                        </div>



                        <div class="allnext">
                            <p class="text-secondary fs-5 fw-bold mb-0">Select schedule</p>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="" id="datepick"></div>
                                    <div class="dateerror mt-2"></div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">Morning</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="830" id="e830">
                                            <label for="e830" data-value="830" class="text-center  d830 time">8:30 AM</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="930" id="e930">
                                            <label for="e930" data-value="930" class="text-center d930 time">9:30 AM</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="1030" id="e1030">
                                            <label for="e1030" data-value="1030" class="text-center d1030 time">10:30 AM</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="1130" id="e1130">
                                            <label for="e1130" data-value="1130" class="text-center d1130 time">11:30 AM</label>

                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Afternoon</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="130" id="e130">
                                            <label for="e130" data-value="130" class="text-center d130 time">1:30 PM</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="230" id="e230">
                                            <label for="e230" data-value="230" class="text-center d230 time">2:30 PM</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="330" id="e330">
                                            <label for="e330" data-value="330" class="text-center d330 time">3:30 PM</label>

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="radio" class="etime" name="etime" value="430" id="e430">
                                            <label for="e430" data-value="430" class="text-center d430 time">4:30 PM</label>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="timeerror mt-2"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="mt-4 buttons d-flex justify-content-end position-absolute">
                            <button class="prevbtn rounded" type="button">Previous</button>
                            <button class="prevbtn1 rounded" type="button">Previous</button>
                            <button class="nextbtn2 rounded" type="button">NEXT</button>
                            <button type="submit" class="submitbtn btn btn-primary rounded">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.imcheck').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('.checkcard').find('#customcb1').removeClass('d-none');
                $(this).closest('.checkcard').find('#customcb').addClass('d-none');
                $(this).closest('.checkcard').find('#customcbd1').removeClass('d-none');
                $(this).closest('.checkcard').find('#customcbd').addClass('d-none');
                $('#vaccerror').hide();
                $('#dentalerror').hide();

            } else {
                $(this).closest('.checkcard').find('#customcb1').addClass('d-none');
                $(this).closest('.checkcard').find('#customcb').removeClass('d-none');
                $(this).closest('.checkcard').find('#customcbd1').addClass('d-none');
                $(this).closest('.checkcard').find('#customcbd').removeClass('d-none');
            }
        })

        $('.checkm').hide();
        $('.checka').hide();
        $('.immunonext').hide();
        $('.allnext').hide();
        $('.apperror').hide();
        $('#vaccerror').hide();
        $('#dentalerror').hide();

        $('.etime').click(function() {
            $('#timetime').val($(this).val())
        })


        $('.dental').click(function() {
            $('.checkm').show();
            $('.checka').hide();
            $('.apperror').hide();
            $('#apptype').val('dental')

        })
        $('.immuno').click(function() {
            $('.checkm').hide();
            $('.checka').show();
            $('.apperror').hide();
            $('#apptype').val('immunization')
        })



        $('.secondcard').hide();
        $('.nextbtn1').click(() => {
            var type = $("input[name='type']:checked").val();

            if ($("input[name='type']").is(':checked')) {
                $('.secondcard').show();
                $('.firstcard').hide();
                $('.apperror').hide();
                $('#datepick').datepicker('setDate', null);
                $('#datebox').val('');
                $('.etime').prop('checked', false);

                if (type === "immunization") {
                    $('.dentalnext').hide();
                    $('.submitbtn').hide();
                    $('.immunonext').show();
                    $('.nextbtn2').show();
                    $('.prevbtn1').hide();
                    $('#datepick').datepicker('setDate', null);



                } else if (type === "dental") {
                    $('.dentalnext').show();
                    $('.immunonext').hide();
                    $('.nextbtn2').show();
                    $('.submitbtn').hide();
                    $('.prevbtn1').hide();
                    $('#vaccinelist').val('');
                    $('input[type=checkbox]').prop('checked', false);

                }

            } else {
                $('.apperror').show();

            }
        })



        $('.nextbtn2').click(() => {
            var service = [];

            $.each($("input[name='imm']:checked"), function() {
                service.push($(this).val());
            });

            if ($('input[name="imm"]').is(':checked')) {
                $('.immunonext').hide();
                $('.dentalnext').hide();
                $('.allnext').show();
                $('.prevbtn1').show();
                $('.prevbtn').hide();
                $('.nextbtn2').hide();
                $('.submitbtn').show();
                $('#vaccinelist').val(service.join(", "));



            } else {
                $('#vaccerror').show();
                $('#dentalerror').show();

            }

        })

        $('.prevbtn').click(() => {
            $('.secondcard').hide();
            $('.firstcard').show();
            $('#vaccinelist').val('');
            $('#vaccerror').hide();
            $('#dentalerror').hide();




            $('.imcheck').prop('checked', false);
            $('.imcheck').closest('.checkcard').find('#customcb1').addClass('d-none');
            $('.imcheck').closest('.checkcard').find('#customcb').removeClass('d-none');
            $('.imcheck').closest('.checkcard').find('#customcbd1').addClass('d-none');
            $('.imcheck').closest('.checkcard').find('#customcbd').removeClass('d-none');
        })
        $('.prevbtn1').click(() => {


            if ($('#apptype').val() === "immunization") {
                $('.immunonext').show();
            } else {
                $('.dentalnext').show();

            }
            $('.allnext').hide();
            $('.prevbtn1').hide();
            $('.prevbtn').show();
            $('.submitbtn').hide();
            $('.nextbtn2').show();


        })


        $('#datepick').datepicker({
            minDate: 1,
            beforeShowDay: disableDates,

            onSelect: function(dateText) {
                $('#datebox').val(dateText)
                $('.cover').hide()

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('PatientAuth/selectdate') ?>",
                    data: {
                        date: dateText,
                        apptype: $('#apptype').val()

                    },
                    success: function(response) {

                        var s = document.getElementsByClassName("etime");
                        var els = document.getElementsByClassName("time");

                        if (response !== "false") {
                            var array = JSON.parse(response)
                            // array.sort(function(x, y) {
                            //     if (1130 < ) {
                            //         return 1;
                            //     }

                            //     return 0;
                            // });
                            const arr = JSON.parse(response);

                            const arrnum = arr.map(str => {
                                return Number(str)
                            })

                            arrnum.sort(function(a, b) {
                                if ((a === 430) - (b === 430)) {
                                    return (a === 430) - (b === 430) || -(a > b) || +(a < b);
                                }
                                if ((a === 830) - (b === 830)) {
                                    return (a > 830) - (b > 830) || -(a > b) || +(a < b);
                                }

                                return 0;
                            });

                            console.log(arrnum)
                            for (var j = 0; j < s.length; j++) {
                                for (var i = 0; i < arrnum.length; i++) {

                                    if (arrnum[i] !== s[j].value) {
                                        $('.time[data-value="' + s[j].value + '"]').removeClass('timedisabled');
                                        $('.etime[value="' + s[j].value + '"]').attr('disabled', false);
                                        $('.etime[value="' + s[j].value + '"]').prop('checked', false);


                                    }
                                    $('.time[data-value="' + arrnum[i] + '"]').addClass('timedisabled');
                                    $('.etime[value="' + arrnum[i] + '"]').attr('disabled', true);


                                }
                            }

                        } else {

                            $('.time').removeClass('timedisabled');
                            $('.etime').attr('disabled', false).prop('checked', false);

                        }

                    }

                });
            }
        })

        $('#mainform').validate({
            rules: {
                date: "required",
                etime: "required"

            },
            messages: {
                date: errorMessage('Please Select Date'),
                etime: errorMessage('Please Select Time')
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "date") {
                    $(".dateerror").html(error);
                } else if (element.attr("name") == "etime") {
                    $(".timeerror").html(error);
                }
            },
        })

    })

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 14px"><i class="fas fa-exclamation-square"></i> ' + message + '</label>';
    }
</script>