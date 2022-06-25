<style>
    .shadow-solid {
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .search {
        top: 3px;
        left: 5px;

    }

    .search:hover {
        cursor: pointer;

    }

    .searchinp {
        text-indent: 30px;
        border-top-left-radius: 3px !important;
        border-bottom-left-radius: 3px !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        box-shadow: none !important;
        border: 1px solid white !important;

    }

    .searchinp:focus {
        border: 1px solid dodgerblue !important;
    }

    #search {
        border: 0;
        background-color: dodgerblue;
        color: white;
        border-top-right-radius: 3px !important;
        border-bottom-right-radius: 3px !important;
    }

    #search:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.25);
    }



    .colorsearch {
        fill: gray;
        margin: 5px;
    }

    .xBtn2 {
        cursor: pointer;
    }

    .xBtn2:hover>.messageIcon,
    .xBtn2:hover>.viewIcon {
        transform: scale(1.1);
        cursor: pointer;
    }

    .xBtn2:active>.messageIcon,
    .xBtn2:active>.viewIcon {
        transform: scale(1);
        cursor: pointer;
    }

    .xBtn2:hover {
        color: dodgerblue !important;
    }

    .xBtn2:active {
        color: #006ad1;
    }

    .cardN:hover {
        box-shadow: 0px 4px 4px rgba(30, 144, 255, 0.25);
    }

    @keyframes rotation {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(359deg);
        }
    }

    .rotate {
        animation: rotation 2s infinite linear;
    }
</style>

<div class="contd" style="margin-top: 3.5rem">

    <div class="row mx-3 g-3 mb-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div class="position-relative" style="width: 25rem">
                        <input type="text" class="form-control border-0 searchinp" placeholder="Search..." style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        <div class="position-absolute search">
                            <?= searchIcon(20, 20, 'colorsearch') ?>
                        </div>
                    </div>
                    <button id="search">Search</button>
                </div>
                <button class="btn btn-success rounded-0" id="compbtn">View Completed</button>
            </div>
            <p class="mb-0 mt-2 text-secondary" id="showtxt">Showing completed appointments</p>
            <p class="mb-0 mt-2 text-secondary" id="actxt">Showing approve appointments</p>
        </div>
        <div class="col-lg-12" id="patientlist">


        </div>
        <div class="searchpatient col-lg-12"></div>


    </div>

</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
    <div class="toast successtoast align-items-center text-white bg-success border-0" data-bs-delay="3000" data-bs-autohide="true" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center">
                <i class="fa-solid fs-4 fa-check-double me-2"></i> You have successfully mark an appointment as completed.</a>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php
if ($this->session->userdata('complete_success')) {
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
        var base_url = window.location.origin;
        var stat = 'approve';
        $('#showtxt').hide()

        getPatientList(stat)
        $(document).on('click', '#compbtn', function() {

            if ($(this).text() === 'View Completed') {
                stat = 'complete';
                getPatientList(stat)
                $(this).text('View Approve').addClass('btn-warning').removeClass('btn-success')
                $('#showtxt').show()
                $('#actxt').hide();

            } else {
                stat = 'approve';
                getPatientList(stat)
                $(this).text('View Completed').removeClass('btn-warning').addClass('btn-success')
                $('#showtxt').hide();
                $('#actxt').show();

            }

        })

        $(document).on('click', '#search', function() {
            var search_value = $('.searchinp').val();
            if (search_value === "")
                getPatientList(stat);
            else
                searchPatient(search_value, stat)
        })
        $(".searchinp").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#search").click();
            }
            if ($(this).val() === "") {
                getPatientList(stat);


            }
        });

        function getPatientList(stats) {
            $.ajax({
                url: "<?= base_url('Doctor/fetchpatientlist') ?>",
                method: "POST",
                data: {
                    patient: 'fetch-patient',
                    status: stats,
                },
                dataType: 'json',
                beforeSend: function() {
                    var out = '<div class="d-flex justify-content-center"><div class="mt-5">';
                    out += '<p class="text-center fs-1 mb-0 rotate text-secondary"><i class="fas fa-spinner"></i></p>';
                    out += '<p class="text-center">Loading...</p>';
                    out += '</div></div>'
                    $('#patientlist').html(out);

                },
                success: function(data) {
                    // console.log(data);
                    var output = '<div class="row g-3">'
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            output += '<div class="col-lg-3">';
                            output += '<div class="card card-body border shadow-solid cardN">';
                            output += '<div class="row g-0">';
                            output += '<div class="col-lg-8">';
                            output += '<h6 class="fw-bold">' + data[i].name + '</h6>';
                            output += '<label for="" style="line-height: 14px;">';
                            output += '<span class="text-secondary fw-bold" style="font-size: 14px;">Appointment Date:</span>';
                            output += '<span style="font-size: 12px">' + data[i].date + '</span>';
                            output += '</label>';
                            output += '<label class="text-success" style="font-size: 14px">' + data[i].type + '</label>';
                            output += '<label class="mb-3 text-primary d-block" style="font-size: 14px">' + data[i].apptype + '</label>';
                            output += '<div class="">'

                            if (data[i].status !== "complete") {
                                output += '<a class="xBtn2 text-dark text-decoration-none" href="' + base_url + '/DoctorChat/makemessage/' + data[i].patientID + '">' + data[i].messageIcon + '<span style="font-size: 14px">Chat</span></a>';
                            }


                            output += '<a class="xBtn2 ' + ((data[i].status !== "complete") ? 'ms-2' : '') + ' text-dark text-decoration-none" href="' + base_url + '/D/ViewPatient/' + data[i].ID + '">' + data[i].viewIcon + '<span style="font-size: 14px">View</span></a>';
                            output += '</div></div>';
                            output += '<div class="col-lg-4">';
                            output += '<img src="' + data[i].profile + '" width="80" style="object-fit: cover;border-radius: 50%;border: 1px solid gray;" height="80" alt="">';
                            output += '</div></div></div></div>';
                        }
                    } else {
                        output += '<p class="text-center text-secondary mt-5 display-3 mb-0" style="line-height: 2px;"><i class="fad fa-procedures"></i></p>';
                        output += '<p class="text-center">No Patient Yet</p>';
                    }
                    output += '</div>';
                    $('#patientlist').html(output);
                }

            })
        }

        function searchPatient(search, stats) {
            $.ajax({
                url: "<?= base_url('Doctor/searchPatient') ?>",
                method: "POST",
                data: {
                    search: search,
                    status: stats
                },
                dataType: 'json',
                beforeSend: function() {
                    var out = '<div class="d-flex justify-content-center"><div class="mt-5">';
                    out += '<p class="text-center fs-1 mb-0 rotate text-secondary"><i class="fas fa-spinner"></i></p>';
                    out += '<p class="text-center">Loading...</p>';
                    out += '</div></div>'
                    $('#patientlist').html(out);

                },
                success: function(data) {
                    console.log(data);
                    var output = '<div class="row g-3">'
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            output += '<div class="col-lg-3">';
                            output += '<div class="card card-body border shadow-solid cardN">';
                            output += '<div class="row g-0">';
                            output += '<div class="col-lg-8">';
                            output += '<h6 class="fw-bold">' + data[i].name + '</h6>';
                            output += '<label for="" style="line-height: 14px;">';
                            output += '<span class="text-secondary fw-bold" style="font-size: 14px;">Appointment Date:</span>';
                            output += '<span style="font-size: 12px">' + data[i].date + '</span>';
                            output += '</label>';
                            output += '<label class="mb-3 text-success" style="font-size: 14px">' + data[i].type + '</label>';
                            output += '<div class="">'
                            output += '<a class="xBtn2 text-dark text-decoration-none" href="' + base_url + '/DoctorChat/makemessage/' + data[i].patientID + '">' + data[i].messageIcon + '<span style="font-size: 14px">Chat</span></a>';
                            output += '<a class="xBtn2 ms-2 text-dark text-decoration-none" href="' + base_url + '/D/ViewPatient/' + data[i].ID + '">' + data[i].viewIcon + '<span style="font-size: 14px">View</span></a>';
                            output += '</div></div>';
                            output += '<div class="col-lg-4">';
                            output += '<img src="' + data[i].profile + '" width="80" style="object-fit: cover;border-radius: 50%;border: 1px solid gray;" height="80" alt="">';
                            output += '</div></div></div></div>';
                        }
                    } else {
                        output += '<p class="mb-0 text-center display-2 text-danger mt-5" style="line-height: 0px"><i class="fad fa-file-search"></i></p>';
                        output += '<p class="text-center fs-5 text-secondary">No Result Found</p>';

                    }
                    output += '</div>';
                    $('#patientlist').html(output);
                }

            })
        }


    })
</script>