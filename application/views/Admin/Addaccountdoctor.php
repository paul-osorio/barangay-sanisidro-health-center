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
        width: 40px;
        height: 20px;
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
        width: 18px;
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
        padding-bottom: 10px;
    }

    .righttxt {
        font-size: 14px;
    }

    .form-select {
        box-shadow: none !important;
    }


    @keyframes slideright {
        from {
            background: linear-gradient(to right, #155ABA 50%, lightgray 50%) right;
            background-size: 200%;
            background-color: lightgray;

        }

        to {
            background: linear-gradient(to right, #155ABA 50%, lightgray 50%) right;
            background-size: 200%;
            background-position: left;
            color: white;

        }
    }

    @keyframes slideleft {


        from {
            background: linear-gradient(to right, #155ABA 50%, lightgray 50%) right;
            background-size: 200%;
            background-position: left;
            color: white;

        }

        to {
            background: linear-gradient(to right, #155ABA 50%, lightgray 50%) right;
            background-size: 200%;
            background-color: black;

        }
    }

    .step {
        height: 30px;
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .active {
        background-color: #155ABA;
        color: white;
    }

    .inactive {
        background-color: lightgray;
        color: black;
    }

    .rightstep {
        animation: slideright .5s ease forwards .3s;

    }

    .leftstep {
        animation: slideleft .5s ease forwards;

    }


    .line {
        background-color: lightgray;
        height: 3px;
        width: 9.2rem;
    }

    .lineactive {
        background-color: #155ABA;
    }

    .deactiveline {
        animation: slideleft .5s ease forwards .3s;

    }

    .activeline {
        animation: slideright .5s ease forwards;
    }



    .radiobtn {
        border: 1px solid lightgray;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 20px;
        cursor: pointer;
        background: linear-gradient(white 50%, darkblue 50%);
        background-size: 100% 200%;
        transition: background .5s ease;
        background-position: 100% 200%;
        border-radius: 5px;
        position: relative;
    }

    .radiobtn:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }

    .radioval:checked~.radiobtn {
        color: white;
        background-position: 100% 100%;
    }



    .badge {
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .badge1 {
        position: absolute;
        right: 15px;
        top: 10px;
    }

    .radiobtn:after {
        font-family: "Font Awesome 5 Pro";
        content: "\f111";
        font-size: 18px;
        position: absolute;
        color: gray;
        right: 10px;
        top: 10px;
        transition: .5s ease;

    }

    .radioval:checked~.radiobtn:after {
        font-family: "Font Awesome 5 Pro";
        content: "\f058";
        font-size: 18px;
        color: white;
        transition: .5s ease;
        top: 10px;

    }

    #nextbtn,
    #nextbtn1,
    #nextbtn2 {
        border: 0;
        background-color: rgba(100, 50, 255);
        color: white;
        width: 5rem;
        border-radius: 5px;
        height: 2rem;
    }

    #submitbtn {
        border: 0;
        background-color: rgba(20, 165, 0);
        color: white;
        width: 5rem;
        border-radius: 5px;
        height: 2rem;
    }

    .maincard {
        min-height: 27rem;
        max-height: 35rem;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    #prevbtn,
    #prevbtn1,
    #prevbtn2 {
        border: 0;
        color: gray;
        background-color: white;
    }

    .addimg {
        height: 100px;
        width: 100px;
        object-fit: cover;
        border: 1px solid gray;
        border-radius: 50%;
    }

    #addprof {
        border: 0;
        font-size: 13px;
        margin-top: 5px;
        padding: 5px 15px 5px 15px;
        background-color: rgba(50, 50, 50);
        color: white;
        outline: none;
    }

    #addprof:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    #addprof:active {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
        transform: translateY(2px);
    }

    .schedbtn {
        height: 50px;
        border: 1px solid darkblue;
        color: darkblue;
        width: 100%;
        display: flex;
        align-items: center;
        padding-left: 15px;
        position: relative;
        cursor: pointer;
    }

    .schedbtn:hover {
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .schedbtn:after {
        font-family: "Font Awesome 5 Pro";
        content: "\f111";
        position: absolute;
        right: 15px;
    }

    .schedradio:checked~.schedbtn {
        background-color: darkblue;
        color: white;
    }

    .schedradio:checked~.schedbtn:after {
        font-family: "Font Awesome 5 Pro";
        content: "\f058";
        position: absolute;
        right: 15px;
    }

    #viewall {
        border: 0;
        background-color: rgba(140, 0, 255);
        padding: 5px 10px 5px 10px;
        color: white;
        margin-bottom: 10px;
    }

    #viewall:hover {
        box-shadow: 0 4px 2px rgba(0, 0, 0, 0.2);
    }

    #viewall:active {
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);

        transform: scale(0.98);
    }

    input[type=password]::-ms-reveal,
    input[type=password]::-ms-clear {
        display: none;
    }
</style>
<div class="conta" style="margin-top: 5rem;overflow-x: hidden">
    <form action="<?= base_url('AdminAuth/addDoctor') ?>" method="POST" id="realform" enctype="multipart/form-data">
        <input type="text" name="lastname" id="lname" hidden>
        <input type="text" name="firstname" id="fname" hidden>
        <input type="text" name="middlename" id="mname" hidden>
        <input type="text" name="gender" id="gnder" hidden>
        <input type="text" name="contact" id="cnt" hidden>
        <input type="text" name="specialties" id="spec" hidden>
        <input type="text" name="email" id="email" hidden>
        <input type="text" name="password" id="pass" hidden>
        <input type="file" id="file" name="file" style="position: absolute;opacity: 0;left:0;">
        <input type="file" id="signfile" name="signfile" style="position: absolute;opacity: 0;left:0;">

        <input type="hidden" name="monday" id="mon" value="no">
        <input type="hidden" name="mfrom" id="monfrom" value="8:00 AM">
        <input type="hidden" name="mto" id="monto" value="5:00 PM">


        <input type="hidden" name="tuesday" id="tues" value="no">
        <input type="hidden" name="tfrom" id="tuesfrom" value="8:00 AM">
        <input type="hidden" name="tto" id="tuesto" value="5:00 PM">

        <input type="hidden" name="wednesday" id="wed" value="no">
        <input type="hidden" name="wfrom" id="wedfrom" value="8:00 AM">
        <input type="hidden" name="wto" id="wedto" value="5:00 PM">

        <input type="hidden" name="thursday" id="thurs" value="no">
        <input type="hidden" name="thfrom" id="thursfrom" value="8:00 AM">
        <input type="hidden" name="thto" id="thursto" value="5:00 PM">

        <input type="hidden" name="friday" id="fri" value="no">
        <input type="hidden" name="ffrom" id="frifrom" value="8:00 AM">
        <input type="hidden" name="fto" id="frito" value="5:00 PM">


        <!--  -->
        <button type="submit" id="realsubmit" hidden>submit</button>
    </form>
    <div class="row  mb-4" style="margin: 0 10rem 0 10rem">
        <div class="col-lg-12">
            <button id="viewall" onclick="location.href='<?= base_url('Admin/ViewMedicalStaff') ?>'">View All Account</button>
            <div class="card card-body border-0 maincard position-relative">
                <div class="">
                    <div class="card card-body py-1 mb-2 rounded-0 bg-light border-0 text-center text-primary">ADD MEDICAL STAFF ACCOUNT</div>
                    <div class="d-flex justify-content-between" style="margin: 0 6rem 0 6rem">
                        <div class="position-relative">
                            <div class="firststep step active">1</div>
                            <span class="position-absolute" style="top: 35px;color: #155ABA;left: -60px;width: 20rem">Personal Information</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="line" id="line1"></div>
                        </div>
                        <div class="position-relative">
                            <div class="step inactive" id="active1">2</div>
                            <span class="position-absolute" style="top: 35px;color: #155ABA;left: -60px;width: 20rem" id="title1">Account Information</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="line" id="line2"></div>
                        </div>
                        <div class="position-relative">

                            <div class="step inactive" id="active2">3</div>
                            <span class="position-absolute" style="top: 35px;color: #155ABA;left: -25px;width: 20rem" id="title2">Set Schedule</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="line" id="line3"></div>
                        </div>
                        <div class="position-relative">

                            <div class="step inactive" id="active3">4</div>
                            <span class="position-absolute" style="top: 35px;color: #155ABA;left: -25px;width: 20rem" id="title3">Add Profile</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="mt-5 mx-5 firstcard">
                        <form action="" id="formadd" method="POST">
                            <div class="row gy-3">
                                <div class="col-lg-4">
                                    <label for="">Firstname</label>
                                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" id="fname12" name="firstname" onkeyup="savevalue('fname',this.value)" placeholder="Enter Firstname">
                                </div>
                                <div class=" col-lg-4">
                                    <label for="">Lastname</label>
                                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" name="lastname" onkeyup="savevalue('lname',this.value)" placeholder="Enter Lastname">
                                </div>
                                <div class=" col-lg-4">
                                    <label for="">Middlename</label>
                                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" name="middlename" onkeyup="savevalue('mname',this.value)" placeholder="Enter Middlename">
                                </div>
                                <div class=" col-lg-4">
                                    <label for="">Contact Number</label>
                                    <input type="text" maxlength="11" minlength="11" class="form-control" onkeypress="return isNumber(event)" name="contact" onkeyup="savevalue('cnt',this.value)" placeholder="Ex. 09xxxxxxxxx">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Gender</label>

                                    <select name="gender" id="" class="form-select" onchange="savevalue('gnder',this.value)">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <hr class="mb-1">

                                <div class="col-lg-12">
                                    <label for="" class="d-block mb-2">Select Medical Specialties</label>
                                    <div class="row">
                                        <div class="col-lg-4 ">
                                            <div class="checkcard position-relative">
                                                <input type="radio" value="midwife" onchange="savevalue('spec',this.value)" id="midwife" name="specialties" class="radioval position-absolute" style="opactiy: 0">

                                                <label for="midwife" class="radiobtn">
                                                    Midwife
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="checkcard position-relative">

                                                <input type="radio" value="dentist" onchange="savevalue('spec',this.value)" id="dentist" name="specialties" class="radioval position-absolute" style="opactiy: 0">

                                                <label for="dentist" class="radiobtn">
                                                    Dentist
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="checkcard position-relative">

                                                <input type="radio" value="nurse" onchange="savevalue('spec',this.value)" id="nurse" name="specialties" class="radioval position-absolute" style="opactiy: 0">

                                                <label for="nurse" class="radiobtn">
                                                    Nurse
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="specerror"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button id="nextbtn" type="button">Next</button>

                                    </div>
                                </div>

                        </form>

                    </div>
                </div>
                <div class="">
                    <div class="seccard" style="margin: 4rem 10rem 0 10rem">

                        <form action="" method="POST" id="formacc">
                            <div class="row gy-3">
                                <div class="col-lg-12">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" onkeyup="savevalue('email',this.value)" id="yeemail" placeholder="Enter Email Address">
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative d-flex align-items-center">
                                        <input required type="password" name="password" id="pass1" onkeyup="savevalue('pass',this.value)" class="form-control rounded-0" placeholder="Enter Password">
                                        <i class="fas fa-eye position-absolute me-2 passeye" id="passtypechange1" style="right: 0; cursor: pointer"></i>
                                    </div>
                                    <button type="button" id="genpass1" class="btn-sm btn btn-secondary rounded-0 w-100">Generate Password</button>
                                </div>
                                <div class="passerror"></div>


                            </div>

                        </form>
                        <div class="d-flex justify-content-end mt-4 position-absolute" style="bottom: 23px; right: 64px">
                            <button id="prevbtn" type="button">Previous</button>
                            <button id="nextbtn1" class="ms-2" type="button">Next</button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="thirdcard" style="margin: 2rem 5rem 0 5rem">
                        <div class="d-flex justify-content-center">
                            <form action="" id="schedform">
                                <?php
                                $arrtime = array('8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM');
                                ?>
                                <table>
                                    <tr>
                                        <td class="pe-5">Monday</td>
                                        <td class="pe-5">
                                            <div class="switch">
                                                <input id="monday" name="days" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                                <label for="monday"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="mondayfrom" id="mfrom" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>"><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="text-center pe-4 ps-4">to</td>
                                        <td>
                                            <select name="mondayto" id="mto" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>" <?= ($arrtime[$i] === "5:00 PM") ? 'selected' : '' ?>><?= $arrtime[$i] ?></option>

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
                                                <input id="tuesday" name="days" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                                <label for="tuesday"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="tuesdayfrom" id="tfrom" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>"><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="text-center">to</td>
                                        <td>
                                            <select name="tuesdayto" id="tto" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>" <?= ($arrtime[$i] === "5:00 PM") ? 'selected' : '' ?>><?= $arrtime[$i] ?></option>

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
                                                <input id="wednesday" name="days" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                                <label for="wednesday"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="wednesdayfrom" id="wfrom" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>"><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="text-center">to</td>
                                        <td>
                                            <select name="wednesdayto" id="wto" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>" <?= ($arrtime[$i] === "5:00 PM") ? 'selected' : '' ?>><?= $arrtime[$i] ?></option>

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
                                                <input id="thursday" name="days" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                                <label for="thursday"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="thursdayfrom" id="thfrom" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>"><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="text-center">to</td>
                                        <td>
                                            <select name="thursdayto" id="thto" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>" <?= ($arrtime[$i] === "5:00 PM") ? 'selected' : '' ?>><?= $arrtime[$i] ?></option>

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
                                                <input id="friday" name="days" value="yes" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                                <label for="friday"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="fridayfrom" id="ffrom" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>"><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>

                                        <td class="text-center">to</td>
                                        <td>
                                            <select name="fridayto" id="fto" class="form-select">
                                                <?php
                                                for ($i = 0; $i < count($arrtime); $i++) {
                                                ?>
                                                    <option value="<?= $arrtime[$i] ?>" <?= ($arrtime[$i] === "5:00 PM") ? 'selected' : '' ?>><?= $arrtime[$i] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>






                                <div class="dayserror"></div>
                            </form>
                        </div>
                        <div class="d-flex justify-content-end mt-4 position-absolute" style="bottom: 23px; right: 64px">
                            <button id="prevbtn1" type="button">Previous</button>
                            <button id="nextbtn2" class="ms-2" type="button">Next</button>
                        </div>
                    </div>
                </div>
                <div class="fourthcard" style="margin: 2rem 15rem 0 15rem">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="<?= base_url('assets/images/profile.png') ?>" id="dp" class="addimg" alt="">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="addprof"><i class="fad fa-upload me-2"></i> Add Profile</button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button class="btn btn-primary btn-sm rounded-0" id="sigprof"><i class="fad fa-upload me-2"></i> Upload Signature</button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <p id="signfilename"></p>
                    </div>

                    <div class="signerror d-flex justify-content-center"></div>
                    <div class="proferror d-flex justify-content-center"></div>

                    <div class="d-flex justify-content-end mt-4 position-absolute" style="bottom: 23px; right: 64px">
                        <button id="prevbtn2" type="button">Previous</button>
                        <button id="submitbtn" class="ms-2" type="button">Submit</button>
                    </div>
                </div>


            </div>



        </div>

    </div>
</div>
</div>

<script>
    $('.seccard').hide();
    // $('.firstcard').hide();
    $('.thirdcard').hide();
    $('.fourthcard').hide();

    $(document).ready(function() {

        $('#genpass1').click(function() {
            $('#pass1').val(Math.random().toString(36).slice(-8))
            $('#passtypechange1').show();

        })

        var passtype1 = document.getElementById("pass1");
        $('#passtypechange1').click(function() {
            if (passtype1.type === "password") {
                $(this).removeClass('fas fa-eye');
                $(this).addClass('fas fa-eye-slash');
                passtype1.type = "text";
            } else {
                passtype1.type = "password";
                $(this).removeClass('fas fa-eye-slash');
                $(this).addClass('fas fa-eye');
            }
        });


        $('#addprof').click(function() {
            $('#file').click();

            $("#file").change(() => {
                var blah = document.querySelector("#dp");
                var imgInp = document.querySelector("#file");
                const [file] = imgInp.files;
                if (file) {
                    blah.src = URL.createObjectURL(file);
                } else {
                    $('#dp').attr("src", "<?= base_url('assets/images/profile.png') ?>");

                }
            });
        })

        $('#sigprof').click(function() {
            $('#signfile').click();

            $("#signfile").change(() => {
                var blah = document.getElementById("#signfilename");
                var imgInp = document.querySelector("#signfile");
                const [file] = imgInp.files;
                if (file) {
                    var fullPath = document.getElementById('signfile').value;
                    if (fullPath) {
                        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                        var filename = fullPath.substring(startIndex);
                        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                            filename = filename.substring(1);
                        }
                        $('#signfilename').text(filename)

                    }
                } else {
                    $('#signfilename').text('')

                }
            });
        })


        $('#title1').hide();
        $('#title2').hide();
        $('#title3').hide();

        $('#formadd').validate({
            rules: {
                firstname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                lastname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                contact: {
                    required: true,
                    maxlength: 11,
                    minlength: 11,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                gender: "required",
                specialties: {
                    required: true,
                }
            },
            messages: {
                firstname: {
                    required: errorMessage('Please enter a firstname'),
                },
                lastname: errorMessage('Please enter a lastname'),
                contact: {
                    required: errorMessage('Please input a contact'),
                    maxlength: errorMessage('Please enter 11 digit number'),
                    minlength: errorMessage('Please enter 11 digit number'),
                },
                gender: errorMessage('Please select a gender'),
                specialties: {
                    required: errorMessage('Please select a specialties'),
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "specialties") {
                    $(".specerror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },
        })
        $('#formacc').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('AdminAuth/checkemail') ?>",
                        type: "post",
                        data: {
                            email: () => {
                                return $('#yeemail').val();
                            }
                        }
                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                password: {
                    minlength: 6,
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                }
            },
            messages: {
                email: {
                    required: errorMessage('Please enter an email address'),
                    email: errorMessage('Please enter a valid email address'),
                    remote: errorMessage('Email already taken'),
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                password: {
                    minlength: errorMessage('At least 6 character'),
                    required: errorMessage('Please enter a password'),
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "password") {
                    $(".passerror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },

        })
        $('#realform').validate({
            rules: {
                file: {
                    required: true,
                },
                signfile: {
                    required: true,
                }
            },
            messages: {
                file: {
                    required: errorMessage('Please select a profile picture')
                },
                signfile: {
                    required: errorMessage('Please upload a signature')
                }

            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "file") {
                    $(".proferror").html(error);
                } else if (element.attr("name") == "signfile") {
                    $(".signerror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },
        })

        $('#schedform').validate({
            rules: {
                days: "required",
            },
            messages: {
                days: errorMessage('Please select atleast one day of schedule')
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "days") {
                    $(".dayserror").html(error);
                } else {
                    error.insertAfter(element);
                }
            },

        })





        $('#submitbtn').click(function() {
            $('#realsubmit').click();
        })


        $('#nextbtn').click(function() {

            if ($('#formadd').valid()) {
                $('.firstcard').hide();
                $('.seccard').show();
                $('#secondcard').show();

                $('#title1').show();

                $('#line1').addClass('activeline');
                $('#line1').addClass('lineactive');
                $('#line1').removeClass('deactiveline');

                $('#active1').addClass('rightstep');
                $('#active1').removeClass('leftstep');
            }
        })

        $('#nextbtn1').click(function() {

            if ($('#formacc').valid()) {
                $('.thirdcard').show();
                $('.seccard').hide();
                $('#title2').show();
                $('#pass').val($('#pass1').val());

                $('#line2').addClass('activeline');
                $('#line2').addClass('lineactive');
                $('#line2').removeClass('deactiveline');

                $('#active2').addClass('rightstep');
                $('#active2').removeClass('leftstep');

            }
        })
        $('#nextbtn2').click(function() {

            if ($('#schedform').valid()) {
                var monday = ($('#monday').is(':checked')) ? 'yes' : 'no';
                var mfrom = $('#mfrom').val();
                var mto = $('#mto').val();

                var tuesday = ($('#tuesday').is(':checked')) ? 'yes' : 'no';
                var tfrom = $('#tfrom').val();
                var tto = $('#tto').val();

                var wednesday = ($('#wednesday').is(':checked')) ? 'yes' : 'no';
                var wfrom = $('#wfrom').val();
                var wto = $('#wto').val();

                var thursday = ($('#thursday').is(':checked')) ? 'yes' : 'no';
                var thfrom = $('#thfrom').val();
                var thto = $('#thto').val();

                var friday = ($('#friday').is(':checked')) ? 'yes' : 'no';
                var ffrom = $('#ffrom').val();
                var fto = $('#fto').val();


                $('#mon').val(monday)
                $('#monfrom').val(mfrom)
                $('#monto').val(mto)

                $('#tues').val(tuesday)
                $('#tuesfrom').val(tfrom)
                $('#tuesto').val(tto)

                $('#wed').val(wednesday)
                $('#wedfrom').val(wfrom)
                $('#wedto').val(wto)

                $('#thurs').val(thursday)
                $('#thursfrom').val(tfrom)
                $('#thursto').val(tto)

                $('#fri').val(friday)
                $('#frifrom').val(ffrom)
                $('#frito').val(fto)



                $('.thirdcard').hide();
                $('.fourthcard').show();
                $('#title3').show();

                $('#line3').addClass('activeline');
                $('#line3').addClass('lineactive');
                $('#line3').removeClass('deactiveline');

                $('#active3').addClass('rightstep');
                $('#active3').removeClass('leftstep');

            }
        })
        $('#prevbtn2').click(function() {


            $('#title3').hide();

            $('.fourthcard').hide();
            $('.thirdcard').show();
            $('#line3').removeClass('activeline');
            $('#line3').addClass('lineactive');
            $('#line3').addClass('deactiveline');

            $('#active3').removeClass('rightstep');
            $('#active3').addClass('leftstep');

        })
        $('#prevbtn').click(function() {

            $('.firstcard').show();
            $('.seccard').hide();

            $('#title1').hide();

            $('#line1').removeClass('activeline');
            $('#line1').addClass('lineactive');
            $('#line1').addClass('deactiveline');

            $('#active1').removeClass('rightstep');
            $('#active1').addClass('leftstep');

        })

        $('#prevbtn1').click(function() {


            $('#title2').hide();

            $('.thirdcard').hide();
            $('.seccard').show();
            $('#line2').removeClass('activeline');
            $('#line2').addClass('lineactive');
            $('#line2').addClass('deactiveline');

            $('#active2').removeClass('rightstep');
            $('#active2').addClass('leftstep');

        })
    })

    function savevalue(iden, varval) {
        document.getElementById(iden).value = varval
    }

    function errorMessage(message) {
        return '<label class="text-danger" style="font-size: 14px"><i class="fas fa-exclamation-square"></i> ' + message + '</label>';
    }
</script>