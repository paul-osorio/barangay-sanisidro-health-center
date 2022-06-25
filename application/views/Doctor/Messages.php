<style>
    .chatprofimg {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover !important;


    }

    .rotload {
        animation: rotate 1.5s linear infinite;
    }

    @keyframes rotate {
        to {
            transform: rotate(360deg);
        }
    }

    .topchatimg {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        object-fit: cover !important;
    }

    #appsched {
        cursor: pointer;
    }

    #appsched:hover {
        transform: scale(1.05);
    }

    #appsched:active {
        transform: scale(1);
    }


    .sendinput {
        height: 45px;
        width: 38rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        outline: none;
        padding-left: 10px;
        padding-right: 10px;
        background-color: rgba(0, 0, 0, 0.08);
        font-size: 14px;
    }

    .sendbtn {
        border: 0;
        outline: none;
        background-color: dodgerblue;
        color: white;
        width: 40px;
    }

    .sendbtn:active {
        box-shadow: 0 4px 4px inset rgba(0, 0, 0, 0.2);
    }

    .reciever,
    .sender {
        max-width: 25rem;
        margin-bottom: 10px;
        padding: 5px 7px 5px 7px;
    }

    .senders,
    .recievers {
        max-width: 105rem;
        margin-bottom: 10px;
        padding: 5px 7px 5px 7px;
    }

    .senders {
        background-color: #567AF4;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
        color: white;
        font-size: 14px;

    }

    .recievers {
        background-color: rgba(0, 0, 0, 0.08);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        font-size: 14px;
    }

    .reciever {
        background-color: rgba(0, 0, 0, 0.08);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        font-size: 14px;
    }

    .sender {
        background-color: #567AF4;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
        color: white;
        font-size: 14px;

    }

    .receiverimg {
        height: 20px;
        width: 20px;
        border-radius: 50%;
        object-fit: cover !important;
    }

    .messages {
        overflow-y: auto;
    }

    .chatuserbox {
        cursor: pointer;
    }

    .chatuserbox:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .chatuserbox:active {
        background-color: rgba(0, 0, 0, 0.08);
    }

    a {
        text-decoration: none;
        color: black;
    }

    .chatactive {
        background-color: rgba(0, 0, 0, 0.08) !important;
    }

    .text-read {
        color: gray;
        font-weight: 500;
    }

    .srchback {
        border: 0;
        border-radius: 50%;
        background-color: white;
        margin-top: 5px;
        margin-left: 5px;
    }

    .srchback:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .srchback:active {
        background-color: rgba(0, 0, 0, 0.08);
    }

    .searchbutton {
        border: 1px solid lightgray;
        border-top-right-radius: 50px !important;
        border-bottom-right-radius: 50px !important;
        border-left: 0 !important;
        padding: 0 10px 0 10px;

    }

    .form-control:focus~.searchbutton {
        border-color: dodgerblue;
    }

    .searchbutton:hover {
        background-color: rgba(0, 0, 0, 0.08);
    }

    .searchbutton:active {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: dodgerblue !important;

    }


    .form-control {
        box-shadow: none !important;
        border-top-left-radius: 50px !important;
        border-bottom-left-radius: 50px !important;
        border-right: 0 !important;
    }

    .sendinput:focus {
        border: 1px solid dodgerblue;
    }

    .reciever:hover::after {
        content: attr(data-timestamp);
        position: absolute;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        width: 67px;
        text-align: center;
        margin-left: 10px;
        border-radius: 5px;

    }

    .sender:hover::before {
        content: attr(data-timestamp);
        position: absolute;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        width: 67px;
        text-align: center;
        border-radius: 5px;
        right: 105%;


    }

    .sidemessagebar {
        height: 100%;
        width: 0;
        background-color: white;
        position: absolute;
        right: 0;
        border-left: 1px solid lightgray;
    }




    .kebabmenu {
        width: 25px;
        height: 25px;
        margin-right: 10px;
        border-radius: 50%;
        cursor: pointer;
        border: 0;
        background-color: white;

    }

    .kebabmenu:hover {
        background-color: rgba(0, 0, 0, 0.05);

    }

    .rightbtn {
        border: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .viewbt {
        color: black;
        cursor: pointer;
    }

    .viewbt:hover {
        transform: scale(1.08);

    }

    .viewbt:hover .eyecon {
        transform: scale(1.08);
    }

    .ccard {
        border: 1px solid lightgray;

    }

    .cardholder {
        overflow-y: auto;
        /* height: 29rem; */
    }


    .replyleft {
        right: -25px;
        color: rgba(0, 0, 0, 0.2);
        font-size: 17px;
        opacity: 0;
        top: 8px;
        cursor: pointer;
    }

    .replyright {
        left: -25px;
        color: rgba(0, 0, 0, 0.2);
        font-size: 17px;
        opacity: 0;
        bottom: 16px;
        cursor: pointer;
    }

    .hell1:hover .rdcard1 .replyright {
        opacity: 1;
    }



    .replyleft:hover,
    .replyright:hover {
        color: rgba(0, 0, 0, 0.3);

    }

    .replyleft:active,
    .replyright:active {
        transform: scale(0.98)
    }

    .hell:hover .rdcard .replyleft {
        opacity: 1;
    }

    .rdcard,
    .rdcard1 {
        position: relative;
    }


    .closereply {
        color: rgba(0, 0, 0, 0.4) !important;
        cursor: pointer;
    }

    .closereply:hover {
        color: rgba(0, 0, 0, 0.6) !important;
    }

    .closereply:active {
        color: rgba(0, 0, 0, 0.8) !important;
    }

    .sendimgbtn {
        border: 0;

    }

    .sendimgbtn:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .sendimgbtn:active {
        background-color: rgba(0, 0, 0, 0.2);

    }

    .vimg {
        cursor: pointer;
    }

    .vimgsender {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .vimgreceiver {
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .vimg:hover {
        filter: brightness(90%);
        cursor: pointer;
    }

    #sendimgs {
        border-radius: 10px;
        filter: brightness(90%);

    }

    .accordion-button {
        box-shadow: none !important;
    }

    .imgrow {
        image-rendering: -moz-crisp-edges;
        /* Firefox */
        image-rendering: -o-crisp-edges;
        /* Opera */
        image-rendering: -webkit-optimize-contrast;
        /* Webkit (non-standard naming) */
        image-rendering: crisp-edges;
        -ms-interpolation-mode: nearest-neighbor;
        /* IE (non-standard property) */
    }

    .imgrow:hover {
        filter: brightness(90%);
        cursor: pointer;
    }
</style>
<div class="contd" style="margin-top: 3.5rem">

    <div class="card card-body mx-5 p-0">
        <div class="row gx-0" style="">
            <div class="col-lg-3 border position-relative">
                <div class="p-2 px-3 border-bottom d-flex">
                    <input type="text" placeholder="Search..." class="rounded-0 searchbx form-control form-control-sm">
                    <button class="searchbutton"><i class="far fa-search"></i></button>
                </div>
                <div class="d-flex justify-content-center">
                    <div id="user_area1" class="position-absolute bg-white " style="width: 90%;height: 25rem; box-shadow: 0 4px 4px rgba(0,0,0,0.1)">

                    </div>
                </div>

                <div id="user_area"></div>

                <!-- <div id="chat_message_area" contenteditable class="form-control"></div> -->

            </div>
            <div class="col-lg-9">
                <div class="position-relative">
                    <div class="sidemessagebar" style="z-index: 10;">
                        <div class="">
                            <button class="rightbtn " id="closeside">
                                <i class="ms-2 fs-3 mt-2 fad fa-angle-right" id=""></i>
                            </button>
                        </div>
                        <div class="prevapp" style="height: 30rem; overflow-y: auto;">
                            <div class="d-flex justify-content-center my-2 ">
                                <img src="" class="topchatimg hideable" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="accordion accordion-flush w-100 hideable" style="display: none" id="accordionFlushExample">
                                <div class="accordion-item hideable">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <i class="fas fa-calendar-day me-2"></i> Appointments
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="cardholder"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item hideable">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <i class="fas fa-image me-2"></i> Images
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body imgholder">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="px-4">

                                <p class="hideable mb-0 fw-bold" style="display:none;font-size: 14px">APPOINTMENTS</p>
                            </div>
                            <div class="cardholder px-4"></div> -->


                        </div>
                    </div>
                    <div class="border-bottom py-1 ps-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="" class="topchatimg" alt="">
                            <p class="ms-2 mb-0 topname"></p>
                        </div>
                        <button class="kebabmenu d-flex justify-content-center align-items-center">
                            <i class="fas fa-ellipsis-v kebabmess"></i>
                        </button>
                    </div>
                    <div class="messages pt-2" style="height: 26rem;overflow-x: hidden" id="msgs">



                    </div>
                    <div class="position-absolute w-100 border-top bg-white  repcard" style="bottom: 4.5rem">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="">
                                <div class="repcard1">
                                    <p class="mb-0 ms-3 mt-2 repcard1" style="font-size: 12px">Replying to <span id="replyTo"></span></p>
                                    <p class="mb-0 ms-3 text-secondary repcard1" id="replymess" style="font-size: 13px"></p>
                                </div>
                                <img src="" class="ms-5 mt-3" id="sendimgs" style="height: 100px" alt="">

                            </div>

                            <label for="" class="me-4 closereply repcard mt-3"><i class="fas fa-times"></i></label>
                        </div>


                    </div>
                    <input type="file" accept="image/jpeg, image/jpg, image/png" id="sendimg" hidden>
                    <div class="chatinput pb-3 pt-2 d-flex justify-content-center">
                        <button class="sendimgbtn my-1 px-3"><i class="fas fa-image"></i></button>
                        <!-- <div id="chat_message_area" contenteditable class="sendinput w-25 my-1"></div> -->
                        <textarea name="" id="" class="py-2 sendinput my-1" style="resize: none" placeholder="Write a message" cols="30" rows="10"></textarea>
                        <button class="my-1 sendbtn"><i class="fad fa-paper-plane"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="chat_message_area" contenteditable class="form-control w-25"></div> -->


</div>

<div class="modal fade" id="viewImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0 position-relative bg-dark">
            <button type="button" style="top: 10px;left: 10px;" class="btn-close bg-white rounded-circle p-2 position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
            <a href="" id="dlimg" download>
                <button type="button" style="top: 10px;right: 10px; height: 40px; width: 40px; background-color: lightgray" class=" rounded-circle p-2 position-absolute"><i class="fas fa-download"></i></button>
            </a>

            <div class="d-flex justify-content-center align-items-center w-100 h-100">
                <div class="">
                    <img src="" id="fullimg" style="max-height: 100vh; max-width: 100vw;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<input type="text" value="<?= $receiver_id ?>" id="reciever_id" hidden>
<input type="text" value="<?= $myid ?>" id="myid" hidden>
<input type="text" value="<?= $receiver['Profile'] ?>" id="receiver_img" hidden>
<input type="text" value="<?= $receiver['Firstname'] . ' ' . $receiver['Lastname'] ?>" id="receiver_name" hidden>

<script>
    $(document).ready(function() {
        var receiver_id = $('#reciever_id').val();
        var base_url = window.location.origin;
        var receiver_profile = '';
        var receiver_name = $('#receiver_name').val();
        $('.topname').text(receiver_name)

        if ($('#receiver_img').val() === "") {
            receiver_profile = base_url + '/assets/images/profile.png';
            $(".topchatimg").attr("src", receiver_profile);
        } else {
            receiver_profile = base_url + '/uploads/Patient/Profile/' + $('#receiver_img').val();
            $(".topchatimg").attr("src", receiver_profile);
        }

        console.log(receiver_id)
        $(".sendinput").keydown(function(e) {
            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();
                return false;
            }
        });


        $('.repcard1').hide();
        $('#sendimgs').hide();


        $('.sendimgbtn').click(function() {
            $('#sendimg').click();

            $("#sendimg").change(() => {
                $('#sendimgs').show();
                $('.repcard').show();

                var blah = document.querySelector("#sendimgs");
                var imgInp = document.querySelector("#sendimg");
                const [file] = imgInp.files;
                if (file)
                    blah.src = URL.createObjectURL(file);
            });
        })


        setInterval(checkUnreads, 1000);

        function checkUnreads() {
            $.ajax({
                url: '<?= base_url('DoctorChat/checkunread') ?>',
                success: function(data) {

                    if (data > 0) {
                        $('#messnot').show();
                        document.title = "(1) Message | Medical Staff";

                    } else {
                        $('#messnot').hide();
                        document.title = "Message | Medical Staff";
                    }
                }
            })
        }

        $('#closeside').hide();
        var replyID = 0;
        $('#sendimgs').hide();



        var reload = setInterval(function() {
            var dmBody = $('.messages');
            if (dmBody[0].scrollTop === (dmBody[0].scrollHeight - dmBody[0].clientHeight)) {
                load_chat_data(receiver_id, 'read', receiver_profile, true);
            }
        }, 500);


        $('.kebabmenu').click(function() {
            $('#closeside').show();
            $('.hideable').css('display', 'block')


            $('.sidemessagebar').animate({
                width: '20rem'
            })
        })

        $('#closeside').click(function() {
            $('#closeside').hide();
            $('.hideable').css('display', 'none')

            $('.sidemessagebar').animate({
                width: 0
            })
        });



        $('#user_area1').hide();

        var myid = $('#myid').val();

        setInterval(function() {
            loadChatUsers();
        }, 1000);

        $(document).on('click', '.srchback', function() {
            $('#user_area1').hide();
            $('.searchbx').val('')
            serch.abort();
            $('.searchbutton').attr('disabled', false);
        })


        function loadChatUsers() {
            $.ajax({
                url: "<?= base_url('DoctorChat/load_chat_user'); ?>",
                method: "POST",
                data: {
                    action: 'load_chat_user'
                },
                dataType: 'json',
                success: function(data) {

                    var output = '<div class="">';
                    if (data.length > 0) {
                        var receiver_id_array = '';

                        for (var count = 0; count < data.length; count++) {

                            var hasProfile = data[count].hasProfile;
                            var chat = data[count].lastchat;
                            output += '<a href="javascript:void(0)" data-forclass="' + 'thisactive_' + data[count].receiver_id + '" class="user_chat_list" data-receiver_profile="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" data-receiver_name="' + data[count].firstname + ' ' + data[count].lastname + '" data-receiver_id="' + data[count].receiver_id + '">'
                            output += '<div class="userchatlist"><div class="border-bottom chatuserbox"  id="chitchat" >';
                            output += '<div class="row gx-0 py-2">';
                            output += '<div class="col-lg-3 d-flex justify-content-center align-items-center">';
                            output += '<img src="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" class="chatprofimg" alt="">';
                            output += '</div>';
                            output += '<div class="col-lg-9 d-flex align-items-center">';
                            output += '<div class="w-100 me-2">';
                            output += '<div class="d-flex justify-content-between">';

                            output += '<p style="font-size: 14px" class="' + ((!data[count].mymess) ? ((data[count].chatstatus === "unread") ? 'text-dark fw-bold' : 'text-read') : 'text-read') + ' mb-0">' + data[count].firstname + ' ' + data[count].lastname + '</p></div>';

                            if (data[count].image !== "" && data[count].image !== null) {
                                output += '<p style="font-size: 12px" class="' + ((!data[count].mymess) ? ((data[count].chatstatus === "unread") ? 'text-dark fw-bold' : 'text-secondary') : 'text-read') + ' mb-0">' + data[count].who + ' sent a photo</p>';

                            } else {
                                output += '<p style="font-size: 12px" class="' + ((!data[count].mymess) ? ((data[count].chatstatus === "unread") ? 'text-dark fw-bold' : 'text-secondary') : 'text-read') + ' mb-0">' + ((chat.length > 20) ? chat.substring(0, 20) + '...' : chat) + '</p>';
                            }

                            output += '</div></div></div></div></div></a>';

                        }
                    } else {
                        output += '<div align="center"><i class=" mt-5 fal fa-comment-alt-slash fs-3"></i><p>No Messages Yet<p></div>';
                    }
                    output += '</div>';
                    $('#user_area').html(output);
                }


            })
        }

        function loadAppointment(userid) {
            $.ajax({
                url: '<?= base_url('DoctorChat/fetchuserappointment') ?>',
                method: 'POST',
                data: {
                    uid: userid,
                },
                dataType: 'json',
                success: function(data) {
                    var output = '<div>';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var redrl = (data[i].status === "Pending") ? '/D/ViewAppointment/' : '/D/ViewPatient/';
                            var url = base_url + redrl + data[i].thisID;

                            output += '<div class="ccard card card-body hideable mb-2 rounded-0" style="display: none">';
                            output += '<p style="font-size: 15px;" class="mb-0"><span class="fw-bold text-secondary">Appointment Date: </span> ' + data[i].date + '</p>';
                            output += '<p class="mb-0 text-success" style="font-size: 14px">' + data[i].appType + '</p>';
                            output += '<p class="mb-0 text-primary" style="font-size: 14px">' + data[i].patientType + '</p>';
                            output += '<p class="mb-0 fw-bold ' + ((data[i].status == "Pending") ? 'text-danger' : 'text-success') + '" style="font-size: 14px">' + data[i].status + '</p>';
                            output += '<div class="d-flex justify-content-end">';
                            output += '<a href="' + url + '" class="viewbt">' + data[i].viewIcon + 'View</a>';
                            output += '</div>';
                            output += '</div>';
                        }
                    }
                    output += '</div>';
                    $('.cardholder').html(output);

                }
            })
        }
        loadAppointment(receiver_id)

        function loadImages(userid) {
            $.ajax({
                url: '<?= base_url('DoctorChat/fetchimages') ?>',
                method: 'POST',
                data: {
                    uid: userid,
                },
                dataType: 'json',
                success: function(data) {
                    var output = '<div>';
                    if (data.length > 0) {
                        var output = '<div class="row gx-1 gy-2">';

                        for (var count = 0; count < data.length; count++) {
                            output += '<div class="col-lg-4">'
                            output += '<img data-src="' + base_url + '/uploads/Messages/' + data[count].image + '" src="' + base_url + '/uploads/Messages/' + data[count].image + '" style="object-fit: cover;width: 100%; height: 90px;" class="imgrow">'

                            output += '</div>'

                            // output += '<div class="col-lg-4 border">';
                            // output += 'hello'
                            // output + '</div>';
                        }
                        output += '</div>';

                    }
                    output += '</div>';

                    $('.imgholder').html(output);
                }
            })
        }

        // setInterval(loadImages(receiver_id), 1000)


        $(document).on('click', '.user_chat_list', function() {
            receiver_id = $(this).data('receiver_id');
            var id = $(this).data('receiver_id');

            receiver_name = $(this).data('receiver_name');
            receiver_profile = $(this).data('receiver_profile');
            var forclass = []
            var dataclass = $(this).data("forclass");

            console.log(receiver_id)


            $.ajax({
                url: "<?= base_url('DoctorChat/setReceiverSessionAjax'); ?>",
                method: "POST",
                data: {
                    ID: receiver_id
                },
                success: function(data) {
                    // console.log('Changed')
                }

            })


            $('.topname').text(receiver_name)
            $(".topchatimg").attr("src", receiver_profile);
            $('#user_area1').hide();
            $('.searchbx').val('')
            loadAppointment(receiver_id)
            load_chat_data(receiver_id, 'read', receiver_profile, true);
        })



        $('.scr').click(function() {
            $('.messages').animate({
                scrollTop: $('#scroll29').offset().top
            }, 2000);
        });






        function load_chat_data(receiver_id, update_data, chat_img, boo) {
            var chatimage = chat_img;
            $.ajax({
                url: "<?= base_url(); ?>DoctorChat/load_chat_data",
                method: "POST",
                data: {
                    receiver_id: receiver_id,
                    update_data: update_data
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data)
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '';
                        if (data[count].message_direction == 'left') {
                            html += '<div id="scroll' + data[count].isReply + '">';
                            if (data[count].isReply != 0) {
                                var repmess = data[count].replymessage;
                                var reply = '';

                                if (repmess.length > 90) {
                                    reply = repmess.substring(0, 90).concat('...');
                                } else {
                                    reply = repmess;
                                }

                                html += '<div style="margin-left: 35px;font-size: 12px"  class="d-flex justify-content-start align-items-center px-2 text-secondary" ><i class="fas fa-reply me-2"></i>' + data[count].replyTo + ' replied to ' + data[count].names + '</div>';
                                html += '<div class="scr d-flex justify-content-start align-items-end" style="margin-left: 35px;">';
                                html += '<div class="bg-light recievers mb-0 text-secondary">' + reply + '</div>';
                                html += '</div>';

                            }
                            if (data[count].chat_messages_text !== "" && data[count].chat_messages_text !== null) {

                                html += '<div class="d-flex px-2 justify-content-start align-items-end w-100 hell">';
                                html += '<img src="' + chatimage + '" class="receiverimg mb-2 me-2" alt="">';
                                html += '<div class="rdcard">';
                                html += '<div class="reciever position-relative" data-timestamp="' + data[count].chat_messages_datetime + '">' + nl2br(data[count].chat_messages_text) + '</div>';
                                html += '<i class="fas fa-reply replyleft position-absolute repstat" data-replyid="' + data[count].replyID + '" data-message="' + data[count].chat_messages_text + '"  data-replyto="' + data[count].replyTo + '"></i></div>';
                                html += '</div>';
                            }

                            if (data[count].image !== "" && data[count].image !== null) {
                                html += '<div class="d-flex justify-content-start   hell align-items-end mb-2" style="margin-left: 35px;">';
                                html += '<div class="rdcard">';

                                html += '<img class="vimg vimgreceiver" style="max-width: 18rem; max-height: 18rem" data-src="' + base_url + '/uploads/Messages/' + data[count].image + '"  src="' + base_url + '/uploads/Messages/' + data[count].image + '" >'
                                html += '<i class="fas fa-reply replyleft position-absolute repstat" data-replyid="' + data[count].replyID + '" data-message="' + data[count].chat_messages_text + '"  data-replyto="' + data[count].replyTo + '"></i></div>';

                                html += '</div>'
                            }

                            html += '</div>';
                        } else {
                            html += '<div>';


                            if (data[count].isReply != 0) {
                                var repmess = data[count].replymessage;
                                var reply = '';
                                if (repmess.length > 90) {
                                    reply = repmess.substring(0, 90).concat('...');

                                } else {
                                    reply = repmess;
                                }

                                html += '<div  class="d-flex justify-content-end align-items-center px-2 text-secondary" style="font-size: 12px"><i class="fas fa-reply me-2"></i> You reply to ' + data[count].name + '</div>';
                                html += '<div class="d-flex justify-content-end align-items-end px-2">';
                                html += '<div class="bg-light senders mb-0 text-secondary">' + reply + '</div>';
                                html += '</div>';

                            }

                            if (data[count].chat_messages_text !== "" && data[count].chat_messages_text !== null) {
                                html += '<div class="d-flex px-2 justify-content-end align-items-end hell1">';
                                html += '<div class="rdcard1 d-flex align-items-center">';
                                html += '<i class="fas fa-reply replyright position-absolute repstat" data-replyid="' + data[count].replyID + '" data-message="' + data[count].chat_messages_text + '"  data-replyto="' + data[count].replyTo + '"></i></div>';
                                html += '<div class="sender position-relative" data-timestamp="' + data[count].chat_messages_datetime + '">' + nl2br(data[count].chat_messages_text) + '</div>';
                                html += '</div>';
                                html += '</div>';
                            }

                            if (data[count].image !== "" && data[count].image !== null) {
                                html += '<div class="d-flex justify-content-end align-items-end mb-2  me-2 hell1">';
                                html += '<div class="rdcard1 d-flex align-items-center">';

                                html += '<i class="fas fa-reply replyright position-absolute repstat" data-replyid="' + data[count].replyID + '" data-message="' + data[count].chat_messages_text + '"  data-replyto="' + data[count].replyTo + '"></i></div>';

                                html += '<img class="vimg vimgsender" data-src="' + base_url + '/uploads/Messages/' + data[count].image + '"  style="max-width: 18rem; max-height: 18rem" src="' + base_url + '/uploads/Messages/' + data[count].image + '" >'
                                html += '</div>'
                            }
                            html += '</div>';


                        }
                        html += '';
                    }

                    $('.messages').html(html);
                    if (boo)
                        $('.messages').scrollTop($('.messages')[0].scrollHeight);



                }
            })
        }

        $(document).on('click', '.vimg', function() {
            $('#viewImgModal').modal('show');
            var imagelink = $(this).data('src');
            $('#fullimg').attr('src', imagelink);
            $("#dlimg").attr("href", imagelink)

        })

        $(document).mouseup(function(e) {
            var container = $(".hideable");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('#closeside').hide();

                container.css('display', 'none')
                $('.sidemessagebar').animate({
                    width: 0
                })
            }
        });

        $(document).on('click', '.imgrow', function() {
            $('#viewImgModal').modal('show');
            var imagelink = $(this).data('src');
            $('#fullimg').attr('src', imagelink);
            $("#dlimg").attr("href", imagelink)

        })

        $('.repcard').hide();

        $(document).on('click', '.repstat', function() {
            replyID = $(this).data('replyid');
            $('.repcard').show();
            $('.repcard1').show();
            if ($(this).data('message') !== "" && $(this).data('message') !== null) {
                if ($(this).data('message').length > 90) {
                    $('#replymess').text($(this).data('message').substring(0, 90).concat('...'));

                } else {
                    $('#replymess').text($(this).data('message'));

                }
            } else {
                $('#replymess').text('image');

            }
            $('#replyTo').text($(this).data('replyto'))
        })


        $('.closereply').click(function() {
            $('.repcard').hide();
            $('.repcard1').hide();

            replyID = 0;
            $("#sendimg").val(null);
            $("#sendimgs").hide();

        })

        $(".sendinput").keyup(function(event) {
            if (event.keyCode === 13 && !event.shiftKey) {
                $(".sendbtn").click();
            }
        });
        $('.sendinput').focus(function() {
            load_chat_data(receiver_id, 'read', receiver_profile, false);
        })
        $(".searchbx").keyup(function(event) {
            if (event.keyCode === 13) {
                $(".searchbutton").click();
            }
            if ($(this).val() === "") {
                $('#user_area1').hide();
                $('.searchbx').val('')
            }
        });

        function nl2br(str, is_xhtml) {
            if (typeof str === 'undefined' || str === null) {
                return '';
            }
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }


        $(document).on('click', '.sendbtn', function() {

            var chat_message = $.trim($('.sendinput').val());
            if (chat_message != '') {

                var form_data = new FormData();
                form_data.append("receiver_id", receiver_id)
                form_data.append("chat_message", chat_message)
                form_data.append("replyid", replyID)
                form_data.append("messageimg", $("#sendimg").prop("files")[0])

                $.ajax({
                    url: "<?= base_url(); ?>DoctorChat/send_chat",
                    method: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    enctype: 'multipart/form-data',
                    data: form_data,
                    beforeSend: function() {
                        $('.sendbtn').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        $('.repcard').hide();
                        $('.repcard1').hide();

                        replyID = 0;
                        $("#sendimg").val(null);
                        $("#sendimgs").hide();
                        $('.sendbtn').attr('disabled', false);
                        $('.sendinput').val('');
                        var html = '<div class="d-flex px-2 justify-content-end align-items-end">';
                        html += '<div class="sender">' + chat_message; + '</div>';
                        html += '</div>';

                        $('.messages').append(html);
                        $('.messages').scrollTop($('.messages')[0].scrollHeight);
                    }
                });


            } else {
                if (document.getElementById("sendimg").files.length > 0) {
                    var form_data = new FormData();
                    form_data.append("receiver_id", receiver_id)
                    form_data.append("chat_message", chat_message)
                    form_data.append("replyid", replyID)
                    form_data.append("messageimg", $("#sendimg").prop("files")[0])

                    $.ajax({
                        url: "<?= base_url(); ?>DoctorChat/send_chat",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        cache: false,
                        enctype: 'multipart/form-data',
                        data: form_data,
                        beforeSend: function() {
                            $('.sendbtn').attr('disabled', 'disabled');
                        },
                        success: function(data) {
                            $('.repcard').hide();
                            $('.repcard1').hide();

                            replyID = 0;
                            $("#sendimg").val(null);
                            $("#sendimgs").hide();
                            $('.sendbtn').attr('disabled', false);
                            $('.sendinput').val('');
                            var html = '<div class="d-flex px-2 justify-content-end align-items-end">';
                            html += '<div class="sender">' + chat_message; + '</div>';
                            html += '</div>';

                            $('.messages').append(html);
                            $('.messages').scrollTop($('.messages')[0].scrollHeight);
                        }
                    });
                }

            }
        });
        setInterval(function() {
            loadImages(receiver_id)

        }, 500);

        $(document).on('click', '.searchbutton', function() {
            var search_query = $.trim($('.searchbx').val());
            $('.user_area1').html('');
            if (search_query != '') {
                search(search_query)
            } else {
                $('#user_area1').hide();


            }
        });
        var serch;

        function search(squery) {
            serch = $.ajax({
                url: "<?= base_url(); ?>DoctorChat/search_user",
                method: "POST",
                data: {
                    search_query: squery
                },
                dataType: "json",
                beforeSend: function() {
                    $('#user_area1').show();

                    var out = '<div>';
                    out += '<div class="border-bottom">';
                    out += '<button class="srchback"><i class="fad fa-long-arrow-left"></i></button>';
                    out += '</div>';

                    out += '<p class="fs-2 text-center mt-5 mb-0"><i class="text-warning rotload fad fa-spinner-third"></i></p>';
                    out += '<p class="text-center">loading...</p>';
                    out += '</div>';
                    $('#user_area1').html(out);
                    $('.searchbutton').attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('.searchbutton').attr('disabled', false);
                    var output = '<div>';
                    output += '<div class="border-bottom">';

                    output += '<button class=" srchback"><i class="fad fa-long-arrow-left"></i></button>';
                    output += '</div>';

                    var send_userid = "<?php echo $this->session->userdata('user_id'); ?>";
                    if (data.length > 0) {
                        for (var count = 0; count < data.length; count++) {
                            var hasProfile = data[count].hasProfile;
                            var chat = data[count].lastchat;

                            output += '<a href="javascript:void(0)" data-forclass="' + 'thisactive_' + data[count].user_id + '" class="user_chat_list" data-receiver_profile="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" data-receiver_name="' + data[count].firstname + ' ' + data[count].lastname + '" data-receiver_id="' + data[count].user_id + '">'
                            output += '<div class="userchatlist"><div class="border-bottom chatuserbox " id="chitchat" >';
                            output += '<div class="row gx-0 py-2">';
                            output += '<div class="col-lg-3 d-flex justify-content-center align-items-center">';
                            output += '<img src="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" class="chatprofimg" style="height: 30px; width: 30px" alt="">';
                            output += '</div>';
                            output += '<div class="col-lg-9 d-flex align-items-center">';
                            output += '<div class="w-100 me-2">';
                            output += '<div class="d-flex justify-content-between">';

                            output += '<p style="font-size: 14px" class=" mb-0">' + data[count].firstname + ' ' + data[count].lastname + '</p></div>';
                            output += '</div></div></div></div></div></a>';
                        }
                    } else {
                        output += '<p class="text-center mb-0 fs-3 mt-5"><i class="text-primary fad fa-search"></i></p>'
                        output += '<p class="text-center" style="font-size: 14px">User Not Found</p>';
                    }
                    output += '</div>';
                    $('#user_area1').html(output);
                }
            })
        }

    })
</script>