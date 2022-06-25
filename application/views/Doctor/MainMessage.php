<style>
    .chatprofimg {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover !important;


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

    .chatinput {}

    .sendinput {
        height: 45px;
        width: 38rem;
        border: 0;
        outline: none;
        text-indent: 10px;
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

    .reciever,
    .sender {
        max-width: 25rem;
        margin-bottom: 10px;
        padding: 5px 7px 5px 7px;
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

    .rotload {
        animation: rotate 1.5s linear infinite;
    }

    @keyframes rotate {
        to {
            transform: rotate(360deg);
        }
    }
</style>
<div class="contd" style="margin-top: 3.5rem">

    <div class="card card-body mx-5 p-0">
        <div class="row gx-0 " style="">
            <div class="col-lg-3 position-relative border">
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
                <div class="d-flex justify-content-center align-items-center" style="height:35rem">
                    <div class="text-secondary">
                        <p class="text-center display-5 mb-0"><i class="fad fa-comment-alt-lines"></i></p>
                        <p>Click a user on the left to start conversation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    $(document).ready(function() {

        setInterval(checkUnreads, 1000);


        function checkUnreads() {
            $.ajax({
                url: '<?= base_url('DoctorChat/checkunread') ?>',
                success: function(data) {
                    console.log(data)
                    if (data > 0) {
                        $('#messnot').show();
                        document.title = "(1) Inbox | Medical Staff";

                    } else {
                        $('#messnot').hide();
                        document.title = "Inbox | Medical Staff";
                    }
                }
            })
        }




        $('#user_area1').hide();

        var base_url = window.location.origin;


        var myid = $('#myid').val();

        setInterval(function() {
            loadChatUsers();
        }, 1000);


        function loadChatUsers() {
            $.ajax({
                url: "<?= base_url('DoctorChat/load_chat_user'); ?>",
                method: "POST",
                data: {
                    action: 'load_chat_user'
                },
                dataType: 'json',
                beforeSend: function(data) {
                    // $('#user_area').html('loading');
                    // console.log(data)

                },
                success: function(data) {
                    var output = '<div class="">';
                    if (data.length > 0) {
                        var receiver_id_array = '';

                        for (var count = 0; count < data.length; count++) {

                            var hasProfile = data[count].hasProfile;
                            var chat = data[count].lastchat;
                            // console.log(data[count].receiver_id)
                            output += '<a href="' + base_url + '/DoctorChat/setReceiverSession/' + data[count].receiver_id + '" data-forclass="' + 'thisactive_' + data[count].receiver_id + '" class="user_chat_list" data-receiver_profile="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" data-receiver_name="' + data[count].firstname + ' ' + data[count].lastname + '" data-receiver_id="' + data[count].receiver_id + '">'
                            output += '<div class="userchatlist"><div class="border-bottom chatuserbox " id="chitchat" >';
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
                            // output += '<a href="javascript:void(0)" class="list-group-item user_chat_list" data-receiver_id="' + data[count].receiver_id + '">';

                            // output += '<img src="' + data[count].profile_picture + '" class="img-circle" width="35" />';

                            // output += ' ' + data[count].first_name + ' ' + data[count].last_name;

                            // output += '&nbsp;<span id="chat_notification_' + data[count].receiver_id + '"></span>';
                            // ///
                            // output += '&nbsp;<span id="type_notifitcation_' + data[count].receiver_id + '"></span>';


                            // receiver_id_array += data[count].receiver_id + ',';
                        }
                        // $('#hidden_receiver_id_array').val(receiver_id_array);
                    } else {
                        output += '<div align="center"><i class=" mt-5 fal fa-comment-alt-slash fs-3"></i><p>No Messages Yet<p></div>';
                    }
                    output += '</div>';
                    $('#user_area').html(output);
                }


            })
        }

        $(".searchbx").keyup(function(event) {
            if (event.keyCode === 13) {
                $(".searchbutton").click();
            }
            if ($(this).val() === "") {
                $('#user_area1').hide();
                $('.searchbx').val('')
            }
        });
        $(document).on('click', '.searchbutton', function() {
            var search_query = $.trim($('.searchbx').val());
            $('.user_area1').html('');
            if (search_query != '') {

                search(search_query);
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
                    console.log(data)
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

                            output += '<a href="' + base_url + '/DoctorChat/setReceiverSession/' + data[count].user_id + '" data-forclass="' + 'thisactive_' + data[count].user_id + '" class="user_chat_list" data-receiver_profile="' + ((hasProfile) ? '<?= base_url('uploads/Patient/Profile/') ?>' + data[count].profile : '<?= base_url('assets/images/profile.png') ?>') + '" data-receiver_name="' + data[count].firstname + ' ' + data[count].lastname + '" data-receiver_id="' + data[count].user_id + '">'
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

        $(document).on('click', '.srchback', function() {
            $('#user_area1').hide();
            $('.searchbx').val('')
            serch.abort();
            $('.searchbutton').attr('disabled', false);

        })








    })
</script>