<style>
    .btn,
    .form-control {
        box-shadow: none !important;
    }
</style>
<form action="<?= base_url('HealthWorker/savewalkin') ?>" method="POST" id="formwalk">
    <input type="hidden" name="firstname" id="fname">
    <input type="hidden" name="lastname" id="lname">
    <input type="hidden" name="middlename" id="mname">
    <input type="hidden" name="contact" id="cnt">
    <input type="hidden" name="email" id="eml">
    <input type="hidden" name="address" id="addr">
    <input type="hidden" name="gender" id="gnd">
    <input type="hidden" name="apptype" id="apptype">
    <input type="hidden" name="apptypeinfo" id="apptypeinfo">
    <input type="hidden" name="emergency" id="emerg">
    <input type="hidden" name="others" id="oth">
    <button type="submit" id="subbb" hidden>submit</button>
</form>
<div class="d-flex justify-content-center mb-5" style="">

    <div style="width: 50rem">
        <div class="card card-body mt-3 mx-5 border-0 rounded-0" style="box-shadow: 0 4px 4px rgba(0,0,0,0.1)">
            <p class="mb-0 fs-5 fw-bold">Walk In</p>
            <hr>
            <div class="bg-light p-2 mb-4">
                <p class="mb-0">Patient Details</p>
            </div>
            <div class="row gy-2">
                <div class="col-lg-4">
                    <label for="">Firstname</label>
                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" id="firstname">
                    <div class="message" id="ferror"></div>
                </div>
                <div class="col-lg-4">
                    <label for="">Middlename</label>
                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" placeholder="(Optional)" id="middlename">
                    <div class="message" id="merror"></div>

                </div>
                <div class="col-lg-4">
                    <label for="">Lastname</label>
                    <input type="text" onkeydown="return alphaOnly(event)" class="form-control" id="lastname">
                    <div class="message" id="lerror"></div>

                </div>
                <div class="col-lg-4">
                    <label for="">Contact No.</label>
                    <input onkeypress="return isNumber(event)" maxlength="11" minlength="11" type="text" class="form-control" id="contact">
                    <div class="message" id="cerror"></div>

                </div>
                <div class="col-lg-5">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="(Optional)" id="email">
                    <div class="message" id="eerror"></div>

                </div>
                <div class="col-lg-3">
                    <label for="">Gender</label>
                    <select name="" class="form-select" id="setgender">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="message" id="gerror"></div>

                </div>
                <div class="col-lg-12">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="address">
                    <div class="message" id="aerror"></div>

                </div>
                <div class="col-lg-12 d-flex">
                    <label for="">Appointment Type</label>
                    <div class="message ms-3" id="aperror"></div>

                </div>
                <div class="col-lg-3">
                    <input type="radio" class="btn-check w-100 btnchoice" value="immuno" name="appchoice" id="immuno" autocomplete="off">
                    <label class="btn btn-outline-dark w-100" for="immuno">Immunization</label><br>
                </div>
                <div class="col-lg-3">
                    <input type="radio" class="btn-check w-100 btnchoice" value="prenatal" name="appchoice" id="prenatal" autocomplete="off">
                    <label class="btn btn-outline-dark w-100" for="prenatal">Prenatal</label><br>
                </div>
                <div class="col-lg-3">
                    <input type="radio" class="btn-check w-100 btnchoice" value="dental" name="appchoice" id="dental" autocomplete="off">
                    <label class="btn btn-outline-dark w-100" for="dental">Dental</label><br>
                </div>
                <div class="col-lg-3">
                    <input type="radio" class="btn-check w-100 btnchoice" value="emergency" name="appchoice" id="emergency" autocomplete="off">
                    <label class="btn btn-outline-dark w-100" for="emergency">Emergency</label><br>
                </div>
                <div class="col-lg-12 " id="immunization">

                    <div class="row mt-4">
                        <?php
                        $resim = $this->db->query('SELECT * FROM immunization');
                        foreach ($resim->result_array() as $data) {
                        ?>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input immcheck" type="checkbox" name="apptype" value="<?= $data['Name'] ?>" id="imm<?= $data['ID'] ?>">
                                    <label class="form-check-label" for="imm<?= $data['ID'] ?>">
                                        <?= $data['Name'] ?>
                                    </label>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input immcheck" type="checkbox" name="apptype" value="Others" id="otheri">
                                <label class="form-check-label" for="otheri">
                                    Others
                                    <textarea name="" id="" class="otherstext form-control" cols="30" rows="1"></textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 " id="prenatalcard">

                    <div class="row mt-4">
                        <?php
                        $pres = $this->db->query('SELECT * FROM prenatal');
                        foreach ($pres->result_array() as $data) {
                        ?>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input precheck" type="checkbox" name="apptype" value="<?= $data['Name'] ?>" id="pre<?= $data['ID'] ?>">
                                    <label class="form-check-label" for="pre<?= $data['ID'] ?>">
                                        <?= $data['Name'] ?>
                                    </label>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input precheck" type="checkbox" name="apptype" value="Others" id="otherd">
                                <label class="form-check-label" for="otherd">
                                    Others
                                    <textarea name="" id="" class="otherstext form-control" cols="30" rows="1"></textarea>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 " id="dentalcard">

                    <div class="row mt-4">
                        <?php
                        $dres = $this->db->query('SELECT * FROM dental');
                        foreach ($dres->result_array() as $data) {
                        ?>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input dencheck" type="checkbox" name="apptype" value="<?= $data['Name'] ?>" id="dent<?= $data['ID'] ?>">
                                    <label class="form-check-label" for="dent<?= $data['ID'] ?>">
                                        <?= $data['Name'] ?>
                                    </label>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input dencheck" type="checkbox" name="apptype" value="Others" id="otherp">
                                <label class="form-check-label" for="otherp">
                                    Others
                                    <textarea name="" id="" class="otherstext form-control" cols="30" rows="1"></textarea>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 " id="emergencycard">
                    <textarea name="" placeholder="Input emergency detail" class="form-control" id="emtext" cols="30" rows="5"></textarea>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div class="message" id="emerror"></div>
                        <button class="btn btn-primary rounded-pill px-5 btn-sm" type="button" id="submitbtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast success_save align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fa-solid fa-check-double me-2"></i> Successfully save a walk-in patient details</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->flashdata('success_save')) {
?>
    <script>
        $(document).ready(function() {
            $('.success_save').toast('show')
        })
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {
        $("#submitbtn").click(function() {
            $("#subbb").click();
        });

        $('#formwalk').validate({
            ignore: [],
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
                email: {
                    email: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                gender: "required",
                address: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                },
                apptype: "required",
                apptypeinfo: {
                    required: function() {
                        if ($('#apptype').val() === "") {
                            return false;
                        } else {
                            if ($('#apptype').val() !== "emergency") {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                emergency: {
                    required: function() {

                        if ($('#apptype').val() !== "emergency") {
                            return false;
                        } else {
                            return true;
                        }


                    },
                    normalizer: function(value) {
                        return $.trim(value);
                    }

                }
            },
            messages: {
                firstname: errorMessage('Please input a firstname'),
                lastname: errorMessage('Please input a lastname'),
                contact: {
                    required: errorMessage('Please input a contact'),
                    maxlength: errorMessage('Please enter 11 digit number'),
                    minlength: errorMessage('Please enter 11 digit number'),
                },
                email: {
                    email: errorMessage('Invalid email address'),
                },
                gender: errorMessage('Select a gender'),
                address: errorMessage('Please input an address'),
                apptype: errorMessage('Please select appointment type'),
                apptypeinfo: {
                    required: errorMessage('Please select type of service')
                },
                emergency: {
                    required: errorMessage('Please input emergency details')
                }
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "firstname") {
                    $("#ferror").html(error);
                } else if (element.attr("name") == "lastname") {
                    $("#lerror").html(error);
                } else if (element.attr("name") == "middlename") {
                    $("#merror").html(error);
                } else if (element.attr("name") == "contact") {
                    $("#cerror").html(error);

                } else if (element.attr("name") == "email") {
                    $("#eerror").html(error);

                } else if (element.attr("name") == "gender") {
                    $("#gerror").html(error);

                } else if (element.attr("name") == "address") {
                    $("#aerror").html(error);

                } else if (element.attr("name") == "apptype") {
                    $("#aperror").html(error);
                } else if (element.attr("name") == "apptypeinfo") {
                    $("#emerror").html(error);
                } else if (element.attr("name") == "emergency") {
                    $("#emerror").html(error);
                }
            }

        })



        checkbak('.immcheck', '#apptypeinfo');
        checkbak('.precheck', '#apptypeinfo')
        checkbak('.dencheck', '#apptypeinfo')

        changeinp('#firstname', '#fname')
        changeinp('#middlename', '#mname')
        changeinp('#lastname', '#lname')
        changeinp('#contact', '#cnt')
        changeinp('#email', '#eml')
        changeinp('#address', '#addr')
        changeinp('#emtext', '#emerg')
        changeinp('.otherstext', '#oth')

        $('#immunization').hide();
        $('#prenatalcard').hide();
        $('#dentalcard').hide();
        $('#emergencycard').hide();

        $('.btnchoice').click(function() {
            $('#apptypeinfo').val('')
            if ($(this).val() === "immuno") {
                $('#immunization').show();
                $('#prenatalcard').hide();
                $('#dentalcard').hide();
                $('#emergencycard').hide()
                $('#apptype').val('immunization')
                $('.precheck, .dencheck').prop('checked', false);


            } else if ($(this).val() === "prenatal") {
                $('#prenatalcard').show();
                $('#immunization').hide();
                $('#dentalcard').hide();
                $('#emergencycard').hide()
                $('#apptype').val('prenatal')
                $('.immcheck, .dencheck').prop('checked', false);




            } else if ($(this).val() === "dental") {
                $('#dentalcard').show();
                $('#immunization').hide();
                $('#prenatalcard').hide();
                $('#emergencycard').hide()
                $('#apptype').val('dental')
                $('.precheck, .immcheck').prop('checked', false);




            } else if ($(this).val() === "emergency") {
                $('#emergencycard').show()
                $('#dentalcard').hide();
                $('#immunization').hide();
                $('#prenatalcard').hide();
                $('#apptype').val('emergency')
                $('.immcheck, .dencheck, .precheck').prop('checked', false);

            }
        })

        function changeinp(id, id2) {
            $(id).keyup(function() {
                $(id2).val($(this).val());
            })
        }
        $('#setgender').click(function() {
            $('#gnd').val($(this).val());
        })


        function checkbak(id1, id2) {
            $(id1).change(function() {
                var rec = [];
                $(id1 + ":checked").each(function() {
                    rec.push($(this).val())
                });
                $(id2).val(rec);
            });

        }

        function errorMessage(message) {
            return '<label class="text-danger" style="font-size: 14px"><i class="fas fa-exclamation-square"></i> ' + message + '</label>';
        }
    })
</script>